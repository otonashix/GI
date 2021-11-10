<?php

if(isset($_POST['folder'])){
	echo "-->".$_POST['folder'];
	echo"<script>window.location = 'index.php?vk=".($_POST['folder'])."&page=1';</script>";
}


if(count($_GET)==2){

	$php_folder = $_GET['vk'];
	$php_page = $_GET['page'];
	$php_dirname = "../uploads/".$php_folder."/";
	$php_numberimages = 20; // pagination	
	$php_count = count(glob($php_dirname."*.[JjPp][PpNn][Gg]")); // cuenta los items
	$php_totalpages = ceil($php_count/$php_numberimages);//paginacion

	$files = glob($php_dirname."*.[JjPp][PpNn][Gg]");//los ordenara por fecha
	array_multisort(array_map( 'filemtime', $files ),SORT_DESC,$files);

	?>
	<div class="box alt">
		<div class="row gtr-50 gtr-uniform">
			<?php getItemsFromPage($php_page,$php_numberimages,$php_dirname,$files);?>
		</div>
	</div>
	<div class="pagination" align="center">
		<?php echo "".getDefaultPaginationMonkey($php_page,$php_totalpages,'index.php?vk='.htmlspecialchars($_GET["vk"])); ?>
	</div>
	<?php
}

//Funciona y es un milagro, no tocar IMPORTANTE!
function getDefaultPaginationMonkey($pn,$totalpages,$urlf){ 
  $k = (($pn+2>$totalpages)?$totalpages-2:(($pn-2<1)?3:$pn));    
  $pagLink = ""; 
    if($pn>=2){ 
      $pagLink.="<a class='button alt small' href='{$urlf}&page=1'> << </a>"; 
      $pagLink.="<a class='button alt small' href='{$urlf}&page=".($pn-1)."'> < </a>"; 
    } 
        for ($i=-2; $i<=2; $i++) {
          if(($k+$i)>0 && ($k+$i)<=$totalpages){
           if($k+$i==$pn) 
              $pagLink .= "<a class='button small' href='{$urlf}&page=".($k+$i)."'>".($k+$i)."</a>"; 
            else
              $pagLink .= "<a class='button alt small' href='{$urlf}&page=".($k+$i)."'>".($k+$i)."</a>"; 
            }
        }; 
        
        if($pn<$totalpages){ 
            $pagLink.="<a class='button alt small' href='{$urlf}&page=".($pn+1)."'> > </a>"; 
            $pagLink.="<a class='button alt small' href='{$urlf}&page=".$totalpages."'> >> </a>"; 
        }  
        return $pagLink;
}


//Hace mucho lo desarrolle creo, ahora no se bien como funciona o lo copie de stakoverflow no se 
function getItemsFromPage($page, $numItems, $dir,$filesx) {

  	$offset = ($page - 1) * $numItems;
 	$x = 0;
  	
  	foreach($filesx as $image){
  	 	if($x < $offset) {
    			$x++;
 		}
   		else if($x < $numItems + $offset) {
   			?>
			<div class="col-4">	
				<span class="image fit">
					<a href="<?php echo $image;?>" data-lightbox="uploads">
					<img src="<?php echo $image;?>" alt="" style="width:15%px;height:190px;" />
					</a>
				</span>		
			</div>
			<?php
    		$x++;
   		}
   		else{
    		break;
   		}
  	}//end for
 }//end metodo

?>
