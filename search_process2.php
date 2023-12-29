<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js"></script>
<?php

include "config.php";

$country = isset($_GET['country']) ? $_GET['country'] : '';
$product_name = isset($_GET['product_name']) ? $_GET['product_name'] : '';
$product_color = isset($_GET['product_color']) ? $_GET['product_color'] : '';

$black_color = isset($_GET['black_color']) ? $_GET['black_color'] : '';
$white_color = isset($_GET['white_color']) ? $_GET['white_color'] : '';
$yellow_color = isset($_GET['yellow_color']) ? $_GET['yellow_color'] : '';
$blueviolet_color = isset($_GET['blueviolet_color']) ? $_GET['blueviolet_color'] : '';
$orange_color = isset($_GET['orange_color']) ? $_GET['orange_color'] : '';

$product_version = isset($_GET['product_version']) ? $_GET['product_version'] : '';
$min_price_range = isset($_GET['min_price_range']) ? $_GET['min_price_range'] : '';
$max_price_range = isset($_GET['max_price_range']) ? $_GET['max_price_range'] : '';
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';
$price_low_high = isset($_GET['price_low_high']) ? $_GET['price_low_high'] : '';
$min_add_date = isset($_GET['min_add_date']) ? $_GET['min_add_date'] : '';
$max_add_date = isset($_GET['max_add_date']) ? $_GET['max_add_date'] : '';
$min_rating = isset($_GET['min_rating']) ? $_GET['min_rating'] : '';
$warranty_check = isset($_GET['warranty_check']) ? $_GET['warranty_check'] : '';
$cod_check = isset($_GET['cod_check']) ? $_GET['cod_check'] : '';
$verified_check = isset($_GET['verified_check']) ? $_GET['verified_check'] : '';

$min_price_range = isset($_GET['min_price_range']) ? $_GET['min_price_range'] : '';
$max_price_range = isset($_GET['max_price_range']) ? $_GET['max_price_range'] : '';


$search_query = "SELECT * FROM products_table WHERE 1=1";

if (!empty($country)) {
   $search_query .= " AND country LIKE '%$country%'";
   $searchLevelCountry = TRUE;
}

if (!empty($product_name)) {
   $search_query .= " AND title LIKE '%$product_name%' ";
   $searchLevelTitle = TRUE;
}

if (!empty($product_color)) {
   $search_query .= " AND colors LIKE '%$product_color%' ";
   $searchLevelColor = TRUE;
}

if (!empty($black_color)) {
   $search_query .= " AND colors = black";
}

if (!empty($white_color)) {
   $search_query .= " AND colors = white";
}

if (!empty($yellow_color)) {
   $search_query .= " AND colors = yellow";
}

if (!empty($blueviolet_color)) {
   $search_query .= " AND colors = blueviolet";
}

if (!empty($orange_color)) {
   $search_query .= " AND colors = orange";
}

if (!empty($gender)) {
   $search_query .= " AND gender = '$gender' ";
   $searchLevelGender = TRUE;
}

if (!empty($product_version)) {
   $search_query .= " AND version = '$product_version' ";
   $searchLevelVersion = TRUE;
}

if (!empty($min_price_range) && !empty($max_price_range)) {
   $search_query .= " AND price BETWEEN $min_price_range AND $max_price_range";
   $searchLevelPriceRange = TRUE;
}

if (!empty($price_low_high)) {
   if ($price_low_high == "low_to_high") {
      $search_query .= " ORDER BY price DESC";
   } else {
      $search_query .= " ORDER BY price ASC";
   }
}

if (!empty($min_add_date) && !empty($max_add_date)) {
   $search_query .= " AND add_at BETWEEN $min_add_date AND $max_add_date";
   $searchLevelDateRange = TRUE;
}

if (!empty($min_rating)) {
   $search_query .= " AND ratings >= $min_rating";
   $searchLevelRating = TRUE;
}

if (!empty($warranty_check)) {
   if ($warranty_check == 1) {
      $search_query .= " AND warranty = 1";
      $searchLevelWarranty = TRUE;
   }
}

if (!empty($cod_check)) {
   if ($cod_check == 1) {
      $search_query .= " AND cod = 1";
      $searchLevelCod = TRUE;
   }
}

if (!empty($verified_check)) {
   if ($verified_check == 1) {
      $search_query .= " AND verified = 1";
      $searchLevelVerified = TRUE;
   }
}

$stmt = $conn->prepare($search_query);
$stmt->execute();
$result = $stmt->get_result();

echo '<p><h2 class="result_h2">Total Results: ' . mysqli_num_rows($result) . '</h2></p>';

$output = '';

while ($row = $result->fetch_assoc()) {
   $output .= '
        <div class="product_inner_div">';
   if (@$searchLevelTitle == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '
                Title : ' . $row['title'] . '
            </div>';

   if (@$searchLevelPriceRange == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '
                Price : ' . $row['price'] . '
            </div>';

   if (@$searchLevelGender == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '
                Gender : ' . $row['gender'] . '
            </div>';


   if (@$searchLevel == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '
                Warranty : ' . ($row['warranty'] === 1 ? "Warranty Available" : "Warranty Not Available") . '
            </div>';

   if (@$searchLevelCod == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '
                Cash On Delivery : ' . ($row['cod'] === 1 ? "Cash On Delivery Available" : "Cash On Delivery Not Available") . '
            </div>';


   if (@$searchLevelVerified == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '                Verified Tag : ' . ($row['verified'] === 1 ? "Verified By Husnain" : "Not Verified Product") . '
            </div>';

   if (@$searchLevelVersion == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '
                Version : ' . $row['version'] . '
            </div>';

   if (@$searchLevelColor == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '                Colors : ' . $row['colors'] . '
            </div>';

   if (@$searchLevelCountry == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '
                Country : ' . $row['country'] . '
            </div>';


   if (@$searchLevelRating == TRUE) {
      $data = "<div style='background:red; padding-bottom:10px;'>";
   } else {
      $data = "<div>";
   }
   $output .= '' . $data . '                 Rating : ' . $row['ratings'] . '
            </div>

            <div class="product_rating" id="product_rating_' . $row['id'] . '" data-rating="' . $row['ratings'] . '"></div>
            </div>
      ';
}

echo $output;

$conn->close();
?>
<script>
   $(document).ready(function() {
      $(".product_rating").each(function() {
         $(this).rateYo({
            rating: $(this).attr("data-rating"),
            fullStar: true,
            readOnly: true
         });
      });
   });
</script>