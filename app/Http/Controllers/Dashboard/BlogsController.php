<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;

class BlogsController extends Controller
{



    function deleteItem(Request $request)
    {


        $request->validate([
            'id' => 'required',

        ]);

        $data = Blog::find($request->id);
        $data->delete();
        return back()->with('msg', 'Deleted succesfully');
    }

    function addItem(Request $request)
    {


        $request->validate([

            'blog_type' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'author_en' => 'required',
            'author_ar' => 'required',
            'blog_footer_en' => 'required',
            'blog_footer_ar' => 'required',
            'publish_date' => 'required',

        ]);

        $data = new Blog();

        $data->blog_type = $request->blog_type;
        $data->title_en = $request->title_en;
        $data->title_ar = $request->title_ar;
        $data->content_en = $request->content_en;
        $data->content_ar = $request->content_ar;
        $data->author_en = $request->author_en;
        $data->author_ar = $request->author_ar;
        $data->blog_footer_en = $request->blog_footer_en;
        $data->blog_footer_ar = $request->blog_footer_ar;
        $data->publish_date = $request->publish_date;


        $data->save();
        return back()->with('msg', 'Added succesfully');
    }

    function editItem(Request $request)
    {


        $request->validate([

            'blog_type' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'author_en' => 'required',
            'author_ar' => 'required',
            'blog_footer_en' => 'required',
            'blog_footer_ar' => 'required',
            'publish_date' => 'required',

        ]);


        $data = Blog::find($request->id);

        $data->blog_type = $request->blog_type;
        $data->title_en = $request->title_en;
        $data->title_ar = $request->title_ar;
        $data->content_en = $request->content_en;
        $data->content_ar = $request->content_ar;
        $data->author_en = $request->author_en;
        $data->author_ar = $request->author_ar;
        $data->blog_footer_en = $request->blog_footer_en;
        $data->blog_footer_ar = $request->blog_footer_ar;
        $data->publish_date = $request->publish_date;


        $data->save();
        return back()->with('msg', 'Edited successfully');
    }
}
