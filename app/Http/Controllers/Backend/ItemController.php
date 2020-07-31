<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Project;
use App\Item;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ItemController extends Controller
{
    public function exportarPdf()
    {
        $items = Item::with('project')->latest()->get();
        $pdf = PDF::loadView('reportes.items',compact('items'));

        // return $pdf->download('items-list.pdf');
        return $pdf->setPaper('a3','landscape')->stream('items-list.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::all();
        
        // $items = Item::latest()->paginate();

        $items = Item::with('project')->latest()->paginate(5);
        // $projects = Project::all();
        // $projects->load('items');

        // dd($projects);

        return view('items.index',compact('items'));
    }
    public function indexCall()
    {
        $items = Item::with('project')->latest()->paginate();
        return $items;
    }

    public function indexId(Project $project)
    {
        $items = Item::where('project_id',$project->id)->latest()->paginate(3);

        return view('items.index-id',compact('items','project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }
    public function createItem(Project $project)
    {
        // dd($project->all());
        return view('items.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        Item::create([
            'project_id' => $request->project_id,
        ] + $request->all());

        $project = Project::findOrFail($request->project_id);

            if ($request->tipo_operacion == "INGRESO") {
                $project->saldo_contable = $project->saldo_contable + $request->monto_total;
            }else{
                $project->saldo_contable = $project->saldo_contable - $request->monto_total;
            }
        $project->save();

        return back()->with('status','Registro grabado correctamente...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->update($request->all());
        $item->save();

        return back()->with('status','Registro editado correctamente...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        
        return back()->with('status','Registro eliminado correctamente');
    }
}
