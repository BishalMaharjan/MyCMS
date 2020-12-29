<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function user()
    {
        return redirect('/home');
    }


    public function editor()
    {
        $userRole = Auth::user()->rolePivots->pluck('role_id');
        if (!$userRole->contains('3')) {
            return redirect('/permission_denied');
        }
        return view('editor');
    }

    public function admin()
    {
        $userRole = Auth::user()->rolePivots->pluck('role_id');
        if (!$userRole->contains('4')) {
            return redirect('/permission_denied');
        }
        return view('admin');
    }

    public function PermissionDenied()
    {
        return view('nopepermission');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
