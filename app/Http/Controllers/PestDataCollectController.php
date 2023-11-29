<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\PestDataCollect;
use Illuminate\Http\Request;

class PestDataCollectController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($Id)
    {
        $pests = PestDataCollect::where('common_data_collectors_id', '=', $Id)->get(); 
        return view('collectors.show-pest-records', compact('pests'));
       
    }

    public function edit(PestDataCollect $pestDataCollect)
    {
        //
    }

    public function update(Request $request, PestDataCollect $pestDataCollect)
    {
        //
    }

    public function destroy(PestDataCollect $pestDataCollect)
    {
        //
    }
}
