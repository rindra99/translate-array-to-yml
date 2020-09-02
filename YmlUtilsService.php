<?php 

class YmlUtilsService{

    /**
     * @param array $array
     * @param string $tab 4 spaces by default
     * @return string
     */
    public static function translateArray(array $array, $tab = "    ")
    {
        static $depth = 0;
        $str = "";
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $str .= str_repeat($tab, $depth) . lcfirst(str_replace(' ', '', ucwords($key))) . ": " . PHP_EOL;
                $depth++;
                $str .= self::translateArray($value, $tab);
                $depth--;
            } else {
                $value = addcslashes($value, '"');
                $str .= str_repeat($tab, $depth) . lcfirst(htmlspecialchars(str_replace(' ', '', ucwords($key)) . ': "' . $value) . '"' . PHP_EOL);
            }
        }
        return $str;    
    }
} 

