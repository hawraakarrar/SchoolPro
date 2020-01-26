<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Absences;
use App\Classes;
use App\Level;
use App\Part;
use App\Abs;
use App\Per;
class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.AbsencePage.absences')->with('students',Student::all());
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
        $s=$request->get('name');
        $a=array();
        $stu =Student::where('name', 'LIKE','%'. $s .'%')->get();
        foreach($stu as $l){
         $a[]=$l->id;
        }
        $ar1=array();
        foreach($a as $s){
            $abs=Absences::where('stu_id', '=',$s)->get();
            $s=sizeof($ar1);
            $si=sizeof($abs);
            $as=$s+$si;
            if($si>0){
                for($j=0;$j<$si;$j++){
                    $ar1[$s]=$abs[$j];
                    $s++;
                  }
                }
            else{
                $ar1[$s]=$abs;
            }
        }
        return view('pages.AbsencePage.viewAbsenc')->with('students',Student::all())
        ->with('abs',$ar1)
        ->with('classes',Classes::all())
        ->with('levels',Level::all())
        ->with('parts',Part::all());




                                 
    }
    public function show(){
        return view('pages.AbsencePage.viewAbsenc')->with('students',Student::all())
        ->with('abs',Absences::all())
        ->with('classes',Classes::all())
        ->with('levels',Level::all())
        ->with('parts',Part::all());

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
            "sudent"    => "required",
            "example"     => "required",
        ]);
        $c=$request->sudent;
        $stu = Student::find($c);
        $abs=Absences::where('stu_id',$stu->id)->first();
        if($request->example =="permit"){
            if(isset($abs->id)){
                $ab = Per::create([
                    "stu_id"    => $c,
                    "permit"  => 1,
                ]);

                $a=$abs->permit;
                $abs->permit = $a+1;
                $abs->save();

                return view('pages.AbsencePage.viewAbsenc')->with('students',Student::all())
                ->with('classes',Classes::all())
                ->with('abs',Absences::all())
                ->with('levels',Level::all())
                ->with('parts',Part::all());
            }else{
                $ab = Per::create([
                    "stu_id"    => $c,
                    "permit"  => 1,
                ]);
                $user = Absences::create([
                    "stu_id"    => $c,
                    "permit"  => 1,
                ]);
                return view('pages.AbsencePage.viewAbsenc')->with('students',Student::all())
                ->with('classes',Classes::all())
                ->with('abs',Absences::all())
                ->with('levels',Level::all())
                ->with('parts',Part::all());
            }
        }
        elseif($request->example =="absences"){
            if(isset($abs->id)){
                $ab = Abs::create([
                    "stu_id"    => $c,
                    "absence"  => 1,
                ]);
                $a=$abs->absence;
                $abs->absence = $a+1;
                $abs->save();
                return view('pages.AbsencePage.viewAbsenc')->with('students',Student::all())
                ->with('classes',Classes::all())
                ->with('abs',Absences::all())
                ->with('levels',Level::all())
                ->with('parts',Part::all());
            }else{
                $ab = Abs::create([
                    "stu_id"    => $c,
                    "absence"  => 1,
                ]);
                $user = Absences::create([
                    "stu_id"    => $c,
                    "absence"  => 1,
                ]);
                return view('pages.AbsencePage.viewAbsenc')->with('students',Student::all())
                ->with('classes',Classes::all())
                ->with('levels',Level::all())
                ->with('abs',Absences::all())
                ->with('parts',Part::all());
            }
        }else{
            return view('pages.AbsencePage.viewAbsenc')->with('students',Student::all())
            ->with('classes',Classes::all())
            ->with('levels',Level::all())
            ->with('abs',Absences::all())
            ->with('parts',Part::all());
        }
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
        $abs=Absences::find($id);
        $abs->delete($id);
        return redirect()->back();
    }
}
