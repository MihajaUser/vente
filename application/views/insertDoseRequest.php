<link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<div>
  <div style="margin-left: 25%;">
    <h1> Nouvelle  demande </h1>
    <div class="card" style="width: 60%;">
      <div class="card-body" style="margin-left: 20%;">
      <form action="<?php echo site_url("/ControllerDoseRequest/insertDoseRequest") ?>" method="POST">
        <div class="col-md-9">
          <div class="form-group">
            <select name="user_id" class="form-control" placeholder="user_id">
              <option value="1"> Mihaja </option>
              <option value="2"> Tafinasoa </option>
            </select>
          </div>
          <div class="form-group">
            <input type="date" name="date" class="form-control" placeholder="date">
          </div>
          <div class="form-group">
          <select type="text" name="vaccine_id" class="form-control" placeholder="vaccine_id">
            <?php for ($i=0; $i < count($vaccines); $i++) {  ?>
              <option value="<?php  echo $vaccines[$i]['id'] ?>"> <?php  echo $vaccines[$i]['nom'] ?> </option>
            <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <input type="number" name="quantity" class="form-control" placeholder="Quantite">
          </div>
          <input type="submit" class="btn btn-secondary" value="commander" />
        </div>
      </div>
      </form>
    </div>
  </div>
</div>