<?php

class mySQL{
    var $host;
    var $username;
    var $password;
    var $database;
    public $dbc;

    public function connect( $set_host, $set_username, $set_password, $set_database ) {
        $this->host = $set_host;
        $this->username = $set_username;
        $this->password = $set_password;
        $this->database = $set_database;

        $this->dbc = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Erro de conexão com banco de dados');
    }

    public function query ($sql ) {
        return mysqli_query($this->dbc, $sql) or die(mysql_error());
    }

    public function fetch($sql) {
        return mysqli_fetch_array(mysqli_query($this->dbc, $sql));
    }

    public function close() {
        return mysqli_close($this->dbc);
    }
}
?>
