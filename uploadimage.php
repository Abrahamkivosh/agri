<?php
function uploadImage()
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["productPic"]["name"]);
    $uploadOk = 1;
    $messageError = "";
    $messageSuccess = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["productPic"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $messageError =  "File is not an image.";
            $uploadOk = 0;
        }
    }


    // Check file size
    if ($_FILES["productPic"]["size"] > 500000) {
        $messageError =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $messageError =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $messageError =  "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["productPic"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["productPic"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

uploadImage()
?>
<!DOCTYPE html>
<html>
<body>

<form action="./uploadimage.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="productPic" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>