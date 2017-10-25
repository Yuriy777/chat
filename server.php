<?php
/**
 * Created by PhpStorm.
 * User: Пк
 * Date: 25.10.2017
 * Time: 18:50
 */

$user = 'root';
$pass = '';
try {
    $db = new PDO('mysql:host=localhost;dbname=chat', $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}
if (isset($_POST['func'])){
    $data = '';
    $result = $_POST['func'];
}
$json = array_keys($_POST);
$result = json_decode($json[0]);
function addMessage($nick, $message, $timestamp, $db) {
    $stmt = $db->prepare("INSERT INTO chat (nick, message, timestamps) VALUES (:nick, :message, :timestamps)");
    $stmt->bindParam(':nick', $nick);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':timestamps', $timestamp);
    $stmt->execute();
}
function getMessages($id, $db) {
    $res = $db->query('SELECT * FROM chat WHERE id > ' . $id);
    $rows = $res->fetchAll();
    $res = json_encode($rows);
    echo $res;
}
($result->func === 'addMessage') ? addMessage($result->nick, $result->message, $result->time, $db) : getMessages($result->messageId, $db);

?>