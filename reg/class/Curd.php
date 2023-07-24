<?php
 require_once("database.php");

 class crud{

 // Dynamic properties for table columns will be stored in this array
 private $tableColumns = [];

 protected $dbCnx;


 public function __construct($id = 0, $firstName = "", $lastName = "", $address = "")
 {
     $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

     // Step 2: Prepare and execute a query to fetch column names.
     $tableName = "ad";

     try {
         $stmt = $this->dbCnx->prepare("DESCRIBE $tableName");
         $stmt->execute();
         $columnNames = $stmt->fetchAll(PDO::FETCH_COLUMN);
     } catch (PDOException $e) {
         echo "Error fetching column names: " . $e->getMessage();
         exit;
     }

     if (count($columnNames) > 0) {
         foreach ($columnNames as $columnName) {
             $this->tableColumns[] = $columnName;
         }
     } else {
         echo "No columns found in table $tableName.";
     }

    
 }


 // Setter and Getter methods for dynamically created properties
    // Setter and Getter methods for dynamically created properties
    public function __set($name, $value)
    {
        if (in_array($name, $this->tableColumns)) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (in_array($name, $this->tableColumns)) {
            return $this->$name;
        }
        return null;
    }






 public function insertData()
 {
     try {
         $columnsString = implode(',', $this->tableColumns);
         $placeholders = implode(',', array_fill(0, count($this->tableColumns), '?'));

         $sql = "INSERT INTO ad ($columnsString) VALUES ($placeholders)";
         $stm = $this->dbCnx->prepare($sql);
         $values = [];
         foreach ($this->tableColumns as $column) {
             $values[] = $this->$column;
         }
         $stm->execute($values);

         echo "<script>alert('data saved successfully')</script>";
     } catch (Exception $e) {
         return $e->getMessage();
     }
 }

    public function fetchAll(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM  ad ");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchOne()
    {
        try {
            $columnsString = implode(',', $this->tableColumns);

            $stm = $this->dbCnx->prepare("SELECT $columnsString FROM ad WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try{
            $stm = $this->dbCnx->prepare("UPDATE users SET firstName = ?,lastName = ?,address = ? WHERE id =?");
            $stm->execute([$this->firstName,$this->lastName,$this->address,$this->id]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

public function delete(){
    try{
        $stm = $this->dbCnx->prepare("DELETE FROM users WHERE id =?");
        $stm->execute([$this->id]);
        return $stm->fetchAll();
        echo "<script>alert('data deleted successfully');document.location='allData.php'</script>";
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

}
