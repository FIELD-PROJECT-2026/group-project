<?php
    session_start();
    require 'database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];

        echo $firstName . ' ' . $lastName . '<br>';
        $email =($_POST['email'] ?? '');
        $address1 =($_POST['address_line_1'] ?? '');
        $address2 =($_POST['address_line_2'] ?? '');
        $notes = ($_POST['order_notes'] ?? '');
        $country = ($_POST['country'] ?? '');
        $state = ($_POST['state'] ?? '');
        $city = ($_POST['city'] ?? '');
        $contact = ($_POST['contact_number'] ?? '');
        $paymentMethod =($_POST['payment_method'] ?? 'Bank');

        $requiredFields = [$firstName, $lastName, $email, $address1, $country, $state, $city, $contact];
        foreach ($requiredFields as $field) {
            if ($field === '') {
                $_SESSION['order_confirmation'] = 'false';
                session_write_close();
                //header('Location: checkout.php');
                echo "Error: All required fields must be filled out.";
                exit;
            }
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


        //INSERT DATA TO DATABASE
         $sqlInsert = "
    INSERT INTO customers (
         first_name, last_name, email, address_line1,
         address_line2, order_notes, country, state,
        city, contact_number, payment_method, amount
     ) VALUES ($firstName, $lastName, $email, $address1, $address2, $notes, $country, $state, $city, $contact, $paymentMethod, $amount)";

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
     else{
         $_SESSION['order_confirmation'] = 'false';
        session_write_close();    
        header('Location: checkout.php');
        exit;
    }
?>



        //GET RECORD ID OF THE INSERTED DATA == NewOrderID

        session_write_close();
        header('Location: checkout.php');
        exit;

        