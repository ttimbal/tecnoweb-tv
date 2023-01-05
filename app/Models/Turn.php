<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
	use HasFactory;

    public $timestamps = false;

    protected $table = 'turns';

    protected $fillable = ['name','start_time','end_time'];

}
