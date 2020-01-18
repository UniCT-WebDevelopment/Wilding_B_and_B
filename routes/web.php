<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/choise_log_reg', function () {
    return view('choise_log_reg');
});
//albergatore
Route::get('/reg_alb', 'RegController@alb');
Route::post('/ins_reg_alb', 'RegController@ins_alb');
//clinete
Route::get('/reg_cli', 'RegController@cliente');
Route::post('/ins_reg_cli', 'RegController@ins_cliente');
//login success
Route::get('/login_success', function(){return view('login_success');});
//login cliente e albergatore
Route::get('/login', 'RegController@login')->name('login');
Route::post('/login_v', 'RegController@login_dashboard');
//login admin 
Route::get('login_ad/admin', 'AdminController@login_ad')->name('admin');
Route::post('/login_ad/admin_su', 'AdminController@login_su')->name('login_su');
//admin
Route::any('/login_ad/ad_dashboard', 'AdminController@ad_dashboard')->name('ad_dashboard');
Route::any('/login_ad/lista_user', 'AdminController@lista_user')->name('lista_user');
Route::any('/login_ad/mod_dati', 'AdminController@mod_dati')->name('mod_dati');
Route::any('/login_ad/ins_data', 'AdminController@ins_data');
Route::any('/login_ad/delete_user', 'AdminController@delete_user')->name('delete_user');

Route::any('/login_ad/lista_inserzione', 'AdminController@lista_inserzione')->name('lista_inserzione');
Route::any('/login_ad/mod_inserzione', 'AdminController@mod_inserzione')->name('mod_inserzione');
Route::any('/login_ad/new_data', 'AdminController@new_data');
Route::any('/login_ad/delete_inserzione', 'AdminController@delete_inserzione')->name('delete_inserzione');
//cliente dashboard (dopo il login)
Route::any('/cliente/cli_dashboard','DashController@cli_dashboard')->name('cli_dashboard');
Route::any('/cliente/user', 'DashController@user')->name('cli_user');
Route::any('/cliente/tables', 'DashController@tables')->name('cli_tables');
Route::any('/cliente/notifications', 'DashController@notifications')->name('cli_notifications');
//albergatore dashboard (dopo il login)
Route::get('/albergatore/alb_dashboard','AlbController@alb_dashboard')->name('alb_dashboard');
Route::get('/albergatore/alb_annuncio','AlbController@alb_annuncio')->name('alb_annuncio');
Route::post('/albergatore/ins_annuncio', 'AlbController@ins_annuncio');//post per l'annuncio
Route::get('/albergatore/ins_table','AlbController@ins_table')->name('ins_table');
Route::get('/albergatore/pre_table','AlbController@pre_table')->name('pre_table'); //prenotazioni 
//ceraca & prenota
Route::any('/cerca','CercaController@cerca')->name('cerca');
Route::any('/prenota','CercaController@prenota')->name('prenota');
Route::post('/ins_prenotazione','CercaController@ins_prenotazione')->name('ins_prenotazione');
