<?php
require_once 'data.php';

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
                            
                            <button class="course-btn" onclick="openCoursesModal('<?php echo htmlspecialchars($student['name']); ?>', '<?php echo htmlspecialchars($student['matric']); ?>')">
                                View Registered Courses
                            </button>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> | Software Engineering Group A-4
    </div>

    <!-- Courses Modal -->
    <div id="coursesModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeCoursesModal()">&times;</span>
            <div class="modal-header">
                <h2 id="modalStudentName"></h2>
                <p id="modalMatricNo"></p>
            </div>
            <div class="modal-body">
                <h3>📖 Registered Courses (<span id="courseCount">0</span>)</h3>
                <div id="coursesList" class="courses-list"></div>
            </div>
        </div>
    </div>

    <script>
        // Course data from PHP
        const coursesData = <?php echo json_encode($studentCourses); ?>;

        function openCoursesModal(name, matric) {
            const modal = document.getElementById('coursesModal');
            const studentName = document.getElementById('modalStudentName');
            const matricNo = document.getElementById('modalMatricNo');
            const coursesList = document.getElementById('coursesList');
            const courseCount = document.getElementById('courseCount');

            studentName.textContent = name;
            matricNo.textContent = 'Matric No: ' + matric;

            // Get courses for this matric
            const courses = coursesData[matric] || [];
            courseCount.textContent = courses.length;

            // Build courses HTML
            let coursesHTML = '';
            courses.forEach(course => {
                coursesHTML += `
                    <div class="course-item">
                        <span class="course-code">${course.code}</span>
                        <span class="course-title">${course.title}</span>
                    </div>
                `;
            });

            coursesList.innerHTML = coursesHTML;
            modal.style.display = 'block';
        }

        function closeCoursesModal() {
            const modal = document.getElementById('coursesModal');
            modal.style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('coursesModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>