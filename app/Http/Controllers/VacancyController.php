<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vacancies;

class VacancyController extends Controller
{

    public function index()
    {
        $vacancies =Vacancies::all();

        return view('vacancy',compact('vacancies'));
    }

 
    public function create()
    {
        return view('create_vacancy');
    }


    public function store(Request $request)
    {
        
        $this->validate($request,[
            'vacancy_title' => 'required',
            'vacancy_position' => 'required',
            'vacancy_number' => 'required',
            'vacancy_skill' => 'required',
            'vacancy_email' => 'required',
            'vacancy_description' => 'required',
            'vacancy_status' => 'required',
            'vacancy_deadline' => 'required'
        ]);

            $vacancy = new Vacancies;
            $vacancy->vacancy_title = $request->vacancy_title;
            $vacancy->vacancy_position = $request->vacancy_position;
            $vacancy->vacancy_number = $request->vacancy_number;
            $vacancy->vacancy_skill = $request->vacancy_skill;
            $vacancy->vacancy_email = $request->vacancy_email;
            $vacancy->vacancy_description = $request->vacancy_description;
            $vacancy->vacancy_status = $request->vacancy_status;
            $vacancy->vacancy_deadline = $request->vacancy_deadline;
            $vacancy->save();
            
            return redirect()->route('home.vacancy');
    }


    public function show($id)
    {
        $vacancy = Vacancies::find($id);
        return view('show_vacancy',compact('vacancy'));
    }

    public function edit($id)
    {
        
        $vacancy = Vacancies::find($id);
        return view('edit_vacancy',compact('vacancy'));
    }


    public function update(Request $request, $id)
    {
       
        $vacancy = Vacancies::findOrFail($id); 
     
        $updateData = $request->validate([
            'vacancy_title' => 'required',
            'vacancy_position' => 'required',
            'vacancy_number' => 'required',
            'vacancy_skill' => 'required',
            'vacancy_email' => 'required',
        
            'vacancy_description' => 'required',
            'vacancy_status' => 'required',
            'vacancy_deadline' => 'required'

        ]);
       
        
        $updateData = $request->only(["vacancy_title","vacancy_position","vacancy_number","vacancy_skill","vacancy_email","vacancy_description","vacancy_status","vacancy_deadline"]);
        Vacancies::whereId($id)->update($updateData);
        return redirect()->route('home.vacancy')->with('Student Succesfully deleted');

    }

    public function destroy($id)
    {
        Vacancies::find($id)->delete();
        return redirect()->route('home.vacancy')->with('Student Succesfully deleted');
    }
}
