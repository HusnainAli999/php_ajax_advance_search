<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        overflow-x: hidden;
    }

    .main-selectbox-div {
        margin-left: 10px;
    }


    .range-input-container {
        position: relative;
    }

    #min_customRange,
    #max_customRange {
        width: 200px;
        margin-bottom: 10px;
        -webkit-appearance: none;
        background: dodgerblue;
        background-size: 100% 10px, 100%;
        border: none;
        padding-left: 5px;
        padding-right: 5px;
        height: 25px;
        border-radius: 10px;
        transition: all 0.3s;
    }

    #min_customRange:hover,
    #max_customRange:hover {
        background-color: greenyellow;
        transform: scale(2);
        box-shadow: 10px 10px 30px gray;
    }

    #min_customRange:hover {
        transform: translateX(-10px) scale(1.1);
    }

    #max_customRange:hover {
        transform: scale(1.1) translateX(10px);
    }

    #min_customRange::-webkit-slider-thumb,
    #max_customRange::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 15px;
        height: 15px;
        background-color: white;
        border-radius: 50%;
        cursor: pointer;
    }

    #min_customRange::-moz-range-thumb,
    #max_customRange::-moz-range-thumb {
        width: 15px;
        height: 15px;
        background-color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
    }

    .range-value {
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    #gender,
    #price,
    #country {
        width: 200px;
        height: 30px;
        color: white;
        line-height: 30px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    #select-gender-div,
    #select-price-div,
    #select-country-div {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        background: transparent;
        margin-bottom: 10px;
        width: 200px;
        display: none;
    }

    #select-gender-div button,
    #select-price-div button,
    #select-country-div button {
        color: white;
        padding: 10px;
        width: 200px;
        border: none;
        border: 1px solid white;
        background: linear-gradient(90deg, rgba(0, 61, 255, 1) 17%, rgba(157, 0, 255, 1) 74%);
        cursor: pointer;
        transition: all 0.3s;
    }

    #select-gender-div button:hover {
        background: blue;
        color: white;
    }

    #gender-btn,
    #price-btn,
    #country-btn {
        width: 200px;
        height: 38px;
        background: linear-gradient(90deg, rgba(0, 61, 255, 1) 17%, rgba(157, 0, 255, 1) 74%);
        color: white;
        cursor: pointer;
        border: none;
        outline: none;
    }

    #searchForm {
        width: 90%;
        padding: 20px;
        background: white;
        box-shadow: 10px 10px 30px gray;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        margin-top: 30px;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
    }

    .top_h1 {
        background: black;
        color: white;
        padding: 20px;
        width: 100vw;
        margin-bottom: 20px;
    }

    #searchForm label {
        display: inline-block;
        padding: 10px 10px 10px 0px;
    }

    #searchForm input[type="date"] {
        width: 200px;
        padding: 5px;
    }

    #searchForm input[type="text"],
    input[type="number"] {
        padding: 10px;
        width: 200px;
        background: black;
        color: white;
        border: none;
        outline: none;
        margin-left: 10px;
    }

    #submit_search {
        background: green;
        color: white;
        padding: 10px;
        width: 200px;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .checkboxes_div {
        margin-top: 10px;
    }

    .checkboxes_and_price_range_div {
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    #select_colors_open_div_btn {
        background: linear-gradient(90deg, rgba(0, 61, 255, 1) 17%, rgba(157, 0, 255, 1) 74%);
        color: white;
        padding: 5px 10px 5px 10px;
        border: none;
        outline: none;
        cursor: pointer;
        position: absolute;
        margin: -3px 0px 0px 20px;
    }

    .select_colors_main_div {
        background: white;
        box-shadow: 10px 10px 30px gray;
        padding: 10px;
        position: absolute;
        opacity: 0;
        transition: all 0.4s;
        z-index: -1;
    }

    .product_inner_div {
        width: 90%;
        padding: 20px;
        background: #000000;
        box-shadow: 10px 10px 30px gray;
        border-radius: 10px;
        color: white;
        margin-top: 20px;
        margin-left: 10px;
    }

    .product_inner_div div {
        padding-top: 10px;
    }

    .result_h2 {
        margin: 30px 30px;
    }

    .min_max_price_range_div .range-input-container {
        display: flex;
    }

    #max_customRange {
        margin-left: 10px;
    }

    #suggestions {
        width: 200px;
        background: dodgerblue;
        color: white;
        position: relative;
        left: 10px;
        overflow-y: auto;
    }

    #suggestions li {
        text-decoration: none;
        padding-bottom: 5px;
        padding-top: 5px;
        transition: all 0.3s;
        padding-left: 10px;
    }

    #suggestions li:hover {
        background-color: lightgreen;
        cursor: pointer;
    }

    #add_colors_search_form {
        width: 250px;
        position: relative;
        left: 80%;
        top: 20px;
        background: white;
        box-shadow: 10px 10px 30px gray;
        height: 200px;
        padding: 10px;
    }

    #add_colors_search_form select {
        width: 200px;
        padding: 5px;
    }

    #add_colors_search_form button[type="submit"] {
        background: green;
        color: white;
        width: 150px;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px;
        margin-top: 20px;
    }
</style>