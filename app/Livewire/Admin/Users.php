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
use App\Models\User;

class Users extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::where('type', 'user'))
            ->columns([
                Columns\ImageColumn::make('profile')
                    ->circular()
                    ->defaultImageUrl(asset('assets/profile-avatar.jpg'))
                    ->disk('imagekit'),
                Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
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
                ->directory('profiles')
                ->visibility('publico'),
            Forms\Components\Hidden::make('type')
                ->default('user'),
            Forms\Components\TextInput::make('name')
                ->required(),
            Forms\Components\TextInput::make('email')
                ->email()
                ->unique(User::class, 'email', $record)
                ->required(),
            Forms\Components\TextInput::make('password')
                ->password()
                ->revealable()
                ->required(),
        ];
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.users');
    }
}
