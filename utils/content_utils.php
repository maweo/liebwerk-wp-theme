<?php 

function maweo_get_heading($text, $tag = "h2", $class = "") {
    return "<" . $tag . " class='".$class."' >" . $text . "</" . $tag . ">";
}

function maweo_get_link($link, $class = "") {
    $rel = $link['target'] == "_blank" ? "rel='noopener noreferrer'" : "";
    return "<a " . $rel . " class='".$class."'  href='" . $link['url'] . "' target='" . $link['target'] . "'>" . $link['title'] . "</a>";
}

function maweo_get_icon_link($link, $icon, $link_class = "", $image_class = "") {
    $rel = $link['target'] == "_blank" ? "rel='noopener noreferrer'" : "";
    $icon_data = get_image_data($icon);

    return 
    "<a " . $rel . " class='".$link_class."'  href='" . $link['url'] . "' target='" . $link['target'] . "'>
        <img
            src='".$icon_data['url']."'
            alt='".$icon_data['alt']."'
            class='".$image_class."'
        />
    </a>";
}