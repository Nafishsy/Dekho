<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubAdminController extends Controller
{
    public function ManageMovies()
    {
        return view('SubAdmin.movieManage');
    }

    public function AddMovies()
    {
        return view('SubAdmin.AddMovies');
    }

    public function UploadMovie(Request $req)
    {

        $this->validate($req,
            [
                "name"=>"required|max:20|min:5",
                "description"=>"required|min:10|max:2000",
                "genre"=>"required|in:Action,Thriller,Comedy,Adventure,Documentary",
                "movie"=>"required|mimes:mp4,m4vm,mov,mkv"

            ],
        
            [
                "description.required"=>"Must write something about the movie",
                "genre.required"=>"Must select the movie genre",
                "movie.mimes"=>"Please select the valid file type which are mp4,m4vm,mov,mkv"
                
            ]);


            $name = $req->name.".".$req->file('movie')->getClientOriginalExtension();
            $req->file('movie')->storeAs('movies',$name);

            /*$user = new account();
            $user->name = $req->name;
            $user->email =$req->email;
            $user->password =$req->password;
            $user->save();
            
        return redirect('/');*/

    }

}
