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

    public function upload(Request $req)
    {

        $this->validate($req,
            [
                "name"=>"required|min:5",
                "description"=>"required|min:10|max:2000",
                "genre"=>"required|in:Action,Thriller,Comedy,Adventure,Documentary",
                "movie"=>"required|mimes:mp4,m4vm,mov,mkv",
                "banner"=>"required|mimes:img,jpeg,gif,png"

            ],
        
            [
                "description.required"=>"Must write something about the movie",
                "genre.required"=>"Must select the movie genre",
                "movie.mimes"=>"Please select the valid file type which are mp4,m4vm,mov,mkv"
                
            ]);


            $movie = $req->name.".".$req->file('movie')->getClientOriginalExtension();
            $req->file('movie')->storeAs('movies',$movie);

            $banner = $req->name.".".$req->file('banner')->getClientOriginalExtension();
            $req->file('banner')->storeAs('banners',$banner);

            $movies = new Movies;
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            $movies->movie = $movie;
            $movies->banner = $banner;
            $movies->save();

    }
}