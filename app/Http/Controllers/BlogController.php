<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_list['blog_list'] = Blog::all();
        return view('blog.index', $blog_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|min:3|',
            'description' => 'required',
            'status'      => 'required'

        ]);

        if ($validator->passes()) {
            Blog::create([
                'title'       => $request->title,
                'description' => $request->description,
                'status'      => $request->status
            ]);
            Toastr::success('Blog Added Successfully', 'Success', ['positionClass' => 'toast-top-center']);
        } else {
            $errMsgs = $validator->messages();
            foreach ($errMsgs->all() as $msg) {
                Toastr::error($msg, 'Required');
            }
        }
        return redirect()->route('blogs.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_single['show_single'] = Blog::where('id', $id)->first();
        return view('blog.show', $show_single);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogEdit['blogEdit'] = Blog::find($id);

        return view('blog.update', $blogEdit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|min:3|',
            'description' => 'required',
            'status'      => 'required'

        ]);

        if ($validator->passes()) {
            Blog::find($id)->update([
                'title'       => $request->title,
                'description' => $request->description,
                'status'      => $request->status
            ]);
            Toastr::success('Blog Updated Successfully', 'Success', ['positionClass' => 'toast-top-right']);
        } else {
            $errMsgs = $validator->messages();
            foreach ($errMsgs->all() as $msg) {
                Toastr::error($msg, 'Required');
            }
        }
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog_delete = Blog::find($id);
        $blog_delete->delete();
        return response()->json(['status' => 'Blog Items deleted successfully']);
    }
}