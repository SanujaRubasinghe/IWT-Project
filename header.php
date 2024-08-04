<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        
        echo "<nav class='nav-bar' id='nav-bar'>
            <div class='logo'>MyLogo</div>
            <form id='search'>
                <input type='text'placeholder='Search' id='search-input' onkeyup='showSuggestion(this.value)' autocomplete='off'> 
                <!-- <button type='submit' id='search-btn'><i class='fa-solid fa-magnifying-glass'></i></button> -->
            </form>
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li><a href='products.php'>Products</a></li>
                <li><a href='#home'>Contact</a></li>
                <li><a href='cart.php'>Cart<i class='fa-solid fa-cart-shopping'></i><sup id='cart-item-count'></sup></a></li>
                <li><a href='user_profile.php'>myProfile</a></li>
                <li class='icon'><a href='javascript:void(0);' onclick='show()'><i class='fa fa-bars'></i></a>
            </ul>
            <section id='search-suggestion'>
                <ul id='suggestion-list'></ul>
            </section>
        </nav>";
    } else {

        echo '<nav class="nav-bar">
        <div class="logo">MyLogo</div>
        <form id="search">
            <input type="text" placeholder="Search" id="search-input" onkeyup="showSuggestion(this.value)" autocomplete="off"> 
            <!-- <button type="submit" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button> -->
        </form>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="#home">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>';

    }
?>