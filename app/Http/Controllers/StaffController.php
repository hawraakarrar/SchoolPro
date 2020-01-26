<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.TeacherPage.teachers')->with('staffs',Staff::all());
    }

    public function edit($id)
    {
        
        $staff = Staff::find($id);

        return view('pages.TeacherPage.updateTeacher')->with('staff',$staff);
        //  /UpdateStudent
    }


    public function search(Request $request){
        
       
        $s=$request->get('teacher');
        $staffs = Staff::where('name', 'LIKE','%'. $s .'%')->get();
        return view('pages.TeacherPage.teachers')->with('staffs',$staffs);
                                 
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
            "subject"    => "required",
            "TeacherName"  => "required",
            "Teacherphoto" => "required|image"
        ]);

        $StaffImage = $request->file('Teacherphoto');
        $StaffImage_new_name = time().$StaffImage->getClientOriginalName();
        $StaffImage->move('image\StaffImage\image','t'.$StaffImage_new_name);

        $staff =Staff::create([
            "lacture"    => $request->subject,
            "name"  => $request->TeacherName,
            "image"  => '\image\StaffImage\image\t'.$StaffImage_new_name,
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
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $s =Staff::find($id);
        $this->validate($request,[
            "subject2"    => "required",
            "UdateName"  => "required",
        ]);
        if ( $request->hasFile('Teacherphoto')  ) {
            $Teacherphoto = $request->file('Teacherphoto');
            $Teacherphoto_new_name = time().$Teacherphoto->getClientOriginalName();
            $Teacherphoto->move('image\StaffImage\image','t'.$Teacherphoto_new_name);
            $s->Teacherphoto = '\image\StaffImage\image\t'.$Teacherphoto_new_name;
    
        }
        $s->name =  $request->UdateName;
        $s->lacture = $request->subject2;
        $s->save();

        return view('pages.TeacherPage.teachers')->with('staffs',Staff::all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff=Staff::find($id);
        $staff->delete($id);
        return redirect()->back();
    }


    
}
