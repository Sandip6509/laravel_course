<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDealerRequest;
use App\Http\Requests\UpdateDealerRequest;
use App\Models\Dealer;

class DealerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDealerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDealerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function show(Dealer $dealer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function edit(Dealer $dealer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDealerRequest  $request
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDealerRequest $request, Dealer $dealer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dealer $dealer)
    {
        //
    }
}
