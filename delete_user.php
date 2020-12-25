<?php
include_once "connection_database.php";
if (isset($_REQUEST["id"])) {
    $data = [ 'id' => $_REQUEST["id"]];
    $sql = "DELETE FROM tbl_users WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
}
header('Location: /users.php');
exit();
?>