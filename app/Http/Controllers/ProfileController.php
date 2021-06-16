<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit(Request $request){
        return view('perfiles.edit')->with(['user'=>$request->user(),]);
    }
    public function update(ProfileRequest $request){

     //   DB::transaction(function () use($request){

            $user=$request->user();
            $user->fill($request->validated());
            if($user->isDirty('email')){
                $user->email_verified_at=null;
                $user->sendEmailVerificationNotification();

            }
            $user->save();
            return redirect()->route('main.index')->withSuccess('Perfil usuario');


      //  });



    }

}
