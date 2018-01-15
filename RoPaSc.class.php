<?php

/*
*************  AUTHOR: KEITH SHERRY  *************
*************    DATE: 12/01/2018    *************
*************    RoPaSc.class.php    *************
*/

//! Superclass of all Rock Paper Scissor type weapon Classes.

class RoPaSc{
    //! Describes the type of weapon.
    private $i_am;
    //! Describes what action it can take upon the weapons it can defeat.
    private $action;
    //! List of the other weapons this weapon can defeat.
    private $defeats;
    
    //! Template class requires strings describing the type of weapon, the actions it can, and the list of weapons it can defeat. These are all described in the rules of the game. No 'type' has been given for these parameters, leaving it open for them to be arrays in a game where more than 3 weapon types are involved - e.g. Rock, Paper, Scissors, Lizard, Spock.
    public function __construct($isType, $winsBy, $beatsType){
        $this->i_am = $isType;
        $this->action = $winsBy;
        $this->defeats = $beatsType;
    }
    
    //! No getters or setters are required by rocks paper or scissors, but this allows you to ask what type of weapon any particular object is. Used in testing.
    public function getI_Am(){
        return $this->i_am;
    }

    //! Only one function. In this version, it is set for only 3 weapon types. If the game was expanded, this function could be expanded to search inside the array of objects it can defeat using the built-in array_search() PHP function. In theory, no matter how complex the game in terms of weapons, there can only ever be one of three outcomes - Win, Lose, Draw. Note the entire object is passed in, allowing access to parameters of both the calling object via $this, and the passed in object, via $weapon.
    public function battle($weapon){
        if ($this->i_am == $weapon->i_am){
            return("Both are the same! Draw!");
        }
        elseif($this->defeats == $weapon->i_am){
            return($this->i_am . ' ' . $this->action . ' ' . $this->defeats . '! I win!');
        }
        elseif($weapon->defeats == $this->i_am){
            return($weapon->i_am . ' ' . $weapon->action . ' ' . $weapon->defeats . '! Computer wins!');
        }
    }
}

?>