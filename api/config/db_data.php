<?php
    class Db_data
    {
        private $conn;
        private $sql;
        private $result;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function listaz()
        {
            $this->sql = "SELECT * FROM teszt";
            $this->result = $this->conn->query($this->sql);
            $returned_string = "";
            if ($this->result->num_rows > 0) {
                while ($row = $this->result->fetch_array(MYSQLI_ASSOC)) {
                    $onclickDelete = "torles(" . $row['id'] . ")";
                    $onclickModify = "modositas(" . $row['id'] . ")";
                    $returned_string .= "<tr id='teszt_" . $row['id'] . "'>";
                    $returned_string .= "<td>" . $row['id'] . "</td>";
                    $returned_string .= "<td>" . $row['nev'] . "</td>";
                    $returned_string .= "<td>" . $row['email'] . "</td>";
                    $returned_string .= "<td><button onclick='$onclickDelete' class='w3-button w3-circle w3-red w3-ripple' style='outline: none'>-</button>
                    <button onclick='$onclickModify' class='w3-button w3-square w3-grey w3-ripple' style='outline: none'>EDIT</button></td>";
                    $returned_string .= "</tr>";
                }
            }
            return $returned_string;
        }

        public function torles($id)
        {
            $this->sql = "DELETE FROM teszt WHERE id = $id";
            $this->result = $this->conn->query($this->sql);
            return $this->result;
        }

        public function hozzaad($nev, $email)
        {
            $this->sql = "INSERT INTO teszt (id, nev, email) VALUES (NULL, '$nev', $email)";
            $this->result = $this->conn->query($this->sql);
            return $this->result;
        }

        public function modosit($id, $nev, $email)
        {
            $this->sql = "UPDATE teszt SET nev='$nev', email='$email' WHERE id=$id";
            $this->result = $this->conn->query($this->sql);
            return $this->result;
        }

        public function get($id)
        {
            $this->sql = "SELECT * FROM teszt WHERE id = $id";
            $this->result = $this->conn->query($this->sql);
            $returned_string = "";
            if ($this->result->num_rows > 0) {
                while ($row = $this->result->fetch_array(MYSQLI_ASSOC)) {
                    $returned_string = json_encode($row);
                }
            }
            return $returned_string;
        }
    }
?>