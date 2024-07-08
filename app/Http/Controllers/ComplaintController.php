<?php

namespace App\Http\Controllers;

use App\DataTables\ComplaintDataTable;
use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use App\Models\ComplaintServicePartsDetail;
use App\Models\Firm;
use App\Models\MachineSalesEntry;
use App\Models\Year;
use Flasher\Toastr\Laravel\Facade\Toastr;
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
        $tag = 1;
        $data['complaint_no'] = Complaint::orderBy('id', 'desc')->first()->id + 1 . Firm::first()->id . $tag . Year::first()->name;
        $data['id'] = Complaint::orderBy('id', 'desc')->first()->id + 1;
        return view('complaint.create', $data);
    }

    public function store(ComplaintRequest $request)
    {
        if ($request->validated()) {
            $request['product_id'] = MachineSalesEntry::select('product_id')->where('id', $request->sales_entry_id)->first()->product_id;
            $complaint = Complaint::create($request->all());
            // $complaint_no = $complaint->id . $complaint->firm_id . $complaint->tag . $complaint->year->name;
            // $complaint->update(['complaint_no' => $complaint_no]);
            return redirect()->route('complaints.index')->with('success', 'Complaint created successfully');
        } else {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
    }

    public function edit(Complaint $complaint)
    {
        $data['title'] = 'Edit Complaint';
        $data['complaint'] = $complaint;
        $data['sales_entries'] = MachineSalesEntry::where('party_id', $complaint->party_id)->with('product')->get();
        // dd($data);
        return view('complaint.edit', $data);
    }

    public function update(ComplaintRequest $request, Complaint $complaint)
    {
        // dd($complaint, $request->all());
        if ($request->validated()) {
            $complaint->update($request->all());
            return redirect()->route('complaints.index')->with('success', 'Complaint updated successfully');
        } else {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        Toastr::success('Complaint deleted successfully');
        return response()->json(['message' => 'Complaint deleted successfully']);
    }

    public function AddComplaintItemPart(Request $request)
    {
        // dd($request->all());
        $complaintItemPart = new ComplaintServicePartsDetail();
        $complaintItemPart->create($request->all());
        return redirect()->route('complaints.index')->with('success', 'Complaint Item Part added successfully');
    }

    public function partyProducts(Request $request)
    {
        // dd($request->id);
        $partyProducts = MachineSalesEntry::where('party_id', $request->id)->with('product')->get();
        return response()->json($partyProducts, 200);
    }
}
