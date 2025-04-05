<?php
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TamplateController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware('auth');

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/', [TamplateController::class, 'index'])->name('home.index');


Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

    // Profile edit route
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
});




// Registration Routes
Route::get('register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Login Routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

// Dashboard Route (Only for authenticated users)
Route::get('/students', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('students');

// Logout Route
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Student Routes
Route::resource('students', StudentController::class);

// Teacher Routes
Route::resource('teachers', TeacherController::class);

// Course Routes
Route::resource('courses', CourseController::class);

// entrollment Routes


Route::resource('enrollments', EnrollmentController::class);



Route::resource('payments', PaymentController::class);
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

Route::get('/', [TamplateController::class, 'index'])->name('home.index');
require __DIR__.'/auth.php';











