<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    public $table='fees';
    protected $fillable=[
        'Name',
        'Type',
        'Description',
        'Image'
    ];
}

