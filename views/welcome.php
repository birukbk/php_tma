<?php
/**
 * Welcome WebPage
 */

// Gather output
require_once 'functions/functions.php';
$content='';
$output = '<table class="welcom_contentTable">
				<thead>
				   	<tr>
						<th>Welcome message</th>
					</tr>
				</thead>
				<tbody>
					<tr>
               			<td>
                			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus molestie facilisis 
                            posuere. Proin bibendum urna tellus, sed pellentesque mauris eleifend vitae. Pellentesque 
                            ultricies tempor nunc eget aliquet. Mauris eu imperdiet dolor, vel blandit lectus.
                             Nunc dictum in lorem et varius. Aenean eleifend viverra quam id dapibus.
                            Sed faucibus massa eu venenatis malesuada. Vivamus scelerisque finibus felis, id ultricies
                            nunc suscipit at. Sed egestas, enim vel bibendum rutrum, lorem odio scelerisque odio, 
                            a aliquam massa libero non arcu. Mauris a turpis at turpis congue volutpat. Ut semper ipsum
                            sed felis porttitor, et rhoncus diam bibendum. Etiam nec leo purus. Proin eget leo ultricies,
                            ultrices augue eget, convallis erat. Phasellus ipsum nisl, pellentesque vitae est eget, dapibus 
                            utrum velit. Fusce sed auctor quam. Proin semper, quam eu dictum egestas, risus nisl consectetur
                             lectus, vitae accumsan lacus ex a lectus.
                            Donec commodo nec ante lacinia egestas. Donec ullamcorper purus sed molestie scelerisque. 
                            Integer eu sapien sit amet tortor molestie sagittis vel a est. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Etiam ut neque dictum, venenatis ligula sollicitudin, vehicula 
                            dolor. In eu magna eu erat gravida tristique eget at neque. Sed luctus dictum ligula, sed 
                            feugiat nisi sollicitudin quis. Phasellus nec nulla enim. Nunc a posuere enim, non blandit 
                            orci. Integer ullamcorper pharetra venenatis. Mauris sit amet faucibus mi.
                            Maecenas tristique massa sit amet ipsum viverra, id sodales tellus egestas.
                            Aliquam at neque risus. Curabitur convallis sodales quam, sed commodo est tincidunt aliquet. 
                            Nulla vel metus neque. Mauris ut eros justo. Aliquam varius tortor pharetra nunc pretium malesuada. 
                            Maecenas congue justo mi, ac fermentum ligula rhoncus ac. Nullam malesuada neque at fermentum sodales. 
                            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec posuere nec elit bibendum pellentesque.
                		</td>
                	</tr>
                </tbody>
			</table>';


$tpl = file_get_contents('templates/template.html');
$tpl_head=file_get_contents('includes/head.html');
$page_footer=file_get_contents('includes/footer.html');

$title = 'W1 Music';
$heading = 'W1 Music - Home';

//parse a template and populate it with values
$page_header=parseTemplate($tpl_head,array('{{ page_heading }}' => $heading));
$welcomPageContent=parseTemplate($tpl, array( 
                                    '{{ page_title }}' => $title ,
                                    '{{ page_heading }}' => $heading,
                                    '{{ content }}' => $output));


//constracting the welcome page
$content.=$page_header;
$content.=$welcomPageContent;
$content.=$page_footer;

echo $content;

?>
