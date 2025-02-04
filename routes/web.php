 <?php

    // use App\Http\Controllers\Admin;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\Auth\AuthenticatedSessionController;
    use App\Http\Controllers\DepartmentController;
    use App\Http\Controllers\EmpController;
    use App\Http\Controllers\ForgetPasswordController;
    use App\Http\Controllers\MailController;
    use App\Http\Controllers\profile_details;
    use App\Http\Controllers\Profile_Details_Controller;
    use App\Http\Controllers\SearchController;
    use App\Http\Controllers\Task_DataController;
    use App\Http\Controllers\TaskController;
    use App\Http\Controllers\UserDetailsController;
    use App\Models\UserDetails;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Models\User;
    use Symfony\Component\Console\Input\Input;
    use App\Mail\SendMailTest as MailSendMailTest;
    use Illuminate\Support\Facades\Auth;

    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'login']);
    Route::post('logout2', [AuthenticatedSessionController::class, 'logout'])->name('u_logout');

    Route::get('forget_password', [ForgetPasswordController::class, 'index'])->name('forgetpassword');
    Route::post('forget_password', [ForgetPasswordController::class, 'forgetpassword'])->name('forgetpassword_post');
    Route::get('/reset_password/{token}', [ForgetPasswordController::class, 'resetpassword'])->name('reset_password');
    Route::put('/reset_password', [ForgetPasswordController::class, 'update'])->name('reset_password.post');

    Route::middleware('auth')->group(function () {
        Route::get('user', function () {
            return view('user.index');
        })->name('user_home');
        Route::resource('search', SearchController::class);

        Route::get('welcome', function () {
            $data = User::where('id', auth()->id())->get();
            $title = "HR";
            $hr_data = UserDetails::where('job_title', $title)->get();
            return view('user.welcome', ['employe_data' => $data, 'hrdata' => $hr_data]);
        })->name('user_welcome');

        Route::get('myprofile', function () {
            $data = User::where('id', auth()->id())->get();
            return view('user.profile.about', ['employe_data' => $data]);
        })->name('profile');

        Route::resource('task', TaskController::class);
        Route::patch('file_upload', [TaskController::class, 'update'])->name('task_update');

        Route::resource('task_data', Task_DataController::class);
        Route::patch('upload_file', [Task_DataController::class, 'file_upload'])->name('upload_file');

        Route::resource('/profile_details', Profile_Details_Controller::class);
        Route::put('profile_update', [Profile_Details_Controller::class, 'update'])->name('profile_update');
        Route::patch('photo_update', [Profile_Details_Controller::class, 'profile_photo_update'])->name('photo_update');

        Route::get('/employee_summary/{id}', [Profile_Details_Controller::class, 'employee_summary'])->name('employee_summary');
        // Route::get('/search', [SearchController::class,'search'])->name('search');

    });



    Route::get('admin', [AdminController::class, 'index'])->name('admin_login');
    Route::post('admin', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout'])->name('admin_logout');



    Route::middleware('admin')->group(function () {
        Route::get('admin_home', function () {
            // $dept = Departments::get();

            return view('management.welcome');
        })->name('home');


        Route::resource('/employee', EmpController::class);
        Route::put('employee_update', [EmpController::class, 'update'])->name('employee_update');
        Route::get('employee_delete/{id}', [EmpController::class, 'destroy']);



        Route::resource('/department', DepartmentController::class);
        Route::put('department_update', [DepartmentController::class, 'update'])->name('dept_update');
        Route::get('department_delete/{id}', [DepartmentController::class, 'destroy']);


        Route::resource('/details', UserDetailsController::class);
        Route::put('details_update', [UserDetailsController::class, 'update'])->name('details_update');
        Route::get('details_delete/{id}', [UserDetailsController::class, 'destroy']);
    });


    Route::fallback(function () {
        return view('fallback');
    });
