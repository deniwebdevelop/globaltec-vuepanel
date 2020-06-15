<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Todo;
use Session;

class TodoController extends Controller
{
    public function index(){
        return view('backend.todo.index');
    }

    public function create(){
        return view('backend.todo.create');
    }

    public function store(Request $request){
        Todo::create($request->all());
        Session::flash('success');
        return redirect()->route('todo.create');
    }

    public function edit(){
        return view('backend.todo.edit');
    }

}
