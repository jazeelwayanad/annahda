<?php

namespace App\Livewire\Admin;

use App\Models\Popup as PopupModel;
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

class Popups extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(PopupModel::query())
            ->columns([
                Columns\ImageColumn::make('image')
                    ->disk('imagekit'),
                Columns\TextColumn::make('redirect_url'),
                Columns\TextColumn::make('start_date')->date(),
                Columns\TextColumn::make('end_date')->date(),
                Columns\TextColumn::make('status')
                ->label('Status') 
                ->formatStateUsing(function ($state) {
                    return $state == 1 ? 'Enable' : 'Disable';
                }),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->model(PopupModel::class)
                    ->form($this->form_schema())
                    ->mutateFormDataUsing(function (array $data): array {
                        $existingEnabled = PopupModel::where('status', 1)->exists();
                        if ($existingEnabled && $data['status'] == '1') {
                            $data['status'] = '0';
                        }    
                        return $data;
                    }),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->form($this->form_schema())
                    ->mutateFormDataUsing(function (array $data, PopupModel $record): array {
                        if ($data['status'] == '1') {
                            $existingEnabledRecord = PopupModel::where('status', 1)
                                ->where('id', '!=', $record->id) 
                                ->first();
            
                            if ($existingEnabledRecord) {
                                $existingEnabledRecord->update(['status' => 0]);
                            }
                        }            
                        return $data; 
                    }),
                Actions\DeleteAction::make(),
            ]);
    }

    protected function form_schema(): array
    {
        return [
            Forms\Components\FileUpload::make('image')
                ->image()
                ->required()
                ->disk('imagekit')
                ->directory('popups')
                ->visibility('publico'),
            Forms\Components\TextInput::make('redirect_url'),
            Forms\Components\DatePicker::make('start_date')->required(),
            Forms\Components\DatePicker::make('end_date')->required()->afterOrEqual('start_date'),

            Forms\Components\Select::make('status')
                ->required()
                ->options([
                    '1' => 'Enable',
                    '0' => 'Disbale',
                ])
        ];
    }


    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.popups');
    }
}
