<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.LibraryPage.library')->with('staff',Staff::all());
    }

    public function show(){

        return view('pages.LibraryPage.libraryBook')->with('staff',Staff::all())
        ->with('book',Book::all());
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
        $b =Book::where('name', 'LIKE','%'. $s .'%')->get();
        
        foreach($b as $l){
         $a[]=$l;
        }
        return view('pages.LibraryPage.libraryBook')->with('staff',Staff::all())
        ->with('book',$a);
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
            "BookName"  => "required",
            "sub"    => "required",
            "TeacherName"  => "required",
            "photo" => "required|image"
        ]);
        $photo = $request->file('photo');
        $photo_new_name = time().$photo->getClientOriginalName();
        $photo->move('image\StaffImage\book','b'.$photo_new_name);
        $stu = Book::create([
            "link"    => $request->link,
            "name"    => $request->BookName,
            "subject"    => $request->sub,
            "Teacher_id"    => $request->TeacherName,
            "image" => '\image\StaffImage\book\b'.$photo_new_name,
            
        ]);
        return view('pages.LibraryPage.libraryBook')->with('staff',Staff::all())->with('book',Book::all());
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
        $b=Book::find($id);
        $b->delete($id);
        return redirect()->back();
    }
}
