<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CakeShopOrders;
use App\Models\CakeShopUsersRegistrations;
use App\Models\CakeShopOrdersDetail;
use Carbon\Carbon;

class LaporanBulananController extends Controller
{

    public function index()
    {
        // Ambil data order dari database
        $orders = CakeShopOrders::all();

        // Ambil total jumlah dari tabel orders_detail berdasarkan orders_id
        foreach ($orders as $order) {
            $order->total_quantity = CakeShopOrdersDetail::getTotalJumlahByOrderId($order->orders_id);
        }

        // Ambil data user terkait dengan setiap order
        foreach ($orders as $order) {
            $user = CakeShopUsersRegistrations::find($order->users_id);
            $order->users_username = $user ? $user->users_username : 'Unknown';
        }

        return view('admin.laporan_bulanan', compact('orders'));
    }

    public function getDataByMonth(Request $request)
    {
        $month = $request->input('month');

        if ($month == 'all' || !$month) {
            $orders = CakeShopOrders::all();
        } else {
            $orders = CakeShopOrders::whereMonth('order_date', $month)->get();
        }

        // Add total quantity and user name to each order
        foreach ($orders as $order) {
            $order->total_quantity = CakeShopOrdersDetail::where('orders_id', $order->orders_id)->sum('quantity');
            $user = CakeShopUsersRegistrations::find($order->users_id);
            $order->users_username = $user ? $user->users_username : 'Unknown';
        }

        return view('admin.laporan_bulanan', compact('orders'));
    
    }
    public function printReport()
{
    // Di sini Anda dapat menambahkan logika untuk mencetak laporan, jika diperlukan
    // Misalnya, Anda dapat menggunakan fungsi PHP untuk membuat file PDF atau format laporan lainnya

    // Setelah selesai mencetak laporan, Anda dapat mengarahkan pengguna kembali ke halaman sebelumnya
    return redirect()->back()->with('success', 'Laporan berhasil dicetak!');
}
}