<?php
  function getaddress($lat,$lng)
  {
     $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=true';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }
  }
?>
<?php
  $lat=15.999656742308103; //latitude
  $lng=120.3150987625122; //longitude
  $address= getaddress($lat,$lng);
  if($address)
  {
    echo $address;
  }
  else
  {
    echo "Not found";
  }
?>