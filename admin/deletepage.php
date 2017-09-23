<?php 
include "../lib/Session.php";
Session::checkSession(); 
?>
<?php
include "../config/config.php";
include "../lib/Database.php";
?>
<?php
$db = new Database();

?>

<?php
if (!isset($_GET['delpage'])|| $_GET['delpage'] == NULL) {
    echo "<script>window.location = 'index.php';</script>";
} else {
    $pageid = $_GET['delpage'];

    $delquery = "DELETE FROM tbl_page WHERE id = '$pageid'";
    $delData = $db->delete($delquery);
    if ($delData) {
    	echo "<script>alert('Page deleted successfully');</script>";
    	echo "<script>window.location = 'index.php';</script>";
    }else {
    	echo "<script>alert('Page not deleted ');</script>";
    	echo "<script>window.location = 'index.php';</script>";
    }
}

?>