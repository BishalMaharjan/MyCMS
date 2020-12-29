<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contents;
use App\Languages;
use App\Users;
use App\Categories;
use Illuminate\Support\Facades\Cache;



class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        if(Cache::has('data'))
        {
        $cachedata=Cache::get('data');
        return view('index_content', compact('cachedata'));

        }
        else{
            $data = Contents::all();
            Cache::put('data', $data, 10000);
        return view('index_content', compact('data'));}

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = Contents::all();
        $category = Categories::all();
        $language = Languages::all();
        $user = Users::all();
        return view('create_content', compact('content','category','language','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|max:255',
            'user_id' => 'required|max:255',
            'language_id' => 'required|max:255',
            'content_title' => 'required|max:255',
            'content_subtitle' => 'required|max:255',
            'content_description' => 'required',
            'content_image' => 'required',
            'content_location' => 'required|max:255'

        ]);

        $image = $request->file('content_image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'language_id' => $request->language_id,
            'content_title' => $request->content_title,
            'content_subtitle' => $request->content_subtitle,
            'content_description' => $request->content_description,
            'content_image' => $new_name,
            'content_location' => $request->content_location

        );

        Contents::create($form_data);

        return redirect('content/index')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Contents::findOrFail($id);
        $category = Categories::all();
        $language = Languages::all();
        return view('edit_content',compact('content','category','language'));

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
        $image_name = $request->hidden_image;
        $image = $request->file('content_image');
        if($image != '')
        {
            $request->validate([
                'category_id' => 'required|max:255',
                'user_id' => 'required|max:255',
                'language_id' => 'required|max:255',
                'content_title' => 'required|max:255',
                'content_subtitle' => 'required|max:255',
                'content_description' => 'required',
                'content_image' => 'required',
                'content_location' => 'required|max:255'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'category_id' => 'required|max:255',
                'user_id' => 'required|max:255',
                'language_id' => 'required|max:255',
                'content_title' => 'required|max:255',
                'content_subtitle' => 'required|max:255',
                'content_description' => 'required',
                'content_location' => 'required|max:255'
            ]);
        }

        $form_data = array(
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'language_id' => $request->language_id,
            'content_title' => $request->content_title,
            'content_subtitle' => $request->content_subtitle,
            'content_description' => $request->content_description,
            'content_image' => $new_name,
            'content_location' => $request->content_location

        );
  
        Contents::whereId($id)->update($form_data);

        return redirect('content/index')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Contents::findOrFail($id);

        $data->delete();
        return redirect('content/index')->with('success', 'Data is successfully deleted');
    }
}
