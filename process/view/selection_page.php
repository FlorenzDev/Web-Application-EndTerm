<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .role_button {
        width: 20vw;
        height: 30vh;
        margin: 2vw;
    }

    .form-content {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }
</style>

<body>
    <?php include('./nav-bar-login.php'); ?>
    <div class="form-content">
        <div class="form-container">
            <form action="../controller/selection_process.php?loginOwner=true" method="POST">
                <button class="role_button" value="owner" name="selection">
                    <h1>Owner</h1>
                </button>
            </form>
            <form action="../controller/selection_process.php?loginAssistant=true" method="POST">
                <button class="role_button" value="assistant" name="selection">
                    <h1>Assistant</h1>
                </button>
            </form>
            <form action="../controller/selection_process.php?loginHandler=true" method="POST">
                <button class="role_button" value="handler" name="selection">
                    <h1>Hander</h1>
                </button>
            </form>
        </div>
    </div>



</body>

</html>