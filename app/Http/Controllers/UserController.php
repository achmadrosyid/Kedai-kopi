<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::query()
            ->select('name', 'roles', 'id')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('roles', function ($row) {
                    return $row->roles;
                })
                ->addColumn('action', function ($row) {
                    return
                        ' <a href="javascript:void(0)"  class="btn btn-success btn-sm"  id="my-btn-edit" data-id="' . $row->id . '" data-toggle="tooltip" data-placement="top" title="Edit this record"><i class="fa fa-edit"></i> Ubah</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="my-btn-delete" data-id="' . $row->id . '" ><i class="fa fa-trash"></i> Hapus</a> ';
                })
                ->rawColumns(['name', 'roles', 'action'])
                ->make(true);
        }
        return view('user.index');
    }
    public function getCashier()
    {
        $data = Cashier::query()
            ->select('nama as name', 'id')
            ->get();
        return response()->json(['data' => $data]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8']
        ], [
            'name.required' => 'Mohon inputkan Nama',
            'email.required' => 'Mohon inputkan email',
            'email.unique' => 'Email sudah pernah digunakan',
            'password.required' => 'Mohon inputkan password',
            'password.min:8' => 'Password minimal 8 karakter'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['errors' => $errors]);
        }
        $user = User::query()
            ->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'roles' => $request->roles,
                'id_cashier' => $request->cashier
            ]);
        if ($user) {
            return response()->json(['success' => 1]);
        }
        return response()->json(['success' => 0]);
    }

    public function edit($id)
    {
        $data = User::query()
            ->select(
                'name',
                'id',
                'email',
                'roles',
                'id_cashier'
            )
            ->where('id', $id)
            ->first();
        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        if ($request->password == null) {
            $user = User::query()
                ->find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->id_cashier = $request->cashier;
            $user->roles = $request->roles;
            $user->save();
            if ($user) {
                return response()->json(['success' => 1]);
            }
            return response()->json(['success' => 0]);
        }
        $user = User::query()
            ->find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_cashier = $request->cashier;
        $user->roles = $request->roles;
        $user->password = bcrypt($request->password);
        $user->save();
        if ($user) {
            return response()->json(['success' => 1]);
        }
        return response()->json(['success' => 0]);
    }
}
