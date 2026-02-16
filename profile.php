<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Members - Personal Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>
    <header>
        <h1>Group 4</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="payroll.html">Payroll</a></li>
                <li><a href="gpa.php">GPA Calculator</a></li>
                <li><a href="profile.php">Profiles</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Group Members Profiles</h2>
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
    <footer>
        <p>&copy; 2026 Group 4</p>
    </footer>
</body>
</html>