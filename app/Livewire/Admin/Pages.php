<?php

namespace App\Livewire\Admin;

use App\Models\Page;
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

class Pages extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Page::query()) 
            ->columns([
                Columns\TextColumn::make('title'),
                Columns\TextColumn::make('slug'),
                Columns\TextColumn::make('content'),
                Columns\ImageColumn::make('thumbnail')->disk('imagekit'),
                Columns\TextColumn::make('meta_title'),
                Columns\TextColumn::make('meta_description'),
                Columns\TextColumn::make('og_title'),
                Columns\TextColumn::make('og_description'),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->form($this->formSchema())
            ])
            ->actions([
                Actions\EditAction::make()
                    ->form($this->formSchema())
                    ->mutateFormDataUsing(function (array $data, Page $record): array {
                        return $data;
                    }),
                Actions\DeleteAction::make(),
            ]);
    }

    protected function formSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state, '-', 'ar'))),
            Forms\Components\TextInput::make('slug')
                ->disabled()
                ->dehydrated()
                ->required()
                ->maxLength(255)
                ->unique(Page::class, 'slug'),
            Forms\Components\RichEditor::make('content')
                ->required(),
            Forms\Components\FileUpload::make('thumbnail')
                ->image()
                ->required()
                ->disk('imagekit')
                ->directory('pages/thumbnails')
                ->imageResizeMode('cover')
                ->imageCropAspectRatio('1.91:1')
                ->imageResizeTargetWidth('1200')
                ->imageResizeTargetHeight('630')
                ->helperText("Upload an image with ratio 1.91:1 or width: 1200px and Height: 630px"),
            Forms\Components\TextInput::make('meta_title')->required(),
            Forms\Components\Textarea::make('meta_description')->required(),
            Forms\Components\TextInput::make('og_title')->label('OG title'),
            Forms\Components\Textarea::make('og_description')->label('OG description'),
        ];
    }
    

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.pages');
    }
}
