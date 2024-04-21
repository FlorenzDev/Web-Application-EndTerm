<?php
session_start();
include('../models/db.php');
include('../view/nav-bar-login.php');
include('../controller/userdata.php');
include('../controller/data_to_dashborad.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./dashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <title>Dashboard</title>
</head>
<style>
    .data_dashboard {
        width: 100%;
        margin-bottom: 10vh;
    }

    .feeds {
        background-color: black;
        color: white;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 2vw;
        width: 36vw;
    }

    .medicine {
        background-color: black;
        color: white;
        width: 25vw;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 2vw;
        transform: translateX(0vw);
    }

    .details {
        background-color: black;
        color: white;
        width: 45vw;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
        gap: 1vw;
    }

    .chart-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5vw;
    }

    .spanChart {
        width: 100%;
    }

    .updateFrom-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0vw;
    }


    .card {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 124px;
        border-radius: 30px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 50px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 26px -18px inset;
    }

    .card p {
        margin: 5px 0;
    }

    .data_dashboard {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        width: 80%;

    }

    .Poultry_Data {
        background-color: #e1ecf4;
    }

    .con {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .detailsB {
        background-color: black;
        color: white;
        width: 8vw;
    }

    .sack_icon {
        width: 5vw;
    }

    .record_icon {
        width: 6vw;
    }

    .medi_icon {
        width: 4vw;
    }

    .chickens-container {
        height: 50vh;
        align-items: center;
        justify-content: center;
        background-color: white;
        border-radius: 20px;
        border: 2px solid transparent;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    input {
        background-color: black;
        color: white;
        padding: .15rem .5rem;
        min-height: 40px;
        border-radius: 4px;
        outline: none;
        border: none;
        line-height: 1.15;
        box-shadow: 0px 10px 20px -18px;
        margin-bottom: 0.5vw;
    }

    .sub {
        background: black;
        color: white;
    }

    .form-group {
        display: inline-block;
        margin-right: 20px;
        text-align: center;
    }

    .mortality-on-span {
        width: 5vw;
    }

    .m1 {
        width: 8.2vw;
    }

    .weight {
        width: 20vw;
    }

    .updateFrom-container {
        border: 1px solid black;
        border-radius: 10px;
    }

    .spans-info {
        border: 1px solid black;
    }

    .weight-weeks {
        border: 1px solid black;
        padding: 2vw;
    }

    .moratlityB {
        border: 1px solid black;
        padding: 2vw;
    }

    .message {
        width: 25vw;
        height: 35vh;
        background-color: gray;
        padding: 2vw;
    }

    .input-container {
        width: 100%;
    }

    .feed-input {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 2vw;
    }

    .inputs-message {
        position: absolute;
        transform: translate(35vw, 20vh);
        z-index: 1;
        text-align: justify;
    }

    .show-message-box {
        width: 100%;
        height: 25vh;
    }

    .ToDo {
        width: 40vw;
        height: 30vh;
        position: absolute;
        z-index: 1;
        background-color: gray;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: translate(30vw, 30vh);
    }

    .ToDo-container {}
</style>

<body>

    <div id="inputsMessageContainer">

    </div>
    <div id="inputsMessageToDoList">
    </div>

    <div class="welcome_letter">
        <p>Hello!: <?php echo $row['user_fname'] ?></p>
    </div>
    <?php while ($row = $qry_result->fetch_assoc()) { ?>
        <?php $date_harvest = date('Y-m-d', strtotime($row['Date_arrive'] . ' + 45 days'));
        $total_load = $row['load_amount'];
        $load_per_span = $total_load / 10;
        $spans = array_fill(1, 10, $load_per_span);

        ?>
        <h2>Summary of Load</h2>
        <div class="con">
            <div class="data_dashboard">
                <div class="card details">
                    <img class="record_icon" src="../image//noun-executive-summary-6553284.png">
                    <p>Total Load: <br> <?php echo $row['load_amount']  ?></p>
                    <p>Date Delivered:<br><?php echo $row['Date_arrive'] ?></p>
                    <p>Date Expected Harvest <br> <?php echo $date_harvest ?></p>
                    <p>Supplier Name: <br> <?php echo $row['supplier'] ?></p>
                    <p>Each Spand will hold <br> <?php echo intval($load_per_span) ?></p>
                </div>
                <div class="card detailsB">
                    <p>Name of Handler: <br> <?php echo $row['handler_name'] ?></p>
                </div>
                <div class="card detailsB">
                    <p>Driver: <br> <?php echo $row['driver'] ?></p>
                </div>
                <div class="card detailsB">
                    <p>Poultry Name: <br> <?php echo $row['poultry'] ?></p>
                </div>
                <div class="card feeds">
                    <img class="sack_icon" src="../image/grain-sack-icon.png">
                    <p>Pre-Starter: <br> <?php echo $row['pre_starter'] ?></p>
                    <p>Starter: <br> <?php echo $row['starter'] ?> </p>
                    <p>Grower: <br> <?php echo $row['grower'] ?> </p>
                    <p>Finisher <br> <?php echo $row['finisher'] ?></p>
                </div>
                <div class="card medicine">
                    <img class="medi_icon" src="../image/medical.png">
                    <p>Multimin:<br> <?php echo $row['multimin'] ?></p>
                    <p>B complex:<br> <?php echo $row['b_complex'] ?></p>
                    <p>ADEC:<br> <?php echo $row['ADEC'] ?></p>
                </div>
                <button class="card detailsB" onclick="showInputsMessage()">Send Message</button>
                <button class="card detailsB" onclick="showToDoList()">Create Task</button>

            </div>

        </div>

        <div class="input-container">

            <div>
                <form class="feed-input">
                    <div>
                        <label>Pre-Starter</label><br>
                        <input type="number" name="pre-starter-update">
                    </div>
                    <div>
                        <label>Starter</label><br>
                        <input type="number" name="starter-update">
                    </div>
                    <div>
                        <label>Grower</label><br>
                        <input type="number" name="grower-update">
                    </div>
                    <div>
                        <label>Finisher</label><br>
                        <input type="number" name="finisher-update">
                    </div>

                    <button type="submit">Update</button>
                </form>

            </div>
        </div>
        <p>Poultry details</p>

        <div class="updateFrom-container">
            <div class="weight-weeks">
                <form action="../controller/weight_update.php" method="POST">
                    <?php
                    $data_id = $row['data_id'];
                    $_SESSION['data_id'] = $data_id;
                    ?>
                    <?php
                    include('../controller/weight_peogress.php');
                    while ($row = $qry_result->fetch_assoc()) { ?>
                        <div class="form-group">
                            <label for="week1">Week 1:</label>
                            <input type="number" id="week1" name="week1" value="<?php echo $row['week1'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="week2">Week 2:</label>
                            <input type="number" id="week2" name="week2" value="<?php echo $row['week2'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="week3">Week 3:</label>
                            <input type="number" id="week3" name="week3" value="<?php echo $row['week3'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="week4">Week 4:</label>
                            <input type="number" id="week4" name="week4" value="<?php echo $row['week4'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="week5">Week 5:</label>
                            <input type="number" id="week5" name="week5" value="<?php echo $row['week5'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="week6">Week 6:</label>
                            <input type="number" id="week6" name="week6" value="<?php echo $row['week6'] ?>">
                        </div>
                    <?php } ?>
                    <button class="sub" type="submit">Update Chart</button>
                </form>
            </div>
            <div style="width: 80vw;">
                <canvas id="weightUpdate"></canvas>
            </div>
        </div>
        <p>Mortality Details</p>
        <div class="updateFrom-container">
            <div class="moratlityB">
                <form action="../controller/mortality_update.php" method="POST">
                    <?php include('../controller/mortality_rate.php');
                    while ($row = $mortality_result->fetch_assoc()) { ?>
                        <div class="form-group">
                            <label>Mortality on week 1</label>
                            <input type="number" name="Mweek1" value="<?php echo $row['mortality_week1'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mortality on week 2</label>
                            <input type="number" name="Mweek2" value="<?php echo $row['mortality_week2'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mortality on week 3</label>
                            <input type="number" name="Mweek3" value="<?php echo $row['mortality_week3'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mortality on week 4</label>
                            <input type="number" name="Mweek4" value="<?php echo $row['mortality_week4'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mortality on week 5</label>
                            <input type="number" name="Mweek5" value="<?php echo $row['mortality_week5'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mortality on week 6</label>
                            <input type="number" name="Mweek6" value="<?php echo $row['mortality_week6'] ?>">
                        </div>
                        <button class="sub" type="submit">Update Chart</button>

                    <?php } ?>

                </form>
            </div>
            <div style="width: 80vw;">
                <canvas class="mortality" id="mortalityChart"></canvas>
            </div>
        </div>

        </div>
        <p>Span Details</p>
        <div class="spans-info">
            <form action="../controller/mortality_pre_span_update.php" method="POST">
                <?php
                include('../controller/mortality_pre_span.php');
                while ($row = $mortality_pre_span->fetch_assoc()) { ?>
                    <div class="form-group m1">
                        <label>Mortality on span1</label><br>
                        <input class="mortality-on-span" type="number" name="span1" value="<?php echo $row['span1'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span2</label><br>
                        <input class="mortality-on-span" type="number" name="span2" value="<?php echo $row['span2'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span3</label><br>
                        <input class="mortality-on-span" type="number" name="span3" value="<?php echo $row['span3'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span4</label><br>
                        <input class="mortality-on-span" type="number" name="span4" value="<?php echo $row['span4'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span5</label><br>
                        <input class="mortality-on-span" type="number" name="span5" value="<?php echo $row['span5'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span6</label><br>
                        <input class="mortality-on-span" type="number" name="span6" value="<?php echo $row['span6'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span7</label><br>
                        <input class="mortality-on-span" type="number" name="span7" value="<?php echo $row['span7'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span8</label><br>
                        <input class="mortality-on-span" type="number" name="span8" value="<?php echo $row['span8'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span9</label><br>
                        <input class="mortality-on-span" type="number" name="span9" value="<?php echo $row['span9'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <div class="form-group m1">
                        <label>Mortality on span10</label><br>
                        <input class="mortality-on-span sub" type="number" name="span10" value="<?php echo $row['span10'] ?>" max="<?php echo intval($load_per_span) ?>"><br>
                    </div>
                    <button style="width: 7vw;" type="submit">Update Chart</button>
            </form>

            <div class="continer-chart">

                <div class="chart-container">
                    <div class="spanChart">
                        <canvas id="spanChart"></canvas>
                    </div>
                    <div class="chickens-container">
                        <canvas class="chickens" id="chickens"></canvas>
                    </div>
                </div>
            </div>
        </div>
<?php }
            } ?>
</body>
<script>
    let weight = document.getElementById('weightUpdate').getContext('2d');
    let weightChart = new Chart(weight, {
        type: 'bar',
        data: {
            labels: ['week1', 'week2', 'week3', 'week4', 'week5', 'week6'],
            datasets: [{
                label: 'Weight Progression',
                data: [
                    <?php
                    include('../controller/weight_peogress.php');

                    while ($row = $qry_result->fetch_assoc()) {

                    ?>

                        <?php echo $row['week1'] ?>, <?php echo $row['week2'] ?>, <?php echo $row['week3'] ?>, <?php echo $row['week4'] ?>, <?php echo $row['week5'] ?>, <?php echo $row['week6'] ?>

                    <?php } ?>
                ],
                backgroundColor: [
                    'rgb(0, 255, 0)',
                ]
            }]
        }
    });


    let spanChart = document.getElementById('spanChart').getContext('2d');
    let spanBar = new Chart(spanChart, {
        type: 'bar',
        data: {
            labels: ['Span1', 'Span2', 'Span3', 'Span4', 'Span5', 'Span6', 'Span7', 'Span8', 'Span9', 'Span10'],
            datasets: [{
                label: 'Number of Chickens',
                data: [
                    <?php
                    include('../controller/mortality_pre_span.php');
                    while ($row = $mortality_pre_span->fetch_assoc()) {
                        echo $s1 = $spans[1] - $row['span1'] . ", ";
                        echo $s2 = $spans[2] - $row['span2'] . ", ";
                        echo $s3 = $spans[3] - $row['span3'] . ", ";
                        echo $s4 = $spans[4] - $row['span4'] . ", ";
                        echo $s5 = $spans[5] - $row['span5'] . ", ";
                        echo $s6 = $spans[6] - $row['span6'] . ", ";
                        echo $s7 = $spans[7] - $row['span7'] . ", ";
                        echo $s8 = $spans[8] - $row['span8'] . ", ";
                        echo $s9 = $spans[9] - $row['span9'] . ", ";
                        echo $s10 = $spans[10] - $row['span10'];
                    }
                    ?>
                ]
            }]
        }
    });

    let mortalityChart = document.getElementById('mortalityChart').getContext('2d');
    let mortalityBar = new Chart(mortalityChart, {
        type: 'line',
        data: {
            indexAxis: 'y',
            labels: ['week1', 'week2', 'week3', 'week4', 'week5', 'week6'],
            datasets: [{
                label: 'Mortality Rate',
                data: [
                    <?php include('../controller/mortality_rate.php');
                    while ($row = $mortality_result->fetch_assoc()) {
                    ?>
                        <?php echo $row['mortality_week1'] ?>, <?php echo $row['mortality_week2'] ?>, <?php echo $row['mortality_week3'] ?>, <?php echo $row['mortality_week4'] ?>, <?php echo $row['mortality_week5'] ?>, <?php echo $row['mortality_week6'] ?>
                    <?php } ?>
                ],
                backgroundColor: [
                    'rgb(255, 0, 0)'
                ]
            }]
        }
    });
</script>

<?php
include('../controller/mortality_pre_span.php');
while ($row = $mortality_pre_span->fetch_assoc()) {
    $m1 = $row['span1'] + $row['span2'] + $row['span3'] + $row['span4'] + $row['span5'] + $row['span6'] + $row['span7'] + $row['span8'] + $row['span9'] + $row['span10'];
?>
    <?php
    $totalS = 0;
    include('../controller/mortality_pre_span.php');
    while ($row = $mortality_pre_span->fetch_assoc()) {
        $s1 = is_numeric($spans[1]) ? $spans[1] - $row['span1'] : 0;
        $s2 = is_numeric($spans[2]) ? $spans[2] - $row['span2'] : 0;
        $s3 = is_numeric($spans[3]) ? $spans[3] - $row['span3'] : 0;
        $s4 = is_numeric($spans[4]) ? $spans[4] - $row['span4'] : 0;
        $s5 = is_numeric($spans[5]) ? $spans[5] - $row['span5'] : 0;
        $s6 = is_numeric($spans[6]) ? $spans[6] - $row['span6'] : 0;
        $s7 = is_numeric($spans[7]) ? $spans[7] - $row['span7'] : 0;
        $s8 = is_numeric($spans[8]) ? $spans[8] - $row['span8'] : 0;
        $s9 = is_numeric($spans[9]) ? $spans[9] - $row['span9'] : 0;
        $s10 = is_numeric($spans[10]) ? $spans[10] - $row['span10'] : 0;
        $totalS += $s1 + $s2 + $s3 + $s4 + $s5 + $s6 + $s7 + $s8 + $s9 + $s10;
    }
    ?>
    <script>
        let chicken = document.getElementById('chickens').getContext('2d');
        let chickenChart = new Chart(chicken, {
            type: 'bar',
            data: {
                labels: ['Alive', 'Mortality'],
                datasets: [{
                    label: ["Alive and Mortality"],
                    data: [
                        <?php echo $totalS ?>, <?php echo $m1; ?>,
                    ]
                }]
            }
        });
    </script>
<?php } ?>
<script>
    function showInputsMessage() {
        var inputsMessageContainer = document.getElementById('inputsMessageContainer');
        inputsMessageContainer.innerHTML = `
            <div class="inputs-message">
                <p>Send Message:</p>
                <form class="message" action="../controller/message.php" method="POST">
                    <button onclick="hideInputsMessage()" style="width: 3vw;height: 3vh;">X</button>
                    <div class="show-message-box">
                        <!-- <P></P> -->
                    </div>
                    <input style="width: 82%;" type="text" name="message">
                    <button style="width: 3vw;height: 6vh;">Send</button>
                    <?php $row['data_id'] = $data_id;
                    $_SESSION['data_id'] = $row['data_id']; ?>
                </form>
            </div>
        `;
    }

    function hideInputsMessage() {
        var inputsMessageContainer = document.getElementById('inputsMessageContainer');
        inputsMessageContainer.innerHTML = '';
    }
</script>
<div id="inputsMessageContainer"></div>

<script>
    function showToDoList() {
        var inputsMessageContainer = document.getElementById('inputsMessageContainer');
        inputsMessageContainer.innerHTML = `
            <div id="inputsMessageToDoList">
                <div class="ToDo-container">
                    <div class="ToDo">
                    <form action="../controller/task.php" method="POST">                            <label>Creating Task:</label><br>
                            <input style="width: 30vw;" type="text" name="Todo"><br>
                            <button>Create</button>
                            <button type="button" onclick="hideToDoList()">Close</button>
                            <?php $row['data_id'] = $data_id;
                            $_SESSION['data_id'] = $row['data_id']; ?>
                        </form>
                    </div>
                </div>
            </div>
        `;
    }

    function hideToDoList() {
        var inputsMessageContainer = document.getElementById('inputsMessageContainer');
        inputsMessageContainer.innerHTML = '';
    }
</script>

</script>


</html>