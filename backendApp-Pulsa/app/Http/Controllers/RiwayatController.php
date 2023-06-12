<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\riwayat;

class RiwayatController extends Controller
{
    // Getting all data
    public function index() {
        $products = riwayat::all();

        return response()->json([
            "message" => "Data berhasil diambil",
            "code" => 200,
            "data" => $products
        ]);
    }
}
