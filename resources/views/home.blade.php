<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tela Inicial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: rgb(210, 218, 208); height: 100vh;"
  class="d-flex justify-content-center align-items-center">
  <div class="container">
    <section class="mx-auto"
      style="max-width: 726px; height: 658px; background-color: white; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
      <div style="background-color: rgb(16, 161, 16); height: 12px; width: 100%; border-radius: 15px 15px 0 0;"></div>


      <div class="d-flex justify-content-center" style="margin-top: 20px;">
        <img src="../img/logo.png" class="img-fluid" alt="IFPE logo" style="max-width: 100%;">
      </div>


      <p class="text-center" style="font-size: 20px; padding: 90px; font-weight: 650; margin-top: -30px;">
        Para dar prosseguimento ao preenchimento do formulário de requerimento, faça login preferencialmente com seu e-mail institucional
      </p>


      <div class="d-flex justify-content-center mb-3">
        <button class="btn btn-light border" onclick="loginGoogle()" type="button"
          style="width: 250px; height: 50px; font-size: 16px; font-weight: 500;">
          <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google logo"
            style="height: 20px; margin-right: 10px;">
          Continue com o Google
        </button>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

<script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-app-compat.js";></script>
<script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-auth-compat.js";></script>
<script>
    const firebaseConfig = {
    apiKey: "AIzaSyCncyZum_ABDLTYs4VoSTIbVAt4Q9R62J8",
    authDomain: "formulario-requerimento-ifpe.firebaseapp.com",
    projectId: "formulario-requerimento-ifpe",
    storageBucket: "formulario-requerimento-ifpe.appspot.com",
    messagingSenderId: "850486247777",
    appId: "1:850486247777:web:6e76a4943f9f0c51c68520"
  };
  firebase.initializeApp(firebaseConfig);
  const auth = firebase.auth()

  function loginGoogle() {
      const provider = new firebase.auth.GoogleAuthProvider();
      auth.signInWithPopup(provider)
        .then((result) => {
          console.log("Usuário logado:", result.user,);

          const userEmail = result.user.email;
          localStorage.setItem("userEmail", userEmail);
          window.location.href = "/informativa";
        })
        .catch((error) => {
          console.error("Erro no login:", error);
        });
    }
</script>
</html>