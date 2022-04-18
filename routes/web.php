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
use App\Http\Controllers\DiscounttcatController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\SubcatController;
use App\Http\Controllers\SubsubcatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\DivvController;
use App\Http\Controllers\CurrencController;
use App\Http\Controllers\RolerController;
use App\Http\Controllers\RoleruserController;
use App\Http\Controllers\RolercatController;
use App\Http\Controllers\RolerpermController;

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

Route::get('/appmerchant', [CompanyController::class, 'indexadmin' ])->name('viewMerchant.route')->middleware(['auth', 'conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant1', [CompanyController::class, 'indexadmin1' ])->name('viewMerchant1.route')->middleware(['auth', 'conf1','conf2' , 'is_merchantnew']);

Route::get('/appmerchant/addcompany', [CompanyController::class, 'create'])->name('appmerchant.addcompany')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewcompany', [CompanyController::class, 'indexadmin' ])->name('viewCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editcompany/{id}', [CompanyController::class, 'edit' ])->name('CompanyEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/company/add', [CompanyController::class, 'store' ])->name('CompanyAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/companyupdate/update/{id}',[CompanyController::class, 'update' ])->name('CompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/companyupdate/update/{id}', [CompanyController::class, 'update' ])->name('CompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/company/delete/{id}/', [CompanyController::class, 'destroy'])->name('MyDelCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/company/delete/{id}/', [CompanyController::class, 'destroy'])->name('MyDelCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/company/delete/{id}/', [CompanyController::class, 'destroy'])->name('MyDelCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/country/deleteall', [CompanyController::class, 'destroyall'])->name('MyDelCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/country/deleteall', [CompanyController::class, 'destroyall'])->name('MyDelCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/country/deleteall', [CompanyController::class, 'destroyall'])->name('MyDelCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);



Route::get('/appmerchant/addsubcompany/{compid?}', [SubcompanyController::class, 'create'])->name('appmerchant.addsubcompany')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewsubcompany/{compid?}', [SubcompanyController::class, 'indexadmin' ])->name('viewsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editsubcompany/{id}', [SubcompanyController::class, 'edit' ])->name('subCompanyEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subcompany/add', [SubcompanyController::class, 'store' ])->name('subCompanyAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subcompanyupdate/update/{id}',[SubcompanyController::class, 'update' ])->name('subCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/subcompanyupdate/update/{id}', [SubcompanyController::class, 'update' ])->name('subCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/subcompany/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subcompany/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/subcompany/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/subcompany/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subcompany/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/subcompany/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);


Route::get('/appmerchant/addsubsubcompany/{compid?}/{subcompid?}', [SubsubcompanyController::class, 'create'])->name('appmerchant.addsubsubcompany')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewsubsubcompany/{compid?}/{subcompid?}', [SubsubcompanyController::class, 'indexadmin' ])->name('viewsubsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editsubsubcompany/{id}/{compid}/{subcompid}', [SubsubcompanyController::class, 'edit' ])->name('subsubCompanyEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subsubcompany/add', [SubsubcompanyController::class, 'store' ])->name('subsubCompanyAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subsubcompanyupdate/update/{id}',[SubsubcompanyController::class, 'update' ])->name('subsubCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/subsubcompanyupdate/update/{id}', [SubsubcompanyController::class, 'update' ])->name('subsubCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/subsubcompany/delete/{id}/', [SubsubcompanyController::class, 'destroy'])->name('MyDelsubsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subsubcompany/delete/{id}/', [SubsubcompanyController::class, 'destroy'])->name('MyDelsubsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/subsubcompany/delete/{id}/', [SubsubcompanyController::class, 'destroy'])->name('MyDelsubsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/subsubcompany/deleteall', [SubsubcompanyController::class, 'destroyall'])->name('MyDelsubsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subsubcompany/deleteall', [SubsubcompanyController::class, 'destroyall'])->name('MyDelsubsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/subsubcompany/deleteall', [SubsubcompanyController::class, 'destroyall'])->name('MyDelsubsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);




Route::get('/appmerchant/addprod/{compid?}/{subcompid?}/{subsubcompid?}/{catid?}/{subcatid?}/{subsubcatid?}', [ProdController::class, 'create'])->name('appmerchant.addprod')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewprod/{compid?}/{subcompid?}/{subsubcompid?}/{catid?}/{subcatid?}/{subsubcatid?}', [ProdController::class, 'indexadmin' ])->name('viewProd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editprod/{id}/{compid?}/{subcompid?}/{subsubcompid?}/{catid?}/{subcatid?}/{subsubcatid?}', [ProdController::class, 'edit' ])->name('prodEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);


Route::get('/appmerchant/addprodbycat/{catid?}/{subcatid?}/{subsubcatid?}/{compid?}/{subcompid?}/{subsubcompid?}', [ProdController::class, 'createbycat'])->name('appmerchant.addprodbycat')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewprodbycat/{catid?}/{subcatid?}/{subsubcatid?}/{compid?}/{subcompid?}/{subsubcompid?}', [ProdController::class, 'indexadminbycat' ])->name('viewProdbycat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editprodbycat/{id}/{compid?}/{subcompid?}/{subsubcompid?}/{catid?}/{subcatid?}/{subsubcatid?}', [ProdController::class, 'editbycat' ])->name('prodEditbycat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);


Route::post('/appmerchant/prod/add', [ProdController::class, 'store' ])->name('prodAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/produpdate/update/{id}',[ProdController::class, 'update' ])->name('prodUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/produpdate/update/{id}', [ProdController::class, 'update' ])->name('prodUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);

Route::get('/appmerchant/prod/delete/{id}/', [ProdController::class, 'destroy'])->name('MyDelProd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/prod/delete/{id}/', [ProdController::class, 'destroy'])->name('MyDelProd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/prod/delete/{id}/', [ProdController::class, 'destroy'])->name('MyDelProd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/prod/deleteall', [ProdController::class, 'destroyall'])->name('MyDelProdall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/prod/deleteall', [ProdController::class, 'destroyall'])->name('MyDelProdall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/prod/deleteall', [ProdController::class, 'destroyall'])->name('MyDelProdall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);



Route::get('/appmerchant/prodbycat/delete/{id}/', [ProdController::class, 'destroybycat'])->name('MyDelProdbycat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/prodbycat/delete/{id}/', [ProdController::class, 'destroybycat'])->name('MyDelProdbycat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/prodbycat/delete/{id}/', [ProdController::class, 'destroybycat'])->name('MyDelProdbycat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/prodbycat/deleteall', [ProdController::class, 'destroyallbycat'])->name('MyDelProdallbycat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/prodbycat/deleteall', [ProdController::class, 'destroyallbycat'])->name('MyDelProdallbycat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/prodbycat/deleteall', [ProdController::class, 'destroyallbycat'])->name('MyDelProdallbycat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);


Route::get('/appmerchant/addbranch/{compid?}/{subcompid?}', [BranchController::class, 'create'])->name('appmerchant.addbranch')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewbranch/{compid?}/{subcompid?}', [BranchController::class, 'indexadmin' ])->name('viewBranch.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editbranch/{id}/{compid}/{subcompid}/{typebranchid}', [BranchController::class, 'edit' ])->name('branchEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/branch/add', [BranchController::class, 'store' ])->name('branchAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/branchupdate/update/{id}',[BranchController::class, 'update' ])->name('branchUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/branchupdate/update/{id}', [BranchController::class, 'update' ])->name('branchUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/branch/delete/{id}/', [BranchController::class, 'destroy'])->name('MyDelBranch.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/branch/delete/{id}/', [BranchController::class, 'destroy'])->name('MyDelBranch.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/branch/delete/{id}/', [BranchController::class, 'destroy'])->name('MyDelBranch.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/branch/deleteall', [BranchController::class, 'destroyall'])->name('MyDelBranchall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/branch/deleteall', [BranchController::class, 'destroyall'])->name('MyDelBranchall.route')->middleware(['auth', 'is_merchant','conf1','conf2'] , 'is_merchantnew');
Route::delete('/appmerchant/branch/deleteall', [BranchController::class, 'destroyall'])->name('MyDelBranchall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);

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


Route::get('/appadmin', [TypebranchController::class, 'indexadmin' ])->name('viewAdmin.route')->middleware(['auth', 'is_admin']);
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





Route::get('/appadmin/adddiscountcat/{discid?}', [DiscounttcatController::class, 'create'])->name('appadmin.addDiscountcat')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewdiscountcat/{discid?}', [DiscounttcatController::class, 'indexadmin' ])->name('viewDiscountcat.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/editdiscountcat/{id}', [DiscounttcatController::class, 'edit' ])->name('DiscountEditcat.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/discountcat/add', [DiscounttcatController::class, 'store' ])->name('DiscountAddcat.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/discountcat/update/{id}',[DiscounttcatController::class, 'update' ])->name('DiscountUpdatecat.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/discountcat/update/{id}', [DiscounttcatController::class, 'update' ])->name('DiscountUpdatecat.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/discountcat/delete/{id}/', [DiscounttcatController::class, 'destroy'])->name('MyDelDiscountcat.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/discountcat/delete/{id}/', [DiscounttcatController::class, 'destroy'])->name('MyDelDiscountcat.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/discountcat/delete/{id}/', [DiscounttcatController::class, 'destroy'])->name('MyDelDiscountcat.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/discountcat/deleteall', [DiscounttcatController::class, 'destroyall'])->name('MyDelDiscountallcat.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/discountcat/deleteall', [DiscounttcatController::class, 'destroyall'])->name('MyDelDiscountallcat.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/discountcat/deleteall', [DiscounttcatController::class, 'destroyall'])->name('MyDelDiscountallcat.route')->middleware(['auth', 'is_admin']);




Route::get('/appadmin/adddiv', [DivvController::class, 'create'])->name('appmerchant.adddiv')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewdiv', [DivvController::class, 'indexadmin' ])->name('viewdiv.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/editdiv/{id}', [DivvController::class, 'edit' ])->name('DivEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/div/add', [DivvController::class, 'store' ])->name('DivAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/div/update/{id}',[DivvController::class, 'update' ])->name('DivUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/div/update/{id}', [DivvController::class, 'update' ])->name('DivUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/div/delete/{id}/', [DivvController::class, 'destroy'])->name('MyDelDiv.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/div/delete/{id}/', [DivvController::class, 'destroy'])->name('MyDelDiv.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/div/delete/{id}/', [DivvController::class, 'destroy'])->name('MyDelDiv.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/div/deleteall', [DivvController::class, 'destroyall'])->name('MyDelDiv.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/div/deleteall', [DivvController::class, 'destroyall'])->name('MyDelDiv.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/div/deleteall', [DivvController::class, 'destroyall'])->name('MyDelDiv.route')->middleware(['auth', 'is_admin']);


Route::get('/appadmin/editcur', [CurrencController::class, 'edit' ])->name('CurEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/div/update',[CurrencController::class, 'update' ])->name('CurUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/div/update', [CurrencController::class, 'update' ])->name('CurUpdate.route')->middleware(['auth', 'is_admin']);


Route::get('/appmerchant/addbranchcontact/{branchid}', [BranchcontactController::class, 'create'])->name('appmerchant.addbranchcontact')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewbranchcontact/{branchid}', [BranchcontactController::class, 'indexadmin' ])->name('viewBranchcontact.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editbranchcontact/{id}', [BranchcontactController::class, 'edit' ])->name('branchcontactEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/branchcontact/add', [BranchcontactController::class, 'store' ])->name('branchcontactAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/branchcontactupdate/update/{id}',[BranchcontactController::class, 'update' ])->name('branchcontactUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/branchcontactupdate/update/{id}', [BranchcontactController::class, 'update' ])->name('branchcontactUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/branchcontact/delete/{id}/', [BranchcontactController::class, 'destroy'])->name('MyDelBranchcontact.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/branchcontact/delete/{id}/', [BranchcontactController::class, 'destroy'])->name('MyDelBranchcontact.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/branchcontact/delete/{id}/', [BranchcontactController::class, 'destroy'])->name('MyDelBranchcontact.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/branchcontact/deleteall', [BranchcontactController::class, 'destroyall'])->name('MyDelBranchcontactall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/branchcontact/deleteall', [BranchcontactController::class, 'destroyall'])->name('MyDelBranchcontactall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/branchcontact/deleteall', [BranchcontactController::class, 'destroyall'])->name('MyDelBranchcontactall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);


Route::get('/appmerchant/addcat', [CatController::class, 'create'])->name('appmerchant.addcat')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewcat', [CatController::class, 'indexadmin' ])->name('viewCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editcat/{id}', [CatController::class, 'edit' ])->name('CatEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/cat/add', [CatController::class, 'store' ])->name('CatAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/catupdate/update/{id}',[CatController::class, 'update' ])->name('CatUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/catupdate/update/{id}', [CatController::class, 'update' ])->name('CatUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/cat/delete/{id}/', [CatController::class, 'destroy'])->name('MyDelCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/cat/delete/{id}/', [CatController::class, 'destroy'])->name('MyDelCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/cat/delete/{id}/', [CatController::class, 'destroy'])->name('MyDelCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/cat/deleteall', [CatController::class, 'destroyall'])->name('MyDelCatall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/cat/deleteall', [CatController::class, 'destroyall'])->name('MyDelCatall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/cat/deleteall', [CatController::class, 'destroyall'])->name('MyDelCatall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);




Route::get('/appmerchant/addsubcat/{catid?}', [SubcatController::class, 'create'])->name('appmerchant.addsubcat')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewsubcat/{catid?}', [SubcatController::class, 'indexadmin' ])->name('viewsubCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editsubcat/{id}', [SubcatController::class, 'edit' ])->name('subCatEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subcat/add', [SubcatController::class, 'store' ])->name('subCatAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subcatupdate/update/{id}',[SubcatController::class, 'update' ])->name('subCatUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/subcatupdate/update/{id}', [SubcatController::class, 'update' ])->name('subCompanyUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/subcat/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subcat/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/subcat/delete/{id}/', [SubcompanyController::class, 'destroy'])->name('MyDelsubCompany.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/subcat/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subcat/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/subcat/deleteall', [SubcompanyController::class, 'destroyall'])->name('MyDelsubCompanyall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);



Route::get('getsubcatsbycat', [SubcatController::class, 'getSubcatAjax'])->name('getsubcatsbycat');
Route::get('getsubsubcatsbycat', [SubsubcatController::class, 'getSubsubcatAjax'])->name('getsubsubcatsbycat');




Route::get('/appmerchant/addsubsubcat/{catid?}/{subcatid?}', [SubsubcatController::class, 'create'])->name('appmerchant.addsubsubcat')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/viewsubsubcat/{catid?}/{subcatid?}', [SubsubcatController::class, 'indexadmin' ])->name('viewsubsubCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/editsubsubcat/{id}/{catid}/{subcatid}', [SubsubcatController::class, 'edit' ])->name('subsubCatEdit.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subsubcat/add', [SubsubcatController::class, 'store' ])->name('subsubCatAdd.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subsubcatupdate/update/{id}',[SubsubcatController::class, 'update' ])->name('subsubCatUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/subsubcatupdate/update/{id}', [SubsubcatController::class, 'update' ])->name('subsubCatUpdate.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/subsubcat/delete/{id}/', [SubsubcatController::class, 'destroy'])->name('MyDelsubsubCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subsubcat/delete/{id}/', [SubsubcatController::class, 'destroy'])->name('MyDelsubsubCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/subsat/delete/{id}/', [SubsubcatController::class, 'destroy'])->name('MyDelsubsubCat.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::get('/appmerchant/subsubcat/deleteall', [SubsubcatController::class, 'destroyall'])->name('MyDelsubsubCatall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::post('/appmerchant/subsubcat/deleteall', [SubsubcatController::class, 'destroyall'])->name('MyDelsubsubCatall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::delete('/appmerchant/subsubcat/deleteall', [SubsubcatController::class, 'destroyall'])->name('MyDelsubsubCatall.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);


Route::get('/appmerchant/edituser', [MerchantController::class, 'edit' ])->name('UserEditMerchant.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);

Route::post('/appmerchant/user/{id}',[MerchantController::class, 'update' ])->name('UserUpdateMerchant.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
Route::match(['put', 'patch'],'/appmerchant/user/update/{id}', [MerchantController::class, 'update' ])->name('UserUpdateMerchant.route')->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);


Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');



Route::get('/appadmin/adduser', [AdminController::class, 'create'])->name('appadmin.adduser')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewuser', [AdminController::class, 'indexadmin' ])->name('viewUser.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/edituser/{id}', [AdminController::class, 'edit' ])->name('UserEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/user/add', [AdminController::class, 'store' ])->name('UserAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/user/update/{id}',[AdminController::class, 'update' ])->name('UserUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/user/update/{id}', [AdminController::class, 'update' ])->name('UserUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/user/delete/{id}/', [AdminController::class, 'destroy'])->name('MyDelUser.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/user/delete/{id}/', [AdminController::class, 'destroy'])->name('MyDelUser.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/user/delete/{id}/', [AdminController::class, 'destroy'])->name('MyDelUser.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/user/deleteall', [AdminController::class, 'destroyall'])->name('MyDelUserall.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/user/deleteall', [AdminController::class, 'destroyall'])->name('MyDelUserall.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/user/deleteall', [AdminController::class, 'destroyall'])->name('MyDelUserall.route')->middleware(['auth', 'is_admin']);




Route::get('/appadmin/addrolecat', [RolercatController::class, 'create'])->name('appadmin.addrolecat')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewrolecat', [RolercatController::class, 'indexadmin' ])->name('viewRolecat.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/editrolecat/{id}', [RolercatController::class, 'edit' ])->name('RolecatEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/rolecat/add', [RolercatController::class, 'store' ])->name('RolecatAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/rolecat/update/{id}',[RolercatController::class, 'update' ])->name('RolecatUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/rolecat/update/{id}', [RolercatController::class, 'update' ])->name('RolecatUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/rolecat/delete/{id}/', [RolercatController::class, 'destroy'])->name('MyDelRolecat.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/rolecat/delete/{id}/', [RolercatController::class, 'destroy'])->name('MyDelRolecat.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/rolecat/delete/{id}/', [RolercatController::class, 'destroy'])->name('MyDelRolecat.route')->middleware(['auth', 'is_admin']);







Route::get('/appadmin/addrole', [RolerController::class, 'create'])->name('appadmin.addrole')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewrole', [RolerController::class, 'indexadmin' ])->name('viewRole.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/editrole/{id}', [RolerController::class, 'edit' ])->name('RoleEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/role/add', [RolerController::class, 'store' ])->name('RoleAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/role/update/{id}',[RolerController::class, 'update' ])->name('RoleUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/role/update/{id}', [RolerController::class, 'update' ])->name('RoleUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/role/delete/{id}/', [RolerController::class, 'destroy'])->name('MyDelRole.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/role/delete/{id}/', [RolerController::class, 'destroy'])->name('MyDelRole.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/role/delete/{id}/', [RolerController::class, 'destroy'])->name('MyDelRole.route')->middleware(['auth', 'is_admin']);


Route::get('/appadmin/addroleperm/{rolercatid?}', [RolerpermController::class, 'create'])->name('appadmin.addroleperm')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewroleperm/{rolercatid?}', [RolerpermController::class, 'indexadmin' ])->name('viewRoleperm.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/editroleperm/{id}', [RolerpermController::class, 'edit' ])->name('RolepermEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/roleperm/add', [RolerpermController::class, 'store' ])->name('RolepermAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/roleperm/update/{id}',[RolerpermController::class, 'update' ])->name('RolepermUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/roleperm/update/{id}', [RolerpermController::class, 'update' ])->name('RolepermUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/roleperm/delete/{id}/', [RolerpermController::class, 'destroy'])->name('MyDelRoleperm.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/roleperm/delete/{id}/', [RolerpermController::class, 'destroy'])->name('MyDelRoleperm.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/roleperm/delete/{id}/', [RolerpermController::class, 'destroy'])->name('MyDelRoleperm.route')->middleware(['auth', 'is_admin']);





Route::get('/appadmin/addroleuser/{useridx?}', [RoleruserController::class, 'create'])->name('appadmin.addroleuser')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/viewroleuser/{useridx?}', [RoleruserController::class, 'indexadmin' ])->name('viewRoleuser.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/editroleuser/{id}', [RoleruserController::class, 'edit' ])->name('RoleuserEdit.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/roleuser/add', [RoleruserController::class, 'store' ])->name('RoleuserAdd.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/roleuser/update/{id}',[RoleruserController::class, 'update' ])->name('RoleuserUpdate.route')->middleware(['auth', 'is_admin']);
Route::match(['put', 'patch'],'/admin/roleuser/update/{id}', [RoleruserController::class, 'update' ])->name('RoleuserUpdate.route')->middleware(['auth', 'is_admin']);
Route::get('/appadmin/roleuser/delete/{id}/', [RoleruserController::class, 'destroy'])->name('MyDelRoleuser.route')->middleware(['auth', 'is_admin']);
Route::post('/appadmin/roleuser/delete/{id}/', [RoleruserController::class, 'destroy'])->name('MyDelRoleuser.route')->middleware(['auth', 'is_admin']);
Route::delete('/appadmin/roleuser/delete/{id}/', [RoleruserController::class, 'destroy'])->name('MyDelRoleuser.route')->middleware(['auth', 'is_admin']);




Auth::routes();

