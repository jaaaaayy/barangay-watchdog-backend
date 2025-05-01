<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function getAllProjects() {
        $projects = Project::with('evidences')->get();
;
        return response($projects);
    }
}
