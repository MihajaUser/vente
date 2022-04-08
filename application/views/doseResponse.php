<link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<div><?php //var_dump($doseResponse );?>
  <h1>Liste Reponse </h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Reference</th>
        <th scope="col">Chef Fokontany</th>
        <th scope="col">Vaccin</th>
        <th scope="col">quantite demande</th>
        <th scope="col">quantite Recu</th>
        <th scope="col">Reste</th>
        <th scope="col">Localisation</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($doseResponse); $i++) { ?>
        <tr>
          <th scope="row"><?php echo $doseResponse[$i]['dose_rquestsId'] ?></th>
          <td><?php echo $doseResponse[$i]['firstname'] . " " . $doseResponse[$i]['lastname'] ?></td>
          <td><?php echo $doseResponse[$i]['vaccinesNom'] ?></td>
          <td><?php echo $doseResponse[$i]['dose_rquestsQuantity'] ?></td>
          <td><?php echo $recuReste[$i]['recu'] ?></td>
          <td><?php echo $recuReste[$i]['reste'] ?></td>
          <td><?php echo $doseResponse[$i]['fokontanysNom'] ?></td>
          <td><?php echo $doseResponse[$i]['fokontanysNom'] ?></td>
          <form action="<?php echo site_url("/ControllerDoseResponse/listDoseResponseHistoriques")?>" method="POST" >
            <input type="hidden" name="dose_rquestsId" value="<?php echo $doseResponse[$i]['dose_rquestsId'] ?>" >
            <td><input type="submit" value="Historiques" class="btn btn-outline-secondary"></td>
          </form>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php ?>
</div>