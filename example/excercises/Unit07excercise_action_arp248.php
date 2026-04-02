<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Unit 7 In Class Excercise Action arp248</title>
    </head>
    <body>
        <h1>my bowling team</h1>
        <h4>name: Xander Puchalski</h4>
        <h4>UCID: arp248</h4>
        <h4>course and section : it202 internaet applications</h4>

        <?php
        error_log('$_GET ' . print_r($_GET, true));
        $db = getDB();
        $bowlerid = $_GET['bowlerid'];
        $query = "SELECT * FROM games_arp248 JOIN bowlers_arp248 ON games_arp248.bowlerid = bowlers_arp248.bowlerid WHERE games_arp248.bowlerid = $bowlerid";
        $result = $db->query(query: $query);
        if ($result == false) {
            echo "ERROR:" . $db->errno . ' ' . $db->error;
        }
        $db->close();
        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
        ?>
            <p><u><b>Bowler Information</b></u><br>
                ID: <?php echo $row['bowlerid']; ?><br>
                Name: <?php echo $row['name']; ?><br>
                Address: <?php echo $row['address']; ?><br>
                Phone Number: <?php echo $row['phone']; ?></p>
            <table>
                <caption style="white-space: nowrap;"><u><b>Game Information</b></u></caption>
                <tr>
                <th>Game</th>
                <th>Score</th>
                </tr>
                <?php
                do {
                ?>
                <tr>
                    <td><?php echo $row['gameid']; ?></td>
                    <td><?php echo $row['score']; ?></td>
                </tr>
            <?php
                } while ($row = $result->fetch_array(MYSQLI_ASSOC));
                ?>
            </table>
        <?php
            } else {
            echo "<h2>There are no scores for this bowlerid</h2>\n";
            }
            if ($result) {
            echo "<h2>New game's score successfully displayed</h2>\n";
            } else {
            echo "<h2>Sorry, there was a problem displaying that bowler's games</h2>\n";
            }
            date_default_timezone_set("America/New_York");
            echo "The date and time is " . date("D M j h:i:sa T Y");
        ?>
    </body>    
</html>