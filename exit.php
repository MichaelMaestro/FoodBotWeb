<?php
session_start();
session_destroy();
exit("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>");
?>