<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Article;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

class Edit extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public Article $article;

    public function mount(string $slug): void
    {
        $this->article = Article::where('slug', $slug)->first();
        $this->form->fill([
            ...$this->article->toArray(),
            'tags' => $this->article->tags->pluck('id')->toArray()
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->model(Article::class)
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make()->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Article::class, 'slug', ignorable: $this->article),
                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->fileAttachmentsdisk('imagekit')
                            ->fileAttachmentsDirectory('blog/attachments'),
                    ]),
                    Forms\Components\Section::make('Featured Image')->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->image()
                            ->required()
                            ->disk('imagekit')
                            ->directory('blog')
                            ->visibility('publico')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1.91:1')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('630')
                            ->helperText("Upload image with ratio 1.91:1 or width: 1200px and Height: 630px"),
                    ])->description('Article thumbnail and social image'),
                    Forms\Components\Section::make('Meta Details')->schema([
                        Forms\Components\TextInput::make('meta_title')->required(),
                        Forms\Components\Textarea::make('meta_description')->required(),
                        Forms\Components\TextInput::make('og_title')->label('OG title'),
                        Forms\Components\Textarea::make('og_description')->label('OG description'),
                    ]),
                ])->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('More Data')->schema([
                        Forms\Components\Select::make('user_id')
                            ->required()
                            ->relationship(
                                name: 'author', 
                                titleAttribute: 'name')
                            ->searchable()
                            ->preload()
                            ->default(auth()->id()),
                        Forms\Components\Select::make('category_id')
                            ->required()
                            ->relationship(name: 'category', titleAttribute: 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('tags')
                            ->relationship(name: 'tags', titleAttribute: 'name')
                            ->multiple()
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')->required(),
                            ]),
                    ]),
                    Forms\Components\Section::make('Settings')->schema([
                        Forms\Components\ToggleButtons::make('status')
                            ->required()
                            ->options([
                                'draft' => 'Draft',
                                'scheduled' => 'Scheduled',
                                'published' => 'Published'
                            ])
                            ->icons([
                                'draft' => 'heroicon-o-pencil',
                                'scheduled' => 'heroicon-o-clock',
                                'published' => 'heroicon-o-check-circle',
                            ])
                            ->default('draft')
                            ->live(),
                        Forms\Components\DateTimePicker::make('schedule_date')
                            ->requiredIf('status', "scheduled")
                            ->visible(fn (Get $get): bool => $get('status') == "scheduled")
                            ->minDate(now()->addHour()),
                        Forms\Components\Toggle::make('comments')
                            ->required()
                            ->default(true),
                        Forms\Components\Toggle::make('premium')
                            ->required(),
                    ]),
                ])->columnSpan(['lg' => 1]),
            ])
            ->columns(3)
            ->statePath('data');
    }

    public function create(): void
    {
        $this->article->update($this->form->getState());
        $this->form->model($this->article)->saveRelationships();
        redirect()->route('admin.blog.index');
    }
    
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.blog.edit');
    }
}