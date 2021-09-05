<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateSection;
use App\Models\TemplateQuestion;

class TemplateQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
  
      $section = TemplateSection::find($request->section_id);
      $question = new TemplateQuestion();
      $section->questions()->save($question);   
      return back();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemplateQuestion  $templateQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(TemplateQuestion $templateQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemplateQuestion  $templateQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(TemplateQuestion $templateQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemplateQuestion  $templateQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemplateQuestion $question)
    {


      $question->update($request->question);

      return back();


      // $templateQuestion = TemplateQuestion::find($request->question_id);
      // $templateQuestion->question = $request->question;
      // $templateQuestion->save();

      // return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemplateQuestion  $templateQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemplateQuestion $templateQuestion)
    {
        //
    }
}
