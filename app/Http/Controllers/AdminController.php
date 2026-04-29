<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Auth;
use App\Models\Menu;

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
use App\Models\Faq;


use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;


use Mail;

use Fpdf;

use Calendar;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function redirectTo()
{
    return '/admin'; 
}
    
    public function Index()
    {
        $reservations = Booking::get();
        $rooms = Room::get();
        $customers = CustomerDetail::get();
        $menus = Menu::get();
        
        return view('admin.index')->with('reservations', $reservations)->with('rooms', $rooms)
        ->with('customers', $customers)->with('menus', $menus);
    }

        public function Faqs()
        {
            $faqs = Faq::orderBy('order')->get();
            return view('admin.faqs', compact('faqs'));
        }
    public function Reservations()
    {
        $Booking = Booking::join('booking_rates', 'bookings.b_id', '=', 'booking_rates.br_bookingid')
        ->join('rooms', 'bookings.b_rid', '=', 'rooms.r_id')
        ->orderBy('b_id', 'desc')
        ->get();

        // $Booking = Booking::with('bookingrate','room')->orderBy('b_id', 'desc')
        // ->get();
        // dd($Booking);
        return view('admin.reservations')->with('Booking',$Booking);
    }
    public function Rooms()
    {
        $room = Room::get();
        return view('admin.rooms')->with('room', $room);
    }
    //  public function roomsPage()
    // {
    //     $rooms = Room::with('gallery')->get();
    //     return view('rooms.index', compact('rooms'));
    // }
    // public function diningPage()
    // {
    //     $menus = Menu::all()->groupBy('category');
    //     return view('dining.index', compact('menus'));
    // }

    // public function galleryPage()
    // {
    //     $images = collect();

    //     $roomGalleries = RoomGallery::get();

    //     foreach ($roomGalleries as $gallery) {
    //         foreach ([
    //             $gallery->gallery_image_1,
    //             $gallery->gallery_image_2,
    //             $gallery->gallery_image_3,
    //             $gallery->gallery_image_4,
    //             $gallery->gallery_image_5
    //         ] as $img) {
    //             if ($img) {
    //                 $images->push([
    //                     'path' => 'public/images/rooms/'.$img,
    //                     'type' => 'room'
    //                 ]);
    //             }
    //         }
    //     }
    //     $menus = Menu::whereNotNull('image')->get();
    //     foreach ($menus as $menu) {
    //         $images->push([
    //             'path' => 'public/images/food/'.$menu->image,
    //             'type' => 'menu'
    //         ]);
    //     }
    //     return view('gallery', compact('images'));
    // }
    // public function home()
    // {
    //     $images = collect();

    //     $roomGalleries = RoomGallery::take(3)->get();

    //     foreach ($roomGalleries as $gallery) {
    //         foreach ([
    //             $gallery->gallery_image_1,
    //             $gallery->gallery_image_2,
    //             $gallery->gallery_image_3
    //         ] as $img) {
    //             if ($img) {
    //                 $images->push('public/images/rooms/'.$img);
    //             }
    //         }
    //     }
    //     $menus = Menu::take(3)->get();

    //         foreach ($menus as $menu) {
    //             if ($menu->image) {
    //                 $images->push('public/images/food/'.$menu->image);
    //             }
    //         }

    //         $images = $images->take(6);

    //         return view('welcome', compact('images'));
    // }
    // public function submit(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|max:100',
    //         'email' => 'required|email',
    //         'message' => 'required|min:5'
    //     ]);

    //       ContactMessage::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'message' => $request->message
    //     ]);

    //     Mail::raw(
    //         "Name: {$request->name}\nEmail: {$request->email}\nMessage: {$request->message}",
    //         function ($msg) {
    //             $msg->to('bhagyaabeysooriya@gmail.com')
    //                 ->subject('New Contact Message');
    //         }
    //     );
    //     return back()->with('success', 'Message sent successfully!');
    // }
    
    public function Menus()
    {
        $menus = Menu::get();
        return view('admin.menus')->with('menus', $menus);
    }
    // public function Packages()
    // {
    //     $Package = AdditionalPackage::get();
    //     return view('admin.packages')->with('Package',$Package);
    // }
    public function Coupons()
    {
        $Coupon = Coupon::get();
        return view('admin.coupons')->with('coupons', $Coupon);
    }
    public function Setting()
    {
        $allmail = Setting::get();
        return view('admin.setting')->with('allmail',$allmail);
    }
    public function Users()
    {
        $Users = User::get();
        return view('admin.users')->with('Users', $Users);
    }
    public function AddNewRoom(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'roomName' => 'required',
            'description' => 'required',
            'max_occupancy' => 'required|integer|min:1'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        // dd($request->all($request->roomImage1));
        if ($request->roomImage1 != '') {
            $imageName1 = time().request()->roomImage1->getClientOriginalName();  
            request()->roomImage1->move(public_path('images/rooms'), $imageName1);    
        }
        else {
            $imageName1 = '';
        }
        
        if ($request->roomImage2 != '') {
            $imageName2 = time().request()->roomImage2->getClientOriginalName();  
            request()->roomImage2->move(public_path('images/rooms'), $imageName2);    
        }
        else {
            $imageName2 = '';
        }

        if ($request->roomImage3 != '') {
            $imageName3 = time().request()->roomImage3->getClientOriginalName();  
            request()->roomImage3->move(public_path('images/rooms'), $imageName3);    
        }
        else {
            $imageName3 = '';
        }

        if ($request->roomImage4 != '') {
            $imageName4 = time().request()->roomImage4->getClientOriginalName();  
            request()->roomImage4->move(public_path('images/rooms'), $imageName4);    
        }
        else {
            $imageName4 = '';
        }

        if ($request->roomImage5 != '') {
            $imageName5 = time().request()->roomImage5->getClientOriginalName();  
            request()->roomImage5->move(public_path('images/rooms'), $imageName5);    
        }
        else {
            $imageName5 = '';
        }

        $NewRoom = Room::insertGetId([
            'r_name' => $request->roomName,
            'r_price' => $request->roomRate,
            'r_quantity' => $request->roomQuantity,
            'r_bookquantity' => 0,
            'r_additional_bed' => $request->additionalBedRate,
            'r_description' => $request->description,
            'r_image' => $imageName1,
            'max_occupancy' => $request->max_occupancy,
            'r_status' => 1
        ]);

        $NewGallery = RoomGallery::insert([
            'gallery_Room_id' => $NewRoom,
            'gallery_image_1' => $imageName1,
            'gallery_image_2' => $imageName2,
            'gallery_image_3' => $imageName3,
            'gallery_image_4' => $imageName4,
            'gallery_image_5' => $imageName5,
        ]);
        
        $getRoom = Room::get();

        return response()->json(['getRoom'=>$getRoom]);
    }
    public function DeleteAllRooms() 
    {
        $deleteAll = Room::truncate();

        $deleteAllGallery = RoomGallery::truncate();
        
        $getRoom = Room::get();
        return response()->json(['getRoom'=>$getRoom]);
    }
    public function RoomDelete($id)
    {

        Room::where('r_id',$id)->delete();
        RoomGallery::where('gallery_Room_id', $id)->delete();

        $getRoom = Room::get();
        return response()->json(['getRoom'=>$getRoom]);
    }
    function RoomEdit($id) {
        $editRoom = Room::where('r_id', $id)->first();
        $editGallery = RoomGallery::where('gallery_Room_id', $id)->first();

        return response()->json(['editRoom'=>$editRoom, 'editGallery'=>$editGallery]);
    }
    public function RoomUpdate(Request $request)
    {
        if ($request->roomImage1 == '') {
            $imageName1 = $request->alreadyImage1;
        } else {
            $imageName1 = time().request()->roomImage1->getClientOriginalName();  
            request()->roomImage1->move(public_path('images/rooms'), $imageName1);
        }
        
        if ($request->roomImage2 == '') {
            $imageName2 = $request->alreadyImage2;
        } else {
            $imageName2 = time().request()->roomImage2->getClientOriginalName();  
            request()->roomImage2->move(public_path('images/rooms'), $imageName2);
        }
        
        if ($request->roomImage3 == '') {
            $imageName3 = $request->alreadyImage3;
        } else {
            $imageName3 = time().request()->roomImage3->getClientOriginalName();  
            request()->roomImage3->move(public_path('images/rooms'), $imageName3);
        }

        if ($request->roomImage4 == '') {
            $imageName4 = $request->alreadyImage4;
        } else {
            $imageName4 = time().request()->roomImage4->getClientOriginalName();  
            request()->roomImage4->move(public_path('images/rooms'), $imageName4);
        }

        if ($request->roomImage5 == '') {
            $imageName5 = $request->alreadyImage5;
        } else {
            $imageName5 = time().request()->roomImage5->getClientOriginalName();  
            request()->roomImage5->move(public_path('images/rooms'), $imageName5);
        }
        

        $updateRoom = Room::where('r_id', $request->updateRoomId)->update([
            'r_name' => $request->roomName,
            'r_price' => $request->roomRate,
            'r_quantity' => $request->roomQuantity,
            'r_additional_bed' => $request->additionalBedRate,
            'r_image' => $imageName1,
            'r_status' => 1,
            'max_occupancy' => $request->max_occupancy,
            'r_description' => $request->description
        ]);

        $updateRoomGallery = RoomGallery::where('gallery_Room_id', $request->updateRoomId)->update([
            'gallery_image_1' => $imageName1,
            'gallery_image_2' => $imageName2,
            'gallery_image_3' => $imageName3,
            'gallery_image_4' => $imageName4,
            'gallery_image_5' => $imageName5,
        ]);

        $getRoom = Room::get();
        return response()->json(['getRoom'=>$getRoom]);
    }


// Menu functions
    public function AddNewMenu(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|integer|min:1'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        // dd($request->all($request->roomImage1));
        if ($request->hasFile('image')) {
            $imageName = time().request()->file('image')->getClientOriginalName();  
            request()->file('image')->move(public_path('images/food'), $imageName);    
        }
        else {
            $imageName = '';
        }
        


        $NewMenu = Menu::insertGetId([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
            'status' => 1,
            'category' => $request->category,
        ]);
        
        $getMenu = Menu::get();

        return response()->json(['getMenu' => $getMenu]);
    }
    public function DeleteAllMenus() 
    {
        $deleteAll = Menu::truncate();

        $getMenu = Menu::get();
        return response()->json(['getMenu'=>$getMenu]);
    }
    
    public function MenuDelete($id)
    {

        Menu::where('id',$id)->delete();

        $getMenu = Menu::get();
        return response()->json(['getMenu'=>$getMenu]);
    }
    function MenuEdit($id) {
        $editMenu = Menu::where('id', $id)->first();

        return response()->json(['editMenu'=>$editMenu]);
    }
    public function MenuUpdate(Request $request)
    {
           $request->validate([
            'id' => 'required|integer|exists:menus,id',
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|integer|min:1',
        ]);
        if ($request->hasFile('image')) {
                $imageName = time().$request->image->getClientOriginalName();
                $request->image->move(public_path('images/food'), $imageName);
            } else {
                $imageName = $request->alreadyImage;
            }


        $getmenu = Menu::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
            'status' => 1,
            'category' => $request->category,
        ]);

        $getmenu = Menu::get();
        return response()->json(['getmenu' => $getmenu]);
    }

    public function AddNewPackage(Request $request)
    {
        // dd($request->all());
        $NewPackage = AdditionalPackage::insert([
            'p_name' => $request->PackageName,
            'p_price' => $request->PackageRate,
            'p_additional_bed' => $request->additionalBedRate,
            'p_status' => 1
        ]);
        
        $getPackage = AdditionalPackage::get();

        return response()->json(['getPackage'=>$getPackage]);
    }
    public function DeleteAllPackages()
    {
        $deleteAll = AdditionalPackage::truncate();
        
        $getPackage = AdditionalPackage::get();
        return response()->json(['getPackage'=>$getPackage]);
    }
    public function PackageDelete($id)
    {

        AdditionalPackage::where('p_id',$id)->delete();

        $getPackage = AdditionalPackage::get();
        return response()->json(['getPackage'=>$getPackage]);
    }
    
    function PackageEdit(Request $request, $id) {
        $editPackage = AdditionalPackage::where('p_id', $id)->first();

        return $editPackage;
    }
    public function PackageUpdate(Request $request)
    {
        $updatePackage = AdditionalPackage::where('p_id', $request->UpdatePackageId)->update([
            'p_name' => $request->PackageName,
            'p_price' => $request->PackageRate,
            'p_additional_bed' => $request->additionalBedRate,
            'p_status' => 1
        ]);
        $getPackage = AdditionalPackage::get();
        return response()->json(['getPackage'=>$getPackage]);
    }
    //Reservaion page

    public function ViewReservation($id,$package)
    {

        if ($package == 0) {
            $packageCheck = 0;
        } else {
            $packageCheck = AdditionalPackage::where('p_price',$package)->pluck('p_name');
        }
         
       
        
        $BookingDetailsCheck = BookingDetail::get();
        
        if ($BookingDetailsCheck != null) {
            $ViewReservation = Booking::with('bookingdetails','bookingrate','customerdetails','room','bill')
            ->where('b_id',$id)->first();
            

            $getBed = BookingDetail::where('bd_booking_id', $id)->get();

                $BedTotalQty = 0;
            foreach ($getBed as $value) {
                $BedTotalQty = $BedTotalQty + $value->bd_additionalbed_quantity; 
            }
            return response()->json(['ViewReservation'=>$ViewReservation, 'packageCheck'=>$packageCheck, 'BedTotalQty'=>$BedTotalQty]);
        } else {
            $ViewReservation = Booking::with('bookingrate', 'customerdetails','room','bill')
            ->where('b_id',$id)->get();
            $BedTotalQty = 0;
            return response()->json(['ViewReservation'=>$ViewReservation, 'packageCheck'=>$packageCheck, 'BedTotalQty'=>$BedTotalQty]);
        }
    }
    public function ConfirmBook($b_id)
    {
        $customer = CustomerDetail::where('cd_bookingid', $b_id)->get();
        
        foreach ($customer as $value) {
            $mail = $value->cd_email;
            $name = $value->cd_salutation.' '.$value->cd_first_name.' '.$value->cd_last_name;
        }

        $data = [
            'name' => $name,
            'bookingId' => $b_id
        ];
        $emails = [$mail];

        $mail = Mail::send('mails.BookingConfirmMail', $data, function($message) use($emails) {
            $message->to($emails)->subject('Secret Paradise Villa - Your reservation is successfully!');
            $message->from('info@secretparadise.lk', 'Secret Paradise Villa');
        });

        Booking::where('b_id', $b_id)->update([
            'b_status' => 1
        ]);

        return redirect()->back();
    }
    public function live($b_id)
    {
        Booking::where('b_id', $b_id)->update([
            'b_status' => 2
        ]);

         return redirect()->route('admin.reservations')
        ->with('Success', 'Reservation confirmed successfully!');

    }
    public function Orders(Request $req)
    {
        Bill::insert([
            'bill_booking_id' => $req->OrderBookingId,
            'bill_pro_qty' => $req->proQty,
            'bill_pro_name' => $req->proName,
            'bill_pro_price' => $req->proPrice,
            'bill_status' => 1
        ]);

        return response()->json();
    }
    public function Print(Request $req)
    {
        Booking::where('b_id', $req->BillBookingId)->update([
            'b_payment_method' => $req->paymentMethod
        ]);
        // delete old bill (avoid duplicates)
            // Bill::where('bill_booking_id', $req->BillBookingId)->delete();
            // dd(
            //     $req->OrdersProName,
            //     $req->OrdersProQty,
            //     $req->OrdersProPrice
            // );
            //             // insert new bill
            // if ($req->OrdersProName) {
            //     foreach ($req->OrdersProName as $index => $name) {
            //         Bill::create([
            //             'bill_booking_id' => $req->BillBookingId,
            //             'bill_pro_name' => $name,
            //             'bill_pro_qty' => $req->OrdersProQty[$index],
            //             'bill_pro_price' => $req->OrdersProPrice[$index],
            //         ]);
            //     }
            // }

    
    $billDetails = Bill::where('bill_booking_id', $req->BillBookingId)->get();
            
        $paymentMethod = $req->paymentMethod;
        $BillName = $req->BillName;
        $BillBookingId = $req->BillBookingId;
        $BillArrivalDate = $req->BillArrivalDate;
        $BillDepartureDate = $req->BillDepartureDate;
        $BillCustomerEmail = $req->BillCustomerEmail;
        $BillCustomerContact = $req->BillCustomerContact;
        $BillCustomerCountry = $req->BillCustomerCountry;
        $BillCustomerNote = $req->BillCustomerNote;
        $BillRoomName = $req->BillRoomName;
        $BillRoomQty = $req->BillRoomQty;
        $BillRoomRate = $req->BillRoomRate;
        $BillPackageName = $req->BillPackageName;
        $BillPackageRate = $req->BillPackageRate; 
        $BillBedQty = $req->BillBedQty;
        $BillBedRate = $req->BillBedRate;
        $OrdersProName = $req->OrdersProName;
        $OrdersProQty = $req->OrdersProQty;
        $OrdersProPrice = $req->OrdersProPrice;
        $OrdersSubTotal = $req->OrdersSubTotal;
        $OrdersDiscount = $req->OrdersDiscount;
        $OrdersGrandTotal = $req->OrdersGrandTotal;
        $tax = $OrdersSubTotal * 0.10; 
        $Total = $OrdersGrandTotal + $tax;
        

        $merchant_id = env('PAYHERE_MERCHANT_ID');
        $merchant_secret = env('PAYHERE_MERCHANT_SECRET');

        $order_id = $BillBookingId;
        //$amount = number_format($OrdersGrandTotal, 2, '.', '');
        $currency = "LKR";
        $amount = number_format((float)$Total, 2, '.', '');

    
        $hash = strtoupper(md5(
            $merchant_id .
            $order_id .
            $amount .
            $currency .
            strtoupper(md5($merchant_secret))
        ));
            //   dd([
            //     'merchant_id' => env('PAYHERE_MERCHANT_ID'),
            //     'order_id' => $BillBookingId,
            //     'amount' => $amount,
            //     'currency' => 'LKR',
            //     'hash' => $hash,
            // ]);
        //     dd([
        //     'order_id' => $order_id,
        //     'amount' => $amount,
        //     'hash' => $hash
        // ]);

        // $merchant_id = "1235376";
        // $merchant_secret = "MTg2NjA3MDA2MzExNDAwOTkzOTIxMDU2Nzg3N";

        // $order_id = "TEST123";
        // $amount = "100.00";
        // $currency = "LKR";

        // $hash = strtoupper(md5(
        //     $merchant_id .
        //     $order_id .
        //     $amount .
        //     $currency .
        //     strtoupper(md5($merchant_secret))
        // ));

        // echo $hash;

        return view('admin.print')->with('paymentMethod',$paymentMethod)->with('BillName',$BillName)
        ->with('BillBookingId',$BillBookingId)->with('BillArrivalDate',$BillArrivalDate)->with('BillDepartureDate',$BillDepartureDate)
        ->with('BillCustomerEmail',$BillCustomerEmail)->with('BillCustomerContact',$BillCustomerContact)
        ->with('BillCustomerCountry',$BillCustomerCountry)->with('BillCustomerNote',$BillCustomerNote)->with('BillRoomName',$BillRoomName)
        ->with('BillRoomQty',$BillRoomQty)->with('BillRoomRate',$BillRoomRate)->with('BillPackageName',$BillPackageName)
        ->with('BillPackageRate',$BillPackageRate)->with('BillBedQty',$BillBedQty)->with('BillBedRate',$BillBedRate)->with('OrdersProName',$OrdersProName)
        ->with('OrdersProQty',$OrdersProQty)->with('OrdersProPrice',$OrdersProPrice)->with('OrdersGrandTotal',$OrdersGrandTotal)
        ->with('OrdersDiscount',$OrdersDiscount)->with('OrdersSubTotal',$OrdersSubTotal)->with('billDetails',$billDetails)->with('Total', $Total)->with('amount', $amount)->with('hash', $hash);
  
    }
    public function DeleteReservation($id)
    {
       Booking::where('b_id',$id)->delete(); 
       BookingDetail::where('bd_booking_id',$id)->delete();
       BookingRate::where('br_bookingid',$id)->delete();
       Bill::where('bill_booking_id',$id)->delete();

       return response()->json();
    }
    public function BookingComplete($b_id)
    {
        Booking::where('b_id', $b_id)->update([
            'b_status' => 3
        ]);

        return redirect()->back();
    }
    public function NotificationEmail(Request $req)
    {
        // dd($req->email);
        $req->validate([
            'notifEmail' => 'required',
        ]);
        if ($req->custom_id == 2) {
            Setting::insert([
                's_mail' => $req->notifEmail
            ]);
        }else {
            Setting::where('s_id',1)->update([
                's_mail' => $req->notifEmail
            ]);
        }
        

        return redirect()->back()->with('Success', 'Email updated successfully!');
    }
    public function NewAdminReservation()
    {
        return view('admin.newReservation');
    }
    public function Customers()
    {
        $Customer = CustomerDetail::get();
        return view('admin.Customers')->with('Customer', $Customer);
    }
    public function ReservationPDF(Request $req)
    {
        $currentMonth = $req->month;
        $currentMonth = explode('-', $currentMonth);

        $year = $currentMonth[0];
        $month = $currentMonth[1];

        $booking = Booking::join('rooms', 'bookings.b_rid', '=', 'rooms.r_id')
        ->join('booking_rates', 'bookings.b_id', '=', 'booking_rates.br_bookingid')
        ->whereRaw('MONTH(bookings.b_checkindate) = ?',[$month])
        ->whereRaw('YEAR(bookings.b_checkindate) = ?',[$year])
        ->get();

        

        // Add page
            Fpdf::AddPage('L', [350, 210]);

            // Logo (top-left with margin)
            Fpdf::Image(public_path('images/project-logo.png'), 10, 8, 30);

            // Move cursor to the right of logo
            Fpdf::SetXY(50, 12);

            // Title
            Fpdf::SetFont('Arial','B',16);
            Fpdf::Cell(0,10,'Monthly Reservation Report',0,1,'L');

            // Subtitle
            Fpdf::SetFont('Arial','',12);
            Fpdf::SetX(50);
            Fpdf::Cell(0,10,'Secret Paradise Villa',0,1,'L');

            // Line break
            Fpdf::Ln(10);
            

        Fpdf::SetFont('Arial','B',14);
        Fpdf::Cell(10,10,'ID');
        Fpdf::Cell(40,10,"Room Name");
        Fpdf::Cell(40,10,"Arrival");
        Fpdf::Cell(35,10,"Departure");
        Fpdf::Cell(30,10,"Quantity");
        Fpdf::Cell(30,10,"Rate ($)");
        Fpdf::Ln();

        $MonthlyTotal = 0;
        foreach($booking as $bookings)
        {
            $MonthlyTotal = $MonthlyTotal + $bookings->br_totalRate;
            Fpdf::SetFont('Arial','',14);
            Fpdf::Cell(10,10,$bookings->b_id);
            Fpdf::Cell(40,10,$bookings->r_name);
            Fpdf::Cell(40,10,$bookings->b_checkindate);
            Fpdf::Cell(35,10,$bookings->b_checkoutdate);
            Fpdf::Cell(30,10,$bookings->b_rquantity);
            Fpdf::Cell(30,10,number_format($bookings->br_totalRate,2));
            Fpdf::Ln();

        }
        Fpdf::SetFont('Arial','B',14);
        Fpdf::Cell(135,20,'');
        Fpdf::Cell(20,20,'Total :');
        Fpdf::Cell(10,20,number_format($MonthlyTotal,2));
        Fpdf::Output();
        exit;
    }
    public function CustomerPDF(Request $req)
    {
        $currentMonth = $req->month;
        $currentMonth = explode('-', $currentMonth);

        $year = $currentMonth[0];
        $month = $currentMonth[1];

        $Customer = CustomerDetail::join('bookings', 'customer_details.cd_bookingid', '=', 'bookings.b_id')
        ->whereRaw('MONTH(bookings.b_checkindate) = ?',[$month])
        ->whereRaw('YEAR(bookings.b_checkindate) = ?',[$year])
        ->get();
        
        // Add page
            Fpdf::AddPage('L', [300, 210]);

            // Logo (top-left with margin)
            Fpdf::Image(public_path('images/project-logo.png'), 10, 8, 30);

            // Move cursor to the right of logo
            Fpdf::SetXY(50, 12);

            // Title
            Fpdf::SetFont('Arial','B',16);
            Fpdf::Cell(0,10,'Monthly Reservation Report',0,1,'L');

            // Subtitle
            Fpdf::SetFont('Arial','',12);
            Fpdf::SetX(50);
            Fpdf::Cell(0,10,'Secret Paradise Villa',0,1,'L');

            // Line break
            Fpdf::Ln(10);


        Fpdf::SetFont('Arial','B',8);
        Fpdf::Cell(30,10,'Customer ID');
        Fpdf::Cell(30,10,'Booking ID');
        Fpdf::Cell(50,10,"Name");
        Fpdf::Cell(30,10,"Birth Day");
        Fpdf::Cell(30,10,"NIC");
        Fpdf::Cell(50,10,"Email");
        Fpdf::Cell(25,10,"Phone");
        Fpdf::Cell(30,10,"Country");
        Fpdf::Ln();

        $MonthlyTotal = 0;
        foreach($Customer as $Customers)
        {
            $name = $Customers->cd_salutation.' '.$Customers->cd_first_name.' '.$Customers->cd_last_name;
            Fpdf::SetFont('Arial','',8);
            Fpdf::Cell(30,10,$Customers->cd_id);
            Fpdf::Cell(30,10,$Customers->cd_bookingid);
            Fpdf::Cell(50,10,$name);
            Fpdf::Cell(30,10,$Customers->cd_bday);
            Fpdf::Cell(30,10,$Customers->cd_nic);
            Fpdf::Cell(50,10,$Customers->cd_email);
            Fpdf::Cell(25,10,$Customers->cd_phone);
            Fpdf::Cell(30,10,$Customers->cd_country);
            Fpdf::Ln();

        }
        Fpdf::Output();
        exit;
    }
    public function ReservationCalendar()
    {
        $checkBooking = Booking::join('rooms', 'bookings.b_rid', '=', 'rooms.r_id')->get();
        $bookingList = [];
        foreach ($checkBooking as $key => $value) {
            $bookingList[] = Calendar::event(
                $value->r_name.' '.'x'.' '.$value->b_rquantity,
                true,
                new \DateTime($value->b_checkindate),
                new \DateTime($value->b_checkoutdate.' +1 day')
            );
        }
        $calender_details = Calendar::addEvents($bookingList);

        return view('admin.ReservationCalendar')->with('calender_details', $calender_details);
    }
    public function NewCoupon(Request $req)
    {
        Coupon::insert([
            'coupon_type' => $req->type,
            'coupon_name' => $req->name,
            'coupon_description' => $req->description,
            'coupon_room' => $req->room,
            'coupon_package' => $req->package,
            'coupon_bed' => $req->bed,
            'coupon_total' => $req->total
        ]);
        return back()->with('Success','Coupon added!');
    }
    public function SaveRoomNote(Request $req)
    {
        Booking::where('b_id',$req->id)->update([
            'b_room_note' => $req->note,
        ]);
        return redirect()->back();
    }
    public function RoomNote($id)
    {
        $Note = Booking::where('b_id',$id)->pluck('b_room_note');

        return response()->json([
            'Note' => $Note,
        ]);
    }
    public function CheckCustomers(Request $request)
    {
        $Customers =  CustomerDetail::where('cd_nic', $request->nic)->first();

        return $Customers;
    }
    public function DeleteAllCoupons(Request $request)
    {
        $deleteAll = Coupon::truncate();
        
        return response()->json();
    }
    public function EditCoupon($id)
    {
        $EditCoupon = Coupon::where('coupon_id', $id)->first();
        
        return $EditCoupon;
    }
    public function UpdateCoupon(Request $req)
    {
        $update = Coupon::where('coupon_id', $req->UpdateCouponID)->update([
            'coupon_type' => $req->type,
            'coupon_name' => $req->name,
            'coupon_description' => $req->description,
            'coupon_room' => $req->room,
            'coupon_package' => $req->package,
            'coupon_bed' => $req->bed,
            'coupon_total' => $req->total,
        ]);

        return back()->with('Success','Coupon updated!');
    }
    public function CouponDelete($id)
    {
        Coupon::where('coupon_id', $id)->delete();

        return back()->with('Danger','Coupon deleted!');
    }
    public function CoustomerDelete($id)
    {
        CustomerDetail::where('cd_id', $id)->delete();

        return back()->with('Danger','Coustomer deleted!');
    }
    public function DeleteBill($id)
    {
        Bill::where('bill_id', $id)->delete();

        return redirect()->back();
    }
    public function AdditionalItems()
    {
        $Items = AdditionalItems::get();
        return view('admin.AdditionalItems')->with('Items',$Items);
    }
    public function NewItem(Request $req)
    {
        AdditionalItems::insert([
            'items_name' => $req->name,
            'items_price' => $req->price,
            'items_status' => 1
        ]);
        return back()->with('Success','Item Added!');
    }
    public function DeleteAllItems()
    {
        AdditionalItems::truncate();

        return back()->with('Danger','All Items Deleted!');
    }
    public function EditItem($id)
    {
        $editItem = AdditionalItems::where('items_id', $id)->first();

        return $editItem;
    }
    public function UpdateItem(Request $req)
    {
        AdditionalItems::where('items_id', $req->id)->update([
            'items_name' => $req->name,
            'items_price' => $req->price,
            'items_status' => 1
        ]);
        return back()->with('Success','Item Updated!');
    }
    public function ItemDelete($id)
    {
        AdditionalItems::where('items_id', $id)->delete();

        return back()->with('Danger','Item Deleted!');
    }
    public function SelectItem($id)
    {
       
        $results = AdditionalItems::where('items_name', $id)->first();

        return response()->json([
            'results' => $results,
        ]);
    }
    public function AddNewUser(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
        'email.email' => 'Please enter a valid email (e.g. user@example.com)',
         ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);

        return redirect()->back()->with('Success', 'User added successfully!');
    }
    public function UserDelete($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back();
    }
    public function UpdateUser(Request $request, $id)
    {
        if ($request->password == '') {
            $this->validate($request,[
                'name' => ['required', 'string', 'max:255'],
            ]);

            User::where('id', $id)->Update([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
            ]);
        } else {
            $this->validate($request,[
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            User::where('id', $id)->Update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => $request->type,
            ]);
        }
        
        

       

        return redirect()->back()->with('Success', 'User added successfully!');
    }
    public function AddFaq(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order ?? 0,
            'status' => 1
        ]);

        return back()->with('success','FAQ added');
    }

    public function DeleteFaq($id)
    {
        Faq::where('id',$id)->delete();
        return back();
    }

    

    public function Pay($bookingid)
    {
        
        // $booking = Booking::where('b_id', $bookingid)->firstOrFail();
        // $customer = CustomerDetail::where('cd_bookingid', $bookingid)->first();
        // //dd(Bill::all());
        // $billDetails = Bill::where('bill_booking_id', $bookingid)->get();
        // //$total = $billDetails->sum('bill_pro_price'); 
        // $billDetails = Bill::where('bill_booking_id', $bookingid)->get();
        // //dd($billDetails);
         
        // $OrdersSubTotal = $billDetails->sum(function ($item) {
        //         return $item->bill_pro_qty * $item->bill_pro_price;
        //     });

        //     $tax = $OrdersSubTotal * 0.10;

        //     $Total = $OrdersSubTotal + $tax;
        // $amount = number_format($Total, 2, '.', '');
        $merchant_id = env('PAYHERE_MERCHANT_ID');
        $merchant_secret = env('PAYHERE_MERCHANT_SECRET');

        $hash = strtoupper(md5(
            $merchant_id . 
            $booking->b_id . 
            $amount . 
            "USD" .
            strtoupper(md5($merchant_secret))));

        return view('payment.pay',compact('booking','customer', 'hash','amount'));
    }
}
