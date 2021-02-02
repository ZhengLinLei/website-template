<?php
//Action code
$_SESSION["backend_action_code"] = rand();
?>
<!doctype html>
<html lang="es">
<head>
    <title>Panel Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100 flex-column">
    <?php
    if(isset($_SESSION["error_public"]["login"]["backend"]["error"]) && $_SESSION["error_public"]["login"]["backend"]["error"]){
    ?>
        <div class="alert alert-danger mb-4 w-25" style="min-width: 350px;">Usuario o contraseña incorrecta</div>
    <?php
    }
    ?>
    <section class="bg-white rounded-sm p-5 w-25 shadow-sm" style="min-width: 350px;">
        <form action="./panel" method="POST">
            <div class="form-group">
                <label for="inputUser">Usuario:</label>
                <input type="text" class="form-control" id="inputUser" name="userAdmin" value="<?php echo ((isset($_SESSION["error_public"]["login"]["backend"]["error"]) && $_SESSION["error_public"]["login"]["backend"]["error"])?$_SESSION["error_public"]["login"]["backend"]["user"]:"")?>" required>
                <small id="emailHelp" class="form-text text-muted small">Use correo en caso de no recordar usuario</small>
            </div>
            <div class="form-group">
                <label for="inputPassword">Contraseña:</label>
                <input type="password" class="form-control" id="inputPassword" name="passwordAdmin" required>
                <input type="text" class="d-none" name="actionCode" value="<?php echo $_SESSION["backend_action_code"]?>">
            </div>
            <button type="submit" class="btn btn-dark btn-block mt-5 py-2" name="login">Acceder</button>
        </form>
    </section>
    <?php
    $_SESSION["error_public"]["login"]["backend"]["error"] = false;
    ?>
    <header class="fixed-bottom pb-4 text-center small text-muted">
        <span>Panel mantenido por ZLL · 2021</span>
    </header>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>