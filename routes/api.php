<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['cors'])->group(function () {
    Route::get('/eddyenin',function(){
        return response(["slackUsername" => "eddyenin6",
            "backend" => true,
            "age" => 28,
            "bio" => "My name is Edidiong Akpaenin. I am a web developer."])
            ->header('Content-type','application/json')
            ->header('Access-Control-Allow-Origin', '*');
    });

    Route::post('/enum',function(){

        if($_SERVER['REQUEST_METHOD']==="POST"){
            $json = file_get_contents('php://input');

            // Converts it into a PHP object
            $data = json_decode($json ,true);


            $slackUsername="eddyenin";
            $operands = array('addition','subtraction','multiplication');
            $operation_type = (strtolower($data['operation_type']) ? strtolower($data['operation_type']) : strtolower($_POST['operation_type']));
            $x = ($data['x'] ? $data['x']:$_POST['x']);
            $y = ($data['y'] ? $data['y']:$_POST['y']);

            if($operation_type ==='' || !in_array($operation_type, $operands)){
                die( json_encode(['error' => 'INVALID OPERATION TYPE']));
            }

            if(is_nan($x)){
             die( json_encode(['error' => 'X is not an integer']));
            }

            if(is_nan($y)){
             die( json_encode(['error' => 'Y is not an integer']));
            }

            $result = "";

            if(in_array($operation_type, $operands) && $operation_type==='addition'){
                $result = $x + $y;
            }

            if(in_array($operation_type, $operands) && $operation_type==='multiplication'){
                $result = $x * $y;
            }


            if(in_array($operation_type, $operands) && $operation_type==='subtraction'){
                $result = $x - $y;
            }


            $details = array(
                "slackUsername"=> $slackUsername,
                "result"=>$result,
                "operation_type"=>$operation_type
            );

            // Use json_encode() function
            $json = json_encode($details);

            // Display the output
            echo($json);
        }
        else {
            die( json_encode(['error' => 'You did rubbish' .$_SERVER['REQUEST_METHOD'].' my guy']));
        }
    });
 });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
