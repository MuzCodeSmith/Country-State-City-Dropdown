<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Country,City,State};

class UserController extends Controller
{
    function getUsers(){
        $users = User::all();
        return $users;
        return view('users');
    }

    function addUsers(){
        $countries = Country::all();
        return view('add-user',compact('countries'));
    }

    function createUser(Request $request){
        $userData = $request->input();
        $user = User::create([
            'name'=>$userData['name'],
            'email'=>$userData['email'],
            'country_id'=>1,
            'state_id'=>2,
            'city_id'=>4
        ]);
        if($user){
            echo "record successfully added";
        }
    }

    function fetchStates(Request $request){
        $data['states'] = State::where('country_id',$request->country_id)->get(['name','id']);
        return response()->json($data);
    }
}
