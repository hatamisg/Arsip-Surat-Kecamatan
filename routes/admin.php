<?php
use App\Http\Controllers\Admin\SumaController;
use App\Http\Controllers\Admin\SukelController;
use App\Http\Controllers\Admin\SutaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SupeController;
use App\Http\Controllers\Admin\SukaController;
//surat masuk
Route::get('/', [HomeController::class, 'index']);
Route::get('/surat-masuk', [SumaController::class, 'index'])->name('tes');
Route::post('/surat-masuk', [SumaController::class, 'store'])->name('store');
Route::get('/surat-masuk/dt', [SumaController::class, 'showdata'])->name('joni');
Route::get('/surat-masuk/{suma}/edit', [SumaController::class, 'edit'])->name('edit');
Route::get('/surat-masuk/{suma}/surat', [SumaController::class, 'surat'])->name('surat');
Route::get('/surat-masuk/{suma}/destroy', [SumaController::class, 'destroy'])->name('destroy');
Route::put('/surat-masuk/{suma}', [SumaController::class, 'update'])->name('update');
Route::get('/surat-masuk/create', [SumaController::class, 'create'])->name('create');

//surat keluar
Route::get('/surat-keluar', [SukelController::class, 'index'])->name('tes2');
Route::post('/surat-keluar', [SukelController::class, 'store'])->name('store2');
Route::get('/surat-keluar/dt', [SukelController::class, 'showdata'])->name('joni2');
Route::get('/surat-keluar/{sukel}/edit', [SukelController::class, 'edit'])->name('edit2');
Route::get('/surat-keluar/{sukel}/surat', [SukelController::class, 'surat'])->name('surat2');
Route::get('/surat-keluar/{sukel}/destroy', [SukelController::class, 'destroy'])->name('destroy2');
Route::put('/surat-keluar/{sukel}', [SukelController::class, 'update'])->name('update2');
Route::get('/surat-keluar/create', [SukelController::class, 'create'])->name('create2');

//surat tanah
Route::get('/surat-tanah', [SutaController::class, 'index'])->name('tes3');
Route::post('/surat-tanah', [SutaController::class, 'store'])->name('store3');
Route::get('/surat-tanah/dt', [SutaController::class, 'showdata'])->name('joni3');
Route::get('/surat-tanah/{suta}/edit', [SutaController::class, 'edit'])->name('edit3');
Route::get('/surat-tanah/{suta}/surat', [SutaController::class, 'surat'])->name('surat3');
Route::get('/surat-tanah/{suta}/destroy', [SutaController::class, 'destroy'])->name('destroy3');
Route::put('/surat-tanah/{suta}', [SutaController::class, 'update'])->name('update3');
Route::get('/surat-tanah/create', [SutaController::class, 'create'])->name('create3');

//surat perintah
Route::get('/surat-perintah', [SupeController::class, 'index'])->name('tes4');
Route::post('/surat-perintah', [SupeController::class, 'store'])->name('store4');
Route::get('/surat-perintah/dt', [SupeController::class, 'showdata'])->name('joni4');
Route::get('/surat-perintah/{supe}/edit', [SupeController::class, 'edit'])->name('edit4');
Route::get('/surat-perintah/{supe}/surat', [SupeController::class, 'surat'])->name('surat4');
Route::get('/surat-perintah/{supe}/destroy', [SupeController::class, 'destroy'])->name('destroy4');
Route::put('/surat-perintah/{supe}', [SupeController::class, 'update'])->name('update4');
Route::get('/surat-perintah/create', [SupeController::class, 'create'])->name('create4');

//surat sk
Route::get('/surat-sk', [SukaController::class, 'index'])->name('tes5');
Route::post('/surat-sk', [SukaController::class, 'store'])->name('store5');
Route::get('/surat-sk/dt', [SukaController::class, 'showdata'])->name('joni5');
Route::get('/surat-sk/{suka}/edit', [SukaController::class, 'edit'])->name('edit5');
Route::get('/surat-sk/{suka}/surat', [SukaController::class, 'surat'])->name('surat5');
Route::get('/surat-sk/{suka}/destroy', [SukaController::class, 'destroy'])->name('destroy5');
Route::put('/surat-sk/{suka}', [SukaController::class, 'update'])->name('update5');
Route::get('/surat-sk/create', [SukaController::class, 'create'])->name('create5');

//cetak
Route::get('/cetak-surat-masuk', [SumaController::class, 'halsuma'])->name('hsuma');
Route::post('/cetak-surat-masuk', [SumaController::class, 'halsuma'])->name('csuma');

Route::get('/cetak-surat-keluar', [SukelController::class, 'halsuma'])->name('hsukel');
Route::post('/cetak-surat-keluar', [SukelController::class, 'halsuma'])->name('csukel');

Route::get('/cetak-surat-tanah', [SutaController::class, 'halsuma'])->name('hsuta');
Route::post('/cetak-surat-tanah', [SutaController::class, 'halsuma'])->name('csuta');

Route::get('/cetak-surat-perintah-tugas', [SupeController::class, 'halsuma'])->name('hsupe');
Route::post('/cetak-surat-perintah-tugas', [SupeController::class, 'halsuma'])->name('csupe');

Route::get('/cetak-surat-SK', [SukaController::class, 'halsuma'])->name('hsuka');
Route::post('/cetak-surat-SK', [SukaController::class, 'halsuma'])->name('csuka');
// Route::get('/gas', [SumaController::class, 'cetaksuma'])->name('gas');



Route::group(['middleware' => ['role:admin']], function(){
    // 
    Route::get('/user', [SumaController::class, 'indexuser'])->name('indexorang');
});
// Route::group(['middleware' => ['role:admin']], function(){
//     // 
//     Route::get('/user', [SumaController::class, 'direk'])->name('direk');
// });
Route::get('/user/{user}/destroy', [SumaController::class, 'destroyuser'])->name('destroyuser');
Route::get('/user-show', [SumaController::class, 'showdata1'])->name('lihatorang');
// Route::get('/user', [SumaController::class, 'indexuser'])->name('indexorang');
Route::get('/useradd', [SumaController::class, 'adduser'])->name('adduser');
Route::post('/useradd/yok', [SumaController::class, 'add'])->name('add');

