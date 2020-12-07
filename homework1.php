<!DOCTYPE html>
<?php include_once "_header.php" ?>

<body class="c-app">
<?php include_once "_sidebar.php"; ?>
<div class="c-wrapper c-fixed-components">
    <?php
    $page_name="Домашка 1";
    ?>
    <?php include_once "_subheader.php"; ?>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <?php
                                $back_color = '#AAAAAA';
                                if(isset($_POST))
                                {
                                    $back_color = "#";
                                    foreach ($_POST as $input_val)
                                    {
                                        $tmp = strval(dechex(intval($input_val)));
                                        if(strlen($tmp) < 2)
                                            $tmp = "0" . $tmp;
                                        $back_color .= $tmp;
                                    }
                                }
                                echo '<div class="card-header" style="background-color:' . $back_color . '">';
                                echo '<strong>' . $back_color . '</strong></div>';
                                ?>
                                <div class="card-body">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">R</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="r-input" type="number" min="0" max="255"
                                                       name="r-input" placeholder="0-255" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="email-input">G</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="g-input" type="number" min="0" max="255"
                                                       name="g-input" placeholder="0-255" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="password-input">B</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="b-input" type="number" min="0" max="255"
                                                       name="b-input" placeholder="0-255" required>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                                            <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                                        </div>
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
