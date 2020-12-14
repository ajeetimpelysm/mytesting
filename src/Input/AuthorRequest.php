<?php 

namespace App\Input;

class AuthorRequest
{
    public $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name) 
    {
        $this->name = $name;
    }

    public $description;
    
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description) 
    {
        $this->description = $description;
    }

    public $experties;

    public function getExperties()
    {
        return $this->experties;
    }

    public function setExperties($experties) 
    {
        $this->experties = $experties;
    }

}