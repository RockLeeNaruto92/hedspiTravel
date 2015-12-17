<?php
  if (isset($error)) echo $error;
  else {
    foreach ($result as $tour)
      echo $this->element("tour_in_index", array("tour" => $tour));
  }
?>
