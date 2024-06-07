<?php
require_once('../config.php');

if (isset($_GET['month'])) {
    $selectedMonth = $_GET['month'];
    if ($selectedMonth == 'all') {
        $select = "SELECT o.orders_id, u.users_username, o.order_date, o.delivery_date, o.payment_method, o.total_amount, o.status, SUM(od.quantity) AS total_quantity
                    FROM cake_shop_orders o
                    INNER JOIN cake_shop_users_registrations u ON o.users_id = u.users_id
                    LEFT JOIN cake_shop_orders_detail od ON o.orders_id = od.orders_id
                    GROUP BY o.orders_id";
    } else {
        $select = "SELECT o.orders_id, u.users_username, o.order_date, o.delivery_date, o.payment_method, o.total_amount, o.status, SUM(od.quantity) AS total_quantity
                    FROM cake_shop_orders o
                    INNER JOIN cake_shop_users_registrations u ON o.users_id = u.users_id
                    LEFT JOIN cake_shop_orders_detail od ON o.orders_id = od.orders_id
                    WHERE MONTH(o.order_date) = $selectedMonth
                    GROUP BY o.orders_id";
    }

    $query = mysqli_query($conn, $select);
    $dataFound = false;
    $result = '';
    $i = 1;
    while ($res = mysqli_fetch_assoc($query)) {
        $dataFound = true;
        $result .= '<tr>
                        <td>' . $i++ . '</td>
                        <td>' . $res['order_date'] . '</td>
                        <td>' . $res['delivery_date'] . '</td>
                        <td>' . $res['users_username'] . '</td>
                        <td>' . $res['payment_method'] . '</td>
                        <td>' . $res['total_quantity'] . '</td>
                        <td>Rp ' . $res['total_amount'] . '</td>
                        <td>' . $res['status'] . '</td>
                    </tr>';
    }

    if ($dataFound) {
        if ($dataFound) {
            echo $selectedMonth;
        } else {
            echo 'Data not found';
        }
    } else {
        echo 'Data not found';
    }
} else {
    echo 'Data not found';
}
?>