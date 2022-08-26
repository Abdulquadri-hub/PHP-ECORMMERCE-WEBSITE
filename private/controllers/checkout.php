<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");
if (empty($_SESSION['firstname'])) {
    include(ROOT."/login.php");
} else {
    include(ROOT."/user/payment.php");
}
