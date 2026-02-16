<?php
$students = [
    ["name" => "Azuatalam Chiedu Frank", "matric" => "22/0131"],
    ["name" => "Babington-Ashaye Adejare ", "matric" => "22/0158"],
    ["name" => "Bamidele Ronnie-azriel Ifeoluwa", "matric" => "22/0318"],
    ["name" => "Basanya Basirat Abiodun", "matric" => "22/0093"],
    ["name" => "Benjamin Angelo Mfoniso", "matric" => "22/0151"],
    ["name" => "Bolarinwa David Eniola", "matric" => "22/0019"],
    ["name" => "Braimah Olatilewa Eyituoyo", "matric" => "22/0131"],
    ["name" => "Chibuzor Emmanuel Chibuzor", "matric" => "22/0060"],
    ["name" => "Chidinma Ogor Deborah", "matric" => "22/0148"],
    ["name" => "Chigeru Davies Chidera", "matric" => "22/0094"]
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
    <link rel="stylesheet" href="/assets/css/index.css">
</head>
<body>
    <div class="header">
        <h1>Group Members & Course Registration</h1>
        <div class="semester">Current Semester – <?php echo $semester; ?></div>
    </div>

    <div class="container">
        <div class="total-members">Total Members: <?php echo count($students); ?></div>

        <div class="cards">
            <?php foreach ($students as $student) { ?>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        
                        <div class="flip-card-front">
                            <div class="icon">
                                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="12" cy="8" r="4" fill="#dbeafe"/>
                                  <path d="M12 14c-4 0-7 2-7 4.5V21h14v-2.5c0-2.5-3-4.5-7-4.5z" fill="#dbeafe"/>
                                  <ellipse cx="12" cy="8" rx="4" ry="4" fill="#2563eb" fill-opacity="0.15"/>
                                  <ellipse cx="12" cy="18" rx="7" ry="4.5" fill="#2563eb" fill-opacity="0.10"/>
                                </svg>
                            </div>
                            <div class="name"><?php echo htmlspecialchars($student["name"]); ?></div>
                            <div class="matric">Matric No: <?php echo htmlspecialchars($student["matric"]); ?></div>
                            <div class="flip" style="margin-top: auto; font-size: 0.8rem; color: #888;">Click to flip</div>
                        </div>

                        <div class="flip-card-back">
                            <h3>Course Options</h3>
                            <p><?php echo htmlspecialchars($student["name"]); ?></p>
                            
                            <a href="view_courses.php?matric=<?php echo urlencode($student['matric']); ?>" class="course-btn">
                                View Registered Courses
                            </a>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> | Software Engineering Group A-4
    </div>
</body>
</html>