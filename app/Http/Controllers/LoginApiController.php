<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Mail\OTPCode;
use App\Models\Tokens;
use App\Models\accountsModel;
use App\Models\moviesModel;
use App\Models\customersMoviesModel;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginApiController extends Controller
{
    function login (Request $req)
    {
        $validator = Validator::make($req->all(),
            [
                "username"=>"required|exists:accounts,Username",
                "password"=>"required"
            ]);

            if ($validator->fails())
            {
                return response()->json($validator->errors(),404);
            }

            $checkUser = accountsModel::where('username','=',$req->username)->where('password','=',$req->password)->first();

            if($checkUser){

                //User paile
                $token=Tokens::where('u_id',$checkUser->id)
                                ->where('role',$checkUser->role)
                                    ->whereNull('expired_at')->first();

                if ($token) {
                    return response()->json(["msg"=>"Login Successful","user"=>$checkUser,"token"=>$token],200);
                }
                //id,username,email,pass,role,pp session e rakhsilam
                            //session lagle alada table use korbo

                //role check kore alada page e pathaidisilam
                $key=Str::random(67);  
                $token = new Tokens();
                $token->token=$key;
                $token->u_id=$checkUser->id;
                $token->role=$checkUser->role;
                $token->created_at=new DateTime();
                $token->save();

                return response()->json(["msg"=>"Login Successful","user"=>$checkUser,"token"=>$token],200);

            }
            else{
                // User na paile
                //session clear kore ager page e pathay disilam

                return response()->json(["msg"=>"Could not find any user"],404);
            }
    }
}
