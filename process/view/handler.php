<?php
session_start();
include('../models/db.php');
$data_id = $_SESSION['data_id'];
$message = $connect->prepare("SELECT user_message FROM message WHERE data_id = ?");
$message->bind_param('i', $data_id);
$message->execute();
$result = $message->get_result();

// Fetch each row as an associative array
$messages = array();
while ($row = $result->fetch_assoc()) {
    $messages[] = $row['user_message'];
}
$data_id = $_SESSION['data_id'];
$task = $connect->prepare("SELECT task_creation FROM task_table WHERE data_id = ?");
$task->bind_param('i', $data_id);
$task->execute();
$result = $task->get_result();

$tasks = array();
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row['task_creation'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .message-box {
        padding: 10px;
        height: 20vh;
        background: black;
        color: white;
    }

    .inbox {
        padding: 10px;
        height: 20vh;
        background: black;
        color: white;
    }

    .app-container {
        display: grid;
        grid-template-columns: 70% 1fr;
        gap: 2vw;
        width: 95%;
    }

    nav {
        width: 95%;
        height: 7vh;
        background-color: black;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 5vw;

    }

    .hero-container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    p {
        font-size: 10px;
    }

    li {
        font-size: 10px;
    }

    body {}

    .logo {
        width: 7vw;
        height: 5vw;
    }

    .logout {
        font-size: 8px;
        margin: 2vw;
    }
</style>

<body>
    <div class="nav-container">
        <nav>
            <div></div>
            <img class="logo" src="../image/white logo.png">
            <form action="../controller/logout_process.php">
                <button class="logout">Logout</button>
            </form>
        </nav>
    </div>
    <div class="hero-container">
        <div class="app-container">
            <div class="message-box">
                <p>To do list:</p>
                <?php foreach ($tasks as $task) {
                    echo "<li>" . $task . "<br>" . "</li>";
                } ?>
            </div>

            <div class="inbox">
                <p>Inbox:</p>
                <p>
                    <?php
                    foreach ($messages as $message) {
                        echo $message . "<br>";
                    }
                    ?>

                </p>
            </div>
        </div>
    </div>


</body>

</html>