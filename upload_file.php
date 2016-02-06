<?php
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
    && ($_FILES["file"]["size"] < 20000)
) {
    if ($_FILES["file"]["error"] > 0) {
        $result = "Return Code: " . $_FILES["file"]["error"] . "<br />";
    } else {
        $result = "Upload: " . $_FILES["file"]["name"] . "<br />";
        $result .= "Type: " . $_FILES["file"]["type"] . "<br />";
        $result .= "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        $result .= "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

        if (file_exists("upload/" . $_FILES["file"]["name"])) {
            $result .= $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "upload/" . $_FILES["file"]["name"]);
            $result .= "Stored in: " . "upload/" . $_FILES["file"]["name"];
        }
    }
} else {
    $result.= "Invalid file";
}
?>