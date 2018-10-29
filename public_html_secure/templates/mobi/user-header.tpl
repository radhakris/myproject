<header id="header" class="header-scroll top-header headrom">
    <!-- .navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="/"> <img class="img-rounded" src="/images/food-picky-logo.png" alt=""> </a>
            {if $smarty.session.user_id eq ''}
            <span class="login_register"><a href="/register">Register</a>|<a href="/login">Login</a></span>
            {else}
            <span class="login_register"><a href="/logout">Logout</a></span>
            {/if}

            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">About Us</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">How it works</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">Gallery</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">Testimonials</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">Contact Us</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->
</header>