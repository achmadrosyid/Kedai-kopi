<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::query()
            ->select('name', 'roles')
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
                ->rawColumns(['name','roles', 'action'])
                ->make(true);
        }
        return view('user.index');
    }
}
