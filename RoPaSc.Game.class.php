<?php

/*
*************  AUTHOR: KEITH SHERRY  *************
*************    DATE: 13/01/2018    *************
************* RoPaSc.game.class.php *************
*/


include_once "RoPaSc.rules.class.php";

class RoPaScGame{
    public $debug = FALSE;
                                //! The name of each chosen weapon is needed to instantiate an object of that kind.
    private $player1Weapon = "None";
                                //! The name of each chosen weapon is needed to instantiate an object of that kind.
    private $player2Weapon = "None";
    
                                //! Each player is an object created from the RoPaSc (Rock Paper Scissors) class.
    private $player1;
                                //! Each player is an object created from the RoPaSc (Rock Paper Scissors) class.
    private $player2;
    
                                //! Game constructor instantiates a Rules object, that allows access to how a weapon is constructed and which other weapons it can defeat and how.
    public function __construct(){
        $this->rules = new RoPaScRules;
        if($this->debug == TRUE){
            print("Rules constructed!<br>");
        }
    }
    
                                //! Setter for player1Weapon. The name is passed to the function, and should come from the master array of weapons in RoPaScRules class.
    public function setPlayer1Weapon($player1WeaponName){
        $this->player1Weapon = $player1WeaponName;
        if($this->debug == TRUE){
            print("Player 1 Weapon set to $this->player1Weapon.<br>");
        }
    }
                                //! Setter for player2Weapon. The name is passed to the function, and should come from the master array of weapons in RoPaScRules class.
    public function setPlayer2Weapon($player2WeaponName){
        $this->player2Weapon = $player2WeaponName;
        if($this->debug == TRUE){
            print("Player 2 Weapon set to $this->player2Weapon.<br>");
        }
    }

                                //! Generate player1. Uses the rules object to create a full player from the weapon name.
    public function createPlayer1(){
        if($this->debug == TRUE){
            print("In createPlayer1(), looking to make a full weapon from Player2: $this->player1Weapon <br>");
        }
        if($this->player1Weapon != 'None'){
            $this->player1 = $this->rules->createWeapon($this->player1Weapon);
        } else{
            (print("Error! No weapon has been chosen by Player 1!"));    
        }
    }

                                    //! Generate Player 2 (the computer). This started off as a much different function, but was badly written. By converting the players into an array of players, this could be refactored so that the same function was used for creating both players, passing in the array index to determine the correct result. 
    public function createPlayer2(){
        if($this->debug == TRUE){
            print("In createPlayer2(), looking to make a full weapon from Player2: $this->player2Weapon <br>");
        }
        if($this->player2Weapon != 'None'){
            $this->player2 = $this->rules->createWeapon($this->player2Weapon); // This has changed - test it!
        } else{
            (print("Error! No weapon has been chosen by Player 2!<br>"));    
        }
    }
    
                                //! Just returns the name of the player weapon. Used primarily as test scaffolding.
    public function getPlayer1Weapon(){
        return($this->player1Weapon);
    }

                                //! Just returns the name of the player weapon. Used primarily as test scaffolding.    
    public function getPlayer2Weapon(){
        return($this->player2Weapon);
    }


                                //! Outcome to be sent back to index page.
    public function getBattleOutcome(){
        return($this->player1->battle($this->player2)); //This has changed. Test!
    }

}

?>