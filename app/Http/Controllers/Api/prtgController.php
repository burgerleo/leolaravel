<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use App\Http\Controllers\CurlController;

class prtgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = 'prtgadmin';
        $password = 'prtgadmin';
        $id = 1006;
        $url ='http://192.168.8.61/api/table.xml?content=values&sortby=-datetime&display=extendedheaders&graphid=0&columns=datetime%2Cvalue_%2Ccoverage%2Cobjid%2Cbaselink&_=1510911861281&id=1006&count=1'.'&username='.$username.'&password='.$password;
        // $url = 'http://192.168.8.61/api/getsensordetails.json?id='.$id.'&username='.$username.'&password='.$password;
        $output = $this->getcurl($url);
        return $output;

        $date = json_decode($output,true);
        $date_time = $date['sensordata']['lastcheck'];
        $time = $this -> prtg_transfor_time($date_time);
        $date['sensordata']['lastcheck'] = $time;
        $date['sensordata']['lastup'] = $time;

        // return $time;
        return $date;


        // $time = rtrim($time,2);
        // echo trim(substr($time, -2),'[');
        // echo "<br>";
        // $time = substr($time,0,-3);
        // // echo "<br>";
        $time = $this -> prtg_transfor_time($DT);
        return $time;

    }

    public function prtg_transfor_time ($date_time){

        $offset = substr($date_time,-10); //取出多的字串
        preg_match('/[0-9]+/',$offset, $offset_second); //時間差
        $time = rtrim($date_time,$offset);
        $date = date_create("1899-12-30 0:0:0");//設定資料原始時間
        $day = floor($time); //取天數
        $second =  floor( ($time-$day)*24*60*60)+$offset_second[0];//計算多少秒
        date_add($date,date_interval_create_from_date_string($day."day".$second."seconds"));
        return date_format($date,"Y-m-d h:i:sa");
    }
    function prtg_timestamp_to_unix_timestamp ($prtg_timestamp) {
        if (!is_numeric($prtg_timestamp)) return $prtg_timestamp;
        $past = ($prtg_timestamp-25569)*86400;
        $unix_timestamp = $now-$past;
        return $unix_timestamp;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
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
