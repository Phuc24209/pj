<?php

namespace App\Http\Controllers;

use App\Models\productDetail;
use App\Models\receipt;
use App\Models\transfer;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class transferController extends Controller
{
    public function index()
    {
        // $transfer = transfer::orderBy('id', 'desc')->get();
        $warehouseId =Session::get('warehouseChoosedId');

        $transfer = DB::table('warehouse_transfer')
        ->join('product_detail','warehouse_transfer.id_product_detail','=','product_detail.id')
        ->join('product','product_detail.id_product','=','product.id')
        ->join('admin','warehouse_transfer.id_admin','=','admin.id')
        ->join('warehouse','warehouse_transfer.id_warehouse','=','warehouse.id')
        ->select([
        'warehouse_transfer.id',
        'warehouse_transfer.id_warehouse_old',
        'warehouse_transfer.date_transfer',
        'warehouse_transfer.quantity',
        'warehouse_transfer.updated_at',
        'product.name as nameProduct',
        'admin.name as nameAdmin',
        'warehouse.name as nameWarehouse',
        
        ])
        ->where('warehouse_transfer.id_warehouse_old','=',$warehouseId)
        ->orderByDesc('warehouse_transfer.updated_at')
        ->get();

        $warehouse_old = [];
        foreach ($transfer as $key => $value) {
            $warehouse_old = DB::table('warehouse')
                ->where('id', $value->id_warehouse_old)
                ->get();
            $transfer[$key]->warehouse_old = $warehouse_old;
        }
        return view('Admin.warehouse.warehouse_transfer', [
            'transfer' => $transfer,
        ]);
    }
    public function store(Request $request)
    {
        $transfer = new transfer();
        $transfer -> id_product_detail = $request -> id_product_detail;
        $transfer -> id_admin = Auth::guard('admin')->user()->id;
        $transfer -> id_warehouse = $request -> id_warehouse;
        $transfer -> id_warehouse_old = Session::get('warehouseChoosedId');
        $transfer -> date_transfer = new DateTime();
        $transfer -> quantity = $request -> quantity_transfer;
       
        $transfer -> save();

        $check = DB::table('product_detail')
                ->where('id','=',$request -> id_product_detail)
                ->first();
        $product_detail = DB::table('product_detail')
        ->where('id_product',$check -> id_product)
        ->where('id_size',$check -> id_size)
        ->where('id_color',$check -> id_color)
        ->where('id_brand',$check -> id_brand)
        ->where('id_warehouse',$request -> id_warehouse)
        ->first();
        
        
        if($product_detail !== null){

                $update = productDetail::find($request -> id_product_detail);
                $quantity = $update -> quantity - $request -> quantity_transfer;
                $update->quantity = $quantity;
                $update -> save();

                $update = productDetail::find($product_detail->id);
                $update->id_warehouse = $request->id_warehouse; 
                $quantity = $request -> quantity_transfer + $update->quantity;
                $update->quantity = $quantity;
                $update -> save();
        }else{
            
                $insert = new productDetail();
                $insert->id_product = $check->id_product;
                $insert->id_size = $check->id_size;
                $insert->id_color = $check->id_color;
                $insert->id_brand = $check->id_brand;
                $insert->id_warehouse = $request -> id_warehouse;
                $insert->quantity = $request -> quantity_transfer;
                $insert->price = $check->price;
                $insert -> save();

                $update = productDetail::find($request -> id_product_detail);
                $quantity = $update -> quantity - $request -> quantity_transfer;
                $update->quantity = $quantity;
                $update -> save();

                // $receipt = new receipt();
                // $receipt->id_product_detail = $insert->id;
                // $receipt->id_admin = Auth::guard('admin')->user()->id;
                // $receipt->id_warehouse = Session::get('warehouseChoosedId');
                // $receipt->id_supplier = $insert->supplier;
                // $receipt->quantity = $insert -> quantity;
                // $receipt -> save();
        }
        // $transferAjx = DB::table('warehouse_transfer')
        // ->join('product_detail','warehouse_transfer.id_product_detail','=','product_detail.id')
        // ->join('product','product_detail.id_product','=','product.id')
        // ->join('admin','warehouse_transfer.id_admin','=','admin.id')
        // ->join('warehouse','warehouse_transfer.id_warehouse','=','warehouse.id')
        // ->select([
        // 'warehouse_transfer.id',
        // 'warehouse_transfer.id_warehouse_old',
        // 'warehouse_transfer.date_transfer',
        // 'warehouse_transfer.quantity',
        // 'warehouse_transfer.updated_at',
        // 'product.name as nameProduct',
        // 'admin.name as nameAdmin',
        // 'warehouse.name as nameWarehouse',
        
        // ])
        // ->where('warehouse_transfer.id',$transfer->id)
        // ->get();

        // $warehouse_old = [];
        // foreach ($transferAjx as $key => $value) {
        //     $warehouse_old = DB::table('warehouse')
        //         ->where('id', $value->id_warehouse_old)
        //         ->get();
        //     $transferAjx[$key]->warehouse_old = $warehouse_old;
        // }
        return response()->json([
            'status' => 200,
            'data' => $transfer,
            'message' => 'Tạo kho thành công'
        ], 200);
    }
    // function edit($id)
    // {
    //     $data = transfer::find($id);
    //     return response()->json($data);
    // }
    // public function update(Request $request)
    // {
    //     $transfer = transfer::find($request->id);
    //     $transfer -> id_product_detail = $request -> id_product_detail;
    //     $transfer -> id_admin = $request -> id_admin;
    //     $transfer -> id_warehouse = $request -> id_warehouse;
    //     $transfer -> id_warehouse_old = $request -> id_warehouse_old;
    //     $transfer -> date_transfer = $request -> date_transfer;
    //     $transfer -> quantity = $request -> quantity;

    //     $transfer->save();
    //     return response()->json([
    //         'status' => 200,
    //         'data' => $transfer,
    //         'message' => 'cap nhat kho thành công'
    //     ], 200); 
    // }
    // public function destroy($id)
    // {
    //     transfer::find($id)->delete();
    //     // return response()->json(['data'=>'removed'],200);
    //     return response()->json(['status' => 200, 'id' => $id]);
    // }
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = productDetail::where('id_product_detail', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 
}
