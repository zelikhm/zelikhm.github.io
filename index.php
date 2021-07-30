<?php
class Team {

private $name;
private $country;

function __construct($arg){

$this->name = $arg['name'];
$this->country = $arg['country'];

}

function getCountry() {
return $this->name;
}
}

$question_array = [
'name' => 'Барселона',
'country' => 'Испания',
];

$Team1 = new Team($question_array);
echo $Team1->getCountry();

?>
