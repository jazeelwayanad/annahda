<?php

namespace App\Livewire\Admin;

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
use Spatie\Permission\Models\Permission;

class Permissions extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Permission::query())
            ->columns([
                Columns\TextColumn::make('name'),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->model(Permission::class)
                    ->form([
                        Forms\Components\TextInput::make('name')->required(),
                    ])
                    ->before(function () {
                        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
                    })
                    ->after(function () {
                        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
                    })
            ])
            ->actions([
                Actions\EditAction::make()
                    ->form([
                        Forms\Components\TextInput::make('name')->required(),
                    ])
                    ->before(function () {
                        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
                    })
                    ->after(function () {
                        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
                    }),
                Actions\DeleteAction::make(),
            ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.journal');
    }
}