<?php

class Mac extends CI_Model{

	function get_mac(){
      // Turn on output buffering
      ob_start();
      //Get the ipconfig details using system commond
      system('ipconfig /all');
      // Capture the output into a variable
      $mycom=ob_get_contents();
      // Clean (erase) the output buffer
      ob_clean();
      ob_end_flush();
      $findme = "Physical";
      //Search the "Physical" | Find the position of Physical text
      $pmac = strpos($mycom, $findme);
      // Get Physical Address
      $mac=substr($mycom,($pmac+36),17);

       
      //return Mac Address
      return $mac;
   }
} 