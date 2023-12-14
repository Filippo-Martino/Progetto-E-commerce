<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;

use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;



class RevisorController extends Controller {
    public function index() {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }
    public function deletedShow() {
        $articles_deleted = Article::where('is_accepted', false)->paginate(8);
        return view('revisor.deleted', compact('articles_deleted'));
    }
    public function confirmedShow() {
        $articles_confirmed = Article::where('is_accepted', true)->paginate(8);
        return view('revisor.confirmed', compact('articles_confirmed'));
    }
    public function inRevisionShow() {
        $articles_in_revision = Article::where('is_accepted', null)->paginate(8);
        return view('revisor.inRevision', compact('articles_in_revision'));
    }
    public function show(Article $article) {

        return view('revisor.show', compact('article'));
    }
    //bottone accetta articolo null
    public function acceptArticle(Article $article) {
        $article->setAccepted(true);
        return redirect()->back()->with('message1', 'Annuncio accettato');
    }
    /* bottone accetta articolo eliminato */
    public function acceptArticleDeleted(Article $article) {
        $article->setAccepted(true);
        return redirect(route('revisor.deleted'))->with('message1', 'Annuncio accettato');
    }
    /*bottone elimina articolo null */
    public function rejectArticle(Article $article) {
        $article->setAccepted(false);
        return redirect()->back()->with('message2', 'Annuncio rifiutato');
    }
    /* rotta elimina articolo confermato */
    public function rejectArticleConfirmed(Article $article) {
        $article->setAccepted(false);
        return redirect(route('revisor.confirmed'))->with('message2', 'Annuncio rifiutato');
    }

    

    public function completeForm() {
        return view('workwithus');
    }
    public function becomeRevisor(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'number' => 'required|numeric|digits_between:9,11',
            'address' => 'required',
            'description' => 'required',
            'city' => 'required',
            'file' => 'required|mimes:pdf',
        ], 
        [
            'name.required' => 'Il campo Nome è obbligatorio.',
            'surname.required' => 'Il campo Cognome è obbligatorio.',
            'name.min' => 'Il campo Nome deve contenere almeno :min caratteri.',
            'surname.min' => 'Il campo Cognome deve contenere almeno :min caratteri.',
            'number.required' => 'Il campo Numero di telefono è obbligatorio.',
            'number.numeric' => 'Il campo Numero di telefono deve contenere un numero.',
            'number.digits_between' => 'Il campo Numero di telefono deve contenere fra 9 e 11 cifre.',
            'address.required' => 'Il campo Indirizzo è obbligatorio.',
            'description.required' => 'Il campo Messaggio è obbligatorio.',
            'city.required' => 'Il campo Città è obbligatorio.',
            'file.required' => 'Il CV è obbligatorio.',
            'file.mimes' => 'Il CV deve essere un pdf.'
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->name;
        $surname = $request->surname;
        $number = $request->number;
        $address = $request->address;
        $description = $request->description;
        $city = $request->city;
        $file = $request->file;
        $email = Auth::user()->email;
        $user = Auth::user();
        $userData = compact('user', 'email', 'name', 'surname', 'number', 'address', 'description', 'city', 'file');

        Mail::to('admin@presto.it')->send(new BecomeRevisor($userData));
        return redirect()->back()->with('message', 'Complimenti! La tua richiesta di diventare revisore è stata inviata');
    }
    public function makeRevisor(User $user) {
        Artisan::call('presto:make-user-revisor', ["email" => $user->email]);
        return redirect('/')->with('message', "Complimenti! L'utente è diventato revisore");
    }
      

}
