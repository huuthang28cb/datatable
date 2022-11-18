<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DoctorController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function dataDoctor(Request $request)
    {
        if ($request->ajax()) {
            $data = Doctor::latest()->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> 
                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm delete-modal"><i class="bi bi-trash3-fill"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function store(Request $request)
    {
        try
        {
            Doctor::create($request->all());


            return response()->json(['success' => 'data is successfully added'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
