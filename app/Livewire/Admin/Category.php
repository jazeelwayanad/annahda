<?php

namespace App\Livewire\Admin;

use App\Models\Category as CategoryModel;
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

class Category extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(CategoryModel::query())
            ->columns([
                Columns\ImageColumn::make('image')
                    ->disk('imagekit'),
                Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Columns\IconColumn::make('status')
                ->label('Visibility'),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->model(CategoryModel::class)
                    ->form($this->form_schema()),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->form($this->form_schema()),
                Actions\DeleteAction::make(),
            ]);
    }

    protected function form_schema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

            Forms\Components\TextInput::make('slug')
                ->disabled()
                ->dehydrated()
                ->required()
                ->maxLength(255)
                ->unique(CategoryModel::class, 'slug', ignoreRecord: true),

            Forms\Components\Textarea::make('description'),

            Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required()
                            ->disk('imagekit')
                            ->directory('categories')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1.91:1')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('630')
                            ->helperText("Upload image with ratio 1.91:1 or width: 1200px and Height: 630px"),

            Forms\Components\Toggle::make('status')
                ->label('Visible to customers.')
                ->default(true),
        ];
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.category');
    }
}
