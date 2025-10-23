<?php

namespace App\Livewire\App\Blog;

use App\Models\Article;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Actions;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class ListArticles extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        $userId = auth()->id();
        return $table
            ->query(Article::where('user_id', $userId)->where('status', '!=', 'rejected')->where('deleted_at', NULL))
            ->columns([
                Columns\ImageColumn::make('thumbnail')
                    ->disk('s3'),
                Columns\TextColumn::make('title')
                    ->searchable(),
                Columns\TextColumn::make('slug')
                    ->searchable(),
                Columns\TextColumn::make('category.name')
                    ->searchable(),
                Columns\TextColumn::make('author.name')
                    ->searchable(),
                Columns\TextColumn::make('updated_at')->label('Last updated at'),
            ])
            ->actions([
                Actions\Action::make('view')
                    ->url(fn (Article $record): string => route('article.show', ['category' => $record->category->name, 'slug' => $record->slug]))
                    ->openUrlInNewTab()
                    ->color('gray'),
                Actions\Action::make('edit')
                    ->url(fn (Article $record): string => route('app.blog.edit', $record))
                    ->color('warning'),
                Actions\DeleteAction::make('delete')
                    ->record(fn (Article $record) => $record->delete())
                    ->color('danger'),
            ]);
    }

    public function render()
    {
        return view('livewire.app.blog.list-articles');
    }
}
