<?php

class createCon  {
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $db = 'proyecto_2';
    var $myconn;

    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
            //echo 'Connection established!';
        }
        return $this->myconn;
    }

    function close() {
        mysqli_close($myconn);
        echo 'Connection closed!';
    }

   public function km_log($connectione){

        $query = " SELECT * from km_clientes order by  cliNombre asc";
        $stmt = mysqli_prepare($connectione->myconn,$query);
        
        $stmt->execute();
        $result = $stmt->get_result();
        while ($fila = $result->fetch_assoc()) {
           echo "<option data-value='".htmlspecialchars($fila['cliCednit']."-".$fila['cliNombre'])."' value='".$fila['cliId']."'>".htmlspecialchars($fila['cliCednit']."-".$fila['cliNombre'])."</option>";
        }

    }


       public function monkeyCrypt($var1,$var){

        $secret_key = 'my_195501421';
        $secret_iv = 'my_195501421';       
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
    
        if($var == 1){
            $this->hashnum = base64_encode( openssl_encrypt( $var1, $encrypt_method, $key, 0, $iv ) );  
        }
        if($var == 2){
            $this->hashnum = openssl_decrypt( base64_decode( $var1 ), $encrypt_method, $key, 0, $iv );
        } 

       return $this->hashnum;     

    }

    public function getArrayDataMonkey($conectione,$php_table,$campo1,$campo2,$condition){

        $query= "SELECT * FROM ".$php_table." ".$condition." ;";     
        $stmt = mysqli_prepare($conectione->myconn,$query);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowsArray ="";         
        while($fila = $result->fetch_assoc()){
            $rowsArray.='<option value="'.$fila[$campo1].'">'.htmlspecialchars(utf8_encode($fila[$campo2])).'</option>';
        }       
        $stmt->close();
        return $rowsArray;
    }   


}


?>