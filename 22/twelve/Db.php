<?php



class Db
{
    private object $conn;
    public int $count = 0;
    public function __construct()
    {
        $config = require __DIR__ . '/config.php';
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );
        $this->conn = new PDO(
            "mysql:host={$config['db']['host']};
            dbname={$config['db']['db']}",
            $config['db']['user'],
            $config['db']['password'],
            $opt);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insert($tableName, $firstName, $lastName, $email):void
    {
        $sql = "INSERT INTO {$tableName}(firstname, lastname, email)
        VALUES ('{$firstName}', '{$lastName}', '{$email}')";
        $this->conn->exec($sql);
        echo "<p>Data were been inserted into table <b>'{$tableName}'</b>. 
        The user's first name is <b>'{$firstName}'</b>, 
        the last name is <b>'{$lastName}'</b> and the email is <b>'{$email}'</b></p>";
    }


    public function getData($columnName, $tableName, $id): void
    {
        $sth = $this->conn->prepare("SELECT `{$columnName}` FROM `{$tableName}` WHERE `id` = :id");
        $sth->execute(array('id' => $id));
        $array = $sth->fetch(PDO::FETCH_ASSOC);

        echo "<p>The data were been selected from <b>`{$tableName}`</b>, 
        from column <b>`{$columnName}`</b> and with id <b>`{$id}`</b>. 
        And the result is <b>`{$array['firstname']}`</b></p>";
    }

    public function delData($tableName, $id):void
    {
        $sql = "DELETE FROM {$tableName} WHERE id={$id}";
        $this->conn->exec($sql);
        echo "Record deleted successfully";
    }

    public function update($tableName, $columnName, $newData, $id): void
    {
        $sql = "UPDATE {$tableName} SET {$columnName}='{$newData}' WHERE id=$id";
        $this->conn->exec($sql);
        echo "<p>The record with id <b>{$id}</b> was updated successfully.
        The new value is <b>{$newData}</b></p>";
    }

    public function count($tableName): void
    {
        $all= $this->conn->query("SELECT * FROM {$tableName}");
        $this->count = $all->rowCount();
        echo "Count of rows in table = {$this->count}";
    }

    public function deleteTable($tableName):void
    {
        $sql = "DROP TABLE {$tableName}";
        $this->conn->exec($sql);
        echo "Delete successfully {$tableName}";

    }

}