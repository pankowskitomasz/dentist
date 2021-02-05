<?php

class TUser{
    private $id;
    private $data;
    private $link;

    private function emailExists($emailA){
        $sql = "select id from ".DB_PREFIX."users where email=:umail";
        $stmt = $this->link->prepare($sql);
        $stmt->bindParam(":umail",$emailA);
        $stmt->execute();
        return is_array($stmt->fetch(PDO::FETCH_ASSOC))?true:false;
    }

    private function usernameExists($nameA){
        $sql = "select id from ".DB_PREFIX."users where username=:uname";
        $stmt = $this->link->prepare($sql);
        $stmt->bindParam(":uname",$nameA);
        $stmt->execute();
        return is_array($stmt->fetch(PDO::FETCH_ASSOC))?true:false;
    }

    public function __construct($dbLinkA=null){
        $this->id = null;
        $this->data = array(
            "username"=>"",
            "password"=>"",
            "email"=>""
        );
        $this->link = $dbLinkA;
    }

    public function deleteUser($idA){
        if(isset($idA)
        && $this->getById($idA)){
            $stmt = $this->link->prepare("delete from ".DB_PREFIX."users where id=:uid");
            $stmt->bindParam(":uid",$idA);
            return $stmt->execute();
        }
    }

    public function getById($idA){
        if(isset($idA)
        && isset($this->link)){
            $sql = "select * from ".DB_PREFIX."users where id=:uid";
            $stmt = $this->link->prepare($sql);
            $stmt->bindParam(":uid",$idA);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if(is_array($res)){
                $this->id = $idA;
                if(isset($res['username'])){
                    $this->data["username"] = $res['username'];
                }
                if(isset($res['password'])){
                    $this->data["password"] = $res['password'];
                }
                if(isset($res['email'])){
                    $this->data["email"] = $res['email'];
                }
                return true;
            }
            return false;
        }
    }

    public function getByEmail($emailA){
        if(isset($emailA)
        && isset($this->link)){
            $sql = "select * from ".DB_PREFIX."users where email=:umail";
            $stmt = $this->link->prepare($sql);
            $stmt->bindParam(":umail",$emailA);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if(is_array($res)){
                $this->data["email"] = $emailA;
                if(isset($res['id'])){
                    $this->data["id"] = $res['id'];
                }
                if(isset($res['password'])){
                    $this->data["password"] = $res['password'];
                }
                if(isset($res['username'])){
                    $this->data["username"] = $res['username'];
                }
                return true;
            }
            return false;
        }
    }

    public function getByName($nameA){
        if(isset($nameA)
        && isset($this->link)){
            $sql = "select * from ".DB_PREFIX."users where username=:uname";
            $stmt = $this->link->prepare($sql);
            $stmt->bindParam(":uname",$nameA);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if(is_array($res)){
                $this->data["username"] = $nameA;
                if(isset($res['id'])){
                    $this->data["id"] = $res['id'];
                }
                if(isset($res['password'])){
                    $this->data["password"] = $res['password'];
                }
                if(isset($res['email'])){
                    $this->data["email"] = $res['email'];
                }
                return true;
            }
            return false;
        }
    }

    public function getData($fieldA){
        if($fieldA=="id"){
            return $this->id;
        }
        else if(array_key_exists($fieldA,$this->data)){
            return $this->data[$fieldA];
        }
    }

    public function getList(){
        if(isset($this->link)){
            $stmt = $this->link->prepare("select id,username,email from ".DB_PREFIX."users");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    public function getListLength(){
        $stmt = $this->link->prepare("select count(*) from ".DB_PREFIX."users");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res[0][0];
    }

    public function getDBLink(){
        return $this->link;
    }

    public function saveUser(){
        if($this->id){
            //update existing
            $sql = "update ".DB_PREFIX."users set ";
            $sql .= "username = :uname,";
            $sql .= "password = :upass,";
            $sql .= "email = :umail ";
            $sql .= "where id=:uid";
            $stmt = $this->link->prepare($sql);
            $stmt->bindParam(":uname",$this->data['username']);
            $stmt->bindParam(":upass",$this->data['password']);
            $stmt->bindParam(":umail",$this->data['email']);
            $stmt->bindParam(":uid",$this->id);
            return $stmt->execute();
        }
        else if(!$this->usernameExists($this->data['username'])
        && !$this->emailExists($this->data['email'])){
            //create new
            $sql = "insert into ".DB_PREFIX."users(username,password,email)";
            $sql .= "values(:uname,:upass,:umail)";
            $stmt = $this->link->prepare($sql);
            $stmt->bindParam(":uname",$this->data['username']);
            $stmt->bindParam(":upass",$this->data['password']);
            $stmt->bindParam(":umail",$this->data['email']);
            return $stmt->execute();
        }
    }

    public function setData($fieldA,$valA){
        if($fieldA==="id"){
            $this->id = $valA;
        }
        if(array_key_exists($fieldA,$this->data)){
            $this->data[$fieldA] = $valA;
        }
    }

    public function setDBLink($dbLinkA=null){
        $this->link = (isset($dbLinkA))?$dbLinkA:null;        
    }

}


?>







