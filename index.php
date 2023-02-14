<?php
include "connect.php";
    //select data from database
    $sql='SELECT * FROM dragon';
    $output = mysqli_query($conn, $sql);
    $displayPerPage = 1; //number of items that being display on each page
    $sql='SELECT * FROM dragon'; 
    $output = mysqli_query($conn, $sql);
    $totalResults = mysqli_num_rows($output);

    // determine no of total pages 
    $noOfPages = ceil($totalResults/$displayPerPage);

   // to determine which page number you are on
    if (!isset($_GET['page'])) {
        $totalPage = 1;
    } 
    else {
        $totalPage = $_GET['page'];
    }

    // determine the sql LIMIT starting number for the results on the displaying page
    $pageResult = ($totalPage-1)*$displayPerPage;

    // retrieve selected results from database and display them on page
    $sql='SELECT * FROM dragon LIMIT ' . $pageResult . ',' .  $displayPerPage;
    $output = mysqli_query($conn, $sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport"
       content="width=device-width, initial-scale=1.0"> 
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
        
        
        td {
            vertical-align: middle;
            text-align: center;
            background-color: grey;
            color: whitesmoke;
        }
        
         tr {
            vertical-align: middle;
            text-align: center;
        }

        body {
            font-family: 'Poppins';
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        img {

            height: 302px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            border-radius: 12px;
            border: 4.5px black solid;

            }

            .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}    
   
    </style>
</head>
<body style="margin: 5px;">
    <h3 style='background-color: grey'>dragonS DATABASE</h3>
    
<label class="switch">
  <input type="checkbox" 
  onclick="updateConnect()">
  <span class="slider"></span>
</label>            


    <div class="container-fluid">
        <table class="table">
            <thead style='background-color: #b1102b'>
                <tr>
                    <th style='width: 10%'> ID </th>
                    <th style='width: 10%'>Name</th>
                    <th style='width: 9%'>Rarity</th>
                    <th style='width: 9%'>Element</th>
                    <th style='width: 10%'>Health</th>
                    <th style='width: 10%'>Strength</th>
                    <th style='width: 10%'>Weakness</th>
                    <th style='width: 10%'>Special Attack</th>
                    <th style='width: 22%'>Options</th>
                 </tr>
            </thead>
            <?php
            while($row = mysqli_fetch_array($output)) {
                echo 
                '<tr>
                <td>' . $row["id"] . '</td>
                <td>' . $row["name"] . '</td>
                <td> ' . $row["rarity"] . '</td>
                <td> ' . $row["element"] . '</td>
                <td> ' . $row["health"] . '</td>
                <td> ' . $row["strength"] . '</td>
                <td> ' . $row["weakness"] . '</td>
                <td> ' . $row["specialattack"] . '</td>
                <td>
                <button id="updatebutton" disabled><a href="Update.php?id='.$row['id'].'">Update</a></button>
                <button><a href="Delete.php?id='.$row['id'].'">Delete</a></button>
                <button><a href="Add.php?id='.$row['id'].'"> Add</a></button>
                <td>
                </tr>
                
                <tr> 
                <td colspan="9" width="250px" height="250px">' . '<img src="'.$row['img_dir'].'" max-width="100%" max-height="100%">' . '</td> 
                </tr>';
            }
        
            ?>

        </table>
        <button><a href="sortByIndex.php">Index Sorting</a></button>
        <button><a href="sortByRarity.php">Rarity Sorting</a></button>

	</div>
     <!-- Pagination -->
     <nav>
            <ul class="pagination justify-content-center">
                <?php
                //First Page
                echo "<li class='page-item'><center><a href='index.php?page=1' ><button>First</button></a></li>";
                ?>

                <?php
                //Previous page
                    if ($totalPage > 1) {
                        echo "<li><a href='index.php?page=".($totalPage-1)."' ><button>Previous</button></a></li>";
                    }
                    else {
                        echo "<li><a href='' ><button type'button' disabled>Previous</button></a></li>";
                    }
                ?>
                
                <?php
                    //Next page
                    if ($totalPage < $noOfPages) {
                        echo "<li><a href='index.php?page=".($totalPage+1)."'><button>Next</button></a></li>";
                    }
                    else {
                        echo "<li><a href='' ><button type'button' disabled >Next</button></a></li>";
                    }
                ?>

                <?php
                //Last Page
                echo "<li><a href='index.php?page=".$noOfPages."'><button>Last</button></a></li>";
                ?>
            </ul>
        </nav>
    </div>
    </table>
    <script>
        function updateConnect() {
            document.getElementById("updatebutton").disabled = (document.getElementById("updatebutton").disabled == true) ? false : true;
        }
    </script>
</body>
</html>
