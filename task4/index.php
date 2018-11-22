<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 22.11.2018
 * Time: 18:50
 */

/**
 * Вынесем конфиг в отдельный файл
 */
require_once 'config.php';

/**
 * @param string $user_ids
 * @return array
 */
function load_users_data(string $user_ids) {
    $user_ids = validateUsersId($user_ids);
    $db = new mysqli(HOST, USER, PASS, DB_NAME);
    if ($db->connect_error) {
        exit('fail');
    }
    if ($result = $db->query("SELECT id, name FROM users WHERE id IN ($user_ids)")) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[$row['id']] = $row['name'];
        }
        $db->close();
        return $data;
    }
}

/**
 * @param string $user_ids
 * @return string
 */
function validateUsersId(string $user_ids)
{
    $array = explode(',', $user_ids);
    foreach ($array as $id) {
        if ((int)$id) {
            $arr[] = $id;
        }
    }
    if (empty($arr)) {
        exit('invalid user_ids');
    }
    return implode(',', $arr);
}

/**
 * Как правило, в $_GET['user_ids'] должна приходить строка с номерами пользователей
 * через запятую, например: 1,2,17,48
 */

if (is_string($_GET['user_ids'])) {
    $data = load_users_data($_GET['user_ids']);
    foreach ($data as $user_id => $name) {
        echo "<a href=\"/show_user.php?id=$user_id\">$name</a><br>";
    }
} else {
    echo 'invalid user_ids';
}
