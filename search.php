<?php

error_reporting(E_ALL ^ E_WARNING);

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
            session_start();
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
        <li  onclick="opensidebar()" class="secondary-menu-li-sidebar smtsidebar"><a style="margin-left: 65px;" class="secondary-menu-text">All Products</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=mobile">Mobile</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=gaming">Gaming</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=office">Home Office</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="search.php?type=tvsound">TV & Sound</a></li>
        <li class="secondary-menu-li-inside"><a class="secondary-menu-text" href="tecnews.php">Tec News</a></li>
    </ul>
</div>

<div class="searchcontent">

<section class="filters">


    <section>

        <h5>Filters</h5>

        <section class="mb-4">

            <h6 class="font-weight-bold mb-3">Condition</h6>

            <div class="form-check pl-0 mb-3">
                <input type="checkbox" class="form-check-input filled-in" id="new">
                <label class="form-check-label small text-uppercase card-link-secondary" for="new">New</label>
            </div>
            <div class="form-check pl-0 mb-3">
                <input type="checkbox" class="form-check-input filled-in" id="used">
                <label class="form-check-label small text-uppercase card-link-secondary" for="used">Used</label>
            </div>
            <div class="form-check pl-0 mb-3">
                <input type="checkbox" class="form-check-input filled-in" id="collectible">
                <label class="form-check-label small text-uppercase card-link-secondary" for="collectible">Collectible</label>
            </div>

        </section>

        <section class="mb-4">

            <h6 class="font-weight-bold mb-3">Price</h6>

            <div class="slider-price d-flex align-items-center my-4">
                <span class="font-weight-normal small text-muted mr-2">$0</span>
                <form class="multi-range-field w-100">
                    <input id="multi" class="multi-range" type="range" />
                </form>
                <span class="font-weight-normal small text-muted ml-2">$100</span>
            </div>
        </section>


        <section class="mb-4">

            <h6 class="font-weight-bold mb-3">Ilumination</h6>

            <div class="form-check pl-0 mb-3">
                <input type="radio" class="form-check-input" id="under25" name="materialExampleRadios">
                <label class="form-check-label small text-uppercase card-link-secondary" for="under25"> Hide RGB</label>
            </div>
            <div class="form-check pl-0 mb-3">
                <input type="radio" class="form-check-input" id="2550" name="materialExampleRadios">
                <label class="form-check-label small text-uppercase card-link-secondary" for="2550">Full RGB</label>
            </div>
            <div class="form-check pl-0 mb-3">
                <input type="radio" class="form-check-input" id="50100" name="materialExampleRadios">
                <label class="form-check-label small text-uppercase card-link-secondary" for="50100">None</label>
            </div>
        </section>


        <section class="mb-4">

            <h6 class="font-weight-bold mb-3">Size</h6>

            <div class="form-check pl-0 mb-3">
                <input type="checkbox" class="form-check-input filled-in" id="34">
                <label class="form-check-label small text-uppercase card-link-secondary" for="34">34</label>
            </div>
            <div class="form-check pl-0 mb-3">
                <input type="checkbox" class="form-check-input filled-in" id="36">
                <label class="form-check-label small text-uppercase card-link-secondary" for="36">36</label>
            </div>
            <div class="form-check pl-0 mb-3">
                <input type="checkbox" class="form-check-input filled-in" id="38">
                <label class="form-check-label small text-uppercase card-link-secondary" for="38">38</label>
            </div>
        </section>

    </section>

</section>

<?php




require_once("connection.php");
    if($_SESSION['admin']==1) {

                    if (isset($_POST["submit"])) {

                        $search = $_POST["search"];
                        $sqlQuery = "SELECT * FROM produto WHERE nome LIKE ?";

                        $name = "%$search%";
                        $ps = $conn->prepare($sqlQuery);
                        $ps->bind_param("s", $name);
                        $ps->execute();
                        $result = $ps->get_result();

                        while ($row = $result->fetch_assoc()) {
                            echo "         
                                                                    <div class='card'>
                                                                                 <img class='card-img-top' style='width: 60%;' src='" . $row["imagem"] . "'>
                                                                                  <div class='card-body'>
                                                                                         <h4><b>" . $row['nome'] . "</b></h4>
                                                                                         <h5>" . $row['preco'] . " €</h5>
                                                                                         <p>" . $row['descricaop'] . "</p>
                                                                                         <a href='produto.php?produto_id=".$row['id']."' class='seemore'>See More</a>
                                                                                         <a href='produtodelete.php?id=".$row['id']."' class='seemore'>Delete</a>
                                                                                 </div>
                                                                    </div>
                                                         ";
                        }
                    } else if (isset($_GET["type"])) {

                        $sqlQuery = "SELECT * FROM produto WHERE type=?";

                        $ps = $conn->prepare($sqlQuery);
                        $ps->bind_param("s", $_GET['type']);
                        $ps->execute();
                        $result = $ps->get_result();

                        while ($row = $result->fetch_assoc()) {
                            echo "         
                                                                    <div class='card'>
                                                                                 <img class='card-img-top' style='width: 60%;' src='" . $row["imagem"] . "'>
                                                                                  <div class='card-body'>
                                                                                         <h4><b>" . $row['nome'] . "</b></h4>
                                                                                         <h5>" . $row['preco'] . " €</h5>
                                                                                         <p>" . $row['descricaop'] . "</p>
                                                                                         <a href='produto.php?produto_id=" . $row['id'] . "' class='seemore'>See More</a>
                                                                                         <a href='produtodelete.php?id=".$row['id']."' class='seemore'>Delete</a>
                                                                                 </div>
                                                                    </div>
                                                        
                                                         ";
                        }

                    } else {
                        echo "Produto não encontrado";
                    }

    }else {
        if (isset($_POST["submit"])) {

            $search = $_POST["search"];
            $sqlQuery = "SELECT * FROM produto WHERE nome LIKE ?";

            $name = "%$search%";
            $ps = $conn->prepare($sqlQuery);
            $ps->bind_param("s", $name);
            $ps->execute();
            $result = $ps->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "         
                                                                            <div class='card'>
                                                                                         <img class='card-img-top' style='width: 60%;' src='" . $row["imagem"] . "'>
                                                                                          <div class='card-body'>
                                                                                                 <h4><b>" . $row['nome'] . "</b></h4>
                                                                                                 <h5>" . $row['preco'] . " €</h5>
                                                                                                 <p>" . $row['descricaop'] . "</p>
                                                                                                 <a href='produto.php?produto_id=" . $row['id'] . "' class='seemore'>See More</a>
                                                                                         </div>
                                                                            </div>
                                                                 ";
            }
        } else if (isset($_GET["type"])) {

                        $sqlQuery = "SELECT * FROM produto WHERE type=?";

                        $ps = $conn->prepare($sqlQuery);
                        $ps->bind_param("s", $_GET['type']);
                        $ps->execute();
                        $result = $ps->get_result();

                        while ($row = $result->fetch_assoc()) {
                            echo "         
                                                                                        <div class='card'>
                                                                                                     <img class='card-img-top' style='width: 60%;' src='" . $row["imagem"] . "'>
                                                                                                      <div class='card-body'>
                                                                                                             <h4><b>" . $row['nome'] . "</b></h4>
                                                                                                             <h5>" . $row['preco'] . " €</h5>
                                                                                                             <p>" . $row['descricaop'] . "</p>
                                                                                                             <a href='produto.php?produto_id=" . $row['id'] . "' class='seemore'>See More</a>
                                                                                                     </div>
                                                                                        </div>
                                                                             ";
                        }

                    } else {
                        echo "Produto não encontrado";
                    }
    }
?>
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
</html>