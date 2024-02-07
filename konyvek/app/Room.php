<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room
{  	 protected $people = [];


  public function __construct($people = [])
  {
    $this->people = $people;
  }


  public function has($person)
  {
    return in_array($person, $this->people);
  }
 
  public function add($person)
  {
    array_push($this->people, $person);
    return $this->people;
  }
 
  public function remove($person)
  {
if (($key = array_search($person, $this->people)) !== false) 
      		unset($this->people[$key]);
      return $this->people;
  }


  public function takeOne()
  {
      return array_shift($this->people);
  }
}

