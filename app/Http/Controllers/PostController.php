<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Exports\postExport;
use App\Imports\postImport;
use App\Models\Post;
use Session;
use Auth;
use DB;
use Excel;
use File;
use Config;

class PostController extends Controller
{
    protected $postServiceInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postServiceInterface = $postServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Post $post (Post Data)
    */
    public function index(post $post){
        $posts = $this->postServiceInterface->getPostData()->paginate(6);
        return view('post.postList')->with('posts',$posts);
    }

    /**
     * Searching the post with post title.
     * 
     * @param Request $request (Request post title data from user)
    */
    public function findPost(Request $request)
    {
        $posts=$this->postServiceInterface->searchPost(Auth::user()->email,$request)->paginate(6);
        return view('post.postList')->with('posts',$posts);			
    }

    /**
     * Decide whether to go postCreate screen or postExport screen.
     * 
     * @param Request $request (Button submit)
    */
    public function postMethod(Request $request){
        switch($request->submit){
            case 'create': return redirect()->route('post.create');
                            break;
            
            case 'download' : return redirect()->route('exportExcel');
                                break;
        }
    }

    /**
     * Show the form for creating a new post.
    */
    public function create(){
        return view('post.create');
    }

    /**
     * Store a newly created post in database.
     *
     * @param Request $request (Request data from User)
    */
    public function store(Request $request){
        $validatedData=[
            'title'=>'required|min:3|max:50|unique:posts,title',
            'description'=>'required|min:3|max:255',
        ];
        $validator=Validator::make($request->all(),$validatedData);
        if($validator->fails()){
            return redirect()->route('post.create')
			->withInput()
			->withErrors($validator);
        }
        else{
            $check=$this->postServiceInterface->insertPost($request);
            if($check){
                return redirect()->route('post.index');
            }
            else{
                return redirect()->route('post.create')->withInput();
            }
        }
    }

    /**
     * Show detail data of post
     *
     * @param post $post (Post detail data from PostList Screen)
    */
    public function show(post $post){
        $posts=$this->postServiceInterface->getPostDataDetail($post);
        return view('post.postDetail')->with('post',$posts);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  post  $post (Post data from PostDetail screen)
    */
    public function edit(post $post)
    {
        return view('post.edit')->with('post',$post);
    }

    /**
     * Update the specified post in database.
     *
     * @param  post  $post (Post data from PostDetail screen)
     * @param Request $request (Request data from User)
    */
    public function update(Request $request, Post $post)
    {
        $validatedData =[
            'title'         => 'required|min:3|max:255|unique:posts,title',
            'description'   => 'required|min:3'
          ];

        $validator=Validator::make($request->all(),$validatedData);
        if($validator->fails()){
            return redirect()->route('post.edit',$post)
			->withInput()
			->withErrors($validator);
        }
        else{
            $bool=$this->postServiceInterface->updatePost($request,$post);
            if($bool){
                return redirect()->route('post.index');
            }else{
                return redirect()->route('post.edit')->withInput();
            }
        }
    }

    /**
     * Remove the specified post from database.
     *
     * @param  post  $post (Post data from PostDetail screen)
    */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    /**
     * Export to CSV   
    */
    public function exportExcel()
    {
        return Excel::download(new PostExport(Auth::user()->email), 'post.xlsx');
    }

    /**
     * Import Excel
     *
     * @param Request $request (File from User)
    */
    public function importExcel(Request $request) 
    {
        $validatedData = [
           'file' => 'required',
        ];
        $validator=Validator::make($request->all(),$validatedData);
        if($validator->fails()){
            return redirect()->route('post.index')->with('message', Config::get('constant.m-005'));
        }else{
            if($request->hasFile('file')){
                $extension = File::extension($request->file->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                    $path = $request->file->getRealPath();
                    $data = $this->postServiceInterface->getExcelFileData($request);
                    $bool=false;
                    $title= $data[0][0]['title'];
                    $post=$this->postServiceInterface->getPostTitle();
                    foreach($post as $p){
                        if($title==$p->title){
                            $bool=true;
                        }
                    }
                    if($bool){
                        return redirect()->route('post.index')->with('message', Config::get('constant.m-006'));
                    }else{
                        Excel::import(new PostImport,$request->file('file'));
                        return redirect()->route('post.index')->with('message', Config::get('constant.m-007')); 
                    }
                }
            }
        }
    }
}
