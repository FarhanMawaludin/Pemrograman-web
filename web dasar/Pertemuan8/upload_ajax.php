<?php
if (isset($_FILES['file'])) {
    $errors = array();
    
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $extensions = array("jpg", "jpeg", "png");

    // Check for valid file extension
    if (!in_array($file_ext, $extensions)) {
        $errors[] = "Ekstensi file yang diizinkan adalah JPG, JPEG, atau PNG.";
    }

    // Check for file size limit (2MB)
    if ($file_size > 2097152) {
        $errors[] = 'Ukuran file tidak boleh lebih dari 2 MB';
    }

    // Move file if no errors
    if (empty($errors)) {
        move_uploaded_file($file_tmp, "documents/" . $file_name);
        echo "File $file_name berhasil diunggah.";
    } else {
        echo implode("<br>", $errors);
    }
}
?>
