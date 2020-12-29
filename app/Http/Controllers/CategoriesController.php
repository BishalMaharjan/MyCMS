<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Quotation;
use App\Categories;
use App\Contents;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    public function index()
    {
        $category = Categories::all();
        return view('index_categories', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_category');
    }
    public function categories()
    {
        $content = Contents::all()->sortByDesc('created_at');
        $category = Categories::all()->take(10)->where('category_status', 1);

        return view('categories', compact('category', 'content'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $url = $request->file('category_image')->store('images', 'public');
        $storeData = $request->validate([
            'category_name' => 'required|max:255',
            'category_status' => 'required|max:255',
            'category_image' => 'required',
        ]);
        $storeData['category_image'] = $url;
        $category = Categories::create($storeData);

        return redirect('categories/index')->with('completed', 'category has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('edit_category', compact('category'));
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
        $category = Categories::findOrFail($id);
        $image = $request->file('category_image');
        if ($image != '') {
            Storage::disk('public')->delete($category->category_image);
            $url = $request->file('category_image')->store('images', 'public');
            $updateData = $request->validate([
                'category_name' => 'required|max:255',
                'category_status' => 'required|max:255',
                'category_image' => 'required',
            ]);
            $url = $request->file('category_image')->store('images', 'public');
            $updateData['category_image'] = $url;
        } else {
            $updateData = $request->validate([
                'category_name' => 'required|max:255',
                'category_status' => 'required|max:255',
            ]);
        }

        Categories::whereId($id)->update($updateData);
        return redirect('categories/index')->with('completed', 'category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        Storage::disk('public')->delete($category->category_image);
        $category->delete();
        return redirect('categories/index')->with('completed', 'category has been updated');
    }
}
