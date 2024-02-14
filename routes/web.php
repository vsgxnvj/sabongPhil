    <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\siteController;
    use App\Http\Controllers\cashoutController;
    use App\Http\Middleware\CheckUserRole;
    use App\Http\Controllers\WelcomeController;
    use App\Http\Controllers\payoutController;
    use App\Http\Controllers\listgameController;
    use App\Http\Controllers\cashinController;
    use App\Http\Controllers\transactionController;
    use App\Http\Controllers\mopController;
    use App\Http\Controllers\notifController;
    use App\Http\Controllers\GoogleAuthController;

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

    Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome']);

    Auth::routes();

    Route::get('/home', [
        App\Http\Controllers\HomeController::class,
        'index',
    ])->name('home');

    Auth::routes();

    Route::get('/home', [
        App\Http\Controllers\HomeController::class,
        'index',
    ])->name('home');

    Route::GET('/auth/google', [GoogleAuthController::class, 'redirect'])->name(
        'google-auth'
    );
    Route::GET('/auth/google/call-back', [
        GoogleAuthController::class,
        'callbackGoogle',
    ]);

    // Routes that require role-based access restriction

    Route::group(['middleware' => CheckUserRole::class . ':1'], function () {
        /*
        |--------------------------------------------------------------------------
        | CASHOUT POST
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider and all of them will
        | be assigned to the "web" middleware group. Make something great!
        |
        */
        Route::GET('/cashout-create', [cashoutController::class, 'create']);
        Route::POST('/cashout-create', [cashoutController::class, 'store']);
        Route::GET('/cashout-index', [cashoutController::class, 'index']);
        Route::delete('cashout-delete/{id}', [
            cashoutController::class,
            'destroy',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SITES
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider and all of them will
        | be assigned to the "web" middleware group. Make something great!
        |
        */

        Route::GET('/create-sites', [siteController::class, 'create']);
        Route::POST('/create-sites', [siteController::class, 'store']);
        Route::GET('/list-sites', [siteController::class, 'index']);
        Route::GET('/edit-site/{site}', [siteController::class, 'edit']);
        Route::POST('/edit-site-update/{site}', [
            siteController::class,
            'update',
        ]);
        Route::POST('/destroy/{site}', [siteController::class, 'destroy']);

        Route::GET('/co-list', [payoutController::class, 'index']);
        Route::POST('/co-reject', [payoutController::class, 'cashoutreject']);

        Route::GET('/ci-list', [payoutController::class, 'cashins']);

        Route::POST('/recieved', [payoutController::class, 'recieved']);
        Route::POST('/rejected', [payoutController::class, 'rejected']);
        Route::GET('/mop', [mopController::class, 'index']);
        Route::POST('/mop/store', [mopController::class, 'store']);
        Route::POST('/mop/enable/{id}', [mopController::class, 'update']);
        Route::POST('/mop/delete', [mopController::class, 'destroy']);

        // NOTIFICATION
        Route::GET('/cashin-notification', [notifController::class, 'index']);
        Route::GET('/cashout-notification', [
            notifController::class,
            'cashoutnotif',
        ]);

        //
        Route::GET('/activate', [siteController::class, 'activate']);
        Route::POST('/activate/{id}', [
            siteController::class,
            'updateactivate',
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | CASHOUT REQUEST
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */
    Route::GET('/co-request/{username}', [payoutController::class, 'create']);
    Route::POST('/co-request', [payoutController::class, 'store']);
    Route::POST('/co-process', [payoutController::class, 'update']);

    /*
    |--------------------------------------------------------------------------
    | CASHIN REQUEST
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */
    Route::GET('/ci-request/{id}', [cashinController::class, 'create']);
    Route::POST('/cashin-store', [cashinController::class, 'store']);

    /*
    |--------------------------------------------------------------------------
    | LIST OF GAMES
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::GET('/list-games', [listgameController::class, 'index']);
    Route::GET('/list-games-register/{id}', [
        listgameController::class,
        'create',
    ]);
    Route::POST('/list-games-store', [listgameController::class, 'store']);
    Route::POST('/deactivate/{id}', [listgameController::class, 'update']);
    Route::POST('/enable/{id}', [listgameController::class, 'enableAccount']);

    /*
    |--------------------------------------------------------------------------
    | TRANSACTIONS
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::GET('/list-cashins', [transactionController::class, 'cashins']);
    Route::GET('/list-cashout', [transactionController::class, 'cashouts']);

    /*
    |--------------------------------------------------------------------------
    | DEACTIVATED ACCOUNTS
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::GET('/deactivated', [transactionController::class, 'deactivated']);
    Route::POST('/deactivated/{id}', [
        transactionController::class,
        'deactivatedUpdate',
    ]);

