<?php
// Student data stored in arrays for easy substitution
$student_names = [
    "Adebayo Johnson",
    "Chioma Okafor",
    "Ibrahim Mohammed",
    "Blessing Eze",
    "Samuel Ogunleye",
    "Fatima Musa",
    "Emeka Obi",
    "Grace Udo",
    "Tunde Bakare",
    "Maryam Bello"
];
$student_matrics = [
    "CSC/2021/001",
    "CSC/2021/015",
    "CSC/2021/027",
    "CSC/2021/033",
    "CSC/2021/042",
    "CSC/2021/050",
    "CSC/2021/055",
    "CSC/2021/060",
    "CSC/2021/065",
    "CSC/2021/070"
];
// Semester info
$semester = "2025/2026";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Members & Course Registration</title>
    <!-- Import external CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header section -->
    <div class="header">
        <h1>Group Members & Course Registration</h1>
        <div class="semester">Current Semester – <?php echo $semester; ?></div>
    </div>

    <div class="container">
        <!-- Total members info -->
        <div class="total-members">Total Members: <?php echo count($student_names); ?></div>

        <!-- Student cards grid -->
        <div class="cards">
            <?php
            // Loop through students and display each as a card
            for ($i = 0; $i < count($student_names); $i++) {
            ?>
                <div class="card">
                    <!-- User icon (SVG for accessibility and style) -->
                    <div class="icon">
                        <svg height="60" width="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="8" r="5" fill="#dbeafe"/>
                            <ellipse cx="12" cy="18" rx="8" ry="5" fill="#dbeafe"/>
                        </svg>
                    </div>
                    <div class="name"><?php echo htmlspecialchars($student_names[$i]); ?></div>
                    <div class="matric">Matric No: <?php echo htmlspecialchars($student_matrics[$i]); ?></div>
                    <div class="flip">Click to flip</div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Footer section -->
    <div class="footer">
        &copy; <?php echo date('Y'); ?> – Computer Science Department
    </div>
</body>
</html>
