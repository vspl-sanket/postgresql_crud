// class PgSql{
        
        //     private $dbuser = 'postgres';
        //     private $dbpass = 'vis123';
        //     private $dbhost = '172.17.0.3';
        //     private $dbname = 'week_4_task';
        //     private $dbport = '5432';
        //     private $conn;
    
        //     private $db;
        //     public  $num_rows;
        //     public  $last_id;
        //     public  $aff_rows;
        //     public  $getRows;
    
        //     public function __construct()
        //     {
        //         try {
        //             $this->db = pg_connect("host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpass");
        //         }catch (PDOException $e){
        //             die($e->getMessage());
        //         }
        //     }
    
        //     public function close()
        //     {
        //         pg_close($this->db);
        //     }
    
        //     public function getRow($sql)
        //     {
        //         $result = pg_query($this->db, $sql);
        //         $row = pg_fetch_object($result);
        //         if (pg_last_error()) exit(pg_last_error());
        //         return $row;
        //     }
    
        //     public function getRows($sql)
        //     {
        //         $result = pg_query($this->db, $sql) or die("Cannot execute query: $query\n");
        //         //$rs = pg_query($pdo, $query) or die("Cannot execute query: $query\n");
        //         $userList = pg_fetch_all($result);
        //         return $userList;
        //     }
    
        //     public function getCol($sql)
        //     {
        //         $result = pg_query($this->db, $sql);
        //         $col = pg_fetch_result($result, 0);
        //         if (pg_last_error()) exit(pg_last_error());
        //         return $col;
        //     }
    
        //     public function getColValues($sql)
        //     {
        //         $result = pg_query($this->db, $sql);
        //         $arr = pg_fetch_all_columns($result);
        //         if (pg_last_error()) exit(pg_last_error());
        //         return $arr;
        //     }
    
        //     public function insert($sql, $id='id')
        //     {
        //         $sql = rtrim($sql, ';');
        //         $sql .= ' RETURNING '.$id;
        //         $result = pg_query($this->db, $sql);
        //         if (pg_last_error()) exit(pg_last_error());
        //         $this->last_id = pg_fetch_result($result, 0);
        //         return $this->last_id;
        //     }
    
        //     public function exec($sql)
        //     {
        //         $result = pg_query($this->db, $sql);
        //         if (pg_last_error()) exit(pg_last_error());
        //         $this->aff_rows = pg_affected_rows($result);
        //         return $this->aff_rows;
        //     }
        // }
    