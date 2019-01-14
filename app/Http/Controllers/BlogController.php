<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blog')
        ->with ('id',NULL);

    }
    public function blog(){
        $articles = [
            'I_am_Karen',
            'Je_suis_Karen',
            'Yo_soy_Karen',
        ];
        return view('blog')
        ->with('articles',$articles)
        ->with ('id',NULL);
    }
    public function slug($slug){
        
        return view('blog')
        ->with ('id',NULL)
        ->with('slug',$slug)
        ->with('text','Has autem provincias, quas Orontes ambiens amnis imosque pedes Cassii montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit.');
    }
}
