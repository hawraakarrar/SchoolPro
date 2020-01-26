<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validation;
use Auth;


use Illuminate\Support\Facades\Hash;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
     function checklogin(Request $request){
         $this->validate($request,[
             'email' => 'required|email',
             'password'=>'required|alphaNum|min:3'
         ]);
         
         $user_data=array(
            'email'  => $request->get('email'),
            'password' => $request->get('password'),
            
         );
         
        
         if(Auth::attempt($user_data)){
             if(Auth::user()->role ==1){
                return redirect()->route('index');
             } else{return back()->with('error','wrong login');}
                }
                
     }
     function logout(){
         Auth::logout();
         return view('login');
         // return redirect('/');
     }
    public function index()
    {
        return view('login');
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
        //
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
