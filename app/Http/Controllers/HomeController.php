<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;


use Auth;
use App\Models\Menu;
use App\Models\Faq;


use App\Models\Room;

use App\Models\BookingDetail;

use App\Models\BookingRate;

use App\Models\Booking;

use App\Models\AdditionalPackage;

use App\Models\Bill;

use App\Models\CustomerDetail;

use App\Models\Setting;

use App\Models\Coupon;

use App\Models\AdditionalItems;

use App\Models\RoomGallery;
use App\Models\ContactMessage;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;


use Mail;

use Fpdf;

use Calendar;
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
<<<<<<< HEAD
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
=======
    public function __construct()
    {
        $this->middleware('auth');
    }
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
<<<<<<< HEAD
    public function roomsPage()
    {
        $rooms = Room::with('gallery')->get();
        return view('rooms.index', compact('rooms'));
    }
    public function diningPage()
    {
        $menus = Menu::all()->groupBy('category');
        return view('dining.index', compact('menus'));
    }

    public function galleryPage()
    {
        $images = collect();

        $roomGalleries = RoomGallery::get();

        foreach ($roomGalleries as $gallery) {
            foreach ([
                $gallery->gallery_image_1,
                $gallery->gallery_image_2,
                $gallery->gallery_image_3,
                $gallery->gallery_image_4,
                $gallery->gallery_image_5
            ] as $img) {
                if ($img) {
                    $images->push([
                        'path' => 'public/images/rooms/'.$img,
                        'type' => 'room'
                    ]);
                }
            }
        }
        $menus = Menu::whereNotNull('image')->get();
        foreach ($menus as $menu) {
            $images->push([
                'path' => 'public/images/food/'.$menu->image,
                'type' => 'menu'
            ]);
        }
        return view('gallery', compact('images'));
    }
    public function home()
    {
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
        $menus = Menu::take(3)->get();

            foreach ($menus as $menu) {
                if ($menu->image) {
                    $images->push('public/images/food/'.$menu->image);
                }
            }

            $images = $images->take(6);

            return view('welcome', compact('images'));
    }
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ],
        [
        'email.email' => 'Please enter a valid email (e.g. user@example.com)',
        ]);

          ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        Mail::raw(
            "Name: {$request->name}\nEmail: {$request->email}\nMessage: {$request->message}",
            function ($msg) {
                $msg->to('bhagyaabeysooriya@gmail.com')
                    ->subject('New Contact Message');
            }
        );
        return back()->with('success', 'Message sent successfully!');
    }
    // public function faqPage()
    //     {
    //         $faqs = [
    //             [
    //                 'question' => 'What time is check-in and check-out?',
    //                 'answer' => 'Check-in starts at 2:00 PM and check-out is before 11:00 AM.'
    //             ],
    //             [
    //                 'question' => 'How can I reach the villa?',
    //                 'answer' => 'We are located in Negombo with easy access from the airport via taxi or private transfer.'
    //             ],
    //             [
    //                 'question' => 'What time does the cafe open?',
    //                 'answer' => 'Our cafe operates daily from 7:00 AM to 10:00 PM.'
    //             ],
    //             [
    //                 'question' => 'Do you offer airport pickup?',
    //                 'answer' => 'Yes, we provide airport pickup upon request.'
    //             ]
    //         ];

    //         return view('faq', compact('faqs'));
    //     }

    public function faqPage()
    {
        $faqs = Faq::where('status',1)
                    ->orderBy('order')
                    ->get();

        return view('faq', compact('faqs'));
    }
   
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
}
