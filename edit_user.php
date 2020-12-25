<?php
include_once "connection_database.php";
if (isset($_REQUEST["id"])) {
    $stmt = $dbh->query("SELECT * FROM `tbl_users` WHERE `id` = " . $_REQUEST["id"]);
    $user = $stmt->fetch();
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['image']) && isset($_POST['password'])) {
        if (!preg_match("/\w/", $_POST['name'])) {
            $Err = "Name must contain at least one character";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $Err = "Invalid email format";
        } else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['image'])) {
            $Err = "Invalid image URL";
        } else if (!preg_match("<^\S*$>", $_POST['password'])) {
            $Err = "Password must not contain whitespaces";
        } else if ($_POST["password"] === "") {
            $Err = "Enter password";
        } else {
            $stmt = $dbh->query("SELECT * FROM `tbl_users` WHERE `name` = '" . $_POST['name'] . "'");
            $user_name = $stmt->fetch();
            $stmt = $dbh->query("SELECT * FROM `tbl_users` WHERE `email` = '" . $_POST['email'] . "'");
            $user_email = $stmt->fetch();
            if ($user_name) {
                $Err = "User with Name \"" . $_POST['name'] . "\" already exists";
            } else if ($user_email) {
                $Err = "User with Email \"" . $_POST['email'] . "\" already exists";
            } else {
                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'image' => $_POST['image'],
                    'password' => $_POST['password'],
                    'id' => $user['id'],
                ];
                $sql = "UPDATE tbl_users SET name=:name, email=:email, image=:image, password=:password WHERE id=:id";
                $stmt = $dbh->prepare($sql);
                $stmt->execute($data);
                header('Location: /users.php');
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<?php include_once "_header.php" ?>

<body class="c-app">
<?php include_once "_sidebar.php"; ?>
<div class="c-wrapper c-fixed-components">
    <?php
    include_once "classes.php";
    //$bItem = new BreadcrumbItem;
    $breadcrumbs = array();
    $breadcrumbs[] = new BreadcrumbItem("Головнa", false, "/");
    $breadcrumbs[] = new BreadcrumbItem("Користувачі", false, "/users.php");
    $breadcrumbs[] = new BreadcrumbItem("Редагування користувача", true);
    ?>
    <?php include_once "_subheader.php"; ?>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><strong>Редагування користувача</strong></div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="name">Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="name" type="text"
                                                       name="name" placeholder="Enter Name"
                                                       value="<?php echo $user["Name"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="email">Email Input</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="email" type="email"
                                                       name="email" placeholder="Enter Email"
                                                       autocomplete="email"
                                                       value="<?php echo $user["Email"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="image">Image</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="image" type="text"
                                                       name="image" placeholder="Enter Image Path"
                                                       value="<?php echo $user["Image"]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="password">Password</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="password" type="text"
                                                       name="password" placeholder="Enter Password"
                                                       autocomplete="new-password"
                                                       value="<?php echo $user["Password"]; ?>">
                                            </div>
                                        </div>
                                        <!--                                        <div class="form-group row">-->
                                        <!--                                            <label class="col-md-3 col-form-label" for="image">Фото</label>-->
                                        <!--                                            <div class="col-md-9">-->
                                        <!--                                                <input id="image" type="text" name="image">-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                        <div class="card-footer">
                                            <button class="btn btn-sm btn-danger" type="submit"> Зберегти</button>
                                            <a href="users.php" class="btn btn-sm btn-primary"> Назад</a>
                                        </div>
                                        <?php
                                        if (isset($Err)) {
                                            echo "<p style='color:red'>" . $Err . "</p>";
                                            unset($Err);
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
        <?php include_once "_footer.php" ?>
    </div>
</div>


<!-- CoreUI and necessary plugins-->
<?php include_once "_scripts.php"; ?>
</body>
</html>
