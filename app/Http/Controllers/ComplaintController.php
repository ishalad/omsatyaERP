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
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ComplaintController extends Controller
{


    public function index(Request $request)
    {
        $data['title'] = 'Complaint List';
        if ($request->ajax()) {
            // dd($request->all());
            $collection = Complaint::query()->with('year', 'complaintType', 'salesEntry', 'product', 'engineer', 'serviceType', 'status')->latest()->get();
            return DataTables::of($collection)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('engineer_name'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['engineer'], $request->get('engineer_name')) ? true : false;
                        });
                    }
                    if (!empty($request->get('from_date')) && !empty($request->get('to_date'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return $row['date'] >= $request->get('from_date') && $row['date'] <= $request->get('to_date') ? true : false;
                        });
                    }
                    if (!empty($request->get('status'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['status'], $request->get('status')) ? true : false;
                        });
                    }
                })
                ->addColumn('action', function (Complaint $complaint) {
                    return "<div class='btn-group'>
                            <a class='btn btn-sm btn-primary' href='" . route('complaints.edit', ['complaint' => $complaint]) . "'><i class='fa fa-edit'></i></a>
                            <a class='btn btn-sm btn-danger' href='javascript:void(0)' onclick='window.deleteParty(" . $complaint->id . ")'><i class='fa fa-trash'></i></a>
                            </div>";
                    // <a class='btn btn-sm btn-info' href='javascript:void(0)' onclick='window.addItemPart(" . $complaint->id . ")'><i class='fa fa-product-hunt'></i></a>
                })
                ->addColumn('engineer', function ($row) {
                    return $row->engineer->name ?? 'N/A';
                })
                ->addColumn('status', function ($row) {
                    return $row->status->name ?? 'N/A';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('complaint.index', $data);
        // return $dataTable->render('complaint.index', $data);
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

    public function report()
    {
        $defaultColumns = ['sr_no', 'date', 'time', 'complaint_no', 'party.name', 'party.address', 'sales_entry.mc_no', 'sales_entry.party.name', 'sales_entry.party.phone_no', 'complaint_type.name', 'service_type.name', 'status', 'created_at'];
        $optionalColumns = ['updated_at', 'assigned_to', 'priority'];

        return view('complaint.report', compact('defaultColumns', 'optionalColumns'));
    }

    public function data(Request $request)
    {
        dd($request->all());
        $columns = array_merge($request->default_columns, $request->optional_columns);
        $complaints = Complaint::select($columns);

        return DataTables::of($complaints)->make(true);
    }
}
