<!doctype html>
<html lang="es">

<head>
    <title><?php echo ucfirst($_GET["type"]) ?> panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($_SESSION["config"]["backend"]["plugin"][$_GET["type"]]) {
        include_once('./view/backend/import/plugin/'.$_GET["type"].'/index.php');
    } else {
    ?>
        <style>
            .bulb{
                animation: offbulb 1s ease infinite;
                color: white;
            }
            @keyframes offbulb{
                50%{
                    color: yellow;
                }
            }
        </style>
        <section class="vh-100 d-flex justify-content-center align-items-center">
            <div class="d-flex align-items-start">
                <div class="display-2 bulb mr-4">
                    <i class="far fa-lightbulb"></i>
                </div>
                <div class="ml-3 pt-5">
                    <div class="h2 text-danger">Plugin no activado</div>
                    <div class="h5 text-muted">Tu configuración no tiene este plugin activado</div>
                    <div class="d-flex justify-content-between mt-5">
                        <span class="text-muted small">Plugin: <?php echo $_GET["type"];?></span>
                        <a href="../panel" class="btn btn-dark px-4 font-weight-bold">Volver</a>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>