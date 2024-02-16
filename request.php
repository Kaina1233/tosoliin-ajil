<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css">
        <title> member list</title>
    </head>
<body>
<div class="wrapper">
<nav class="nav">
                <!--Menu-->
                    <nav class="nav">
                        <!-- Logo -->
                        <div class="logo"><i class = "fas fa-blog"></i>
                        <p style="display:inline-block;">
                            <a href="index.php" class="logo">
                                <img src="../nomin/images/iuulogo_.jpg" alt="" />
                                <h1 class = "h1_logo">ОУУИС</h1>
                            </a>
                        </p>
                            
                        </div>
                        <form method="post" action = "search_result.php">
                        <!--Menu-->
                        <ul class = "menu">
                            <li><a href="../nomin/index.php">Home</a></li>
                            <li><a href="../munh/myacc1.php">My account</a></li>
                            <li><a href="./logout.php" >Logout</a></li>
                            <li><input type="text" placeholder="Search.." name = "search" required="required"/></li><button>search</button>
        
                        </ul>
                        </form>
    </nav>
</div>
    <div class="button_">
            <button type=button><a href='./request.php'>Request</a></button>
            <button type=button><a href='./list.php'>Member</a></button>
</div>
<div class="container_my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>lastname</th>
                    <th>firstname</th>
                    <th>course</th>
                    <th>student_code</th>
                </tr>
            </thead>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="club";

    $connection = new mysqli($servername, $username, $password, $database);
    if ($connection->connect_error){
        die("Connection failed: " .$connection->connect_error);
    }
    $sql = "SELECT * FROM student";
    $result=$connection->query($sql);

    if(!$result){
        die("Invalid query:" .$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo "
        <tr>
        <td>$row[id]</td>
        <td>$row[lastname]</td>
        <td>$row[firstname]</td>
        <td>$row[course]</td>
        <td>$row[student_code]</td>
        <td>
        <button type= button>Accept</button>
        <button type= button>Reject</button>
        </td>
        </tr>

        ";
    }


    ?>
</table>
    </div>
</div>

</body>
</html>
