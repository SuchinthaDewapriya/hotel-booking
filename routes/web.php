<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BotManController;
use App\Models\Room;
use App\Models\Menu;
use App\Models\RoomGallery;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/rooms', [HomeController::class, 'roomsPage'])->name('rooms');
Route::get('/dining', [HomeController::class, 'diningPage'])->name('dining');
Route::get('/gallery', [HomeController::class, 'galleryPage'])->name('gallery');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact-submit', [HomeController::class, 'submit'])->name('submit');
Route::get('/faq', [HomeController::class, 'faqPage'])->name('faq');


Route::get('/', function () {
    $rooms = Room::where('r_status',1)->take(3)->get();
    $menus = Menu::where('status',1)->take(4)->get();
    $images = collect();
    $roomGalleries = RoomGallery::take(3)->get();

    foreach ($roomGalleries as $gallery) {
        foreach ([
            $gallery->gallery_image_1,
            $gallery->gallery_image_2,
            $gallery->gallery_image_3
        ] as $img) {
            if ($img) {
                $images->push('public/images/rooms/'.$img);
            }
        }
    }
    foreach ($menus as $menu) {
        if ($menu->image) {
            $images->push('public/images/menu/'.$menu->image);
        }
    }

    $images = $images->take(6);

    return view('welcome', compact('rooms', 'menus', 'images'));
});
Route::post('checkAvailability', [SearchController::class, 'CheckAvailability']);
Auth::routes();
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('reservation', [SearchController::class, 'reservation']);
// Route::post('addtoCart/{id}', 'SearchController@Addtocart');

//Booking Routes
Route::post('confirm-order', [BookingController::class, 'ConfirmOrder']);
Route::post('storeData', [BookingController::class, 'BookingTable']);
Route::post('discount', [BookingController::class, 'Discount']);

//Admin Route
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'Index'])->name('admin.dashboard');
    Route::get('reservations', [AdminController::class, 'Reservations'])->name('admin.reservations');
    Route::get('rooms', [AdminController::class, 'Rooms'])->name('admin.rooms');
    Route::get('menus', [AdminController::class, 'Menus'])->name('admin.menus');
    Route::get('packages', [AdminController::class, 'Packages'])->name('admin.packages');
    Route::get('customers', [AdminController::class, 'Customers'])->name('admin.customers');
    Route::get('coupons', [AdminController::class, 'Coupons'])->name('admin.coupons');
    Route::get('additional-items', [AdminController::class, 'AdditionalItems'])->name('admin.additional-items');
    Route::get('setting', [AdminController::class, 'Setting'])->name('admin.setting');
    Route::get('users', [AdminController::class, 'Users'])->name('admin.users');
    // Other admin routes...

// Route::get('admin', [AdminController::class, 'Index']);
// Route::get('reservations', [AdminController::class, 'Reservations']);
// Route::get('rooms', [AdminController::class, 'Rooms']);
// Route::get('menus', [AdminController::class, 'Menus']);
// Route::get('packages', [AdminController::class, 'Packages']);
// Route::get('customers', [AdminController::class, 'Customers']);
// Route::get('coupons', [AdminController::class, 'Coupons']);
// Route::get('additional-items', [AdminController::class, 'AdditionalItems']);
Route::get('/faqs', [AdminController::class, 'Faqs']);
Route::post('/faqs/add', [AdminController::class, 'AddFaq']);
Route::get('/faqs/delete/{id}', [AdminController::class, 'DeleteFaq']);

Route::post('add-new-room', [AdminController::class, 'AddNewRoom']);
Route::get('delete-all-rooms', [AdminController::class, 'DeleteAllRooms']);
Route::get('room-delete/{id}', [AdminController::class, 'RoomDelete']);
Route::get('edit-room/{id}', [AdminController::class, 'RoomEdit']);
Route::post('update-room', [AdminController::class, 'RoomUpdate']);

Route::post('add-new-menu', [AdminController::class, 'AddNewMenu']);
Route::get('delete-all-menus', [AdminController::class, 'DeleteAllMenus']);
Route::get('menu-delete/{id}', [AdminController::class, 'MenuDelete']);
Route::get('edit-menu/{id}', [AdminController::class, 'MenuEdit']);
Route::post('update-menu', [AdminController::class, 'MenuUpdate']);
// Route::get('setting', [AdminController::class, 'Setting']);
// Route::get('users', [AdminController::class, 'Users']);

Route::post('add-new-package', [AdminController::class, 'AddNewPackage']);
Route::get('delete-all-packages', [AdminController::class, 'DeleteAllPackages']);
Route::get('package-delete/{id}', [AdminController::class, 'PackageDelete']);
Route::get('edit-package/{id}', [AdminController::class, 'PackageEdit']);
Route::post('update-package', [AdminController::class, 'PackageUpdate']);

Route::get('view-reservation/{id}/{package}', [AdminController::class, 'ViewReservation']);
Route::get('confirm-book/{b_id}', [AdminController::class, 'ConfirmBook']);
Route::get('live/{b_id}', [AdminController::class, 'Live'])->name('booking.live');
Route::post('Orders', [AdminController::class, 'Orders']);
Route::post('print', [AdminController::class, 'Print']);
Route::get('delete-reservation/{id}', [AdminController::class, 'DeleteReservation']);
Route::get('booking-complete/{b_id}', [AdminController::class, 'BookingComplete']);
Route::post('notification-email', [AdminController::class, 'NotificationEmail']);

Route::get('new-admin-reservation', [AdminController::class, 'NewAdminReservation']);
Route::get('reservation-pdf', [AdminController::class, 'ReservationPDF']);
Route::get('customer-pdf', [AdminController::class, 'CustomerPDF']);
Route::get('reservation-calendar', [AdminController::class, 'ReservationCalendar']);
Route::post('admin-checkout', [AdminBookingController::class, 'AdminCheckout']);
Route::post('new-coupon', [AdminController::class, 'NewCoupon']);

Route::get('room-note/{id}', [AdminController::class, 'RoomNote']);
Route::post('save-roomNote', [AdminController::class, 'SaveRoomNote']);
Route::post('checkCustomers', [AdminController::class, 'CheckCustomers']);
Route::get('delete-all-coupons', [AdminController::class, 'DeleteAllCoupons']);
Route::get('edit-coupon/{id}', [AdminController::class, 'EditCoupon']);
Route::post('update-coupon', [AdminController::class, 'UpdateCoupon']);
Route::get('coupon-delete/{id}', [AdminController::class, 'CouponDelete']);

Route::get('customer-delete/{id}', [AdminController::class, 'CoustomerDelete']);
Route::get('delete-bill/{id}', [AdminController::class, 'DeleteBill']);

Route::post('new-item', [AdminController::class, 'NewItem']);
Route::get('delete-all-items', [AdminController::class, 'DeleteAllItems']);
Route::get('edit-item/{id}', [AdminController::class, 'EditItem']);
Route::post('update-item', [AdminController::class, 'UpdateItem']);
Route::get('item-delete/{id}', [AdminController::class, 'ItemDelete']);
Route::get('select-item/{id}', [AdminController::class, 'SelectItem']);

Route::get('new-user', function () {
    return view('admin.Newuser');
});

Route::post('add-new-user', [AdminController::class, 'AddNewUser']);
Route::get('user-delete/{id}', [AdminController::class, 'UserDelete']);
Route::post('update-user/{id}', [AdminController::class, 'UpdateUser']);
}); 

//Route::get('/pay/{b_id}', [AdminController::class, 'Pay'])->name('payment.pay');
Route::get('/payment/pay', function () {
    return view('payment.pay');
});
//Route::get('botman', [BotManController::class, 'handle']);

Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);

//Route::post('botman', [BotManController::class, 'handle']);