<?php

namespace App\Http\Controllers;

use App\Category_tabel;
use App\http\Requests\addCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class category_controller extends Controller
{
    //
    public function index()
    {
        if(!session()->has('my_role'))
        return redirect('/');
        else  
        {
              $data = Category_tabel::all()->sortByDesc('id');
              $count = count($data);
              return view('category.showCategory',compact('data','count'));
        } 
    }
    public function create()
    {
        if(!session()->has('my_email'))
        return redirect('/');
        else
        return view('category.category_insert');
    }
    public function store(addCategoryRequest $requestcat)
    {
        
        if(!session()->has('my_email'))
        return redirect('/');
        else
        {

            $category = new Category_tabel();
            $category->category_name=$requestcat->input('category_nom');
            $category->category_discription=$requestcat->input('category_description');
            $category->category_image="";

            $data2=DB::select('SELECT * FROM category_tabels WHERE category_name=?',[$requestcat->input('category_nom')]);
            if(count($data2))
            {
                  return redirect('/kitnews/category/create?alredycat');
            }
            else
            {
            $category->save();
            return redirect('/kitnews/category/create?categoryadd');
            }
        }
    }
    public function edit($id)
    {
        $data = DB::select('SELECT * FROM category_tabels WHERE id=?',[$id]);


        return view('category.editCategory',compact('data','id'));
           
    }
    public function update($id,Request $request)
    {
        request()->validate([
 
            'editcategoryName' => 'required|min:3|max:15',
            'editcategoryDescription' => 'required|min:100|max:1000'
    
        ]);
        DB::update('update category_tabels set category_name = ? , category_discription = ? , updated_at = ? where id = ?',[$request->input('editcategoryName'),$request->input('editcategoryDescription'),date("Y-m-d h:i:s"),$id]);
       
        return redirect('kitnews/dashbord/category');
    }
    public function destroy($id)
    {
            $Category = Category_tabel::find($id);
            $Category->delete();
            return redirect('kitnews/dashbord/Category');
    }

    public function searchcatdashbord(Request $request)
    {
        if(!session()->has('my_role'))
        return redirect('/');
        else
        {
        $data = DB::select('SELECT * FROM category_tabels WHERE category_name like ? and deleted_at is null',['%'.$request->input('searchcatdate').'%']);
        $count = count($data);
        return view('category.searchCategory',compact('data','count'));
        }
    }
}
