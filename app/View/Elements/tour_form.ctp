<form class="form-horizontal" role="form" method="post"
  action="/tours/<?= isset($isUpdate) ? 'update' : 'create' ?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="id"><strong>Tour ID:</strong></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="id"
        placeholder="Enter tour id" name="id"
        value="<?= isset($tour) ? $tour["id"] : '' ?>"
        <?php if (isset($isUpdate)) echo "disabled"; ?>>
    </div>
    <?php
      if (isset($isUpdate))
        echo "<input type='hidden' name='id' value='". $tour["id"] ."'>";
    ?>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="place_id"><strong>Place:</strong></label>
    <div class="col-sm-10">
      <select id="place_id" name="place_id" class="form-control">
        <?php
          foreach ($places as $place){
            if (isset($tour) && $tour["place_id"] == $place["id"])
              echo "<option selected value='" . $place["id"] . "'>". $place["name"] ."</option>";
            else
              echo "<option value='" . $place["id"] . "'>". $place["name"] ."</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="start_date"><strong>Start date:</strong></label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="start_date" name="start_date"
        value="<?= isset($tour) ? $tour["start_date"] : '' ?>">
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="tickets"><strong>Tickets:</strong></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="tickets" name="tickets"
        value="<?= isset($tour) ? $tour["tickets"] : '' ?>">
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cost"><strong>Cost:</strong></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="cost" name="cost"
        value="<?= isset($tour) ? $tour["cost"] : '' ?>">
    </div>
  </div>
  <br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="description"><strong>Description:</strong></label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="9" id="description" name="description">
        <?= isset($tour) ? $tour["description"] : "" ?>
      </textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      <input type="submit" class="form-control btn btn-primary" value="Submit"  style="margin-top: 30px;">
    </div>
  </div>
</form>
