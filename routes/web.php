
<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('login');
});*/
Route::get('/','MainController@index')->name('login');
Route::post('/checklogin','MainController@checklogin')->name('checklogin');
Route::group([ 'middleware'=>'auth'], function () {   



Route::get('/logout','MainController@logout')->name('logout');


//student route
Route::get('/student','StudentController@index')->name('index');


//class rote
Route::get('/class','LevelController@index')->name('class');
Route::post('/add','LevelController@store')->name('add');
Route::get('/delete/{id}','LevelController@destroy')->name('class.delete');
Route::get('/search','LevelController@search')->name('class.search');
Route::post('/show','LevelController@show')->name('class.show');


//add user rote
Route::post('/add/user','UserController@store')->name('add.user');


//add new stu
Route::post('/add/student','StudentController@store')->name('add.student');
Route::post('/show/student','StudentController@show')->name('student.show');
Route::get('/delete/student/{id}','StudentController@destroy')->name('Student.delete');
Route::post('/update/student/{id}','StudentController@update')->name('update.student');
Route::get('/edit/student/{id}','StudentController@edit')->name('edit.student');
Route::get('/search/student','StudentController@search')->name('student.search');



//add new teacher
Route::get('/Teacher','StaffController@index')->name('Teacher');
Route::post('/add/teacher','StaffController@store')->name('add.teacher');
Route::get('/delete/teacher/{id}','StaffController@destroy')->name('teacher.delete');
Route::post('/update/teacher/{id}','StaffController@update')->name('update.teacher');
Route::get('/edit/teacher/{id}','StaffController@edit')->name('edit.teacher');
Route::get('/search/teacher','StaffController@search')->name('teacher.search');


//grade
Route::get('/Grade','GradeController@index')->name('Grade');
Route::post('/add/grade','GradeController@store')->name('add.grade');
Route::get('/delete/grade/{id}','GradeController@destroy')->name('grade.delete');
Route::post('/update/grade/{id}','GradeController@update')->name('update.grade');
Route::get('/edit/grade/{id}','GradeController@edit')->name('edit.grade');
Route::post('/search/grade','GradeController@search')->name('grade.search');
Route::get('/grade/save/{id}','GradeController@downloadImage')->name('grade.download');


Route::get('/Table','tableController@index')->name('table');
Route::post('/add/table','tableController@store')->name('add.table');
Route::get('/table/save/{id}','tableController@downloadImage')->name('table.download');
Route::get('/delete/table/{id}','tableController@delete')->name('table.destory');
Route::get('/search/table','tableController@search')->name('table.search');


Route::get('/add/Absence','AbsenceController@index')->name('add.Absence');
Route::post('/save/Absence','AbsenceController@store')->name('save.Absence');
Route::get('/delete/Absence/{id}','AbsenceController@destroy')->name('Absence.destory');
Route::get('/view/Absence','AbsenceController@show')->name('view.Absence');
Route::post('/search/Absence','AbsenceController@search')->name('Absence.search');

Route::get('/add/book','BookController@index')->name('add.book');
Route::get('/Library','BookController@show')->name('Library');
Route::post('/save/book','BookController@store')->name('save.book');
Route::get('/delete/book/{id}','BookController@destroy')->name('book.destory');
Route::post('/search/book','BookController@search')->name('book.search');



Route::get('/Payment','PaymentController@index')->name('Payment');
Route::post('/add/Payment','PaymentController@store')->name('add.Payment');
Route::get('/Edit/Payment/{id}','PaymentController@edit')->name('edit.Payment');
Route::get('/delete/Payment/{id}','PaymentController@destroy')->name('delete.Payment');
Route::post('/Update/Payment/{id}','PaymentController@update')->name('update.Payment');
Route::get('/search/Payment','PaymentController@search')->name('Payment.search');



Route::get('/News','NewsController@index')->name('news');
Route::get('/Update/News','NewsController@show')->name('Update.news');
Route::post('/add/News','NewsController@store')->name('add.news');
Route::get('/delete/News/{id}','NewsController@destroy')->name('delete.news');
Route::get('/search/News','NewsController@search')->name('News.search');



Route::get('/Activites','ActiviteController@index')->name('activites');
Route::get('/Show/Activites','ActiviteController@show')->name('Show.Activites');
Route::post('/add/Activites','ActiviteController@store')->name('add.Activites');
Route::get('/delete/Activites/{id}','ActiviteController@destroy')->name('delete.Activites');
Route::get('/search/Activites','ActiviteController@search')->name('Activites.search');


Route::get('/Chart','ChartController@index')->name('chart');













});


Route::get('/h', function () {
    //return App\Part::all();
    return App\Part::find(1)->class;
});

