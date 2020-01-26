<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Classes;
use App\Level;
use App\Part;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "fatherName"    => "required",
            "username"  => "required",
            "password"  => "required",
            "Fphoto" => "required|image",
            "FfrontCard" => "required|image",
            "FbackCard" => "required|image",
        ]);
        
        $Fphoto = $request->file('Fphoto');
        $Fphoto_new_name = time().$Fphoto->getClientOriginalName();
        $Fphoto->move('image\Fimage\Fphoto','f'.$Fphoto_new_name);


        $FfrontCard = $request->file('FfrontCard');
        $FfrontCard_new_name = time().$FfrontCard->getClientOriginalName();
        $FfrontCard->move('image\Fimage\FfrontCard','f'.$FfrontCard_new_name);

        $FbackCard = $request->file('FbackCard');
        $FbackCard_new_name = time().$FbackCard->getClientOriginalName();
        $FbackCard->move('image\Fimage\FbackCard','f'.$FbackCard_new_name);


        $user = User::create([
            "name"    => $request->fatherName,
            "email"  => $request->username,
            "password"  => bcrypt($request->password),
            "Fphoto" => '\image\Fimage\Fphoto\f'.$Fphoto_new_name,
            "FfrontCard" => '\image\Fimage\FfrontCard\f'.$FfrontCard_new_name,
            "FbackCard" => '\image\Fimage\FbackCard\f'.$FbackCard_new_name,
            "role"=>0,
            'remember_token' =>Str::random(10),
        ]);

        
        return redirect()->back();
    
    
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
