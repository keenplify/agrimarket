<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php
?>
<!DOCTYPE html>
<html lang="en">

<!-- -->
<?php include('1head.php'); ?>
<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body class="layout-4">
    <?php include_once('../knplfy/includes.php') ?>
    
    <!-- Page Loader -->
    <?php include('1loader.php'); ?>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            <?php include('1topnav.php'); ?>

            <!-- Start main left sidebar menu -->
            <?php include('1leftnav.php'); ?>

            <!-- Start app main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <!--  <h1>Pending Order</h1> -->
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="customer.php">Customer</a></div>
                            <div class="breadcrumb-item ">View Customer</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-7">
                                <div class="card author-box card-primary">
                                    <div class="card-body">
                                        <div class="author-box-left">
                                            <img alt="image" src="../img/user/<?php if ($rowseller->sellerimage == NULL) { ?>null.png<?php } else {
                                                                                                                                    echo $rowseller->sellerimage; ?><?php } ?>" class="ratio-1x1 rounded-circle author-box-picture" style="aspect-ratio: 1;">
                                            <div class="clearfix"></div>
                                            <!-- <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a> -->
                                        </div>
                                        <div class="author-box-details">
                                            <div class="author-box-name">
                                                <a href="#"> <?php echo $rowseller->sellerfirstname;  ?> <?php echo $rowseller->sellerlastname;  ?></a>
                                            </div>
                                            <!-- <div class="author-box-job"><?= $row->status ?></div> -->
                                            <div class="author-box-description">
                                                <p><b>Address: </b><i>lat-</i><?= $rowseller->sellerlatitude ?><i>long-</i><?= $rowseller->sellerlongitude ?></p>
                                                <p><b>Phone Number: </b><?= $rowseller->sellermobilenumber ?></p>
                                                <p><b>Email: </b><?= $rowseller->selleremail ?></p>
                                                <p><b>Date Created Account: </b><?= $rowseller->sellerdatecreated ?></p>
                                            </div>


                                            <div class="w-100 d-sm-none"></div>
                                            <div class=" mt-sm-0 mt-3">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h4></h4>
                                        <div class="card-header-action">
                                            <!-- <a href="#" class="btn btn-danger btn-icon icon-right">View All <i class="fas fa-chevron-right"></i></a> -->
                                        </div>
                                    </div>
                                    <form method="post" action="query.php">
                                        <div class="card-body">
                                            <div class="alert alert-info">
                                                You can drag the marker, change the value of longitude and latitude at the above input and click on the desired position on the map to change the position of the marker.
                                            </div>
                                            <div class="input-group">
                                                <input type="text" name="lat" class="form-control" id="input-lat" placeholder="Latitude" readonly="" hidden="">
                                                <input type="text" name="long" class="form-control" id="input-lng" placeholder="Longitude" readonly="" hidden="">
                                                <input type="text" hidden="" name="sellerID" class="form-control" id="" placeholder="" readonly="" value="<?= $sellerID; ?>">
                                            </div>
                                            <div id="leaflet_map" style="opacity: 100%; min-height: 300px;border: solid 1px"></div>
                                            <hr>
                                            </p>
                                            <div class="text-right">
                                                <button type="submit" name="btnupdateaddress" class="btn btn-success" style="margin-right: 20px;">Yes</button><a href="" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-5">

                                <div class="card ">
                                    <div class="card-header">
                                        <h4>Settings</h4>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="row">

                                            <button data-toggle="modal" data-bs-toggle="modal" data-bs-target="#Pick" data-target="#Pick" class="btn btn-primary" style="margin-right: 15px; margin-bottom: 15px; width: 150px;">Edit Image</button>
                                            <button data-toggle="modal" data-bs-toggle="modal" data-bs-target="#Info" data-target="#Info" class="btn btn-primary" style="margin-right: 15px; margin-bottom: 15px; width: 150px;">Edit Info</button>
                                            <!--  <a href="editaddress.php?sellerid=<?= $rowseller->sellerID ?>"  class="btn btn-primary" style="margin-right: 15px; margin-bottom: 15px; width: 150px;">Edit Address</a> -->
                                            <button data-toggle="modal" data-bs-toggle="modal" data-bs-target="#Sec" data-target="#Sec" class="btn btn-primary" style="margin-right: 15px; margin-bottom:  15px; width: 150px;">Edit Security</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <h4>Activity Log</h4>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="activities">

                                                <?php
                                                $activity = mysqli_query($con, "SELECT *  from activitylog where activitylogUSERTYPE ='seller' and activitylogUSERID ='$sellerID' order by activitylogID desc ") or die(mysqli_error($con));
                                                while ($rowactivity = mysqli_fetch_object($activity)) {
                                                ?>
                                                    <div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary"><i class="fas fa-bell"></i></div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary"><?= $rowactivity->activitylogDATE; ?></span>
                                                                <span class="bullet"></span>

                                                            </div>
                                                            <p><?= $rowactivity->activitylogDESCRIPTION; ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </section>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Start app Footer part -->
            <?php include('1footer.php'); ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <!-- <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/CodiePie.js"></script> -->

    <!-- JS Libraies -->
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script> -->
    <!-- <script src="assets/modules/gmaps.js"></script> -->

    <!-- Page Specific JS File -->
    <!-- <script type="text/javascript">
        "use strict";

        var input_lat = $("#input-lat"), // latitude input text
            input_lng = $("#input-lng"), // longitude input text
            map = new GMaps({ // init map
                div: '#map',
                lat: <?= $rowseller->sellerlatitude ?>,
                lng: <?= $rowseller->sellerlongitude ?>
            });

        // add marker
        var marker = map.addMarker({
            lat: <?= $rowseller->sellerlatitude ?>,
            lng: <?= $rowseller->sellerlongitude ?>,
            draggable: true,
        });

        // when the map is clicked
        map.addListener("click", function(e) {
            var lat = e.latLng.lat(),
                lng = e.latLng.lng();

            // move the marker position
            marker.setPosition({
                lat: lat,
                lng: lng
            });
            update_position();
        });

        // when the marker is dragged
        marker.addListener('drag', function(e) {
            update_position();
        });

        // set the value to latitude and longitude input
        update_position();

        function update_position() {
            var lat = marker.getPosition().lat(),
                lng = marker.getPosition().lng();
            input_lat.val(lat);
            input_lng.val(lng);
        }

        // move the marker when the latitude and longitude inputs change in value
        $("#input-lat,#input-lng").blur(function() {
            var lat = parseInt(input_lat.val()),
                lng = parseInt(input_lng.val());

            marker.setPosition({
                lat: lat,
                lng: lng
            });
            map.setCenter({
                lat: lat,
                lng: lng
            });
        });
    </script> -->
    <!-- <script src="js/page/gmaps-draggable-marker.js"></script> -->

    <!-- JS Libraies -->

    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/features-post-create.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>



<div class="modal fade" id="Pick" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <form id="" action="query.php" method="post" enctype="multipart/form-data">
                <center>
                    <div class="modal-body ">
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" accept="image/*" name="imageupload" id="image-upload" />
                            <input type="text" class="form-control" id="sellerID" name="sellerID" required="" value="<?php echo $rowseller->sellerID; ?>" hidden>
                        </div>
                    </div>
                </center>
                <div class="modal-footer text-center">


                    <button type="submit" name="updateimage" class="btn btn-success btn-lg  waves-effect">Update</button>

                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Info" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <form id="" action="query.php" method="post" enctype="multipart/form-data">

                <div class="modal-body ">
                    <label for="inputEmail4">Name</label>
                    <input type="text" class="form-control" id="" name="name">
                    <label for="inputEmail4">Mobile Number</label>
                    <input type="text" class="form-control" id="" name="number">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="" name="email">
                    <input type="text" class="form-control" id="sellerID" name="sellerID" required="" value="<?php echo $rowseller->sellerID; ?>" hidden>
                </div>

                <div class="modal-footer text-center">


                    <button type="submit" name="btneditprofile" class="btn btn-success btn-lg  waves-effect">Update</button>

                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Sec" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <form id="" action="query.php" method="post" enctype="multipart/form-data">

                <div class="modal-body ">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="text" class="form-control" id="sellerID" name="sellerID" required="" value="<?php echo $rowseller->sellerID; ?>" hidden>
                </div>

                <div class="modal-footer text-center">


                    <button type="submit" name="btnupdatesecurity" class="btn btn-success btn-lg  waves-effect">Update</button>

                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="Add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"></h4>
            </div>
            <form id="" action="query.php" method="post" enctype="multipart/form-data">

                <div class="modal-body ">
                    <div class="row mb-4">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="input-group">
                                <input type="text" class="form-control" id="input-lat-edit" placeholder="Latitude">
                                <input type="text" class="form-control" id="input-lng-edit" placeholder="Longitude">
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        You can drag the marker, change the value of longitude and latitude at the above input and click on the desired position on the map to change the position of the marker.
                    </div>
                </div>

                <div class="modal-footer text-center">


                    <button type="submit" name="btnupdatesecurity" class="btn btn-success btn-lg  waves-effect">Update</button>

                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const defaultCenter = ({
        latitude: <?php echo$rowseller->sellerlatitude  ?>,
        longitude: <?php echo $rowseller->sellerlongitude;  ?>
    })
</script>
<script src="/knplfy/draggable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>