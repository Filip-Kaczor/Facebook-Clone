<?php
    // get page url
    $page = $_GET['page'];
    $content = '';

    // Define the directory where page files are stored
    $pagesDirectory = 'pages';

    if($page == "/") {

        //home page
        $page = "/home";

    }else if ($page == "/login") {

        //login page
        $show = "login";

    }else if ($page == "/register") {

        //login page
        $page = "/login";
        $show = "register";

    }else if (str_contains($page, "/@")) {

        //profile page
        $username = str_replace("/@", "", $page);
        $page = "/profile";

    }else if (str_contains($page, "/hashtag/")) {

        //hashtag page
        $hashtag = str_replace("/hashtag/", "", $page);
        $page = "/hashtag";

    }else if (str_contains($page, "/post/")) {

        //post page
        $post_id = str_replace("/post/", "", $page);
        $page = "/post";

    }


    // Construct the path to the requested page file
    $pageFile = $pagesDirectory . $page . '.php';

    // Check if the requested page file exists
    if (file_exists($pageFile)) {
        // Read the content of the page file
        include($pageFile);
    } else {
        $content = 'Page not found.';
    }

    // Set appropriate headers to prevent caching
    header('Expires: 0');
    header('Cache-Control: no-cache, must-revalidate');
    header('Pragma: no-cache');

    echo $content;
?>