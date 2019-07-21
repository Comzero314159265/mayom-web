<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($project)
    {
        $project = Project::where('name', $project)->first();
        if($project){
            return $project;
        } else {
            abort(404);
        }
    }
}
