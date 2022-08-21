<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Accounts;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{


    public function uploads(Request $req)
    {
        $validator = Validator::make($req->all(),
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

        if ($validator->fails())
        {
            return response()->json($validator->errors(),422);
        }
        

            
            
            $movie = $req->name.".mp4";
            $req->file('movie')->storeAs('movies',$movie);

            $banner = $req->name.".jpg";
            $req->file('banner')->storeAs('banners',$banner);

            $movies = new Movies;
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            $movies->movie = $movie;
            $movies->banner = $banner;
            $movies->save();
            return response()->json(["msg"=>"Movie uploaded"],200);
            
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

        $validator = Validator::make($req->all(),
            [
                "name"=>"required|min:5",
                "description"=>"required|min:10|max:2000",
                "genre"=>"required|in:Action,Thriller,Comedy,Adventure,Documentary",
                "movie"=>"mimes:mp4,m4vm,mov,mkv",
                "banner"=>"mimes:img,jpeg,gif,png"

            ],
        
            [
                "description.required"=>"Must write something about the movie",
                "genre.required"=>"Must select the movie genre",
                "movie.mimes"=>"Please select the valid file type which are mp4,m4vm,mov,mkv"
                
            ]);

            if ($validator->fails())
        {
            return response()->json($validator->errors(),422);
        }

            $movies = Movies::where('id','=',$req->id)->first();
            $movies->name = $req->name;
            $movies->description = $req->description;
            $movies->genre = $req->genre;
            if($req->movie!=NULL)
            {
                $movie = $req->name.".mp4";
                $req->file('movie')->storeAs('movies',$movie);
            }
            
            if($req->banner!=NULL)
            {
                $banner = $req->name.".jpg";
                $req->file('banner')->storeAs('banners',$banner);
            }
            $movies->save();
            

            return response()->json(["msg"=>"Movie updated"],200);
            
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
