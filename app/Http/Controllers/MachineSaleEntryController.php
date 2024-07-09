<?php

namespace App\Http\Controllers;

use App\DataTables\MachineSalesEntryDataTable;
use App\Http\Requests\MachineSalesEntryRequest;
use App\Models\MachineSalesEntry;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    public function store(MachineSalesEntryRequest $request)
    {
        $data['title'] = 'Create Machine Sales Entry';
        $data = $request->all();
        if ($request->image) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('public'), $filename);
            $data['image'] = $filename;
        }
        MachineSalesEntry::create($data);
        Toastr::success('Machine Sales Entry Added Successfully');
        return redirect()->route('MachineSales.index');
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
    public function edit($machineSalesEntry)
    {
        $data['title'] = 'Edit Machine Sales Entry';
        $data['machine'] = MachineSalesEntry::find($machineSalesEntry);
        return view('MachineSalesEntry.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data['title'] = 'Edit Machine Sales Entry';
        $data = $request->all();
        Validator::make($data, [
            "date" => "required|before_or_equal:today",
            "bill_no" => "required|numeric",
            "party_id" => "required",
            "mc_no" => ["required", Rule::unique('machine_sales_entries')->ignore($id)],
            "serial_no" => [Rule::unique('machine_sales_entries')->ignore($id), 'required'], //sr_no
            "install_date" => "required|after_or_equal:date",
            "service_expiry_date" => "required|after_or_equal:install_date",
            "order_no" => "required",
            "free_service" => "numeric|min:0|max:9",
            "service_type_id" => "required",
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'map_url' => "active_url",
            "mic_fitting_engineer_id" => "required",
            "delivery_engineer_id" => "required",
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('public/uploads/MachineSalesEntry'), $filename);
            $data['image'] = $filename;
        }
        $update = MachineSalesEntry::find($id)->update($data);
        if ($update) {
            Toastr::success('Machine Sales Entry Updated Successfully');
            return redirect()->route('MachineSales.index');
        } else {
            Toastr::error('Machine Sales Entry Not Updated Successfully');
            return redirect()->route('MachineSales.edit', $id)->withInput();
        }
        return redirect()->route('MachineSales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($machineSalesEntry)
    {
        $delete = MachineSalesEntry::find($machineSalesEntry)->delete();
        if ($delete) {
            Toastr::success('Machine Sales Entry Deleted Successfully');
            return response()->json(['success' => 'Machine Sales Entry Deleted Successfully']);
        }
        return redirect()->route('MachineSales.index')->with('error', 'Somthing went wrong');
    }
}
