<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Student;
use App\Part;
use App\Classes;
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.GradePage.grades')->with('students',Student::all())
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
        
       
        $s=$request->get('class2');
        

        
        $stu = Student::where('name', 'LIKE','%'. $s .'%')->get();
        return view('pages.GradePage.grades')->with('students',$stu)
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
            "studentName"    => "required",
            "result" => "required|image"
        ]);


        $c=$request->studentName;
        $stu = Student::find($c);

        $result = $request->file('result');
        $result_new_name = time().$result->getClientOriginalName();
        $result->move('image\Simage\Gradeimage','g'.$result_new_name);
        $stu->grade_img = '\image\Simage\Gradeimage\g'.$result_new_name;
        $stu->save();
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
        $grade =Student::find($id);
        

        return view('pages.GradePage.UpdateGrade')->with('students',$grade);
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
        
        $grade =Student::find($id);
        $this->validate($request,[
            "studentName"    => "required",
            "result" => "required|image",
        ]);
        if ( $request->hasFile('result')  ) {
            $result = $request->file('result');
            $result_new_name = time().$result->getClientOriginalName();
            $result->move('image\Simage\Gradeimage','g'.$result_new_name);
            $grade->grade_img = '\image\Simage\Gradeimage\g'.$result_new_name;
    
        }
        $grade->save();

        return view('pages.GradePage.grades')->with('students',Student::all())
                                             ->with('classes',Classes::all())
                                             ->with('levels',Level::all())
                                             ->with('parts',Part::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade =Student::find($id);

        if($grade != null) {
            $grade->grade_img = null;
            $grade->save();
        }
        return redirect()->back();
    }


    public function downloadImage($imageId){
        $g = Student::where('id', $imageId)->firstOrFail();
        $path = public_path(). $g->grade_img;
        return response()->download($path, $g
                 ->original_filename, ['Content-Type' => $g->mime]);



     }

        
        
}
