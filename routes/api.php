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

    Route::get('/insurer/{id}/logo/', 'InsurerController@logo')->name("api.avatar");

    // Payments
    Route::post('/callback',  'ApiController@mpesaCallback');

    Route::post('/transaction',  'ApiController@checkTransaction');

    Route::post('/email/quote', 'ApiController@sendQuoteEmail');

    Route::post('/email/payment', 'ApiController@sendPaymentEmail');

    // Route::post('/test/pdf', function(Request $request) {
    //     $customer_name = $request->input('customer_name'); // <- Customer's first name 
    //     $customer_email = $request->input('to'); // <- Email address
    //     $quote = $request->input('quote');
        
    //     $order_message = new Order($quote, $customer_name, "info@insurely.cc");

    //     $file_name = $quote["name"].'.xlsx';
    //     $file = Excel::download(new OrderExport((object)$quote), $file_name)->getFile(); 

    //     $order_message->attach($file, [
    //         "as" => $file_name,
    //         "mime" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
    //     ]);

    //     Mail::to($customer_email)->send($order_message);

    //     return response([], 200);
    // });

});
