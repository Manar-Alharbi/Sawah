<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\TripImage;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminTripController extends Controller
{
    // ✅ صفحة لوحة التحكم (عرض الحجوزات)
    public function dashboard()
    {
        $bookings = Booking::with(['user', 'trip'])->latest()->get();
        return view('admin.dashboard', compact('bookings'));
    }

    // ✅ حفظ رحلة جديدة
    public function store(Request $request)
{
    $data = $request->validate([
        'title'             => 'required|string|max:255',
        'description'       => 'required|string',
        'location'          => 'required|string|max:255',
        'price'             => 'required|numeric',
        'image'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'background_image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'images.*'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('places', 'public');
    }

    $trip = Trip::create($data);

    if ($request->hasFile('background_image')) {
        $backgroundImage = $request->file('background_image')->store('backgrounds', 'public');
        $trip->background_image = $backgroundImage;
        $trip->save();
    }

    // ✅ حفظ الصور المتعددة
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $imageFile) {
            $imageName = 'photo/' . uniqid() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('photo'), $imageName);

            TripImage::create([
                'trip_id' => $trip->id,
                'image_url' => $imageName,
            ]);
        }
    }

    return redirect()->route('admin.trips.index')->with('success', 'تم إنشاء الرحلة بنجاح');
    }

    // ✅ تعديل رحلة
    public function update(Request $request, $id)
{
    $trip = Trip::findOrFail($id);

    $data = $request->validate([
        'title'             => 'required|string|max:255',
        'description'       => 'required|string',
        'location'          => 'required|string|max:255',
        'price'             => 'required|numeric',
        'image'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'background_image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'images.*'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('places', 'public');
    }

    $trip->update($data);

    if ($request->hasFile('background_image')) {
        $backgroundImage = $request->file('background_image')->store('backgrounds', 'public');
        $trip->background_image = $backgroundImage;
        $trip->save();
    }

   if ($request->hasFile('images')) {
    foreach ($request->file('images') as $imageFile) {
        $imageName = 'photo/' . uniqid() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path('photo'), $imageName);

        TripImage::create([
            'trip_id' => $trip->id,
            'image_url' => $imageName,
        ]);
    }
}

    return redirect()->route('admin.trips.index')->with('success', 'تم تحديث الرحلة بنجاح');
}

    // ✅ حذف صورة واحدة من الصور المتعددة
    public function deleteImage($id)
{
    $image = TripImage::findOrFail($id);

    // حذف من التخزين
    if ($image->image_url && file_exists(storage_path('app/public/' . $image->image_url))) {
        unlink(storage_path('app/public/' . $image->image_url));
    }

    $image->delete();

    return back()->with('success', 'تم حذف الصورة بنجاح');
}



    // ✅ عرض صفحة إنشاء رحلة
public function create()
{
    return view('admin.trips.create');
}



public function edit($id)
{
    $trip = Trip::with('images')->findOrFail($id);
    return view('admin.trips.edit', compact('trip'));
}



public function destroy($id)
{
    $trip = Trip::with('images')->findOrFail($id);

    // حذف الصور المتعددة
    foreach ($trip->images as $image) {
        if (file_exists(public_path($image->image_url))) {
            unlink(public_path($image->image_url));
        }
        $image->delete();
    }

    // حذف الصورة الرئيسية
    if ($trip->image && file_exists(public_path('storage/' . $trip->image))) {
        unlink(public_path('storage/' . $trip->image));
    }

    // حذف صورة الخلفية
    if ($trip->background_image && file_exists(public_path('storage/' . $trip->background_image))) {
        unlink(public_path('storage/' . $trip->background_image));
    }

    // حذف الرحلة
    $trip->delete();

    return redirect()->route('admin.trips.index')->with('success', 'تم حذف الرحلة بنجاح');
}

public function index()
{
    $trips = Trip::latest()->get();
    return view('admin.trips.index', compact('trips'));
}

}