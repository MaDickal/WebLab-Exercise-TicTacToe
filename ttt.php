<?php

$players = ["X", "O"];

$current_player_idx = getPlayerIdx();
$player = $players[$current_player_idx];
$next_player_idx = getNextPlayerIdx($current_player_idx);

$board = [
    [null, null, null],
    [null, null, null],
    [null, null, null]
];

$winner = null;


if(isset($_POST['select'])){
    $parts = explode(',', $_POST['select']);
    $board[$parts[0]][$parts[1]] = $player; // sets piece

    if(isset($_POST['board'])) {
        forEach ($_POST['board'] as $rowidx => $row) {
            forEach ($row as $colidx => $col) {
                $board[$rowidx][$colidx] = $col;
            }
        }
    }
}

function debug($val){
    $output = print_r($val, true);
    echo "<pre>". $output ."</pre>";
}

function getCell($row, $col){

    global $board;

    global $winner;

    $val = $board[$row][$col];

    if($board[0][0] == $val && $board[0][1] == $val && $board[0][2] == $val) {
      if($board[0][0] != null && $board[0][1] != null && $board[0][2] != null) {
        $winner = 1;
        return "<h2 align=center style='color:#00FF00'>Player</br>$val</br>Wins!</h2>";
      }
    }

    elseif($board[1][0] == $val && $board[1][1] == $val && $board[1][2] == $val) {
      if($board[1][0] != null && $board[1][1] != null && $board[1][2] != null) {
        $winner = 1;
        return "<h2 align=center style='color:#00FF00'>Player</br>$val</br>Wins!</h2>";
      }
    }

    elseif($board[2][0] == $val && $board[2][1] == $val && $board[2][2] == $val) {
      if($board[2][0] != null && $board[2][1] != null && $board[2][2] != null) {
        $winner = 1;
        return "<h2 align=center style='color:#00FF00'>Player</br>$val</br>Wins!</h2>";
      }
    }

    elseif($board[0][0] == $val && $board[1][0] == $val && $board[2][0] == $val) {
      if($board[0][0] != null && $board[1][0] != null && $board[2][0] != null) {
        $winner = 1;
        return "<h2 align=center style='color:#00FF00'>Player</br>$val</br>Wins!</h2>";
      }
    }

    elseif($board[0][1] == $val && $board[1][1] == $val && $board[2][1] == $val) {
      if($board[0][1] != null && $board[1][1] != null && $board[2][1] != null) {
        $winner = 1;
        return "<h2 align=center style='color:#00FF00'>Player</br>$val</br>Wins!</h2>";
      }
    }

    elseif($board[0][2] == $val && $board[1][2] == $val && $board[2][2] == $val) {
      if($board[0][2] != null && $board[1][2] != null && $board[2][2] != null) {
        $winner = 1;
        return "<h2 align=center style='color:#00FF00'>Player</br>$val</br>Wins!</h2>";
      }
    }

    elseif($board[0][0] == $val && $board[1][1] == $val && $board[2][2] == $val) {
      if($board[0][0] != null && $board[1][1] != null && $board[2][2] != null) {
        $winner = 1;
        return "<h2 align=center style='color:#00FF00'>Player</br>$val</br>Wins!</h2>";
      }
    }

    elseif($board[0][2] == $val && $board[1][1] == $val && $board[2][0] == $val) {
      if($board[0][2] != null && $board[1][1] != null && $board[2][0] != null) {
        $winner = 1;
        return "<h2 align=center style='color:#00FF00'>Player</br>$val</br>Wins!</h2>";
      }
    }

    if(is_null($val)) {
      if($winner == null) {
        return "<input type='submit' value='$row,$col' name='select' />";
      }
    }
    else {
        return "<h1>$val</h1><input type='hidden' name='board[$row][$col]' value='$val' />";
    }
}

function getPlayerIdx(){

    $val = 1;

    if(isset($_POST['player'])){
        $val = intval($_POST['player']);
    }

    return $val;
}

function getNextPlayerIdx($idx){
    global $players;

    $val = $idx;
    $val++;
    if($val >= count($players)) $val = 0;
    return $val;

}

?>

<html>
<head>
    <title>Tic Tac Toe</title>
</head>
<body>
    <form method="POST">
        <input type="hidden" value="<?= $next_player_idx; ?>"  name="player" />
        <table border="1", cellspacing="0" cellpadding="25">
            <tr>
                <td height="112"><?= getCell(0,0); ?></td>
                <td height="112"><?= getCell(0,1); ?></td>
                <td height="112"><?= getCell(0,2); ?></td>
            </tr>
            <tr>
                <td height="112"><?= getCell(1,0); ?></td>
                <td height="112"><?= getCell(1,1); ?></td>
                <td height="112"><?= getCell(1,2); ?></td>
            </tr>
            <tr>
                <td height="112"><?= getCell(2,0); ?></td>
                <td height="112"><?= getCell(2,1); ?></td>
                <td height="112"><?= getCell(2,2); ?></td>
            </tr>
        </table>
    </form>
    <!-- <?= debug($board); ?> -->
    <a href="<?= $_SERVER['PHP_SELF']; ?>"><input type="submit" value="Reset"/></a>
</body>
</html>
