<?php
if ($_FILES['fileToUpload']['error'] > 0){
	echo("File bị lỗi");
}
else{
    $target = "./uploads/";
    $target = $target . basename($_FILES['fileToUpload']['name']);

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
        echo("Upload file thành công");
        header("Location: index.php");
		die();
    } else {
        echo("Upload file thất bại");
    }
}
?>