<?php 
if (!function_exists('canonicalise')) {

    /**
     * Canonicalise a string to alphanum and -.
     *
     * @param $str
     *
     * @return string
     */
    function canonicalise($str)
    {
        $clean = preg_replace('/[^a-zA-Z0-9\/_|+ -]/', '', $str);
        $clean = strtolower(trim($clean));
        $clean = preg_replace('/[\/_|+ -]+/', '-', $clean);

        return $clean;
    }
}
?>