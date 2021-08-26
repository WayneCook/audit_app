<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\CustomResponseGroup;
use Illuminate\Support\Facades\Redirect;

class CustomResponseGroupController extends Controller
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

    

        // return Inertia::render('Event/Show', [
        //     'event' => $event->only('id', 'title', 'start_date', 'description'),
        // ]);


        return back()->with('success_message', 'Yay it worked');

        
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
     * @param  \App\Models\CustomResponseGroup  $customResponseGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CustomResponseGroup $customResponseGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomResponseGroup  $customResponseGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomResponseGroup $customResponseGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomResponseGroup  $customResponseGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomResponseGroup $customResponseGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomResponseGroup  $customResponseGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomResponseGroup $customResponseGroup)
    {
        //
    }
}
