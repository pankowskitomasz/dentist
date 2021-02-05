<?php

class TMessage{
    private $link;

    private function checkMessagePresence($firstA,$lastA,$phoneA,$emailA,$msgA){
        $sql = "select id from ";
        $sql .= DB_PREFIX;
        $sql .= "messages where ";
        $sql .= "firstname=:fn and ";
        $sql .= "lastname=:ln and ";
        $sql .= "phone=:ph and ";
        $sql .= "email=:em and ";
        $sql .= "message=:msg";
        $stmt = $this->link->prepare($sql);
        $stmt->bindParam(":fn",$firstA);
        $stmt->bindParam(":ln",$lastA);
        $stmt->bindParam(":ph",$phoneA);
        $stmt->bindParam(":em",$emailA);
        $stmt->bindParam(":msg",$msgA);
        $stmt->execute();
        return is_array($stmt->fetch(PDO::FETCH_ASSOC))?true:false;
    }

    public function deleteMessage($msgID){
        $sql = "delete from ";
        $sql .= DB_PREFIX;
        $sql .= "messages where id=:mid";
        $stmt = $this->link->prepare($sql);
        $stmt->bindParam(":mid",$msgID);
        return $stmt->execute();
    }

    public function getList(){
        $stmt = $this->link->prepare("select * from ".DB_PREFIX."messages");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;    
    }

    public function getListLength(){
        $stmt = $this->link->prepare("select count(*) from ".DB_PREFIX."messages");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res[0][0];    
    }

    public function __construct($dbLinkA=null){
        $this->link = $dbLinkA;
    }

    public function getDBLink(){
        return $this->link;
    }

    public function insert($firstA,$lastA,$phoneA,$emailA,$msgA){
        if(!$this->checkMessagePresence($firstA,$lastA,$phoneA,$emailA,$msgA)){
            $sql = "insert into ";
            $sql .= DB_PREFIX;
            $sql .= "messages(firstname,lastname,phone,email,message) ";
            $sql .= "values(:fn,:ln,:ph,:em,:msg)";
            $stmt = $this->link->prepare($sql);
            $stmt->bindParam(":fn",$firstA);
            $stmt->bindParam(":ln",$lastA);
            $stmt->bindParam(":ph",$phoneA);
            $stmt->bindParam(":em",$emailA);
            $stmt->bindParam(":msg",$msgA);
            return $stmt->execute();
        }
        return false;
    }

    public function getById($msgID){
        $sql = "select * from ";
        $sql .= DB_PREFIX;
        $sql .= "messages where id=:msgid";
        $stmt = $this->link->prepare($sql);
        $stmt->bindParam(":msgid",$msgID);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;    
    }

    public function getByTag($tagA){
        $sql = "select * from ";
        $sql .= DB_PREFIX;
        $sql .= "messages where ";
        $sql .= "firstname like \"%$tagA%\" or ";
        $sql .= "lastname like \"%$tagA%\" or ";
        $sql .= "phone like \"%$tagA%\" or ";
        $sql .= "email like \"%$tagA%\" or ";
        $sql .= "message like \"%$tagA%\"";
        $stmt = $this->link->prepare($sql);
        $stmt->execute();        
        $res = $stmt->fetchAll();
        return $res;    
    }

    public function setDBLink($dbLinkA=null){
        $this->link = (isset($dbLinkA))?$dbLinkA:null;        
    }
}

?>