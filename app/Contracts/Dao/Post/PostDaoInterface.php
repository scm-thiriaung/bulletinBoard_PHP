<?php

namespace App\Contracts\Dao\Post;

use Illuminate\Http\Request;
use App\Models\Post;

interface postDaoInterface
{
  public function insertPost(Request $request);
  //get user list
  public function getPostData();
  public function getPostTitle();
  public function getPostDataDetail(post $post);
  public function updatePost(Request $request,post $post);
  public function searchPost(string $email,Request $request);
  public function getExcelFileData(Request $request);
}