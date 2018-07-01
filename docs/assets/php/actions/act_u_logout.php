<?php

header("Location: ./../../../index.php?".mt_rand()."=foundfile");
session_destroy();
exit();