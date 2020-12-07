<!DOCTYPE html>
<?php include_once "_header.php" ?>

<body class="c-app">
<?php include_once "_sidebar.php"; ?>
<div class="c-wrapper c-fixed-components">
    <?php
    $page_name="Домашка 1 юзери";
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
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">Login</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="login-input" type="text"
                                                       name="login-input" placeholder="Login" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="email-input">E-mail</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="email-input" type="email"
                                                       name="email-input" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="password-input">Password</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="pass-input" type="password"
                                                       name="pass-input" placeholder="Password" required>
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
                                        <button class="btn btn-sm btn-primary" type="submit" value="1" name="show_users">Show users</button>
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
