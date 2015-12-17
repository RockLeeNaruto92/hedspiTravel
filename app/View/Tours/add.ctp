<h3>Create new tour</h3>

<?php
  if (isset($tour)) echo $this->element("tour_form", array("tour" => $tour));
  else echo $this->element("tour_form");
?>
