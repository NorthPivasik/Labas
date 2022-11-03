<?php
    $xml = new DOMDocument();
    $internalErrors = libxml_use_internal_errors(true);

    function task2($xml) {
        $html = $_POST['textarea'];
        $xml->loadHTML($html);
        $elemnents = $xml->getElementsByTagName("img");

        $content = "<h3> Задание 2: </h3>";
        if (!$elemnents['length'] == null) {
            foreach ($elemnents as $img) {
                $content .= $xml->saveHTML($img);
            }
        } else {
            $content .= "Нету ни одной картинки";
        }
        echo $content;
    }

    function task6($xml) {
        $html = $_POST['textarea'];
        $xml->loadHTML($html);
        $xml->preserveWhiteSpace = false;

        $html = preg_replace("/[^,]\\bа\\b/u", ", а", $html);
        $html = preg_replace("/[^,]\\bно\\b/u", ", но", $html);
        $html = preg_replace("/,,/u", ",", $html);

        $html = str_replace("...", "…", $html);

        $content = "<h3> Задание 6: </h3>" . $html;
        echo $content;
    }

    function task15($xml) {
        $small_unions = ['в', 'от', "про", "по", "и", "или", "а", "но", "как", "не", "ни", "бы", "при", "что", "как", "для", "так"];
        $big_unions = ['В', 'От', "Про", "По", "И", "Или", "А", "Но", "Как", "Не", "Ни", "Бы", "При", "Что", "Как", "Для", "Так"];
        $unions = $small_unions + $big_unions;
        $dictionary = array();
        $xml->validateOnParse = true;

        $html = $_POST['textarea'];
        $xml->loadHTML($html);
        $xml->preserveWhiteSpace = false;

        $html = trim($html);
        $html = strip_tags($html);
        $html = str_replace(array(",", "]", "(", "."), "", $html);
        $html_array = explode(" ", $html);
        

        foreach ($html_array as $elem) {
            if (in_array($elem, $unions) || !preg_match("/[a-z_а-я]{3,}/ui", $elem)) continue;

            if (array_key_exists($elem, $dictionary)) $dictionary[$elem]++;
            else $dictionary[$elem] = 1;
        }
        arsort($dictionary);
        $content = "<h3>Задание 15:</h3>";

        $counter = 1;
        foreach ($dictionary as $word => $count) {
            if ($counter > 100) break;
                
            $content .= "$counter. <button id='btn_$counter' class='border-0 bg-white' href='' onclick='find($counter)'>$word</button>- $count<br>";
            $counter++;
        }
        echo $content;
    }
    
    function task19($xml) {
        $html = $_POST['textarea'];
        $xml->loadHTML($html);

        $html = preg_replace("/<style(.{0,})<\/style>/", "", $html);
        $html = strip_tags($html, "<h1><h2><h3><h4><h5><h6><p><a><div><table><th><tr><td>");
        
        $content = "<h3>Задание 19:</h3>" . $html;
        echo $content;
    }
?>
