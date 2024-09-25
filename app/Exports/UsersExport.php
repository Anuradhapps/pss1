<?php

namespace App\Exports;

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
        // Get the currently authenticated user and eager load relationships
        $user = Auth::user()->load(['collector', 'commonDataCollect']);

        // Format the user data for export as a collection
        return collect([
            [
                'ID'                  => $user->id,
                'Name'                => $user->name,
                'Email'               => $user->email,
                // Collector details
                'Collector District'  => $user->collector ? $user->collector->district : 'N/A', // Adjust field name if needed
                'Collector ID'        => $user->collector ? $user->collector->id : 'N/A',
                // CommonDataCollect example: adjust as needed
                'Common Data Count'   => $user->commonDataCollect->count(),
                'First Common Data'   => $user->commonDataCollect->first() 
                                         ? $user->commonDataCollect->first()->some_field 
                                         : 'N/A', // Replace `some_field` with the actual field name from CommonDataCollect
            ]
        ]);
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
            'Common Data Count', 
            'First Common Data', // Adjust based on fields included in the collection
        ];
    }
}
