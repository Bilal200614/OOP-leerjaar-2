<?php
    namespace Opdracht8\classes;

    use Opdracht8\classes\Dice;

    class Game {
        private array $dice;
        private int $numberDice = 2;
        private int $numberSides = 6;
        private bool $isActive = false;
        private int $score = 0;
        private string $username = "";
        private int $total = 0;
        private int $lastTotal = 0;
        private string $diceDisplay = "";

        public function start() {
            $this->isActive = true;
            $this->dice = Array();
            Dice::setNumberSides($this->numberSides);
            for ($i=0; $i < $this->numberDice; $i++) { 
                $this->dice[] = new Dice();
            }
        }

        public function end() {
            $this->updateHighscore();
            $this->isActive = false;
            $this->score = 0;
            $this->lastTotal = 0;
        }

        public function rollDice() {
            Dice::setNumberSides($this->numberSides);
            $this->lastTotal = $this->total;
            $this->total = 0;
            $this->diceDisplay = "";
            foreach ($this->dice as $die) {
                $die->rollDice();
                $this->total += $die->getFaceValue();
                $this->diceDisplay .= Dice::getFaceSVG($die->getFaceValue());
            }
        }

        public function setNumberSides(int $pNumberSides) {
            $this->numberSides = $pNumberSides;
        }

        public function setNumberDice(int $pNumberDice) {
            $this->numberDice = $pNumberDice;
        }

        public function setUsername(string $pUsername) {
            $this->username = $pUsername;
        }

        public function updateHighscore() {
            $scoresData = [];
            if (isset($_COOKIE['DiceScores'])) {
                $scoresData = unserialize($_COOKIE['DiceScores']);
            }
        
            $scoresData[] = [$this->username, $this->score];
            usort($scoresData, function($a, $b) {
                return $b[1] - $a[1];
            });
        
            $scoresData = array_slice($scoresData, 0, 10); // Keep top 10 scores
        
            setcookie('DiceScores', serialize($scoresData), time() + (86400 * 30), "/"); // keep for 30 days
            $_COOKIE['DiceScores'] = serialize($scoresData);
        }

        public function addScore() {
            $this->score++;
        }

        public function getNumberSides() {
            return $this->numberSides;
        }

        public function getNumberDice() {
            return $this->numberDice;
        }

        public function isActive() {
            return $this->isActive;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getTotal() {
            return $this->total;
        }

        public function getlastTotal() {
            return $this->lastTotal;
        }

        public function getScore() {
            return $this->score;
        }
        
        public function getDiceDisplay() {
            return $this->diceDisplay;
        }

        public static function showHighscoresTable() {
            $scores = '<h2>Highscores:</h2><table border="1"><thead><tr><th>Username</th><th>Score</th></tr></thead><tbody>';
        
            if (isset($_COOKIE['DiceScores']) && $_COOKIE['DiceScores'] != "") {
                $scoresData = unserialize($_COOKIE['DiceScores']);
                foreach ($scoresData as $score) {
                    $username = htmlspecialchars($score[0]);
                    $scoreValue = htmlspecialchars($score[1]);
                    $scores .= "<tr><td>$username</td><td>$scoreValue</td></tr>";
                }
            }
            $scores .= '</tbody></table><br>';
            echo $scores;
        }
        
    }
?>