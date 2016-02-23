<?php
include_once("db.class.php");
$db = new database("localhost", "root", "", "test");
$imageSql = "select * from asset_unit_files where type='Image'";
$images = $db->get_results($imageSql);
$documentSql = "select * from asset_unit_files where type='Document'";
$documents = $db->get_results($documentSql);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Uploadify Test</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="jquery.uploadify.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="uploadify.css">
    <style type="text/css">
        body {
            font: 13px Arial, Helvetica, Sans-serif;
        }
    </style>
</head>

<body>
<h1>Uploadify Demo</h1>

<form>
    <div id="queue"></div>
    <input id="file_upload" name="file_upload" type="file" multiple="true">

    <p id="uploadManuallySingle" style="display:none;"><a href="javascript:$('#file_upload').uploadify('upload')">Upload
            one by one</a></p>

    <p id="uploadManuallyAll" style="display:none;"><a href="javascript:$('#file_upload').uploadify('upload','*')">Upload
            All Files</a></p>

    <p id="cancelAll" style="display: none;"><a href="javascript:$('#file_upload').uploadify('cancel','*');">Clear
            Queue</a></p>

    <div id="progress"></div>
</form>
<table border="1" width="100%">
    <tr>
        <th><h2>Images</h2></th>
    </tr>
    <tr>
        <td>
            <?php if (empty($images)) { ?>
                No images found.
            <?php } else {
                foreach ($images as $i_key => $i_val) {
                    ?>
                    <div id="<?php $i_key; ?>" style="padding: 10px;float:left;">
                        <img height="100" width="100" src="uploads/images/<?php echo $i_val["alias"]; ?>"
                             title="<?php echo $i_val["name"]; ?>"><?php
                        ?> </div>
                    <?php
                }
            } ?>
        </td>
    </tr>
    <tr>
        <th><h2>Documents</h2></th>
    </tr>
    <tr>
        <td>
            <?php
            /*echo "<pre>";
            print_r($documents);*/
            if (empty($documents)) { ?>
                No documents found.
            <?php } else {
                foreach ($documents as $d_key => $d_val) {
                    ?>
                    <div id="<?php $d_key; ?>" style="padding: 10px;border:1px solid #ccc;height:25px;width:250px;float:left;">
                        <?php echo $d_val["alias"]; ?>
                    </div>
                    <?php
                }
            } ?>
        </td>
    </tr>
</table>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function () {
        $('#file_upload').uploadify({
//            'removeCompleted' : false,
            'progressData': 'percentage', /* Set what type of data to display in the queue item during file upload progress updates.  The two options are ‘percentage’ or ‘speed’. */
//            'checkExisting' : '/uploadify/check-exists.php',/*The path to a file that checks whether the name of the file being uploaded currently exists in the destination folder.  The script should return 1 if the file name exists or 0 if the file name does not exist.*/
//            'auto':false,/*Set to false if you do not want the files to automatically upload when they are added to the queue.  If set to false, the upload can be triggered using the upload method.*/
            'buttonCursor': 'hand', /*Sets which cursor to display when hovering over the browse button.  The possible values are ‘hand’ and ‘arrow’.*/
            'formData': {
                'timestamp': '<?php echo $timestamp;?>',
                'token': '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'swf': 'uploadify.swf',
            'buttonText': 'Upload Images...',
            //'buttonImage' : 'uploadify-browse.png',
            'uploader': 'uploadify.php',
//            'fileTypeDesc' : 'Image Files',
            'fileTypeExts': '*.gif; *.jpg; *.png;*.xls',
            //'fileSizeLimit' : '100KB',
            //'cancelImg' : 'uploadify-cancel.png',

            /*'onInit'   : function(instance) {
             console.log('onInit: The queue ID is ' + instance.settings.queueID);
             },
             'onQueueComplete' : function(queueData) {
             console.log("onQueueComplete: "+queueData.uploadsSuccessful + ' files were successfully uploaded.');
             },
             'onCancel' : function(file) {
             alert('onCancel: The file ' + file.name + ' was cancelled.');
             },
             'onClearQueue' : function(queueItemCount) {
             alert("onClearQueue: "+ queueItemCount + ' file(s) were removed from the queue');
             },
             'onSelect' : function(file) {
             console.log('onSelect: The file ' + file.name + ' was added to the queue.');
             },
             'onSelectError' : function(file) {
             alert('The file ' + file.name + ' returned an error and was not added to the queue.');
             },
             'onFallback' : function() {
             alert('Flash was not detected.');
             },
             'onDialogClose'  : function(queueData) {
             console.log("onDialogClose: " +queueData.filesQueued + ' files were queued of ' + queueData.filesSelected + ' selected files. There are ' + queueData.queueLength + ' total files in the queue.');
             $("#uploadManuallySingle").show();
             $("#uploadManuallyAll").show();
             $("#cancelAll").show();
             },
             'onUploadStart' : function(file) {
             console.log('onUploadStart: Starting to upload ' + file.name);
             },
             'onUploadComplete' : function(file) {
             console.log('onUploadComplete: The file ' + file.name + ' finished processing.');
             },
             'onUploadError' : function(file, errorCode, errorMsg, errorString) {
             alert('onUploadError: The file ' + file.name + ' could not be uploaded: ' + errorString);
             $("#file_upload").uploadify("cancel");

             },
             'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
             $('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');
             },
             'onUploadSuccess': function (file, data, response) {
             console.log(file);
             if(data != 1){
             $("#file_upload").uploadify("cancel",file.id);
             }
             console.log('onUploadSuccess: The file was saved to: ' + data);
             }*/
            'onQueueComplete' : function(queueData) {
                console.log("onQueueComplete: "+queueData.uploadsSuccessful + ' files were successfully uploaded.');
                location.reload();
            },
        });
    });
</script>
</body>
</html>