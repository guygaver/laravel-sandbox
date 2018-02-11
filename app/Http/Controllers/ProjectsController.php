<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectsController extends Controller
{

	 public function create()
	 {
		  return view('vue-form', ['projects' => Project::all()]);
	 }

	 public function store()
	 {
		  $this->validate(request(), [
				'name'        => 'required',
				'description' => 'required',
		  ]);

		  Project::create([
				'name'        => request('name'),
				'description' => request('description'),
		  ]);

		  return [
				'message' => 'Project Created'
		  ];
	 }
}
