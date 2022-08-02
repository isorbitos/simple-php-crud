<?php
include "./controllers/UserController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['save'])) {
        echo "lsalalalalalslla";
        $hasErrors = UserController::store();
        if (!$hasErrors) {
            header("Location:" . $_SERVER['REQUEST_URI']);
        }
    }

    if (isset($_POST['edit'])) {
        $user = UserController::show();
    }

    if (isset($_POST['update'])) {
        UserController::update();
        header("Location:" . $_SERVER['REQUEST_URI']);
    }

    if (isset($_POST['destroy'])) {
        UserController::destroy();
        header("Location:" . $_SERVER['REQUEST_URI']);
    }
}

$users = UserController::index();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col-md-7 col-lg-8">

            <form action="" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="last_name" value="">
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone_number" value="">
                    </div>
                </div>

                <button class="btn btn-primary" type="submit" name="save">Push</button>
            </form>
        </div>

        <table class="table table-success table-striped mb-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Edite</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->surname ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->phoneNumber ?></td>
                        <td></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $user->id ?>">
                                <button type="submit" class="btn btn-danger" name="destroy" value=" <?= $user->id ?> "> Delete</button>
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>