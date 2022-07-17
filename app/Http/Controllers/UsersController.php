<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Movies;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function login()
    {

          
           $id='nn';
           session()->put('id',$id);
           return redirect()->route('home');
            
    }
    function logout(){
        session()->forget('id');
       
        return redirect()->route('home');
    }

    function home(){

        $data=Movies::all();
        
        return view('home')->with('Movies',$data);
        
    }
    public function search(Request $request){
        
        $this->validate($request,[
            'search'=>'required'

        ]);
        $search_textl=$request->search;

        $data=Movies::orderBy('id','desc')
       ->where('name','like','%'.$search_textl .'%')->get();
       return view('search')->with('Movies',$data);
        
        
    }
    public function DropdownSearch($id){
        
       
        $search_textl=$id;

        $data=Movies::orderBy('id','desc')
       ->where('genre','like','%'.$search_textl .'%')->get();
        return view('search')->with('Movies',$data);
        
        
    }

    public function Watchmovie($id){
        $movie= Movies::where('id','=',$id)->first();
        $data=$movie->name;
        return view('Users.watchmovie',compact('data'));
    }
}
