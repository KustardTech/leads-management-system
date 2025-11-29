<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('User.login');
});


Route::get('/register',[UserController::class,'register'])->name('user.register');
Route::post('/store-data',[UserController::class,'storedata'])->name('user.datastore');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/check-login',[UserController::class,'loginValidate'])->name('check.login');


                                                                                                                                                                                                                                            
Route::middleware(['auth'])->group( function()
{
 Route::get('/dashboard',[UserController::class,'dashboard'])->name('all.dashboard');

Route::get('/category',[CategoryController::class,'categoryPage'])->name('category');
Route::get('/category-add',[CategoryController::class,'categoryAdd'])->name('category.add');
Route::post('/category-add-validate',[CategoryController::class,'validateCategoryAddPage'])->name('category.add.validate');
Route::get('/category-edit/{id}',[CategoryController::class,'categoryEdit'])->name('category.edit');
Route::put('/category-update/{id}',[CategoryController::class,'categoryUpdateValidate'])->name('category.update');
Route::delete('/category-delete/{id}',[CategoryController::class,'categoryDelete'])->name('category.delete');

Route::get('/leadspage',[LeadsController::class,'leadsPage'])->name('leads.page');
Route::get('/leads-add',[LeadsController::class,'leadsAdd'])->name('leads.add');
Route::post('/leads-add-validate',[LeadsController::class,'validateLeadRegister'])->name('lead.validate');
Route::get('/leads-edit/{id}',[LeadsController::class,'leadsEdit'])->name('leads.edit');
Route::put('/leads-update/{id}',[LeadsController::class,'leadsUpdate'])->name('leads.update');
Route::delete('/leads-delete/{id}',[LeadsController::class,'leadsDelete'])->name('leads.delete');


Route::post('/logout',[UserController::class,'logout'])->name('logout');
}
    
);





