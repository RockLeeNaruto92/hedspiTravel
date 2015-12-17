<div class="article">
  <h3><?= $tour["id"] ?></h3>
  <div class="img">
    <img src="/images/img1.jpg" width="198" height="208" alt="website template image" class="fl">
  </div>
  <div class="post_content">
    <p>
      <span><strong>Place ID: </strong></span>
      <?= $tour["place_id"] ?>
    </p>
    <p>
      <span><strong>Start date: </strong></span>
      <?= $tour["start_date"] ?>
    </p>
    <p>
      <span><strong>Number of tikets: </strong></span>
      <?= $tour["tickets"] ?>
    </p>
    <p>
      <span><strong>Available tickets: </strong></span>
      <?= $tour["available_tickets"] ?>
    </p>
    <p>
      <span><strong>Cost: </strong></span>
      <?= $tour["cost"] ?>
    </p>
    <p>
      <span><strong>Description: </strong></span>
      <?= $tour["description"] ?>
    </p>
  </div>
</div>
