<?php

namespace App\Http\Controllers;

use App\Models\CakeShopOrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Fungsi untuk menampilkan halaman daftar pesanan
    public function index()
{
    // Ambil data dari tabel cake_shop_orders
    $orders = DB::table('cake_shop_orders')->get();
    
    // Ambil data dari tabel cake_shop_orders_detail
    $cake_shop_orders_detail = DB::table('cake_shop_orders_detail')->get();
    
    // Simpan username admin ke dalam sesi
    $admin_username = session('user_admin_username');

    return view('admin.view_orders', compact('orders', 'cake_shop_orders_detail', 'admin_username'));
}

    // Fungsi untuk menghapus pesanan
    public function deleteOrders(Request $request)
    {
        // Ambil ID pesanan dari query string
        $orders_id = $request->query('orders_id');

        // Hapus pesanan berdasarkan ID
        DB::table('cake_shop_orders')->where('orders_id', $orders_id)->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('admin.view_orders')->with('delete_msg', 'Order has been deleted successfully!');
    }

    // Fungsi untuk menghapus detail pesanan
    public function deleteOrdersDetail(Request $request)
{
    // Ambil ID detail pesanan dari query string
    $ordersDetailId = $request->query('orders_detail_id');

    try {
        // Hapus detail pesanan berdasarkan ID
        DB::table('cake_shop_orders_detail')->where('orders_detail_id', $ordersDetailId)->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('admin.view_orders')->with('delete_msg', 'Order detail has been deleted successfully!');
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, kembalikan respons dengan pesan kesalahan
        return redirect()->route('admin.view_orders')->with('error', $e->getMessage());
    }
}


// Fungsi untuk menampilkan form edit pesanan
public function editOrders($order_id)
{
    try {
        // Ambil data pesanan dari database berdasarkan ID
        $order = DB::table('cake_shop_orders')->where('orders_id', $order_id)->second();

        // Tampilkan view edit_orders dengan data pesanan yang akan diubah
        return view('admin.edit_orders', compact('order'));
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, kembalikan respons dengan pesan kesalahan
        return redirect()->back()->with('error', $e->getMessage());
    }
}

// Fungsi untuk mengupdate pesanan
public function updateOrders(Request $request)
{
    // Validasi request
    $request->validate([
        'orders_id' => 'required|numeric|min:1',
        'users_id' => 'required|numeric|min:1',
        'delivery_date' => 'required|date',
        'payment_method' => 'required|string|in:Cash,Card',
        'total_amount' => 'required|numeric|min:1',
        'status' => 'required|string|in:Dibuat,Dibatalkan,selesai,Menunggu Konfirmasi,Belum Bayar',
    ]);

    try {
        // Ambil data pesanan dari request
        $data = $request->only(['users_id', 'delivery_date', 'payment_method', 'total_amount', 'status']);

        // Ambil ID pesanan
        $ordersId = $request->input('orders_id');

        // Update data pesanan berdasarkan ID
        DB::table('cake_shop_orders')->where('orders_id', $ordersId)->update($data);

        // Redirect ke halaman view_orders dengan pesan sukses
        return redirect()->route('admin.view_orders')->with('success', 'Order updated successfully');
    } catch (\Exception $e) {
        // Redirect ke halaman view_orders dengan pesan error
        return redirect()->route('admin.view_orders')->with('error', $e->getMessage());
    }
}


// Fungsi untuk mengupdate detail pesanan
public function updateOrderDetail(Request $request)
{
    // Validasi request
    $request->validate([
        'orders_detail_id' => 'required|numeric|min:1',
        'orders_id' => 'required|numeric|min:1',
        'product_name' => 'required|string|max:255',
        'quantity' => 'required|numeric|min:1|max:50',
    ]);

    try {
        // Ambil data detail pesanan dari request
        $data = $request->only(['orders_id', 'product_name', 'quantity']);

        // Ambil ID detail pesanan
        $ordersDetailId = $request->input('orders_detail_id');

        // Update data detail pesanan berdasarkan ID
        DB::table('cake_shop_orders_detail')->where('orders_detail_id', $ordersDetailId)->update($data);

        // Kembalikan respons dalam format JSON
        return response()->json(['success' => true, 'message' => 'Order detail updated successfully']);
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, kembalikan respons dengan pesan kesalahan
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}




}