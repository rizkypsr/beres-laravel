<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ArtikelImageController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ChallengeImageController;
use App\Http\Controllers\EnvLearningController;
use App\Http\Controllers\UserChallengeControler;
use App\Http\Controllers\UserChallengeImageController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kota', [App\Http\Controllers\KotaController::class, 'index']);
Route::post('/addkota', [App\Http\Controllers\KotaController::class, 'addkota']);
Route::post('/updatekota/{id}', [App\Http\Controllers\KotaController::class, 'updatekota']);
Route::post('/deletekota/{id}', [App\Http\Controllers\KotaController::class, 'deletekota']);
Route::get('/kecamatan/{id}', [App\Http\Controllers\KecamatanController::class, 'index']);
Route::post('/addkecamatan/{id}', [App\Http\Controllers\KecamatanController::class, 'addkecamatan']);
Route::post('/updatekecamatan/{id}', [App\Http\Controllers\KecamatanController::class, 'updatekecamatan']);
Route::delete('/deletekecamatan/{id}', [App\Http\Controllers\KecamatanController::class, 'deletekecamatan']);

Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index']);
Route::post('/addcustomer', [App\Http\Controllers\CustomerController::class, 'addcustomer']);
Route::post('/updatecustomer/{id}', [App\Http\Controllers\CustomerController::class, 'updatecustomer']);
Route::delete('/deletecustomer/{id}', [App\Http\Controllers\CustomerController::class, 'deletecustomer']);
Route::get('/transaksi/{id}', [App\Http\Controllers\transaksiController::class, 'index']);
Route::post('/topupcustomer/{id}', [App\Http\Controllers\CustomerController::class, 'topupcustomer']);
Route::get('/customerexport', [App\Http\Controllers\CustomerController::class, 'exportcustomer']);
Route::get('/tokoexport', [App\Http\Controllers\CustomerController::class, 'exporttoko']);

Route::get('/toko', [App\Http\Controllers\TokoController::class, 'index']);
Route::post('/addtoko', [App\Http\Controllers\TokoController::class, 'addtoko']);
Route::post('/updatetoko/{id}', [App\Http\Controllers\TokoController::class, 'updatetoko']);
Route::delete('/deletetoko/{id}', [App\Http\Controllers\TokoController::class, 'deletetoko']);
Route::post('/topuptoko/{id}', [App\Http\Controllers\TokoController::class, 'topuptoko']);

Route::get('/umkm', [App\Http\Controllers\UmkmController::class, 'index']);
Route::post('/addumkm', [App\Http\Controllers\UmkmController::class, 'addumkm']);
Route::post('/updateumkm/{id}', [App\Http\Controllers\UmkmController::class, 'updateumkm']);
Route::delete('/deleteumkm/{id}', [App\Http\Controllers\UmkmController::class, 'deleteumkm']);

Route::get('/produkumkm', [App\Http\Controllers\ProdukumkmController::class, 'index']);
Route::post('/addprodukumkm', [App\Http\Controllers\ProdukumkmController::class, 'addprodukumkm']);
Route::post('/updateprodukumkm/{id}', [App\Http\Controllers\ProdukumkmController::class, 'updateprodukumkm']);
Route::delete('/deleteprodukumkm/{id}', [App\Http\Controllers\ProdukumkmController::class, 'deleteprodukumkm']);

Route::get('/user', [App\Http\Controllers\userController::class, 'index']);
Route::post('/adduser', [App\Http\Controllers\userController::class, 'adduser']);
Route::post('/updateuser/{id}', [App\Http\Controllers\userController::class, 'updateuser']);
Route::post('/updatepassword/{id}', [App\Http\Controllers\userController::class, 'updatepassword']);
Route::delete('/deleteuser/{id}', [App\Http\Controllers\userController::class, 'deleteuser']);

Route::get('/wa', [App\Http\Controllers\SosmedController::class, 'indexwa']);
Route::get('/te', [App\Http\Controllers\SosmedController::class, 'indexte']);
Route::post('/updatesosmedwa/{id}', [App\Http\Controllers\SosmedController::class, 'updatesosmed']);
Route::post('/updatesosmedte/{id}', [App\Http\Controllers\SosmedController::class, 'updatesosmedte']);

Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index']);
Route::post('/addfaq', [App\Http\Controllers\FaqController::class, 'addfaq']);
Route::post('/updatefaq/{id}', [App\Http\Controllers\FaqController::class, 'updatefaq']);
Route::delete('/deletefaq/{id}', [App\Http\Controllers\FaqController::class, 'deletefaq']);

Route::get('/produkjs', [App\Http\Controllers\ProdukjsController::class, 'index']);
Route::post('/addprodukjs', [App\Http\Controllers\ProdukjsController::class, 'addprodukjs']);
Route::post('/updateprodukjs/{id}', [App\Http\Controllers\ProdukjsController::class, 'updateprodukjs']);
Route::delete('/deleteprodukjs/{id}', [App\Http\Controllers\ProdukjsController::class, 'deleteprodukjs']);

Route::get('/logtransaksijs', [App\Http\Controllers\TransaksijsController::class, 'log']);
Route::get('/transaksijs', [App\Http\Controllers\TransaksijsController::class, 'index']);
Route::post('/addtransaksijs', [App\Http\Controllers\TransaksijsController::class, 'addtransaksijs']);
Route::post('/updatetransaksijs/{id}', [App\Http\Controllers\TransaksijsController::class, 'updatetransaksijs']);
Route::delete('/deletetransaksijs/{id}', [App\Http\Controllers\TransaksijsController::class, 'deletetransaksijs']);
Route::get('/accjs/{id}', [App\Http\Controllers\TransaksijsController::class, 'acctransaksijs']);
Route::get('/selesaijs/{id}', [App\Http\Controllers\TransaksijsController::class, 'selesaitransaksijs']);
Route::get('/total_jualsampah', [App\Http\Controllers\TransaksijsController::class, 'totaljualsampah']);
Route::get('/total_jualsampah_diproses', [App\Http\Controllers\TransaksijsController::class, 'totaljualsampahdiproses']);
Route::get('/jualsampahexport', [App\Http\Controllers\TransaksijsController::class, 'export']);


Route::get('/ppob', [App\Http\Controllers\PpobController::class, 'index']);
Route::post('/addppob', [App\Http\Controllers\PpobController::class, 'addppob']);
Route::post('/updateppob/{id}', [App\Http\Controllers\PpobController::class, 'updateppob']);
Route::delete('/deleteppob/{id}', [App\Http\Controllers\PpobController::class, 'deleteppob']);

Route::get('/detailppob', [App\Http\Controllers\DetailppobController::class, 'index']);
Route::post('/adddetailppob', [App\Http\Controllers\DetailppobController::class, 'adddetailppob']);
Route::post('/updatedetailppob/{id}', [App\Http\Controllers\DetailppobController::class, 'updatedetailppob']);
Route::delete('/deletedetailppob/{id}', [App\Http\Controllers\DetailppobController::class, 'deletedetailppob']);

Route::get('/tpp', [App\Http\Controllers\TransaksippobController::class, 'index']);
Route::post('/addtpp', [App\Http\Controllers\TransaksippobController::class, 'addtpp']);
Route::post('/updatetpp/{id}', [App\Http\Controllers\TransaksippobController::class, 'updatetpp']);
Route::delete('/deletetpp/{id}', [App\Http\Controllers\TransaksippobController::class, 'deletetpp']);
Route::get('/acctpp/{id}', [App\Http\Controllers\TransaksippobController::class, 'acctpp']);
Route::get('/selesaitpp/{id}', [App\Http\Controllers\TransaksippobController::class, 'selesaitpp']);
Route::get('/total_ppob', [App\Http\Controllers\TransaksippobController::class, 'totalppob']);
Route::get('/total_ppob_diproses', [App\Http\Controllers\TransaksippobController::class, 'totalppobdiproses']);


Route::get('/lj', [App\Http\Controllers\LayananjemputController::class, 'index']);
Route::post('/addlj', [App\Http\Controllers\LayananjemputController::class, 'addlj']);
Route::post('/updatelj/{id}', [App\Http\Controllers\LayananjemputController::class, 'updatelj']);
Route::delete('/deletelj/{id}', [App\Http\Controllers\LayananjemputController::class, 'deletelj']);
Route::get('/acclj/{id}', [App\Http\Controllers\LayananjemputController::class, 'acclj']);
Route::get('/selesailj/{id}', [App\Http\Controllers\LayananjemputController::class, 'selesailj']);
Route::get('/total_layanan', [App\Http\Controllers\LayananjemputController::class, 'totallayanan']);
Route::get('/total_layanan_diproses', [App\Http\Controllers\LayananjemputController::class, 'totallayanandiproses']);


Route::get('/qurban', [App\Http\Controllers\QurbansampahController::class, 'index']);
Route::post('/addqurban', [App\Http\Controllers\QurbansampahController::class, 'addqurban']);
Route::post('/updatequrban/{id}', [App\Http\Controllers\QurbansampahController::class, 'updatequrban']);
Route::delete('/deletequrban/{id}', [App\Http\Controllers\QurbansampahController::class, 'deletequrban']);

Route::get('/share', [App\Http\Controllers\ShareController::class, 'index']);
Route::post('/addshare', [App\Http\Controllers\ShareController::class, 'addshare']);
Route::post('/updateshare/{id}', [App\Http\Controllers\ShareController::class, 'updateshare']);
Route::delete('/deleteshare/{id}', [App\Http\Controllers\ShareController::class, 'deleteshare']);
Route::get('/accshare/{id}', [App\Http\Controllers\ShareController::class, 'accshare']);

// Route::get('/info', [App\Http\Controllers\InfoController::class, 'index']);
// Route::post('/addinfo', [App\Http\Controllers\InfoController::class, 'addinfo']);
// Route::post('/updateinfo/{id}', [App\Http\Controllers\InfoController::class, 'updateinfo']);
// Route::delete('/deleteinfo/{id}', [App\Http\Controllers\InfoController::class, 'deleteinfo']);


Route::get('/banner', [App\Http\Controllers\bannerController::class, 'index']);
Route::post('/addbanner', [App\Http\Controllers\bannerController::class, 'addbanner']);
Route::post('/updateinfo/{id}', [App\Http\Controllers\bannerController::class, 'updatebanner']);
Route::delete('/deletebanner/{id}', [App\Http\Controllers\bannerController::class, 'deletebanner']);

Route::get('/logtopup', [App\Http\Controllers\TopupController::class, 'index']);
Route::get('/topupexport', [App\Http\Controllers\TopupController::class, 'export']);

Route::get('/logtransfer', [App\Http\Controllers\TransferController::class, 'index']);
Route::get('/transferexport', [App\Http\Controllers\TransferController::class, 'export']);

Route::get('/logbayartoko', [App\Http\Controllers\BayartokoController::class, 'index']);
Route::get('/bayartokoexport', [App\Http\Controllers\BayartokoController::class, 'export']);

Route::get('/logppob', [App\Http\Controllers\TransaksippobController::class, 'ppob']);
Route::get('/ppobexport', [App\Http\Controllers\TransaksippobController::class, 'export']);


Route::get('/total', [App\Http\Controllers\ajaxController::class, 'ajax']);

// Route::resource('/elearning', EnvLearningController::class);

Route::resource('/challenge', ChallengeController::class);

Route::resource('/user-challenges', UserChallengeControler::class);
Route::resource('/user-challenge-image', UserChallengeImageController::class);

Route::delete('/destroy-videos', [UserChallengeControler::class, 'destroyAllVideos'])->name('user-challenges.destroyAllVideos');
Route::resource('/challenge-image', ChallengeImageController::class);

Route::resource('/artikel', ArtikelController::class);
Route::resource('/artikel-image', ArtikelImageController::class);

Route::post('/customer-import', [App\Http\Controllers\CustomerController::class, 'import']);
Route::post('/toko-import', [App\Http\Controllers\CustomerController::class, 'importtoko']);

Route::get('/kotaexport', [App\Http\Controllers\KotaController::class, 'export']);
