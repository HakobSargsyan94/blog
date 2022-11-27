<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $blog = Blog::all();
        return response($blog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $content = $request->input('content') ?? null;
        $id = Auth::id();
        if ($content && $id) {
            $blog = new Blog();
            $blog->content = $content;
            $blog->user_id = $id;
            $blog->save();

            return response('success', '200');
        }

        return response('reject', '401');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        $content = $request->input('content') ?? null;
        $user_id = Auth::id();
        $blog = Blog::findOrFail($id);
        if ($content && $blog->user_id == $user_id) {
            Blog::where('id', $id)->update(['content' => $content]);

            return response('success', '200');
        } else {
            return response('You can`t update this post or set valid content', '401');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::id();
        $blog = Blog::findOrFail($id);
        if ($blog->user_id == $user_id) {
            $blog->delete();

            return response('success', '200');
        } else {
            return response('You can`t delete this post', '401');
        }
    }
}
