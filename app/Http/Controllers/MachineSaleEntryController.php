<?php

namespace App\Http\Controllers;

use App\DataTables\MachineSalesEntryDataTable;
use App\Models\MachineSalesEntry;
use Illuminate\Http\Request;

class MachineSaleEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MachineSalesEntryDataTable $dataTable)
    {
        $data['title'] = 'Machine Sales Entry';
        return $dataTable->render('MachineSalesEntry.index', $data);
        return view('MachineSalesEntry.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Machine Sales Entry';
        return view('MachineSalesEntry.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MachineSalesEntry $machineSalesEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MachineSalesEntry $machineSalesEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MachineSalesEntry $machineSalesEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MachineSalesEntry $machineSalesEntry)
    {
        //
    }
}
