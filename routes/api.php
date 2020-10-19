<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Exports\OrderExport;
use App\Mail\Order;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function (){
    Route::post('/send-otp', 'ApiController@sendOtp');

    Route::post('/verify-otp', 'ApiController@verifyOTP');

    Route::post('/calculate-quote', 'ApiController@calculateQuote');

    // All classes
    Route::get('/classes', 'ApiController@getClasses');

    // Class by id
    Route::get('/classes/{class_id}', 'ApiController@getClass');
    
    // Subclasses
    Route::get('/classes/{class_id}/subclasses', 'ApiController@getSubClasses');

    // Class categories
    Route::get('/classes/{class_id}/categories', 'ApiController@getCategories');

    Route::get('/insurer/{id}/logo', 'InsurersController@logo')->name("api.avatar");

    // Payments
    Route::post('/callback',  'ApiController@mpesaCallback');

    Route::post('/manual-c2b-confirmation',  'ApiController@c2bConfirmationCallback');

    Route::post('/manual-c2b-verification',  'ApiController@c2bVerificationCallback');

    Route::post('/transaction',  'ApiController@checkTransaction');

    Route::post('/email/quote', 'ApiController@sendQuoteEmail');

    Route::post('/email/payment', 'ApiController@sendPaymentEmail');

});
