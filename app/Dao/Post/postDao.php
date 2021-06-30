<?php

namespace App\Dao\Post;

use Illuminate\Http\Request;
use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use App\Imports\postImport;
use Session;
use DB;
use Excel;
use File;
use Auth;

class postDao implements PostDaoInterface
{
    public function insertPost(Request $request){
        try{
            $data=$request;
            $post=new Post();
            $post->title=$data['title'];
            $post->description=$data['description'];
            $post->status=1;
            $post->created_user_id=Session::get('id');
            $post->updaed_user_id=Session::get('id');
            $post->save();
            return true;
        }catch(Exception $e){
            return false;
        } 
    }

    public function getPostData(){
        return DB::table('posts')
                ->select('posts.id','users.email','posts.title','posts.description')
                ->join('users','users.id','=','posts.created_user_id');
    }

    public function getPostTitle(){
        return DB::table('posts')
                ->select('posts.title')
                ->get();
    }

    public function getPostDataDetail(post $post){
        return DB::table('posts')
                ->select('posts.id','users.name','posts.title','posts.description')
                ->join('users','users.id','=','posts.created_user_id')
                ->where('posts.id',$post->id)
                ->get();
    }

    public function updatePost(Request $request,post $post){
        try{
            $title=$request->input('title');
            $description=$request->input('description');
            $updated_at=now();
            DB::update('update posts set title=?,description=?,updated_at=? where id=?',[$title,$description,$updated_at,$post->id]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function searchPost(string $email,Request $request){
        $search = $request->search;
        return DB::table('posts')
                ->select('posts.id','users.email','posts.title','posts.description')
                ->join('users','users.id','=','posts.created_user_id')
                ->where('title','like','%'.$search.'%')
                ->where('users.email',$email);
    }

    public function getExcelFileData(Request $request){
        return Excel::toArray(new PostImport,$request->file('file'));
    }
}