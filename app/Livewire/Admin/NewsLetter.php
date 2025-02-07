<?php

namespace App\Livewire\Admin;

use App\Models\NewsletterSubscriber;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Actions;

class NewsLetter extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(NewsletterSubscriber::query())
            ->columns([
                Columns\TextColumn::make('email')
                    ->searchable(),
                Columns\TextColumn::make('created_at')->label('Created Date')->date('d-m-Y'),
            ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.news-letter');
    }
}
