<?php
// Učitajte JSON datoteku
$json = file_get_contents('top_goal.json');
$data = json_decode($json, true);

echo '<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier Liga - Top Scorers</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Vanjski CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="top_scorer.css">
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
                    <a class="nav-link" href="league_table.php">League Table</a>
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
        <h2 class="text-center my-4">Top 20 Scorers in Premier Liga 2022/2023</h2>
        <table class="top-scorers-table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Player</th>
                    <th>Team</th>
                    <th>Goals</th>
                </tr>
            </thead>
            <tbody>';

foreach($data['top_scorers'] as $scorer) {
    echo '<tr>
            <td>' . $scorer['rank'] . '</td>
            <td>' . $scorer['player'] . '</td>
            <td>' . $scorer['team'] . '</td>
            <td>' . $scorer['goals'] . '</td>
        </tr>';
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
