<?php
include("My_require.php");
echo $user->user_by_id($user->current_user(),'bid');
echo $notifi->desplay_not($user->user_by_id($user->current_user(),'bid'));
?>