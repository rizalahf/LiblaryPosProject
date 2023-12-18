<?php

function dateformat($value) {
    return date('H:i:s - d M Y', strtotime($value));
}


?>