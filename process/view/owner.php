<?php
session_start();
include('../models/db.php');
include('../view/nav-bar-login-owner.php');
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
        gap: 20px;
        justify-content: center;
        width: 78%;

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
        width: 9vw;
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
        max-width: 190px;
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
</style>

<body>
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
                    <p>Each Spand will hold <br> <?php echo $load_per_span ?></p>
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
            </div>
        </div>
        <div class="updateFrom-container">
            <p>Poultry details</p>
            <p>Mortality Details</p>
            <div style="width: 50vw;">
                <canvas id="weightUpdate"></canvas>
            </div>

            <div style="width: 50vw;">
                <canvas class="mortality" id="mortalityChart"></canvas>
            </div>
        </div>

        </div>
        <p>Span Details</p>
        <div class="spans-info">

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
    ?>

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
echo "Total chicks: " . $totalS;
?>
<?php
include('../controller/mortality_pre_span.php');
while ($row = $mortality_pre_span->fetch_assoc()) {
    $m1 = $row['span1'] + $row['span2'] + $row['span3'] + $row['span4'] + $row['span5'] + $row['span6'] + $row['span7'] + $row['span8'] + $row['span9'] + $row['span10'];
    echo "Mortality: " . $m1;
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

</script>

</html>