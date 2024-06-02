<?php
// Popis klubova
$clubs = array(
    "Arsenal",
    "Aston Villa",
    "Bournemouth",
    "Brentford",
    "Brighton & Hove Albion",
    "Chelsea",
    "Crystal Palace",
    "Everton",
    "Fulham",
    "Leeds United",
    "Leicester City",
    "Liverpool",
    "Manchester City",
    "Manchester United",
    "Newcastle United",
    "Nottingham Forest",
    "Southampton",
    "Tottenham Hotspur",
    "West Ham United",
    "Wolverhampton Wanderers"
);

// Sortiraj klubove po abecedi
sort($clubs);

// Paginacija
$items_per_page = 1; 
$total_items = count($clubs);
$total_pages = ceil($total_items / $items_per_page);


$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$current_page = max(1, min($total_pages, $current_page));


$start_index = ($current_page - 1) * $items_per_page;
$end_index = min($start_index + $items_per_page, $total_items);

echo '<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier Liga - Grbovi</title>
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
        <h2 class="text-center my-4">Premier Liga 2022/2023 - Grbovi</h2>
        <div class="row">';

for ($i = $start_index; $i < $end_index; $i++) {
    echo '<div class="col-md-12 text-center mb-4">
            <img src="images/' . strtolower(str_replace(' ', '_', $clubs[$i])) . '.jpeg" alt="' . $clubs[$i] . ' Logo">
            <p>' . $clubs[$i] . '</p>
        </div>';
}

echo '  </div>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">';

// Linkovi za prethodnu stranicu
if ($current_page > 1) {
    echo '<li class="page-item">
            <a class="page-link" href="grbovi.php?page=' . ($current_page - 1) . '" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>';
}

// Linkovi za sve stranice
for ($page = 1; $page <= $total_pages; $page++) {
    echo '<li class="page-item' . ($page == $current_page ? ' active' : '') . '">
            <a class="page-link" href="grbovi.php?page=' . $page . '">' . $page . '</a>
        </li>';
}

// Linkovi za sljedeću stranicu
if ($current_page < $total_pages) {
    echo '<li class="page-item">
            <a class="page-link" href="grbovi.php?page=' . ($current_page + 1) . '" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>';
}

echo '      </ul>
        </nav>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>';
?>
