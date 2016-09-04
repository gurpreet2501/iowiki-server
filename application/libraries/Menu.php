<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu {

public static function coding(){
    return  array(
      'Php' =>  5 ,
      'Javascript' => 8 ,
      'Shell Scripting' => 16 ,
      'Python' => 6  ,
      'iOS' => 7 ,
      'AngularJs' => 9,
      'NodeJs' =>   10,
      
     );
     
  }

  public static function networks(){
    return  array(
      'Cloud' =>  18,
      'Collaboration' => 15 ,
      'Shell Scripting' => 16,
      'Linux' => 7,
      'Routing' => 11,
      'Switching' => 12,
      'MPLS' => 14,
      'Security' => 13,
      'Virtualization' => 17,
     );
     
  }
}
