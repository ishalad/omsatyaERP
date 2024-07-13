<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EngineerController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Engineer List';
        $data['engineers'] = User::where('is_active', 1)->role('engineer')->get();
        if ($request->ajax()) {
            return datatables()->of($data['engineers'])->make(true);
        }
        return view('engineers.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Engineer';
        return view('engineers.create', $data);
    }

    public function store(Request $request)
    {
        $data['title'] = 'Create Engineer';
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|password',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $request['password'] = bcrypt($request->password);
        $request['role'] = 'engineer';
        $user = User::create($request->all());
        $user->assignRole('engineer');
        toastr()->success('Engineer created successfully');
        return redirect()->route('engineers.index')->with('success', 'Engineer created successfully');
    }
    public function edit(User $engineer)
    {
        $data['title'] = 'Edit Engineer';
        $data['engineer'] = $engineer;
        return view('engineer.edit', $data);
    }
}
