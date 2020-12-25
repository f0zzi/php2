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
    $breadcrumbs[] = new BreadcrumbItem("Домашка 1 юзери", true);
    ?>
    <?php include_once "_subheader.php"; ?>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if(isset($_POST["login-input"]))
                                    {
                                        $fd = fopen("users.txt", 'a+') or die("не вдалося відкрити файл");
                                        while(!feof($fd))
                                        {
                                            $str = fgets($fd);
                                            if(!strlen($str))
                                            {
                                                break;
                                            }
                                            list($login, $pass, $email) = explode(":", $str);
                                            if($_POST["login-input"] == $login)
                                            {
                                                echo "такий логін вже існує";
                                                break;
                                            }
                                            if($_POST["email-input"] == trim($email))
                                            {
                                                echo "такий e-mail вже використовується";
                                                break;
                                            }
                                        }
                                        fputs($fd, $_POST["login-input"] . ":" . $_POST["pass-input"] . ":" . $_POST["email-input"] . "\n");
                                        fclose($fd);
                                        if(isset($_POST["show_users"]))
                                        {
                                            unset($_POST["show_users"]);
                                        }
                                    }
                                    ?>
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="login-input">Login</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="login-input" type="text"
                                                       name="login-input" placeholder="Login" pattern="[^:]+" title='символ ":" заборонено' required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="pass-input">Password</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="pass-input" type="password"
                                                       name="pass-input" placeholder="Password" pattern="[^:]+" title='символ ":" заборонено' required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="email-input">E-mail</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="email-input" type="email"
                                                       name="email-input" placeholder="E-mail" required>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-sm btn-primary" type="submit"> Add</button>
                                            <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <button class="btn btn-sm btn-primary" type="submit" value="1" name="show_users">Show users</button><br>
                                <?php
                                if(isset($_POST["show_users"]))
                                {
                                    echo "<h4>Users list</h4>";
                                    echo "<table border='black' cellpadding='10px' width='100%'>";
                                    echo "<tr><th width='30%'>Login</th><th width='20%'>Pass</th><th>Email</th></tr>";
                                    $fd = fopen("users.txt", 'a+') or die("не вдалося відкрити файл");
                                    while(!feof($fd))
                                    {
                                        $str = htmlentities(fgets($fd));
                                        if(!strlen($str))
                                        {
                                            break;
                                        }
                                        list($login, $pass, $email) = explode(":", $str);
                                        echo "<tr><td>$login</td><td>$pass</td><td>$email</td></tr>";
                                    }
                                    echo "</table>";
                                }
                                ?>
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
<!--</html>-->
