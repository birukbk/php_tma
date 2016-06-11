<?php
/**
 * artist Page
 */

/*Include the application configuration settings
Include the database class definition*/
require_once 'includes/config.php';
require_once 'class/MySQLDatabase.php';
require_once 'functions/functions.php';



$output = '';
$db = new MySQLDatabase($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);


//query execution for artists
$active_artists= $db->getActiveArtists();
$total_active_artist= $db->getTotalActiveArtists();
//query execution for songs
$all_songs= $db->getAllSongs();
$total_songs= $db->getTotalSongs();



if ($active_artists !== false and $total_active_artist !== false) {

    // Pass result to the class method for artists
    $artist_array = $db->QueryToArray($active_artists);
    $total_artist_array = $db->QueryToArray($total_active_artist);

    //Pass result to the class method for songs
    $song_array = $db->QueryToArray($all_songs);
    $total_song_array = $db->QueryToArray($total_songs);
    
    // check if there were any results
    if (empty($artist_array)) {

        $output .= '<p>No artist found in database.</p>';

    } else {
        
        //html output with table
		
		$output .='	<table class="contentTable">
				   	<thead>
				   	<tr>
					<th>Name</th>
					<th>Number of Songs</th>
					</tr>
				   	</thead>';
	 
	//get the values from database
		for($i=0;$i<count($artist_array);$i++){

	 		//populating the table with the values	
	   		$output.='<tbody><tr>';
	    	$output.='<td>'.htmlentities($artist_array[$i]['name']).'</td>';
	    	$output.='<td>'.htmlentities($artist_array[$i]['SongCount']).'</td>';
	 		$output.= '</tr> </tbody>';
		}
			
		// Close table tag	
	 	$output .='</table>';
		
		$convertToHTMLentities = htmlentities($total_artist_array[0]['TotalArtists']);
		$output .='<p> Total active artists: '.$convertToHTMLentities.'</p>';
		$convertToHTMLentities = htmlentities($total_song_array[0]['TotalSongs']);
		$output .='<p> Total Songs: '.$convertToHTMLentities.'</p>';
	
    }

	} else {
    
    $output .= '<p>Query failed.</p>';

}

// Close the connection
$db->close();


$content='';
$tpl_head=file_get_contents('includes/head.html');
$tpl = file_get_contents('templates/template.html');
$page_footer=file_get_contents('includes/footer.html');

$title = 'W1 Music';
$heading = 'W1 Music - Artist';
$artist_page_content= $output;

//parse a template and populate it with values
$page_header=parseTemplate($tpl_head,array('{{ page_heading }}' => $heading));
$artistPageContent=parseTemplate($tpl, array( 
                                    '{{ page_title }}' => $title ,
                                    '{{ page_heading }}' => $heading,
                                    '{{ content }}' => $artist_page_content));

//constracting the artist page
$content.=$page_header;
$content.=$artistPageContent;
$content.=$page_footer;

echo $content;

?>