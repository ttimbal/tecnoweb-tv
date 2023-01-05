<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'equipment';

    protected $fillable = ['code','name'];
	
}
