<?php include('1connection.php'); ?>
<?php include('1session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!--  -->
<?php include('1head.php') ?>

<body class="layout-3">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>

        <!-- Start app top navbar -->
       
<?php include('1nav.php'); ?>
        <!-- Start top menu -->
 <style>
.filterDiv {
  float: left;
 /* background-color: #2196F3;
  color: #ffffff;
  width: 100px;
  line-height: 100px;
  text-align: center;
  margin: 2px;*/
  display: none;
}

.show {
  display: block;
}



/* Style the buttons */


.btn.active {
  background-color: white;
  color: red;
}
</style>
        <!-- Start app main Content -->
        <div class="main-content">

            <section class="section" >
                            
             <h2 class="section-title" style="margin-top: 50PX;">Shop</h2>                 
                <div class="section-body">

                  <div class="row" >
                     <div class="col-12">
                         <div class="card">
                          
                                  
                                <div class="card-header">
                                  <h5>Filter:</h5>
                                </div>
                                  <div class="card-body">

                                   <div id="myBtnContainer">
                                    <button  class="btn btn-light" style="margin-bottom: 5px;" onclick="filterSelection('all')"> Show all</button>
<?php
$info=$_GET['info'];
 $category=mysqli_query($con,"SELECT *  from category ")or die(mysqli_error($con));
              while($rowcategory=mysqli_fetch_object($category))
              {
?>
                                    <button class="btn btn-light" style="margin-bottom: 5px;" onclick="filterSelection('<?php echo $rowcategory->categoryNAME;?>')"> <?php echo $rowcategory->categoryNAME;?></button>
<?php } ?>
                                  </div>
                                </div>
                         </div> 
                      </div>  
                   </div>

                   <div class="row" >
                   
<?php
 $item=mysqli_query($con,"SELECT *  from item where itemCATEGORY LIKE  '%$info%' or itemNAME LIKE '%$info%' ")or die(mysqli_error($con));
              while($rowitem=mysqli_fetch_object($item))
              {
?>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 filterDiv <?php echo $rowitem->itemCATEGORY;?>" style="margin-top: 10px;">
                                    <article class="article article-style-b ">
                                        <div class="article-header">
                                            <div class="article-image" data-background="img/product/<?= $rowitem->itemIMG;?>">
                                            </div>
                                            <div class="article-badge">
                                               
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-title">
                                                <h2><a href="#"><?= substr($rowitem->itemNAME, 0, 20) ;?></a></h2>
                                            </div>
                                            <p><B>PRICE: </B><?= $rowitem->itemPRICE;?> </p>
                                            <div class="article-cta">
                                                <a href="viewproduct.php?itemid=<?= $rowitem->itemID;?>" class="btn btn-success">View Product <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
<?php } ?>    
                            </div>


                 </div>   
                    
               
                         <div class="row" >
                          <center>
                     <div class="col-12 text-center">
                          
                              
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item active"><a class="page-link " href="#">1</a></li>
                                        
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                               
                           
                            </div>
                            </div>
                           </center>
            </section>
        </div>
        
        <!-- Start app Footer part -->
      <?php include('1footer.php') ?>
    </div>
</div>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<!-- JS Libraies -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script>
<script src="assets/modules/gmaps.js"></script>
<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>
<script type="text/javascript">
   "use strict";

var input_lat = $("#input-lat"), // latitude input text
  input_lng = $("#input-lng"), // longitude input text
  map = new GMaps({ // init map
    div: '#map',
    lat: <?php echo $rowseller->sellerlatitude;  ?>,
    lng: <?php echo $rowseller->sellerlongitude;  ?>
  });

// add marker
var marker = map.addMarker({
  lat: <?php echo $rowseller->sellerlatitude;  ?>,
  lng: <?php echo $rowseller->sellerlongitude;  ?>,
  draggable: false,
});

// when the map is clicked
// map.addListener("click", function(e) {
//   var lat = e.latLng.lat(), 
//     lng = e.latLng.lng();

//   // move the marker position
//   marker.setPosition({
//     lat: lat,
//     lng: lng
//   });
//   update_position();       
// });

// // when the marker is dragged
// marker.addListener('drag', function(e) {
//   update_position();
// });

// set the value to latitude and longitude input
// update_position();
// function update_position() {
//   var lat = marker.getPosition().lat(), lng = marker.getPosition().lng();
//   input_lat.val(lat);
//   input_lng.val(lng);
// }

// move the marker when the latitude and longitude inputs change in value
// $("#input-lat,#input-lng").blur(function() {
//   var lat = parseInt(input_lat.val()), 
//     lng = parseInt(input_lng.val());

//   marker.setPosition({
//     lat: lat,
//     lng: lng
//   });
//   map.setCenter({
//     lat: lat,
//     lng: lng
//   });
// }); 

</script>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>


<?php include('./knplfy/footer.php'); ?>