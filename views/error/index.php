<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbs5c4idPK8Pm5O21O8t9aUdQolz9v1nSLDYqK2rU5OtFYYa11u0RAKXHj2Ck9gb" crossorigin="anonymous">
    <style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        background-color: #f8f9fa;
    }

    .error-container {
        text-align: center;
        padding: 30px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 80px;
    }

    .error-image {
        max-width: 100%;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 4rem;
        color: #343a40;
    }

    p {
        color: #6c757d;
    }

    .btn-primary {
        text-decoration: none;
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        font-size: 1.2rem;
    }
    </style>
</head>

<body>
    <div class="error-container">
        <img class="error-image"
            src="https://img.freepik.com/free-vector/404-error-with-landscape-concept-illustration_114360-7898.jpg"
            alt="Error Image">
        <h1 class="display-4">Oops! 404 Not Found</h1>
        <p class="lead">The page you are looking for might be in another castle.</p>
        <a href="index.php?page=main&controller=layouts&action=index" class="btn btn-primary">Go Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MXHTigYdZUWBXENw4A6a8fTTdZgA1ePPLw5cnXfQhJCep8QO5eFwE2J4zBzhKY" crossorigin="anonymous">
    </script>
</body>

</html>