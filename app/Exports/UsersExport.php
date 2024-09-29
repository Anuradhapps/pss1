<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * Fetch the logged-in user's data for export.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $result=[];
        // Get the currently authenticated user and eager load relationships
        $users = User::get();
        foreach($users as $user){
            foreach($user->commonDataCollect as $cdata){
                foreach($cdata->pestDataCollect as $pdata){
                    $result[] = [
                        'ID'                  => $user->id,
                        'Name'                => $user->name,
                        'Email'               => $user->email,
                        // Collector details
                        'Collector District'  => $user->collector ? $user->collector->district : 'N/A', // Adjust field name if needed
                        'Collector ID'        => $user->collector ? $user->collector->id : 'N/A',
                        // CommonDataCollect example: adjust as needed
                        'Common Data Date'   => $cdata->c_date,
                        'pest Name'          => $pdata->pest_name,
                        'total'              => $pdata->total
                                                
                    ];
                }
            }
        }
        

        // Format the user data for export as a collection
        return collect($result);
    }

    /**
     * Define headings for the Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID', 
            'Name', 
            'Email', 
            'Collector District', 
            'Collector ID', 
            'Common Data date', 
            'pest name',
            'total' ,
        ];
    }
}
