<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Movies;


class ApiController extends Controller
{
    //
    public function ManageMovies()
    {        
        $data=Movies::all();
        return $data;
    }

}
