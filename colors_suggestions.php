<?php

include "config.php";

if (isset($_POST['query'])) {
    $query = $_POST['query'];

    $sql = "SELECT DISTINCT colors FROM products_table WHERE colors LIKE ?";
    $queryLike = "%" . $query . "%";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param("s", $queryLike);
    $stmt->execute();
    $result = $stmt->get_result();

    $suggestions = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $colors = explode(", ", $row['colors']);
        $uniqueColors = array_unique($colors);
        
        // Remove empty values from the array
        $uniqueColors = array_filter($uniqueColors);

        // Add unique colors to suggestions array
        $suggestions = array_merge($suggestions, $uniqueColors);
    }

    $suggestions = array_unique($suggestions);
    $suggestions = array_values($suggestions);

    if (!empty($suggestions)) {
        echo '<ul>';
        foreach ($suggestions as $suggestion) {
            echo '<li class="suggestions_li">' . $suggestion . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No suggestions found.';
    }
}

$conn->close();
?>
