<?php
  if (isset($error)) return;
?>

<h3>Book tickets</h3>

<?php
  if (isset($contract))
    echo $this->element("book_ticket_form", array("contract" => $contract));
  else echo $this->element("book_ticket_form");
?>
