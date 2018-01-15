<!DOCTYPE html>
<html>
    
    <head>
        <title>Rock Paper Scissors</title>
        <meta name="description" content="BSc2017 Assessment 1.">
    </head>
    <body>
        <h1>Rock Paper Scissors<br></h1>

        <?php
            include_once "RoPaSc.game.class.php";
            include_once "RoPaSc.Rules.class.php";
            $roshambo    = new RoPaScGame();
            $playerRules = new RoPaScRules();
                    
        ?>
        
        1) Select a Rock Paper Scissors weapon from the dropdown. <br>
        2) Click the button! The computer randomly selects a weapon, and the result of the battle is given below! <br>
        3) Either select another, or refresh the page to keep the same selection, and let the computer choose another.<p>
        For Developer help (will open in new page), click  <a href="html/index.html" target="_blank">here!</a> 
        
        <form action="index.php" method="get">
            <strong><font color="red""> Choose your weapon >></strong></font> <select id="weapons" name="weapon" >
                <?php
                    foreach($playerRules::ARMOURY as $value){
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Play Rock Paper Scissors!">
        </form>  

        <p>
        <?php
            /*!
            Now for the procedural part (there's always one!). The HTML Form sends through GET to the same file (for now - option to change). From then on, there is a sequence to running the game. There are a few steps that need to be taken in order, and this could either be put into a large runGame() type function.
            */
            $player1Choice = $_GET["weapon"];
            
            if($player1Choice != "None"){
                $roshambo->setPlayer1Weapon($player1Choice); 

                $roshambo->createPlayer1();
                print('<strong>Your Weapon: </strong>' . $roshambo->getPlayer1Weapon() . '<br>');


                $roshambo->setPlayer2Weapon($playerRules->createRandomWeapon());

                $roshambo->createPlayer2();
                print("<strong>The Computer's Weapon: </strong>" . $roshambo->getPlayer2Weapon() . '<br>');

                print("<p><strong>" . $roshambo->getBattleOutcome() . "</strong></p>");
            }
        ?>                
    </body>
