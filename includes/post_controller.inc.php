<?php

declare(strict_types = 1);

function text_area_empty(string $text) {
    if (empty($text)) {
        return true;
    }
    else {
        return false;
    }
}