<?php
   class Database {
      public static $db;
      public function __construct(){
        $host        = "host = 127.0.0.1";
        $port        = "port = 5432";
        $dbname      = "dbname = exameasy";
        $credentials = "user = postgres password=postgres";
     
        self::$db = pg_connect( "$host $port $dbname $credentials"  );
        if(!self::$db) {
           echo "Error : Unable to open database\n";
        } else {
           //echo "Opened database successfully\n";
        }
      }
      public function connect(){
         if(!isset(self::$db)){
            self::$db = new database();
         }
         return self::$db;
      }

      public function queryDb($sql) {
      //    print_r($sql);
      //   die("here");
          $ret = pg_query(self::$db, $sql);
         
          $rows = pg_fetch_all($ret);
          return $rows;
      }
   }
?>