<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <div>
        <table>
            <tr>
                <td>Region</td>
                <td><select id="region"></select></td>
            </tr>
            <tr>
                <td>Province</td>
                <td><select id="province"></select></td>
            </tr>
            <tr>
                <td>City</td>
                <td><select id="city"></select></td>
            </tr>
            <tr>
                <td>Barangay</td>
                <td><select id="barangay"></select></td>
            </tr>
        </table>


        <form>
            <input type="text" name="region2">
            <input type="text" name="province2">
            <input type="text" name="city2">
            <input type="text" name="barangay24">

        </form>

    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
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
    <?php include('./knplfy/footer.php'); ?>

</body>

</html>