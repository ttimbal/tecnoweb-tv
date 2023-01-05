<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_category extends Model
{
    use HasFactory;
    protected $table='event_categories';
    protected $fillable=[
      "event_id",
      "category_id"
    ];
    public $timestamps=false;
}
