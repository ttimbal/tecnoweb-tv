<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_per_day extends Model
{
    use HasFactory;
    protected $table='event_per_days';
    protected $fillable=[
      "event_id",
      "day_id"
    ];
    public $timestamps=false;
}
