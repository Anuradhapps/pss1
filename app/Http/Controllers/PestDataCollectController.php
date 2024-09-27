<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CommonDataCollect;
use App\Models\Pest;
use App\Models\PestDataCollect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PestDataCollectController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        $CommonData = CommonDataCollect::where('user_id', '=', $user->id)->latest()->get();

        return view('pestData.index',['CommonData'=>$CommonData]);
    }

    public function create()
    {
        $pests = Pest::all();
        return view('pestData.create',['pests'=>$pests]);
    }

    public function store(Request $request)
    {


        $validatedRequest = $request->validate([
            'date_collected' => 'required',
            'growth_s_c' => 'required',
            'temperature' => 'required',
            'numbrer_r_day' => 'required',
        ]);
        $CommonDataCollect = CommonDataCollect::create([
            'user_id'=>Auth::user()->id,
            'c_date' => $validatedRequest['date_collected'],
            'temperature'=>$validatedRequest['temperature'] ,
            'growth_s_c'=> $validatedRequest['growth_s_c'],
            'numbrer_r_day'=> $validatedRequest['numbrer_r_day'],
        ]);
        PestDataCollect::create([
            'common_data_collectors_id' => $CommonDataCollect->id,
            'pest_name' => 'Number_Of_Tillers', // This should just get the name from the Pest model
            'location_one' => $request->input('Number_Of_Tillers_location_1'),
            'location_two' => $request->input('Number_Of_Tillers_location_2'),
            'location_three' => $request->input('Number_Of_Tillers_location_3'),
            'location_four' => $request->input('Number_Of_Tillers_location_4'),
            'location_five' => $request->input('Number_Of_Tillers_location_5'),
            'location_six' => $request->input('Number_Of_Tillers_location_6'),
            'location_seven' => $request->input('Number_Of_Tillers_location_7'),
            'location_eight' => $request->input('Number_Of_Tillers_location_8'),
            'location_nine' => $request->input('Number_Of_Tillers_location_9'),
            'location_10' => $request->input('Number_Of_Tillers_location_10'),
        ]);
        $pests = Pest::all();
        foreach ($pests as $pest) {
            PestDataCollect::create([
                'common_data_collectors_id' => $CommonDataCollect->id,
                'pest_name' => $pest->name, // This should just get the name from the Pest model
                'location_one' => $request->input($pest->id . '_location_1'),
                'location_two' => $request->input($pest->id . '_location_2'),
                'location_three' => $request->input($pest->id . '_location_3'),
                'location_four' => $request->input($pest->id . '_location_4'),
                'location_five' => $request->input($pest->id . '_location_5'),
                'location_six' => $request->input($pest->id . '_location_6'),
                'location_seven' => $request->input($pest->id . '_location_7'),
                'location_eight' => $request->input($pest->id . '_location_8'),
                'location_nine' => $request->input($pest->id . '_location_9'),
                'location_10' => $request->input($pest->id . '_location_10'),
            ]);
        }

        return redirect()->route('pestdata.index')->with('success', 'Pest Data created successfully.');
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

    public function destroy($id)
    {
        CommonDataCollect::findOrFail($id)->delete();
        return redirect()->route('pestdata.index')->with('success', 'Pest Data deleted successfully.');
    }
}
