<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    public function index()
    {
       
    }

    public function create()
    {
        return view('/todo_create');
    }

    public function store(Request $request)
    {
        $res=new Todo;
		$res->state_id=$request->input('state_id');
		$res->name=$request->input('name');
		$res->mobile=$request->input('mobile');
		$res->email=$request->input('email');
		$res->age=$request->input('age');
		$res->location=$request->input('location');
		$res->save();
		
		$res1=new Country;
        $res1->country_name = $request->input('country_name');
        $res1->state_name = $request->input('state_name');
        $res1->save();
		
		session()->flash('msg' ,' Data is inserted');
		return redirect('/todo_show');
    }

    public function show(Todo $todo)
    {
        $todoArr = Todo::paginate(5);
        return view('todo_show', compact('todoArr'));
    }


    public function edit(Todo $todo, $country_id)
    {
        return view('/todo_edit')->with('todoArr', Todo::find($country_id));
    }

    public function update(Request $request, Todo $todo, Country $country, $country_id)
    {
        $res=Todo::find($request->country_id);
		$res->state_id=$request->input('state_id');
		$res->name=$request->input('name');
		$res->mobile=$request->input('mobile');
		$res->email=$request->input('email');
		$res->age=$request->input('age');
		$res->location=$request->input('location');
		$res->save();
		
		$res1=Country::find($request->country_id);
        $res1->country_name = $request->input('country_name');
        $res1->state_name = $request->input('state_name');
        $res1->save();

		
		session()->flash('msg',"Id of $country_id Data is Updated");
		return redirect('/todo_show');
    }

    public function destroy(Todo $todo, Request $request, $country_id)
    {
        Todo::destroy($country_id);
		
		DB::table('country')->where('country_id', $country_id)->delete();

		
		session()->flash('msg',"Id of $country_id Data deleted");
		return redirect('/todo_show');
    }
}
