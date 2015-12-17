<form class="form-horizontal" role="form" method="post"
  action="/tickets/create">
  <div class="form-group">
    <label class="control-label col-sm-4" for="tour_id"><strong>Tour:</strong></label>
    <div class="col-sm-8">
      <select id="tour_id" name="tour_id" class="form-control">
        <?php
          foreach ($tours as $tour){
            if (isset($contract) && $contract["tour_id"] == $tour["id"])
              echo "<option selected value='" . $tour["id"] . "'>". $tour["id"] ."</option>";
            else
              echo "<option value='" . $tour["id"] . "'>". $tour["id"] ."</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="flight_id"><strong>Flight:</strong></label>
    <div class="col-sm-8">
      <select id="tour_id" name="flight_id" class="form-control">
        <?php
          foreach ($flights as $flight){
            if (isset($contract) && $contract["flight_id"] == $flight["id"])
              echo "<option selected value='" . $flight["id"] . "'>". $flight["name"] . " - " . $flight["id"] ."</option>";
            else
              echo "<option value='" . $flight["id"] . "'>". $flight["name"] . " - " . $flight["id"] ."</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="hotel_id"><strong>Hotel:</strong></label>
    <div class="col-sm-8">
      <select id="tour_id" name="hotel_id" class="form-control">
        <?php
          foreach ($hotels as $hotel){
            if (isset($contract) && $contract["hotel_id"] == $hotel["id"])
              echo "<option selected value='" . $hotel["id"] . "'>". $hotel["name"] . "</option>";
            else
              echo "<option value='" . $hotel["id"] . "'>". $hotel["name"] . "</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="customer_id_number"><strong>Customer:</strong></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="customer_id_number" name="customer_id_number"
        value="<?= isset($contract) ? $contract["customer_id_number"] : '' ?>">
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="company_name"><strong>Company name:</strong></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="company_name" name="company_name"
        value="<?= isset($contract) ? $contract['company_name'] : '' ?>">
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="company_phone"><strong>Company phone:</strong></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="company_phone" name="company_phone"
        value="<?= isset($contract) ? $contract['company_phone'] : '' ?>">
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="company_address"><strong>Company address:</strong></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="company_address" name="company_name"
        value="<?= isset($contract) ? $contract['company_address'] : '' ?>">
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="booking_tickets"><strong>Number of book tickets:</strong></label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="booking_tickets" name="booking_tickets"
        value="<?= isset($contract) ? $contract['booking_tickets'] : '' ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-8 col-sm-offset-4">
      <input type="submit" class="form-control btn btn-primary" value="Submit"  style="margin-top: 30px;">
    </div>
  </div>
</form>
