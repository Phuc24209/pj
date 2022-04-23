<?php

namespace App\Http\Controllers;

use App\Models\productDetail;
use App\Models\receipt;
use App\Models\receiptDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class receiptController extends Controller
{
    public function index()
    {
        $warehouseId = Session::get('warehouseChoosedId');
        $receipt = DB::table('receipt')
            ->join('admin', 'receipt.id_admin', '=', 'admin.id')
            ->join('warehouse', 'receipt.id_warehouse', '=', 'warehouse.id')
            ->join('supplier', 'receipt.id_supplier', '=', 'supplier.id')
            ->select('receipt.id', 'receipt.id_admin', 'receipt.updated_at', 'receipt.id_product_detail', 'admin.name as adminName', 'warehouse.name as warehouseName', 'supplier.name as supplierName')
            ->where('receipt.id_warehouse', '=', $warehouseId)
            ->orderByDesc('receipt.updated_at')
            ->get();

        $receipt_detail = [];
        foreach ($receipt as $key => $value) {
            $receipt_detail = DB::table('receipt_detail')
                ->join('supplier', 'supplier.id', '=', 'receipt_detail.id_supplier')
                ->join('admin', 'receipt_detail.id_admin', '=', 'admin.id')
                ->select(['receipt_detail.id', 'receipt_detail.id_receipt', 'receipt_detail.created_at', 'receipt_detail.quantity', 'admin.name as nameAdmin', 'supplier.name as nameSupplier'])
                ->where('id_receipt', $value->id)
                ->get();
            $receipt[$key]->receiptDetail = $receipt_detail;
        }
        // $admin = [];
        // foreach ($receipt_detail as $key => $value) {
        //     $admin = DB::table('admin')
        //         ->where('id', $value->id_admin)
        //         ->get();
        //     $receipt[$key]->admin = $admin;
        // }
        $supplier = DB::table('supplier')

            ->get();
        // dd($receipt);
        return view('Admin.warehouse.receipt', [
            'receipt' => $receipt,
            'all_supplier' => $supplier
        ]);
    }

    public function store(Request $request)
    {
        $receipt = new receipt();
        $receipt->id_product_detail = $request->id_product_detail_new;
        // dd($request->id_product_detail);
        $receipt->id_admin = $request->id_admin;
        $receipt->id_warehouse = $request->id_warehouse;
        $receipt->id_supplier = $request->id_supplier_new;
        $receipt->date_receipt = $request->date_receipt;
        $receipt->quantity = $request->quantity_new;

        // dd($receipt->id_product_detail, $request->id_supplier_new);

        $receipt->save();
        return response()->json([
            'status' => 200,
            'data' => $receipt,
            'message' => 'Tạo kho thành công'
        ], 200);
    }

    function edit($id)
    {
        $receipt = DB::table('receipt')
            ->join('admin', 'receipt.id_admin', '=', 'admin.id')
            ->join('warehouse', 'receipt.id_warehouse', '=', 'warehouse.id')
            ->join('supplier', 'receipt.id_supplier', '=', 'supplier.id')
            ->select('receipt.id', 'receipt.id_admin', 'receipt.id_product_detail', 'admin.name as adminName', 'warehouse.name as warehouseName', 'supplier.name as supplierName')
            ->where('receipt.id', $id)
            ->get();

        $receipt_detail = [];
        foreach ($receipt as $key => $value) {
            $receipt_detail = DB::table('receipt_detail')
                ->join('supplier', 'supplier.id', '=', 'receipt_detail.id_supplier')
                ->join('admin', 'receipt_detail.id_admin', '=', 'admin.id')
                ->select(['receipt_detail.id', 'receipt_detail.id_receipt', 'receipt_detail.created_at', 'receipt_detail.quantity', 'admin.name as nameAdmin', 'supplier.name as nameSupplier'])
                ->where('id_receipt', $value->id)
                ->orderBy('receipt_detail.created_at', 'desc')
                ->get();
            $receipt[$key]->receiptDetail = $receipt_detail;
        }
        // $admin = [];
        // foreach ($receipt_detail as $key => $value) {
        //     $admin = DB::table('admin')
        //         ->where('id', $value->id_admin)
        //         ->get();
        //     $receipt[$key]->admin = $admin;
        // }

        return response()->json($receipt);
    }

    public function update(Request $request)
    {
        $receipt = receipt::find($request->id);
        $receipt->id_product_detail = $request->id_product_detail;
        $receipt->id_admin = $request->id_admin;
        $receipt->id_warehouse = $request->id_warehouse;
        $receipt->id_supplier = $request->id_supplier;
        $receipt->date_receipt = $request->date_receipt;
        $receipt->quantity = $request->quantity;

        $receipt->save();
        return response()->json([
            'status' => 200,
            'data' => $receipt,
            'message' => 'cap nhat kho thành công'
        ], 200);
    }
    public function insertReceiptDetail(Request $request)
    {
        $receipt = DB::table('receipt')
            ->where('id_product_detail', '=', $request->id_product_detail_receipt)
            ->first();

        $product_detail = productDetail::find($request->id_product_detail_receipt);

        $quantity = $product_detail->quantity + $request->quantity_receipt;
        $product_detail->quantity = $quantity;
        $product_detail->save();

        $receiptDetail = new receiptDetail();
        $receiptDetail->id_receipt = $receipt->id;
        $receiptDetail->quantity = $request->quantity_receipt;
        $receiptDetail->id_supplier = $request->id_supplier;
        $receiptDetail->id_admin = Auth::guard('admin')->user()->id;
        $receiptDetail->save();

        return response()->json([
            'status' => 200,
            'data' => $product_detail,
            'message' => 'cap nhat kho thành công'
        ], 200);
    }
    public function destroy($id)
    {
        receipt::find($id)->delete();
        // return response()->json(['data'=>'removed'],200);
        return response()->json(['status' => 200, 'id' => $id]);
    }
}
