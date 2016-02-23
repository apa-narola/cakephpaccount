<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
include_once("db.class.php");
$db = new database("localhost", "root", "", "test");

//http://www.uploadify.com/documentation/uploadify/buttontext/
// Define a destination
$targetFolderImage = '/uploadify/uploads/images'; // Relative to the root
$targetFolderDocument = '/uploadify/uploads/documents'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    $tempFile = $_FILES['Filedata']['tmp_name'];

    // Validate the file type
    $fileTypesImage = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
    $fileTypesDocument = array('doc', 'docx', 'xls', 'pdf', 'txt'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);
    $filenameAlias = $fileParts["filename"] . uniqid() . "." . $fileParts["extension"];
    $insertData = array();
    if (in_array($fileParts['extension'], $fileTypesImage)) {
        $targetPathImage = $_SERVER['DOCUMENT_ROOT'] . $targetFolderImage;
        $targetFile = rtrim($targetPathImage, '/') . '/' . $filenameAlias;
        if (move_uploaded_file($tempFile, $targetFile)) {
            $insertData["name"] = $_FILES['Filedata']['name'];
            $insertData["alias"] = $filenameAlias;
            $insertData["type"] = "Image";
            $insertData["size"] = $_FILES['Filedata']['size'];
            $db->insert("asset_unit_files", $insertData);
        }
        echo '1';
        //echo $targetPath;
    } else if (in_array($fileParts['extension'], $fileTypesDocument)) {
        $targetPathDocument = $_SERVER['DOCUMENT_ROOT'] . $targetFolderDocument;
        $targetFile = rtrim($targetPathDocument, '/') . '/' . $_FILES['Filedata']['name'];
        if (move_uploaded_file($tempFile, $targetFile)) {
            $insertData["name"] = $_FILES['Filedata']['name'];
            $insertData["alias"] = $filenameAlias;
            $insertData["type"] = "Document";
            $insertData["size"] = $_FILES['Filedata']['size'];
            $db->insert("asset_unit_files", $insertData);
        }
        echo '1';
        //echo $targetPath;
    } else {
        echo 'Invalid file type.';
    }
}
?>