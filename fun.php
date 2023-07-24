<?php


$_24TIME=date("Y-m-d H:i:s");

date_default_timezone_set("Asia/Kolkata");
$_DATE = date('Y-m-d');
date_default_timezone_set("Asia/Kolkata");
$_TIME = date("h:i:sa");

function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}


function _AddDay($date,$add_date,$type,$formate)
{
$date = strtotime($date); 
$date = strtotime("$add_date  $type", $date);
$addday=date($formate, $date);
return $addday;


}


function    image_move($file,$location)
{
  # code...

$fileName = $_FILES[$file]["name"];
$fileTmpLoc = $_FILES[$file]["tmp_name"];
$fileType = $_FILES[$file]["type"];
$fileSize = $_FILES[$file]["size"];
    
    $info = getimagesize($fileTmpLoc);
      $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
        //  echo "File is valid, and was successfully uploaded.\n";
    } else {
      echo "Upload failed";
    }   
       
 
  
return$destfile;



}



function mul_image_move($file,$location)
{
    # code...
foreach ($_FILES[$file]['tmp_name'] as $key => $value) { 
      
        $fileName = $_FILES[$file]["name"][$key];
        $fileTmpLoc = $_FILES[$file]["tmp_name"][$key];
        $fileType = $_FILES[$file]["type"][$key];
        $fileSize = $_FILES[$file]["size"][$key];

        $info = getimagesize($fileTmpLoc);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
            
        } else {
            echo "Upload failed";
        }   


        $path[]=$destfile;
}

  
return$path;



}














function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function age($birthDate)
{
    //$birthDate = "12-17-1983";
    //$birthDate = "2018-12-09";
      $birthDate = explode("-", $birthDate);
      //print_r($birthDate);
      $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[0], $birthDate[1]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
      
   return $age;
}




function _count_Time($timestamp,$location){
  if ($location=="") {
    $location="Asia/Kolkata";
  } else {
    $location=$location;
  }
  
  date_default_timezone_set($location);         
  $time_ago        = strtotime($timestamp);
  $current_time    = time();
  $time_difference = $current_time - $time_ago;
  $seconds         = $time_difference;
  
  $minutes = round($seconds / 60); // value 60 is seconds  
  $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
  $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
  $weeks   = round($seconds / 604800); // 7*24*60*60;  
  $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
  $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
                
  if ($seconds <= 60){

    return "Just Now";

  } else if ($minutes <= 60){

    if ($minutes == 1){

      return "one minute ";

    } else {

      return "$minutes minutes ";

    }

  } else if ($hours <= 24){

    if ($hours == 1){

      return "an hour ";

    } else {

      return "$hours hrs ";

    }

  } else if ($days <= 7){

    if ($days == 1){

      return "yesterday";

    } else {

      return "$days days ";

    }

  } else if ($weeks <= 4.3){

    if ($weeks == 1){

      return "a week ";

    } else {

      return "$weeks weeks ";

    }

  } else if ($months <= 12){

    if ($months == 1){

      return "a month ";

    } else {

      return "$months months ";

    }

  } else {
    
    if ($years == 1){

      return "one year ";

    } else {

      return "$years years ";

    }
  }
}



function empty_img($file)
{

if (empty($_FILES[$file]['name'][0])) {
  
  $res=0;
  
}else{

  $res=1;


}


return $res;

}


function _empty_img2($img_path,$file,$location)
{

if (empty($_FILES[$file]['name'][0])) {
  
  $res=$img_path;
  
}else{

 
$fileName = $_FILES[$file]["name"];
$fileTmpLoc = $_FILES[$file]["tmp_name"];
$fileType = $_FILES[$file]["type"];
$fileSize = $_FILES[$file]["size"];
    
        $info = getimagesize($fileTmpLoc);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
        //  echo "File is valid, and was successfully uploaded.\n";
        } else {
          echo "Upload failed";
        }   
       
 
  
$res=$destfile;


}


return $res;

}


function _one_empty_img2($img_path,$file,$location)
{

if (empty($_FILES[$file]['name'])) {
  
  $res=$img_path;
  
}else{

 
$fileName = $_FILES[$file]["name"];
$fileTmpLoc = $_FILES[$file]["tmp_name"];
$fileType = $_FILES[$file]["type"];
$fileSize = $_FILES[$file]["size"];
    
        $info = getimagesize($fileTmpLoc);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
        //  echo "File is valid, and was successfully uploaded.\n";
        } else {
          echo "Upload failed";
        }   
       
 
  
$res=$destfile;


}


return $res;

}







function _update_db_img($conn,$tbl,$rowname,$ID,$file,$location)
{

if (empty($_FILES[$file]['name'][0])) {
  
$sql = "SELECT * FROM $tbl WHERE ID=$ID";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {                            
 
 $res=$row[$rowname];                            
              
    }
} else {
  $res='';
  }
  
}else{

 
$fileName = $_FILES[$file]["name"];
$fileTmpLoc = $_FILES[$file]["tmp_name"];
$fileType = $_FILES[$file]["type"];
$fileSize = $_FILES[$file]["size"];
    
        $info = getimagesize($fileTmpLoc);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
        //  echo "File is valid, and was successfully uploaded.\n";
        } else {
          echo "Upload failed";
        }   
       
 
  
$res=$destfile;


}


return $res;

}








function custom_copy($src, $dst) {  
  
    // open the source directory 
    $dir = opendir($src);  
  
    // Make the destination directory if not exist 
    @mkdir($dst);  
  
    // Loop through the files in source directory 
    while( $file = readdir($dir) ) {  
  
        if (( $file != '.' ) && ( $file != '..' )) {  
            if ( is_dir($src . '/' . $file) )  
            {  
  
                // Recursively calling custom copy function 
                // for sub directory  
                custom_copy($src . '/' . $file, $dst . '/' . $file);  
  
            }  
            else {  
                copy($src . '/' . $file, $dst . '/' . $file);  
            }  
        }  
    }  
  
    closedir($dir); 
}  
  



function compressImage($img_path,$file, $location, $quality) {

      if (empty($_FILES[$file]['name'])) {
  
           $res=$img_path;
  
        }else{

 
        $fileName = $_FILES[$file]["name"];
        $fileTmpLoc = $_FILES[$file]["tmp_name"];
        $fileType = $_FILES[$file]["type"];
        $fileSize = $_FILES[$file]["size"];
    
        $info = getimagesize($fileTmpLoc);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";
        $copm = $location . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
         //echo "File is valid, and was successfully uploaded.\n";
        } else {
          echo "Upload failed";
        }   
       
        
        $destination=$copm;
        $info = getimagesize($destfile);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($destfile);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($destfile);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($destfile);
        }

        imagejpeg($image, $destination, $quality);
 
  
$res=$destination;


}


return $res;

}








function _one_empty_img_compressImage($img_path,$file,$location, $quality,$copm)
{

if (empty($_FILES[$file]['name'])) {
  
  $res=$img_path;
  
}else{

 
$fileName = $_FILES[$file]["name"];
$fileTmpLoc = $_FILES[$file]["tmp_name"];
$fileType = $_FILES[$file]["type"];
$fileSize = $_FILES[$file]["size"];
    
        $info = getimagesize($fileTmpLoc);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";
        $copm = $copm . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
        //  echo "File is valid, and was successfully uploaded.\n";
        } else {
          echo "Upload failed";
        }   
       
        
        $destination=$copm;
        $info = getimagesize($destfile);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($destfile);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($destfile);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($destfile);
        }

        imagejpeg($image, $destination, $quality);
 
  
$res=$destination;


}


return $res;

}




function _update_db_img_compres2($conn,$tbl,$rowname,$ID,$file,$location,$quality)
{

if (empty($_FILES[$file]['name'])) {
  
$sql = "SELECT * FROM $tbl WHERE ID=$ID";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {                            
 
 $res=$row[$rowname];                            
              
    }
} else {
  $res='';
  }
  
}else{

 
$fileName = $_FILES[$file]["name"];
$fileTmpLoc = $_FILES[$file]["tmp_name"];
$fileType = $_FILES[$file]["type"];
$fileSize = $_FILES[$file]["size"];
    
        $info = getimagesize($fileTmpLoc);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";
        $copm = $location . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
        //  echo "File is valid, and was successfully uploaded.\n";
        } else {
          echo "Upload failed";
        }   
       
        
        $destination=$copm;
        $info = getimagesize($destfile);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($destfile);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($destfile);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($destfile);
        }

        imagejpeg($image, $destination, $quality);
 
  
$res=$destination;


}


return $res;
}


function _update_db_img_compres($conn,$tbl,$rowname,$ID,$file,$location,$quality,$copm)
{

if (empty($_FILES[$file]['name'])) {
  
$sql = "SELECT * FROM $tbl WHERE ID=$ID";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {                            
 
 $res=$row[$rowname];                            
              
    }
} else {
  $res='';
  }
  
}else{

 
$fileName = $_FILES[$file]["name"];
$fileTmpLoc = $_FILES[$file]["tmp_name"];
$fileType = $_FILES[$file]["type"];
$fileSize = $_FILES[$file]["size"];
    
        $info = getimagesize($fileTmpLoc);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $imagePath = $location;
        $uniquesavename = time() . uniqid(rand());
        $destfile = $imagePath . $uniquesavename . ".$ext";
        $copm = $copm . $uniquesavename . ".$ext";



        
        if (move_uploaded_file($fileTmpLoc,$destfile)) {
        //  echo "File is valid, and was successfully uploaded.\n";
        } else {
          echo "Upload failed";
        }   
       
        
        $destination=$copm;
        $info = getimagesize($destfile);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($destfile);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($destfile);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($destfile);
        }

        imagejpeg($image, $destination, $quality);
 
  
$res=$destination;


}


return $res;
}



function createSlug($str, $delimiter = '-'){

  $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
  return $slug;

} 


function base_url(){
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $host = $_SERVER['HTTP_HOST'];
  $baseURL_url = $protocol . $host;

if ($host=='localhost') {

$baseURL = $_SERVER['REQUEST_URI'];
$basePath = parse_url($baseURL, PHP_URL_PATH);
$basePath = trim($basePath, '/');
$folders = explode('/', $basePath);
$projectName = $folders[0];
$baseURL= $baseURL_url.'/'.$projectName;

} else {
  $baseURL = $protocol . $host;
}

return $baseURL;
}













?>