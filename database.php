<?php
// Database connection
if (!function_exists('establishConnection')) {
    function establishConnection() {
        $servername = getenv('DB_SERVER_NAME');
        $username =  getenv('DB_USER');
        $password =  getenv('DB_PASS');
        $dbname =  getenv('DB_NAME');;
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo "Failed to connect to db".mysqli_connect_error();
        }
        return $conn;
    }

    function closeConnection($conn) {
        $conn->close();
    }
}
?>

<?php 
// Databasse functions

function executeQuery($query, $needOutput, $isarray) {
    $conn = establishConnection();
    $result = $conn->query($query);
    closeConnection($conn);
    if($needOutput){
        if($isarray){
            $records = array();
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $records[] = $row;
                }
                return $records;
            }
        }
        else{
            return mysqli_fetch_array($result);
        }
    }
    return null;
}

function get_sql_string($value) {
    return mysqli_real_escape_string(establishConnection(), $value);
}

function get_table($table) {
    $query = "SELECT * FROM $table ORDER BY id DESC";
    return executeQuery($query, true, true);
}
?>