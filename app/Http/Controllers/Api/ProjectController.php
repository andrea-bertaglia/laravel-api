<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'technologies'])->paginate(5);

        $data = [
            'results' => $projects,
            'success' => true
        ];

        return response()->json($data);
    }

    public function show(string $project)
    {
        // dd($project);
        $project = Project::with('type', 'technologies')->where('slug', $project)->first();

        $data = [
            'results' => $project,
            'success' => true
        ];
        // dd($data);

        return response()->json($data);
    }
}
