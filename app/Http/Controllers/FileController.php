<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FileController extends Controller
{
    function addForm(){
        $users = User::get();
        return view("add-more-files");
    }
    
    function postForm(Request $req){
        $filepaths=[];
        $subjects=$req->input('details.subjects');
        if($req->file('details.questionpapers')){
            foreach($req->file('details.questionpapers') as $file){
                $path = $file->store('questionpapers','public');
                $filepaths[]= $path;
            }
        }
        $details = [
            'subjects'=>$subjects, 
            'questionpapers'=>$filepaths,
        ];

        $user = User:: create([
            'name' => 'muzaffar shaikh',
            'details' =>json_encode($details)
        ]);
        if($user){
            echo "details added";
        }
    }

    function listFiles (){
        $users = User::all();
        // return $users;
        return view('list-files',compact('users'));

    }
    
}
