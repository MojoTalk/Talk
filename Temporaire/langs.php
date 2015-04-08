<?php
    session_start();

    function generate_langs($lang_tag)
    {
        if ($lang_tag == "en")
            $file = fopen("en.lang", "r");
        else
            $file = fopen("fr.lang", "r");

        if ($file === false)
            fopen("fr.lang", "r");

        while ( ($line = fgets($file)) != EOF)
        {
   if ($line[0] == "//")
    continue ;
            $words = explode ("=", $line);
            $langs[$words[0]] = $words[1];
        }
        $_SESSION["langs_array"] = serialize($langs);
    }

    if (!isset($_SESSION["langs_array"]))
        generate_langs(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

?>