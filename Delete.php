<?php
   include "connect.php";

    if (isset($_GET['id'])) {
        $uid = $_GET['id'];
        $sql = "DELETE FROM `dragon` WHERE `id`='$uid'";
        $output = $conn->query($sql);
        if ($output == TRUE) {
            echo " The Record has been deleted successfully.";
        }
        else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
        echo '<script>
		window.location = "index.php";
	</script>';
    
    } 
?>