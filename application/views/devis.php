<!DOCTYPE html>
<html>
<link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<head>
  <title>403 Forbidden</title>
  <style>
    .special-card {
      background-color: rgba(0, 0, 0, 2);
      opacity: .7;
    }
  </style>
</head>
<body>
  <h1>Liste Devis</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Numero</th>
        <th scope="col">Client</th>
        <th scope="col">date</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($devis); $i++) { ?>
        <tr>
          <th scope="row"><?php echo $devis[$i]['devisId'] ?></th>
          <td><?php echo $devis[$i]['clientsNom'] ?></td>
          <td><?php echo $devis[$i]['devisDate'] ?></td>
          <td>
          <form action="<?php echo base_url() ?>/DevisController/ficheDevis/<?php echo $devis[$i]['devisId'] ?>" method="GET">
               <input type="submit" value="Fiche" class="btn btn-outline-secondary">
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
    <div class="input-group mb-5">
      <form action="<?php echo base_url() ?>/DevisController/insertDevis" method="GET">
        <select type="text" name="idClient" class="form-control" placeholder="Nom Client" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <?php for ($i = 0; $i < count($clients); $i++) { ?>
            <option value="<?php echo $clients[$i]['id'] ?>"> <?php echo $clients[$i]['nom'] ?></option>
          <?php } ?>
        </select>
        <input type="date" name="date" class="form-control" placeholder="date" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <input type="submit" value="Ajouter" class="btn btn-outline-secondary">
      </form>
    </div>
  </table>
</body>
</html>