<?php

namespace App\Http\Controllers;
use App\Events\NewPostCreated;
use App\Notifications\NewPost;
use App\Advertisments;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Notification;

class AdvertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Advertisments::latest()->paginate(5);
        return view('index_advertisment', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::all();
        return view('create_advertisment', compact('category'));
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
            'advertisment_image' =>  'required|image|max:2048',
            'category_id'  =>  'required',
            'created_at' =>  'required'
        ]);

        $image = $request->file('advertisment_image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'advertisment_image'  =>   $new_name,
            'category_id'  =>  $request->category_id,
            'created_at'        =>   $request->created_at

        );

        $advertisment = Advertisments::create($form_data);
        event(new NewPostCreated($advertisment));
        // Notification::route('mail', 'sabin.maharjan@auxfin.com')->notify(new NewPost($advertisment));

        return redirect('advertisment/index')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Advertisments::findOrFail($id);
        return view('view_advertisment', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = Advertisments::findOrFail($id);
        $category = Categories::all();
        return view('edit_advertisment', compact('data','category'));
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
        $image = $request->file('advertisment_image');
        if($image != '')
        {
            $request->validate([
                'advertisment_image' =>  'required|image|max:2048',
                'category_id'  =>  'required',
                'created_at'     =>  'required'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'category_id'  =>  'required',
                'created_at'     =>  'required'
            ]);
        }

        $form_data = array(
            'advertisment_image'  =>  $image_name,
            'category_id'  =>  $request->category_id,
            'created_at'        =>   $request->created_at
        );
  
        Advertisments::whereId($id)->update($form_data);

        return redirect('advertisment/index')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Advertisments::findOrFail($id);
        
        $data->delete();

        return redirect('advertisment/index')->with('success', 'Data is successfully deleted');
    }
}
