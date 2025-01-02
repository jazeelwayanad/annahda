<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Article;
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

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Article::where('status', 'published')
            ->orWhereHas('author', function ($query) {
                $query->where('type', 'admin');
            }))
            ->columns([
                Columns\ImageColumn::make('thumbnail')
                    ->disk('imagekit'),
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
                    ->url(fn (Article $record): string => route('view-article', ['category' => $record->category->name, 'slug' => $record->slug]))
                    ->openUrlInNewTab()
                    ->color('gray'),
                Actions\Action::make('edit')
                    ->url(fn (Article $record): string => route('admin.blog.edit', $record->slug))
                    ->color('warning'),
                Actions\DeleteAction::make('delete')
                    ->record(fn (Article $record) => $record->delete())
                    ->color('danger'),
            ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.index');
    }
}
