<?php
    $a[] = "Laptop";
    $a[] = "Lens";
    $a[] = "Earbuds";
    $a[] = "Camera";

    $q = $_REQUEST["q"];

    $suggestion = "";

    if ($q !== "") {
        $q = strtolower($q);
        $len = strlen($q);

        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                if ($suggestion === "") {
                    $suggestion = "<a href='$name'><li>".$name."</li></a>";
                } else {
                    $suggestion .= "<a href='$name'><li>$name</li></a>";
                }
            }
        }
    }

    echo $suggestion === "" ? "<li>Not Found</li>" : $suggestion;
?>