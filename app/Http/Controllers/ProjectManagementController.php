<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Team;
class ProjectManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $project)
    {
        
        $project = Project::where('name', $project)->first();

        if($project->user_id != $request->user()->id){
            abort(403);
        }

        if($project){
            return view('project_management.index', ["project" => $project]);
        } else {
            abort(404);
        }
    }

    public function team($project)
    {
        $project = Project::where('name', $project)->first();
        if($project){
            $teams = Team::where('project_id', $project->id)->paginate(10);
            // dd($team);
            return view('teams.index', ["teams" => $teams]);
        } else {
            abort(404);
        }
    }


}
