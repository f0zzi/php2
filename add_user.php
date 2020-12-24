<?php
include_once "connection_database.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
     if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['image']) && isset($_POST['password']) ) {
         if (!preg_match("/\w/",$_POST['name'])) {
             $Err = "Name must contain at least one character";
         }
         else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
             $Err = "Invalid email format";
         }
         else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['image'])) {
             $Err = "Invalid image URL";
         }
         else if (!preg_match("<^\S*$>",$_POST['password'])) {
             $Err = "Password must not contain whitespaces";
         }
         else
         {
             $data = [
                 'name' => $_POST['name'],
                 'email' => $_POST['email'],
                 'image' => $_POST['image'],
                 'password' => $_POST['password'],
             ];
             $sql = "INSERT INTO tbl_users (name, email, image, password) VALUES (:name, :email, :image, :password)";
             $stmt = $dbh->prepare($sql);
             $stmt->execute($data);
             header('Location: /users.php');
             exit();
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
    $breadcrumbs[] = new BreadcrumbItem("Додати користувача", true);
    ?>
    <?php include_once "_subheader.php"; ?>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><strong>Додати користувача</strong></div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="name">Ім'я</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="name" type="text"
                                                       name="name" placeholder="Text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="email">Email Input</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="email" type="email"
                                                       name="email" placeholder="Enter Email"
                                                       autocomplete="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="image">Image</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="image" type="text"
                                                       name="image" placeholder="Enter Image Path">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="password">Password</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="password" type="password"
                                                       name="password" placeholder="Password"
                                                       autocomplete="new-password">
                                            </div>
                                        </div>
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-md-3 col-form-label" for="image">Фото</label>-->
<!--                                            <div class="col-md-9">-->
<!--                                                <input id="image" type="text" name="image">-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="card-footer">
                                            <button class="btn btn-sm btn-primary" type="submit"> Додати</button>
                                            <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                                        </div>
                                        <?php
                                            if(isset($Err)) {
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
