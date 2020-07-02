<?php

abstract class UtilityFunction
{
    //Abstract methods
    abstract function showHeader();
    abstract function getTopNav();

    //Full functions
    function isAllowed()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
        }
    }

    function getFooter()
    {
        return "<footer>&copy;2020 Christian Hur. I own this!</footer>";
    }
}