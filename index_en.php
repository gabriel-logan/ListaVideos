<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a page developed in PHP, HTML, and CSS that 
                has the functionality to check for the existence of videos in a specific folder and then display them on a web page. 
                Each video is displayed with its respective title and they are ordered in a pleasant and organized layout. 
                The page features a clean and modern design, 
                using front-end technologies like CSS and HTML to create an aesthetically pleasing and easy-to-navigate look.">
    <title>Video List</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }
        #root {
            text-align: center;
        }
        header {
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        header a {
            color: #333;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.2s ease-in-out;
        }

        header a:hover {
            color: #666;
        }
        #root h1 {
            font-size: 32px;
            font-weight: bold;
            margin: 25px 0;
            color: #333;
        }
        #root p {
            font-size: 16px;
            margin: 0;
            color: #666;
        }
        #root .videos {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            margin-top: 20px;
        }
        #root .videos .video {
            width: 280px;
            height: 280px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            transition: all 0.2s ease-in-out;
        }
        #root .videos .video:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        #root .videos .video video {
            width: 90%;
            height: 70%;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        /* Adjust video size in fullscreen */
        #root .videos .video video:-webkit-full-screen {
            object-fit: contain; /* Maintains video proportion */
        }
        /* Revert video size after exiting fullscreen */
        #root .videos .video video:-webkit-full-screen-exit {
            object-fit: cover;
        }
        #root .videos.with-margin {
            margin-bottom: 75vh;
        }
        h3 {
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }
        footer {
            background-color: #333;
            color: #fff;
            margin-top: 40px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
            height: 120px;
        }
        footer p {
            line-height: 120px;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: #666;
            font-weight: bold;
        }

        a:hover {
            color: #898989;
        }
    </style>
</head>
<body>
    <div id="root">
        <header>
            <p style='position: absolute;left: 75%;'>Created by: Gabriel Logan</p>
            <nav>
                <ul>
                    <li><a href="../">Back to previous page</a></li>
                </ul>
            </nav>
        </header>
        <?php
            $folderName = basename(__DIR__);
            echo '<h1>Videos Below</h1>';
            echo "<p> Module: $folderName </p>";
            $dir = "../" . $folderName . "/";
            $videosMp4 = glob($dir . "*.mp4");
            $videoCount = count($videosMp4); // Count the number of videos
        ?>
        <div class="videos<?php if ($videoCount < 6) echo ' with-margin'; ?>">
            <?php
            foreach ($videosMp4 as $video) {
                $title = pathinfo($video)['filename'];
                echo '<div class="video">';
                echo '<h3>' . $title . '</h3>';
                echo '<video src="' . $video . '" controls> </video>';
                echo '</div>';
            }
            ?>
        </div>
        <footer>
            <p>&copy; 2023 <a href="https://github.com/gabriel-logan" target="_blank">Gabriel Logan</a>. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
