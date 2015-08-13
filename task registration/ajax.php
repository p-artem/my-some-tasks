<?php

include dirname(__FILE__) . '/db.php';

if(isset($_POST['login'])){
    
    $login = clear_str($_POST['login']);
    $pass = clear_str($_POST['pass']);
    $repeat_pass = clear_str($_POST['repeat_pass']);
    $phone = clear_str($_POST['phone']);
    $country = $_POST['country'];
    $city = $_POST['city'];
    $invite = clear_str($_POST['invite']);
    
    $phone = str_replace(array(' ','(',')','-'), '', trim($phone, '+'));
    
    if($country == 'none')
           $city = NULL;
    
    if($pass !== $repeat_pass){
        $result = 'Пароли не совпадают';
    }else{
        $pass = sha1(md5($pass));
        $result = register($login, $pass, $phone, $city, $invite, $db);
    }
    print_r ($result);
    die();
}

if(isset($_GET['country_id'])){
    $id_city = $_GET['country_id'];
    get_cities($id_city, $db);
}

function get_cities($id_country, $pdo){
   try {
        $stmt = $pdo->prepare('SELECT * FROM cities WHERE id_country=' . $id_country );
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result)
        {
             echo json_encode(false); die();
        }
        foreach ($result as $item){
            $cities .= '<option value="'. $item['id_city'] .'">' . $item['city_name'] . '</option>';
        }
        echo json_encode($cities);
        die();
    } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
    }
}

function clear_str($str){
    return trim(strip_tags($str));
}

function check_invite($id_invite, $pdo){
    try {
        $stmt = $pdo->prepare('SELECT * FROM invites WHERE invite=' . $id_invite );
        $stmt->execute();
        $result = $stmt->fetchColumn();
        
        if($result){
            $res = update_invite($id_invite, $pdo);
        }
        else{
            $res = insert_invite($id_invite, $pdo);
        }

       return $res;
    } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
    }
}

function insert_invite($id_invite, $pdo){
    try {
        $date_status = gmdate('Y-m-d H:i:s', time() + 3600);
        
        $sth = $pdo->prepare('INSERT INTO invites (invite, status, date_status) VALUES(?,1,?)');
        $result = $sth->execute(array($id_invite, $date_status));
        return $result;
        
    } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
    }
}

function update_invite($id_invite, $pdo){
    
    try {
        $sql = 'update invites SET status = :status, date_status = :date_status where invite = :invite';
        $sth = $pdo->prepare($sql);
        
        $sth->bindValue(':invite', $id_invite, PDO::PARAM_INT);
        $sth->bindValue(':status', 1, PDO::PARAM_INT);
        $sth->bindValue(':date_status', gmdate('Y-m-d H:i:s', time() + 3600), PDO::PARAM_INT);

        $result = $sth->execute();
        return $result;
         
    } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
    }
}

function register($login, $pass, $phone, $city, $invite, $pdo){
    
    check_invite($invite, $pdo);
    
    $sql = "INSERT INTO users (login, password, phone, id_city, invite) VALUES (:login, :password, :phone, :id_city, :invite)";
        
    try {       
    $sth  = $pdo->prepare($sql);

    $sth->bindParam(':login', $login, PDO::PARAM_STR);
    $sth->bindParam(':password', $pass, PDO::PARAM_STR);
    $sth->bindParam(':phone', $phone, PDO::PARAM_STR);
    $sth->bindParam(':id_city', $city, PDO::PARAM_INT);
    $sth->bindParam(':invite', $invite, PDO::PARAM_INT); 

    $result = $sth->execute();

    echo json_encode($result); die();
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage();
    }
    
}

if(isset($_POST['username'])){
    $valid = true;
    $login = clear_str($_POST['username']);

    try {
        $stmt = $db->prepare("SELECT login FROM users WHERE login='{$login}'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result && $result[0]['login'] == $login)
            $valid = false;
        echo json_encode(array(
        'valid' => $valid,
        ));
        } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage();
        }
        
    }   
    