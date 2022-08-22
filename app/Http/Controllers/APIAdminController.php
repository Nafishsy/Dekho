<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\accountsModel;
use App\Models\moviesModel;
use App\Models\customersMoviesModel;
use Illuminate\Support\Str;

class APIAdminController extends Controller
{
    function adminHome(){

    }

    function adminCheckCustomersMovies(){
        $customersMovies = customersMoviesModel::all();

        $or= array();
       
        foreach($customersMovies as $cm)
        {
            $or[] = array(
                'ID' => $cm->id,
                'CustomerName' => $cm->accountsModel->username,
                'CustomerEmail' => $cm->accountsModel->email,
                'MovieName'    => $cm->moviesModel->name,
                'MovieDescription' => $cm->moviesModel->description,
                'MovieRating' => $cm->moviesModel->rating,
                'MovieUploadTime' => $cm->moviesModel->uploadTime,
                'MovieGenre' => $cm->moviesModel->genre,
            );
        }
        return response()->json($or,200);
    }

    function adminUsersList(){
        $users = accountsModel::where('role','!=','Admin')->get();
        return response()->json($users,200);
    }

    function adminChangeRole($id)
    {
        $user = accountsModel::where('id',$id)->first();
        if($user->role == 'Customer'){
            accountsModel::where('id',$id)->update(["role"=>"SubAdmin"]);
        }
        else{
            accountsModel::where('id',$id)->update(["role"=>"Customer"]);
        }
        return response()->json($user,200);
    }

    function adminUserInfo($id){
        $user = accountsModel::where('id',$id)->first();
        return response()->json($user,200);
    }

    //###################
    function adminUserMovieInfo($id){
        $user = customersMoviesModel::where('id',$id)->first();


        $or[] = array(
            'ID' => $user->id,
            'CustomerName' => $user->accountsModel->username,
            'CustomerEmail' => $user->accountsModel->email,
            'MovieName'    => $user->moviesModel->name,
            'MovieDescription' => $user->moviesModel->description,
            'MovieRating' => $user->moviesModel->rating,
            'MovieUploadTime' => $user->moviesModel->uploadTime,
            'MovieGenre' => $user->moviesModel->genre,
        );

        return response()->json($or,200);
    }

    function adminSearchUsersSubmit(Request $req){
        $users = accountsModel::where('role','!=','Admin')->where('username','LIKE',$req->search.'%')->get();
        
        return response()->json($users,200);
    }

    function adminCustomerMovieSubmit(Request $req){

        $customersMovies = customersMoviesModel::all();
        $or= array();
       
        foreach($customersMovies as $cm)
        {
            if(Str::startsWith($cm->accountsModel->username, $req->search) || Str::startsWith($cm->moviesModel->name, $req->search) || $req->search=='')
            {
                $or[] = array(
                    'ID' => $cm->id,
                    'CustomerName' => $cm->accountsModel->username,
                    'CustomerEmail' => $cm->accountsModel->email,
                    'MovieName'    => $cm->moviesModel->name,
                    'MovieDescription' => $cm->moviesModel->description,
                    'MovieRating' => $cm->moviesModel->rating,
                    'MovieUploadTime' => $cm->moviesModel->uploadTime,
                    'MovieGenre' => $cm->moviesModel->genre,
                );
            }
            
        }

        return response()->json($or,200);

    }
}
