<?php
require_once(ROOT."/private/models/dbFunctions.php");
require_once(ROOT."/private/core/helper.php");
require_once(ROOT."/private/core/middleware.php");


$getOrders = selectAll('orders');