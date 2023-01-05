<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_turn extends Model
{
    use HasFactory;
    protected $table='event_turns';
    protected $fillable=[
      "turn_id",
      "event_id"
    ];
    public $timestamps=false;
}
