<?php

namespace App\Livewire\Admin;

use App\Models\Coupon as CouponModel;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Actions;
use Filament\Forms;
use Illuminate\Support\Str;
use LucasDotVin\Soulbscription\Models\Plan;

class Coupon extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(CouponModel::query()) 
            ->columns([
                Columns\TextColumn::make('title'),
                Columns\TextColumn::make('code'),
                Columns\TextColumn::make('type')
                ->label('Type') 
                ->formatStateUsing(function ($state) {
                    return $state == 'flat' ? 'Flat' : 'Percentage';
                }),
                Columns\TextColumn::make('discount'),
                Columns\TextColumn::make('start_date')->date(),
                Columns\TextColumn::make('end_date')->date(),
                Columns\TextColumn::make('status')
                ->label('Status') 
                ->formatStateUsing(function ($state) {
                    return $state == 1 ? 'Enable' : 'Disable';
                }),
                Columns\TextColumn::make('max_usage'),
                Columns\TextColumn::make('total_usage'),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->form($this->formSchema())
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['plan_ids'] = json_encode($data['plan_ids']);
                        return $data;
                    }),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->form($this->formSchema())
                    ->mutateFormDataUsing(function (array $data, CouponModel $record): array {
                        $data['plan_ids'] = json_encode($data['plan_ids']); 
                        return $data;
                    })
                    ->mutateRecordDataUsing(function (array $data): array {
                        $data['plan_ids'] = json_decode($data['plan_ids'], true);
                        return $data;
                    }),
                Actions\DeleteAction::make(),
            ]);
    }

    protected function formSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->required(),
            Forms\Components\TextInput::make('code')
                ->required(),                
            Forms\Components\Select::make('type')
                ->options([
                    'flat' => 'Flat',
                    'percentage' => 'Percentage',
                ]),
            Forms\Components\CheckboxList::make('plan_ids')
                ->options(Plan::all()->mapWithKeys(function ($plan) {
                    return [$plan->id => $plan->name];
                })->toArray())
                ->searchable(),
            Forms\Components\TextInput::make('discount')
                ->required(),
            Forms\Components\DatePicker::make('start_date')->required(),
            Forms\Components\DatePicker::make('end_date')->required()->afterOrEqual('start_date'),

            Forms\Components\Toggle::make('status')
                ->required()
                ->default(true),
            Forms\Components\TextInput::make('max_usage')->required(),
        ];
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.Coupon');
    }
}
