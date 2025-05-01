<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function getAllProjects() {
        $projects = Project::with(['creator', 'evidences'])->get();
;
        return response($projects);
    }
}
