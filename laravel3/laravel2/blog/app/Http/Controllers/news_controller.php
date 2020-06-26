<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\News_table;
use App\Category_tabel;
use App\Imgs_table;
use App\Comment_table;
use Illuminate\Support\Facades\DB;
use App\http\Requests\insert_newscondition;

class news_controller extends Controller
{
    public function hommefun()
    {
        # code...
        $datacategory = DB::select('SELECT * FROM category_tabels where deleted_at is null');
        $newsdetails = DB::select('SELECT * FROM news_tables where deleted_at is null order by id desc LIMIT 9');
        $i=count($newsdetails);

        return view('welcome',compact('i','newsdetails','datacategory'));


    }


    public function dashbord()
    {
        if(!session()->has('my_email'))
        return redirect('/kitnews/login');
        else
        {
            return view('dashbord.home_dashbord');
        }
    }


  public function newsdtails($newsid)
  { 
    $cat="";
    $comentdetails = DB::select('SELECT * FROM comment_tables WHERE NEWID = ? order by id DESC',[$newsid]);
    $comentcount=count($comentdetails);
    $newsdetails = DB::select('SELECT * FROM news_tables WHERE id= ? and  deleted_at is null ',[$newsid]);
    $newsimgdetails = DB::select('SELECT img_path FROM imgs_tables WHERE img_news_id = ?',[$newsid]);
    $imgcount = count($newsimgdetails);
    foreach($newsdetails as $new)
    {
        $cat=$new->News_Category;
    }
    $similarnews = DB::select('SELECT * FROM news_tables WHERE News_Category = ? and deleted_at is null ORDER BY RAND() LIMIT 4',[$cat]);

    
    foreach($newsdetails as $news)
    {
        $discrip = preg_replace("#\[nl\]#" , "<br>\n" ,$news->News_discription); 
        $news->News_discription=$discrip;   
    }
    foreach($newsdetails as $news)
    {
        $discrip = preg_replace("#\[sp\]#" , "&nbsp;" ,$news->News_discription);
        $news->News_discription=$discrip;   
    }
    
    


   return view('News.news_details',compact('newsdetails','newsimgdetails','imgcount','similarnews','comentdetails','comentcount','newsid'));
  }
    
    public function insertcomment($newsid,Request $request)
    {
        
        if(!session()->has('my_email'))
        return redirect('/kitnews/login');
        else{
            request()->validate([
 
                'coment' => 'required|max:1000'
     
            ]);
            $data2=DB::select('SELECT * FROM usertables WHERE email=? and  deleted_at is null',[session()->get('my_email')]);
            foreach($data2 as $dt2)
            {
                 $id=$dt2->id;
                 $nom=$dt2->name." ".$dt2->lastname;
            }
            $coment = new Comment_table();
            $coment->USERID=$id;
            $coment->COMMENT=$request->input('coment');
            $coment->NEWID=$newsid;
            $coment->created_by_name=$nom;
            $coment->save();
            return redirect('/kitnews/news/'.$newsid);

        }
    }
    public function index()
    {
        $result_per_page=12;
        if(!isset($_GET['page']))
        {
            $page = 0;
        }
        else{
        $page = $_GET['page'];
        }
        

        $this_page_first_result =$page*$result_per_page;
        
        $datanews1 = DB::select('SELECT * FROM news_tables where deleted_at is null order by id DESC LIMIT ?,?',[$this_page_first_result,$result_per_page]);
        $datanews = DB::select('SELECT * FROM news_tables where deleted_at is null');
        $newscount = count($datanews);
        $datacategory = DB::select('SELECT * FROM category_tabels where deleted_at is null');
        $numpages=ceil($newscount/$result_per_page);
        return view('news.news_index',compact('datanews1','datacategory','numpages'));
    }

    public function createid($catnom)
    {
        $result_per_page=12;
        $category=$catnom;
        $page = $_GET['page'];

        $this_page_first_result =$page*$result_per_page;
        
        $datanewswithcat1 = DB::select('SELECT * FROM news_tables WHERE News_Category =? and deleted_at is null LIMIT ? , ?',[$catnom,$this_page_first_result,$result_per_page]);
        $datanewswithcat = DB::select('SELECT * FROM news_tables WHERE News_Category =? and  deleted_at is null',[$catnom]);
        $newscount = count($datanewswithcat);
        $datacategory = DB::select('SELECT * FROM category_tabels where deleted_at is null');
        $numpages=ceil($newscount/$result_per_page);
        return view('News.news_index_cat',compact('datanewswithcat1','datacategory','category','numpages'));
    }

    public function create()
    {
        if(!session()->has('my_email'))
        return redirect('/');
        else{
            $data=DB::select('SELECT category_name FROM category_tabels where deleted_at is null');
            $data2=DB::select('SELECT name,lastname FROM usertables WHERE email=? and deleted_at is null',[session()->get('my_email')]);
            foreach($data2 as $dt2)
            {
                 $nom=$dt2->name." ".$dt2->lastname;
            }
            return view('News.news_insert',compact('data', 'data2'));
            }
    }
    public function store(insert_newscondition $new)
    {
     
        $email=session()->get('my_email');
       

        $newNews = new News_table();
        $newNews->News_title =$new->input('News_titre');
        $newNews->News_discription =$new->input('news_description');
        $newNews->News_Category =$new->input('categoryname');  
        $data2=DB::select('SELECT name,lastname FROM usertables WHERE email=? ',[session()->get('my_email')]);
            foreach($data2 as $dt2)
            {
                 $nom=$dt2->name." ".$dt2->lastname;
            }     
        $newNews->News_created_by =$nom;
        $newNews->created_by_email =$email;        
        $newNews->img ="";




        $imgnew = new Imgs_table();

        request()->validate([
 
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
 
        ]);
 

        $images = $new->file('image');
        $targetDir="asset/img/";
        if ($new->hasFile('image')):
          //  $newNews->save();
          $newNews->save();
        foreach ($images as $item):
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $imageName = $targetDir.$time . '-' . $item->getClientOriginalName();
            $extension = $item->getClientOriginalExtension();   
            
               if($item->move($targetDir, $imageName))
               {
                   
                $insert=array('img_path'=>$imageName,"img_news_id"=>$newNews->id);
                DB::table('imgs_tables')->insert($insert);
                /*   $imgnew->img_path=$imageName;
                 $imgnew->img_news_id=$newNews->id;*/

               }
               $newNews->img =$imageName;      
               $newNews->save();  
  
        endforeach;
        else:
                $image = 'no image';
        endif;

        $dat=DB::select('SELECT img_path FROM imgs_tables WHERE img_news_id=? and  deleted_at is null LIMIT 3',[$newNews->id]);
        foreach($dat as $da)
        {
            DB::table('news_tables')->where('id',$newNews->id)->update(array(
                'img'=>$da->img_path,));
        }

      /*  $imageName = time().'.'.$new->image->extension();
        $new->image->move($targetDir, $imageName);*/

      


         


        return redirect('/kitnews/news/new/create?newsadd');
 
    }

    public function dashindex()
    {
        if(!session()->has('my_role'))
        return redirect('/');
        else  
        {     $data2=Category_tabel::all();
              $data = News_table::all()->sortByDesc('id');
              $img = Imgs_table::all();
              $count = count($data);
              return view('news.showNews',compact('data','count','img','data2'));
        } 
    }

    public function edit($id)
    {
        if(!session()->has('my_role'))
        return redirect('/');
        else  
        {
        $data = DB::select('SELECT * FROM news_tables WHERE id=?',[$id]);
        foreach($data as $news)
    {
        $discrip = preg_replace("#\[nl\]#" , "\n" ,$news->News_discription); 
        $news->News_discription=$discrip;   
    }
    foreach($data as $news)
    {
        $discrip = preg_replace("#\[sp\]#" , "&nbsp;" ,$news->News_discription);
        $news->News_discription=$discrip;   
    }
        $data2 = Category_tabel::all();
        $data3 = Imgs_table::where('img_news_id','=',$id)->get();
        return view('news.editNews',compact('data','id','data2','data3'));
        }
    }
    public function update(Request $request,$id)
    {
        if(isset($_POST['updateinfosnews']))
        {
     DB::update('UPDATE news_tables SET News_title = ? , News_discription = ? , News_Category = ? ,updated_at = ? WHERE id = ?',[$request->input('editnewsTitle'),$request->input('editnewsDiscription2'),$request->input('editnewscategory'), date("Y-m-d h:i:s"),$id]); 
     return back()
     ->with('success','You have successfully upload news.');
        }   
     else
        return redirect('/');

    }
    public function destroy($id)
    {
        if(!session()->has('my_role'))
        return redirect('/');
        else  
        {
      
        
            $new = News_table::find($id);
            $new->delete();
            return redirect('kitnews/dashbord/news');
        }
    }
    public function destroyimg($idimg,$idpost)
    {
        $imgdel = Imgs_table::find($idimg);
        $imgdel->delete();
        return redirect('kitnews/dashbord/news/edit/'.$idpost);

    }
    public function addphoto($id,Request $request)
    {
        if(isset($_POST['photosecen']))
        {
        $imgnew = new Imgs_table();
        $images = $request->file('image');
        $targetDir="asset/img/";
        if ($request->hasFile('image')):
          //  $newNews->save();
        foreach ($images as $item):
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $imageName = $targetDir.$time . '-' . $item->getClientOriginalName();
            $extension = $item->getClientOriginalExtension();   
            
               if($item->move($targetDir, $imageName))
               {
                   
                $insert=array('img_path'=>$imageName,"img_news_id"=>$id);
                DB::table('imgs_tables')->insert($insert);
                /*   $imgnew->img_path=$imageName;
                 $imgnew->img_news_id=$newNews->id;*/

               }
  
        endforeach;
        else:
                print_r('no img');
        endif;
        return redirect('kitnews/dashbord/news/edit/'.$id);
    }
        elseif(isset($_POST['photoprin']))
        {
            $imgnew = new Imgs_table();

            
            $targetDir="asset/img/";       
             $imageName = $targetDir.time().'.'.request()->im->extension();
    
      
    
          if(request()->im->move($targetDir, $imageName))
          {
              DB::update('UPDATE news_tables SET img = ? where id = ?',[$imageName,$id]);
              return redirect('kitnews/dashbord/news/edit/'.$id);

          }
          else
          {
            return redirect('kitnews/dashbord/news/edit/'.$id.'?err');

          }
   
        }
        else
        {
            return redirect('/');
        }
    }


    function search(Request $request)
    {

        $searchname= $request->input('searchname');
        $searchdate= $request->input('searchdate');

        if($searchname=="" && $searchdate == "")
        {
            return Redirect::back()->withErrors(['يجب ملئ فراغ واحد على الاقل لتتم عملية البحث', 'يجب ملئ فراغ واحد على الاقل لتتم عملية البحث']);
        }
        elseif($searchname=="" && $searchdate!="")
        {
                $data = DB::select("SELECT * FROM news_tables WHERE created_at like ? and  deleted_at is null",[$searchdate.'%']);
                $countdata = count($data);
                return view('news.searchNews',compact('data','countdata','searchdate'));
        }
        elseif($searchname!="" && $searchdate=="")
        {
                $data = DB::select("SELECT * FROM news_tables WHERE News_title like ? or News_discription like ? and  deleted_at is null",[$searchname.'%','%'.$searchname.'%']);
                $countdata = count($data);
                return view('news.searchNews',compact('data','countdata','searchdate'));
        }
        elseif($searchname!="" && $searchdate!="")
        {
                $data = DB::select("SELECT * FROM news_tables WHERE News_title like ? or News_discription like ? and created_at like ? and  deleted_at is null",[$searchname.'%','%'.$searchname.'%',$searchdate.'%']);
                $countdata = count($data);
                return view('news.searchNews',compact('data','countdata'));
        }
    }
    public function dashbordusersearch(Request $request)
    {
        if(!session()->has('my_role'))
        return redirect('/');
        else{
        
            $newstitle = $request->input('searchnewstitle');
            $newsdate = $request->input('searchnewsdate');
            $newscategory = $request->input('searchnewscategory');
            $newscreator = $request->input('searchnewsnameby');

            if($newstitle =="" && $newsdate == "" && $newscategory =="" && $newscreator == "" )
                {
                    return Redirect::back()->withErrors(['يجب ملئ فراغ واحد على الاقل لتتم عملية البحث', 'يجب ملئ فراغ واحد على الاقل لتتم عملية البحث']);
                }
            else
            {

                    if($newstitle !="" OR $newsdate != "" OR $newscategory !="" OR $newscreator != "")
                    {
                      if(empty($newstitle))
                      {
                          $newstitle ="%";
                      }
                      if(empty($newsdate))
                      {
                          $newsdate ="%";
                      }
                      if(empty($newscategory))
                      {
                          $newscategory ="%";
                      }
                      if(empty($newscreator))
                      {
                          $newscreator ="%";
                      }
                    }
                $img = Imgs_table::all();
                $data = DB::select("SELECT * FROM news_tables WHERE News_title like ? and  News_Category like ? and News_created_by like ? and created_at like ? and deleted_at is null ",['%'.$newstitle.'%','%'.$newscategory.'%','%'.$newscreator.'%',$newsdate.'%',]);
                $countdata = count($data);
                return view('news.searchdashbordUser',compact('data','countdata','img'));
            }


           /* if($searchname=="" && $searchdate == "")
            {
                return Redirect::back()->withErrors(['يجب ملئ فراغ واحد على الاقل لتتم عملية البحث', 'يجب ملئ فراغ واحد على الاقل لتتم عملية البحث']);
            }
            elseif($searchname=="" && $searchdate!="")
            {
                    $data = DB::select("SELECT * FROM news_tables WHERE created_at like and  deleted_at is null ?",[$searchdate.'%']);
                    $countdata = count($data);
                    return view('news.searchdashbordUser',compact('data','countdata'));
            }
         */
        }
    }
}
