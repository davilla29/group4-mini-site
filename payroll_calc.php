<?php
$names = $_POST["name"] ?? [];
$hours = $_POST["hours"] ?? [];
$rates = $_POST["rate"] ?? [];
$deductions = $_POST["deduction"] ?? [];

// Ensure arrays
if (!is_array($names) || !is_array($hours) || !is_array($rates) || !is_array($deductions)) {
    die("Invalid form submission.");
}

function grossPay($h, $r)
{
    return $h * $r;
}
function netPay($g, $d)
{
    return $g - $d;
}


$validCount = 0;
$payroll = [];

for ($i = 0; $i < count($names); $i++) {
    $name = trim($names[$i] ?? "");
    $h = (float)($hours[$i] ?? 0);
    $r = (float)($rates[$i] ?? 0);
    $d = (float)($deductions[$i] ?? 0);

    if ($name !== "" && $h > 0 && $r > 0 && $d >= 0) {
        $gross = grossPay($h, $r);
        $net = netPay($gross, $d);

        $payroll[] = [
            "name" => $name,
            "hours" => $h,
            "rate" => $r,
            "deduction" => $d,
            "gross" => $gross,
            "net" => $net
        ];

        $validCount++;
    }
}

if ($validCount < 50) {
    echo ("You must enter at least 50 valid employees. Go back and complete the form.");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payroll Result</title>
    <link rel="stylesheet" href="./assets/css/payroll.css" />
</head>

<body>

    <div class="container">
        <h1>Payroll Result</h1>
        <p class="sub">Computed payslip details for employees.</p>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee Name</th>
                        <th>Hours</th>
                        <th>Rate (₦)</th>
                        <th>Deduction (₦)</th>
                        <th>Gross (₦)</th>
                        <th>Net (₦)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($payroll); $i++): ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo htmlspecialchars($payroll[$i]["name"]); ?></td>
                            <td><?php echo number_format($payroll[$i]["hours"], 2); ?></td>
                            <td><?php echo number_format($payroll[$i]["rate"], 2); ?></td>
                            <td><?php echo number_format($payroll[$i]["deduction"], 2); ?></td>
                            <td><?php echo number_format($payroll[$i]["gross"], 2); ?></td>
                            <td><?php echo number_format($payroll[$i]["net"], 2); ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <div class="actions end" style="margin-top:14px;">
            <a class="link-btn" href="payroll.html">Back</a>
        </div>
    </div>

</body>

</html>