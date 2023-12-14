<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class ArticleCreate extends Component
{
   use WithFileUploads;
    public $name;

    public $brand;

    public $longDescription;

    public $price;

    public $category;
    public $temporary_images;
    public $images = [];
    
    public $article;
    

    protected $rules = [
        'name'=>'required|min:2|max:21',
        'brand'=>'required| max:16',
        'longDescription'=>'required|min:10',
        'price'=>'required|numeric|between:0,99999.99|decimal:0,2',
        'category'=>'required',
        'temporary_images.*' => 'image|max:1024',
        'images.*' => 'image|max:1024'

    ];

    protected $messages = [
        'name.required' => 'Il campo nome è obbligatorio.',
        'name.min' => 'Il campo nome deve contenere almeno :min caratteri.',
        'name.max' => 'Il campo nome non deve superare :max caratteri.',
        
        'brand.required' => 'Il campo marchio è obbligatorio.',
        'brand.max' => 'Il campo marchio non deve superare :max caratteri.',
        
        'longDescription.required' => 'Il campo descrizione lunga è obbligatorio.',
        'longDescription.min' => 'Il campo descrizione lunga deve contenere almeno :min caratteri.',
        
        'price.required' => 'Il campo prezzo è obbligatorio.',
        'price.numeric' => 'Il campo prezzo deve essere un numero.',
        'price.between' => 'Il campo prezzo deve essere compreso tra :min e :max.',
        'price.decimal' => 'Il campo prezzo può contenere fino a :decimal cifre decimali.',
        
        'category.required' => 'Il campo categoria è obbligatorio.',
        
        'temporary_images.*.image' => 'I file devono essere immagini (jpg, jpeg, png, bmp, gif, svg, o webp).',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo 1mb.',
        
        'images.*.image' => 'Il file deve essere un\'immagine(jpg, jpeg, png, bmp, gif, svg, or webp).',
        'images.*.max' => 'L\'immagine non deve superare 1MB.',
    ];
    
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            ])) {
                foreach ($this->temporary_images as $image) {
                    $this->images[] = $image;
                }
            }
        }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function store(){
        $this->validate();

        // $category = Category::find($this->category);

        // $article = $category->articles()->create([
        //     'name'=>$this->name,
        //     'brabd'=>$this->brand,
        //     'longDescription'=>$this->longDescription,
        //     'price'=>$this->price
        // ]);
        
        
        $this->article = Category::find($this->category)->articles()->create($this->validate());
        
        if(count($this->images)){
            foreach($this->images as $image){
                // $this->article->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path'=> $image->store($newFileName,'public')]);
                

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400, 400),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
           
                ])->dispatch($newImage->id);
                
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        
        

            
            
            
        }
        Auth::user()->articles()->save($this->article);
        
        return redirect()->route('articles.create')->with('message','Annuncio inserito con successo, sarà pubblicato dopo una revisione');
        // session()->flash('message','Annuncio inserito con successo');
        // $this->reset();

    
    }
    

    public function render()
    {
        
        return view('livewire.article-create');
    }


    

}
