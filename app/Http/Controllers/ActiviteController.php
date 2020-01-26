<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activite;
class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ActivitePage.activites');
    }
    public function show(){
        return view('pages.ActivitePage.showActivites')->with('activite',Activite::all());
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
            "link"    => "required",
            "address" => "required",
            "subject"=> "required",
            "photo" => "required|image",
        ]);

        $photo = $request->file('photo');
        $photo_new_name = time().$photo->getClientOriginalName();
        $photo->move('image\Activite','a'.$photo_new_name);

        $activite = Activite::create([
            "link"    => $request->link,
            "address"    => $request->address,
            "subject"    => $request->subject,
            "photo" => '\image\Activite\a'.$photo_new_name,
        ]);
        return redirect()->route('Show.Activites');
    }
    public function search(Request $request){
        
       
        $n=$request->get('name');
        $n = Activite::where('address', 'LIKE','%'. $n .'%')->get();
        
        return view('pages.ActivitePage.showActivites')->with('activite',$n);
                                 
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
        $n=Activite::find($id);
        $n->delete($id);
        return redirect()->route('Show.Activites');
    }
}
