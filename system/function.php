<?php
function getJSONObject($mixedInput, $output) {
    switch ($output) {
        case 'print':
        case 'echo':
        case true:
        case 1:
            echo json_encode($mixedInput, JSON_FORCE_OBJECT);
            break;
        default:
            return json_encode($mixedInput, JSON_FORCE_OBJECT);
    }
}
