<?php

namespace Nezaboravi\Ladmin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nezaboravi\Ladmin\Post;
use Validator;
use Nezaboravi\Ladmin\Tag;

/**
 * Class PostController
 *
 * @package VBlog\Http\Controllers\Admin
 */
class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts =  Post::orderBy('created_at', 'desc')
                      ->paginate(10);
        return view('admin::posts.index', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin:.posts.create');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // validate the form
        $validator = Validator::make($request->all(),
            [
                'description' => 'required',
                'title'       => 'required',
                'body'        => 'required|min:50',
            ],
            [
                'description.required' => 'Meta description is required',
                'title.required'       => 'Title is required',
                'body.required'        => 'Post body is required',
                'body.min'             => 'Post must have at least 50 chars',
            ]);
        if ($validator->fails())
        {
            return redirect('/admin/post/create')->withErrors($validator)->withInput($request->all());
        }
        $post = auth()->user()->publish(new Post(request(['description', 'title', 'body', 'featured_photo'])));
        $tags = explode(',', request('tags_selected'));
        foreach($tags as $tag)
        {
            $tag = Tag::where('id', $tag)->first();
            $post->tags()->attach($tag);
        }
        // redirect
        return redirect()->home();
    }
}
