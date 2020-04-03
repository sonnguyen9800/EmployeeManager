<?php
function select_all_subjects($db){
    $sql = "SELECT * FROM subjects ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
    
}

function select_all_pages($db){
    $sql = "SELECT * FROM pages ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_one_subject($db, $id){
    $sql = "SELECT * FROM subjects";
    $sql .= " WHERE id='" . $id ."';";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function insert_one_subject($db, $subject){
    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $subject['menu_name'] . "'," ;
    $sql .= "'" . $subject['position'] . "', ";
    $sql .= "'" . $subject['visible'] . "') ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    if ($result){
        $new_id = mysqli_insert_id($db);
        redirect(url_for('/staff/subjects/show.php?id='.$new_id));}
    else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
    
}

function edit_one_subject($db, $subject){
    $sql = "UPDATE subjects SET ";
    $sql .= "position= " . "'" . $subject['position'] .  "',"; 
    $sql .= "visible= " . "'" . $subject['visible'] .  "',";
    $sql .= "menu_name= " . "'" . $subject['menu_name'] .  "'";
    $sql .= "WHERE id= " . "'" . $subject['id'] . "'  LIMIT 1";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    if ($result){
        redirect(url_for('/staff/subjects/show.php?id='.$subject['id']));
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_subject($db, $subject){
    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . $subject['id'] ."' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    if ($result){
        redirect(url_for('/staff/subjects/index.php'));
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
?>
