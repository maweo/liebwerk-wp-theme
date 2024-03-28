<?php

// Navbar (in `header.php`)

function maweo_navbar_before() {
  do_action('navbar_before');
}

function maweo_navbar_after() {
  do_action('navbar_after');
}

// Mainbody

function maweo_mainbody_before() {
  do_action('mainbody_before');
}
function maweo_mainbody_after() {
  do_action('mainbody_after');
}

function maweo_mainbody_start() {
  do_action('mainbody_start');
}
function maweo_mainbody_end() {
  do_action('mainbody_end');
}

// Footer (in `footer.php`)

function maweo_footer_before() {
  do_action('footer_before');
}

function maweo_footer_after() {
  do_action('footer_after');
}

