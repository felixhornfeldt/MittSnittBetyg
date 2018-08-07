<?php

session_start();

include_once './../dbh_conn.php';

header("Location: ./../../../user.php?".mt_rand()."=changegradephpfilefound");
exit();