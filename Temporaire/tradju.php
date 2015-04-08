// FICHIER LANGS_PHP
<?php
    session_start();

    function generate_langs($lang_tag)
    {
        if ($lang_tag == "en")
            $file = fopen("en/user.lang", "r");
        else if ($lang_tag == "it")
            $file = fopen("it.lang", "r");
        else if ($lang_tag == "es")
            $file = fopen("es.lang", "r");
        else
            $file = fopen("fr.lang", "r");

        if ($file === false)
            fopen("fr.lang", "r");

        while ( ($line = fgets($file)) != EOF)
        {
   if ($line[0] == "#")
    continue ;
            $words = explode ("=", $line);
            $langs[$words[0]] = $words[1];
        }
        $_SESSION["langs_array"] = serialize($langs);
    }

    if (!isset($_SESSION["langs_array"]))
        generate_langs(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

?>

// FICHIER A TOI QU IL EST BEAU
<?php
    require_once "langs.php";
    $langs = unserialize($_SESSION["langs_array"]);
?>