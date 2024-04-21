<?php
session_start();
include('../models/db.php');
include('../view/nav-bar-login.php');
include('../controller/userdata.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Account registration form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }

        h1 {
            margin: 0;
            font-weight: 400;
        }

        h3 {
            margin: 12px 0;
            color: black;
        }

        .main-block {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
        }

        form {
            width: 100%;
            padding: 20px;
        }

        fieldset {
            border: none;
            border-top: 1px solid black;
        }

        .account-details,
        .personal-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .account-details>div,
        .personal-details>div>div {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .account-details>div,
        .personal-details>div,
        input,
        label {
            width: 100%;
        }

        label {
            padding: 0 5px;
            text-align: right;
            vertical-align: middle;
        }

        input {
            padding: 5px;
            vertical-align: middle;
        }

        .checkbox {
            margin-bottom: 10px;
        }

        select,
        .children,
        .gender,
        .bdate-block {
            width: calc(100% + 26px);
            padding: 5px 0;
        }

        select {
            background: transparent;
        }

        .gender input {
            width: auto;
        }

        .gender label {
            padding: 0 5px 0 0;
        }

        .bdate-block {
            display: flex;
            justify-content: space-between;
        }

        .birthdate select.day {
            width: 35px;
        }

        .birthdate select.mounth {
            width: calc(100% - 94px);
        }

        .birthdate input {
            width: 38px;
            vertical-align: unset;
        }

        .checkbox input,
        .children input {
            width: auto;
            margin: -2px 10px 0 0;
        }

        .checkbox a {
            color: #8ebf42;
        }

        .checkbox a:hover {
            color: #82b534;
        }

        .buttonSubmit {
            width: 100%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: black;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .buttonSubmit:hover {
            background: #82b534;
        }

        @media (min-width: 568px) {

            .account-details>div,
            .personal-details>div {
                width: 50%;
            }

            label {
                width: 40%;
            }

            input {
                width: 40%;
            }

            select,
            .children,
            .gender,
            .bdate-block {
                width: calc(60% + 16px);
            }
        }

        .error_message {
            border: 1px solid black;
            width: 20vw;
            height: 10vh;
            text-align: center;
            position: absolute;
            background-color: black;
            color: white;
            padding: 5vw;
        }

        .error_message-container {
            position: absolute;
            transform: translate(35vw, 15vh);
            display: flex;
        }
    </style>
</head>

<body>

    <?php
    $Url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($Url, "createTables=exist") !== false) {
        echo "<div class='error_message-container'>
        <div class='error_message'>
            <b>Sorry can't upload new table at the moment</b>
            <button><a style='color: black;' href='../view/create_tables.php'>OK</a></button>
        </div>
    </div>";
    }

    ?>

    <? $_SESSION['data_id'] = $row['data_id']; ?>

    <div class="main-block">
        <form action="../controller/load_process.php" method="POST">
            <h1>Create New Table</h1>
            <fieldset>
                <legend>
                    <h3>Input Delivery Details</h3>
                </legend>
                <div class="account-details">
                    <div><label>Load</label><input type="number" name="Load" required></div>
                    <div><label>Date Delivered</label><input type="date" name="Delivered" required></div>
                    <div><label>Supplier Name</label><input type="text" name="Supplier" required></div>
                    <div><label>Name of Driver</label><input type="text" name="Driver" required></div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>Inventory</h3>
                </legend>
                <div class="personal-details">
                    <div>
                        <div><label>Pre Starter</label><input type="number" name="pre-starter" required></div>
                        <div><label>Starter</label><input type="number" name="starter" required></div>
                        <div><label>Grower</label><input type="number" name="grower"></div>
                        <div><label>Finisher</label><input type="number" name="finisher" required></div>
                    </div>
                    <div>
                        <div style="transform: translateX(9.7vw);" class="personal-details">
                            <div>
                                <div><label>Multimin</label><input type="number" name="multimin" required></div>
                                <div><label>B Complex</label><input type="number" name="b_complex" required></div>
                                <div><label>A D E C</label><input type="number" name="ADEC"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>handler</h3>
                </legend>
                <div class="account-details">
                    <div><label>Name</label><input type="text" name="Handler-name" required></div>
                    <div><label>Poultry Location</label><input type="text" name="Poultry" required></div>
                </div>
            </fieldset>
            <button class="buttonSubmit" type="submit" href="/">Submit</button>
        </form>
    </div>
</body>

</html>