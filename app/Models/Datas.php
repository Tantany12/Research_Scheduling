<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Datas extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'exampleInputEmail',
        'course',
        'researcherName',
        'contactNumber',
        'researchTitle',
        'DateofDefense',
        'TimeOfDefense',
        'ResearchPanel',
        'original_name',
        'file_path', 
    ];

   
    protected $fillables = [
        // Your other attributes
        'TimeOfDefense',
    ];

    public function getTimeOfDefenseAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }


}
