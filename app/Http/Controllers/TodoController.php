<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
	/**
 	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		if(empty(Session::get('sort_name'))) {
      Session::put('sort_name', 'asc');
    }

		$todos = Todo::where('is_active', 1)->orderBy('name', Session::get('sort_name'))->get();

		return view('todo.index')->withTodos($todos);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('todo.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, array(
			'name' => 'required',
			'place' => 'required',
			'due_date' => 'required',
			'status' => 'required'
		));

		$due_date = date("Y-m-d", strtotime($request->due_date));

		$store = new Todo;
		$store->name = $request->name;
		$store->place = $request->place;
		$store->due_date = $due_date;
		$store->status = $request->status;
		$store->save();

		return redirect()->route('todo.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$todo = Todo::where('id', $id)->first();
		return view('todo.show')->withTodo($todo);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$todo = Todo::where('id', $id)->first();
		return view('todo.edit')->withTodo($todo);
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
		$this->validate($request, array(
			'name' => 'required',
			'place' => 'required',
			'due_date' => 'required',
			'status' => 'required'
		));

		$due_date = date("Y-m-d", strtotime($request->due_date));

		$update = Todo::where('id', $id)->first();
		$update->name = $request->name;
		$update->place = $request->place;
		$update->due_date = $due_date;
		$update->status = $request->status;
		$update->save();

		return redirect()->route('todo.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$delete = Todo::where('id', $id)->first();
		$delete->is_active = 0;
		$delete->save();

		return redirect()->back();
	}	
	
	public function search(Request $request)
	{
		if(empty($request->todo)) {
			return redirect()->back();
		}

		$todo = Todo::where('name', $request->todo)->first();

		return redirect()->route('todo.show', $todo->id);
	}

	
	public function sortNameAsc() {
    Session::put('sort_name', 'asc');
    return redirect()->back();
	}
	
	public function sortNameDesc() {
    Session::put('sort_name', 'desc');
    return redirect()->back();
	}

}
