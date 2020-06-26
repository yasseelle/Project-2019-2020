<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News_table;
use App\Categorys_tabele;
class News_tablesContoller extends Controller
{
     public function index()
    {
        //lister nouvelles
    }
    public function create()
    {
        //affiche le formulaire  de creation des nouvelles

        return view('News.create');

    }

    public function store(Request $request)
    {
        //enregistrer une nouvelle

        $category = new Categorys_tabele();
        $category->category_name= $request->input('titre');
        $category->category_discription= $request->input('discription');
        $category->category_image= "";

        $category->save();

    }
    public function edit()
    {
        //recupirer une nouvelle puis de le metre dans un formulair
    }   
    public function update()
    {
        //modifier une nouvelle
    }
    public function destroy()
    {
        //supprimer une nouvelle
    }
}
