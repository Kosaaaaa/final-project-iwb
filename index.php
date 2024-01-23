<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Filmy - Projekt IwB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="css/style.css" rel="stylesheet" />
  <script src="js/main.js" defer></script>
</head>

<body>
  <!-- Navbar -->
  <header>
    <div id="navbarHeader" class="collapse">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4>O Stronie</h4>
            <p class="text-light">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Deleniti perspiciatis error nisi consectetur. Quae et sunt
              ratione consectetur quibusdam beatae rem nostrum iure. Dicta
              quis culpa natus. Ea, aut adipisci!
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm" id="navbarMain">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <strong>Filmy</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
  <!-- Navbar -->

  <!-- Main -->
  <main>
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Filmy VoD</h1>
          <p class="lead text-body-secondary">
            Filmy dostępne w serwisie VoD.
          </p>
        </div>
      </div>
    </section>

    <div class="py-5 bg-body-tertiary">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'finalProject');
          $query = "SELECT id, name, description, image_path FROM movies;";
          $res = $conn->query($query);
          while ($row = $res->fetch_array()) {
            echo
            "<div class='col'> 
                  <div class='card shadow-sm'>
                    <div class='card-body'>
                      <img src='$row[3]' alt='film'>
                      <p class='card-text'>
                        <h4>$row[0]. $row[1]</h4>
                        $row[2]
                      </p>
                    </div>
                  </div>
                </div>";
          }
          mysqli_close($conn);
          ?>
        </div>
      </div>

      <section id="removeVideoSection" class="my-4">
        <h2 class="text-center">Usuń Film</h2>
        <form id="removeVideoForm" action="." method="post">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="mb-3">
                    <label for="removeVideoId" class="form-label">Usuń Film</label>
                    <div class="input-group">
                      <input class="form-control" id="removeVideoId" type="number" name="removeVideoId" />
                    </div>
                  </div>
                  <div class="form-check my-2 text-danger">
                    <input type="checkbox" id="verificationCheckbox" class="form-check-input" />
                    <label for="verificationCheckbox" class="form-check-label">Potwierdź usunięcie</label>
                  </div>
                  <p id="errorMessage" class="invalid-feedback" style="display: none"></p>
                  <button type="submit" class="btn btn-danger my-4" disabled id="removeVideoBtn">
                    Usuń
                  </button>
                </div>
              </div>
            </div>
          </div>
          <?php
          if (isset($_POST["removeVideoId"])) {
            $removeVideoId = $_POST["removeVideoId"];
            $conn = mysqli_connect('localhost', 'root', '', 'finalProject');
            $conn->query("DELETE FROM movies WHERE id=$removeVideoId");
            mysqli_close($conn);
          }
          ?>
        </form>
      </section>
  </main>
  <!-- Main -->

  <!-- Footer -->
  <footer class="text-body-secondary py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Wróć do góry</a>
      </p>
      <p class="mb-1">
        Strona wykonana przez: <b>Oskara Kosobuckiego 56202 IwB Toruń</b>
      </p>
    </div>
  </footer>
  <!-- Footer -->
</body>

</html>