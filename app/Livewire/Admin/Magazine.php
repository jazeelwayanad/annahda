<?php

namespace App\Livewire\Admin;

use App\Models\Magazine as MagazineModel;
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
use App\Models\Article;
use Illuminate\Validation\Rule;

class Magazine extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(MagazineModel::query()) 
            ->columns([
                Columns\TextColumn::make('year'),
                Columns\ImageColumn::make('cover_image')
                    ->disk('imagekit'),
            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->form($this->formSchema())
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['article_ids'] = json_encode($data['article_ids']);
                        return $data;
                    }),
            ])
            ->actions([
                Actions\EditAction::make()
                    ->form($this->formSchema())
                    ->mutateFormDataUsing(function (array $data, MagazineModel $record): array {
                        $data['article_ids'] = json_encode($data['article_ids']); 
                        return $data;
                    })
                    ->mutateRecordDataUsing(function (array $data): array {
                        $data['article_ids'] = json_decode($data['article_ids'], true);
                        return $data;
                    }),
                Actions\DeleteAction::make(),
            ]);
    }

    protected function formSchema(): array
    {
        $months = array_combine(range(1, 12), array_map(fn($month) => date('F', mktime(0, 0, 0, $month, 10)), range(1, 12)));
        return [         
            Forms\Components\Select::make('year')
                ->options(array_combine(
                    $years = range(2000, date('Y')),
                    $years
                ))
                ->label('Select Year')
                ->required()
                ->searchable(),
            Forms\Components\Select::make('start_month')
                ->options($months)
                ->label('Select Start Month')
                ->required()
                ->searchable(),
            Forms\Components\Select::make('end_month')
                ->options($months)
                ->label('Select End Month')
                ->required()
                ->searchable()
                ->rules([
                    function (callable $get) use ($months) {
                        return function ($attribute, $value, $fail) use ($get, $months) {
                            $startMonth = $get('start_month');
                            if ($startMonth && $value < $startMonth) {
                                $fail("The End Month must be greater than or equal to {$months[$startMonth]}.");
                            }
                        };
                    }
                ]),
            Forms\Components\Section::make('Cover Image')->schema([
                Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->required()
                    ->disk('imagekit')
                    ->directory('magazine/covers')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1.91:1')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('630')
                    ->helperText("Upload image with ratio 1.91:1 or width: 1200px and Height: 630px"),
            ])->description('Magazine cover image'),
            Forms\Components\CheckboxList::make('article_ids')
                ->options(Article::all()->mapWithKeys(function ($article) {
                    return [$article->id => $article->title];
                })->toArray())
                ->searchable(),
        ];
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.magazine');
    }
}
