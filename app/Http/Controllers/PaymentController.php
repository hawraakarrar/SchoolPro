<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Classes;
use App\Level;
use App\Part;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.PayPage.payment')->with('students',Student::all())
        ->with('classes',Classes::all())
        ->with('levels',Level::all())
        ->with('parts',Part::all());
    }
    
    public function search(Request $request){
        
       
        $s=$request->get('StudentName2');
        $students = Student::where('name', 'LIKE','%'. $s .'%')->get();
        
        return view('pages.PayPage.payment')->with('students',$students)
                                                ->with('classes',Classes::all())
                                                ->with('levels',Level::all())
                                                ->with('parts',Part::all());
                                 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    **/
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
            "studentName"    => "required",
            "money" => "required"
        ]);


        $c=$request->studentName;
        $stu = Student::find($c);
        $stu->Payment = $request->money;
        $stu->save();
        return redirect()->route('Payment');
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
        $stu = Student::find($id);
        return view('pages.PayPage.UpdatePayment')->with('students',$stu);
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
        $this->validate($request,[
            "money"    => "required",
        ]);
        $stu = Student::find($id);
        $m=$stu->Payment;
        $nm=$request->money;
        $stu->Payment = $m+$nm;
        $stu->save();
        return redirect()->route('Payment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay =Student::find($id);
        if($pay != null) {
            $pay->Payment = 0;
            $pay->save();
        }
        return redirect()->route('Payment');
    }
}
