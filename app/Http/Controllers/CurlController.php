<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurlController extends Controller
{
     public function getcurl($url){

        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL, $url);    //設置url屬性
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);   //獲取數據
        curl_close($ch);    //關閉curl
        return $output;

    }
}
