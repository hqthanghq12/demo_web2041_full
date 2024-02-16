<?php
function loadall_dmtintuc()
{
    $sql = "SELECT * FROM danhmuctintuc";
    $list_dm = pdo_query($sql);
    return $list_dm;
}