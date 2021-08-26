<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Models\MultipleChoiceResponseGroup;

class MultipleChoiceResponseGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Template $template)
    {

        dd($template->multipleChoiceResponseGroups()->with('responses')->get());

 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MultipleChoiceResponseGroup  $multipleChoiceResponseGroup
     * @return \Illuminate\Http\Response
     */
    public function show(MultipleChoiceResponseGroup $multipleChoiceResponseGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MultipleChoiceResponseGroup  $multipleChoiceResponseGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(MultipleChoiceResponseGroup $multipleChoiceResponseGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MultipleChoiceResponseGroup  $multipleChoiceResponseGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MultipleChoiceResponseGroup $multipleChoiceResponseGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MultipleChoiceResponseGroup  $multipleChoiceResponseGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(MultipleChoiceResponseGroup $multipleChoiceResponseGroup)
    {
        //
    }
}
