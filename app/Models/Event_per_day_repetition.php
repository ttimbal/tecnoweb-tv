<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_per_day_repetition extends Model
{
    use HasFactory;
    protected $table='event_per_day_repetitions';
    protected $fillable=[
        "event_per_day_id",
        "repetition_id"
    ];
    public $timestamps=false;
}
