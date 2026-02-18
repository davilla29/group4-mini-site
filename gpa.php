<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPA Calculator - Group 4</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/gpa.css">

</head>

<body>
    <header class="site-header">
        <div class="header-inner">
            <h1>GPA Calculator</h1>
            <div class="semester">1st Semester GPA – Group 4 Members</div>
        </div>

        <nav class="navbar">
            <div class="nav-inner">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="payroll.html">Payroll</a></li>
                    <li><a class="active" href="gpa.php">GPA Calculator</a></li>
                    <li><a href="profile.php">Profiles</a></li>
                </ul>
            </div>
        </nav>
    </header>


    <main class="page-wrap">
        <div class="container">

            <h2>1st Semester GPA - Group 4 Members</h2>

            <div class="info">
                <p><strong>Grade Scale:</strong> A = 80-100 (5pts) | B = 60-79 (4pts) | C = 50-59 (3pts) | D = 45-49 (2pts) | E = 40-44 (1pt) | F = Below 40 (0pts)</p>
            </div>

            <?php
            include 'data.php';

            function getGrade($score)
            {
                if ($score >= 80) return 'A';
                if ($score >= 60) return 'B';
                if ($score >= 50) return 'C';
                if ($score >= 45) return 'D';
                if ($score >= 40) return 'E';
                return 'F';
            }

            function getPoints($grade)
            {
                $points = ['A' => 5, 'B' => 4, 'C' => 3, 'D' => 2, 'E' => 1, 'F' => 0];
                return $points[$grade] ?? 0;
            }

            // Handle form submission
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_gpa'])) {
                $studentIndex = intval($_POST['student_index']);

                if (isset($gpaRecords[$studentIndex])) {
                    $updatedScores = [];

                    foreach ($semesterCourses as $index => $course) {
                        if (isset($_POST['score'][$index]) && $_POST['score'][$index] !== '') {
                            $score = floatval($_POST['score'][$index]);
                            $updatedScores[$course['code']] = $score;
                        }
                    }

                    // Update scores
                    $gpaRecords[$studentIndex]['scores'] = $updatedScores;

                    // Save to file
                    $membersExport = var_export($members, true);
                    $coursesExport = var_export($semesterCourses, true);
                    $gpaExport = var_export($gpaRecords, true);
                    $phpOpen = '<' . '?php';
                    $phpClose = '?' . '>';
                    $content = $phpOpen . "\n\$members = " . $membersExport . ";\n\n// 1st Semester Courses\n\$semesterCourses = " . $coursesExport . ";\n\n// GPA Records - Stores only student names and their scores (GPA calculated on the fly)\n\$gpaRecords = " . $gpaExport . ";\n" . $phpClose;
                    file_put_contents('data.php', $content);

                    echo '<div class="info success-msg">GPA updated successfully for ' . htmlspecialchars($gpaRecords[$studentIndex]['name']) . '!</div>';
                }
            }

            // Function to calculate GPA from scores
            function calculateGPA($scores, $courses)
            {
                $totalCredits = 0;
                $totalPoints = 0;

                foreach ($courses as $course) {
                    if (isset($scores[$course['code']]) && $course['credits'] > 0) {
                        $score = $scores[$course['code']];
                        $grade = getGrade($score);
                        $points = getPoints($grade);
                        $totalPoints += $points * $course['credits'];
                        $totalCredits += $course['credits'];
                    }
                }

                return $totalCredits > 0 ? round($totalPoints / $totalCredits, 2) : 0;
            }
            ?>

            <!-- Course Reference Table -->
            <div class="course-reference">
                <h3>Course Reference</h3>
                <table class="ref-table">
                    <tr>
                        <th>Code</th>
                        <th>Course Title</th>
                        <th>Credits</th>
                    </tr>
                    <?php foreach ($semesterCourses as $course): ?>
                        <tr>
                            <td><strong><?php echo $course['code']; ?></strong></td>
                            <td><?php echo $course['title']; ?></td>
                            <td><?php echo $course['credits']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <!-- Student GPA Sections -->
            <div class="students-grid">
                <?php foreach ($gpaRecords as $index => $record):
                    // Calculate GPA on the fly
                    $currentGPA = calculateGPA($record['scores'], $semesterCourses);
                ?>
                    <div class="student-card">
                        <div class="student-header">
                            <h3><?php echo htmlspecialchars($record['name']); ?></h3>
                            <div class="gpa-badge">
                                <span class="gpa-label">GPA</span>
                                <span class="gpa-number"><?php echo $currentGPA; ?></span>
                            </div>
                        </div>

                        <form method="POST" class="student-form">
                            <input type="hidden" name="student_index" value="<?php echo $index; ?>">

                            <table class="student-table">
                                <tr>
                                    <th>Course Code</th>
                                    <th>Score</th>
                                    <th>Grade</th>
                                </tr>
                                <?php
                                foreach ($semesterCourses as $idx => $course):
                                    $score = $record['scores'][$course['code']] ?? '';
                                    $grade = $score !== '' ? getGrade($score) : '';
                                ?>
                                    <tr>
                                        <td><strong><?php echo $course['code']; ?></strong></td>
                                        <td>
                                            <input type="number"
                                                name="score[<?php echo $idx; ?>]"
                                                value="<?php echo $score; ?>"
                                                min="0"
                                                max="100"
                                                step="0.01"
                                                placeholder="0-100">
                                        </td>
                                        <td class="grade-cell">
                                            <?php if ($grade): ?>
                                                <span class="grade-badge grade-<?php echo strtolower($grade); ?>">
                                                    <?php echo $grade; ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                            <div class="student-footer">
                                <input type="submit" name="update_gpa" value="Update GPA">
                            </div>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </main>

    <footer class="site-footer">
        &copy; <?php echo date('Y'); ?> | Software Engineering Group 4 SENG412
    </footer>

</body>

</html>