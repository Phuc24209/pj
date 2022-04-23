<?php

namespace App\Http\Controllers;

use App\Models\wareHouse;
use Illuminate\Http\Request;

class warehouseAjaxController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouse = wareHouse::orderBy('id', 'desc')->get();

        return view('Admin.warehouse.warehouse', [
            'warehouse' => $warehouse,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warehosue = new wareHouse();
        $warehosue -> name = $request -> name;
        $warehosue -> address =  $request -> address;
        $warehosue -> status = $request -> status;

        if ($request->hasFile('image')) {
            $file = time() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $file);
            $patch = 'storage/' . $file;
            $warehosue -> image = $patch;
        };
        // // echo $request -> avatar;
        // // exit;
        // $warehosue = wareHouse::createWarehouse($request -> name, $request -> address, $request -> status, $request ->avatar);
        $warehosue -> save();
        return response()->json([
            'status' => 200,
            'data' => $warehosue,
            'message' => 'Tạo kho thành công'
        ], 200);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        wareHouse::find($id)->delete();
        // return response()->json(['data'=>'removed'],200);
        return response()->json(['status' => 200, 'id' => $id]);
    }

    function edit($id)
    {
        $data = wareHouse::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $warehosue = wareHouse::find($request->id);

        $warehosue -> name = $request -> name;
        $warehosue -> address =  $request -> address;
        $warehosue -> status = $request -> status;

        if ($request->hasFile('avatar')) {
            $file = time() . "." . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->storeAs('public', $file);
            $patch = 'storage/' . $file;
            $warehosue -> avatar = $patch;
        };
        $warehosue->save();
        return response()->json([
            'status' => 200,
            'data' => $warehosue,
            'message' => 'cap nhat kho thành công'
        ], 200); 
    }
    
}
