<?php

namespace App\Dao\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use DB;
use Auth;
use Session;
use Config;
use Carbon\Carbon;

class UserDao implements UserDaoInterface
{
  public function insertUser(Request $request){
    try{
        $data=$request->all();
        $data['dob']=Carbon::now();
        $user=new User();
        $password=$data['password'];
        $cpassword=$data['cpassword'];
        $maxID=DB::table('users')->max('id');
        $user->id=$maxID+1;
        $user->name='-';
        $user->email=$data['email'];
        $user->password=Hash::make($data['password']);
        $user->status=Config::get('constant.user');
        $user->dob=$data['dob'];
        $user->remember_token=str::random(10);
        $user->save();
        Session::forget('error');
        return true;
    }catch(Exception $e){
        return false;
    }
  }

  public function insertUserUpdate(Request $request,string $email,string $id){
    try{
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $status=$request['status'];
        $dob=Carbon::createFromTimestamp(strtotime($request->input('dob')))->format('Y-m-d h:i:s');
        $updated_at=now();
        DB::update('update users set name=?,email=?,password=?,status=?,dob=?,updated_at=? where id=?',
        [$name,$email,$password,$status,$dob,$updated_at,$id]);
        Session::forget('error');
        return true;
    }catch(Exception $e){
        return false;
    }
}

public function updateUser(Request $request, user $user){
  try{
      $name=$request->input('name');
      $email=$request->input('email');
      $password=$request->input('password');
      $dob=Carbon::createFromTimestamp(strtotime($request->input('dob')))->format('Y-m-d h:i:s');
      $updated_at=now();
      DB::update('update users set name=?,email=?,password=?,dob=?,updated_at=? where id=?',
      [$name,$email,$password,$dob,$updated_at,$user->id]);
      return true;
  }catch(Exception $e){
      return false;
  }
}

public function updatePasswordByToken(Request $request){
    return DB::table('users')
            ->where([
            'email' => $request->email, 
            'remember_token' => $request->token
            ])->first();
}

public function showUserList(string $email,int $status){
    if($status == Config::get('constant.admin')){
      return DB::table('users')
            ->select('users.id','users.name');
    } else {
      return DB::table('users')
          ->select('users.id','users.name')
          ->where('users.email',$email);
  }
}

public function showUserDetail(user $user){
  return DB::table('users')
          ->select('users.id','users.name','users.email','users.dob','users.status')
          ->where('users.id',$user->id)
          ->get();
}

public function searchUser(string $email,Request $request){
  if(!empty($request->nameSearch)){
      $search = $request->nameSearch;
      return DB::table('users')
              ->select('users.id','users.name')
              ->where('name','like','%'.$search.'%')
              ->where('users.email',$email);
  }
  else{
      $search = $request->emailSearch;
      return DB::table('users')
              ->select('users.id','users.name')
              ->where('email','like','%'.$search.'%')
              ->where('users.email',$email);
  }
}

  public function getLoginUserID(Request $request){
    return DB::table('users')->where('email',$request->get('email'))->value('id');
  }

  public function getUserDataByEmail(string $email){
    return User::where('email',$email)->first();
  }

  public function getTokenByEmail(string $user){
    return User::where('email',$user)->first();
}

  public function DBUpdatePassword(Request $request, user $user){
    $data = $request->all();
    $new_password=Hash::make($data['new_password']);
    $updated_at=now();
    DB::update('update users set password=?,updated_at=? where id=?',
    [$new_password,$updated_at,$user->id]);
    return true;
  }
}