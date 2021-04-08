<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dropzone.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="dropzone.min.js"></script>
    <title>Dropzone.js</title>
</head>
<body>
    <form action="upload.php" class="dropzone" id="my-dropzone"></form>

    <script>
        Dropzone.options.myDropzone = {
            init: function() {
                thisDropzone = this;

                $.get('upload.php', function(data) {
                    $.each(data, function(key, value) {
                        var mockFile = {name: value.name, size: value.size};
                        thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "uploads/"+value.name);
                    });
                });
            }
        };
    </script>
</body>
</html>