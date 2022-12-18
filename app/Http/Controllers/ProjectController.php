<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->join('customers', 'customers.id', '=', 'projects.customer_id')
            ->select('projects.*', 'users.name as user_name', 'customers.name as customer_name')
            ->get();

        return view('project/projects',compact('projects'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('project/edit',compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->title = $request['title'];
        $project->description = $request['description'];
        $project->created_date = $request['created_date'];
        $project->end_date = $request['end_date'];
        $project->progress = $request['progress'];
        $project->status = $request['status'];

        $project->save();
        return Redirect::route('project.edit',$id)->with('status', 'project-updated');

    }

    public function destroy($id)
    {
        $project = Project::find($id);
        try {
            $project->delete();
        } catch (\Throwable $th) {
            return Redirect::route('project.index')->withErrors($th->getMessage());
        }

        return Redirect::route('project.index');
    }
}
