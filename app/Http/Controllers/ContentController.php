<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Quotation;
use App\Contents;
use App\Categories;
use App\Languages;
use App\Users;
use Illuminate\Support\Facades\Hash;
use Bioudi\LaravelMetaWeatherApi\Weather;
use Validator;
use DB;

use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    public function index()
    {        
         if(Cache::has('content')) {
        $content = Cache::get('content');
        return view('index_content', compact('content'));
   } else {
        $content = Contents::with('Categories','Languages','Users')->orderBy('created_at', 'DESC')->get();
        Cache::put('content', $content, 500);
        return view('index_content', compact('content'));
    }
        

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function view_contents()
    {  
       $content = Contents::with('Categories','Languages','Users')->orderBy('created_at', 'ASC')->get();
       $category = Categories::all()->take(10)->where('category_status',1);
       return view('contents')->with(compact('content','category'));
       $content = Contents::all();
       
    }*/
    #based on categories for admin 
    public function category_contents($category_id)
    
    { 
        $category = Categories::all()->take(10)->where('category_status',1);
        $content = Contents::all()->where('category_id', $category_id);
        return view('content_category')->with(compact('content','category'));

    }
   
    #admin 
    public function category_contents_index($category_id)
    
    { 
        $category = Categories::all()->take(10)->where('category_status',1);
        $content = Contents::all()->where('category_id', $category_id);
        return view('content_categories_index')->with(compact('content','category'));

    }

    public function create()
    {  
        $category = Categories::all()->take(10)->where('category_status',1);
        $language = Languages::all();
        $user = Users::all();
        return view('create_content', compact('category','language','user'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $url= $request->file('content_image')->store('images','public');
        $user = Auth::id();
        $storeData = $request->validate([
            'category_id' => 'required|max:255',
            'language_id' => 'required|max:255',
            'content_title' => 'required|max:255',
            'content_subtitle' => 'required|max:255',
            'content_description' => 'required',
            'content_image' => 'required',
            'content_location' => 'required|max:255',
        ]);
        
        $storeData['user_id'] = $user;
        $storeData['content_image'] = $url;
        $content = Contents::create($storeData);

        return redirect('content/index')->with('completed', 'content has been saved!');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $content = Contents::findOrFail($id);
        $category = Categories::all()->take(10)->where('category_status',1);
        $AllContent = Contents::orderBy('created_at', 'DESC')->take(5)->where('id', '!=', $id)->get();
        $CategoryContents = Contents::orderBy('created_at', 'DESC')->take(5)->where('id', '!=', $id)->where('category_id', '=', $content->category_id)->get();
        return view('content_detail', compact('content','category','AllContent','CategoryContents'));
    }

    public function show_index($id)
    {   
        $content = Contents::findOrFail($id);
        return view('content_detail_index', compact('content'));
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
        $category = Categories::all()->take(10)->where('category_status',1);
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
        $content = Contents::findOrFail($id); 
        $image = $request->file('content_image');
        if($image != '')
        {
        Storage::disk('public')->delete($content->content_image);
        $url = $request->file('content_image')->store('images','public');
        $updateData = $request->validate([
            'category_id' => 'required|max:255',
            'language_id' => 'required|max:255',
            'content_title' => 'required|max:255',
            'content_subtitle' => 'required|max:255',
            'content_description' => 'required',
            'content_image' => 'required',
            'content_location' => 'required|max:255',
        ]);
        $url = $request->file('content_image')->store('images','public');
        $updateData['content_image'] = $url;

        } else {
            $updateData = $request->validate([
                'category_id' => 'required|max:255',
                'language_id' => 'required|max:255',
                'content_title' => 'required|max:255',
                'content_subtitle' => 'required|max:255',
                'content_description' => 'required',
                'content_location' =>'required|max:255',
        ]);  
        }
       
        Contents::whereId($id)->update($updateData);
        return redirect('content/index')->with('completed','content has been updated');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Contents::findOrFail($id);
        Storage::disk('public')->delete($content->content_image);
        $content->delete();
        return redirect('content/index')->with('completed','content has been updated');
    }

}
