<?php

namespace Foundation;

abstract class Model
{
    static $database;
    private $table;

    public function __construct($table)
    {
        if (static::$database === null) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

            $conn = 'mysql:host=' . $connection['host'] . ';dbname=' . $connection['name'] . ';charset=utf8';
            $user = $connection['username'];
            $password = $connection['password'];

            try {
                $database = new \PDO($conn, $user, $password);

                // Throw an Exception when an error occurs
                $database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                static::$database = $database;
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        $this->table = $table;
    }

    public function select(array $data = null)
    {
        $where = "";

        if ($data) {
            foreach ($data as $key => $value) $where .= (!strpos($where, 'WHERE') ? " WHERE " : " AND ") . $key . "=" . $value;
        }

        $prepare = "SELECT * FROM " . $this->table . $where;
        $query = $this->DB()->query($prepare);
        $query->execute();

        return $query;
    }

    public function insert(array $data)
    {
        if ($this->table === "") throw new \Exception("Attribute table is empty string!");

        $question_marks = array_fill(0, count($data), '?');
        $fields = array_keys($data);
        $values = array_values($data);

        $prepare = "INSERT INTO " . $this->table . "(" . implode(",", $fields) . ")
            VALUES(" . implode(",", $question_marks) . ")
        ";

        $this->execute($prepare, $values);

        // Return last inserted ID.
        // return $this->DB()->lastInsertId();
    }

    public function update(array $data, int $id)
    {
        if ($this->table === "") throw new \Exception("Attribute table is empty string!");

        $fields = array_keys($data);
        $values = array_values($data);
        // add id to $values
        array_push($values, $id);

        // add ? to fields
        $set = [];
        foreach ($fields as $field) array_push($set, $field . '=?');

        $prepare = "UPDATE " . $this->table . "
            SET " . implode(",", $set) . " 
            WHERE id=?
        ";

        $this->execute($prepare, $values);

        // Return last inserted ID.
        // return $this->DB()->lastInsertId();
    }

    public function delete(array $data = null)
    {
        $where = "";
        if ($data) {
            foreach ($data as $key => $value) $where .= (!strpos($where, 'WHERE') ? " WHERE " : " AND ") . $key . "=" . $value;
        }

        $prepare = "DELETE FROM " . $this->table . $where;

        $this->execute($prepare);
    }

    public function execute(string $prepare, array $values = [])
    {
        $statement = $this->DB()->prepare($prepare);

        $statement->execute($values);
    }

    protected function DB(): \PDO
    {
        return static::$database;
    }
}
