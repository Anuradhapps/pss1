<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonDataCollect extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id', 'c_date', 'temperature', 'numbrer_r_day', 'growth_s_c','otherdet'

    ];
}
