<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 12/07/15
 * Time: 8:36 AM
 */

class DB {

    static $sql = 'db/its.db';

    /*
     * @return PDO
     */
    public static function getConn() {
        $db = new PDO('sqlite:' . DB::$sql);
        return $db;
    }

    // @return array
    public static function query($query) {

        $db = DB::getConn();
        return $db->query($query);

    }

    // @return int
    public static function exec($query) {

        $db = DB::getConn();
        return $db->exec($query);

    }

    // @return bool
    public static function has($query) {
//        $rows = DB::query('select * from Users where username = "'.$id.'"');
        $rows = DB::query($query);
        return $rows->fetchColumn() > 0?true:false;
    }

    /**
     * @return int
     */
    public static function getLastID($table) {

        $db = DB::getConn();

        $stm = $db->prepare('SELECT id FROM :table ORDER BY id DESC LIMIT 1;');
        $stm->bindParam(':table',$table);

        $stm->execute();

        return $stm->fetchAll()[0]['id'];

    }

}