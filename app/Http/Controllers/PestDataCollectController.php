<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CommonDataCollect;
use App\Models\PestDataCollect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PestDataCollectController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        $pestAndCommonData = CommonDataCollect::where('user_id', '3898902b-6174-46a6-9864-7dea9ecac78e')->get();

        return view('pestData.edit',['PestAndCommonData'=>$pestAndCommonData]);
    }

    public function create()
    {
        return view('pestData.create');
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
