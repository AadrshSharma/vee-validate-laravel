<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function store(StorePostRequest $request){
        $data = $request->only('first_name','last_name','email','password');

        $created = Registration::create($data);
        return response()->json(['data' =>$created], 200);
    }
}
