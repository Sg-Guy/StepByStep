<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
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

    public function index () {
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
    public function store(TaskRequest $request)
    {
        
    
        $task = new Task($request->validated()) ;
        $task->user_id = auth()->user()->id; 
        $task->taskStatus = $request->taskStatus ?? 'en pause' ;
        

        $task->save();
 
        return redirect()->route("all_tasks")->with("success" , "Tâche créée avec succès") ;
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
        if(($task->user_id) == (auth()->user()->id) ) {
            return view('edittask' , compact('task')) ;
        } else  {
           abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        if(($task->user_id) == (auth()->user()->id) ) {
            $task = new Task($request->validated()) ;
            $task->user_id = auth()->user()->id; 
            
            $task->update();
     
             return redirect()->route('all_tasks')->with("success" , "Tâche mise à jour") ;
        } else {
            abort(404) ;
        }
    }

    public function patch(TaskRequest $request, Task $task)
    {
       $task->taskStatus = $request->taskStatus ;
       $task-> save() ;
       
        return redirect()->back()->with("success" , "Tâche mise à jour") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , Task $task)
    {
        //Task::where('id' , "=" , $task->id)->get();
        $task->delete();
        return redirect()->route('all_tasks') ;
    }


    /**
     * Find all done tasks
     */
    public function done()
    {
        $taskdone = Task::where('taskStatus',"=" , 'terminee')->get();
        return view('taskDone' , compact('taskdone')) ;
    }
}
