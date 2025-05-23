<?php
    include($originDir."/config/middleware.php"); // page accessible uniquement aux utilisateur connecté
    
    include ($originDir."/app/models/stats.php");
    include($originDir."/app/views/stats.php");
?>