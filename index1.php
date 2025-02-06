<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold & Bitcoin Prices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            color: #FFD700; /* Gold color */
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        p {
            font-size: 20px;
            margin: 10px 0;
        }
        strong {
            color: #007BFF; /* Blue color for emphasis */
        }
    </style>
</head>
<body>

<h1>Current Gold (XAU) and Bitcoin (BTC) Prices</h1>

<div class="container">
<?php
// ฟังก์ชันสำหรับดึงข้อมูลจาก API
function fetch_price($url) {
    // เริ่มต้นการเรียก cURL
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
    ));

    // ดึงผลลัพธ์จาก API
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // หากเกิดข้อผิดพลาดให้ส่งข้อความกลับ
    if ($err) {
        return "cURL Error: $err";
    } else {
        // แปลงผลลัพธ์ JSON ให้เป็น array
        return json_decode($response, true);
    }
}

// ดึงราคาทองคำ (XAU)
$xauUrl = "https://api.gold-api.com/price/XAU";
$xauData = fetch_price($xauUrl);

// ดึงราคา Bitcoin (BTC)
$btcUrl = "https://api.gold-api.com/price/BTC";
$btcData = fetch_price($btcUrl);

// แสดงราคาทองคำ (XAU)
if (isset($xauData['price'])) {
    echo "<p>The current price of Gold (XAU) is: <strong>" . $xauData['price'] . " USD</strong></p>";
} else {
    echo "<p>Error: Unable to retrieve Gold (XAU) price.</p>";
}

// แสดงราคา Bitcoin (BTC)
if (isset($btcData['price'])) {
    echo "<p>The current price of Bitcoin (BTC) is: <strong>" . $btcData['price'] . " USD</strong></p>";
} else {
    echo "<p>Error: Unable to retrieve Bitcoin (BTC) price.</p>";
}
?>
</div>

</body>
</html>
