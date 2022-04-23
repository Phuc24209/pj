<?php

use App\Http\Controllers\AdminControler;
use App\Http\Controllers\attributeAjaxController;
use App\Http\Controllers\issueController;
use App\Http\Controllers\productController;
use App\Http\Controllers\receiptController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\transferController;
use App\Http\Controllers\warehouseAjaxController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [AdminControler::class, 'index']);
Route::prefix('admin')->group(function () {
    Route::post('/importExcel', [productController::class, 'importExcel']);
    Route::post('/sentToImportExcel', [productController::class, 'sentToImportExcel']);

    Route::middleware(['auth.admin'])->group(function () {
        Route::get('/', [AdminControler::class, 'login'])->withoutMiddleware('auth.admin');
        Route::get('/login', [AdminControler::class, 'login'])->name('admin.login')->withoutMiddleware('auth.admin');

        Route::prefix('/dashboard')->group(function () {
            Route::get('/', [AdminControler::class, 'index'])->name('dashboard');
            Route::post('/', [AdminControler::class, 'getByMonth']);
            Route::get('/{id}', [AdminControler::class, 'getDBCot']);
            Route::get('/BDCong/{id}', [AdminControler::class, 'getDBCong']);
            Route::get('/getNhap/{id}', [AdminControler::class, 'getNhap']);
            Route::get('/bestSeller/{id}', [AdminControler::class, 'bestSeller']);
        });

        Route::prefix('account')->group(function () {
            Route::middleware(['auth.superAdmin'])->group(function () {
                Route::get('/', [AdminControler::class, 'IndexAccount']);
                Route::post('/', [AdminControler::class, 'addAccount']);
                Route::delete('/{id}', [AdminControler::class, 'destroyAccount']);
                Route::get('/{id}', [AdminControler::class, 'editAccount']);
                Route::post('/update', [AdminControler::class, 'updateAccount']);
            });
        });

        Route::get('/icons', [AdminControler::class, 'icons']);
        Route::get('/logout', [AdminControler::class, 'handleLogout']);

        Route::get('/chooseWarehouse', [AdminControler::class, 'chooseWarehouse']);
        Route::post('/chooseWarehouse', [AdminControler::class, 'chooseWarehouseHandle']);

        Route::post('/login', [AdminControler::class, 'handleLogin'])->withoutMiddleware('auth.admin');

        Route::prefix('/product')->group(function () {

            Route::prefix('/attribute')->group(function () {
                Route::prefix('/color')->group(function () {
                    Route::get('/', [attributeAjaxController::class, 'indexColor']);
                    Route::post('/', [attributeAjaxController::class, 'storeColor']);
                    Route::get('/{id}', [attributeAjaxController::class, 'editColor']);
                    Route::post('/update', [attributeAjaxController::class, 'updateColor']);
                    Route::delete('/{id}', [attributeAjaxController::class, 'destroyColor']);
                });
                Route::prefix('/size')->group(function () {
                    Route::get('/', [attributeAjaxController::class, 'indexSize']);
                    Route::post('/', [attributeAjaxController::class, 'storeSize']);
                    Route::get('/{id}', [attributeAjaxController::class, 'editSize']);
                    Route::post('/update', [attributeAjaxController::class, 'updateSize']);
                    Route::delete('/{id}', [attributeAjaxController::class, 'destroySize']);
                });
                Route::prefix('/brand')->group(function () {
                    Route::get('/', [attributeAjaxController::class, 'indexBrand']);
                    Route::post('/', [attributeAjaxController::class, 'storeBrand']);
                    Route::get('/{id}', [attributeAjaxController::class, 'editBrand']);
                    Route::post('/update', [attributeAjaxController::class, 'updateBrand']);
                    Route::delete('/{id}', [attributeAjaxController::class, 'destroyBrand']);
                });
                // Route::prefix('/image')->group(function () {
                //     Route::get('/', [attributeAjaxController::class, 'indeximage']);
                //     Route::post('/', [attributeAjaxController::class, 'storeImage']);
                //     Route::get('/{id}', [attributeAjaxController::class, 'editImage']);
                //     Route::post('/update', [attributeAjaxController::class, 'updateImage']);
                //     Route::delete('/{id}', [attributeAjaxController::class, 'destroyImage']);
                // });
                Route::prefix('/type')->group(function () {
                    Route::get('/', [attributeAjaxController::class, 'indexType']);
                    Route::post('/', [attributeAjaxController::class, 'storeType']);
                    Route::get('/{id}', [attributeAjaxController::class, 'editType']);
                    Route::post('/update', [attributeAjaxController::class, 'updateType']);
                    Route::delete('/{id}', [attributeAjaxController::class, 'destroyType']);
                });
            });


            Route::prefix('/')->group(function () {
                Route::get('/', [productController::class, 'indexProduct']);
                Route::post('/', [productController::class, 'storeProduct']);
                Route::post('/transfer', [transferController::class, 'store']);
                Route::post('/issue', [issueController::class, 'store']);
                Route::post('/receipt', [receiptController::class, 'insertReceiptDetail']);
                Route::get('/{id}', [productController::class, 'editProduct']);
                Route::post('/update', [productController::class, 'updateProduct']);
                Route::delete('/{id}', [productController::class, 'destroyProduct']);
                Route::get('product_detail/{id}', [productController::class, 'getProductDetail']);
            });
        });
        Route::prefix('supplier')->group(function () {
            Route::get('/', [supplierController::class, 'index']);
            Route::post('/', [supplierController::class, 'store']);
            Route::get('/{id}', [supplierController::class, 'edit']);
            Route::post('/update', [supplierController::class, 'update']);
            Route::delete('/{id}', [supplierController::class, 'destroy']);
        });
        Route::prefix('receipt')->group(function () {
            Route::get('/', [receiptController::class, 'index']);
            Route::post('/', [receiptController::class, 'store']);
            Route::get('/{id}', [receiptController::class, 'edit']);
            Route::post('/update', [receiptController::class, 'update']);
            // Route::delete('/{id}', [receiptController::class, 'destroy']);
        });
        Route::prefix('issue')->group(function () {
            Route::get('/', [issueController::class, 'index']);
            Route::post('/', [issueController::class, 'store']);
            Route::get('/{id}', [issueController::class, 'edit']);
            Route::post('/update', [issueController::class, 'update']);
            Route::delete('/{id}', [issueController::class, 'destroy']);
        });
        Route::prefix('transfer')->group(function () {
            Route::get('/', [transferController::class, 'index']);
            Route::post('/', [transferController::class, 'store']);
            Route::get('/{id}', [transferController::class, 'edit']);
            Route::post('/update', [transferController::class, 'update']);
            Route::delete('/{id}', [transferController::class, 'destroy']);
        });
        Route::prefix('/warehouse')->group(function () {
            //admin route
            Route::get('/', [warehouseAjaxController::class, 'index']);
            Route::post('/', [warehouseAjaxController::class, 'store']);
            Route::get('/{id}', [warehouseAjaxController::class, 'edit']);
            Route::post('/update', [warehouseAjaxController::class, 'update']);
            Route::delete('/{id}', [warehouseAjaxController::class, 'destroy']);
        });
    });
});


Route::resource('/warehouseAjax', 'warehouseAjaxController');
// Route::get('/sendmail', [MailController::class, 'sendmail']);
