<!DOCTYPE html>
<html>
    <head><title>Unit 7 In Class Excercise arp248</title></head>
    <body>
        <h1>My bowling team</h1>
        <h4>name: Xander Puchalski</h4>
        <h4>UCID: arp248</h4>
        <h4>course and section : it202 internaet applications</h4>
        <form name="games" action="Unit07excercise_action_arp248.php" method="get">
            <label>bowler id</label>
            <input type="text" name="bowlerid">
            <br><br>
            <input type="submit">
    </form> 
    <br>
    <?php
    date_default_timezone_set("America/New_York");
    echo "Current date and time: " . date("Y-m-d H:i:s");
    ?>
    </body>
</html>