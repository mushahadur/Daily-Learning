<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WordContent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WordContentController extends Controller
{
    public function index()
    {
        $content = WordContent::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.content.index', compact('content'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required'],
                'price' => ['required|numeric'],
                'description' => ['required'],
            ]);

            $content = new WordContent([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            $content->save();
            Alert::success('Congratulation', 'Content Create Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('You must fillup all the field');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $content = WordContent::where('id', $id)->first();
        return view('admin.pages.content.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        try {
            $request->validate([
                'name' => ['required'],
                'price' => ['required|numeric'],
                'description' => ['required'],
            ]);

            $content = WordContent::find($id);

            $content->name = $request->name;
            $content->price = $request->price;
            $content->description = $request->description;

            $content->update();
            Alert::success('Congratulation', 'Content Update Successfully');
            return redirect('admin/content');
        } catch (\Throwable $th) {
            Alert::error('You must fillup all the field');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $content = WordContent::findOrFail($id);
            $content->delete();
            Alert::success('Congratulation', 'Content Delete Successfully');
            return redirect('admin/content');
        } catch (\Throwable $th) {
            Alert::success('Something went worng');
            return redirect()->back();
        }
    }
}
