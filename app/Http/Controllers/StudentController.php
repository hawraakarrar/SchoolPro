<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\User;
use App\Classes;
use App\Level;
use App\Student;
use App\Part;
use App\Absences;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pages.StudentPage.Student')->with('users',User::all())
                                    ->with('students',Student::all())
                                    ->with('classes',Classes::all())
                                    ->with('levels',Level::all())
                                    ->with('parts',Part::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //
    }
    public function search(Request $request){
        
       
        $s=$request->get('StuName');
        $students = Student::where('name', 'LIKE','%'. $s .'%')->get();
        
        return view('pages.StudentPage.Student')->with('users',User::all())
                                 ->with('students',$students)
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
            "Sname"    => "required",
            "gurdian"  => "required",
            "BirthDate"  => "required",
            "BackSchool" => "required",
            "class" => "required",
            "address" => "required",
            "image" => "required|image",
            "FrontNationalityPhoto" => "required|image",
            "BackNationalityPhoto" => "required|image",
            "FrontHousingCard" => "required|image",
            "BackHousingCard" => "required|image",
            "NationalityCertificate" => "required|image",
            "RationCard" => "required|image",
        ]);


        $user = Student::where("name", $request->Sname)->first();
        
        if($user == null) {
            $Sphoto = $request->file('image');
            $Sphoto_new_name = time().$Sphoto->getClientOriginalName();
            $Sphoto->move('image\Simage\Sphoto','s'.$Sphoto_new_name);

            $FrontNationalityPhoto = $request->file('FrontNationalityPhoto');
            $FrontNationalityPhoto_new_name = time().$FrontNationalityPhoto->getClientOriginalName();
            $FrontNationalityPhoto->move('image\Simage\FrontNationalityPhoto','s'.$FrontNationalityPhoto_new_name);

            $BackNationalityPhoto = $request->file('BackNationalityPhoto');
            $BackNationalityPhoto_new_name = time().$BackNationalityPhoto->getClientOriginalName();
            $BackNationalityPhoto->move('image\Simage\BackNationalityPhoto','s'.$BackNationalityPhoto_new_name);

            $FrontHousingCard = $request->file('FrontHousingCard');
            $FrontHousingCard_new_name = time().$FrontHousingCard->getClientOriginalName();
            $FrontHousingCard->move('image\Simage\FrontHousingCard','s'.$FrontHousingCard_new_name);

            $BackHousingCard = $request->file('BackHousingCard');
            $BackHousingCard_new_name = time().$BackHousingCard->getClientOriginalName();
            $BackHousingCard->move('image\Simage\BackHousingCard','s'.$BackHousingCard_new_name);

            $NationalityCertificate = $request->file('NationalityCertificate');
            $NationalityCertificate_new_name = time().$NationalityCertificate->getClientOriginalName();
            $NationalityCertificate->move('image\Simage\NationalityCertificate','s'.$NationalityCertificate_new_name);
         
            $RationCard = $request->file('RationCard');
            $RationCard_new_name = time().$RationCard->getClientOriginalName();
            $RationCard->move('image\Simage\RationCard','s'.$RationCard_new_name);


            $stu = Student::create([
                "name"    => $request->Sname,
                "father_id"    => $request->gurdian,
                "birthdate"    => $request->BirthDate,
                "backSchool"    => $request->BackSchool,
                "class_id"    => $request->class,
                "address"    => $request->address,
                "image" => '\image\Simage\Sphoto\s'.$Sphoto_new_name,
                "FrontNationalityPhoto" => '\image\Simage\FrontNationalityPhoto\s'.$FrontNationalityPhoto_new_name,
                "BackNationalityPhoto" => '\image\Simage\BackNationalityPhoto\s'.$BackNationalityPhoto_new_name,
                "FrontHousingCard" => '\image\Simage\FrontHousingCard\s'.$FrontHousingCard_new_name,
                "BackHousingCard" => '\image\Simage\BackHousingCard\s'.$BackHousingCard_new_name,
                "NationalityCertificate" => '\image\Simage\NationalityCertificate\s'.$NationalityCertificate_new_name,
                "RationCard" => '\image\Simage\RationCard\s'.$RationCard_new_name,
                "remember_token" =>Str::random(10),
            ]);
        

            return redirect()->back();

        }else{
            return redirect()->back();

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
        
        $stu = Student::find($id);
        return view('pages.StudentPage.UpdateStudent')->with('users',User::all())
                                 ->with('students',$stu)
                                 ->with('classes',Classes::all())
                                 ->with('levels',Level::all())
                                 ->with('parts',Part::all());
        //  /UpdateStudent
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

        //dd($request);
        $stu = Student::find($id);
        $this->validate($request,[
            "Sname"    => "required",
            "father"  => "required",
            "BirthDate"  => "required",
            "BackSchool" => "required",
            "class" => "required",
            "address" => "required",
        ]);

        if ( $request->hasFile('FrontNationalityPhoto')  ) {
            $FrontNationalityPhoto = $request->file('FrontNationalityPhoto');
            $FrontNationalityPhoto_new_name = time().$FrontNationalityPhoto->getClientOriginalName();
            $FrontNationalityPhoto->move('image\Simage\FrontNationalityPhoto','s'.$FrontNationalityPhoto_new_name);
            $stu->FrontNationalityPhoto = '\image\Simage\FrontNationalityPhoto\s'.$FrontNationalityPhoto_new_name;
    
        }
        
        if ( $request->hasFile('image')  ) {
            $Sphoto = $request->file('image');
            $Sphoto_new_name = time().$Sphoto->getClientOriginalName();
            $Sphoto->move('image\Simage\Sphoto','s'.$Sphoto_new_name);
            $stu->image = '\image\Simage\Sphoto\s'.$Sphoto_new_name;
    
        }


        if ( $request->hasFile('BackNationalityPhoto')  ) {

            $BackNationalityPhoto = $request->file('BackNationalityPhoto');
            $BackNationalityPhoto_new_name = time().$BackNationalityPhoto->getClientOriginalName();
            $BackNationalityPhoto->move('image\Simage\BackNationalityPhoto','s'.$BackNationalityPhoto_new_name);
            $stu->BackNationalityPhoto = '\image\Simage\BackNationalityPhoto\s'.$BackNationalityPhoto_new_name;
    
        }

        if ( $request->hasFile('FrontHousingCard')  ) {
            $FrontHousingCard = $request->file('FrontHousingCard');
            $FrontHousingCard_new_name = time().$FrontHousingCard->getClientOriginalName();
            $FrontHousingCard->move('image\Simage\FrontHousingCard','s'.$FrontHousingCard_new_name);
            $stu->FrontHousingCard = '\image\Simage\FrontHousingCard\s'.$FrontHousingCard_new_name;
    
        }

        if ( $request->hasFile('BackHousingCard')  ) {

            $BackHousingCard = $request->file('BackHousingCard');
            $BackHousingCard_new_name = time().$BackHousingCard->getClientOriginalName();
            $BackHousingCard->move('image\Simage\BackHousingCard','s'.$BackHousingCard_new_name);
            $stu->BackHousingCard = '\image\Simage\BackHousingCard\s'.$BackHousingCard_new_name;
    
        }

        if ( $request->hasFile('NationalityCertificate')  ) {

            $NationalityCertificate = $request->file('NationalityCertificate');
            $NationalityCertificate_new_name = time().$NationalityCertificate->getClientOriginalName();
            $NationalityCertificate->move('image\Simage\NationalityCertificate','s'.$NationalityCertificate_new_name);
            $stu->NationalityCertificate = '\image\Simage\NationalityCertificate\s'.$NationalityCertificate_new_name;
    
        }

        if ( $request->hasFile('RationCard')  ) {

            $RationCard = $request->file('RationCard');
            $RationCard_new_name = time().$RationCard->getClientOriginalName();
            $RationCard->move('image\Simage\RationCard','s'.$RationCard_new_name);
            $stu->RationCard = '\image\Simage\RationCard\s'.$RationCard_new_name;
    
        }
        $stu->name =  $request->Sname;
        $stu->father_id =  $request->father;
        $stu->birthdate = $request->BirthDate;
        $stu->backSchool =  $request->BackSchool;
        $stu->class_id =  $request->class;
        $stu->address = $request->address;
        $stu->save();


        return view('pages.StudentPage.Student')->with('users',User::all())
                                    ->with('students',Student::all())
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
        $stu=Student::find($id);
        $stu->delete($id);
        return redirect()->back();
    }
}
