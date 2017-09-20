<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\Task;


Route::get('/', function () {
    //get tasks from DB as a collection
    $tasks = Task::orderBy('created_at', 'asc')->get();

    //return view with tasks collection passed in
    return view('tasks.index', [
        'tasks' => $tasks
    ]);
});

Route::post('/task', function (Request $request) {
    //validate that its less than 255 characters and not empty
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    
    //if validation fails, redirect to home and show error
    if ($validator -> fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    //add task to db
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return Redirect('/');
});

Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return Redirect('/');
});