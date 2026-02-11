<?php

// Read inputs
$name = trim($_POST["name"] ?? "");
$hours = (float)($_POST["hours"] ?? 0);
$rate = (float)($_POST["rate"] ?? 0);
$deduction = (float)($_POST["deduction"] ?? 0);

// Arrays only (single record)
$employees = [$name];
$hoursWorked = [$hours];
$hourlyRate = [$rate];
$deductions = [$deduction];

function grossPay($h, $r)
{
    return $h * $r;
}
function netPay($g, $d)
{
    return $g - $d;
}

// Compute
$gross = grossPay($hoursWorked[0], $hourlyRate[0]);
$net = netPay($gross, $deductions[0]);

// Basic validation
if ($employees[0] === "" || $hoursWorked[0] <= 0 || $hourlyRate[0] <= 0 || $deductions[0] < 0) {
    die("Invalid input. Please go back and enter valid values.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payslip Result</title>
    <link rel="stylesheet" href="../assets/css/payroll.css" />
</head>

<body>

    <div class="container">
        <h1>Payslip</h1>
        <p class="sub">Payroll calculation result.</p>

        <div class="payslip-card">
            <div class="row">
                <span>Employee Name:</span>
                <b><?php echo htmlspecialchars($employees[0]); ?></b>
            </div>

            <div class="row">
                <span>Hours Worked:</span>
                <b><?php echo number_format($hoursWorked[0], 2); ?></b>
            </div>

            <div class="row">
                <span>Hourly Rate ($):</span>
                <b><?php echo number_format($hourlyRate[0], 2); ?></b>
            </div>

            <div class="row">
                <span>Deduction ($):</span>
                <b><?php echo number_format($deductions[0], 2); ?></b>
            </div>

            <hr>

            <div class="row highlight">
                <span>Gross Pay ($):</span>
                <b><?php echo number_format($gross, 2); ?></b>
            </div>

            <div class="row highlight">
                <span>Net Pay ($):</span>
                <b><?php echo number_format($net, 2); ?></b>
            </div>

            <div class="actions end">
                <a class="link-btn" href="payroll.html">Back to Payroll Form</a>
            </div>
        </div>
    </div>

</body>

</html>