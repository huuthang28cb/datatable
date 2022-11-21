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
                ->addColumn('action', function($data){
                    $actionBtn = '<button type="button" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button> 
                    <button type="button" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm delete-modal"><i class="bi bi-trash3-fill"></i></button>';
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
            // dd($e->getMessage());
            return response()->json(['error' => $e], 500);
        }

    }
    public function edit($id)
    {
        try
        {
            $doctor = Doctor::where('id', $id)->first();
            return response()->json(['success' => 'successfull retrieve data', 'data' => $doctor->toJson()], 200);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        try
        {

            $doctor = Doctor::findOrFail($id);
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->phone = $request->phone;
            $doctor->address = $request->address;
            $doctor->update();

            return response()->json(['success' => 'data is successfully updated'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function delete($id)
    {
        try
        {
            Doctor::find($id)->delete();

            return response()->json(['success' => 'data is successfully deleted'], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}
