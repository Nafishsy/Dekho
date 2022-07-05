<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    
    protected $table = 'movies';
    public $timestamps = false;


    public function customer()
    {
        return $this->belongsTo(Accounts::class,'c_id');
    }
}
