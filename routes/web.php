<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TypesubcompanyController;
use App\Http\Controllers\SubcompanyController;
use App\Http\Controllers\SubsubcompanyController;
use App\Http\Controllers\TypebranchController;
use App\Http\Controllers\ProdController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchcontactController;
use App\Http\Controllers\DiscounttController;


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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/appadmin/', [HomeController::class, 'indexadmin'])->name('appadmin.home')->middleware(['auth', 'is_admin']);
Route::get('/appmerchant/', [HomeController::class, 'indexmerchant'])->name('appmerchant.home')->middleware(['auth', 'is_merchant','conf1','conf2']);

Route::get('/config-cache', function() {
    $exitCode = \Artisan::call('config:cache');
    $exitCode = \Artisan::call('cache:clear');
    $exitCode = \Artisan::call('route:clear');
    $exitCode = \Artisan::call('view:clear');
	$exitCode = \Artisan::call('config:clear');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth','conf1');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth','conf1');
Route::get('/unconfirmed', [App\Http\Controllers\HomeController::class, 'unconfirmed'])->name('unconfirmed');
Route::get('/unconfirmed2', [App\Http\Controllers\HomeController::class, 'unconfirmed2'])->name('unconfirmed2');
Route::get('/confirmed', [App\Http\Controllers\HomeController::class, 'confirmed'])->name('confirmed');
Route::get('/confirm/{email}', [App\Http\Controllers\HomeController::class, 'confirm'])->name('confirm');


Route::get('/appmerchant/addcompany', [CompanyController::class, 'create'])->name('appmerchant.addcompany')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/viewcompany', [CompanyController::class, 'indexadmin' ])->name('viewCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/editcompany/{id}', [CompanyController::class, 'edit' ])->name('CompanyEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/company/add', [CompanyController::class, 'store' ])->name('CompanyAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/companyupdate/update/{id}',[CompanyController::class, 'update' ])->name('CompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::match(['put', 'patch'],'/appmerchant/companyupdate/update/{id}', [CompanyController::class, 'update' ])->name('CompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/company/delete/{id}/', [CompanyController::class, 'destroy'])->name('MyDelCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/company/delete/{id}/', [CompanyController::class, 'destroy'])->name('MyDelCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/company/delete/{id}/', [CompanyController::class, 'destroy'])->name('MyDelCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/country/deleteall', [CompanyController::class, 'destroyall'])->name('MyDelCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/country/deleteall', [CompanyController::class, 'destroyall'])->name('MyDelCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/country/deleteall', [CompanyController::class, 'destroyall'])->name('MyDelCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);



Route::get('/appmerchant/addsubcompany/{compid?}', [SubcompanyController::class, 'create'])->name('appmerchant.addsubcompany')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/viewsubcompany/{compid?}', [SubcompanyController::class, 'indexadmin' ])->name('viewsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/editsubcompany/{id}', [SubcompanyController::class, 'edit' ])->name('subCompanyEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/subcompany/add', [SubcompanyController::class, 'store' ])->name('subCompanyAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/subcompanyupdate/update/{id}',[SubcompanyController::class, 'update' ])->name('subCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::match(['put', 'patch'],'/appmerchant/subcompanyupdate/update/{id}', [SubcompanyController::class, 'update' ])->name('subCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/subcompany/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/subcompany/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/subcompany/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/subcompany/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/subcompany/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/subcompany/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);


Route::get('/appmerchant/addsubsubcompany/{compid?}/{subcompid?}', [SubsubcompanyController::class, 'create'])->name('appmerchant.addsubsubcompany')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/viewsubsubcompany/{compid?}/{subcompid?}', [SubsubcompanyController::class, 'indexadmin' ])->name('viewsubsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/editsubsubcompany/{id}/{compid}/{subcompid}', [SubsubcompanyController::class, 'edit' ])->name('subsubCompanyEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/subsubcompany/add', [SubsubcompanyController::class, 'store' ])->name('subsubCompanyAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/subsubcompanyupdate/update/{id}',[SubsubcompanyController::class, 'update' ])->name('subsubCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::match(['put', 'patch'],'/appmerchant/subsubcompanyupdate/update/{id}', [SubsubcompanyController::class, 'update' ])->name('subsubCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/subsubcompany/delete/{id}/', [SubsubcompanyController::class, 'destroy'])->name('MyDelsubsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/subsubcompany/delete/{id}/', [SubsubcompanyController::class, 'destroy'])->name('MyDelsubsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/subsubcompany/delete/{id}/', [SubsubcompanyController::class, 'destroy'])->name('MyDelsubsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/subsubcompany/deleteall', [SubsubcompanyController::class, 'destroyall'])->name('MyDelsubsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/subsubcompany/deleteall', [SubsubcompanyController::class, 'destroyall'])->name('MyDelsubsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/subsubcompany/deleteall', [SubsubcompanyController::class, 'destroyall'])->name('MyDelsubsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);




Route::get('/appmerchant/addprod/{compid?}/{subcompid?}/{subsubcompid?}', [ProdController::class, 'create'])->name('appmerchant.addprod')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/viewprod/{compid?}/{subcompid?}/{subsubcompid?}', [ProdController::class, 'indexadmin' ])->name('viewProd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/editprod/{id}/{compid}/{subcompid}/{subsubcompid?}', [ProdController::class, 'edit' ])->name('prodEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/prod/add', [ProdController::class, 'store' ])->name('prodAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/produpdate/update/{id}',[ProdController::class, 'update' ])->name('prodUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::match(['put', 'patch'],'/appmerchant/produpdate/update/{id}', [ProdController::class, 'update' ])->name('prodUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/prod/delete/{id}/', [ProdController::class, 'destroy'])->name('MyDelProd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/prod/delete/{id}/', [ProdController::class, 'destroy'])->name('MyDelProd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/prod/delete/{id}/', [ProdController::class, 'destroy'])->name('MyDelProd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/prod/deleteall', [ProdController::class, 'destroyall'])->name('MyDelProdall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/prod/deleteall', [ProdController::class, 'destroyall'])->name('MyDelProdall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/prod/deleteall', [ProdController::class, 'destroyall'])->name('MyDelProdall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);


Route::get('/appmerchant/addbranch/{compid?}/{subcompid?}', [BranchController::class, 'create'])->name('appmerchant.addbranch')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/viewbranch/{compid?}/{subcompid?}', [BranchController::class, 'indexadmin' ])->name('viewBranch.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/editbranch/{id}/{compid}/{subcompid}/{typebranchid}', [BranchController::class, 'edit' ])->name('branchEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/branch/add', [BranchController::class, 'store' ])->name('branchAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/branchupdate/update/{id}',[BranchController::class, 'update' ])->name('branchUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::match(['put', 'patch'],'/appmerchant/branchupdate/update/{id}', [BranchController::class, 'update' ])->name('branchUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/branch/delete/{id}/', [BranchController::class, 'destroy'])->name('MyDelBranch.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/branch/delete/{id}/', [BranchController::class, 'destroy'])->name('MyDelBranch.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/branch/delete/{id}/', [BranchController::class, 'destroy'])->name('MyDelBranch.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/branch/deleteall', [BranchController::class, 'destroyall'])->name('MyDelBranchall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/branch/deleteall', [BranchController::class, 'destroyall'])->name('MyDelBranchall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/branch/deleteall', [BranchController::class, 'destroyall'])->name('MyDelBranchall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);





Route::get('getsubcomsbycomp', [SubcompanyController::class, 'getSubcompAjax'])->name('getsubcomsbycomp');
Route::get('getsubsubcomsbycomp', [SubsubcompanyController::class, 'getSubsubcompAjax'])->name('getsubsubcomsbycomp');






Route::get('/appadmin/addsubcompanytype', [TypesubcompanyController::class, 'create'])->name('appmerchant.addtypesubcompany')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewsubcompanytype', [TypesubcompanyController::class, 'indexadmin' ])->name('viewtypesubCompany.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/edittypesubcompany/{id}', [TypesubcompanyController::class, 'edit' ])->name('TypesubcompanyEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/subcompanytype/add', [TypesubcompanyController::class, 'store' ])->name('TypesubcompanyAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/subcompanytype/update/{id}',[TypesubcompanyController::class, 'update' ])->name('TypesubcompanyUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/subcompanytype/update/{id}', [TypesubcompanyController::class, 'update' ])->name('TypesubcompanyUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/subcompanytype/delete/{id}/', [TypesubcompanyController::class, 'destroy'])->name('MyDelTypesubcompany.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/subcompanytype/delete/{id}/', [TypesubcompanyController::class, 'destroy'])->name('MyDelTypesubcompany.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/subcompanytype/delete/{id}/', [TypesubcompanyController::class, 'destroy'])->name('MyDelTypesubcompany.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/subcompanytype/deleteall', [TypesubcompanyController::class, 'destroyall'])->name('MyDelTypesubcompanyall.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/subcompanytype/deleteall', [TypesubcompanyController::class, 'destroyall'])->name('MyDelTypesubcompanyall.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/subcompanytype/deleteall', [TypesubcompanyController::class, 'destroyall'])->name('MyDelTypesubcompanyall.route')->middleware(['auth', 'is_admin']);




Route::get('/appadmin/addbranchtype', [TypebranchController::class, 'create'])->name('appmerchant.addtypebranch')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewbranchtype', [TypebranchController::class, 'indexadmin' ])->name('viewtypeBranch.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/edittypebranch/{id}', [TypebranchController::class, 'edit' ])->name('TypebranchEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/branchtype/add', [TypebranchController::class, 'store' ])->name('TypebranchAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/branchtype/update/{id}',[TypebranchController::class, 'update' ])->name('TypebranchUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/branchtype/update/{id}', [TypebranchController::class, 'update' ])->name('TypebranchUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/branchtype/delete/{id}/', [TypebranchController::class, 'destroy'])->name('MyDelTypebranch.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/branchtype/delete/{id}/', [TypebranchController::class, 'destroy'])->name('MyDelTypebranch.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/branchtype/delete/{id}/', [TypebranchController::class, 'destroy'])->name('MyDelTypebranch.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/branchtype/deleteall', [TypebranchController::class, 'destroyall'])->name('MyDelTypebranchall.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/branchtype/deleteall', [TypebranchController::class, 'destroyall'])->name('MyDelTypebranchall.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/branchtype/deleteall', [TypebranchController::class, 'destroyall'])->name('MyDelTypebranchall.route')->middleware(['auth', 'is_admin']);



Route::get('/appadmin/adddiscount', [DiscounttController::class, 'create'])->name('appmerchant.addDiscount')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewdiscount', [DiscounttController::class, 'indexadmin' ])->name('viewDiscount.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/editdiscount/{id}', [DiscounttController::class, 'edit' ])->name('DiscountEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/discount/add', [DiscounttController::class, 'store' ])->name('DiscountAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/discount/update/{id}',[DiscounttController::class, 'update' ])->name('DiscountUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/discount/update/{id}', [DiscounttController::class, 'update' ])->name('DiscountUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/discount/delete/{id}/', [DiscounttController::class, 'destroy'])->name('MyDelDiscount.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/discount/delete/{id}/', [DiscounttController::class, 'destroy'])->name('MyDelDiscount.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/discount/delete/{id}/', [DiscounttController::class, 'destroy'])->name('MyDelDiscount.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/discount/deleteall', [DiscounttController::class, 'destroyall'])->name('MyDelDiscountall.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/discount/deleteall', [DiscounttController::class, 'destroyall'])->name('MyDelDiscountall.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/discount/deleteall', [DiscounttController::class, 'destroyall'])->name('MyDelDiscountall.route')->middleware(['auth', 'is_admin']);










Route::get('/appmerchant/addbranchcontact/{branchid}', [BranchcontactController::class, 'create'])->name('appmerchant.addbranchcontact')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/viewbranchcontact/{branchid}', [BranchcontactController::class, 'indexadmin' ])->name('viewBranchcontact.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/editbranchcontact/{id}', [BranchcontactController::class, 'edit' ])->name('branchcontactEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/branchcontact/add', [BranchcontactController::class, 'store' ])->name('branchcontactAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/branchcontactupdate/update/{id}',[BranchcontactController::class, 'update' ])->name('branchcontactUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::match(['put', 'patch'],'/appmerchant/branchcontactupdate/update/{id}', [BranchcontactController::class, 'update' ])->name('branchcontactUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/branchcontact/delete/{id}/', [BranchcontactController::class, 'destroy'])->name('MyDelBranchcontact.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/branchcontact/delete/{id}/', [BranchcontactController::class, 'destroy'])->name('MyDelBranchcontact.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/branchcontact/delete/{id}/', [BranchcontactController::class, 'destroy'])->name('MyDelBranchcontact.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::get('/appmerchant/branchcontact/deleteall', [BranchcontactController::class, 'destroyall'])->name('MyDelBranchcontactall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::post('/appmerchant/branchcontact/deleteall', [BranchcontactController::class, 'destroyall'])->name('MyDelBranchcontactall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);
Route::delete('/appmerchant/branchcontact/deleteall', [BranchcontactController::class, 'destroyall'])->name('MyDelBranchcontactall.route')->middleware(['auth', 'is_merchant','conf1','conf2']);








Auth::routes();

