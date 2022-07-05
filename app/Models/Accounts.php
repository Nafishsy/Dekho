<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    public $timestamps = false;


    public function customers()
    {
        return $this->hasOne(Customers::class,'c_id');
    }


}
