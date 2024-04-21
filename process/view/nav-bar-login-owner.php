<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</html>
<link rel="stylesheet" type="text/css" href="./style.css" />
<title>Document</title>
</head>
<style>
    .nav-logo-login {
        width: 6vw;
        object-fit: cover;
        position: absolute;
    }

    .logo-locaation {
        display: flex;
        justify-content: center;
        align-items: center;
        transform: translateY(4vh);
    }
</style>

<body>
    <div class="nav-container">
        <div class="nav_bar">
            <div class="logo-locaation">
                <img class="nav-logo-login" src="../image//white logo.png" />
            </div>
            <ul>
                <form action="../controller/logout_process.php">
                    <button>logout</button>
                </form>
            </ul>
        </div>
    </div>
</body>