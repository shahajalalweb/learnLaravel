<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $showData = PostModel::all();
        return view("showPost", compact("showData"));
    }

    public function create()
    {
        return view("createPost");
    }

    public function store(Request $request)
    {
        $data = new PostModel();
        $data->title = $request->title;
        $data->details = $request->details;
        //For Image
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('admin'), $filename);
            $data['file'] = $filename;
        }
        $data->save();
        return redirect()->route("home");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $edit = PostModel::find($id);
        return view("createPost", compact("edit"));
    }

    public function update(Request $request, string $id)
    {
        $editData = PostModel::find($id);
        $editData->title = $request->title;
        $editData->details = $request->details;
        if ($request->file("file")) {
            $file = $request->file("file");
            $filename = date("Ymdhi") . $file->getClientOriginalName();
            $file->move(public_path("admin"), $filename);
            $editData->file = $filename;
        }
        $editData->save();
        return redirect()->route("home");
    }

    public function destroy(string $id)
    {
        $post = PostModel::find($id);
        $post->delete();
        return redirect()->route("home");
    }
}
