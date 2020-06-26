<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorys_tabele;

class Category_tableController extends Controller
{
    public function NewCategory()
    {
        $newcategory = new Categorys_tabele();
        $newcategory->category_name='social';
        $newcategory->category_discription='social discription';
        $newcategory->category_image='';

        $newcategory->save();

    }
    public function lstCategory()
    {
        $category = Categorys_tabele::all();
        return view('lstcategory',['categoryitms'=>$category]);
    }
}
