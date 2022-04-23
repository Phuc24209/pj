<?php

namespace App\Http\Controllers;

use App\Models\issue;
use App\Models\productDetail;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class issueController extends Controller
{
    public function index()
    {
        $warehouseId = Session::get('warehouseChoosedId');

        $issue = DB::table('issue')
            ->join('product_detail', 'issue.id_product_detail', '=', 'product_detail.id')
            ->join('product', 'product_detail.id_product', '=', 'product.id')
            ->join('admin', 'issue.id_admin', '=', 'admin.id')
            ->join('warehouse', 'issue.id_warehouse', '=', 'warehouse.id')
            ->select([
                'issue.id',
                'issue.date_issue',
                'issue.quantity',
                'issue.updated_at',
                'issue.name_customer',
                'issue.email_customer',
                'product.name as nameProduct',
                'admin.name as nameAdmin',
                'warehouse.name as nameWarehouse',
            ])
            ->where('issue.id_warehouse', '=', $warehouseId)
            ->orderByDesc('issue.updated_at')
            ->get();

        return view('Admin.warehouse.issue', [
            'issue' => $issue,
        ]);
    }
    public function store(Request $request)
    {

        $product_detail = productDetail::find($request->id_product_detail);
        $quantity = $product_detail->quantity - $request->quantity_issue;
        $product_detail->quantity = $quantity;
        $product_detail->save();

        $issue = new issue();
        $issue->id_product_detail = $request->id_product_detail;

        $issue->id_admin = Auth::guard('admin')->user()->id;
        $issue->name_customer = $request->name_customer;
        $issue->email_customer = $request->email_customer;
        $issue->id_warehouse = $product_detail->id_warehouse;
        $issue->date_issue = new DateTime();
        $issue->quantity = $request->quantity_issue;
        $issue->save();

        $issueAjx = DB::table('issue')
            ->join('product_detail', 'issue.id_product_detail', '=', 'product_detail.id')
            ->join('product', 'product_detail.id_product', '=', 'product.id')
            ->join('admin', 'issue.id_admin', '=', 'admin.id')
            ->join('warehouse', 'issue.id_warehouse', '=', 'warehouse.id')
            ->select([
                'issue.id',
                'issue.date_issue',
                'issue.quantity',
                'issue.updated_at',
                'product.name as nameProduct',
                'admin.name as nameAdmin',
                'warehouse.name as nameWarehouse',
            ])
            ->where('issue.id', $issue->id)
            ->get();
        return response()->json([
            'status' => 200,
            'data' => $issue,
            'data2' => $issueAjx,
            'message' => 'Tạo kho thành công'
        ], 200);
    }
    function edit($id)
    {
        $data = issue::find($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $issue = issue::find($request->id);
        $issue->id_product_detail = $request->id_product_detail;
        $issue->id_admin = $request->id_admin;
        $issue->id_warehouse = $request->id_warehouse;
        $issue->date_issue = $request->date_issue;
        $issue->quantity = $request->quantity;

        $issue->save();
        return response()->json([
            'status' => 200,
            'data' => $issue,
            'message' => 'cap nhat kho thành công'
        ], 200);
    }
    public function destroy($id)
    {
        issue::find($id)->delete();
        // return response()->json(['data'=>'removed'],200);
        return response()->json(['status' => 200, 'id' => $id]);
    }
}
