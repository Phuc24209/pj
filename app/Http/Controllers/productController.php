<?php

namespace App\Http\Controllers;

use App\Imports\ImportExcel;
use App\Models\brand;
use App\Models\color;
use App\Models\imageProduct;
use App\Models\nameProduct;
use App\Models\productDetail;
use App\Models\receipt;
use App\Models\receiptDetail;
use App\Models\size;
use App\Models\supplier;
use App\Models\type;
use App\Models\wareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class productController extends Controller
{
    public function importExcel(Request $request)
    {
        $data = Excel::toCollection(new ImportExcel, $request->file('excelFile'));
        $dataTmp = [];

        foreach ($data[0] as $key => $value) {
            if ($key !== 0) {
                $dataTmp[$key - 1] = $value;
            }
        }
        Session::put('exValue', $dataTmp);
        return response()->json($dataTmp);
        // $e = $this->overView($data);
        // return response()->json(['data'=>$e]);
    }

    public function sentToImportExcel()
    {
        $dataEx = Session::get('exValue');
        $dataTmp = [];
        // dd($dataEx);
        $dataType = [];
        $dataBrand = [];
        $dataSup = [];
        $dataColor = [];
        $dataSize = [];
        foreach ($dataEx as $key => $value) {
            if ($key !== 0) {
                $dataTmp[$key - 1] = $value;
                $dataType[$key - 1] = type::where('name', $value[2])->first()->id;
                $dataBrand[$key - 1] = brand::where('brand', $value[3])->first()->id;
                $dataSup[$key - 1] = supplier::where('name', $value[4])->first()->id;
                $dataColor[$key - 1] = color::where('color', $value[5])->first()->id;
                $dataSize[$key - 1] = size::where('size', $value[6])->first()->id;
                // DB::table('type')->select('id')->where('name',$value[])
            }
        }
        foreach ($dataTmp as $key => $value) {
            $product = new nameProduct();
            $product->name = $value[0];
            $product->descrip = $value[1];
            $product->id_type =  $dataType[$key];
            $product->save();
            // foreach ($dataTmp as $key2 => $value2) {
            $product_detail = new productDetail();
            $product_detail->id_product = $product->id;
            $product_detail->id_size = $dataSize[$key];
            $product_detail->id_color = $dataColor[$key];
            $product_detail->id_brand = $dataBrand[$key];
            $product_detail->id_warehouse = Session::get('warehouseChoosedId');
            $product_detail->quantity = $value[8];
            $product_detail->price = $value[7];
            $product_detail->save();
            // }
        }
        // dd($dataColor);

    }
    public function indexProduct()
    {
        $product = DB::table('product')
            ->join('type_product', 'product.id_type', '=', 'type_product.id')
            // ->join('product_detail', 'product.id', '=', 'type_product.id')
            ->select([
                'product.id',
                'product.id_type',
                'product.name',
                'product.descrip',
                // 'product.updated_at',
                'type_product.name as typename',
            ])
            // ->orderByDesc('product.updated_at')

            ->get();

        $img_product = [];
        foreach ($product as $key => $value) {
            $img_product = DB::table('image')
                ->where('id_product', $value->id)
                ->get();
            $product[$key]->image = $img_product;
        }

        $product_detail = [];
        foreach ($product as $key => $value) {
            $product_detail = DB::table('product_detail')
                ->where('id_warehouse', Session::get('warehouseChoosedId'))
                ->where('id_product', $value->id)
                ->orderByDesc('product_detail.updated_at')
                ->get();
            $product[$key]->product_detail = $product_detail;
        }

        $receipt = [];
        foreach ($product as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $receipt = DB::table('receipt')
                    ->where('id_product_detail', $value->id)
                    ->get();
                $product[$keyP]->product_detail[$key]->receipt = $receipt;
                // if($receipt){
                // $supplier = DB::table('supplier')
                //     ->where('id', $receipt->id_supplier)
                //     ->get();
                // $product[$keyP]->product_detail[$key]->receipt[$key] = $supplier;
                // }
            }
        }

        $color = [];
        foreach ($product as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $color = DB::table('color')
                    ->where('id', $value->id_color)
                    ->get();
                $product[$keyP]->product_detail[$key]->color = $color;
            }
        }

        $brand = [];
        foreach ($product as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $brand = DB::table('brand')
                    ->where('id', $value->id_brand)
                    ->get();
                $product[$keyP]->product_detail[$key]->brand = $brand;
            }
        }

        $size = [];
        foreach ($product as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $size = DB::table('size')
                    ->where('id', $value->id_size)
                    ->get();
                $product[$keyP]->product_detail[$key]->size = $size;
            }
        }

        // $warehouse_transfer = [];
        // foreach ($product as $keyP => $valueP) {
        // foreach ($valueP->product_detail as $key => $value) {
        //     foreach ($product as $key => $value) {
        //         $warehouse_transfer = DB::table('warehouse_transfer')
        //             ->where('id_product_detail', $value->id)
        //             ->get();
        //         $product[$keyP]->product_detail[$key]->warehouse_transfer = $warehouse_transfer;
        //     }
        // }
        // }

        // $issue = [];
        // foreach ($valueP->product_detail as $key => $value) {
        //     foreach ($product as $key => $value) {
        //         $issue = DB::table('issue')
        //             ->where('id_product_detail', $value->id)
        //             ->get();
        //         $product[$keyP]->product_detail[$key]->issue = $issue;
        //     }
        // }

        $warehouse = [];
        foreach ($product as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $warehouse = DB::table('warehouse')
                    ->where('id', $value->id_warehouse)
                    ->get();
                $product[$keyP]->product_detail[$key]->warehouse = $warehouse;
            }
        }

        // $supplier = [];
        //         foreach ($product as $keyP => $valueP) {
        // foreach ($valueP->product_detail as $key => $value) {
        //     foreach ($product as $key => $value) {
        //         foreach ($receipt as $keySuplier => $valueSuplier) {
        //             // print_r($valueSuplier);
        //             $supplier = DB::table('supplier')
        //                 ->where('id', $valueSuplier->id_supplier)
        //                 ->get();
        //             $product[$keyP]->product_detail[$key]->receipt[$keySuplier]->supplier = $supplier;
        //         }
        //     }
        // }
        //         }

        $allColor = DB::table('color')
            ->select([
                'id',
                'color',
            ])
            ->get();

        $allBrand = DB::table('brand')
            ->select([
                'id',
                'brand',
            ])
            ->get();

        $allSize = DB::table('size')
            ->select([
                'id',
                'size',
            ])
            ->get();

        $allType = DB::table('type_product')
            ->select([
                'id',
                'name',
            ])
            ->get();

        $allSupplier = DB::table('supplier')
            ->select([
                'id',
                'name',
                'address',
                'phone',
            ])
            ->get();

        return view('Admin.product.products.product', [
            'product' => $product,
            'allColor' => $allColor,
            'allBrand' => $allBrand,
            'allSize' => $allSize,
            'allType' => $allType,
            'allSupplier' => $allSupplier,
        ]);
    }

    public function storeproduct(Request $request)
    {
        $product = new nameProduct();
        $product->name = $request->name;
        $product->descrip = $request->descrip;
        $product->id_type = $request->typename;

        $product->save();

        for ($i = 1; $i <= $request->count; $i++) {
            $product_detail = new productDetail();
            $product_detail->id_product = $product->id;
            $product_detail->id_size = $request->{'size' . $i};
            $product_detail->id_color = $request->{'color' . $i};
            $product_detail->id_brand = $request->brand;
            $product_detail->id_warehouse = Session::get('warehouseChoosedId');
            $product_detail->quantity = $request->{'quantity' . $i};
            $product_detail->price = $request->{'price' . $i};
            $product_detail->save();

            $receipt = new receipt();
            $receipt->id_product_detail = $product_detail->id;
            $receipt->id_admin = Auth::guard('admin')->user()->id;
            $receipt->id_warehouse = Session::get('warehouseChoosedId');
            $receipt->id_supplier = $request->supplier;
            $receipt->save();

            $receiptDetail = new receiptDetail();
            $receiptDetail->id_receipt = $receipt->id;
            $receiptDetail->quantity = $request->{'quantity' . $i};
            $receiptDetail->id_supplier = $request->supplier;
            $receiptDetail->id_admin = Auth::guard('admin')->user()->id;
            $receiptDetail->save();
        }

        for ($i = 1; $i <= $request->countImg; $i++) {
            $image = new imageProduct();
            if ($request->hasFile('img' . $i)) {
                $file = time() . "." . $request->file('img' . $i)->getClientOriginalExtension();
                $request->file('img' . $i)->storeAs('public', $file);
                $patch = 'storage/' . $file;
                $image->image = $patch;
                $image->id_product = $product->id;
                $image->save();
            };
        }

        $product2 = DB::table('product')
            ->join('type_product', 'product.id_type', '=', 'type_product.id')
            ->select([
                'product.id',
                'product.id_type',
                'product.name',
                'product.descrip',
                'product.updated_at',
                'type_product.name as typename',
            ])
            ->where('product.id', $product->id)
            ->get();

        $img_product = [];
        foreach ($product2 as $key => $value) {
            $img_product = DB::table('image')
                ->where('id_product', $value->id)
                ->get();
            $product2[$key]->image = $img_product;
        }

        $product_detail2 = [];
        foreach ($product2 as $key => $value) {
            $product_detail2 = DB::table('product_detail')
                ->where('id_warehouse', Session::get('warehouseChoosedId'))
                ->where('id_product', $value->id)
                ->get();
            $product2[$key]->product_detail = $product_detail2;
        }

        $receipt = [];
        foreach ($product2 as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $receipt = DB::table('receipt')
                    ->where('id_product_detail', $value->id)
                    ->get();
                $product2[$keyP]->product_detail[$key]->receipt = $receipt;
            }
        }

        $color = [];
        foreach ($product2 as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $color = DB::table('color')
                    ->where('id', $value->id_color)
                    ->get();
                $product2[$keyP]->product_detail[$key]->color = $color;
            }
        }

        $brand = [];
        foreach ($product2 as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $brand = DB::table('brand')
                    ->where('id', $value->id_brand)
                    ->get();
                $product2[$keyP]->product_detail[$key]->brand = $brand;
            }
        }

        $size = [];
        foreach ($product2 as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $size = DB::table('size')
                    ->where('id', $value->id_size)
                    ->get();
                $product2[$keyP]->product_detail[$key]->size = $size;
            }
        }

        $warehouse = [];
        foreach ($product2 as $keyP => $valueP) {
            foreach ($valueP->product_detail as $key => $value) {
                $warehouse = DB::table('warehouse')
                    ->where('id', $value->id_warehouse)
                    ->get();
                $product2[$keyP]->product_detail[$key]->warehouse = $warehouse;
            }
        }

        return response()->json([
            'status' => 200,
            'data' => $product2,
            'message' => 'Tạo kho thành công'
        ], 200);
    }

    function editproduct($id)
    {
        $data = nameProduct::find($id);
        return response()->json($data);
    }
    function getProductDetail($id)
    {
        $data = productDetail::find($id);
        $data2 = DB::select('select id from warehouse');
        return response()->json([$data, $data2]);
    }
    public function updateproduct(Request $request)
    {
        $product = nameProduct::find($request->id);
        $product->id_type = $request->id_type;
        $product->name = $request->name;
        $product->descrip = $request->descrip;

        $product->save();
        return response()->json([
            'status' => 200,
            'data' => $product,
            'message' => 'cap nhat kho thành công'
        ], 200);
    }
    public function destroyproduct($id)
    {
        nameProduct::find($id)->delete();
        // return response()->json(['data'=>'removed'],200);
        return response()->json(['status' => 200, 'id' => $id]);
    }

    //==============================================================================================
}
