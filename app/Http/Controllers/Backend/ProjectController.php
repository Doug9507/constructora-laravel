<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Project;
use App\Item;
// use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Barryvdh\DomPDF\Facade as PDF;

class ProjectController extends Controller
{
    public function exportarPdf()
    {
        $projects = Project::latest()->get();
        $pdf = PDF::loadView('reportes.projects',compact('projects'));

        // return $pdf->download('items-list.pdf');
        return $pdf->setPaper('a3','landscape')->stream('projects-list.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::latest()->paginate(3);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        // dd($request->all());

        $project = Project::create([
            'user_id' => auth()->user()->id,
            'saldo_contable' => 0.00,
        ] + $request->all());

        // $project = Project::create([
        //     'user_id' => auth()->user()->id,
        //     'nombre_proyecto' => $request->nombre_proyecto,
        //     'saldo_contable' => 0.00,
        //     'entidad_solicitante' => $request->entidad_solicitante,
        //     'contratista' => $request->contratista,
        //     'monto_contratado' => $request->monto_contratado,
        //     'inicio_obra' => $request->inicio_obra,
        //     'fin_obra' => $request->fin_obra
        // ]);

        return back()->with('status','¡Grabado Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        $project->save();

        return back()->with('status','Obra editada satisfacctoriamente...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $items = Item::where('project_id',$project->id)->get();

        foreach ($items as $item) {
            $item->delete();
        }

        $project->delete();

        return back()->with('status','Obra eliminado correctamente...');
    }
}
