<?php

namespace App\Livewire\Admin;

use Spatie\Permission\Models\Role;
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

class Roles extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Role::whereNot('name', '=', 'super-admin')->whereNot('name', '=', 'developer'))
            ->columns([
                Columns\TextColumn::make('name'),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->slideOver()
                    ->model(Role::class)
                    ->form($this->form_schema()),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->slideOver()
                    ->form($this->form_schema()),
                Actions\DeleteAction::make(),
            ]);
    }

    protected function form_schema() : array
    {
        return [
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\Section::make('Permissions')->schema([
                Forms\Components\CheckboxList::make('permissions')
                    ->relationship(titleAttribute: 'name')
                    ->searchable()
                    ->bulkToggleable()
                    ->required(),
            ])->description('Select all permissions for the role'),
        ];
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.journal');
    }
}