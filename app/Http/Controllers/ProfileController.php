<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use function Symfony\Component\Clock\now;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function dash()
    {
        //Toutes les tâches
        $all = Task::where('user_id' , auth()->id());
        

        //Récuperation des tâches récentes
        $tasks = Task::where('user_id' , auth()->id())->orderBy('created_at' , 'desc')->paginate(5) ;
        
        //les tâches dont la date d'échéance est égale à la date d'aujourd'hui
        $taskToday = Task::where('user_id' , auth()->id())->whereDate('taskDueDate' , Carbon::today())->get() ;
        
        //taches en retard
        $date1 = Carbon::now() ;
       $lateTasks = Task::where('user_id' , auth()->id()) 
                            ->where('taskDueDate','<' , $date1)
                            ->count();

        //taches termineés
        $doneTasks = Task::where('user_id' , auth()->id())
                            ->where('taskStatus' , 'terminee')->count();

        // nombre de tâches dont la date d'échéance est égale à la date d'aujourd'hui

        return view('dashboard' , compact('tasks', 'taskToday' , 'all' , 'lateTasks' , 'doneTasks')) ;
        
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
