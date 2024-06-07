<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Sumber;
use App\Models\Catatan;
use Date;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    public function index()
    {
        // Fetch data from database
        $sumbers = Sumber::whereIn('id_sumber', [11, 12, 13, 14])->get();
        $pengeluaran= Pengeluaran::whereIn('id_sumber', [11, 12, 13, 14])->get()->groupBy('id_sumber');

        // Prepare data
        $sumberData = [];
        foreach ($sumbers as $sumber) {
            $jumlahPengeluaran = $pengeluaran->has($sumber->id_sumber) ? $pengeluaran[$sumber->id_sumber]->sum('jumlah') : 0;
            $countPengeluaran = $pengeluaran->has($sumber->id_sumber) ? $pengeluaran[$sumber->id_sumber]->count() : 0;

            $sumberData[] = [
                'id_sumber' => $sumber->id_sumber,
                'nama' => $sumber->nama,
                'jumlah' => $jumlahPengeluaran,
                'count' => $countPengeluaran * 4,
                'count_text' => $countPengeluaran
            ];
        }

        // Get transaction data and add source name
        $transaksi_pengeluaran = Pengeluaran::all()->map(function ($transaksi) use ($sumberData) {
            $sumber = collect($sumberData)->firstWhere('id_sumber', $transaksi->id_sumber);
            $transaksi->nama_sumber = $sumber['nama'] ?? 'Tidak diketahui';
            return $transaksi;
        });

        // Fetch notes
        $catatan1 = Catatan::find(3);
        $catatan2 = Catatan::find(4);

        // Get admin username
        $admin_username = Auth::user()->name ?? session('user_admin_username') ?? 'Guest';

        // Return view with data
        return view('admin.pengeluaran', compact('sumberData', 'catatan1', 'catatan2', 'admin_username', 'transaksi_pengeluaran'));
    }

    public function updateCatatan(Request $request)
    {
        // Validate request data
        $request->validate([
            'catatan1' => 'required|string',
            'catatan2' => 'required|string',
        ]);

        // Find catatan and update
        $catatan1 = Catatan::find(3);
        $catatan2 = Catatan::find(4);

        if ($catatan1) {
            $catatan1->catatan = $request->catatan1;
            $catatan1->save();
        }

        if ($catatan2) {
            $catatan2->catatan = $request->catatan2;
            $catatan2->save();
        }

        // Return response
        return response()->json(['success' => 'Catatan berhasil diperbarui.']);
    }

    public function updatePengeluaran(Request $request)
{
    $request->validate([
        'id_pengeluaran' => 'required|exists:pengeluaran,id_pengeluaran',
        'tgl_pengeluaran' => 'required|date',
        'jumlah' => 'required|numeric',
        'id_sumber' => 'required|exists:sumber,id_sumber',
        'deskripsi' => 'required|string',
    ]);

    try {
        $pengeluaran = Pengeluaran::find($request->id_pengeluaran);

        $pengeluaran->tgl_pengeluaran = $request->tgl_pengeluaran;
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->id_sumber = $request->id_sumber;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->save();

        return redirect()->back()->with('success', 'Data pengeluaran berhasil diperbarui.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}

    public function add()
    {
        // Fetch all sources for the form
        $sumbers = Sumber::all();
        return view('admin.add_pengeluaran', compact('sumbers'));
    }

    public function insertPengeluaran(Request $request)
    {
        $request->validate([
            'tgl_pengeluaran' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
            'id_sumber' => 'required|integer|exists:sumber,id_sumber',
            'deskripsi' => 'required|string|max:255',
        ]);

        try {
            // Save the expenditure
            $pengeluaran = new Pengeluaran();
            $pengeluaran->tgl_pengeluaran = $request->input('tgl_pengeluaran');
            $pengeluaran->jumlah = $request->input('jumlah');
            $pengeluaran->id_sumber = $request->input('id_sumber');
            $pengeluaran->deskripsi = $request->input('deskripsi');
            $pengeluaran->save();

            return redirect()->route('admin.pengeluaran')->with('add_msg', 'Pengeluaran berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Gagal menyimpan pengeluaran: ' . $e->getMessage()]);
        }
    }

    public function delete_pengeluaran(Request $request, $id_pengeluaran)
    {
        try {
            // Temukan data pengeluaran berdasarkan ID
            $pengeluaran = Pengeluaran::findOrFail($id_pengeluaran);

            // Hapus data pengeluaran
            $pengeluaran->delete();

            // Kirim respons sukses
            return response()->json(['success' => 'Data pengeluaran berhasil dihapus.']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}