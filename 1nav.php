 <nav class="navbar navbar-expand-lg main-navbar">
     <div class="container">
         <a href="index.php" class="navbar-brand sidebar-gone-hide"><img src="img/banner/logo-white.png" style="width: 200px;"></a>
         <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
         <div class="nav-collapse">
             <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#"><i class="fas fa-ellipsis-v"></i></a>

         </div>
         <form class="form-inline ml-auto" method="post" action="query.php">
             <ul class="navbar-nav">
                 <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
             </ul>
             <div class="search-element">

                 <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search" data-width="250">
                 <button class="btn" type="submit" name="btnsearch"><i class="fas fa-search"></i></button>

                 <!-- <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">Histories</div>
                            <div class="search-item">
                                <a href="#">How to Used HTML in Laravel</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            
                            
                        </div> -->
             </div>
         </form>
         <ul class="navbar-nav navbar-right">


             <?php if (!isset($_SESSION['account'])) {
                ?>
                 <a href="login.php" class="btn btn-success" style="margin-left:15em;">Login</a>
             <?php
                } else {
                ?>
                 <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                         <img alt="image" src="img/user/<?= $row->image; ?>" class="rounded-circle mr-1">
                         <div class="d-sm-none d-lg-inline-block">Hi, <?= $row->name; ?></div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                         <div class="dropdown-title">Online</div>
                         <a href="viewprofile.php" class="dropdown-item has-icon">
                             <i class="far fa-user"></i> Profile
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="login.php" class="dropdown-item has-icon text-danger">
                             <i class="fas fa-sign-out-alt"></i> Logout
                         </a>
                     </div>
                 </li>
             <?php } ?>
         </ul>
     </div>
 </nav>
 <nav class="navbar navbar-secondary navbar-expand-lg">
     <div class="container">
         <ul class="navbar-nav">

             <li class="nav-item ">
                 <a href="shop.php" class="nav-link"><i class="far fa-heart"></i><span>Shop</span></a>
             </li>
             <li class="nav-item ">
                 <a href="notification.php" class="nav-link"><i class="far fa-bell"></i><span>Notification</span></a>
             </li>
             <!--  <li class="nav-item ">
                        <a href="messages.php" class="nav-link"><i class="far fa-envelope"></i><span>Messages</span></a>
                    </li> -->
             <li class="nav-item ">
                 <a href="cart.php" class="nav-link"><i class="fas fa-shopping-bag"></i><span>Cart</span></a>
             </li>
             <li class="nav-item ">
                 <a href="products-map-view.php" class="nav-link"><i class="fas fa-map"></i><span>Map View</span></a>
             </li>
         </ul>
     </div>
 </nav>