<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>


<div class="grid_10">

<div class="box round first grid">
<h2>Theme</h2>
<div class="block copyblock"> 

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $theme = mysqli_real_escape_string($db->link,$_POST['theme']);
        $query = "UPDATE tbl_theme
         SET 
         theme = '$theme'
         WHERE id = '1'";

        $update_row = $db->update($query);
        if ($update_row) {
           echo "<span class='success'>Theme updated successfully  !!</span>";  
        } else {
           echo "<span class='error'>Theme updated failed  !!</span>"; 
        }
     }
?>
<?php 
$query = "SELECT * FROM tbl_theme WHERE id='1'" ;
$theme = $db->select($query);

while ($result = $theme->fetch_assoc()){
?>
<form action="" method="post">
<table class="form">					
<tr>
    <td>
    <input <?php if ($result['theme'] == 'default') {echo "checked";}?> type="radio" name="theme" value="default" />Default
    </td>
</tr>
<tr>
    <td>
        <input <?php if ($result['theme'] == 'green') {echo "checked";}?> type="radio" name="theme" value="green" />Green
    </td>
</tr>
<tr>
    <td>
        <input <?php if ($result['theme'] == 'blue') {echo "checked";}?> type="radio" name="theme" value="blue" />Blue
    </td>
</tr>
<tr> 
    <td>
        <input type="submit" name="submit" Value="Change" />
    </td>
</tr>
</table>
</form>
    <?php } ?>
</div>
</div>
</div>
<?php include "inc/footer.php"; ?>
