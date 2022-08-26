<?php
require_once("App.php");
include_once(ROOT.'/private/core/helper.php');

session_start();
session_unset();
session_destroy();

redirect("login");