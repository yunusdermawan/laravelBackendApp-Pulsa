<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function index($id)
    {
        $transactions = Transaction::where('user_id', $id)->get();

        return response()->json([
            'msg' => 'Data Berhasil Ditammpilkan',
            'status' => 200,
            'data' => $transactions,
        ]);
    }

    public function beliPulsa(Request $request, $id)
    {
        $result = $request->validate([
            'no_kartu' => 'required|string',
            'provider' => 'required|string',
            'nominal' => 'required|numeric',
        ]);

        $users = User::find($id);

        $saldo = $users->saldo;
        if ($saldo < $result['nominal']) {
            return response()->json([
                'msg' => 'Saldo Tidak Mencukupi',
            ]);
        } else {
            $transactions = Transaction::create([
                'no_kartu' => $result['no_kartu'],
                'provider' => $result['provider'],
                'nominal' => $result['nominal'],
                'tanggal' => Carbon::now(),
                'user_id' => $users->id,
            ]);
            $users->update([
                'saldo' => $saldo -= $result['nominal'],
            ]);

            return response()->json([
                'msg' => 'Terima Kasih Pembelian Pulsa Berhasil',
                'status' => 200,
                'data' => $transactions,
            ]);
        }
    }
}
