<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodosRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index', ['todos' => Todo::all()]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function storeTodo(TodosRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $request->session()->flash('alert-success', 'Todo Created successfully');
        return redirect()->route('todoIndex');
    }

    public function edit($id)
    {
        // echo $id;die;
        $data['todoInfo'] = Todo::where(['id' => $id])->get();
        return view('todos.edit', $data);
    }

    public function editSave(Request $request)
    {
        $response = Todo::where(['id' => $request['todoID']])->update([
            'title' => $request['title'],
            'description' => trim($request['description'])
        ]);

        $request->session()->flash('alert-update-success', 'Todo Updated successfully');
        return redirect()->route('todoIndex');
    }

    public function delete($id)
    {
        Todo::where(['id' => $id])->delete();
        session()->flash('alert-delete-success', 'Todo Deleted successfully');
        return redirect()->route('todoIndex');
    }
}
