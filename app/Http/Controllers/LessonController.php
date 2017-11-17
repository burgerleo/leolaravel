<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

class LessonController extends ApiController
{   

    protected $lessonTransformar;
    public function __construct(LessonTransformer $lessonTransformar){
        $this->middleware('api.auth');
        $this->lessonTransformar = $lessonTransformar;
    }     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lessons = Lesson::all();
        if(!$Lessons){
            return $this->responseNotFound();
        }
        return $this->response([
            'status' =>'success',
            // 'status' => 200,
            'date' => $this->lessonTransformar->transformCollection($Lessons->toArray())
        ]);


        // return \Response::json([
        //     'status' => 'success',
        //     'status_code' => 200,
        //     'date' => $this->lessonTransformar->transformCollection($Lessons->toArray())
        // ]);
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

        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'free' => 'required'
        ]);
        // $Lesson = new Lesson;
        // $Lesson->title = $request->title;
        // $Lesson->body = $request->body;
        // $Lesson->free = $request->free;
        // $Lesson->save();


        $create = Lesson::create($request->all());
        // return $create;
        return $this->response([
            'status' =>'success',
            'date' => $this->lessonTransformar->transform($create)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Lessons = Lesson::find($id);

        if(!$Lessons){
            return $this->responseNotFound();
        }

        return $this->response([
            'status' =>'success',
            // 'status' => 200,
            'date'=> $this->lessonTransformar->transform($Lessons)
        ]);
        // return \Response::json([
        //     'status' =>'success',
        //     'status_code'=>200,
        //     'date'=> $this->lessonTransformar->transform($Lessons)
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Lesson = Lesson::find($id);
        $Lesson->update($request->all());
        // $title = $request -> input('title');
        // $body = $request -> input('body');
        // $free = $request -> input('free');
        // $Lessons -> title = $title;
        // $Lessons -> body = $body;
        // $Lessons -> free = $free;
        // $Lessons -> save();
        return $Lesson;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
    public function destroy($id)
    {
        
        $Lesson = Lesson::find($id);
        $Lesson->delete();
        return $Lesson;
    }
    public function showDD(){
        return 123;
    }
}
