<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Rules\IsValidPassword;
use App\Contracts\Services\User\UserServiceInterface;
use App\Models\Post;
use App\Models\User;
use Validator;
use Auth;
use Session;
use DB;
use Config;
use Carbon\Carbon;

class UserController extends Controller
{
    protected $userServiceInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userServiceInterface = $userServiceInterface;
    }

    /**
     * Display a welcome page after successfull login.
    */
    public function index(){
      return view('welcome');
    }

    /**
     * Display a login page.
    */
    public function login(){
      return view('login');
    }

    /**
     * Checking user is exit or not.
     *
     * @param Request $request (User login Data)
    */
    public function checklogin(Request $request)
    {
      $validatedData=[
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
      ];

      $validator=Validator($request->all(),$validatedData);
      if($validator->fails()){
          return redirect()->route('login')
                ->withErrors($validator);
      }else{
        $credentials =[
          'email'  => $request->get('email'),
          'password' => $request->get('password')
          ];
    
          if(Auth::attempt($credentials))
          {
            $id=$this->userServiceInterface->getLoginUserID($request);
            Session::put('id',$id);
            return redirect()->route('post.index');
          }
          else
          {
            return back()->with('error', Config::get('constant.e-001'));
          }
        }
    }

    /**
     * Display a register page.
    */
    public function register(){
      return view('user.register');
    }

    /**
     * Store a newly register user in database.
     *
     * @param Request $request (Request data from User)
    */
    public function registerUser(Request $request){
      $validatedData=[
        'email'=>'required|email|unique:users,email',
        'password'=>['required','alphaNum','min:8',new IsValidPassword],
        'cpassword'=>'required|min:8|same:password',
      ];

      $validator=Validator($request->all(),$validatedData);
      if($validator->fails()){
          return redirect()->route('register')
                ->withInput()
                ->withErrors($validator);
      }else{
        $bool=$this->userServiceInterface->insertUser($request);
        if($bool){
          return view('welcome');
        }else{
          return redirect()->route('user.register')->withInput();
        }
      }
    }

    /**
      * Go to the email request form for forgetpassword.
      *
    */
    public function showForgetPasswordForm()
    {
      return view('auth.forgetPassword');
    }
  
    /**
    * Checking user is exit or not.If yes, send mail to user email.
    *
    * @param Request $request (Request data from User)
    */
    public function submitForgetPasswordForm(Request $request)
    {
      $validatedData=[
      'email' => 'required|email|exists:users',
        ];
          $validator=Validator($request->all(),$validatedData);
          if($validator->fails()){
              return redirect()->route('forget.password.get')
                    ->withInput()
                    ->withErrors($validator);
          } else {
            $user=$request->email;
            $token = $this->userServiceInterface->getTokenByEmail($user)->remember_token;
    
            Mail::to($request->email)->send(new \App\Mail\forgetPassword($token));
      
            return back()->with('message', Config::get('constant.m-001'));
          }
    }

    /**
    * Go to the password change from after clicking the link from user email.
    *
    * @param Request $token (User token from database.)
    */
    public function showResetPasswordForm($token) { 
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }
 
    /**
      * After clicking the confirm button, new password will be stored in database.
      *
      * @param Request $request (Request data from User)
    */
    public function submitResetPasswordForm(Request $request)
    {
        $validatedData=[
            'email' => 'required|email|exists:users',
            'password' => ['required','alphaNum','min:8',new IsValidPassword],
            'cpassword' => ['required','alphaNum','min:8','same:password',new IsValidPassword]
        ];
        $validator=Validator($request->all(),$validatedData);
        if($validator->fails()){
            return redirect()->route('reset.password.get',$request->token)
                ->withInput()
                ->withErrors($validator);
        } else {
            $updatePassword = $this->userServiceInterface->updatePasswordByToken($request);
 
            if(!$updatePassword){
                return back()->withInput()->with('error', 'Invalid token!');
            }
            $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
     
            return redirect('/login')->with('message', Config::get('constant.m-002'));
        }
    }

    /**
     * Searching the user with user name or email.
     * 
     * @param Request $request (Request user name or email from user)
    */
    public function userSearch(Request $request){
      $users=$this->userServiceInterface->searchUser(Auth::user()->email,$request)->paginate(6);
      return view('user.userList')->with('users',$users);
  }

    /**
     * Display a listing of the user data.
    */
    public function userList()
    {
        if(Session::has('error')){
            Session::forget('error');
        }
        $users =$this->userServiceInterface->showUserList(Auth::user()->email,Auth::user()->status)->paginate(6);
        return view('user.userList')->with('users',$users);
    }

    /**
     * Show the form for creating a new user.
    */
    public function create(){
      return view('user.create');
    }

    /**
    * Store a adding the register user info in database.
    *
    * @param Request $request (Request data from User)
    */
    public function store(Request $request){
      $validatedData= [
          'name'=>'required|min:3',
      ];

      $validator=Validator($request->all(),$validatedData);
      if($validator->fails()){
          return redirect()->route('user.create')
                ->withInput()
                ->withErrors($validator);
      } else{
        $bool=$this->userServiceInterface->insertUserUpdate($request,Auth::user()->email,Auth::user()->id);
        if($bool){
            return redirect()->route('userList');
        }else{
            return redirect()->route('user.create')->withInput();
        }
      }
    }

    /**
     * Show detail data of user
     *
     * @param user $user (User detail data from UserList Screen)
    */
    public function show(user $user){
      $users=$this->userServiceInterface->showUserDetail($user);
      return view('user.userDetail')->with('user',$users);
  }

    /**
     * Show the form for editing the specified user.
     *
     * @param  user  $user (User data from UserDetail screen)
    */
    public function edit(user $user)
    {
        return view('user.edit')->with('user',$user);
    }

    /**
     * Update the specified user in database.
     *
     * @param  user  $user (User data from UserDetail screen)
     * @param Request $request (Request data from User)
     */
    public function update(Request $request, user $user)
    {
        $validatedData=[
            'name'=>'min:3',
        ];

        $validator=Validator($request->all(),$validatedData);
        if($validator->fails()){
            return redirect()->route('user.edit',$user)
			          ->withInput()
			          ->withErrors($validator);
        }
        else{
            $bool=$this->userServiceInterface->updateUser($request,$user);
            if($bool){
                return redirect()->route('userList');
            }else{
                return redirect()->route('user.edit')->withInput();
            }
        }
      }

      /**
     * Remove the specified user from database.
     *
     * @param  user  $user (User data from UserDetail screen)
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('userList');
    }

    /**
     * Changing the password of the autorize user.
    */
    public function changePassword(){
      return view('user.changePassword');
  }

  /**
   * Updating the password of the autorize user in database.
   * 
   * @param Request $request (User password from ChangePassword screen)
  */
  public function updatePassword(Request $request){
      $validatedData= [
          'old_password'     => 'required|min:8',
          'new_password'     => ['required','alphaNum','min:8',new IsValidPassword],
          'confirm_password' => ['required','alphaNum','min:8','same:new_password',new IsValidPassword]
      ];

    $validator=Validator($request->all(),$validatedData);
    if($validator->fails()){
        return redirect()->route('changePassword')
              ->withErrors($validator);
    } else {
      $user = $this->userServiceInterface->getUserDataByEmail(Auth::user()->email);
      $data = $request->all();
      if(!\Hash::check($data['old_password'], $user->password)){
           return back()->with('error', Config::get('constant.e-002'));
      }else{
          $bool=$this->userServiceInterface->DBUpdatePassword($request,$user);
          if($bool){
              $details = [
                  'title' => Config::get('constant.m-003'),
                  'body' => Config::get('constant.m-004')
              ];
             
              Mail::to(Auth::user()->email)->send(new \App\Mail\ChangePasswordMail($details));
             
              Auth::logout();
              Session::flush();
              return view('welcome');
          }
      }
    } 
  }

    /**
     * Logoout screen.
    */
    function logout()
    {
        Auth::logout();
        Session::flush();
        return view('welcome');
    }
}
