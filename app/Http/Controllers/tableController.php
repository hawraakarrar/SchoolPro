<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Part;
use App\Level;
class tableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.tablePage.table')
        ->with('classes',Classes::all())
        ->with('levels',Level::all())
        ->with('parts',Part::all());
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


    public function search(Request $request){
        
       
        $s=$request->get('class');
        
        $a=array();
        $levels = Level::where('name', 'LIKE','%'. $s .'%')->get();
        foreach($levels as $l){
         $a[]=$l->id;
        }
        $ar1=array();
        foreach($a as $s){
            
            $class1=Classes::where('class_id', '=',$s)->get();
            $s=sizeof($ar1);
            $si=sizeof($class1);
            $as=$s+$si;
            
            if($si>0){
                
                for($j=0;$j<$si;$j++){
                    $ar1[$s]=$class1[$j];
                    $s++;
                  }
                }
            else{
                $ar1[$s]=$class1;
            }
        }
        return view('pages.tablePage.table')->with('classes',$ar1)
                                 ->with('parts',Part::get())
                                 ->with('levels', Level::get());




                                 
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
            "class"    => "required",
            "photo" => "required|image",
        ]);
        $c=$request->class;
        $class = Classes::find($c);
        $photo = $request->file('photo');
        $photo_new_name = time().$photo->getClientOriginalName();
        $photo->move('image\Scimage','s'.$photo_new_name);
        $class->image = '\image\Scimage\s'.$photo_new_name;
        $class->save();

        return view('pages.tablePage.table')
        ->with('classes',Classes::all())
        ->with('levels',Level::all())
        ->with('parts',Part::all());
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
    public function downloadImage($imageId){
        $g = Classes::where('id', $imageId)->firstOrFail();
        $path = public_path(). $g->image;
        return response()->download($path, $g
                 ->original_filename, ['Content-Type' => $g->mime]);
     }


    public function delete($id){

        $class=Classes::find($id);
        if($class != null) {
            $class->image = null;
            $class->save();
        }
        return view('pages.tablePage.table')
        ->with('classes',Classes::all())
        ->with('levels',Level::all())
        ->with('parts',Part::all());
    }
}
