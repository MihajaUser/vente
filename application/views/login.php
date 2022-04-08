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
  <div style="margin-left: 35%; margin-top:180px">
    
    <div class="special-card" style="width: 50%;height:40%">
    <h1 style="text-align: center; color:white"> VACCINO  </h1>
      <div class="card-body" style="margin-left: 20%;">
      <form action="<?php echo site_url("/ControllerDoseRequest/listDoseRequest") ?>" method="POST">
        <div class="col-md-8">
       <br>
          <div class="form-group">
            <select name="roles_id" class="form-control" aria-placeholder="Utilisateur">
              <option value="1">Admin</option>
              <option value="2">Invite</option>
            </select>
          </div>
          <br>
          <div class="form-group">
            <input type="password" name="pwd1" class="form-control" placeholder="mot de passe">
          </div>
          <br>
          <input type="submit" class="btn btn-secondary" value="Connexion" />
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>