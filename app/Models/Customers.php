<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';
    public $timestamps = false;


    public function customer()
    {
        return $this->belongsTo(Accounts::class,'c_id');
    }

    public function MapCustomersMovies()
    {
        return $this->HasMany(Map_Customers_Movies::class,'c_id');
    }

    public function MyList()
    {
        return $this->HasMany(Mylist::class,'c_id');
    }
}
