<?php include('../1connection.php'); ?>
<?php
// Choose a function depends on value of $_POST["action"]
if($_POST["action"] == "insert2"){
  editname();
}
if($_POST["action"] == "ddd"){
  editimage2();
}

// Function
function editname(){
  global $con;
  $name2 = $_POST["name2"];

  // Check if variable value is empty
  if(empty($name2) ){
    echo 3;
  }else{

        // Check if email still available
        $sameEmail = mysqli_query($con, "SELECT * FROM admin WHERE adminname = '$name2'");
        if(mysqli_num_rows($sameEmail) > 0){
          // Output
          echo 2;
        }else{
          $query = "UPDATE admin set adminname = '$name2' WHERE adminID='1'";
          mysqli_query($con, $query);
         // Output
          echo 1; 
        }
  }
}
function editimage2(){
  global $con;
  $imageupload = $_POST["imageupload"];

  // Check if variable value is empty
 
                $fileName = $_FILES["imageupload"]['name'];
                $tmpName  = $_FILES["imageupload"]['tmp_name']; 
                $fileSize = $_FILES["imageupload"]['size'];
                $fileType = $_FILES["imageupload"]['type'];

                function getExtension($str)
                         {
                             $i = strrpos($str,".");
                             if (!$i) { return ""; }
                             $l = strlen($str) - $i;
                             $ext = substr($str,$i+1,$l);
                             return $ext;
                         }
                    $extension = getExtension($fileName);
                    $extension = strtolower($extension);
                    $final_filename = time().".".$extension;
                    $copied = move_uploaded_file($tmpName, "../img/user/".$final_filename)or die();
           

        
          $query = "UPDATE admin set adminimage = '$fileName' WHERE adminID='1'";
          mysqli_query($con, $query);
         // Output
          echo 1; 
}

// Function
// function editimage2(){
//   global $con;
//   $imageupload = $_POST["imageupload"];

//   // Check if variable value is empty
//   if(empty($imageupload) ){
//     echo 3;
//   }else{

//         if(isset($_FILES["imageupload"]['name'])&&$_FILES["imageupload"]['name']!='')
//             {
//                 $fileName = $_FILES["imageupload"]['name'];
//                 $tmpName  = $_FILES["imageupload"]['tmp_name']; 
//                 $fileSize = $_FILES["imageupload"]['size'];
//                 $fileType = $_FILES["imageupload"]['type'];

//                 function getExtension($str)
//                          {
//                              $i = strrpos($str,".");
//                              if (!$i) { return ""; }
//                              $l = strlen($str) - $i;
//                              $ext = substr($str,$i+1,$l);
//                              return $ext;
//                          }
//                     $extension = getExtension($fileName);
//                     $extension = strtolower($extension);
//                     $final_filename = time().".".$extension;
//                     $copied = move_uploaded_file($tmpName, "../img/user/".$final_filename)or die();
//             }
//             else
//             {
//                     // $final_filename=$_POST['imageturea'];
//             }


        
//           $query = "UPDATE admin set adminimage = '$final_filename' WHERE adminID='1'";
//           mysqli_query($con, $query);
//          // Output
//           echo 1; 
        
//   }
// }