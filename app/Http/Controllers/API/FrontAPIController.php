<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Movies;
Use App\Models\Cinemas;
Use App\Models\Session_Times;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FrontAPIController extends Controller
{
    
       protected function register(Request $request)
       {
            $validatedData = $request->validate([
                'name'=>'required|max:55',
                'email'=>'email|required|unique:users',
                'password'=>'required|confirmed'
            ]);
            $validatedData['password'] = bcrypt($request->password);
            $user = User::create($validatedData);
            $accessToken = $user->createToken('authToken')->accessToken;
            return response(['user'=> $user, 'access_token'=> $accessToken]);
       }

       protected function movies()
       {
            $data = Movies::latest()->simplePaginate(5);
            $status=400;
            if($data){
                $status=200;
            }
            return response()->json([
                'status' => $status,
                'data' => $data
            ]);
       }

       protected function cinemas()
       {
            $data = Cinemas::latest()->simplePaginate(5);
            $status=400;
            if($data){
                $status=200;
            }
            return response()->json([
                'status' => $status,
                'data' => $data
            ]);
       }

       protected function movie_details($title="")
       {
           $data =  Movies::where('title', '=', $title)->first();
           $status=400;
           if($data){
               $status=200;
           }
           return response()->json([
               'status' => $status,
               'data' => $data
           ]);
       }

       protected function cinema_details($name="")
       {
            $data = Cinemas::where('name', '=', $name)->first();
            $status=400;
            if($data){
                $status=200;
            }
            return response()->json([
                'status' => $status,
                'data' => $data
            ]);
       }
}
