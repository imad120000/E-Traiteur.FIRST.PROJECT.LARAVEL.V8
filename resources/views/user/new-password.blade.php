<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Etraiteur | mot de passe oublié</title>
  <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/css/utility.css">
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
  <style>
    .btn:disabled{
      background-color: #beac9f;
      border-color: #beac9f;
    }
  </style>
  <main class="login">
    <div class="card login__card">
      <div class="bg-primary d-flex mb-4">
        <img class="mx-auto" src="../assets/images/logo.png" style="width: 150px; " alt="">
      </div>
      <div class="px-4">
        <form action="/">
          <label class="login__card-label" for="password">Nouveau mots de passe :</label>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="ti-lock"></i>
            </span>
            <input class="form-control" id="password" type="password" placeholder="Votre nouveau mots de passe..." required>
          </div>

          <label class="login__card-label" for="confirm">Confirmer le nouveau mots de passe :</label>
          <div class="input-group mb-4">
            <span class="input-group-text">
              <i class="ti-lock"></i>
            </span>
            <input class="form-control" id="confirm" type="password" placeholder="Confirmer le mots de passe..." required>
          </div>
          <button id="submit" type="submit" class="btn btn-primary w-100 mb-4" disabled>Réinitialiser</button>
        </form>
      </div>
    </div>
  </main>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>
  <script>
    var passwordInput= document.getElementById('password');
    var confirmInput= document.getElementById('confirm');
    var submit= document.getElementById('submit')
    console.log(confirmInput)
    console.log(passwordInput)
    confirmInput.oninput= function(e) {
      if(e.target.value === passwordInput.value) {
        submit.removeAttribute('disabled');
      } else {
        submit.setAttribute('disabled', '');
      }
    }

  </script>
</body>
</html>