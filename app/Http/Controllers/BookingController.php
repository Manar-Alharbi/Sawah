<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * عرض جميع الرحلات للمستخدم (صفحة home)
     */
    public function index()
    {
        $trips = Trip::all();
        return view('bookings.index', compact('trips'));
    }

    /**
     * عرض تفاصيل الرحلة
     */
    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.show', compact('trip'));
    }

    /**
     * حجز سريع لرحلة
     */
    public function quickBooking($tripId)
    {
        $trip = Trip::findOrFail($tripId);

        Booking::create([
            'user_id' => Auth::id(),
            'trip_id' => $trip->id,
            'status' => 'بانتظار المراجعة',
        ]);

        return redirect()->route('bookings.my')->with('success', 'تم حجز الرحلة بنجاح!');
    }

    /**
     * عرض الحجوزات الخاصة بالمستخدم
     */
    public function myBookings()
    {
        $bookings = Booking::with('trip')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings.my', compact('bookings'));
    }

    /**
     * عرض جميع الحجوزات للأدمن
     */
    public function adminIndex()
{
    $bookings = \App\Models\Booking::with('trip', 'user')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('admin.bookings.index', compact('bookings'));
}

    /**
     * تحديث حالة الحجز (قبول / رفض)
     */
    public function updateStatus($id, $status)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $status;
        $booking->save();

        return redirect()->route('admin.bookings')->with('success', 'تم تحديث حالة الحجز');
    }

    /**
     * حذف الحجز
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings')->with('success', 'تم حذف الحجز');
    }
}