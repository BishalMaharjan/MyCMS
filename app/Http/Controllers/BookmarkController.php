<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Quotation;
use App\Bookmarks;
use App\Users;
use App\Contents;
use App\Categories;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;
use Illuminate\Support\Facades\Storage;


class BookmarkController extends Controller
{
    public function index()
    {
     
        $user = Auth::id();
        $category = Categories::all();
        $bookmark = Bookmarks::all()->where('user_id',$user)->sortByDesc('bookmarked_at');
        $AllContent = Contents::orderBy('created_at', 'DESC')->take(5)->get();
        return view('index_bookmark',compact('bookmark','category','AllContent'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return redirect('/bookmark');
    }
  
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user = Auth::id();
        $content_id = $request->input('content_id');
        DB::table('Bookmarks')->where('content_id', $content_id)->where('user_id', $user)->delete();
        $storeData = $request->validate([
            'content_id' => 'required|max:255',
        ]);
        $storeData['user_id']=$user;
        $bookmark = Bookmarks::create($storeData);

        return redirect('/content_detail/'.$content_id)->with('completed', 'content has been bookmarked!');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookmark = Bookmarks::findOrFail($id);
        $bookmark->delete();
        return redirect('/bookmark/index')->with('completed','bookmark has been deleted');
       
    }

}
