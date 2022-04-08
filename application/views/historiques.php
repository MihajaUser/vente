<link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<div><?php //var_dump($doseResponse );?>
  <h1>Historiques  Reponse </h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Reference</th>
        <th scope="col">Chef Fokontany</th>
        <th scope="col">Vaccin</th>
        <th scope="col">quantite demande</th>
        <th scope="col">Localisation</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($doseResponse); $i++) { ?>
        <tr>
          <th scope="row"><?php echo $doseResponse[$i]['dose_rquestsId'] ?></th>
          <td><?php echo $doseResponse[$i]['firstname'] . " " . $doseResponse[$i]['lastname'] ?></td>
          <td><?php echo $doseResponse[$i]['vaccinesNom'] ?></td>
          <td><?php echo $doseResponse[$i]['dose_responsesQuantity'] ?></td>
          <td><?php echo $doseResponse[$i]['fokontanysNom'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php ?>
</div>