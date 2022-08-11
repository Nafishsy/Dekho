<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Accounts;


class ApiController extends Controller
{


    public function uploads(Request $req)
    {
        $this->validate($req,
            [
                "name"=>"required|min:5",
                "description"=>"required|min:10|max:2000",
                "genre"=>"required|in:Action,Thriller,Comedy,Adventure,Documentary",
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
            return $req;
    }

    public function movieList()
    {        
        $data=Movies::all();
        return response()->json($data);

    }

    public function movieDetails($id)
    {        
        $data = Movies::where('id',$id)->first();

        return response()->json($data);

    }

    public function UpdateMovie(Request $req)
    {

        $this->validate($req,
            [
                "name"=>"required|min:5",
                "description"=>"required|min:10|max:2000",
                "genre"=>"required|in:Action,Thriller,Comedy,Adventure,Documentary",

            ],
        
            [
                "description.required"=>"Must write something about the movie",
                "genre.required"=>"Must select the movie genre",
                "movie.mimes"=>"Please select the valid file type which are mp4,m4vm,mov,mkv"
                
            ]);

            if($req->movie==NULL)
            {
            $movies = Movies::where('id','=',$req->id)->first();
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            $movies->save();
            }
            else{

            $movie = $req->name.".".$req->file('movie')->getClientOriginalExtension();
            $req->file('movie')->storeAs('movies',$movie);



            $movies = Movies::where('id','=',$req->id)->first();
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            $movies->movie = $movie;
            $movies->save();
            }

            return $req;
            
    }

    public function DeleteMovie($id)
    {
        Movies::where('id','=',$id)->delete();            
    }


    public function BillingDetails(){

        $actives = Accounts::where('status','=','Active')->count();
        $bans = Accounts::where('status','=','Banned')->count();
        $inactives = Accounts::where('status','=','Inactive')->count();
        $bills['actives'] = $actives;        
        $bills['bans'] = $bans;        
        $bills['inactives'] = $inactives;        
        $bills['total'] = $inactives+$actives+$bans;

        
        $Accounts = Accounts::all();

        return response()->json(["bills"=>$bills,"accounts"=>$Accounts],200);
    }

}
