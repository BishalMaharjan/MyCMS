<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Users;
use App\Roles;
use App\RolePivots;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::all();
        
        $users = DB::table('users')
                    ->join('role_pivots', 'role_pivots.user_id', '=', 'users.id')
                    ->join('roles', 'roles.id', '=', 'role_pivots.role_id')
                    ->select('users.id', 'users.name', 'users.email', 'roles.role_name')
                    ->get();
        return view('user', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
       

        return view('create_user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        try {
            DB::beginTransaction();
        
            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');
            $role_id = $request->input('role_id');
           
            // dd($request);
            $data = [
                'name' => $username,
                'password' => bcrypt($password),
                'email' => $email
            ];
            // $data=array('name'=>$username,"password"=>$password,"email"=>$email);
            $user_id = Users::insertGetId($data);
            $data2=array('user_id'=>$user_id,'role_id'=>$role_id);
            DB::table('role_pivots')->insert($data2);
             
            DB::commit();
        
            return redirect()->route('home.user');
        } catch (\Exception $e) {
            DB::rollback();
            echo "\n Exception Caught", $e->getMessage();
        }
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
        $user = Users::find($id);
        
        $roles = Roles::all();
   
        return view('edit_user', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        
        $user_id = Users::find($id);
        $rolepivot = RolePivots::where('user_id', $user_id->id)
                                ->update([
                                    'role_id' => $request->role_id
                                ]);
       
        return redirect()->route('home.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::find($id)->delete();
        return redirect()->route('home.user');
    }
}
