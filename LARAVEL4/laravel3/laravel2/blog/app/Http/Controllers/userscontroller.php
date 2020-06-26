<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertable;
use App\http\Requests\registerConditions;
use Illuminate\Support\Facades\DB;

class userscontroller extends Controller
{
    
      public function index()
      {
            if(!session()->has('my_role'))
            return redirect('/');
            else  
            {
                  $data = Usertable::all()->sortByDesc('id');
                  $count = count($data);
                  return view('users.showUsers',compact('data','count'));
            }       
      }
      public function create()
      {
            if(session()->has('my_email'))
            return redirect('/');
            else
            return view('users.register');
      }
      public function store(registerConditions $user)
      {
            if(session()->has('my_email'))
            return redirect('/');
            else
      {
      
            $newuser = new Usertable();
            $newuser->name= $user->input('nom');
            $newuser->lastname= $user->input('prenom');
            $newuser->email= $user->input('email');
            $newuser->user_profile_img="";
            $newuser->role="user";
            $newuser->phone_number= $user->input('phone');
            $newuser->cuntry= "morocco";
            $newuser->city= $user->input('city');
            $newuser->birth_day= $user->input('birthday');

            
          $data=DB::select('SELECT * FROM usertables WHERE email=?',[$user->input('email')]);

            if(count($data))
            {
                  return redirect('/kitnews/register?alredyemail');
            }
            else if($user->input('password1') != $user->input('password2'))
            {
                  return redirect('/kitnews/register?passwordcompair');

            }
            else
            {
                  $pass=$user->input('password1');
                  $hachpass=password_hash($pass,PASSWORD_DEFAULT);
                  $newuser->password= $hachpass;
                  $newuser->save();
                  session()->put('my_email',$user->input('email'));
                  return redirect('/'); 
            
            }
            
      }
      
      } 
      public function edit($id)
      {
            $data = DB::select('SELECT * FROM usertables WHERE id=?',[$id]);


            return view('users.editUsers',compact('data','id'));
            

      }
      public function update($id,Request $user)
      {
            request()->validate([
 
                'editName' => 'required|min:3|max:15|alpha',
                'editlastName' => 'required|min:3|max:15|alpha',
                'editemail' => 'min:5|max:50',
                'editphone_number' => 'required|min:10|max:15',
                'editcuntry' => 'required|min:3|max:15|alpha',
                'editcity' => 'required|min:3|max:15|alpha',
                'editbirth_day' => 'required',

            ]);
            DB::update('update usertables set name = ? , lastname = ? , role = ? , phone_number = ? , cuntry = ? , city = ? , birth_day = ? , updated_at = ? where id = ?',[$user->input('editName'),$user->input('editlastName'),$user->input('editrole'),$user->input('editphone_number'),$user->input('editcuntry'),$user->input('editcity'),$user->input('editbirth_day'),date("Y-m-d h:i:s"),$id]);
           
            return redirect('kitnews/dashbord/users');


      }
      public function destroy($id)
      {
            $Usertable = Usertable::find($id);
            $Usertable->delete();
            return redirect('kitnews/dashbord/users');
      }


      public function loginindex()
      {

      }
      public function logincreate()
      {     if(session()->has('my_email'))
            return redirect('/');
            else
            return view('users.login');
      }
      public function loginstore(Request $request)
      {
      if(session()->has('my_email'))
      return redirect('/');
      else
      {
             $loginemail=$request->input('loginemail');
             $loginpassword=$request->input('loginpassword');
            $data=DB::select('SELECT * FROM usertables WHERE email=?',[$loginemail]);
            if(count($data))
            { 
                  $eml="";
                  $pass="";
                  foreach($data as $dt)
                  {
                       $pass= $dt->password;
                       $eml=$dt->email;
                       $role=$dt->role;
                       $deleted=$dt->deleted_at;
                  }
                  if(!is_null($deleted))
                  {
                  return redirect('/kitnews/login?accountDeleted'); 
                  }
                    $pwdcheck=password_verify($loginpassword,$pass);     
                  if($pwdcheck == false)
                  {
                      return redirect('/kitnews/login?err'); 

                  }
                  else if($pwdcheck == true)
                  {
                        session()->put('my_email',$loginemail);
                        if($role=="admin")
                        {
                              session()->put('my_role',$role);
                        }
                        return redirect('/?success'); 
                     
                  }
                  else
                  {
                        return redirect('/kitnews/login?err');                       
                  }
              
      
            }
            else
            {
                  return redirect('/kitnews/login?usernotexist'); 
            }
      }
      } 
      public function loginedit()
      {

      }
      public function loginupdate()
      {

      }
      public function logindestroy()
      {

      }

      public function logout()
      {
            session()->forget('my_email');
            session()->forget('my_role');
            return redirect('/kitnews/login'); 
            
      }

      function usersearch(Request $request)
      {
      if(!session()->has('my_role'))
      return redirect('/');
      else
      {
            $data=DB::select('SELECT * FROM usertables WHERE email=? and deleted_at is null',[$request->input('searchuseremail')]);
            $count = count($data);
            return view('users.searchUser',compact('data','count'));
      }

 }
}