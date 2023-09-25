<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class KasirSubmission extends Controller
{
    public function handleKasirSubmission(Request $request)
    {
        try {
            $request->merge([
                'jumlah_barang' => (int) $request->input('jumlah_barang'),
                'diskon' => (float) str_replace(',', '.', $request->input('diskon')),
            ]);

            $validator = Validator::make($request->all(), [
                'id_barang' => 'required|string|max:255',
                'jumlah_barang' => 'required|integer',
                'diskon' => 'required|numeric|between:2.50,99.99',
                'metode_bayar' => 'required|string|max:255',
                'bukti_transaksi' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            ]);

            Log::info('Submitted data:', $request->all());

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->hasFile('bukti_transaksi')) {
                $file = $request->file('bukti_transaksi');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/', $fileName);
            }
            
            $barang = Barang::find($request->input('id_barang'));

            $kasir = new Transaksi();
            $kasir->id_barang = $request->input('id_barang');
            $kasir->qty = $request->input('jumlah_barang');
            $kasir->diskon = $request->input('diskon');
            $kasir->metode_bayar = $request->input('metode_bayar');
            $kasir->bukti_transaksi = 'uploads/' . $fileName;
            $kasir->total_bayar = ($request->input('jumlah_barang') * $barang->harga) * (100-$request->input('diskon'))/100;

            $kasir->save();
            
            $request->session()->flash('success', 'The form was submitted successfully.');
            
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            $errorMessage = 'Error inserting data into the database: ' . $e->getMessage();
            return redirect()->back()->withErrors(['database_error' => $errorMessage])->withInput();
        }
    }
}