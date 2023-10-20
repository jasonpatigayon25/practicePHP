<?php
if(isset($_POST['menu_id'])) {
    $menu_id = $_POST['menu_id'];

    $conn = new mysqli('localhost', 'root', '', 'pointofsale');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM ref_menu WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $menu_id);
    $execval = $stmt->execute();

    if ($execval) {
        header('Location: deleteMenu.php?status=success');
    } else {
        header('Location: deleteMenu.php?status=error');
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: deleteMenu.php');
}
?>
