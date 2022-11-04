<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = category::all();
        return view ('categories.index',[
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $input = $request->all();
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $folderTujuan = 'uploads/';
            $namaFile = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path($folderTujuan), $namaFile);
            $input['gambar'] = $namaFile;
        }
        category::create($input);
        return redirect(route('categories.index'));
    }

    public function delete($id)
    {
        $category = category::findOrFail($id);
        @unlink(public_path('uploads/' . $category->gambar));
        $category->delete();
        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        $category = category::find($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        $input = $request->all();
        $category = Category::find($id);
        $category->update($input);
        return redirect(route('categories.index'));
    }
}
