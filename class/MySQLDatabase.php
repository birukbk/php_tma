<?php

class MySQLDatabase {


    private $connection;

    function __construct($db_host, $username, $password, $db) {
        
        $this->connection = mysqli_connect($db_host, $username, $password, $db);

        if (mysqli_connect_errno()) {
            die('Database connection failed:'. mysqli_connect_error(). "(" . mysqli_connect_errno(). ")");
        }        
    }
    //close connection.
    function close() {
    
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }

/**
 * Query database to get the list of all songs.
 * gets a list of all of the active artists in the database 
 * with name and the number of songs accredited to them. 
 * orted by the artist name in ascending order.
 */
   public function getActiveArtists() {
       $sql =  "SELECT artist.name, COUNT(song.id) AS SongCount
                FROM artist 
                LEFT JOIN song ON (artist.id = song.artist_id) 
                Where song.id >0
                GROUP BY artist.name";
     
        $result = mysqli_query($this->connection, $sql);
        return $result;
  }


/**
 * Query database to get all of the songs in the database 
 * the title of the song, the artist name and the duration of the song
 *  sorted first by artist, then by the song title,in ascending order.
 */  
   public function getAllSongs() {
        $sql = "SELECT artist.name, song.title, song.duration 
                FROM artist 
                JOIN song  ON (artist.id = song.artist_id) 
                ORDER BY artist.name, song.title ASC" ;
     
        $result = mysqli_query($this->connection, $sql);
        return $result;
  }

  /**
   * Query database to get the total active artists.
   */

  public function getTotalActiveArtists() {
    $sql = "SELECT COUNT( DISTINCT artist.id ) AS TotalArtists
            FROM artist
            LEFT JOIN song  ON ( artist.id = song.artist_id )
            WHERE song.duration >0"; 
     
        $result = mysqli_query($this->connection, $sql);
        return $result;
  } 
    
   /**
   * Query database to get the total songs.
   */
   public function getTotalSongs() {
        $sql = "SELECT Count(*) as TotalSongs 
               FROM song"; 
     
        $result = mysqli_query($this->connection, $sql);
        return $result;
  }  

  /**
      * convert a query result object to associative array
      * @param MySQL query
      * @return associative array
      */   
    function QueryToArray($queryResult) {
        $output_array = array();        
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $output_array[] = $row;
        }
        return $output_array;
    
    }

}

?>