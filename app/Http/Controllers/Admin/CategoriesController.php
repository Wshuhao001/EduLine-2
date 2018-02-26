<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'group' => 'required'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index');

    }


}
