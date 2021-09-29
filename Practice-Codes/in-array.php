<?php
$people = array("Peter", "Joe", "Glenn", "Cleveland");

if (!in_array("Gwenn", $people))
  {
  echo "Match not found\n";
  }
else
  {
  echo "Match found\n";
  }
  print_r($people);
?>