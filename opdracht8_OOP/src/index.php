<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht8 - Dice</title>
</head>
<body>

<?php
require_once("../vendor/autoload.php");

use Opdracht8\classes\Game;

$game = new Game();

if (session_status() != PHP_SESSION_ACTIVE) { session_start(); }

if (isset($_SESSION['diceGame'])) {
    $game = $_SESSION['diceGame'];
}
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'start':
            $game->setNumberDice($_POST['numDice']);
            $game->setNumberSides($_POST['sides']);
            $game->setUsername($_POST['player']);
            $game->start();
            $game->rollDice();
            $_SESSION['diceGame'] = $game;
            break;
        case 'lower':
            $game->rollDice();
            if ($game->getTotal() <= $game->getLastTotal()) {
                $game->addScore();
            }
            else {
                $game->end();
            }
            $_SESSION['diceGame'] = $game;
            break;
        case 'higher':
            $game->rollDice();
            if ($game->getTotal() > $game->getLastTotal()) {
                $game->addScore();
            }
            else {
                $game->end();
            }
            $_SESSION['diceGame'] = $game;
            break;
        case 'forfeit':
            $game->end();
            $_SESSION['diceGame'] = $game;
            break;
        case 'reset':
            $game = new Game();
            session_unset();
            session_destroy();
            if (isset($_COOKIE['DiceScores'])) { setcookie("DiceScores", "", time() - 3600, "/"); $_COOKIE['DiceScores'] = "";}
            break;
        default:
            throw new \Exception("Unknown type of action");
    }
}


// var_dump($game);
// echo("<br>");
// echo("<br>");
// var_dump($_POST);
// echo("<br>");
// var_dump($_COOKIE);
// echo("<br>");
// if (session_status() == PHP_SESSION_ACTIVE) { var_dump($_SESSION); }
// echo("<br>");
$game->showHighscoresTable();
?>

<form method="POST" id="diceForm">
    <label for="player">Player: </label>
    <input type="text" id="player" name="player" placeholder="username" required <?php if($game->isActive()) { echo("disabled"); }?> value="<?php echo($game->getUsername());?>">
    <br>
    <label for="sides">Number of Sides per Die:</label>
    <input type="range" id="sides" name="sides" min="2" max="20" value="<?php echo($game->getNumberSides()); ?>" <?php if($game->isActive()) { echo("disabled"); }?>>
    <output for="sides" id="sidesValue"><?php echo($game->getNumberSides()); ?></output>
    <br>
    <label for="numDice">Number of Dice:</label>
    <input type="range" id="numDice" name="numDice" min="2" max="8" value="<?php echo($game->getNumberDice()); ?>" <?php if($game->isActive()) { echo("disabled"); }?>>
    <output for="numDice" id="numDiceValue"><?php echo($game->getNumberDice()); ?></output>
    <br>
    <label for="currScore">Current Score:</label>
    <output for="currScore" id="currScore"><?php echo($game->getScore()); ?></output>
    <br>
    <button type="submit" id="startGame" name="action" value="start" style="display: <?php if($game->isActive()) { echo("none"); } else { echo("inline-block"); }?>;">Start Game</button>
    <button type="submit" id="lowerBet" name="action" value="lower" style="display: <?php if($game->isActive()) { echo("inline-block"); } else { echo("none"); }?>;">Bet Lower or Equal</button>
    <button type="submit" id="higherBet" name="action" value="higher" style="display: <?php if($game->isActive()) { echo("inline-block"); } else { echo("none"); }?>;">Bet Higher</button>
    <button type="submit" id="forfeit" name="action" value="forfeit" style="display: <?php if($game->isActive()) { echo("inline-block"); } else { echo("none"); }?>;">Forfeit</button>
    <button type="submit" id="reset" name="action" value="reset">Reset</button>
</form>
<div style="display: flex; flex-wrap: wrap; width: 408px;">
    <?php echo($game->getDiceDisplay()); ?>
</div>
<script>
    const sidesSlider = document.getElementById('sides');
    const numDiceSlider = document.getElementById('numDice');
    const sidesValue = document.getElementById('sidesValue');
    const numDiceValue = document.getElementById('numDiceValue');

    sidesSlider.addEventListener('input', () => {
        sidesValue.textContent = sidesSlider.value;
    });

    numDiceSlider.addEventListener('input', () => {
        numDiceValue.textContent = numDiceSlider.value;
    });
</script>
</body>
</html>