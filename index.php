<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Captured Videos</title>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.loading').forEach(function (element) {
                element.addEventListener('click', function (event) {
                    event.preventDefault();
                    event.currentTarget.style.display = "none";
                    var video = event.currentTarget.parentNode.querySelector('video');
                    video.addEventListener("loadeddata", function (event) {
                        video.currentTime = 24 * 60 * 60 * 1000;
                        video.controls = true;
                    });
                    video.load();
                });
            });
        });
    </script>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        video {
            width: 100%;
        }

        .entry {
            position: relative;
            display: inline-block;
            width: 16em;
            vertical-align: top;
        }

        .loading {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
    </style>
</head>
<body>
<h1>Captured Videos</h1>
<?php
$files = glob('data/*.webm');
rsort($files);
foreach ($files as $file) {
    $poster = preg_replace("/\.webm$/", ".jpg", $file);
    ?>
    <div class="entry">
        <a class="loading" href="#"></a>
        <div><?php echo htmlspecialchars(basename($file), ENT_QUOTES) ?></div>
        <video preload="none" poster="<?php echo htmlspecialchars($poster, ENT_QUOTES) ?>">
            <source src="<?php echo htmlspecialchars($file, ENT_QUOTES) ?>" type="video/webm">
        </video>
    </div>
    <?php
}
?>
</body>
</html>
