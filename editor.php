<?php
    require_once('classes/main.php');
    // include "FileHandling.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
            $X = new Main();
            $output = $X->mianConnection($_POST["code"],$_POST["code-file"]);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="lib/css/editor.css">
    <link rel="stylesheet" href="lib/css/all.min.css">
    <link rel="stylesheet" href="lib/css/Noramlize.css">
</head>
<body>
    <h1 class="title">Editor</h1>
    <div class="container">
        <div class="code-container">
            <a class="code-title" href="editor.html">Language</a>
            <form action="" data-flag="0" method="post" id="code-form">
                <div name="code" class="code-text" id="code"></div>
                <div class="inputs">
                    <input type="file" id="file" onchange="fileName()" name="code-file">
                    <input type="submit" value="Scanner" onclick="scanner()">
                    <input type="submit" value="parser" onclick="parser()">
                    <label for="file" >
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <span id="file-name">upload file</span>
                    </label>
                </div>
            </form>
        </div>
        <div class="output-container">
            <h2 class="output-title">output</h2>
            <textarea name="output" readonly class="output-text"> <?php if (isset($output)) { echo  $output; } ?></textarea>
        </div>
    </div>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/js/ace.js"></script>
    <!-- <script src="lib/js/ace-editor/src-min/ace.js"></script>
    <script src="lib/js/ace-editor/src-min/mode-javascript.js"></script> -->
    <script src="lib/js/editor.js"></script>
</body>
</html>