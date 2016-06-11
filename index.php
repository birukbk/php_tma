        <?php
        if (isset($_GET['page'])) {
    
            $page = intval($_GET['page']);
        
        } else {
            
            $page = 0;
        
        }
        
        
        // Display content, based on the value passed 
        switch ($page) {
            
            // Display artist page 
            case 1 : include("views/artist.php"); 
                break;
            
            // Display song page 
            case 2 : include("views/song.php"); 
                break;
            
            // Display  Welcome page 
            default : include("views/welcome.php"); 
               break;
        }
        	
		?>

