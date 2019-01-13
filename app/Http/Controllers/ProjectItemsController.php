<?php

namespace App\Http\Controllers;

use App\ProjectItem;
use App\Project;
use App\CommonUseItem;
use Illuminate\Http\Request;

class ProjectItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $this->authorize('create', Project::class);

        $cseItems = CommonUseItem::all();

        return view('add_project_item', compact('project', 'cseItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $this->authorize('create', Project::class);

        // dd($request->all());
        // $attributes = $request->all();
        $attributes = $request->validate([
            'code' => 'nullable|string',
            'description' => 'required|string',
            'quantity' => 'nullable|numeric|min:1|', //gte:schedules
            'uom' => 'nullable|string', // exists? || in:array?
            'unit_cost' => 'nullable|numeric|min:1|', //lte:estimated_budget',  
            'estimated_budget' => 'required|numeric|min:1', //between 0 and dept budget
            'procurement_mode' => 'nullable|string',   //exists:procurement_modes?
            'schedules' => 'required|array',
            'schedules.*' => 'exists:schedules,id|distinct',
            'total_ppmp_budget' => 'required|numeric|between:'.$project->totalBudgetWithContingency().','.$project->department_budget->remaining 
        ]);

        $project->addItem($attributes);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectItem  $projectItem
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectItem $projectItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectItem  $projectItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectItem $projectItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectItem  $projectItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectItem $projectItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectItem  $projectItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectItem $projectItem)
    {
        //
    }
}
