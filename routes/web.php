<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllres\ImageController;
use App\Http\Controllers\UserController;


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

Route::get( '/login', 'App\Http\Controllers\UserController@getLoginForm' );
Route::get( '/logout', 'App\Http\Controllers\UserController@logout' );

Route::post( '/index_mlum', 'App\Http\Controllers\UserController@login' );
Route::get( '/dashboard', 'App\Http\Controllers\UserController@dashboard' );

Route::middleware('auth')->group(function() {
    Route::get( '/superadmin', 'App\Http\Controllers\SuperAdminController@index' );
    Route::get( '/admin', 'App\Http\Controllers\AdminController@index' );

    Route::get( '/superadmin/createNewAdmin', 'App\Http\Controllers\SuperAdminController@createNewAdmin' );
    Route::get( '/callcenter/getCreateForm', 'App\Http\Controllers\CallCenterController@getCreateForm' );
    Route::get( '/admin/createNewCoordinador/{parent_id?}', 'App\Http\Controllers\AdminController@createNewCoordinador');
    Route::get( '/user/createNewUser/{level}/{parent_id}', 'App\Http\Controllers\UserController@createNewUser' );
    Route::get( '/user/editUser/{user_id}', 'App\Http\Controllers\USerController@editUser' );
    Route::get( '/user/list', 'App\Http\Controllers\USerController@userList' );
    Route::get( '/profile/{user_id?}', 'App\Http\Controllers\UserController@profile' );
    Route::post( '/password-reset', 'App\Http\Controllers\USerController@passwordReset' );

    // Route::get( '/admin/createNewCoordinator/{parent_id?}', 'App\Http\Controllers\AdminController@createNewCoordinator' );
    Route::get( '/coordinador/createNewSeccional', 'App\Http\Controllers\CoordinadorController@createNewSeccional' );
    Route::get( '/seccional/createNewMovilizador', 'App\Http\Controllers\SeccionalController@createNewMovilizador' );
    Route::get( '/movilizador/createNewFamiliar', 'App\Http\Controllers\MovilizadorController@createNewFamiliar' );

    Route::get( '/superadmin/editAdmin/{user_id}', 'App\Http\Controllers\SuperAdminController@editAdmin' );
    Route::get( '/admin/editCoordinador/{user_id}', 'App\Http\Controllers\AdminController@editCoordinador');
    Route::get( '/coordinador/editSeccional/{user_id}', 'App\Http\Controllers\CoordinadorController@editSeccional' );
    Route::get( '/seccional/editMovilizador/{user_id}', 'App\Http\Controllers\SeccionalController@editMovilizador' );
    Route::get( '/movilizador/editFamiliar/{user_id}', 'App\Http\Controllers\MovilizadorController@editFamiliar' );

    Route::post( '/admin/create', 'App\Http\Controllers\AdminController@create' );
    Route::post( '/callcenter/create', 'App\Http\Controllers\CallCenterController@create' );
    Route::post( '/coordinador/create', 'App\Http\Controllers\CoordinadorController@create' );
    Route::post( '/user/create', 'App\Http\Controllers\UserController@create' );
    Route::post( '/user/setVerified', 'App\Http\Controllers\UserController@setVerified' );
    // Route::post( '/coordinator/create', 'App\Http\Controllers\CoordinadorController@create' );
    Route::post( '/seccional/create', 'App\Http\Controllers\SeccionalController@create' );
    Route::post( '/movilizador/create', 'App\Http\Controllers\MovilizadorController@create' );
    Route::post( '/familiar/create', 'App\Http\Controllers\FamiliarController@create' );

    Route::post( '/admin/edit/{user_id}', 'App\Http\Controllers\AdminController@edit' );
    Route::post( '/coordinador/edit/{user_id}', 'App\Http\Controllers\CoordinadorController@edit' );
    Route::post( '/seccional/edit/{user_id}', 'App\Http\Controllers\SeccionalController@edit' );
    Route::post( '/movilizador/edit/{user_id}', 'App\Http\Controllers\MovilizadorController@edit' );
    Route::post( '/familiar/edit/{user_id}', 'App\Http\Controllers\FamiliarController@edit' );

    Route::post( '/sms-verify', 'App\Http\Controllers\UserController@smsVerify' );

    Route::post( '/getSectionFromEstado', 'App\Http\Controllers\UtilsController@getSectionFromEstado' );

    Route::post( '/checkDuplicate', 'App\Http\Controllers\UserController@checkDuplicate' );

    Route::get( '/', 'App\Http\Controllers\GymoveadminController@dashboard_1' );
    Route::get( '/index', 'App\Http\Controllers\GymoveadminController@dashboard_1' );
    Route::post( '/featured-menu-list', 'App\Http\Controllers\GymoveadminController@featured_menu_list' );
    Route::get( '/workout-statistic', 'App\Http\Controllers\GymoveadminController@workout_statistic' );
    Route::get( '/workoutplan', 'App\Http\Controllers\GymoveadminController@workoutplan' );
    Route::get( '/distance-map', 'App\Http\Controllers\GymoveadminController@distance_map' );
    Route::post( '/recent-activities', 'App\Http\Controllers\GymoveadminController@recent_activities' );
    Route::get( '/food-menu', 'App\Http\Controllers\GymoveadminController@food_menu' );
    Route::post( '/food-menu-list', 'App\Http\Controllers\GymoveadminController@food_menu_list' );
    Route::post( '/trending-ingridients', 'App\Http\Controllers\GymoveadminController@trending_ingridients' );
    Route::get( '/personal-record', 'App\Http\Controllers\GymoveadminController@personal_record' );
    Route::get( '/app-calender', 'App\Http\Controllers\GymoveadminController@app_calender' );
    Route::get( '/app-profile', 'App\Http\Controllers\GymoveadminController@app_profile' );
    Route::get( '/post-details', 'App\Http\Controllers\GymoveadminController@post_details' );
    Route::get( '/chart-chartist', 'App\Http\Controllers\GymoveadminController@chart_chartist' );
    Route::get( '/chart-chartjs', 'App\Http\Controllers\GymoveadminController@chart_chartjs' );
    Route::get( '/chart-flot', 'App\Http\Controllers\GymoveadminController@chart_flot' );
    Route::get( '/chart-morris', 'App\Http\Controllers\GymoveadminController@chart_morris' );
    Route::get( '/chart-peity', 'App\Http\Controllers\GymoveadminController@chart_peity' );
    Route::get( '/chart-sparkline', 'App\Http\Controllers\GymoveadminController@chart_sparkline' );
    Route::get( '/ecom-checkout', 'App\Http\Controllers\GymoveadminController@ecom_checkout' );
    Route::get( '/ecom-customers', 'App\Http\Controllers\GymoveadminController@ecom_customers' );
    Route::get( '/ecom-invoice', 'App\Http\Controllers\GymoveadminController@ecom_invoice' );
    Route::get( '/ecom-product-detail', 'App\Http\Controllers\GymoveadminController@ecom_product_detail' );
    Route::get( '/ecom-product-grid', 'App\Http\Controllers\GymoveadminController@ecom_product_grid' );
    Route::get( '/ecom-product-list', 'App\Http\Controllers\GymoveadminController@ecom_product_list' );
    Route::get( '/ecom-product-order', 'App\Http\Controllers\GymoveadminController@ecom_product_order' );
    Route::get( '/email-compose', 'App\Http\Controllers\GymoveadminController@email_compose' );
    Route::get( '/email-inbox', 'App\Http\Controllers\GymoveadminController@email_inbox' );
    Route::get( '/email-read', 'App\Http\Controllers\GymoveadminController@email_read' );
    Route::get( '/form-editor-summernote', 'App\Http\Controllers\GymoveadminController@form_editor_summernote' );
    Route::get( '/form-element', 'App\Http\Controllers\GymoveadminController@form_element' );
    Route::get( '/form-pickers', 'App\Http\Controllers\GymoveadminController@form_pickers' );
    Route::get( '/form-validation-jquery', 'App\Http\Controllers\GymoveadminController@form_validation_jquery' );
    Route::get( '/form-wizard', 'App\Http\Controllers\GymoveadminController@form_wizard' );
    Route::get( '/map-jqvmap', 'App\Http\Controllers\GymoveadminController@map_jqvmap' );
    Route::get( '/page-error-400', 'App\Http\Controllers\GymoveadminController@page_error_400' );
    Route::get( '/page-error-403', 'App\Http\Controllers\GymoveadminController@page_error_403' );
    Route::get( '/page-error-404', 'App\Http\Controllers\GymoveadminController@page_error_404' );
    Route::get( '/page-error-500', 'App\Http\Controllers\GymoveadminController@page_error_500' );
    Route::get( '/page-error-503', 'App\Http\Controllers\GymoveadminController@page_error_503' );
    Route::get( '/page-forgot-password', 'App\Http\Controllers\GymoveadminController@page_forgot_password' );
    Route::get( '/page-lock-screen', 'App\Http\Controllers\GymoveadminController@page_lock_screen' );
    Route::get( '/page-login', 'App\Http\Controllers\GymoveadminController@page_login' );
    Route::get( '/page-register', 'App\Http\Controllers\GymoveadminController@page_register' );
    Route::get( '/table-bootstrap-basic', 'App\Http\Controllers\GymoveadminController@table_bootstrap_basic' );
    Route::get( '/table-datatable-basic', 'App\Http\Controllers\GymoveadminController@table_datatable_basic' );
    Route::get( '/uc-lightgallery', 'App\Http\Controllers\GymoveadminController@uc_lightgallery' );
    Route::get( '/uc-nestable', 'App\Http\Controllers\GymoveadminController@uc_nestable' );
    Route::get( '/uc-noui-slider', 'App\Http\Controllers\GymoveadminController@uc_noui_slider' );
    Route::get( '/uc-select2', 'App\Http\Controllers\GymoveadminController@uc_select2' );
    Route::get( '/uc-sweetalert', 'App\Http\Controllers\GymoveadminController@uc_sweetalert' );
    Route::get( '/uc-toastr', 'App\Http\Controllers\GymoveadminController@uc_toastr' );
    Route::get( '/ui-accordion', 'App\Http\Controllers\GymoveadminController@ui_accordion' );
    Route::get( '/ui-alert', 'App\Http\Controllers\GymoveadminController@ui_alert' );
    Route::get( '/ui-badge', 'App\Http\Controllers\GymoveadminController@ui_badge' );
    Route::get( '/ui-button', 'App\Http\Controllers\GymoveadminController@ui_button' );
    Route::get( '/ui-button-group', 'App\Http\Controllers\GymoveadminController@ui_button_group' );
    Route::get( '/ui-card', 'App\Http\Controllers\GymoveadminController@ui_card' );
    Route::get( '/ui-carousel', 'App\Http\Controllers\GymoveadminController@ui_carousel' );
    Route::get( '/ui-dropdown', 'App\Http\Controllers\GymoveadminController@ui_dropdown' );
    Route::get( '/ui-grid', 'App\Http\Controllers\GymoveadminController@ui_grid' );
    Route::get( '/ui-list-group', 'App\Http\Controllers\GymoveadminController@ui_list_group' );
    Route::get( '/ui-media-object', 'App\Http\Controllers\GymoveadminController@ui_media_object' );
    Route::get( '/ui-modal', 'App\Http\Controllers\GymoveadminController@ui_modal' );
    Route::get( '/ui-pagination', 'App\Http\Controllers\GymoveadminController@ui_pagination' );
    Route::get( '/ui-popover', 'App\Http\Controllers\GymoveadminController@ui_popover' );
    Route::get( '/ui-progressbar', 'App\Http\Controllers\GymoveadminController@ui_progressbar' );
    Route::get( '/ui-tab', 'App\Http\Controllers\GymoveadminController@ui_tab' );
    Route::get( '/ui-typography', 'App\Http\Controllers\GymoveadminController@ui_typography' );
    Route::get( '/widget-basic', 'App\Http\Controllers\GymoveadminController@widget_basic' );

    Route::post( '/image/upload', 'ImageController@imageUploadPost' );

});
