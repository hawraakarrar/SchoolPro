<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Level;
use App\Part;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.class')
                                    ->with('parts',Part::all())
                                    ->with('levels',Level::all())
                                    ->with('classes',Classes::all());
    }
    public function show(){

    }
    public function search(Request $request){
        
        $this->validate($request,[
            "class2"    => "required"
        ]);
        $s=$request->get('class2');
        
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
        return view('pages.class')->with('classes',$ar1)
                                 ->with('parts',Part::get())
                                 ->with('levels', Level::get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
            "part_id"    => "required",
            "level_id"  => "required"
        ]);
        $class =Classes::create([
            "part_id"    => $request->part_id,
            "class_id"  => $request->level_id
        ]);
      
    
     return redirect()->back();
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
    public function edit()
    {
       
        
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
        $class=Classes::find($id);
        $class->delete($id);
        return redirect()->back();
    }
}
