<?php 
/**
 * @param array $array
 * @param string $tab 4 spaces by default
 * @return string
 */
function translateArray(array $array, $tab = "&nbsp;&nbsp;&nbsp;&nbsp;")
{
    static $depth = 0;
    $str = "";
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $str .= str_repeat($tab, $depth) . lcfirst(str_replace(' ', '', ucwords($key))) . ": <br>";
            $depth++;
            $str .= translateArray($value, $tab);
            $depth--;
        } else {
            $value = addcslashes($value, '"');
            $str .= str_repeat($tab, $depth) . lcfirst(htmlspecialchars(str_replace(' ', '', ucwords($key)) . ': "' . $value) . '"<br>');
        }
    }
    return $str;
}
