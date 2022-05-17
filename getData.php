<?php 
	require_once "user_defined.php";
    $obj = new user_defined();  
       $row = $_POST['row'];
//print_r( $row );
       $rowperpage = 15;
     
     //SELECT * FROM history_news_feed WHERE category='' AND DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC limit 1,$rowperpage

		 //$allRows=$obj->selectAll("SELECT * FROM history_news_feed WHERE DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC limit $row , $rowperpage");
     
     $allRows=$obj->selectAll("SELECT * FROM history_news_feed WHERE category='' AND DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC limit $row,$rowperpage");

		// print_r($allRows);

		foreach ($allRows as $key ) {  
			$post_title = $key['post_title'];
			$post_img = $key['post_img'];
			$post_contents = $key['post_content'];
			$post_content = substr($post_contents, 0, 160 ).'...';
			$event_date = $key['event_date'];
            $newDate = date("d M  Y", strtotime($event_date));
            $pathinfo = pathinfo($post_img);	
			$pathname = $pathinfo['dirname'];
			$filename = $pathinfo['basename']; 
            //if($post_img){
	    ?>
	    	<div class="jl-grid-cols">
              <div class="jl_grid_w">
                <div class="jl_img_box jl_img jl_radus_e">
                 <a href="#">
                
                    <img width="500" height="350" src="https://day2dayhistory.com/images/upload/<?php echo $filename; ?>" class="attachment-shareblock_slidergrid size-shareblock_slidergridjl-lazyload lazyload wp-post-image" alt="" loading="lazy" style="width: 500px!important;height: 350px !important;" /> 
                
                  </a> 


                  <span class="jl_f_cat jl_lb2"><a class="post-category-color-text" href="#">
                    <span style="background:#0061e0"></span>
                    <u class="jl_cat_t" style="color:#ffffff !important;"><?php echo $newDate; ?></u></a>
                  </span>
                </div>
                <div class="text-box">
                    <h3>
                      <a href="#"><?php echo $post_title; ?></a>
                    </h3>
                    <!-- <span class="jl_post_meta">
                      <span class="jl_author_img_w">
                        <a href="author/dsite/index.html" title="Posts by Anna Nikova" rel="author">
                          Anna Nikova
                        </a>
                      </span>
                      <span class="post-date">July 24, 2019</span>
                      <span class="post-read-time">1 Mins read</span>
                    </span> -->
                    <p><?php echo  trim($post_content); ?></p>
                </div>
              </div>
            </div>
              <?php //}
	}?>