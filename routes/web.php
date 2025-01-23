<?php
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthloginController;
use App\Http\Controllers\investigationsearchcontroller;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Usertestscontroller;
use App\Models\Investigation;
use App\Models\UserInvestigation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::group(['middleware' => ['auth']], function ()
{ Route::post('/add_test/{id}',[Usertestscontroller::class,'addMytest']);
    Route::get('/makeappointment', [AppointmentController::class,'create'])->name('appointment.create');
    Route::post('/store/appointment', [AppointmentController::class, 'store']);
    Route::post('/investigation/create', [testcontroller::class, 'create']);
    Route::post('/investigations/store',[testcontroller::class,'store']);
    Route::get('/investigations/{id}', [testcontroller::class, 'show'])->name('investigations.show');
    Route::get('/investigation/{id}/edit', [testcontroller::class, 'edit'])->name('investigations.edit');
    Route::put('/investigations/{id}/update', [testcontroller::class, 'update'])->name('investigations.update');
    Route::delete('/investigation/{id}/delete', [testcontroller::class, 'delete'])->name('investigation.delete');
    Route::get('/upload-pdf', [PdfController::class, 'uploadForm']);
    Route::post('/upload-pdf', [PdfController::class, 'upload']);
    Route::get('/investigation/search',[ testcontroller::class,'searchfor']);
    Route::get('/investigations',[testcontroller::class,'index'])->name('investigations.index');
    Route::get('/investigation/{id}', function ($id) {$test = Investigation::find($id);
    return view('admindashboard.investigation',['test'=>$test]);}); 
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/{id}',  [AppointmentController::class, 'viewappo'])->name('appointment.view');
    Route::get('/add/admin',[UserController::class,'create'])->name('admin.create');
    Route::post('/store/admin',[UserController::class,'store'])->name('admin.store');
    Route::get('/manage/admins',[UserController::class,'show'])->name('admin.show');
    Route::delete('/delete/{id}/admin',[UserController::class,'delete'])->name('admin.delete');
    Route::post('/update/{id}/admin', [UserController::class, 'update'])->name('admin.update'); 
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('admin.edit');
    Route::get('/welcome', function () {return view('admindashboard.welcomepage');});
    Route::get('/welcome/page', function () {return view('superadmin.welcome');});
    Route::delete('/investigationn/{id}/remove', [Usertestscontroller::class, 'destroy'])->name('investigation.destroy');
});


//public routes
Route::get('/pdfs/{id}/view', [PdfController::class, 'viewPdf']);
Route::get('/', function () {return view('home');});
Route::get('/results', function () {return view('results');});
    Route::get('/search-pdf', function () {return view('results'); // Render the search form
})->name('pdf.search-form');
    Route::get('/search-pdf/result', [PdfController::class, 'search'])->name('pdf.search');
    Route::get('/testslist', function () {return view('tests list',['tests'=>Investigation::all(),
          // 'tests' => Investigation::orderBy('created_at', 'asc')->simplepaginate(3)
    ]);
     });
     Route::get('/test/{id}', function ($id) {
     $test = Investigation::find($id);
    return view('test',['test'=>$test]);}); 
    Route::get('/mytests',[Usertestscontroller::class,'show'])->name('mytests.show');
     //Route::group(['middleware' => ['auth']], function ()
     Route::get('/search',[ testcontroller::class,'search']);
    



Route::get('/loginn', function () {
    return view('loginnview');
});


 Route::get('/log', function () {
   return view('log');
});

route::get('/admin/login',[AuthloginController::class,'view']);
route::post('/admin/login',[AuthloginController::class,'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

  
   
     
    

            


      




                //Route::get('/investigations/search', [testcontroller::class, 'investigationsearch']);
               
                
                Auth::routes();
 
//->middleware(['Auth','verified']);

//route::get('/register',[RegisterController::class,'create']);
//route::post('/register',[RegisterController::class,'store']);//post=requst
//route::get('/login',[LoginController::class,'create']);



