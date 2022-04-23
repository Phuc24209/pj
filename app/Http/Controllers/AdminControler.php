<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\receipt;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class AdminControler extends Controller
{
    function login()
    {
        return view('Admin.Access.login');
    }
    function index()
    {
        $warehouseId = Session::get('warehouseChoosedId');

        $receiptInYear = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->where('receipt.id_warehouse','=',$warehouseId)
        ->get();
        $totalReceiptInYear = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y')"))
        ->where('receipt.id_warehouse','=',$warehouseId)
        ->get();

        $totalReceiptInYearAll = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y')"))
        ->get();

        $issueInYear = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
        ->where('issue.id_warehouse','=',$warehouseId)
        ->get();
        // dd($issueInYear);
        $totalIssueInYear = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%y')"))
        ->where('issue.id_warehouse','=',$warehouseId)
        ->get();
        $totalIssueInYearAll = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%y')"))
        ->get();

        $warehouse_transferInYear = DB::table('warehouse_transfer')
        ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        ->where('warehouse_transfer.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%m')"))
        ->where('warehouse_transfer.id_warehouse','=',$warehouseId)
        ->get();
        $totalWarehouse_transferInYear = DB::table('warehouse_transfer')
        ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        ->where('warehouse_transfer.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y')"))
        ->where('warehouse_transfer.id_warehouse','=',$warehouseId)
        ->get();

        $totalWarehouse_transferInYearAll = DB::table('warehouse_transfer')
        ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        ->where('warehouse_transfer.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y')"))
        ->get();
        



        $receiptInYear_old = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->where('receipt.id_warehouse','=',$warehouseId)
        ->get();
        $totalReceiptInYear_old = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y')"))
        ->where('receipt.id_warehouse','=',$warehouseId)
        ->get();
        
        $issueInYear_old = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
        ->where('issue.id_warehouse','=',$warehouseId)
        ->get();
        $totalIssueInYear_old = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%y')"))
        ->where('issue.id_warehouse','=',$warehouseId)
        ->get();

        $bestSeller = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->join('product','product.id', '=', 'product_detail.id_product')
        ->where('issue.updated_at','like','%'.(date('m')).'%')
        ->select(DB::raw('product.name as name'),DB::raw('product_detail.quantity as quantityStock'),DB::raw('issue.quantity as quantity'),DB::raw('product_detail.price as priceStock'),DB::raw('(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
        ->orderBy('quantity','DESC')
        ->limit(10)
        ->where('issue.id_warehouse','=',$warehouseId)
        ->get();
        // dd($bestSeller);

        $warehouse_transferInYear_old = DB::table('warehouse_transfer')
        ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        ->where('warehouse_transfer.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%m')"))
        ->where('warehouse_transfer.id_warehouse','=',$warehouseId)
        ->get();
        $totalWarehouse_transferInYear_old = DB::table('warehouse_transfer')
        ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        ->where('warehouse_transfer.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y')"))
        ->where('warehouse_transfer.id_warehouse','=',$warehouseId)
        ->get();
        
         $warehouseAll = Admin::getAllWareHouse();
        return view('Admin.Dashboard', [
            'receiptInYear'=>$receiptInYear,
            'totalReceiptInYear'=>$totalReceiptInYear,
            'totalReceiptInYearAll'=>$totalReceiptInYearAll,
            'issueInYear'=>$issueInYear,
            'totalIssueInYear'=>$totalIssueInYear,
            'totalIssueInYearAll'=>$totalIssueInYearAll,
            'warehouse_transferInYear'=>$warehouse_transferInYear,
            'totalwarehouse_transferInYear'=>$totalWarehouse_transferInYear,

            'receiptInYear_old'=> isEmpty($receiptInYear_old) ? 0 : $receiptInYear_old,
            'totalReceiptInYear_old'=> isEmpty($totalReceiptInYear_old) ? 0 : $totalReceiptInYear_old,
            'issueInYear_old'=> isEmpty($issueInYear_old) ? 0 : $issueInYear_old,
            'totalIssueInYear_old'=> isEmpty($totalIssueInYear_old) ? 0 : $totalIssueInYear_old,
            'warehouse_transferInYear_old'=> isEmpty($warehouse_transferInYear_old) ? 0 : $warehouse_transferInYear_old,
            'totalWarehouse_transferInYear_old'=> isEmpty($totalWarehouse_transferInYear_old) ? 0 : $totalWarehouse_transferInYear_old,
            'wareHouseAll'=>$totalWarehouse_transferInYearAll,
            'bestSeller' => $bestSeller,
            'warehouseAll' => $warehouseAll,
        ]);
    }
    function getByMonth(Request $request)
    {
        $receiptInYear2 = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where(DB::raw("MONTH(receipt_detail.updated_at)"),'=',DB::raw("MONTH('$request->date')"))
        ->where(DB::raw("YEAR(receipt_detail.updated_at)"),'=',DB::raw("YEAR('$request->date')"))
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'))
        ->groupBy(DB::raw("DAY(receipt_detail.updated_at)"))
        ->get();
        $totalReceiptInYear2 = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where(DB::raw("MONTH(receipt_detail.updated_at)"),'=',DB::raw("MONTH('$request->date')"))
        ->where(DB::raw("YEAR(receipt_detail.updated_at)"),'=',DB::raw("YEAR('$request->date')"))
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->get();
        
        // $issueInYear = DB::table('issue')
        // ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        // ->where('issue.updated_at','like','%'.$request->date.'%')
        // ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
        // ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
        // ->get();
        // $totalIssueInYear = DB::table('issue')
        // ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        // ->where('issue.updated_at','like','%'.$request->date.'%')
        // ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
        // ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%y')"))
        // ->get();

        // $warehouse_transferInYear = DB::table('warehouse_transfer')
        // ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        // ->where('warehouse_transfer.updated_at','like','%'.$request->date.'%')
        // ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%m') AS month"))
        // ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%m')"))
        // ->get();
        // $totalWarehouse_transferInYear = DB::table('warehouse_transfer')
        // ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        // ->where('warehouse_transfer.updated_at','like','%'.$request->date.'%')
        // ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y') AS year"))
        // ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y')"))
        // ->get();

        // echo($request->date);
        return response()->json([
            'status' => 200,
            'data' => $receiptInYear2,
            'message' => 'thành công'
        ], 200);
    }
    function getDBCot($warehouseId){
        $totalReceiptInYear = [];
        $totalIssueInYear = [];
        $totalWarehouse_transferInYear = [];

        if($warehouseId !== strVal(9999)){ 
        $totalReceiptInYear = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y')"))
        ->where('receipt.id_warehouse','=',$warehouseId)
        ->get();
        }else{
            $totalReceiptInYear = DB::table('receipt')
            ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
            ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
            ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
            ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y') AS year"))
            ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%y')"))
            ->get();
        }
        if($warehouseId !== strVal(9999)){ 
        $totalIssueInYear = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%y')"))
        ->where('issue.id_warehouse','=',$warehouseId)
        ->get();

        }else{
            $totalIssueInYear = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%y')"))
        ->get();
        }

        if($warehouseId !== strVal(9999)){ 
        $totalWarehouse_transferInYear = DB::table('warehouse_transfer')
        ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        ->where('warehouse_transfer.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y')"))
        ->where('warehouse_transfer.id_warehouse','=',$warehouseId)
        ->get();
        }else{
            $totalWarehouse_transferInYear = DB::table('warehouse_transfer')
        ->join('product_detail','product_detail.id', '=', 'warehouse_transfer.id_product_detail')
        ->where('warehouse_transfer.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(warehouse_transfer.quantity) as quantity'),DB::raw('SUM(product_detail.price * warehouse_transfer.quantity) as prices'),DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y') AS year"))
        ->groupBy(DB::raw("DATE_FORMAT(warehouse_transfer.updated_at, '%y')"))
        ->get();
        }
        
        

        return response()->json(['totalReceiptInYear' => $totalReceiptInYear,
        'totalIssueInYear'=>$totalIssueInYear,
        'totalWarehouse_transferInYear'=>$totalWarehouse_transferInYear,
    ]);
    }
    function getNhap($warehouseId){
        $receiptInYear_old = [];
        if($warehouseId !== strVal(9999)){ 
        $receiptInYear_old = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->where('receipt.id_warehouse','=',$warehouseId)
        ->get();
        }else{
            $receiptInYear_old = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->get();
        }
        $receiptInYear = [];
        if($warehouseId !== strVal(9999)){
            $receiptInYear = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->where('receipt.id_warehouse','=',$warehouseId)
        ->get();
        }
        else{
            $receiptInYear = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->get();
        }
        $issueInYear_old =[];
        if($warehouseId !== strVal(9999)){
            $issueInYear_old = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.(date('Y') - 1).'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
        ->where('issue.id_warehouse','=',$warehouseId)
        ->get();
        }
        else{
            $issueInYear_old = DB::table('issue')
            ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
            ->where('issue.updated_at','like','%'.(date('Y') - 1).'%')
            ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
            ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
            ->get();
        }

        $issueInYear = [];
        if($warehouseId !== strVal(9999)){
            $issueInYear = DB::table('issue')
            ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
            ->where('issue.updated_at','like','%'.date('Y').'%')
            ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
            ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
            ->where('issue.id_warehouse','=',$warehouseId)
            ->get();
        }
        else{
            $issueInYear = DB::table('issue')
            ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
            ->where('issue.updated_at','like','%'.date('Y').'%')
            ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
            ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
            ->get();
        }


        return response()->json([
            'receiptInYear_old' => $receiptInYear_old,
            'receiptInYear' => $receiptInYear,
            'issueInYear' => $issueInYear,
            'issueInYear_old' => $issueInYear_old,
        ]);
    }
    function getDBCong($warehouseId){
        
        $issueInYear = []; 
        if($warehouseId !== strVal(9999)){ 
            $issueInYear = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
        ->where('issue.id_warehouse','=',$warehouseId)
        ->get();
        }else{
        $issueInYear = DB::table('issue')
        ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
        ->where('issue.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(issue.quantity) as quantity'),DB::raw('SUM(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(issue.updated_at, '%m')"))
        ->get();
        }
        
        $receiptInYear = [];
        if($warehouseId !== strVal(9999)){
            $receiptInYear = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->where('receipt.id_warehouse','=',$warehouseId)
        ->get();
        }
        else{
            $receiptInYear = DB::table('receipt')
        ->join('receipt_detail','receipt_detail.id_receipt', '=', 'receipt.id')
        ->join('product_detail','product_detail.id', '=', 'receipt.id_product_detail')
        ->where('receipt_detail.updated_at','like','%'.date('Y').'%')
        ->select(DB::raw('SUM(receipt_detail.quantity) as quantity'),DB::raw('SUM(product_detail.price * receipt_detail.quantity) as prices'),DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m') AS month"))
        ->groupBy(DB::raw("DATE_FORMAT(receipt_detail.updated_at, '%m')"))
        ->get();
        }
        
        return response()->json([
        'issueInYear' => $issueInYear,
        'receiptInYear' => $receiptInYear,
    ]);
    }
    function bestSeller($warehouseId){
        
        $bestSeller = [];
        if($warehouseId !== strVal(9999)){
            $bestSeller = DB::table('issue')
            ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
            ->join('product','product.id', '=', 'product_detail.id_product')
            ->where('issue.updated_at','like','%'.(date('m')).'%')
            ->select(DB::raw('product.name as name'),DB::raw('product_detail.quantity as quantityStock'),DB::raw('issue.quantity as quantity'),DB::raw('product_detail.price as priceStock'),DB::raw('(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
            ->orderBy('quantity','DESC')
            ->limit(10)
            ->where('issue.id_warehouse','=',$warehouseId)
            ->get();
        }
        else{
            $bestSeller = DB::table('issue')
            ->join('product_detail','product_detail.id', '=', 'issue.id_product_detail')
            ->join('product','product.id', '=', 'product_detail.id_product')
            ->where('issue.updated_at','like','%'.(date('m')).'%')
            ->select(DB::raw('product.name as name'),DB::raw('product_detail.quantity as quantityStock'),DB::raw('issue.quantity as quantity'),DB::raw('product_detail.price as priceStock'),DB::raw('(product_detail.price * issue.quantity) as prices'),DB::raw("DATE_FORMAT(issue.updated_at, '%y') AS year"))
            ->orderBy('quantity','DESC')
            ->limit(10)
            ->get();
        }
        
        return response()->json([
        'bestSeller' => $bestSeller,
    ]);
    }
    function icons()
    {
        return view('Admin.icons');
    }
    
    public function indexAccount()
    {
        $account = Admin::orderBy('id', 'desc')->get();

        return view('Admin.account.account', [
            'account' => $account,
        ]);
    }
    public function addAccount(Request $res){
        
        $validator = Validator::make($res->all(), [
            'name' => 'required|max:30',
            'email' => 'required|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif',
            'pass' => 'required|max:18|min:4',
            'user_name' => 'required|max:50',
            'address' => 'required|max:250',
            'roles' => 'required',
            'phone' => 'required|max:10|min:10',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
                'data' => $res->id
            ],400);
        } else{
            $account = new Admin();
            $account ->name = $res->name; 
            if ($res->hasFile('avatar')) {
                $file = time() . "." . $res->file('avatar')->getClientOriginalExtension();
                $res->file('avatar')->storeAs('public', $file);
                $patch = 'storage/' . $file;
                $account -> avartar = $patch;
            };
            $account ->email = $res->email;
            $account ->user_name = $res->user_name;
            $account ->phone = $res->phone;
            $account ->address = $res->address;
            $account ->password = bcrypt($res->pass);
            $account ->roles = $res->roles;
    
            $account ->save();
            return response()->json([
                'status' => 200,
                'data' => $account,
                'message' => 'Tạo tài khoản thành công'
            ], 200);
        }
        
        
    }
    function editAccount($id)
    {
        $data = Admin::find($id);
        return response()->json($data);
    }
    function updateAccount(Request $res){
        $validator = Validator::make($res->all(), [
            'name' => 'required|max:30',
            'email' => 'required|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif',
            // 'pass' => 'required|max:18|min:4',
            'user_name' => 'required|max:50',
            'address' => 'required|max:250',
            'roles' => 'required',
            'phone' => 'required|max:10|min:10',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
                'data' => $res->id
            ],400);
        } else{
            $account = Admin::find($res->id);
            $account ->name = $res->name; 
            if ($res->hasFile('avatar')) {
                $file = time() . "." . $res->file('avatar')->getClientOriginalExtension();
                $res->file('avatar')->storeAs('public', $file);
                $patch = 'storage/' . $file;
                $account -> avartar = $patch;
            };
            $account ->email = $res->email;
            $account ->user_name = $res->user_name;
            $account ->phone = $res->phone;
            $account ->address = $res->address;
            // $account ->password = bcrypt($res->pass);
            $account ->roles = $res->roles;
    
            $account ->save();
            return response()->json([
                'status' => 200,
                'data' => $account,
                'message' => 'Cập nhật khoản thành công'
            ], 200);
        }
    }
    public function destroyAccount($id)
    {
        Admin::find($id)->delete();
        // return response()->json(['data'=>'removed'],200);
        return response()->json(['status' => 200, 'id' => $id]);
    }
    function handleLogin(Request $result)
    {   
        
        $data = [
            'user_name' => $result->user,
            'password' => $result->pass
        ];
        if (Auth::guard('admin')->attempt($data)) {
            
            return redirect('admin/chooseWarehouse');
        }
        else{
            
            return redirect()->back()->with('err', 'Tên đăng nhập hoặc mật khẩu không tồn tại');

        }
    }

    function handleLogout()
    {
        Auth::guard('admin')->logout();
        Session::put('warehouseChoosed', null);
        return redirect('admin/login');
    }

    function chooseWarehouse()
    {
        $rs = Admin::getAllWareHouse();
        return view('Admin.ChooseWarehouse')->with('warehouseList', $rs);
    }
    function chooseWarehouseHandle(Request $rq)
    {
        $index = strpos($rq->id,'-');
        Session::put('warehouseChoosed', substr($rq->id, $index + 1, strlen($rq->id)));
        Session::put('warehouseChoosedId', substr($rq->id, 0, $index));
        return redirect('admin/dashboard');
    }

    // function allWarehouse()
    // {
    //     $rs = Admin::getAllWarehouse();
    //     return view('Admin.warehouse.warehouse')->with('warehouseList', $rs);
    // }

    function addWarehouse(Request $result)
    {
        $name = $result->name;
        $address = $result->address;
        $status = $result->status;
        $file = time() . "." . $result->file('avt')->getClientOriginalExtension();
        $result->file('avt')->storeAs('public', $file);
        $avt = 'storage/' . $file;

        $rs = Admin::createWarehouse($name, $address, $avt, $status);
        if ($rs) {
            return redirect()->back()->with('err', 'Tạo kho thành công');
        } else {
            return redirect()->back()->with('err', 'Tạo kho thất bại');
        }
    }

    
}
