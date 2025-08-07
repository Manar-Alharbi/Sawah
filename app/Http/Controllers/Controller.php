<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Trip;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


public function index()
{
    $trip = Trip::with('images')->findOrFail($id); // تحميل الصور مع الرحلات
    return view('trips.index', compact('trips'));
}
}



