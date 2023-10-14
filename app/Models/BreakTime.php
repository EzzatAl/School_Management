<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakTime extends Model
{
    use HasFactory;
    public $table='break_times';
    protected $fillable=[
        'day',
        'StartFrom',
        'EndIn'
    ];
}
