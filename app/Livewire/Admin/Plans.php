<?php

namespace App\Livewire\Admin;

use App\Models\Plan;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Actions;
use Illuminate\Support\Facades\Gate;
use Filament\Forms;

class Plans extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(Plan::query())
            ->columns([
                Columns\TextColumn::make('name')
                    ->searchable(),
                Columns\TextColumn::make('price'),
                Columns\TextColumn::make('sale_price'),
                Columns\TextColumn::make('discount_percentage'),
                Columns\TextColumn::make('razorpay_plan_id')->label('Plan ID'),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->form($this->form_schema()),
            ]);
    }

    protected function form_schema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->disabled()
                ->required(),
            Forms\Components\TextInput::make('razorpay_plan_id')->required(),
            Forms\Components\TextInput::make('price')->required(),
            Forms\Components\TextInput::make('sale_price')->required(),
            Forms\Components\TextInput::make('discount_percentage')->required(),
            Forms\Components\TextInput::make('razorpay_offer_id'),
        ];
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.plans');
    }
}
