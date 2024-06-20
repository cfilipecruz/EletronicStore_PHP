<?php
session_start();

require_once("connection.php");

$produto_id = $_GET["produto_id"];
$sqlQuery = "SELECT * FROM produto WHERE id=?";

$ps = $conn->prepare($sqlQuery);
$ps->bind_param("i", $produto_id);
$ps->execute();
$result = $ps->get_result();

while($row = $result->fetch_assoc()) {
    $nomeProduto = $row['nome'];
    $preco = $row['preco'];
    $descricaon = $row['descricaon'];
    $descricaop = $row['descricaop'];
    $caracteristica = $row['caracteristica'];
    $stock =  $row['stock'];
    $imagem =  $row['imagem'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css"/>
    <script type="text/javascript" src="Js.js"></script>
</head>

<body>

<div class="header">
    <div class="logo">
        <h1>
            <a  href="MainPage.php">Intech</a>
        </h1>
    </div>
    <div style="line-height: 100px;  vertical-align:middle;">
        <form method="post" action="search.php">
            <input class="searchbar" type="text" placeholder="Search Products" name="search">
            <input class="searchBtn" value="Search" type="submit" name="submit">
        </form>
    </div>

    <div id="headerOptions">

        <li>
            <a href="contacts.php">
                <div href="contacts.php" class="header-buttons header-buttons-contacts"></div>
                <a class="header-buttons-text">Contacts</a>
            </a>
        </li>
        <li>
            <a href="wishlist.php">
                <div class="header-buttons header-buttons-wishlist"></div>
                <a class="header-buttons-text" href="checkout.php">Wishlist</a>
            </a>
        </li>
        <li>
            <a href="cart.php">
                <div class="header-buttons header-buttons-cart"></div>
                <a class="header-buttons-text" href="cart.php">Cart</a>
            </a>
        </li>
        <li>
            <?php

            if (isset($_SESSION['user'])) { //login feito
                echo'
                                        <a onclick="openNav5()">
                                            <div class="header-buttons header-buttons-login"></div>
                                            <a class="header-buttons-text">
                                            <a class="header-buttons-text" href="cart.php">Account</a>
                                        </a>';
            }
            else { //sem login
                echo '
                                         <a onclick="openNav1()">
                                            <div class="header-buttons header-buttons-login"></div>
                                            <a class="header-buttons-text">
                                            <a class="header-buttons-text" href="cart.php">Login</a>
                                        </a>';
            }
            ?>
        </li>
    </div>
</div>
<div class="secondary-menu">
    <ul class="secondary-menu-li">
        <li class="secondary-menu-li-sidebar smtsidebar"><a href="#" style="margin-left: 65px;" class="secondary-menu-text">All Products</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="news.asp">Mobile</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="contact.asp">Gaming</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="about.asp">Home Office</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="about.asp">TV & Sound</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="tecnews.php">Tec News</a></li>
    </ul>
</div>



<div class="product">
    <div style="display: flex; margin-top: 20px; align-items: center;" >
        <div style="height: 500px; width:900px; ">

            <?php
                    echo "
                                    <div>
                                       <img alt='Image Not Available' class='card-img-top' src='".$imagem."'>     
                                    </div>
                                  ";
            ?>
        </div>

        <div style="display: block; margin-left: 50px;">
            <div style="display:flex; font-size: 30px; color: rgb(112,112,112); font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;">
                <h2><?php echo $nomeProduto ?></h2>
                <div style="margin-left: 100px;"><h3> <?php echo $preco ?>  €</h3></div>
            </div>
            <div>
                <div style="text-align: center; border: 1px solid rgb(112,112,112); cursor:pointer; height: 50px; font-size: 20px; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;">
                <a style=" color: rgb(112,112,112); font-size: 40px; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; ">Add to WishList </a>
                </div>

                <div style="float:right; height: 30px; font-size: 20px; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; ">

                </div>
                <p><?php echo $descricaop ?> </p>
                <div style=" margin-top: 30px; height: 70px; border: solid 1px black; border-radius: 10px; text-align: center; color: rgb(112,112,112)">
                    <a style=" text-align: center; color: rgb(112,112,112); font-size: 50px; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; ">Add to Cart</a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="secondary-menu">
    <ul class="secondary-menu-li">
        <li class="secondary-menu-li-sidebar smtsidebar"><a onclick="opensidebar()" style="margin-left: 65px;" class="secondary-menu-text">All Products</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=mobile">Mobile</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=gaming">Gaming</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=office">Home Office</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=tvsound">TV & Sound</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="tecnews.php">Tec News</a></li>
    </ul>
</div>

    <p style="display: flex; margin: auto; width:1600px; margin-top: 20px;"><?php echo $descricaon ?></p>
</div>

<div id="mySidenav1" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
    <a onclick="openNav2(), closeNav1()" > <p> Log In </p> </a>
    <a onclick="openNav4(), closeNav1()" ><p> Sign In </p> </a>
</div>

<div id="mySidenav2" class="sidenav" >
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
    <div class="loginwith">
        <a> <img src="Assets/Icons/google.png" alt="Google logo" /> <p> Log in with Google </p> </a>
        <a onclick="closeNav2(), openNav3()"> <img src="Assets/Icons/email.png" alt="Email logo"/> <p> Log in with Email </p> </a>
    </div>
</div>

<div id="mySidenav3" class=" sidenav userlogin">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
    <form action="login.php" method="post">
        <label >Email:</label><br>
        <input type="email" id="email" name="email" onfocus="this.value=''" value="panda10@gmail.com"
               required="required" minlength=10 maxlength=50><br><br>
        <label >Password:</label><br>
        <input type="password" id="password" name="password" onfocus="this.value=''" value="*********" required="required"
               minlength=4 maxlength=50><br><br>
        <input  type="submit"  value="Login" />
    </form>
</div>

<div id="mySidenav4" class=" sidenav usersignin">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav4()">&times;</a>
    <form action="login.php" method="post">
        <label for="fname">Usarname:</label><br>
        <input type="text" id="name" name="name" onfocus="this.value=''" value="Panda10" required="required" minlength=8
               maxlength=20><br>
        <label for="lname">E-mail:</label><br>
        <input type="email" id="email" name="email" onfocus="this.value=''" value="panda10@gmail.com"
               required="required" minlength=10 maxlength=50><br><br>
        <label for="lname">Password:</label><br>
        <input type="password" id="pass1" name="pass1" onfocus="this.value=''" value="*********" required="required"
               minlength=5 maxlength=50><br><br>
        <label for="lname">Repeat Password:</label><br>
        <input type="password" id="pass2" name="pass2" onfocus="this.value=''" value="*********" required="required"
               minlength=8 maxlength=50><br><br>
        <input type="submit" value="Submit">
    </form>
</div>

<div id="mySidenav5" class="sidenav" >
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav5()">&times;</a>

    <?php
    require_once("connection.php");

    $sqlQuery = "SELECT * FROM utilizadores";

    $ps = $conn->prepare($sqlQuery);
    $ps->execute();
    $result = $ps->get_result();
    $row = $result->fetch_assoc();

    if ($_SESSION['admin']== 1) {

        echo '        
                                            <h5 class="userhello"> Hello ' . $row["username"] . '</h5>
                                            <div class="account">
                                                    <ul>
                                                            <li> <a  href="myaccount . php">My Account</a></li>
                                                            <li> <a  href="cart . php">Cart</a></li>
                                                            <li> <a  href="#">Wishlist</a></li>
                                                            <li> <a  href = "#" > History</a ></li>
                                                            <li> <a  href = "#" > My Orders </a ></li>
                                                            <li> <a  href = "#" > Warranty Tables </a ></li>
                                                            <li> <a  href = "admin.php" > Admin </a ></li>
                                                    </ul>
                                            </div >
                                            
                                            <div class="logout" >
                                                    <a  href = "logout.php" >Log Out </a >
                                            </div >
                                        ';
    }else {
        echo '
                                        <h5 class="userhello"> Hello ' . $row["username"] . '</h5>
                                        <div class="account">
                                                <ul>
                                                        <li> <a  href="myaccount . php">My Account</a></li>
                                                        <li> <a  href="cart . php">Cart</a></li>
                                                        <li> <a  href="#">Wishlist</a></li>
                                                        <li> <a  href = "#" > History</a ></li>
                                                        <li> <a  href = "#" > My Orders </a ></li>
                                                        <li> <a  href = "#" > Warranty Tables </a ></li>
                                                </ul>
                                        </div >
                    
                                        <div class="logout" >
                                                <a  href = "logout.php" >Log Out </a >
                                        </div >
                                 ';
    }
    ?>
</body>