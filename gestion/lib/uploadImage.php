<?php

$array = array();
try {
    $valid_file = true;
    $message = '';
    //if they DID upload a file...
    if ($_FILES['imagePost']['name']) {
        //if no errors...
        if (!$_FILES['imagePost']['error']) {
            $path = $_FILES['imagePost']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            //now is the time to modify the future file name and validate the file
            $new_file_name = strtolower(bin2hex(openssl_random_pseudo_bytes(16))); //rename file
            $new_file_name.='.'.$ext;
            if ($_FILES['imagePost']['size'] > (20024000)) //can't be larger than 20 MB
            {
                $valid_file = false;
                $message = 'Oops!  Your file\'s size is to large.';
            }

            //if the file has passed the test
            if ($valid_file) {
                $file_path =  '../../img/'.$new_file_name;
                $array['uploadStatus']= move_uploaded_file($_FILES['imagePost']['tmp_name'],  $file_path);
                $message = 'Congratulations!  Your file was accepted.';
                $array['result'] = "success";
                $array['file_name'] = $new_file_name;

            }
        } //if there is an error...
        else {
            //set that to be the returned message
            $message = 'Ooops!  Your upload triggered the following error:  ' . $_FILES['imagePost']['error'];
            $array['result'] = $_FILES['imagePost']['error'];
        }
    }else{
        $array['result'] = "aucune photo";
    }
} catch (PDOException $e) {
    $array['result'] = 0;
}

echo $array['file_name'];

?>