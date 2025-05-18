<?php

function deleteFile($sourcePath,$filename){

    // $filenameToDelete = 'requested_profile_picturers/skjd.jpg'; // Replace with the actual path to the file you want to delete

    $filenameToDelete=$sourcePath.$filename;

    if (file_exists($filenameToDelete)) {
        // Attempt to delete the file
        if (unlink($filenameToDelete)) {
            // echo 'File deleted successfully.<br>';
        } else {
            echo 'Error deleting the file.<br>';
        }
    } 
    else {
        echo 'File does not exist.<br>';
    }


}


    // moving one folder to another


function moveFile($sourcePath,$destinationPath,$filename )
{


    // $sourcePath = 'admin/'; // Replace with the actual source folder path
    // $destinationPath = 'requested_profile_picturers/'; 
    // $filename = 'jkkniu.jpg'; // Replace with the actual filename
    
    $sourceFile = $sourcePath . $filename;
    $destinationFile = $destinationPath . $filename;
    
    // Check if the source file exists before attempting to move
    if (file_exists($sourceFile)) {
        // Attempt to move the file
        if (rename($sourceFile, $destinationFile)) {
            // echo 'File moved successfully.<br>';
        } else {
            echo 'Error moving the file.<br>';
        }
    } else {
        echo 'Source file does not exist.<br>';
    }

}


?>
