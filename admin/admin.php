<?php
    session_start();
    include "../db_connect.php";
    if(isset($_GET['id'])) {
        // write query here
        $email = $_GET['id'];
        $sql = "select * from critics_request where email ='$email'; ";
        $result1 = mysqli_query($conn, $sql);
        $row1 = mysqli_fetch_assoc($result1);
        $name = $row1['name'];
        $type = $row1['critic_type'];
        $qual = $row1['qualification'];
        $pass = $row1['password'];

        $path='noimage.png';
        $sql = "insert into critics (name, profile_pic, email, critic_type, qualification, password) 
                values ('$name','$path','$email', '$type', '$qual','$pass');";
        $result2 = mysqli_query($conn, $sql);
        $sql = "delete from critics_request where email ='$email'; ";
        $result2 = mysqli_query($conn, $sql);

        echo '<script> alert("Approved");setTimeout(()=>{window.location.replace("admin.php");},500); </script>';
    }
    if(isset($_GET['id1'])) {
        // write query here
        $email = $_GET['id1'];
        $sql = "delete from critics_request where email ='$email'; ";
        $result1 = mysqli_query($conn, $sql);
        echo '<script> alert("Discarded");setTimeout(()=>{window.location.replace("admin.php");},500); </script>';
    }
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="../assets/img/logo1.png" type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== CSS ===============--> 
        <link rel="stylesheet" href="../assets/css/styles.css">

        <link rel="stylesheet" href="admin.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

        <title>ArtRise</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <img src="../assets/img/logo1.png" alt="" class="nav__logo-img">
                    ArtRise
                </a>
                
            </nav>
        </header>
        <!--==================== CATEGORY ====================-->
        <main class="main">
            <section class="section category">
                <div class="data" id="admin">
                    <h1 class="welcome">ADMIN SECTION</h1>
                    <h2>Critics Registration List</h2>
                    <table border="1" cellpadding="0">
                        <?php
                            $sql="SELECT * from critics_request;";
                            $result=mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo 
                                '<thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Critic Type</th>
                                        <th>Qualification</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>';
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>" .
                                    "<td>" . $row["name"]. "</td>".
                                    "<td>" . $row["email"]. "</td>".
                                    "<td>" . $row["critic_type"]. "</td>".
                                    "<td>" . $row["qualification"]. "</td>".
                                    "<td> <a href='admin.php?id=".$row['email']."'
                                            class='approve'>Approve</a>  
                                    </td>".
                                    "<td> <a href='admin.php?id1=".$row['email']."'
                                            class='discard'>Discard</a>  
                                    </td>".
                                    "</tr>";
                                }
                            }
                            else
                                echo '<h3>No works as of now!!!</h3>';
                            mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </section>
        </main>        
        <!--=============== MAIN JS ===============-->
        <script src="../assets/js/main.js"></script>
    </body>
</html>