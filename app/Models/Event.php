<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";
    protected $fillable = [
        "name",
        "start_date",
        "end_date",
        "start_time",
        "end_time",
        "type",
        "presenter_id"
    ];

    public function categories()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Category::class,
            'event_categories',
            'event_id',
            'category_id'
        );
    }

    public function turns()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Turn::class,
            'event_turns',
            'event_id',
            'turn_id');
    }

    public function days()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Day::class,
            'event_per_days',
            'event_id',
            'day_id');
    }

    public function presenter()
    {
        return $this->belongsTo(User::class, 'presenter_id');
        //return $this->hasOne(User::class, 'presenter_id');
    }
}
