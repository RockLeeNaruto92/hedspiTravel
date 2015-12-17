<?php
  if (isset($error)) echo $error;
  else {
    if ($data = json_decode($result, true))
      echo $this->element("tour_in_index", array("tour" => $data));
    else echo "<h4>$result</h4>";
  }
?>
