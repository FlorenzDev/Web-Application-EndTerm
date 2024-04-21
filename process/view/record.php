<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./dashboard.css">
  <link rel="stylesheet" href="./style.css">

  <title>Document</title>
  <style>
    body {
      font-size: 140%;
    }

    h2 {
      text-align: center;
      padding: 20px 0;
    }

    table caption {
      padding: 0.5em 0;
    }

    table.dataTable th,
    table.dataTable td {
      white-space: nowrap;
    }

    .p {
      text-align: center;
      padding-top: 140px;
      font-size: 14px;
    }

    button {
      background-color: white;
      color: black;
      border-radius: 3px;
    }
  </style>
</head>

<body>
  <?php include('../view/nav-bar-login.php') ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
          <caption class="text-center">
            RECORDS OF HARVEST
          </caption>
          <thead>
            <tr>
              <th>Number of heads</th>
              <th>Total weight</th>
              <th>Avarage weight</th>
              <th>Date of harvest</th>
              <th>Driver's name</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
<script>
  $("table").DataTable();
</script>

</html>