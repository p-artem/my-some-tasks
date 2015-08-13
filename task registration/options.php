<?php

header('Content-Type: text/html; charset=utf-8');
 
function get_countries($pdo){
    try {
    $stmt = $pdo->prepare('SELECT * FROM countries');
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $item){
        $countries .= '<option value="'. $item['id_country'] .'">' . $item['country_name'] . '</option>';
    }
    return $countries;
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage();
    }
}

function get_users($pdo){
    
    $sql = 'SELECT users.id_user ,users.login, users.phone , cities.city_name, countries.country_name FROM users
            LEFT JOIN cities on users.id_city = cities.id_city
            LEFT JOIN countries on cities.id_country = countries.id_country;';
    
    try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage();
    }
}

function get_invites($pdo){
    $sql = 'SELECT * FROM invites';
    
    try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage();
    }
}
