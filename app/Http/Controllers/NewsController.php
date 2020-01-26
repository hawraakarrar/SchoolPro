<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.News.UpdateNews');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(){
        return view('pages.News.News')->with('news',News::all());
    }
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
            "content" => "required",
            "photo"=> "required|image",
            "video" => "required|image",//'mimes:webm,wmv,flv,ogv'
            "files" => "required|mimes:pdf",
        ]);
        $photo = $request->file('photo');
        $photo_new_name = time().$photo->getClientOriginalName();
        $photo->move('image\news\image','n'.$photo_new_name);

        $video = $request->file('video');
        $video_new_name = time().$video->getClientOriginalName();
        $video->move('image\news\video','n'.$video_new_name);
         
        $file = $request->file('files');
        $file_new_name = time().$file->getClientOriginalName();
        $file->move('image\news\file','n'.$file_new_name);
        $news = News::create([
            "subject"    => $request->subject,
            "content"    => $request->content,
            "image" => '\image\news\image\n'.$photo_new_name,
            "video" => '\image\news\video\n'.$video_new_name,
            "file" => '\image\news\file\n'.$file_new_name,
        ]);
        return redirect()->route('news');

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
    public function search(Request $request){
        
       
        $n=$request->get('name');
        $n = News::where('subject', 'LIKE','%'. $n .'%')->get();
        
        return view('pages.News.News')->with('news',$n);
                                 
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $n=News::find($id);
        $n->delete($id);
        return redirect()->route('news');
    }
}
