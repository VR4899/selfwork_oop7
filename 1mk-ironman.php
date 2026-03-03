<?php
//require - attack - a
require('a-laser.php');
require('a-missili.php');
require('a-raggiorepulsore.php');

//require - defence - d
require('d-armaturainvisibile.php');
require('d-parataveloce.php');
require('d-scudoenergetico.php');

//require - move - m
require('m-camminataveloce.php');
require('m-velocitasupersonica.php');
require('m-volo.php');

class IronManMk1{
    public $attack; 
    public $defence;
    public $move;
    public static $counter = 0;
    
    public function __construct(Attack $attack , Defence  $defence , Move $move){
        $this->attack=$attack;
        $this->defence=$defence;
        $this->move=$move;

        self::$counter++;

    }

     public function IronmanAttack(){
        $this->attack->attack();
    }
    public function IronmanDefence(){
        $this->defence->defence();
    }
    public function IronmanMove(){
        $this->move->move();
    }
}

$ironman = new IronManMk1(new Laser() , new ScudoEnergetico() , new Volo());

var_dump($ironman);


$ironman->IronmanAttack();


$ironman->IronmanDefence();


$ironman->IronmanMove();

echo IronManMk1::$counter . "\n";

$ironman = new IronManMk1(new Missili() , new ArmaturaInvisibile() , new CamminataVeloce());

$ironman->IronmanAttack();


$ironman->IronmanDefence();


$ironman->IronmanMove();

echo IronManMk1::$counter . "\n";
