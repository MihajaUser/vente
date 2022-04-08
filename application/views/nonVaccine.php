<link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<div>
  <?php //var_dump($vaccinePresence);?>
  <h1> Personne non vacciné <?php //echo $idPreavis  
                            ?></h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">CIN</th>
        <th scope="col">Localisation</th>
      </tr>
    </thead>
    <tbody>
      <?php
      for ($i = 0; $i < count($vaccinePresence); $i++) {
        if ($vaccinePresence[$i]['presence'] == 0) { ?>
          <tr>
            <td><?php echo $vaccinePresence[$i]['firstname'] . " " . $vaccinePresence[$i]['lastname'] ?></td>
            <td><?php echo $vaccinePresence[$i]['personsCin'] ?></td>
            <td><?php echo $vaccinePresence[$i]['fokontanysNom'] ?></td>
            <form action="<?php echo site_url("/ControllerPersons/seVacciner") ?>" method="POST">
            <td><select name="vaccine_id" class="form-control">
                <option>Vaccin</option>
                <?php for ($j=0; $j <count($vaccines) ; $j++) {?>
                <option value="<?php echo $vaccines[$j]['id'] ?>"><?php echo $vaccines[$j]['nom'] ?></option>
                <?php   } ?>
              </select></td>
              <input type="hidden" name="date" value="2022-03-14">
              <input type="hidden" name="personsId" value="<?php echo $vaccinePresence[$i]['personsId'] ?>">
            <td><input type="submit" value="vacciner" class="btn btn-outline-secondary"></td>
        </form>
          </tr>
      <?php }
      }  ?>
    </tbody>
  </table>
  <?php ?>
</div>