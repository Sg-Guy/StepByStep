<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

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
        //taches en retard
        $date1 = Carbon::now() ;
        $lateTasks = Task::where('user_id' , auth()->id()) 
                            ->where('taskDueDate','<' , $date1)
                            ->where('taskStatus','!' , 'terminee')
                            ->count();

        return view('tasks' , compact('tasks' , 'lateTasks')) ;
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
        return redirect()->back()->with('succes' , 'Tâche suppimée') ;
    }


    /**
     * Find all done tasks
     */
    public function done()
    {
        $taskdone = Task::where('user_id', auth()->id())
                    ->where('taskStatus',"=" , 'terminee')
                    ->get();
        return view('taskDone' , compact('taskdone')) ;
    }
    
    /**
     * Taches en retard
     */
    public function late(Request $request)
    {
        $action = $request->action_type;
        if ($action == 'today') {

            $tasks = Task::where('user_id', auth()->id())
                        ->where('taskDueDate',"=" , now()->format('Y-m-d'))
                        ->get();

            $title = "Les tâches du jour" ;
            $taskcount = count( $tasks);
            $vide = "Aucune tâche Pour la journée d'aujourd'hui." ;
            $message = " Total de ** $taskcount ** tâches pour aujourd'hui";

            return view('taskDone' , compact('tasks' , 'title' , 'message' , "vide")) ;

        } elseif ($action == 'thisweek') {
            $startOfWeek = Carbon::now()->startOfWeek();

            // Définir la fin de la semaine actuelle (par exemple, dimanche 23:59:59)
            $endOfWeek = Carbon::now()->endOfWeek();

            // Récupérer les tâches dont la date se situe dans cette plage
            $tasks = Task::whereBetween('taskDueDate', [$startOfWeek, $endOfWeek])
                        ->where('user_id', auth()->id())
                        ->get();

            $title = "Les tâches de la semaine" ;
            $taskcount = count( $tasks);
            $vide = "Aucune tâche Pour cette semaine" ;
            $message = " Total de ** $taskcount ** tâches pour cette semaine";
            return view('taskDone' , compact('tasks' , 'title' , 'message', 'vide')) ;

        }elseif ($action == 'late') {
            $now  = Carbon::now()->format('Y-m-d') ;
            $tasks = Task::where('user_id', auth()->id())
            ->where('taskDueDate',"<" , $now)
            ->where('taskStatus' , '!=' , 'terminee')
                        ->get();
            
            $title = "Tâches en retard" ;
            $taskcount = count( $tasks);
            $vide = "Aucune tâche en retard" ;
            $message = " Total de ** $taskcount ** tâches en retard";
            return view('taskDone' , compact('tasks' , 'title' , 'message', 'vide')) ;

        }elseif ($action == 'done') {
            $tasks = Task::where('user_id', auth()->id())
                        ->where('taskStatus',"=" , 'terminee')
                        ->get();
            
            $title = "Tâches terminées" ;
            $taskcount = count( $tasks);
            $vide = "Aucune tâche terminée pour le moment." ;
            $message = " Total de ** $taskcount ** tâches terminées";
            return view('taskDone' , compact('tasks' , 'title' , 'message', 'vide')) ;

        }elseif ($action == 'urgent') {
            $tasks = Task::where('user_id', auth()->id())
                        ->where('taskCategory',"=" , 'urgent')
                        ->where('taskStatus','!=' , 'terminee')
                        ->get();
            
            $title = "Tâches urgentes" ;
            $taskcount = count( $tasks);
            $vide = "Aucune tâche urgente en cours." ;
            $message = " Total de ** $taskcount ** tâches urgente(s)";
            return view('taskDone' , compact('tasks' , 'title' , 'message', 'vide')) ;

        }
    }
}
