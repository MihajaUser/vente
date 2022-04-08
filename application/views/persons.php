<link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<div>
  <?php //var_dump($vaccinePresence);?>
  <h1> Information Personne  <?php //echo $idPreavis  
                            ?></h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">CIN</th>
        <th scope="col">Localisation</th>
        <th scope="col">Naissance</th>
        <th scope="col">Vaccination</th>
      </tr>
    </thead>
    <tbody>
      <?php
      for ($i = 0; $i < count($vaccinePresence); $i++) { ?>
          <tr>
            <td><?php echo $vaccinePresence[$i]['firstname'] . " " . $vaccinePresence[$i]['lastname'] ?></td>
            <td><?php echo $vaccinePresence[$i]['personsCin'] ?></td>
            <td><?php echo $vaccinePresence[$i]['fokontanysNom'] ?></td>
            <td><?php echo $vaccinePresence[$i]['personsDate_of_birth'] ?></td>
            <td><?php   
            if ($vaccinePresence[$i]['presence']==0) {
             echo "Non vaccine ";
            }else{
              echo "fini ";
            }
            ?></td>
          </tr>
      <?php }?>
    </tbody>
  </table>
  <?php ?>
</div>