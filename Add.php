<?php
include "connect.php";

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
    $rarity=$_POST['rarity'];
    $element=$_POST['element'];
    $health=$_POST['health'];
    $strength=$_POST['strength'];
    $weakness=$_POST['weakness'];
    $specialattack=$_POST['specialattack'];
	
  // Setting our images folder
        $imgDirectory = "dragons/";
        $target_file = $imgDirectory . basename($_FILES["image"]["name"]);        
        if (!file_exists($_FILES["image"]["tmp_name"])) 
        {
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

	
    $sql="INSERT INTO dragon(name, rarity, element, health, strength, weakness, specialattack, imgDirectory)
    VALUES('$name','$rarity', '$element', '$health', '$strength', '$weakness', '$specialattack', '$target_file')";
	
	
    $output=mysqli_query($conn, $sql);
	
	
    if($output == TRUE) {
        echo "Data inserted successfully";
    }
    else {
        echo "Error:". $sql . "<br>". $conn->error;
    }  
    
	}
		}
echo '<script>
		window.location = "index.php";
		
	</script>';}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport"
       content="width=device-width, initial-scale=1.0">  
    <title>Adding a dragon</title>
</head>
<strength>

    <div>
    <h2 >Adding a dragon</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label>Name</label><br>
                <input type="text" name="name"><br>
            </div>
            <div>
                <label>Rarity</label><br>
                <select name="rarity" id="rarity"><br>
                <option value="common">Common</option>
                <option value="rare">Rare</option>
                <option value="veryrare">VeryRare</option>
                <option value="epic">Epic</option>
                <option value="legendary">Legendary</option>
                <option value="heroic">Heroic</option>
            </select><br>
            </div>
            <div">
                <label>Element</label><br>
                <input type="text" name="element"><br>
            </div>
            <div>
                <label>Health</label><br>
                <input type="text" name="health"><br>

            </div>
            <div>
                <p><label>Strength</label></p>
                <input type="text" name="strength"><br>

            </div>
            <div>
               <p> <label>Weakness</label></p>
               <input type="text" name="weakness"><br>
            </div>
            <div>
                <p><label>Special Attack</label><br></p>
                <input type="text" name="specialattack"><br>
                   
            </div>
            <div>
            <p><label for="image">Upload Your Photo</label></p>
			<input type="file" name="image" id="image">
            </div>
            <p><input type="submit" name="submit" value="Submit"></p>
            <button><a href="index.php">Cancel</a></button>
</form>

</strength>
</html>
