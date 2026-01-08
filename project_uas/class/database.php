<?php
class Database {
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $db_name = 'latihan1';
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
    }

    public function query($sql) { return $this->conn->query($sql); }

    public function get($table, $where) {
        $sql = "SELECT * FROM $table WHERE $where";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function insert($table, $data) {
        $cols = implode(", ", array_keys($data));
        $vals = "'" . implode("', '", array_values($data)) . "'";
        return $this->conn->query("INSERT INTO $table ($cols) VALUES ($vals)");
    }

    public function update($table, $data, $where) {
        $query = "";
        foreach ($data as $key => $val) { $query .= "$key='$val', "; }
        $query = rtrim($query, ", ");
        return $this->conn->query("UPDATE $table SET $query WHERE $where");
    }

    public function delete($table, $filter) {
        return $this->conn->query("DELETE FROM $table $filter");
    }

    public function total($table, $where = null) {
        $sql = "SELECT COUNT(*) as total FROM $table" . ($where ? " WHERE $where" : "");
        return $this->conn->query($sql)->fetch_assoc()['total'];
    }

    public function getLimit($table, $limit, $offset, $where = null) {
        $sql = "SELECT * FROM $table" . ($where ? " WHERE $where" : "") . " LIMIT $offset, $limit";
        return $this->conn->query($sql);
    }
}