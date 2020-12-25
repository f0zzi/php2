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
    $breadcrumbs[] = new BreadcrumbItem("Користувачі", true);
    ?>
    <?php include_once "_subheader.php"; ?>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php include_once "connection_database.php";
                                    $sql = "SELECT * FROM `tbl_users`";
                                    ?>
                                    <a href="add_user.php" class="btn btn-success mb-2">Додати</a>
                                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">
                                                <svg class="c-icon">
                                                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-people"></use>
                                                </svg>
                                            </th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Actions</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($dbh->query($sql) as $row) {
                                            echo '
                                        <tr>
                                            <td class="text-center">
                                                <div class="c-avatar"><img class="c-avatar-img"
                                                                           src="' . $row["Image"] . '"
                                                                           alt="user@email.com"><span
                                                            class="c-avatar-status bg-success"></span></div>
                                            </td>
                                            <td>
                                                <div>' . $row["Name"] . '</div>
                                            </td>
                                            <td>
                                                <div>' . $row["Email"] . '</div>
                                            </td>
                                            <td>
                                                <div>' . $row["Password"] . '</div>
                                            </td>
                                            <td>
                                                <a href="edit_user.php?id='. $row["id"].'" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <a href="delete_user.php?id='. $row["id"].'" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        ';
                                        }
                                        ?>

                                        </tbody>
                                    </table>
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
