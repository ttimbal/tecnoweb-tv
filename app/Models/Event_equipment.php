<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_equipment extends Model
{
    use HasFactory;
    protected $table='event_equipments';
    protected $fillable=[
      "event_id",
      "equipment_id"
    ];
    public $timestamps=false;
}
