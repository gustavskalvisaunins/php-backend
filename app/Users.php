<?php
class Users {

    function add($name) {

        // Checking if given data is a string or an array & if it doesn't contain illegal characters
        $type = gettype($name);
        $characters = '1234567890!@#$%^&*()_+-=<>?,./\|;:{}[]';
        $string = null;

        // Converting array to string
        if(is_array($name)) {
            $string = implode(" ", $name);
        } else {
            $string = $name;
        }
        $illegal = strpbrk($string, $characters);

        if(($type === 'string' or 'array') && ($illegal === false)) {

            if(empty($this->users)) {
                $this->users = array($name);
            } else {
                // Checks if given data is an array
                if(is_array($name)) {
                    $this->users = array_merge($this->users, $name);
                } else {
                    array_push($this->users, $name);
                }
            }
        }
    }

    function getSpecialUser() {
        // Sorts an array alphabetically & returns the last element
        sort($this->users);
        $specialUser = $this->users[count($this->users)-1];
        do {
            $specialUser = strpbrk($specialUser, ' ');
            $specialUser = substr($specialUser, 1);
        } while (strpbrk($specialUser, ' ') !== false);

        return $specialUser;
    }
}