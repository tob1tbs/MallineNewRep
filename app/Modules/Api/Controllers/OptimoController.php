<?php

namespace App\Modules\Api\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptimoController extends Controller
{

    public function __construct() {
        //
    }

    public function optimoAuth() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://public-api.staging.optimo.ge/v1/authorization',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "userName": "8b0f213d-556f-40c1-a933-c5ae8d8b6ec1",
                "password": "5028390a-1367-462a-a9d9-b6af9c81b9ed"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        $response = json_decode($response, true);
        curl_close($curl);
        return $response['accessToken'];
    }

    public function optionCategories() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://public-api.staging.optimo.ge/v1/sale/order',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "orderDate": "2023-01-30T10:43:31.923Z",
              "transactionId": "1111",
              "transactionDescription": "1111",
              "operatorId": 1,
              "orderLines": [
                {
                  "stockItemId": 1,
                  "quantity": 1,
                  "unitPrice": 120
                }
              ]
            }',
            CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'x-request-id: fbcdf370-9bd3-11ed-a8fc-5542ac122202',
            'Authorization: Bearer '.$this->optimoAuth(),
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
}
