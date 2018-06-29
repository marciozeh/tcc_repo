<?php

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


Route::prefix('admin')->group(function (){
    Route::get('firewall', 'Admin\\FirewallController@index')->name('firewall.index');
    Route::post('firewall', 'Admin\\FirewallController@send')->name('firewall.send');
    Route::post('firewall/1', 'Admin\\FirewallController@portLib')->name('firewall.portLib');
    Route::post('firewall/2', 'Admin\\FirewallController@portBlo')->name('firewall.portBlo');
    Route::post('firewall/3', 'Admin\\FirewallController@sitePro')->name('firewall.Sites');
    Route::get('dhcp', 'Admin\\DhcpController@index')->name('dhcp.index');
    Route::post('dhcp', 'Admin\\DhcpController@send')->name('dhcp.send');
    Route::get('squid', 'Admin\\SquidController@index')->name('squid.index');
    Route::post('squid', 'Admin\\SquidController@send')->name('squid.send');
    Route::get('sarg', 'Admin\\SargController@index')->name('sarg.index');
    Route::post('sarg', 'Admin\\SargController@send')->name('sarg.send');
    Route::get('domain', 'Admin\\DomainController@index')->name('domain.index');
    Route::post('domain', 'Admin\\DomainController@send')->name('domain.send');
    Route::get('rede', 'Admin\\WebController@index')->name('web.index');
    Route::post('rede', 'Admin\\WebController@send')->name('web.send');


});


Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});