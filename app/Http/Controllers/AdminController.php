<?php

namespace App\Http\Controllers;

use Session;
use Storage;
use Auth;
use Illuminate\Http\Request;
class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = $this->auth->user();
        // return $user;

        $title ='Login';
        $date = compact('title');
        return view('admin.login',$date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $token ="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2xlb2xhcmF2ZWwvcHVibGljL2FwaS9sb2dpbiIsImlhdCI6MTUxMDYzMzU2NCwiZXhwIjoxNTEwNjM3MTY0LCJuYmYiOjE1MTA2MzM1NjQsImp0aSI6IjhXNUNUcld3QWs1dTZuUFEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.YxApv0QlVe4_tjW_hsdaqe3FKgri96Czj57lEf068M4";
        public_path();
        $contents = Storage::get('token.json');
        $date = json_decode($contents,true);
        $token = $date['token'];
        $title ='TEST';
        // $user = Auth::user();
        // return $user;

        $date = compact('title','token');
        return view('lesson.add',$date);
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
    public function date(){
        return 'look';
    }
}
