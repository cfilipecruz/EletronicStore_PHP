<?php

        session_start();

        if ($_SESSION['admin'] == 1) {

            $_username['admin'] = $_SESSION['admin'];

        } else {
            header("location:MainPage.php");
            exit();
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
        <li class="secondary-menu-li-sidebar smtsidebar"><a onclick="opensidebar()" style="margin-left: 65px;" class="secondary-menu-text">All Products</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=mobile">Mobile</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=gaming">Gaming</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=office">Home Office</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=tvsound">TV & Sound</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="tecnews.php">Tec News</a></li>
    </ul>
</div>

<div class="addproduto">
    <form method="POST" enctype="multipart/form-data" action="produtopost.php">
        <label for="fname">Name:</label>
        <input type="text" id="fname" name="nome"><br>
        <label for="number">Price</label>
        <input type="mumber" id="lname" name="preco"><br>
        <label for="lname"> Normal description:</label>
        <input type="text" id="lname" name="descricaon"><br>
        <label for="lname">Complete description:</label>
        <input type="text" id="lname" name="descricaop"><br>
        <label for="lname">Stock:</label>
        <input type="number" id="lname" name="stock"><br>
        <label for="lname">Type:</label>
        <input type="text" id="lname" name="type"><br>
        <label for="lname">Image:</label>
        <input style="cursor: pointer" type="file" id="Add Image" value="Add image" name="Upload"><br>
        <button style="cursor: pointer" type="submit"> Add Product</button>
    </form>
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
    <form action="registar.php" method="post">
        <label for="fname">Usarname:</label><br>
        <input type="text" id="username" name="username" onfocus="this.value=''" value="Panda10" required="required" minlength=4
               maxlength=20><br>
        <label for="lname">E-mail:</label><br>
        <input type="email" id="email" name="email" onfocus="this.value=''" value="panda10@gmail.com"
               required="required" minlength=10 maxlength=50><br><br>
        <label for="lname">Password:</label><br>
        <input type="password" id="pass" name="password" onfocus="this.value=''" value="*********" required="required"
               minlength=5 maxlength=50><br><br>
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
                                            <h5 class="userhello"> Hello ' .   $_SESSION['username'] . '</h5>
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
                                        <h5 class="userhello"> Hello ' .  $_SESSION['username'] . '</h5>
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
</div>
</body>
</html>
