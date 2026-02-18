<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Members - Personal Details</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="assets/css/profile.css">
</head>

<body>
    <header class="site-header">
        <div class="header-inner">
            <h1>Group Members Profiles</h1>
            <div class="semester">Group 4 Members</div>
        </div>

        <nav class="navbar">
            <div class="nav-inner">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="payroll.html">Payroll</a></li>
                    <li><a href="gpa.php">GPA Calculator</a></li>
                    <li><a class="active" href="profile.php">Profiles</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="profile-container">
            <?php
            include 'data.php';

            foreach ($members as $member) {
                echo '<div class="profile-card">';
                echo '<h3>' . htmlspecialchars($member['name']) . '</h3>';
                echo '<p><strong>Blood Group:</strong> ' . htmlspecialchars($member['bloodGroup']) . '</p>';
                echo '<p><strong>State of Origin:</strong> ' . htmlspecialchars($member['stateOfOrigin']) . '</p>';
                echo '<p><strong>Phone Number:</strong> ' . htmlspecialchars($member['phoneNumber']) . '</p>';
                echo '<p><strong>Hobbies:</strong></p>';
                echo '<ul>';
                foreach ($member['hobbies'] as $hobby) {
                    echo '<li>' . htmlspecialchars($hobby) . '</li>';
                }
                echo '</ul>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
    <footer class="site-footer">
        &copy; <?php echo date('Y'); ?> | Software Engineering Group 4 SENG412
    </footer>

</body>

</html>