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
  <h1>Fiche devis <?php echo $idPreavis?></h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Numero</th>
        <th scope="col">Produit</th>
        <th scope="col">quantite</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($details); $i++) { ?>
        <tr>
          <th scope="row"><?php echo $i+1 ?></th>
          <td><?php echo $details[$i]['detailDevisProduit'] ?></td>
          <td><?php echo $details[$i]['detailDevisQuantite'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
    <div class="input-group mb-5">
      <form action="<?php echo base_url() ?>/DevisController/insertDevisDetails/<?php echo $idPreavis ?>" method="GET">
        <input type="text" name="produit" class="form-control" placeholder="Nom produit" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <input type="number" name="quantite" class="form-control" placeholder="quantite" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <input type="submit" value="Ajouter" class="btn btn-outline-secondary">
      </form>
    </div>
  </table>
</body>
</html>