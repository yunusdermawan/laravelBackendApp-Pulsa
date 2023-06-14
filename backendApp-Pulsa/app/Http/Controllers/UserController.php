<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json([
            'msg' => 'Data Berhasil Ditammpilkan',
            'status' => 200,
            'data' => $users,
        ]);
    }

    public function view($id)
    {
        $users = User::find($id);

        return response()->json([
            'msg' => 'Data Berhasil Ditammpilkan',
            'status' => 200,
            'data' => $users,
        ]);
    }

    public function updateSaldo(Request $request, $id)
    {
        $result = $request->validate([
            'saldo' => 'required|numeric'
        ]);

        $users = User::find($id);
        $saldo = $users->saldo;
        if ($saldo != 0) {
            $users->update([
                'saldo' => $saldo += $result['saldo'],
            ]);
        } else {
            $users->update([
                'saldo' => $result['saldo'],
            ]);
        }

        return response()->json([
            'msg' => 'Anda Berhasil Top Up Saldo',
            'status' => 200,
            'data' => $users,
        ]);
    }

    public function createUser(Request $request)
    {
        $result = $request->validate([
            'nama' => 'required|string',
        ]);

        $users = User::create([
            'nama' => $result['nama'],
            'saldo' => 0
        ]);

        return response()->json([
            'msg' => 'User Berhasil Ditambahkan',
            'status' => 200,
            'data' => $users,
        ]);
    }
}
