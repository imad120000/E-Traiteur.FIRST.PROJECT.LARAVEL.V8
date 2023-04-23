<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Etraiteur | Loging Page</title>
  <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/css/utility.css">
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
  <main class="login">
    <div class="card login__card">
      <div class="bg-primary d-flex mb-4">
        <img class="mx-auto" src="../assets/images/logo.png" style="width: 150px; " alt="">
      </div>
      <div class="px-4">
        <!-- <h2 class="text-center text-primary mb-4">etraiteur</h2> -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('user.check')}}" method="post">
          @csrf
          <label class="login__card-label" for="username">Email</label>
          <div class="input-group">
            <span class="input-group-text">
              <i class="ti-user"></i>
            </span>
            <input class="form-control @error('email') is-invalid @enderror"   id="username" value="{{ old('email') }}" name="email" type="email" placeholder="Tapez votre email ..." >
             @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
          </div>
          <label class="login__card-label" for="password">Mots de passe</label>
          <div class="input-group mb-0">
            <span class="input-group-text">
              <i class="ti-lock"></i>
            </span>
            <input  class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password"
             placeholder="Tapez votre mots de pass ..." >
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
          </div>
          <br>
          <div class="mb-4 d-flex justify-content-end">
            <a class="text-primary" href="#">Mot de passe oublié?</a>
          </div>
          <button type="submit" class="btn btn-primary w-100 mb-3">login</button>
          <p class="text-center">
            Vous n'avez pas de compte?
            <a class="d-block text-primary" href="{{route('user.register')}}">Crée un maintenant</a>
          </p>
        </form>
      </div>
    </div>
  </main>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>
</body>
</html>