<?php
 require_once("database.php");

 class crud{

 // Dynamic properties for table columns will be stored in this array
 private $tableColumns = [];

  protected $dbCnx;
  protected $tableName;

  public function __construct($tableName) {
    $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    // Set the provided table name to the $tableName property
    $this->tableName = $tableName;

    // Fetch column names and store them in the $tableColumns array
    try {
        $stmt = $this->dbCnx->prepare("DESCRIBE $tableName");
        $stmt->execute();
        $columnNames = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $this->tableColumns = $columnNames;
    } catch (PDOException $e) {
        echo "Error fetching column names: " . $e->getMessage();
        exit;
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
            // Ensure that $this->tableName is correctly set in the constructor
            if (empty($this->tableName)) {
                
                throw new Exception("Table name is not set.");
            }
    
            $columnsString = implode(',', $this->tableColumns);
            $placeholders = implode(',', array_fill(0, count($this->tableColumns), '?'));
    
            $sql = "INSERT INTO {$this->tableName} ($columnsString) VALUES ($placeholders)";
            $stm = $this->dbCnx->prepare($sql);
            $values = [];
            foreach ($this->tableColumns as $column) {
                // Check if the property is set, if not, set it as null in the database
                if (isset($this->$column)) {
                    $values[] = $this->$column;
                } else {
                    $values[] = null;
                }
            }
            $stm->execute($values);
    
            echo "<script>alert('data saved successfully')</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    
    

    public function fetchAll()
{
    try {
        // Ensure that $this->tableName is correctly set in the constructor
        if (empty($this->tableName)) {
            throw new Exception("Table name is not set.");
        }

        $sql = "SELECT * FROM {$this->tableName}";
        $stm = $this->dbCnx->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    } catch (Exception $e) {
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

    public function update()
    {
        try {
            // Ensure that $this->tableName is correctly set in the constructor
            if (empty($this->tableName)) {
                throw new Exception("Table name is not set.");
            }
    
            // Create the SET clause for the UPDATE query
            $setClause = "";
            foreach ($this->tableColumns as $column) {
                // Check if the property is set, and if so, add it to the SET clause
                if (isset($this->$column)) {
                    $setClause .= "$column = ?,";
                }
            }
            $setClause = rtrim($setClause, ',');
    
            // If no properties are set to update, return early with a message
            if (empty($setClause)) {
                throw new Exception("No data to update.");
            }
    
            // Create the SQL query with the dynamic SET clause
            $sql = "UPDATE {$this->tableName} SET {$setClause} WHERE id = ?";
            $stm = $this->dbCnx->prepare($sql);
    
            // Prepare the values for the prepared statement
            $values = [];
            foreach ($this->tableColumns as $column) {
                if (isset($this->$column)) {
                    $values[] = $this->$column;
                }
            }
            $values[] = $this->id;
    
            // Execute the prepared statement
            $stm->execute($values);
    
            echo "<script>alert('data updated successfully')</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    




    public function delete()
    {
        try {
            // Ensure that $this->tableName is correctly set in the constructor
            if (empty($this->tableName)) {
                throw new Exception("Table name is not set.");
            }
    
            $sql = "DELETE FROM {$this->tableName} WHERE id = ?";
            $stm = $this->dbCnx->prepare($sql);
    
            // Execute the prepared statement with the id property value
            $stm->execute([$this->id]);
    
            echo "<script>alert('data deleted successfully')</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }




    public function fetchLastRow()
{
    try {
        // Ensure that $this->tableName is correctly set in the constructor
        if (empty($this->tableName)) {
            throw new Exception("Table name is not set.");
        }

        // Fetch the last row from the specified table
        $sql = "SELECT * FROM {$this->tableName} ORDER BY id DESC LIMIT 1";
        $stm = $this->dbCnx->prepare($sql);
        $stm->execute();
        return $stm->fetch();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

    

}
