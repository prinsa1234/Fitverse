
<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>upload</title>
</head>
<body>
 <form method ="POST" data-brackets-id="15600" class="needs-validation user-add" novalidate="" enctype="multipart/form-data">
    <div data-brackets-id="15606" class="form-group row">
                                                            <label data-brackets-id="15607" for="validationCustom1" class="col-xl-3 col-md-4">Upload Image</label>
                                                            <input type="file" class="form-control col-xl-8 col-md-7" name="ui" id="myFile">
                                                            
                                                        </div>
                                                        <div id="btn-withdraw">
                                                            <input type="submit" class="btn btn-lg  btn-solid" name="save" value = "Save Product"  id="mc-submit"></div>
</form></body>
</html>
<?php
    $fn = $_FILES["ui"]["name"];
    $tmp = $_FILES["ui"]["tmp_name"];
    $folder = "images/".$fn;
    move_uploaded_file($tmp, $folder);

?>