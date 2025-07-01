<?php

namespace App\Livewire\Admin;

use App\Models\Article;
use App\Models\Slide;
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
use Filament\Forms\Get;

class Slides extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Slide::query())
            ->columns([
                Columns\TextColumn::make('type'),
                Columns\TextColumn::make('article.title'),
                Columns\ImageColumn::make('image')
                    ->disk('s3'),
                Columns\TextColumn::make('link'),
                Columns\TextColumn::make('status')
                ->label('Status') 
                ->formatStateUsing(function ($state) {
                    return $state == 1 ? 'Enable' : 'Disable';
                }),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->model(Slide::class)
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
            Forms\Components\Select::make('type')
                ->required()
                ->options([
                    'article' => 'Article',
                    'custom' => 'Custom',
                ])
                ->live(),

            Forms\Components\Select::make('article_id')
                ->label('Article')
                ->options(Article::where('status', '=', 'published')->get()->mapWithKeys(function ($article) {
                    return [$article->id => $article->title];
                })->toArray())
                ->searchable()
                ->required(fn (Get $get) => $get('type') == 'article')
                ->hidden(fn (Get $get) => $get('type') !== 'article'),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->disk('s3')
                ->directory('slides')
                ->visibility('publico')
                ->imageCropAspectRatio('1.91:1')
                ->imageResizeTargetWidth('1200')
                ->imageResizeTargetHeight('630')
                // ->getUploadedFileNameForStorageUsing(fn ($file) => $file->getClientOriginalName())
                ->formatStateUsing(fn (string $state) => [str_replace(env('AWS_URL'), '', $state)])
                ->helperText("Upload image with ratio 1.91:1 or width: 1200px and Height: 630px")
                ->required(fn (Get $get) => $get('type') == 'custom')
                ->hidden(fn (Get $get) => $get('type') !== 'custom'),
            Forms\Components\TextInput::make('link')
                ->url()
                ->required(fn (Get $get) => $get('type') == 'custom')
                ->hidden(fn (Get $get) => $get('type') !== 'custom'),

            Forms\Components\Toggle::make('status')
                ->required(),
        ];
    }


    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.slides');
    }
}
