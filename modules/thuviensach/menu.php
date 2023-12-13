<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$sql = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $mod_data . '_cat ORDER BY sort ASC';
$result = $db->query($sql);
while ($row = $result->fetch()) {
    $array_item[$row['id']] = [
        'parentid' => $row['parentid'],
        'key' => $row['id'],
        'title' => $row['name_cat'],
        'alias' => $row['alias'].'-'.$row['id']
    ];
}
