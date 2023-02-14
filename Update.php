<?php
include "connect.php";

        if (isset($_GET['id'])) {

            $uid = $_GET['id'];
	
    $sql = "SELECT * FROM `dragon` WHERE `id` = '$uid'";
   $output = $conn->query($sql);

if ($output->num_rows > 0) {
		 while($row = $output->fetch_assoc()) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1, shirnk-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Updating a dragon</title>
</head>

<body>

    <div>
    <h2>Updating a Dragon</h2>
	
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label>Name</label><br>
                <input type="text" name="name" value="<?php echo $row['name'] ?>"><br>
            </div>
            <div>
                <label>Rarity</label><br>
                <select name="rarity" id="rarity" value="<?php echo $row["rarity"] ?>"><br>
                <option value="common">Common</option>
                <option value="rare">Rare</option>
                <option value="veryrare">VeryRare</option>
                <option value="epic">Epic</option>
                <option value="legendary">Legendary</option>
                <option value="heroic">Heroic</option>
            </select><br>
            </div>
            <div>
                <label>Element</label><br>
                <input type="element" name="element" value="<?php echo $row["element"] ?>"><br>
            </div>
            <div>
                <label>Health</label><br>
                <input type="health" name="health" value="<?php echo $row["health"] ?>"><br>
            </div>
            <div>
                <p><label>Strength</label></p>
                <input type="strength" name="strength" value="<?php echo $row["strength"] ?>"><br>
            </div>
            <div>
                <p><label>Weakness</label></p>
                <input type="weakness" name="weakness" value="<?php echo $row["weakness"] ?>"><br>
            </div>
            <div>
            <p><label>Special Attack</label></p>
            <input type="specialattack" name="specialattack" value="<?php echo $row["specialattack"] ?>"><br>
            </div>

            <div>
            <p><label for="image">Dragon Photo</label></p>
			
			<img src="<?php echo $row["imgDirectory"] ?>" width="350" height="250"><br>
	
            </div>
			
            <p><input type="submit" name="submit"value="Submit"></p>
            <button><a href="index.php">Cancel</a></button>
</form>
		

<form action="" method="post" enctype="multipart/form-data">
<div>
            <label for="image">Changing Dragon Image</label>
			<input type="file" name="image" id="image">
    <input type="submit" name="update" value="Change">        
	</div>		
	 
</form>

<?php 
if(isset($_POST['update'])){
	// Setting our images folder
        $imgDirectory = "dragons/";
        $target_file = $imgDirectory . basename($_FILES["image"]["name"]);        
        if (!file_exists($_FILES["image"]["tmp_name"])) 
        {
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

		$sql = "UPDATE dragon SET imgDirectory = '$target_file' WHERE id = $uid";
if ($conn->query($sql) === TRUE) {


}
	echo '<script>
		window.location = "index.php";
		
	</script>';
}}}
?>
		<?php
		
		if(isset($_POST['submit'])){
			$filepath = $row["imgDirectory"];
			$originalimage = isset($_POST[$filepath]);
		$sql = "UPDATE dragon SET name = '".$_POST['name']."',rarity = '".$_POST['rarity']."',element = '".$_POST['element']."',health = '".$_POST['health']."',strength = '".$_POST['strength']."',weakness = '".$_POST['weakness']."',specialattack = '".$_POST['specialattack']."' WHERE id = $uid";
if ($conn->query($sql) === TRUE) {


}
	echo '<script>
		window.location = "index.php";
		
	</script>';}	 
}
}	}?>
		

</body>
</html>
