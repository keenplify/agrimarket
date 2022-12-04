<?php include('1connection.php'); ?>
<?php include('1sessionrequired.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!--  -->
<?php include('1head.php') ?>
<link rel="stylesheet" href="assets/css/components.min.css">

<body class="layout-3">
    <?php include_once('knplfy/includes.php') ?>
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


            <!-- Start app main Content -->
            <div class="main-content">

                <section class="section">

                    <div class="section-body">
                        <h2 class="section-title">View Profile</h2>


                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-7">
                                <div class="card author-box card-primary">
                                    <div class="card-body">
                                        <div class="author-box-left">
                                            <img alt="image" src="img/user/<?= $row->image ?>" class="rounded-circle author-box-picture">
                                            <div class="clearfix"></div>
                                            <!-- <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a> -->
                                        </div>
                                        <div class="author-box-details">
                                            <div class="author-box-name">
                                                <a href="#"><?= $row->name ?></a>
                                            </div>
                                            <div class="author-box-job"><?= $row->status ?></div>
                                            <div class="author-box-description">
                                                <p><b>Phone number: </b><?= $row->mobilenumber ?></p>
                                                <p><b>Region: </b><?= $row->region ?></p>
                                                <p><b>Address: </b><?= $row->addresshead ?></p><i style="color: red;">Lat-</i><?php echo $row->lat;  ?><i style="color: red;"> Long-</i><?php echo $row->longi;  ?>
                                            </div>


                                            <div class="w-100 d-sm-none"></div>
                                            <div class=" mt-sm-0 mt-3">
                                                <div class="mb-2 mt-3">
                                                    <div class="text-small font-weight-bold">Settings</div>
                                                </div>
                                                <button data-toggle="modal" data-target="#Pick" class="btn btn-primary">Edit Image</button>
                                                <button data-toggle="modal" data-target="#Info" class="btn btn-primary">Edit Info</button>

                                                <button data-toggle="modal" data-target="#Sec" class="btn btn-primary">Edit Security</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h4></h4>
                                        <div class="card-header-action">
                                            <a href="#" class="btn btn-danger btn-icon icon-right">View All <i class="fas fa-chevron-right"></i></a>
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
                                                <input type="text" hidden="" name="accountID" class="form-control" id="" placeholder="" readonly="" value="<?= $accountID; ?>">
                                            </div>
                                            <div id="leaflet_map" style="opacity: 100%; min-height: 300px;border: solid 1px"></div>
                                            <hr>
                                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Update Address</a>

                                            </p>
                                            <div class="collapse" id="collapseExample">
                                                <form>
                                                    <div class="text-right">
                                                        <button type="submit" name="btnupdateaddress" class="btn btn-success" style="margin-right: 20px;">Yes</button><a href="" class="btn btn-danger">Cancel</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-5">

                                <div class="card ">
                                    <div class="card-header">
                                        <h4>Dashboard</h4>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="row">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-md v_center">
                                                    <tr>
                                                        <th>OrderID</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                    <?php

                                                    $dashboard = mysqli_query($con, "SELECT *  from cart where accountID='$row->accountID' group by orderID, orderSELLER order by cartID desc") or die(mysqli_error($con));
                                                    while ($rowdashboard = mysqli_fetch_object($dashboard)) {
                                                        if ($rowdashboard->orderID != 1) {
                                                            # code...


                                                    ?>
                                                            <tr>
                                                                <td><?= $rowdashboard->orderID;  ?></td>
                                                                <td>
                                                                    <?php if ($rowdashboard->cartSTATUS == 1) { ?>
                                                                        <span class="badge badge-default">Ordered</span>
                                                                    <?php } elseif ($rowdashboard->cartSTATUS == 2) {  ?>
                                                                        <span class="badge badge-primary">Pending</span>
                                                                    <?php } elseif ($rowdashboard->cartSTATUS == 3) {   ?>
                                                                        <span class="badge badge-info">Accepted</span>
                                                                    <?php } elseif ($rowdashboard->cartSTATUS == 4) {  ?>
                                                                        <span class="badge badge-warning">
                                                                            <?= ($rowdashboard->cartTYPE == 'Delivery') ? 'To Deliver' : 'To Pickup'?>
                                                                        </span>
                                                                    <?php } elseif ($rowdashboard->cartSTATUS == 5) {  ?>
                                                                        <span class="badge badge-warning">
                                                                            <?= ($rowdashboard->cartTYPE == 'Delivery') ? 'Delivered' : 'Picked Up'?>
                                                                        </span>
                                                                    <?php } elseif ($rowdashboard->cartSTATUS == 6) {  ?>
                                                                        <span class="badge badge-danger">Cancelled</span>
                                                                    <?php } elseif ($rowdashboard->cartSTATUS == 7) {  ?>
                                                                        <span class="badge badge-success">Pick-Up</span>
                                                                    <?php } ?></p>
                                                                </td>
                                                                <td class="text-center"><a href="vieworder.php?sellerID=<?= $rowdashboard->orderSELLER; ?>&orderid=<?= $rowdashboard->orderID;  ?>" class="btn btn-secondary">Detail</a></td>
                                                            </tr>


                                                            <!--    <?= $rowdashboard->orderSELLER;  ?>   <?= $rowdashboard->accountID;  ?> <BR>       -->
                                                    <?php }
                                                    } ?>
                                                </table>
                                            </div>
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
                                                $activity = mysqli_query($con, "SELECT *  from activitylog where activitylogUSERTYPE ='buyer' and activitylogUSERID ='$row->accountID' order by  activitylogID desc ") or die(mysqli_error($con));
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

            <!-- Start app Footer part -->
            <?php include('1footer.php') ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/CodiePie.js"></script>

    <!-- JS Libraies -->
    <!-- JS Libraies -->
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&amp;sensor=true"></script> -->
    <!-- <script src="assets/modules/gmaps.js"></script> -->
    <!-- Page Specific JS File -->
    <script src="js/page/components-user.js"></script>
    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>
<!-- 
<script type="text/javascript">
    "use strict";

    var input_lat = $("#input-lat"), // latitude input text
        input_lng = $("#input-lng"), // longitude input text
        map = new GMaps({ // init map
            div: '#map',
            lat: <?php echo $row->lat;  ?>,
            lng: <?php echo $row->longi;  ?>
        });

    // add marker
    var marker = map.addMarker({
        lat: <?php echo $row->lat;  ?>,
        lng: <?php echo $row->longi;  ?>,
        draggable: false,
    });

    //when the map is clicked
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

    //set the value to latitude and longitude input
    update_position();

    function update_position() {
        var lat = marker.getPosition().lat(),
            lng = marker.getPosition().lng();
        input_lat.val(lat);
        input_lng.val(lng);
    }

    //move the marker when the latitude and longitude inputs change in value
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
                            <input type="text" class="form-control" id="" name="accountID" required="" value="<?php echo $row->accountID; ?>" hidden>
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
                    <input type="text" class="form-control" id="" name="name" value="<?= $row->name; ?>">
                    <label for="inputEmail4">Mobile Number</label>
                    <input type="text" class="form-control" id="" name="number" value="<?= $row->mobilenumber; ?>">
                    <label for="inputEmail4">House No.</label>
                    <input type="text" class="form-control" id="" name="no">
                    <div class="form-group">
                        <label>Region</label>
                        <select id="region" class="form-control" name="region"></select>
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <select id="province" class="form-control" name="province"></select>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select id="city" class="form-control" name="city"></select>
                    </div>
                    <div class="form-group">
                        <label>Barangay</label>
                        <select id="barangay" class="form-control" name="barangay"></select>
                    </div>
                    <input type="text" class="form-control" id="accountID" name="accountID" required="" value="<?php echo $row->accountID; ?>" hidden>
                    <input type="text" name="region2" hidden>
                    <input type="text" name="province2" hidden>
                    <input type="text" name="city2" hidden>
                    <input type="text" name="barangay2" hidden>
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
                    <input type="text" class="form-control" id="accountID" name="accountID" required="" value="<?php echo $row->accountID; ?>" hidden>
                </div>

                <div class="modal-footer text-center">


                    <button type="submit" name="btnupdatesecurity" class="btn btn-success btn-lg  waves-effect">Update</button>

                    <a href="" class="btn btn-danger btn-lg waves-effect" data-dismiss="modal">No</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script> -->
<!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
<script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>



<script type="text/javascript">
    var my_handlers = {

        fill_provinces: function() {

            var region_code = $(this).val();
            $('#province').ph_locations('fetch_list', [{
                "region_code": region_code
            }]);

        },

        fill_cities: function() {

            var province_code = $(this).val();
            $('#city').ph_locations('fetch_list', [{
                "province_code": province_code
            }]);
        },


        fill_barangays: function() {

            var city_code = $(this).val();
            $('#barangay').ph_locations('fetch_list', [{
                "city_code": city_code
            }]);
        }
    };

    $(function() {
        $('#region').on('change', my_handlers.fill_provinces);
        $('#province').on('change', my_handlers.fill_cities);
        $('#city').on('change', my_handlers.fill_barangays);

        $('#region').ph_locations({
            'location_type': 'regions'
        });
        $('#province').ph_locations({
            'location_type': 'provinces'
        });
        $('#city').ph_locations({
            'location_type': 'cities'
        });
        $('#barangay').ph_locations({
            'location_type': 'barangays'
        });

        $('#region').ph_locations('fetch_list');


        $('#region').on('change', function() {


            var selected_caption = $("#region option:selected").text();


            $('input[name=region2]').val(selected_caption);

        }).ph_locations('fetch_list');
        $('#province').on('change', function() {


            var selected_province = $("#province option:selected").text();


            $('input[name=province2]').val(selected_province);

        }).ph_locations('fetch_list');
        $('#city').on('change', function() {


            var selected_city = $("#city option:selected").text();


            $('input[name=city2]').val(selected_city);

        }).ph_locations('fetch_list');
        $('#barangay').on('change', function() {


            var selected_barangay = $("#barangay option:selected").text();


            $('input[name=barangay2]').val(selected_barangay);

        }).ph_locations('fetch_list');
    });
</script>
<script>
    const defaultCenter = ({
        latitude: <?php echo $row->lat;  ?>,
        longitude: <?php echo $row->longi;;  ?>
    })
</script>
<script src="/knplfy/draggable.js"></script>

<?php include('./knplfy/footer.php'); ?>