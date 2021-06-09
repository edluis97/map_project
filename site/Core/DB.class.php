<?php

class DB {

  public static function queryResults($sql) {
    global $conn;
    $query = mysqli_query($conn, $sql);    
    $queryRes = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_free_result($query);

    return $queryRes;
  }
  
  public static function querySingleResult($sql) {
    global $conn;
    $query = mysqli_query($conn, $sql);
    $queryRes = mysqli_fetch_assoc($query);
    mysqli_free_result($query);

    return $queryRes;
  }

  public static function count() {
    global $conn;
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    mysqli_free_result($query);

    return $count;
  }
  
  public static function escape_string($str) {
    global $conn;
    return mysqli_real_escape_string($conn, $str);
  }

}
