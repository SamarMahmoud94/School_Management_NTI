<?php
class Connect
{
    private const host_name = "localhost";
    private const user_name = "root";
    private const password = "";
    private const db = "school_management";
    private const port = 3307;

    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect(self::host_name, self::user_name, self::password, self::db, self::port);
    }
    public function isert(array $post, string $tableName): bool
    {
        $colms = [];
        $values = [];
        foreach ($post as $key => $value) {
            $colms[] = $key;
            $values[] = "'" . $value . "'";
        }
        $colmsString = implode(',', $colms);
        $valuesString = implode(',', $values);
        if ($this->conn->query("INSERT INTO $tableName ($colmsString) VALUES($valuesString)")) {
            return true;
        }
        return false;
    }
    public function select(string $tableName)
    {
        $s = "SELECT * FROM $tableName";
        $rows = $this->conn->query($s);
        if ($rows->num_rows > 0) {
            $data = $rows->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
        return [];
    }

    public function selectOne($tableNmae, $id): array
    {
        $s = "select * from $tableNmae where id = $id  limit 1";

        $row = $this->conn->query($s);
        if ($row->num_rows > 0) {
            $data = $row->fetch_assoc();
            return $data;
        }
        return [];
    }

    public function update(array $post, string $tableName, $id): bool
    {
        $fieldvalue = [];
        foreach ($post as $key => $value) {
            $fieldvalue[] = "$key='$value'";
        }
        $fieldvalueString = implode(',', $fieldvalue);
        $s = "update $tableName set $fieldvalueString where id=$id";
        if ($this->conn->query($s)) {

            return true;
        }
        return false;
    }

    public function login(string $username,string $password):array
    {
        $s="select * from users where user_name = '$username' and password = '$password' limit 1" ;
        $row = $this->conn->query($s);
        if ($row->num_rows > 0) {
            $data = $row->fetch_assoc();
            return $data;
        }
        return [];
    }

    public function delete(string $tableName, $id): bool
    {
        $s = "DELETE FROM $tableName WHERE id=$id";
        if ($this->conn->query($s)) {
            return true;
        }
        return false;
    }
}
