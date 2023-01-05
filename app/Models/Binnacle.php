<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    use HasFactory;


    protected $table = 'binnacles';

    protected $fillable = ['action', 'table', 'resource_id', 'date'];
    
    public $timestamps = false;

}
