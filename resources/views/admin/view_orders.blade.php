<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AinurCake</title>
    <link rel="shortcut icon" href="../uploads/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../sweetalert2/sweetalert2.min.css">
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="dashboard-main-wrapper">
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#"><img src="../uploads/logo.png" class="img-fluid" width="90"
                        height="auto" alt="" style="margin-right: -20px;"> AinurCake</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="../uploads/User.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $admin_username; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="{{ route('admin.account_admin') }}"><i
                                    class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="{{ route('admin.index') }}"><i
                                        class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-fw fa-rocket"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.view_users') }}"><i
                                        class="fa fa-fw fa-user-circle"></i>Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-3"><i
                                        class="fas fa-fw fa-chart-pie"></i>Category</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.view_category') }}">View
                                                category</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.add_category') }}">Add
                                                category</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-4" aria-controls="submenu-4"><i
                                        class="fab fa-product-hunt"></i>Products</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.view_product') }}">View
                                                products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.add_product') }}">Add products</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.view_orders') }}"><i
                                        class="fas fa-shopping-cart"></i>Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.pengeluaran') }}"><i
                                        class="fas fa-fw fa-arrow-down"></i>Pengeluaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.laporan_bulanan')}}"><i class="fas fa-table"></i>Laporan
                                    Bulanan</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Orders</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View orders</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Orders Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Id pemesanan</th>
                                                <th>Nama user</th>
                                                <th>Tanggal pemesanan</th>
                                                <th>Tanggal Pengiriman</th>
                                                <th>Metode pembayaran</th>
                                                <th>Jumlah total</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $i => $order)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $order->orders_id }}</td>
                                                <td>{{ $order->users_id }}</td>
                                                <td>{{ $order->order_date }}</td>
                                                <td>{{ $order->delivery_date }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>{{ $order->total_amount }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-info"
                                                    data-order='@json($order)' onclick="updateOrders(this)">Edit</button>
                                                    @if ($order->status == 'Menunggu Konfirmasi' || $order->status == 'Belum Bayar')
                                                    <button data-toggle="modal" data-target="#cancel_order"
                                                        onclick="cancel_orders({{ $order->orders_id }})" class="btn btn-warning">Cancel</button>
                                                    @else
                                                    <button onclick="delete_orders({{ $order->orders_id }})"
                                                        class="btn btn-danger">DELETE</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Id pemesanan</th>
                                                <th>Nama user</th>
                                                <th>Tanggal pemesanan</th>
                                                <th>Tanggal Pengiriman</th>
                                                <th>Metode pembayaran</th>
                                                <th>Jumlah total</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Orders Detail Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Id pemesanan</th>
                                                <th>Nama produk</th>
                                                <th>Jumlah</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cake_shop_orders_detail as $i => $order)
                                            <tr data-orders-detail-id="{{ $order->orders_detail_id }}">
                                                <td>{{ $i + 1 }}</td>
                                                <td class="orders-id">{{ $order->orders_id }}</td>
                                                <td class="product-name">{{ $order->product_name }}</td>
                                                <td class="quantity">{{ $order->quantity }}</td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#exampleModal1" class="btn btn-space btn-primary" 
                                                            data-orders-detail-id="{{ $order->orders_detail_id }}"
                                                            data-orders-id="{{ $order->orders_id }}"
                                                            data-product-name="{{ $order->product_name }}"
                                                            data-quantity="{{ $order->quantity }}" 
                                                            onclick="updateOrderDetail(this)">Edit</button>
                                                    <button onclick="delete_orders_detail({{ $order->orders_detail_id }})" class="btn btn-danger">DELETE</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Id pemesanan</th>
                                                <th>Nama produk</th>
                                                <th>Jumlah</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                Copyright © 2023 Concept. Dashboard by D3
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Modal for Editing Orders -->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="editOrdersForm" method="POST" action="{{ route('admin.update_orders') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit orders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputUsersId">Users id</label>
                        <input id="inputUsersId" type="number" min="1" name="users_id" required="" placeholder="Enter users id" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputDeliveryDate">Delivery date</label>
                        <input id="inputDeliveryDate" type="date" name="delivery_date" required="" placeholder="Enter delivery date" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPaymentMethod">Payment method</label>
                        <select id="inputPaymentMethod" name="payment_method" class="form-control">
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputTotalAmount">Total amount</label>
                        <input id="inputTotalAmount" type="number" min="1" name="total_amount" required="" placeholder="Enter total amount" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" name="status" class="form-control">
                            <option value="Dibuat">Dibuat</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                            <option value="selesai">Selesai</option>
                            <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                            <option value="Belum Bayar">Belum Bayar</option>
                        </select>
                    </div>
                    <input type="hidden" name="orders_id" id="inputOrdersId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-space btn-secondary" id="clearButton1">Clear</button>
                    <button type="submit" class="btn btn-space btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal for Editing Order Details -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editOrderForm"> <!-- Pastikan tag form mencakup semua elemen input -->
            @csrf <!-- Tambahkan token CSRF -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Order Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editOrdersDetailId" name="orders_detail_id">
                    <div class="form-group">
                        <label for="editOrdersId">Order ID</label>
                        <input type="number" class="form-control" id="editOrdersId" name="orders_id" required="" placeholder="Enter orders id" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editProductName">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" name="product_name" required="" placeholder="Enter product name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editQuantity">Quantity</label>
                        <input type="number" class="form-control" id="editQuantity" name="quantity" required="" placeholder="Enter quantity" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-space btn-secondary" id="clearButton">Clear</button>
                    <button type="submit" class="btn btn-space btn-primary" onclick="submitForm()">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <!-- JavaScript to handle the modals and interactions -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Object to store initial form data
    var initialData = {};

 // Store initial form data when modal is opened
 $('#exampleModal').on('show.bs.modal', function (event) {
        initialData.inputUsersId = document.getElementById('inputUsersId').value;
        initialData.inputDeliveryDate = document.getElementById('inputDeliveryDate').value;
        initialData.inputPaymentMethod = document.getElementById('inputPaymentMethod').value;
        initialData.inputTotalAmount = document.getElementById('inputTotalAmount').value;
        initialData.inputStatus = document.getElementById('inputStatus').value;
    });

    // Clear button functionality
    document.getElementById('clearButton1').addEventListener('click', function() {
        document.getElementById('inputUsersId').value = ''; // Reset input users id
        document.getElementById('inputDeliveryDate').value = ''; // Reset input delivery date
        document.getElementById('inputPaymentMethod').value = 'Cash'; // Reset select payment method
        document.getElementById('inputTotalAmount').value = ''; // Reset input total amount
        document.getElementById('inputStatus').value = 'Dibuat'; // Reset select status
    });

    // Reset form to initial data when modal is closed
    $('#exampleModal').on('hidden.bs.modal', function () {
        resetEditOrdersForm();
    });

    // Function to reset form fields to initial data
    function resetEditOrdersForm() {
        // Populate form fields with initial data
        document.getElementById('inputUsersId').value = initialData.inputUsersId;
        document.getElementById('inputDeliveryDate').value = initialData.inputDeliveryDate;
        document.getElementById('inputPaymentMethod').value = initialData.inputPaymentMethod;
        document.getElementById('inputTotalAmount').value = initialData.inputTotalAmount;
        document.getElementById('inputStatus').value = initialData.inputStatus;
    }
});


    // Fungsi untuk menangani tombol "Edit"
function updateOrders(element) {
    var order = JSON.parse(element.getAttribute('data-order'));
    document.getElementById('inputUsersId').value = order.users_id;
    document.getElementById('inputDeliveryDate').value = order.delivery_date;
    document.getElementById('inputPaymentMethod').value = order.payment_method;
    document.getElementById('inputTotalAmount').value = order.total_amount;
    document.getElementById('inputStatus').value = order.status;
    document.getElementById('inputOrdersId').value = order.orders_id;
}

// Event listener untuk tombol "Edit"
document.querySelectorAll('.btn-info').forEach(function(button) {
    button.addEventListener('click', function() {
        updateOrders(this);
    });
});

// Event listener untuk tombol "Edit"
document.querySelectorAll('.btn-edit').forEach(function(button) {
    button.addEventListener('click', function() {
        updateOrders(this);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Additional functionality for the other form
    document.getElementById('clearButton').addEventListener('click', function() {
        document.getElementById('editOrdersId').value = ''; // Reset input orders id
        document.getElementById('editProductName').value = ''; // Reset input product name
        document.getElementById('editQuantity').value = ''; // Reset input quantity
    });

    // Function to populate the form fields with data attributes
    window.updateOrderDetail = function(button) {
        var ordersDetailId = button.getAttribute('data-orders-detail-id');
        var ordersId = button.getAttribute('data-orders-id');
        var productName = button.getAttribute('data-product-name');
        var quantity = button.getAttribute('data-quantity');

        document.getElementById('editOrdersDetailId').value = ordersDetailId;
        document.getElementById('editOrdersId').value = ordersId;
        document.getElementById('editProductName').value = productName;
        document.getElementById('editQuantity').value = quantity;
    };

    // Form submit functionality with AJAX
    document.getElementById('editOrderForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = this;
        var formData = new FormData(form);
        
        fetch('{{ route("admin.update_order_detail") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value // Get CSRF token from the form
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the table row with the new data
                var ordersDetailId = formData.get('orders_detail_id');
                var row = document.querySelector(`tr[data-orders-detail-id="${ordersDetailId}"]`);
                row.querySelector('.orders-id').innerText = formData.get('orders_id');
                row.querySelector('.product-name').innerText = formData.get('product_name');
                row.querySelector('.quantity').innerText = formData.get('quantity');
                
                $('#exampleModal1').modal('hide');
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

        function edit_orders(order_id) {
            // Fetch order details via AJAX or use preloaded data
            // and fill the form fields
            // Example:
            // $('#orders_id').val(order_id);
            // Other fields...
        }

        function update_order() {
            // Update order via AJAX
            // Example:
            // var data = $('#form-edit-order').serialize();
            // $.post('/update-order', data, function(response) {
            //     // Handle response
            // });
        }

        function edit_orders_detail(order_detail_id) {
            // Fetch order detail via AJAX or use preloaded data
            // and fill the form fields
            // Example:
            // $('#orders_detail_id').val(order_detail_id);
            // Other fields...
        }

        function update_order_detail() {
            // Update order detail via AJAX
            // Example:
            // var data = $('#form-edit-order-detail').serialize();
            // $.post('/update-order-detail', data, function(response) {
            //     // Handle response
            // });
        }

        function delete_orders(orders_id) {
                Swal.fire({
                    position: 'top',
                    title: "Do you want to delete?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna menekan tombol "Yes, delete it!"
                        Swal.fire({
                            position: 'top',
                            title: "Deleted!",
                            text: "Orders deleted.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            // Arahkan ke delete_orders.php setelah konfirmasi pengguna
                            window.location.href = "{{ route('admin.delete_orders') }}?orders_id=" + orders_id;
                        });
                    }
                });
        }

        function delete_orders_detail(orders_detail_id) {
                Swal.fire({
                    position: 'top',
                    title: "Do you want to delete?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna menekan tombol "Yes, delete it!"
                        Swal.fire({
                            position: 'top',
                            title: "Deleted!",
                            text: "Orders deleted.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            // Arahkan ke delete_orders.php setelah konfirmasi pengguna
                            window.location.href = "{{ route('admin.delete_orders_detail') }}?orders_detail_id=" + orders_detail_id;
                        });
                    }
                });
        }

        function konfirmasi_orders(order_id) {
            // Confirm order via AJAX
            // Example:
            // $.post('/confirm-order', { id: order_id }, function(response) {
            //     // Handle response
            // });
        }

        function cancel_orders(order_id) {
            // Cancel order via AJAX
            // Example:
            // if (confirm('Are you sure you want to cancel this order?')) {
            //     $.post('/cancel-order', { id: order_id }, function(response) {
            //         // Handle response
            //     });
            // }
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
            <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
            <script src="{{ asset('js/main-js.js') }}"></script>
            <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('js/data-table.js') }}"></script>
            <script src="{{ asset('js/uploadImage.js') }}"></script>
</body>
</html>