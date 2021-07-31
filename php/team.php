<?php
 
class Team
{
    private $name;
    private $country;
 
    public function __construct($name)
    {
        $this->name = $name;
    }
 
    public function __toString()
    {
        if ($this->country !== NULL)
            return $this->name . ' (' . $this->country . ')';
        else return $this->name;
    }
 
 
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
}

?>
