<?php

/*
*************  AUTHOR: KEITH SHERRY  *************
*************    DATE: 13/01/2018    *************
************* RoPaSc.rules.class.php *************
*/


include_once "RoPaSc.class.php";

/*! 
Game rules for Rock Paper Scissor class to adhere to. Rock blunts Scissors. Scissors cuts Paper. Paper covers Rock. Mathematically, if there are n number of weapons always an odd number, or the game doesn't work), then weapon 1 can defeat all the weapons up to (n+1)/2. The array for each weapon would only carry the names of the weapons it could defeat, plus the action it carries out to inflict defeat, so, (n+1)/1 * 2. This could be achieved using key / value pairs in an associative array.
*/

class RoPaScRules{
                                //! This is the master array used for correct naming of weapons. If time allows, will migrate this into the action / defeats list below as named, associated array.
    const ARMOURY = array("None", "Rock", "Paper", "Scissors"); 
    
                                //! Changing the values in this one place will affect any weapon objects generated. If the game was exanded beyond 3 weapons, this could turn into an associative array, with key value / pairs for the actions and defeats, with associated change in the RoPaSc class to accept the pairs directly.
    private $rockAction      = "blunts";
    private $rockDefeats     = self::ARMOURY[3];
    private $paperAction     = "covers";
    private $paperDefeats    = self::ARMOURY[1];
    private $scissorsAction  = "cuts";
    private $scissorsDefeats = self::ARMOURY[2];
    private $randomWeapon    = "None";
    
                                //! Function takes name of chosen weapon, and constructs the correct weapon from the RoPaSc class. 
    public function createWeapon($weaponType){
        switch($weaponType){
            case self::ARMOURY[1]: {
                return(new RoPaSc($weaponType, $this->rockAction, $this->rockDefeats));
                break;
            }
            case self::ARMOURY[2]: {
                return(new RoPaSc($weaponType, $this->paperAction, $this->paperDefeats));
                break;
            }
            case self::ARMOURY[3]: {
                return(new RoPaSc($weaponType, $this->scissorsAction, $this->scissorsDefeats));
                break;
            }
        }
        
    }
                                //! This function returns the name of a random weapon for use by Player 2 - the computer.
    public function createRandomWeapon(){
        $this->randomWeapon = self::ARMOURY[rand(1,3)];
        return($this->randomWeapon);
    }
}

//TESTING
/*
$rules = new RoPaScRules();

$player1 = $rules->createWeapon($rules::ARMOURY[0]);

print('Player 1: ' . $player1->getI_Am() . '<br>');

$player2 = $rules->createWeapon($rules::ARMOURY[2]);
print('Player 2: ' . $player2->getI_Am() . '<br>');

print($player1->battle($player2) . "<br>");
echo "<p>";

print('Armoury: ' . $rules::ARMOURY[1]);    
*/  

?>