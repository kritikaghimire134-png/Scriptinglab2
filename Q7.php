<!DOCTYPE html>
<html>
<head>
    <title>Football Points Calculator</title>
</head>

<body>

<h2>Football Team Points Calculator</h2>

<form method="post">

    Wins:
    <input type="number" name="wins" min="0" required>
    <br><br>

    Draws:
    <input type="number" name="draws" min="0" required>
    <br><br>

    Losses:
    <input type="number" name="losses" min="0" required>
    <br><br>

    <input type="submit" name="submit" value="Calculate">

</form>

<?php

function calculatePoints($wins, $draws, $losses)
{
    return ($wins * 3) + ($draws * 1) + ($losses * 0);
}

if (isset($_POST['submit'])) {

    $wins = filter_input(
        INPUT_POST,
        'wins',
        FILTER_VALIDATE_INT
    );

    $draws = filter_input(
        INPUT_POST,
        'draws',
        FILTER_VALIDATE_INT
    );

    $losses = filter_input(
        INPUT_POST,
        'losses',
        FILTER_VALIDATE_INT
    );

    if (
        $wins === false || $wins === null ||
        $draws === false || $draws === null ||
        $losses === false || $losses === null ||
        $wins < 0 ||
        $draws < 0 ||
        $losses < 0
    ) {

        echo "<p>Please enter valid non-negative values.</p>";

    } else {

        $totalGames = $wins + $draws + $losses;

        $totalPoints = calculatePoints(
            $wins,
            $draws,
            $losses
        );

        echo "<h3>Result</h3>";

        echo "Wins = " . $wins . "<br>";
        echo "Draws = " . $draws . "<br>";
        echo "Losses = " . $losses . "<br>";
        echo "Total Games Played = " . $totalGames . "<br>";
        echo "Total Points = " . $totalPoints;
    }
}

?>

</body>
</html>