<?php
// Učitajte XML datoteku
$xml = simplexml_load_file('tablica.xml') or die("Error: Cannot create object");

echo '<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier Liga - League Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Navigacija -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">League Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="top_scorer.php">Top Scorer</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="grbovi.php">Grbovi</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center my-4">Premier Liga 2022/2023 - League Table</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Team</th>
                    <th>Played</th>
                    <th>Won</th>
                    <th>Drawn</th>
                    <th>Lost</th>
                    <th>Goals For</th>
                    <th>Goals Against</th>
                    <th>Goal Difference</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>';

$position = 1;
foreach($xml->Team as $team) {
    echo '<tr>
            <td>' . $position . '</td>
            <td>' . $team->Name . '</td>
            <td>' . $team->Played . '</td>
            <td>' . $team->Won . '</td>
            <td>' . $team->Drawn . '</td>
            <td>' . $team->Lost . '</td>
            <td>' . $team->GoalsFor . '</td>
            <td>' . $team->GoalsAgainst . '</td>
            <td>' . $team->GoalDifference . '</td>
            <td>' . $team->Points . '</td>
        </tr>';
    $position++;
}

echo '    </tbody>
        </table>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>';
?>
