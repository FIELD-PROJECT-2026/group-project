<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['order_confirmation'] = 'false';
    session_write_close();    
     header('Location: checkout.php');
    exit;
}


$firstName = trim($_POST['first_name'] ?? '');
$lastName = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$address1 = trim($_POST['address_line_1'] ?? '');
$address2 = trim($_POST['address_line_2'] ?? '');
$notes = trim($_POST['order_notes'] ?? '');
$country = trim($_POST['country'] ?? '');
$state = trim($_POST['state'] ?? '');
$city = trim($_POST['city'] ?? '');
$contact = trim($_POST['contact_number'] ?? '');
$paymentMethod = trim($_POST['payment_method'] ?? 'Bank');

$requiredFields = [$firstName, $lastName, $email, $address1, $country, $state, $city, $contact];
foreach ($requiredFields as $field) {
    if ($field === '') {
        $_SESSION['order_confirmation'] = 'false';
        session_write_close();
        header('Location: checkout.php');
        exit;
    }


$amount = 20000;
$receiptNo = rand(100, 999);
$date = date('d-m-Y');


    $_SESSION['order_confirmation'] = [
        'name' => $firstName . ' ' . $lastName,
        'receipt_no' => $receiptNo,
        'amount' => '20000 TSH',
        'date' => $date,
        'payment_method' => $paymentMethod,
        'address' => implode(', ', array_filter([$address1, $address2, $city, $state, $country])),
        'contact' => $contact,
        'notes' => $notes,
        'email' => $email,
    ];

    session_write_close();
    header('Location: checkout.php');
    exit;
    
    
    
    require_once 'database.php';
    $sqlInsert = "
    INSERT INTO customers (
        first_name, last_name, email, address_line1,
        address_line2, order_notes, country, state,
        city, contact_number, payment_method, amount
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_prepare($conn, $sqlInsert);

if (!$stmt) {
    die("Error preparing the insert statement: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssss",
    $first_name,
    $last_name,
    $email,
    $address_line1,
    $address_line2,
    $order_notes,
    $country,
    $state,
    $city,
    $contact_number,
    $payment_method,
    $amount
);

if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    die("Error inserting your checkout data: " . mysqli_error($conn));
}

$newOrderID = mysqli_insert_id($conn);

mysqli_stmt_close($stmt);
mysqli_close($conn);

echo "<div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>";
echo "<h2 style='color: green;'>✔ Order Placed Successfully!</h2>";
echo "<p>Thank you, <strong>" . htmlspecialchars($first_name) . "</strong>. Your data is now properly saved.</p>";
echo "<p>Your Order ID is: <strong>#" . $newOrderID . "</strong></p>";
echo "<a href='index.html'>Return to Shop</a>";
echo "</div>";

    }


?>
