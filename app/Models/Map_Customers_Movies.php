<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map_Customers_Movies extends Model
{
    use HasFactory;
    
    protected $table = 'map_user_movie';
    public $timestamps = false;


    public function customer()
    {
        return $this->belongsTo(Accounts::class,'c_id');
    }

    public function movie()
    {
        return $this->belongsTo(Accounts::class,'m_id');
    }
    
}
