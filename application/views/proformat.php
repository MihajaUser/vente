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
  <h1>Liste Proformat </h1>

  <table class="table">
    <thead>
      <tr>
      <th scope="col">Numero</th>
        <th scope="col">Date Devis</th>
        <th scope="col">Client</th>
        <th scope="col">Date Proformat</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($devis); $i++) { ?>
        <tr>
        <th scope="row"><?php echo $devis[$i]['devisId'] ?></th>
          <th scope="row"><?php echo $devis[$i]['devisDate'] ?></th>
          <td><?php echo $devis[$i]['clientsNom'] ?></td>
          <td><?php echo $devis[$i]['proformatsDateDeCreation'] ?></td>
          <td>
          <form action="<?php echo base_url() ?>/ProformatController/ficheProformat/<?php echo $devis[$i]['proformatsId'] ?>" method="GET">
               <input type="submit" value="Fiche" class="btn btn-outline-secondary">
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
    <div class="input-group mb-5">
      <form action="<?php echo base_url() ?>/ProformatController/insertProformat" method="GET">
        <select type="text" name="idDevis" class="form-control" placeholder="Nom Client" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <?php for ($i = 0; $i < count($devisVrai); $i++) { ?>
            <option value="<?php echo $devisVrai[$i]['devisId'] ?>"> <?php echo $devisVrai[$i]['devisId'] ?></option>
          <?php } ?>
        </select>
        <input type="date" name="dateDeCreation" class="form-control" placeholder="date" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <input type="submit" value="Ajouter" class="btn btn-outline-secondary">
      </form>
    </div>
  </table>
</body>
</html>