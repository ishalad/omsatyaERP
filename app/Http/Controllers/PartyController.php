<?php

namespace App\Http\Controllers;

use App\DataTables\partiesDataTable;
use App\Http\Requests\PartyCreateRequest;
use App\Models\Party;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(partiesDataTable $dataTable)
    {
        $data['title'] = 'Party List';
        return $dataTable->render('party.index', $data);
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
        if ($request->validated()) {
            Party::create($data);
            Toastr::success('Party created successfully');
            return redirect()->route('parties.index')->with('success', 'Party created successfully');
        } else {
            return redirect()->route('parties.create')->with($request->errors());
        }

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
        $data['title'] = 'Edit Party';
        $data['party'] = $party;
        return view("party.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartyCreateRequest $request, Party $party)
    {
        $data = $request->all();
        if ($request->validated()) {
            $party->update($data);
            Toastr::success('Party updated successfully');
            return redirect()->route('parties.index')->with('success', 'Party updated successfully');
        } else {
            return redirect()->route('parties.edit', $party)->with($request->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        $party->delete();
        Toastr::success('Party deleted successfully');
        return response()->json(['message' => 'Party deleted successfully']);
    }
}
