<?php

namespace App\Modules\Blog\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Blog\Models\Blog;

class BlogController extends Controller
{

    public function __construct() {
        //
    }

    public function actionBlogIndex() {
        if (view()->exists('blog.blog_index')) {

            $data = [
            ];
            
            return view('blog.blog_index', $data);
        } else {
            abort('404');
        }
    }

    public function actionBlogView() {
        if (view()->exists('blog.blog_view')) {

            $data = [
            ];
            
            return view('blog.blog_view', $data);
        } else {
            abort('404');
        }
    }

}
