<?php
session_start();
if (isset($_SESSION['a_id'])) {
    ?>
<script>
location = './attractionsList.php'
</script>
<?php } else {
    echo "<script>
        location='./login.php'
      </script>";
}
?>