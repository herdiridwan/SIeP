<?php

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

Route::get('/', 'AuthController@getLogin')->middleware('guest');

// Authentication Routes
Route::get('/login', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('admin/dashboard', 'EmployeeController@dashboard');
    // Akun
    Route::get('admin/akun/kelola-akun', 'UserController@index');
    Route::get('admin/akun/input-akun', 'UserController@create');
    Route::get('admin/akun/{employee}', 'EmployeeController@show');
    Route::post('admin/akun/input-akun', 'UserController@store');
    Route::patch('admin/akun/{id}', 'EmployeeController@updatePasswordFromAdmin');
    Route::delete('admin/akun/{id}', 'UserController@destroy');
    // Keuangan
    Route::get('admin/keuangan', 'FinanceController@index');
    Route::post('admin/keuangan', 'FinanceController@indexSearch');
    Route::get('admin/keuangan/pemasukan', 'FinanceController@create');
    Route::get('admin/keuangan/pengeluaran', 'FinanceController@createPengeluaran');
    Route::get('admin/keuangan/{finance}', 'FinanceController@show');
    Route::patch('admin/keuangan/{finance}/edit', 'FinanceController@update');
    Route::post('admin/keuangan/pemasukan', 'FinanceController@store');
    Route::post('admin/keuangan/pengeluaran', 'FinanceController@storePengeluaran');
    Route::delete('admin/keuangan/{finance}', 'FinanceController@destroy');
    // Data Karyawan
    Route::get('admin/data-karyawan', 'EmployeeController@index');
    Route::get('admin/data-karyawan/{employee}', 'EmployeeController@show');
    Route::get('admin/data-karyawan/{employee}/edit', 'EmployeeController@editAdmin');
    Route::patch('admin/data-karyawan/{id}', 'EmployeeController@updateProfileFromAdmin');
    Route::get('admin/update-password', 'EmployeeController@showPasswordAdmin');
    Route::patch('admin/update-passwordd', 'EmployeeController@updatePasswordAdmin');
    // Jabatan
    Route::get('admin/jabatan', 'PositionController@index');
    Route::get('admin/jabatan/input-jabatan', 'PositionController@create');
    Route::get('admin/jabatan/{position}', 'PositionController@show');
    Route::patch('admin/jabatan/{position}/edit', 'PositionController@update');
    Route::patch('admin/jabatan/{employee}', 'EmployeeController@updateJabatan');
    Route::post('admin/jabatan/input-jabatan', 'PositionController@store');
    Route::delete('admin/jabatan/{position}', 'PositionController@destroy');
    // Presensi
    Route::get('admin/presensi', 'PresenceController@index');
    Route::post('admin/presensi', 'PresenceController@indexSearch');
    Route::post('admin/presensi/edit', 'PresenceController@edit');
    Route::patch('admin/presensi/edit/{presence}', 'PresenceController@update');
    // Komplain
    Route::get('admin/komplain', 'ComplaintController@indexAdmin');
    Route::get('admin/komplain/{complaint}/respon', 'ResponseController@show');
    Route::post('admin/respon/{complaint}', 'ResponseController@store');
    // Penambahan & potongan
    Route::get('admin/penambahan-potongan', 'AllowanceController@index');
    Route::post('admin/penambahan', 'AllowanceController@storePenambahan');
    Route::delete('admin/penambahan-potongan/{allowance}', 'AllowanceController@destroy');
    Route::post('admin/potongan', 'AllowanceController@storePotongan');
    Route::patch('admin/potongan/{allowance}', 'AllowanceController@patchPotongan');
    Route::patch('admin/penambahan/{allowance}', 'AllowanceController@patchPenambahan');
    // Penggajian
    Route::get('admin/penggajian', 'PayrollHistoryController@index');
    Route::post('admin/penggajian', 'PayrollHistoryController@indexPost');
    Route::post('admin/post/penggajian/{employee}', 'PayrollHistoryController@store');
    // Cetak Penggajian
    Route::post('printPdf/{employee}/{month}/{year}/', 'PayrollHistoryController@printPDF');
});

// Users Routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('profile', 'EmployeeController@profile');
    Route::get('profile/edit', 'EmployeeController@editUser');
    Route::patch('profile/update-password', 'EmployeeController@updatePassword');
    Route::patch('profile/update-profile', 'EmployeeController@updateProfile');

    Route::get('presensi', 'PresenceController@indexUser');
    Route::post('presensi', 'PresenceController@postPresensi');
    Route::get('presensi/rekap-presensi', 'PresenceController@rekapPresensi');
    Route::post('presensi/rekap-presensi', 'PresenceController@rekapPresensiSearch');

    Route::get('komplain', 'ComplaintController@indexUser');
    Route::post('komplain', 'ComplaintController@postKomplainUser');
    Route::get('komplain/{complaint}', 'ComplaintController@show');

    Route::get('penggajian', 'PayrollHistoryController@indexUser');
    Route::post('penggajian', 'PayrollHistoryController@indexPostUser');

    Route::post('printPdf/{employee}/{month}/{year}/employee', 'PayrollHistoryController@printPDF');

    Route::get('hrd/keuangan', 'FinanceController@indexhrd');
    Route::get('hrd/dashboard', 'EmployeeController@dashboardhrd');
    Route::get('hrd/penggajian', 'PayrollHistoryController@indexhrd');
});
