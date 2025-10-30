<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /*Dashbord
    public function index()
    {
        //Toutes les tâches
        $all = Task::where('user_id' , auth()->id());
        
        

        // nombre de tâches dont la date d'échéance est égale à la date d'aujourd'hui
        return view('Dashbord_view' , compact('tasks' , 'all')) ;
        
    }*/

    public function all () {
        //Toutes les tâches
        $tasks = Task::where('user_id' , auth()->id())->orderBy('created_at' , 'desc')->get();
        //dd($tasks) ;
        return view('tasks' , compact('tasks')) ;
    }

    //Formulaie de création
    public function create()
    {
        return view('create_task') ;
    }

    //Méthode pour le stockage
    public function store(Request $request)
    {
    
        $task = new Task() ;
        $task->taskTitle = $request->taskTitle ;
        $task->taskDescription = $request->taskDescription ;
        $task->taskCategory = $request->taskCategory ;
        $task->taskPriority = $request->taskPriority ;
        $task->taskDueDate = $request->taskDueDate ;
        $task->taskReminder = $request->taskReminder ;

        $request->user()-> tasks()->save($task);
 
        return redirect()->route('all_tasks')->with("success" , "Tâche créée avec succès") ;
    }

    
    //Voir une Tàche spécifique
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edittask' , compact('task')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
       $task->taskTitle = $request->taskTitle ;
       $task->taskDescription = $request->taskDescription ;
       $task->taskCategory = $request->taskCategory ;
       $task->taskPriority = $request->taskPriority ;
       $task->taskDueDate = $request->taskDueDate ;
       $task->taskReminder = $request->taskReminder ;
       $task->taskStatus = $request->taskStatus ;

       $request->user()->tasks()->save($task);

        return redirect()->route('all_tasks')->with("success" , "Tâche mise à jour") ;
    }
    public function patch(Request $request, Task $task)
    {
       $task->taskStatus = $request->taskStatus ;

       $task-> update();
       
        return redirect()->route('all_tasks')->with("success" , "Tâche mise à jour") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('all_tasks') ;
    }
}
