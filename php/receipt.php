<?php
//session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get customer information from the checkout form
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $address_line1 = $_POST['address_line1'] ?? '';
    $address_line2 = $_POST['address_line2'] ?? '';
    $order_notes = $_POST['order_notes'] ?? '';
    $country = $_POST['country'] ?? '';
    $state = $_POST['state'] ?? '';
    $city = $_POST['city'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';
    $payment_method = $_POST['payment_method'] ?? '';
    $amount = $_POST['amount'] ?? '';

}
$products = [
    [
        "name" => "Blue slim jeans",
        "quantity" => 1,
        "price" => 35000
    ],
    [
        "name" => "cusal sneakers",
        "quantity" => 1,
        "price" => 45000
    ],
    [
        "name" => "t-shirt",
        "quantity" => 1,
        "price" => 20000
    ],
    [
        "name" => "white sneakers",
        "quantity" => 1,
        "price" => 35000
    ]
    ];
$subtotal = 0;
foreach ($products as $product) {
    $subtotal += $product['quantity'] * $product['price'];
}
$discount = 0;
$total = $subtotal - $discount;
$receipt_no = "000125";
$date = date("d/m/Y");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Receipt - Online Shopping</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f2ef;
            color: #2d2118;
            padding: 30px;
        }

        .receipt {
            max-width: 900px;
            margin: auto;
            background: white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }      

        .header {
            background: #3b281b;
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: white;
            color: #d49b28;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
        }

        .logo h1 {
            font-size: 28px;
        }

        .logo h2 {
            color: #e1a82d;
            font-size: 27px;
        }

        .company-info {
            line-height: 1.8;
            font-size: 14px;
        }

       

        .receipt-title {
            padding: 30px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .receipt-title h2 {
            font-size: 35px;
        }

        .receipt-number {
            background: #e5ae32;
            padding: 20px;
            border-radius: 15px;
            font-weight: bold;
        }

      

        .customer {
            margin: 0 30px 25px;
            background: #f5f4f2;
            padding: 20px;
            border-radius: 12px;
        }
        .customer h3 {
            margin-bottom: 15px;
        }
        .customer p {
            margin: 8px 0;
        }

      

        .items {
            padding: 0 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #3b281b;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }     

        .bottom-section {
            display: flex;
            justify-content: space-between;
            padding: 30px;
        }

        .payment {
            line-height: 2;
        }

        .totals {
            width: 350px;
            background: #f5f4f2;
            padding: 20px;
            border-radius: 12px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .grand-total {
            background: #e5ae32;
            padding: 15px;
            margin: 10px -20px -20px;
            display: flex;
            justify-content: space-between;
            font-size: 20px;
            font-weight: bold;
            border-radius: 0 0 12px 12px;
        }

        .thank-you {
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-style: italic;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            padding: 30px;
        }

        .signature {
            width: 40%;
            text-align: center;
            border-top: 1px solid #333;
            padding-top: 10px;
        }      

        .footer {
            background: #3b281b;
            color: white;
            text-align: center;
            padding: 20px;
            line-height: 1.8;
        }     

        .print-button {
            text-align: center;
            margin: 25px;
        }

        button {
            background: #e5ae32;
            border: none;
            padding: 13px 35px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #c9911d;
           }

        @media print {
               body {
                   background: white;
                   padding: 0;
                }
              .receipt {
                   box-shadow: none;
                }
              .print-button {
                   display: none;
                }
              }
    </style>
</head>

<body>
    <div class="receipt">
        <div class="header">
            <div class="logo">
                <div class="logo-circle">
                    🛒
                </div>
                <div>
                    <h1>ONLINE</h1>
                    <h2>Shopping</h2>
                    <p>
                        Shop Easy • Shop Smart • Shop Online
                    </p>
                </div>
            </div>
            <div class="company-info">
                📍 Makumbusho, Dar es Salaam<br>
                📞 +255 620 246 596<br>
                ✉ vanpee@onlineshopping.co.tz
            </div>
        </div>
        <div class="receipt-title">
            <h2>🧾 RECEIPT</h2>
            <div class="receipt-number">
                Receipt No:
                <?php echo $receipt_no; ?>
                <br>
                Date:
                <?php echo $date; ?>
            </div>
        </div>
        <div class="customer">
            <h3>Customer Details</h3>
            <p>
                <strong>Name:</strong>
                <?php echo htmlspecialchars(($first_name ?? '') . ' ' . ($last_name ?? '')); ?>
            </p>
            <p>
                <strong>Email:</strong>
                <?php echo htmlspecialchars($_POST['email'] ?? ''); ?>
            </p>
            <p>
                <strong>Phone:</strong>
                <?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>
            </p>
            <p>
                <strong>Address:</strong>
                <?=htmlspecialchars($_POST['address'] ?? '')?>
            </p>
        </div>
        <div class="items">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Price (TSh)</th>
                        <th>Total (TSh)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $number = 1;
                    foreach ($products as $product):
                        $item_total =
                            $product['quantity'] *
                            $product['price'];
                    ?>
                        <tr>
                            <td>
                                <?php echo $number; ?>
                            </td>
                            <td>
                                <?php echo $product['name']; ?>
                            </td>
                            <td>
                                <?php echo $product['quantity']; ?>
                            </td>
                            <td>
                                <?php echo number_format($product['price']); ?>
                            </td>
                            <td>
                                <?php echo number_format($item_total); ?>
                            </td>
                        </tr>
                    <?php
                        $number++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <div class="bottom-section">
            <div class="payment">
                <p>
                    <strong>Payment Method:</strong>
                    <?php echo htmlspecialchars($_POST['payment'] ?? ''); ?>
                </p>
                <p>
                    <strong>Amount Paid:</strong>
                    TSh <?php echo number_format($total); ?>
                </p>
                <p>
                    <strong>Balance:</strong>
                    TSh 0
                </p>
            </div>
            <div class="totals">
                <div class="total-row">
                    <span>Subtotal</span>
                    <span>
                        TSh <?php echo number_format($subtotal); ?>
                    </span>
                </div>
                <div class="total-row">
                    <span>Discount</span>
                    <span>
                        TSh <?php echo number_format($discount); ?>
                    </span>
                </div>
                <div class="grand-total">
                    <span>TOTAL</span>
                    <span>
                        TSh <?php echo number_format($total); ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="thank-you">
            Thank you for your business!
        </div>
        <div class="signatures">
            <div class="signature">
                Cashier Signature
            </div>
            <div class="signature">
                Customer Signature
            </div>
        </div>
        <div class="footer">
            ONLINE SHOPPING |
            Makumbusho, Dar es Salaam |
            +255 620 246 596 |
            <br>
            Your satisfaction is our priority!
        </div>
    </div>
    <div class="print-button">
        <button onclick="window.print()">
            🖨 Print Receipt
        </button>
    </div>
</body>

</html>