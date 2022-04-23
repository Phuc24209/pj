<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    public function index()
    {
        $supplier = supplier::orderBy('id', 'desc')->get();

        return view('Admin.supplier.supplier', [
            'supplier' => $supplier,
        ]);
    }
    public function store(Request $request)
    {
        $supplier = new supplier();
        $supplier -> name = $request -> name;
        $supplier -> address = $request -> address;
        $supplier -> phone = $request -> phone;
       
        $supplier -> save();
        return response()->json([
            'status' => 200,
            'data' => $supplier,
            'message' => 'Thêm nhà cung cấp thành công'
        ], 200);
    }
    function edit($id)
    {
        $data = supplier::find($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $supplier = supplier::find($request->id);
        $supplier -> name = $request -> name;
        $supplier -> address = $request -> address;
        $supplier -> phone = $request -> phone;

        $supplier->save();
        return response()->json([
            'status' => 200,
            'data' => $supplier,
            'message' => 'cap nhat kho thành công'
        ], 200); 
    }
    public function destroy($id)
    {
        supplier::find($id)->delete();
        // return response()->json(['data'=>'removed'],200);
        return response()->json(['status' => 200, 'id' => $id]);
    }
}
