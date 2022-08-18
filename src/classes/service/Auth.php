<?php
class Authenticator{
    
    public static function authenticate (User $user){
        $db=Database::getInstance();
        
        $log= $db->prepare('SELECT `id`,`username`,`password` FROM users WHERE username=:username');
        $params=[
            'username' => $_POST['username'],
            ];
        $log->execute($params);
        $log->setFetchMode(PDO::FETCH_CLASS, get_class($user));
        
        $result= $log->fetch();
        
        $passwordHashed = $result->password;
        $verif = password_verify($_POST['password'], $passwordHashed);
        
        if($result === false || $verif === false){
            $_SESSION['message'] = "Mauvais Nom d'utilisateur ou Mot de passe";
            return false;
            
        }else{
            $_SESSION['logged_as'] = $result->username;
            $_SESSION['logged_user'] = $result->id;
            $_SESSION['message'] = null;
        }
    
    }
    public static function logout(){
        $_SESSION['logged_as'] = null;
        $_SEISSON['logged_user'] = null;
    }
    
    public static function isLogged(){
        return !empty($_SESSION['logged_as']);
    }
    
    public static function error(){
        return !empty($_SESSION['message']);
    }
}