<?php

namespace App\Http\Controllers;

use App\MarketingTeams;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MarketingTeams::all();
        return view('index_marketing', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_marketing');
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
            'mt_name' =>  'required',
            'mt_phone'  =>  'required',
            'mt_designation' =>  'required',
            'mt_sector' =>  'required',
            'mt_email' =>  'required'
        ]);

        $form_data = array(
            'mt_name'  =>  $request->mt_name,
            'mt_phone'        =>   $request->mt_phone,
            'mt_designation'  =>  $request->mt_designation,
            'mt_sector'  =>  $request->mt_sector,
            'mt_email'  =>  $request->mt_email

        );

        MarketingTeams::create($form_data);

        return redirect('marketing/index')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MarketingTeams::findOrFail($id);
        return view('view_marketing', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MarketingTeams::findOrFail($id);
        return view('edit_marketing', compact('data'));
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
        $request->validate([
            'mt_name' =>  'required',
            'mt_phone'  =>  'required',
            'mt_designation' =>  'required',
            'mt_sector' =>  'required',
            'mt_email' =>  'required'
        ]);
        

        $form_data = array(
            'mt_name'  =>  $request->mt_name,
            'mt_phone'        =>   $request->mt_phone,
            'mt_designation'  =>  $request->mt_designation,
            'mt_sector'  =>  $request->mt_sector,
            'mt_email'  =>  $request->mt_email
        );
  
        MarketingTeams::whereId($id)->update($form_data);

        return redirect('marketing/index')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MarketingTeams::findOrFail($id);
        $data->delete();

        return redirect('marketing/index')->with('success', 'Data is successfully deleted');
    }
}
