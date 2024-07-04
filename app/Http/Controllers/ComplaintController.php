<?php

namespace App\Http\Controllers;

use App\DataTables\ComplaintDataTable;
use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{


    public function index(ComplaintDataTable $dataTable)
    {
        $data['title'] = 'Complaint List';
        return $dataTable->render('complaint.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Complaint';
        return view('complaint.create', $data);
    }

    public function store(ComplaintRequest $request)
    {
        if ($request->validated()) {
            Complaint::create($request->all());
            return redirect()->route('complaints.index')->with('success', 'Complaint created successfully');
        } else {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
    }

    public function edit($Complaint)
    {
    }

    public function update(Request $request, Complaint $complaint)
    {
    }
}
