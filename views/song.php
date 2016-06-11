<?php

/**
 * Song Page
 */


/*Include the application configuration settings
Include the database class definition*/
require_once 'includes/config.php';
require_once 'functions/functions.php';
require_once 'class/MySQLDatabase.php';


$output = '';


$db = new MySQLDatabase($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);


//query execution for songs
$all_songs= $db->getAllSongs();
$total_songs= $db->getTotalSongs();
//query for artists execution
$active_artists= $db->getActiveArtists();
$total_active_artist= $db->getTotalActiveArtists();



if ($all_songs !== false and $total_songs !== false) {

    //Pass result to the class method for songs
    $song_array = $db->QueryToArray($all_songs);
    $total_song_array = $db->QueryToArray($total_songs);
    //Pass result to the class method for artists
    $artist_array = $db->QueryToArray($active_artists);
    $total_artist_array = $db->QueryToArray($total_active_artist);
    
    //  check if there were any results
    if (empty($song_array)) {

        $output .= '<p>No Song found in database.</p>';

    } else {
       
       	 //html output with table
		$output .='	<table class="contentTable">
				   	<thead>
				   	<tr>
					<th>Name</th>
					<th>Title</th>
					<th>Duration</th>		
					</tr>
				   	</thead>';
		
		//get the values from database
		for($i=0;$i<count($song_array);$i++){
			
			//populating the table with the values
			$output.='<tbody><tr>';
	    	$output.='<td>'.htmlentities($song_array[$i]['name']).'</td>';
	    	$output.='<td>'.htmlentities($song_array[$i]['title']).'</td>';
	    	$output.='<td>'.htmlentities(secToMins($song_array[$i]['duration'])).'</td>';
	 		$output.= '</tr> </tbody>';
			
		}
		
		// Close table tag	
	 	$output .='</table>';
		
		$convertToHTMLentities = htmlentities($total_song_array[0]['TotalSongs']);
		$output .='<p> Total Songs: '.$convertToHTMLentities.'</p>';
		$convertToHTMLentities = htmlentities($total_artist_array[0]['TotalArtists']);
		$output .='<p> Total active artists: '.$convertToHTMLentities.'</p>';

    }

} else {
    
    $output .= '<p>Oops... Query has failed!</p>';

}

// Close  connection
$db->close();

$content='';
$tpl_head=file_get_contents('includes/head.html');
$tpl = file_get_contents('templates/template.html');
$page_footer=file_get_contents('includes/footer.html');

$title = 'W1 Music';
$heading = 'W1 Music - Songs';
$song_page_content= $output;

//parse a template and populate it with values
$songPageContent=parseTemplate($tpl, array( 
                                    '{{ page_title }}' => $title ,
                                    '{{ page_heading }}' => $heading,
                                    '{{ content }}' => $song_page_content));


//constracting the songs page
$page_header=parseTemplate($tpl_head,array('{{ page_heading }}' => $heading));
$content.=$page_header;
$content.=$songPageContent;
$content.=$page_footer;


// render songpage by joining title, heading and output.
echo $content;

?>