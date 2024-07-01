<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartyCreateRequest;
use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Party List';
        // $data['party'] = Party::all();
        return view('party.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Party';
        return view("party.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartyCreateRequest $request)
    {
        $data = $request->all();
        $data["created_by"] = Party::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        //
    }
}
