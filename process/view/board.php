<label>Your ID:</label>
<?php $data_id = $row['data_id'];
$_SESSION['data_id'] = $data_id;
?>
<input name="idNum" value="<?php echo $data_id  ?>" placeholder="<?php echo $data_id  ?>" readonly>
<div class="dashboard-container">
    <div class="dashboard">
        <div class="feeds-data">
            <p>Feeds</p>
            <form action="../controller/Farm_data.php" method="POST">
                <label>Pre Starter</label><br>
                <input class="textField feeds" type="number" name="feeds1" placeholder="56"><br>
                <label>Starter</label><br>
                <input class="textField feeds" type="number" name="feeds2"><br>
                <label>Grower</label><br>
                <input class="textField feeds" type="number" name="feeds3"><br>
                <label>Finisher</label><br>
                <input class="textField feeds" type="number" name="feeds4"><br>
        </div>
        <div>
            <div class="dates-container">
                <div>
                    <p>Dates</p>
                    <div class="dates">
                        <label>Load</label>
                        <input class="datesField" type="date" name="load">
                        <label>Harvest</label>
                        <input class="datesField" type="date" name="harvest">
                    </div>
                </div>
            </div>

        </div>
        <div>
            <p>Report</p>
            <div class="repots">

                <p>Username</p>
                <p>Message</p>

            </div>
        </div>


        <div class="mortalityRate-container">
            <div class="mortalityRate">
                <p>Mortality</p>
                <label>Alive</label>
                <input class="textField mortality" type="number" name="alive">
                <label>Mortality</label>
                <input class="textField mortality" type="number" name="mortality"><br>
            </div>
        </div>
        <div class="medicine-container">
            <p class="medicineLabel">medicine1 / medicine2 / medicine3 / medicine4</p>
            <div class="medicine">
                <input class="medicineNum" type="number" name="m1">
                <input class="medicineNum" type="number" name="m2">
                <input class="medicineNum" type="number" name="m3">
                <input class="medicineNum" type="number" name="m4">
            </div>
        </div>
        <div>
            <p style="margin-top: 2vw;">Weight</p>
            <div class="weight-container">
                <input class="weight" type="number" name="weight" placeholder="12">
                <button style="transform: translateX(10vw); margin-top:0.5vw" type="submit">Create Table</button>
            </div>
        </div>
    </div>
</div>