<?php
if(isset($_FILES['image'])) {
    $targetDir = "uploads/";
    $fileName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;

    $imageType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Validasi tipe file
    if(in_array($imageType, ["jpg", "jpeg", "png", "gif"])) {
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            header("Location: index.php");
        } else {
            echo "Gagal upload gambar.";
        }
    } else {
        echo "Format gambar tidak valid.";
    }
}
?>
