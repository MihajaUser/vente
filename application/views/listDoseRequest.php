<link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<div>
  <?php //var_dump($doseRequest)?>
  <h1>Liste Demande 
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Reference</th>
        <th scope="col">Chef Fokontany</th>
        <th scope="col">Vaccin</th>
        <th scope="col">quantite</th>
        <th scope="col">Localisation</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($doseRequest); $i++) { ?>
        <tr>
          <td><?php echo $doseRequest[$i]['dose_rquestsId'] ?></td>
          <td><?php echo $doseRequest[$i]['firstname'] . " " . $doseRequest[$i]['lastname'] ?></td>
          <td><?php echo $doseRequest[$i]['vaccinesNom'] ?></td>
          <td><?php echo $doseRequest[$i]['dose_rquestsQuantity'] ?></td>
          <td><?php echo $doseRequest[$i]['fokontanysNom'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>