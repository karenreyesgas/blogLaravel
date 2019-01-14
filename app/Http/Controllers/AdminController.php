<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('blog')
        ->with ('id',NULL)
        ->with ('admin','admin');
    }
    public function blog(){
        $articles = [
            'I_am_Karen',
            'Je_suis_Karen',
            'Yo_soy_Karen',
        ];
        return view('blog')
        ->with('articles',$articles)
        ->with('text',NULL)
        ->with ('id',NULL)
        ->with ('admin','admin');
    }
    public function edit($id){
        return view('blog')
        ->with ('id','$id')
        ->with('slug','I_am_Karen')
        ->with ('admin','admin')
        ->with('text','Has autem provincias, quas Orontes ambiens amnis imosque pedes Cassii montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit.');
    ;

    }

}
