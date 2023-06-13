<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContentController extends Controller
{
    function index()
    {
        if (Auth::check()) {
            $contents = Content::latest()->get();
            return view('home', compact('contents'));
        }
        return redirect(route('login'))->with('fail', 'Customer should login first!');
    }
    function content()
    {
        return view('article.add');
    }
    function add(Request $request)
    {
        $content = new Content();
        $content->user_id = request()->user_id;
        $content->content = request()->content;
        if ($request->hasFile('content_photo')) {
            $file = $request->file('content_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/content/', $filename);
            $content->content_photo = $filename;
        }
        $content->save();
        return redirect(route('home'));
    }
    function edit($id)
    {
        $content = Content::find($id);
        if (Gate::allows('content-edit', $content)) {
            return view('article.edit', compact('content'));
        }
        return back();
    }
    function update(Request $request)
    {
        $id = $request->content_id;
        $content = Content::find($id);
        $content->user_id = request()->user_id;
        $content->content = request()->content;
        if ($request->hasFile('content_photo')) {
            $file = $request->file('content_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/content/', $filename);
            $content->content_photo = $filename;
        }
        $content->save();
        return redirect(route('home'));
    }
    function delete($id)
    {
        $content = Content::find($id);
        if (Gate::allows('content-delete', $content)) {
            $content->delete();
            return redirect(route('home'));
        }
        return back();
    }
    function detail($id)
    {
        $content = Content::find($id);
        return view('article.detail', compact('content'));
    }
}
