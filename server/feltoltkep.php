<?php
if(isset($_FILES['myImage'])){
    //extension:
    $extension=pathinfo($_FILES['myImage']['name'],PATHINFO_EXTENSION);
    //new filename, unique
    $new_name=time().'.'.$extension;
    //upload in the folder
    move_uploaded_file($_FILES['myImage']['tmp_name'],'../kepek/'.$new_name);

    echo json_encode(['img_src'=>'../kepek/'.$new_name]);
}

?>