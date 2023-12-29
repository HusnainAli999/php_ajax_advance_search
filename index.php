<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance Search</title>
    <?php include "css.php"; ?>
</head>

<body>
    <h1 class="top_h1">Advance Search by Husnain Ali</h1>
    <form action="" method="POST" id="searchForm">
        <?php
        $stmt = mysqli_prepare($conn, "SELECT DISTINCT country FROM products_table");
        $stmt->execute();
        $result = $stmt->get_result();
        ?>
        </select>
        <div class="main-selectbox-div">
            <label>Select Country</label>
            <div id="country_selectbox_div">
                <input type="hidden" name="country" id="country" value="">
                <button type="button" id="country-btn">Select Country</button>
            </div>
            <div id="select-country-div">
                <?php
                echo '<button type="submit" value="">Select Country</button>';
                foreach ($result as $loopResult) {
                    echo '<button type="submit" value="' . $loopResult['country'] . '">' . $loopResult['country'] . '</button>';
                }
                ?>

            </div>
        </div>
        </div>

        <div>
            <label>Product Name</label><br>
            <input type="text" name="product_name" id="product_name" placeholder="Enter Product Name">
        </div>

        <div>
            <div>
                <label>Product Color <button type="button" id="select_colors_open_div_btn">Select colors <i class="fa-solid fa-arrow-down"></i></button></label><br>
                <input type="text" name="product_color" id="product_color" placeholder="Enter Product Color" autocomplete="off">
                <div id="suggestions"></div>
            </div>

            <div>

                <div class="select_colors_main_div">
                    Black
                    <input type="radio" name="product_color" id="black_color" value="black">
                    White
                    <input type="radio" name="product_color" id="white_color" value="white">
                    Yellow
                    <input type="radio" name="product_color" id="yellow_color" value="yellow">
                    BlueViolet
                    <input type="radio" name="product_color" id="blueviolet_color" value="blueviolet">
                    Orange
                    <input type="radio" name="product_color" id="orange_color" value="orange">
                </div>
            </div>
        </div>

        <div>
            <label>Version</label><br>
            <input type="text" name="product_version" id="product_version" placeholder="Enter Version etc 1.5">
        </div>

        <div class="main-selectbox-div">
            <label>Select Gender</label><br>
            <div id="gender_div">
                <input type="hidden" name="gender" id="gender" value="">
                <button type="button" id="gender-btn">Select Gender</button>
            </div>
            <div id="select-gender-div">
                <button type="submit" value="both">Both</button>
                <button type="submit" value="male">Male</button>
                <button type="submit" value="female">Female</button>
            </div>
        </div>

        <div class="main-selectbox-div">
            <label>Select Price Flow</label>
            <div id="price_low_high_div">
                <input type="hidden" name="price_low_high" id="price_low_high" value="">
                <button type="button" id="price-btn">Select Price Flow</button>
            </div>
            <div id="select-price-div">
                <button type="submit" value="">Normal</button>
                <button type="submit" value="low_to_high">Low To High</button>
                <button type="submit" value="high_to_low">High To Low</button>
            </div>
        </div>

        <div>
            <label>Minimum Entry Date And Maximum Entry Date</label><br>
            <input type="date" name="min_add_date" id="min_add_date">
            <input type="date" name="max_add_date" id="max_add_date">
        </div>

        <div>
            <label>Minimum Rating Of Prdouct</label><br>
            <input type="text" name="min_rating" id="min_rating" placeholder="Minimum Rating Of Product">
        </div>

        <div class="checkboxes_and_price_range_div">

            <div class="checkboxes_div">
                <label>Warranty</label>
                <input type="checkbox" name="warranty_check" id="warranty_check" value="1">

                <label>Cash On Delivery</label>
                <input type="checkbox" name="cod_check" id="cod_check" value="1">

                <label>Verified By Husnain</label>
                <input type="checkbox" name="verified_check" id="verified_check" value="1">
            </div>

            <div class="min_max_price_range_div">
                <div class="range-input-container">
                    <div>
                        <label>Adjust Your Min Price</label><br>
                        <input type="range" id="min_customRange" name="min_price_range" list="min_breakpoints" min="0" max="100000" step="1" value="0">
                        <datalist id="min_breakpoints">
                            <option value="0">
                            <option value="1000">
                            <option value="2000">
                            <option value="3000">
                            <option value="4000">
                            <option value="5000">
                            <option value="6000">
                            <option value="7000">
                            <option value="8000">
                            <option value="9000">
                            <option value="10000">
                        </datalist>
                        <div class="range-value" id="min_rangeValue">0</div>
                    </div>

                    <div>
                        <label>Adjust Your Max Price</label><br>
                        <input type="range" id="max_customRange" name="max_price_range" list="max_breakpoints" min="0" max="100000" step="1" value="0">
                        <datalist id="max_breakpoints">
                            <option value="0">
                            <option value="1000">
                            <option value="2000">
                            <option value="3000">
                            <option value="4000">
                            <option value="5000">
                            <option value="6000">
                            <option value="7000">
                            <option value="8000">
                            <option value="9000">
                            <option value="10000">
                        </datalist>
                        <div class="range-value" id="max_rangeValue">0</div>
                    </div>
                </div>
            </div>

        </div>

        <div>
            <button type="submit" id="submit_search">Search Your Ideas <i class="fa-solid fa-circle-check"></i></button>
        </div>

    </form>


    <form action="" method="POST" id="add_colors_search_form">
        <select name="add_colors_in_search">
            <option value="add_colors">Add Colors</option>
            <option value="no_colors">No Colors</option>
        </select>
        <button type="submit" name="add_colors_btn">Done It</button>
    </form>
    <?php
    $address = 'search_process.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_colors_btn'])) {
        if ($_POST['add_colors_in_search'] === 'add_colors') {
            $address = "search_process2.php";
        } else {
            $address = "search_process.php";
        }
    }
    ?>



    <div id="search_response_main_div"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var selectboxBtn = document.getElementById("gender-btn");
        var selectboxInput = document.querySelector("#gender_div input");
        var propertystatusdiv = document.getElementById("select-gender-div");
        var propertystatusdivbtns = document.querySelectorAll("#select-gender-div button");

        for (var i = 0; i < propertystatusdivbtns.length; i++) {
            propertystatusdivbtns[i].onclick = function() {
                selectboxBtn.innerHTML = this.innerHTML;
                selectboxInput.value = this.value;
                propertystatusdiv.style.display = "none";
            };
        }

        selectboxBtn.onclick = function() {
            if (propertystatusdiv.style.display == "none") {
                propertystatusdiv.style.display = "block";
            } else {
                propertystatusdiv.style.display = "none";
            }
        };

        //Price Low High Code

        var lowHighselectboxBtn = document.getElementById("price-btn");
        var lowHighselectboxInput = document.querySelector("#price_low_high_div input");
        var priceStatusDiv = document.getElementById("select-price-div");
        var priceStatusDivbtns = document.querySelectorAll("#select-price-div button");

        for (var i = 0; i < priceStatusDivbtns.length; i++) {
            priceStatusDivbtns[i].onclick = function() {
                lowHighselectboxBtn.innerHTML = this.innerHTML;
                lowHighselectboxInput.value = this.value;
                priceStatusDiv.style.display = "none";
            };
        }

        lowHighselectboxBtn.onclick = function() {
            if (priceStatusDiv.style.display == "none") {
                priceStatusDiv.style.display = "block";
            } else {
                priceStatusDiv.style.display = "none";
            }
        };



        //country selectbox

        var countryBtn = document.getElementById("country-btn");
        var selectBoxInput = document.querySelector("#country_selectbox_div input");
        var countryHandleDiv = document.getElementById("select-country-div");
        var countryHandleDivbtns = document.querySelectorAll("#select-country-div button");

        for (var i = 0; i < countryHandleDivbtns.length; i++) {
            countryHandleDivbtns[i].onclick = function() {
                countryBtn.innerHTML = this.innerHTML;
                selectBoxInput.value = this.value;
                countryHandleDiv.style.display = "none";
            };
        }

        countryBtn.onclick = function() {
            if (countryHandleDiv.style.display == "none") {
                countryHandleDiv.style.display = "block";
            } else {
                countryHandleDiv.style.display = "none";
            }
        };



        var select_colors_open_div_btn = document.querySelector("#select_colors_open_div_btn");
        var select_colors_main_div = document.querySelector(".select_colors_main_div");

        select_colors_open_div_btn.addEventListener("click", function() {
            if (select_colors_main_div.style.opacity == 0) {
                select_colors_main_div.style.opacity = 1;
                select_colors_main_div.style.zIndex = "999";
            } else {
                select_colors_main_div.style.opacity = 0;
                select_colors_main_div.style.zIndex = "-1";
            }
        });



        $(document).ready(function() {
            function loadData() {
                $.ajax({
                    url: "<?php echo $address;  ?>",
                    type: "POST",
                    data: $("#searchForm").serialize(),
                    success: function(response) {
                        $("#search_response_main_div").html(response)
                    },
                    error: () => {
                        alert("error in ajax");
                    }

                })
            }
            loadData();

            $("#searchForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo $address;  ?>",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        // alert(data);
                    },
                    error: function() {
                        alert("error");
                    }
                })
            })
        })

        $(document).ready(function() {

            $("#searchForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "GET",
                    url: "<?php echo $address;  ?>",
                    data: formData,
                    success: function(responseData) {
                        $("#search_response_main_div").html(responseData);
                    },
                    error: function(xhr, status, error) {
                        console.error("Request failed with status", status, "and error", error);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#searchForm').submit();
        });


        function loadPage() {
            var country = $("#country").val();
            var product_name = $("#product_name").val();
            var product_color = $("#product_color").val();

            var black_color = $("#black_color").val();
            var white_color = $("#white_color").val();
            var yellow_color = $("#yellow_color").val();
            var blueviolet_color = $("#blueviolet_color").val();
            var orange_color = $("#orange_color").val();



            var product_version = $("#product_version").val();
            var min_price_range = $("#min_price_range").val();
            var max_price_range = $("#max_price_range").val();
            var gender = $("#gender").val();
            var price_low_high = $("#price_low_high").val();
            var min_add_date = $("#min_add_date").val();
            var max_add_date = $("#max_add_date").val();
            var min_rating = $("#min_rating").val();
            var warranty_check = $("#warranty_check").val();
            var cod_check = $("#cod_check").val();
            var verified_check = $("#verified_check").val();

            $.ajax({
                type: "GET",
                url: "<?php echo $address;  ?>",
                data: {
                    "country": country,
                    "product_name": product_name,
                    "product_color": product_color,
                    "black_color": black_color,
                    "white_color": white_color,
                    "yellow_color": yellow_color,
                    "blueviolet_color": blueviolet_color,
                    "orange_color": orange_color,
                    "product_version": product_version,
                    "min_price_range": min_price_range,
                    "max_price_range": max_price_range,
                    "gender": gender,
                    "price_low_high": price_low_high,
                    "min_add_date": min_add_date,
                    "max_add_date": max_add_date,
                    "min_rating": min_rating,
                    "warranty_check": warranty_check,
                    "cod_check": cod_check,
                    "verified_check": verified_check,
                },
                success: function(responseData) {
                    $("#search_response_main_div").html(responseData);
                },
                error: function(xhr, status, error) {
                    console.error("Request failed with status", status, "and error", error);
                }
            });
        }

        loadPage();

        document.addEventListener("DOMContentLoaded", function() {
            const minRangeInput = document.getElementById("min_customRange");
            const minRangeValue = document.getElementById("min_rangeValue");

            minRangeInput.addEventListener("input", function() {
                var value = minRangeInput.value;
                updateMinRangeValue(value);
            });

            function updateMinRangeValue(value) {
                minRangeValue.textContent = numberWithCommas(value);
            }

            const maxRangeInput = document.getElementById("max_customRange");
            const maxRangeValue = document.getElementById("max_rangeValue");

            maxRangeInput.addEventListener("input", function() {
                var value = maxRangeInput.value;
                updateMaxRangeValue(value);
            });

            function updateMaxRangeValue(value) {
                maxRangeValue.textContent = numberWithCommas(value);
            }

            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        });

        $(document).ready(function() {
            $('#product_color').on('input', function() {
                var query = $(this).val();
                if (query !== '') {
                    $.ajax({
                        type: 'POST',
                        url: 'colors_suggestions.php',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#suggestions').html(data);
                            limitSuggestionText(25);
                        }
                    });
                } else {
                    $('#suggestions').empty();
                }
            });

            // Function to limit text in suggestions
            function limitSuggestionText(maxLength) {
                $('#suggestions ul li').each(function() {
                    var text = $(this).text();
                    if (text.length > maxLength) {
                        $(this).text(text.substring(0, maxLength) + '...');
                    }

                    $(this).on('click', function() {
                        $('#product_color').val(text);
                        $('#suggestions').empty();
                    });
                });
            }
        });
    </script>
</body>

</html>