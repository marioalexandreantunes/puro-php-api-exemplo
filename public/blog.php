<!DOCTYPE html>
<html lang="en" data-bs-theme="<?= $_COOKIE["theme"] ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Tempo 2023</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <p class="m-3 display-6 fw-lighter">Tema usado é: <strong><?= $_COOKIE["theme"] ?></strong></p>
        <div class="m-3 justify-content-center text-center">
            <a class="btn btn-primary" href="/">Inicio</a>
        </div>
    </div>
</body>

</html>