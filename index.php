<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <title>Time Calculator</title>
</head>
<body style="background-color: #eee">
    <div class="container mt-5 border bg-light w-25 p-4">
        <h1 class="h1 text-center py-3">Time Calculator</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <div class="form-floating mb-2">
                <input type="time" name="timeIn" id="timeIn" class="form-control">
                <label for="timeIn">Enter Time in</label>
            </div>
            <div class="form-floating mb-2">
                <input type="time" name="timeOut" id="timeOut" class="form-control">
                <label for="timeOut">Enter Time out</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">SUBMIT</button>
                <button type="reset" class="btn btn-danger">RESET</button>
            </div>
        </form>

        <?php
        if (isset($_POST['timeIn']) && isset($_POST['timeOut'])){
            $timeIn = $_POST['timeIn'];
            $timeOut = $_POST['timeOut'];

            $startTime = date_create($timeIn);
            $endTime = date_create($timeOut);

            $totalTime = date_diff($startTime, $endTime);
            $totalHours = $totalTime->h;
            $totalMinutes = $totalTime -> i;
            $totalSeconds = $totalTime -> s;

            $timeInFormat = date_format($startTime, 'H:i A');
            $timeOutFormat = date_format($endTime, 'h:i A');

            if (!empty($timeIn) && !empty($timeOut)) {
                echo "SET $timeInFormat, $timeOutFormat, $totalHours, $totalMinutes";
            } else {
                echo "not set";
            }
        } else {
            echo "not yet set";
        }
        ?>

    </div>
</body>
</html>
