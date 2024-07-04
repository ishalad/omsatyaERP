<?php

namespace App\Http\Controllers;

use App\DataTables\ComplaintDataTable;
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

    public function store(Request $request)
    {
        dd($request->all());
        $complaint = new Complaint();
    }

    public function edit($Complaint)
    {
    }

    public function update(Request $request, Complaint $complaint)
    {
    }
}
