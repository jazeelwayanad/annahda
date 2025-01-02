<?php

namespace App\Livewire\Admin;

use App\Models\User;
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

class Admins extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::where('type', 'admin')->whereNot('email', '=', 'admin@humblar.in'))
            ->columns([
                Columns\ImageColumn::make('profile')
                    ->circular()
                    ->defaultImageUrl(asset('assets/profile-avatar.jpg'))
                    ->disk('imagekit'),
                Columns\TextColumn::make('name'),
                Columns\TextColumn::make('email'),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->model(User::class)
                    ->form($this->form_schema()),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->form(fn ($record) => $this->form_schema($record)),
                Actions\DeleteAction::make(),
            ]);
    }

    protected function form_schema($record = null): array
    {
        return [
            Forms\Components\FileUpload::make('profile')
                ->image()
                ->avatar()
                ->disk('imagekit')
                ->directory('profiles'),
            Forms\Components\Hidden::make('type')->default('admin'),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('email')
                ->email()
                ->unique(User::class, 'email', $record)
                ->required(),
            Forms\Components\TextInput::make('password')->required()->password()->revealable(),
            Forms\Components\Select::make('roles')
                ->multiple()
                ->relationship(titleAttribute: 'name')
                ->searchable()
                ->required()
                ->preload(),
        ];
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.admins');
    }
}
