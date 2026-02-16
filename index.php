<?php
// Student data stored as an array of associative arrays (object-like)
$students = [
    ["name" => "Bamidele Ronnie-azriel Ifeoluwa", "matric" => "22/0318"],
    ["name" => "Babington-Ashaye Adejare ", "matric" => "22/0158"],
    ["name" => "Bolarinwa David Eniola", "matric" => "22/0019"],
    ["name" => "Azuatalam Chiedu Frank", "matric" => "22/0131"],
    ["name" => "Chigeru Davies Chidera", "matric" => "22/0094"],
    ["name" => "Fatima Musa", "matric" => "CSC/2021/050"],
    ["name" => "Emeka Obi", "matric" => "CSC/2021/055"],
    ["name" => "Grace Udo", "matric" => "CSC/2021/060"],
    ["name" => "Tunde Bakare", "matric" => "CSC/2021/065"],
    ["name" => "Maryam Bello", "matric" => "CSC/2021/070"]
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
        <div class="total-members">Total Members: <?php echo count($students); ?></div>

        <!-- Student cards grid -->
        <div class="cards">
            <?php
            // Loop through students and display each as a card
            foreach ($students as $student) {
            ?>
                <div class="card">
                    <!-- Profile icon (detailed SVG) -->
                    <div class="icon">
                        <!-- Material Design style user icon SVG -->
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="12" cy="8" r="4" fill="#dbeafe"/>
                          <path d="M12 14c-4 0-7 2-7 4.5V21h14v-2.5c0-2.5-3-4.5-7-4.5z" fill="#dbeafe"/>
                          <ellipse cx="12" cy="8" rx="4" ry="4" fill="#2563eb" fill-opacity="0.15"/>
                          <ellipse cx="12" cy="18" rx="7" ry="4.5" fill="#2563eb" fill-opacity="0.10"/>
                        </svg>
                    </div>
                    <div class="name"><?php echo htmlspecialchars($student["name"]); ?></div>
                    <div class="matric">Matric No: <?php echo htmlspecialchars($student["matric"]); ?></div>
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
