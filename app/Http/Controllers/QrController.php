<?php

namespace App\Http\Controllers;

use App\Models\QrLocation;
use App\Models\QrToken;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function index()
    {
        $locations = QrLocation::with('qrTokens')->get();

        return view('qr.index', compact('locations'));
    }
}