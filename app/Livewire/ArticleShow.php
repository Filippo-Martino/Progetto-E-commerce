<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ArticleShow extends Component
{

    public $article;
    public $title;
    public $brand;
    public $longDescription;
    public $price;
    
  public function mount($articleId){
    $this->article= Article::find($articleId);
  }
    public function render()
    {
        return view('livewire.article-show');
    }
}
