<?php 
/**
 * @param array $array
 * @param string $tab
 * @return string
 */
function translateArray(array $array, $tab = "")
{
    static $depth = 0;
    $str = "";
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $depth++;
            $str .= str_repeat($tab, $depth) . "$key: <br>";
            $str .= $this->translateArray($value, '&nbsp;&nbsp;&nbsp;&nbsp;');
            $depth--;
        } else {
            $value = addcslashes($value, '"');
            $str .= str_repeat($tab, $depth) . lcfirst(htmlspecialchars(str_replace(' ', '', ucwords($key)) . ': "' . $value) . '"<br>');
        }
    }
    return $str;
}
