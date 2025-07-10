<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $loading = false;
    public string $query = '';

    public function mount()
    {
        $this->query = request()->input('query', '');
    }

    public function render()
    {
        $articles = null;
        if ($this->query && $this->query !== "" && strlen($this->query) > 3){
            $articles = Article::with(['category', 'author'])
                ->where('title', 'like', '%' . $this->query . '%')
                ->orWhere('content', 'like', '%' . $this->query . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        }else{
            $articles = Article::with(['category', 'author'])
                ->orderBy('views')
                ->limit(3)
                ->get();
        }

        return view('livewire.search', [
            'articles' => $articles,
        ]);
    }
}
