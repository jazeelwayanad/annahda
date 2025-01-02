<?php

namespace App\Livewire\Admin;

use App\Models\journal as ModelsJournal;
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
use Illuminate\Support\HtmlString;
use Filament\Tables\Filters;
use Illuminate\Database\Eloquent\Builder;

class Journal extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(ModelsJournal::query())
            ->columns([
                Columns\TextColumn::make('type'),
                Columns\TextColumn::make('date')->date(),
                Columns\TextColumn::make('particular'),
                Columns\TextColumn::make('amount'),
                Columns\TextColumn::make('method'),
                Columns\TextColumn::make('attachment')->formatStateUsing(function(string $state) : HtmlString {
                    return new HtmlString("<a href='".env('IMAGEKIT_ENDPOINT') . "/" . $state."'>View File</a>");
                })->color('info'),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->label('New Entry')
                    ->model(ModelsJournal::class)
                    ->form([
                        Forms\Components\Section::make()->schema([
                            Forms\Components\Select::make('type')
                                ->options([
                                    'income' => 'Income',
                                    'expense' => 'Expense',
                                ])->required(),
                            Forms\Components\DatePicker::make('date')->required(),
                            Forms\Components\TextInput::make('particular')->required(),
                            Forms\Components\Radio::make('method')
                                ->options([
                                    'cash' => 'Cash',
                                    'online' => 'Online',
                                ])->required(),
                            Forms\Components\TextInput::make('amount')->numeric()->inputMode('decimal')->required(),
                            Forms\Components\FileUpload::make('attachment')
                                ->maxSize(3072)
                                ->disk('imagekit')
                                ->directory('journal'),
                        ])
                        ->columns(['xl' => 2]),
                    ]),
            ])
            ->filters([
                Filters\SelectFilter::make('type')
                    ->options([
                        'income' => 'Income',
                        'expense' => 'Expense',
                    ]),
                Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('date_from'),
                        Forms\Components\DatePicker::make('date_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['date_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                            )
                            ->when(
                                $data['date_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.journal');
    }
}
