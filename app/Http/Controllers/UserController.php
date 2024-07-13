<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'User List';
        if ($request->ajax()) {
            $users = User::all();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . route('users.edit', ['user' => $row->id]) . '" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
                    $btn .= '<a href="javascript:void(0)" onclick="deleteUser(' . $row->id . ')" class="edit btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    // $btn .= '<a href="' . route('users.assignRoles', ['user' => $row->id]) . '" class="edit btn btn-primary btn-sm"><i class="fa fa-lock"></i></a>';
                    return $btn;
                })
                ->addColumn('roles', function ($row) {

                    return $row->getRoleNames()->implode(', ');
                })
                ->rawColumns(['action', 'roles'])
                ->make(true);
        }
        return view('users.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create User';
        return view('users.create', $data);
    }

    public function store(Request $request)
    {
        $data['title'] = 'Create User';
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|password',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));
        toastr()->success('User created successfully');
        return redirect()->route('users.index')->with('success', 'User created successfully');
        return view('users.store', $data);
    }

    public function edit(User $user)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $user;
        return view('users.edit', $data);
    }

    public function update(Request $request, User $user)
    {
        $data['title'] = 'Edit User';
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (!empty($request->password)) {
            $request['password'] = bcrypt($request->password);
        } else {
            unset($request['password']);
            unset($request['confirm_password']);
        }
        $user->update($request->all());
        $user->assignRole($request->input('roles'));
        toastr()->success('User updated successfully');
        return redirect()->route('users.index')->with('success', 'User updated successfully');
        return view('users.store', $data);
    }

    public function destroy(User $user)
    {
        if ($user->id == 1) {
            return response()->json(['error' => 'You can not delete this user'], 422);
        }
        if ($user->id == auth()->user()->id) {
            return response()->json(['error' => 'You can not delete your self'], 422);
        }
        return response()->json(['error' => 'You can not delete this user']);
        $user->delete();
        return response()->json(['success' => 'User deleted successfully']);
    }
}
