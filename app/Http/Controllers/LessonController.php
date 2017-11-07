<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

class LessonController extends ApiController
{   
    protected $lessonTransformar;

    public function __construct(LessonTransformer $lessonTransformar){

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
    

}
