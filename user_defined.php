<?php
error_reporting(0); 
require_once("mysql_connection.php");

date_default_timezone_set('Asia/Kolkata');

//Class Initilization
class user_defined extends mysql_con {
	function __construct($con=1,$database="t6yagdbi477wyrttxc") {
		parent::__construct($con,$database);
	}
	function __destruct() {
		parent::__destruct();
	}

	public function loadCssFiles()
	{ ?> 

	    <link rel='stylesheet' id='contact-form-7-css' href='css/styles24b2.css?ver=5.5.5' media='all' />
		<link rel='stylesheet' id='bootstrap-css' href='css/bootstrap4e44.css?ver=1.3' media='all' />
		<link rel='stylesheet' id='shareblock_style-css' href='css/style4e44.css?ver=1.3' media='all' />
		<link rel='stylesheet' id='magnific-popup-css' href='css/magnific-popup4e44.css?ver=1.3' media='all' />
		<link rel='stylesheet' id='shareblock_responsive-css' href='css/responsive4e44.css?ver=1.3' media='all' />
		<link rel="stylesheet" type="text/css" href="css/custtom.css">
		<link rel="stylesheet" type="text/css" href="css/custom_date.css">
		<link rel='stylesheet' id='elementor-icons-css' href='css/elementor-icons.mine900.css?ver=5.14.0' media='all' />
		<link rel='stylesheet' id='elementor-frontend-css' href='css/frontend.mina25a.css?ver=3.5.5' media='all' />
		<link rel='stylesheet' id='elementor-post-4948-css' href='css/post-4948c8f5.css?ver=1630422109' media='all' />
		<link rel='stylesheet' id='shareblock_fonts_url-css'href='http://fonts.googleapis.com/css?family=Poppins%3A600%7CInter%3A400%7CInter%3A600%2C%2C400%2C600%2C500&amp;subset=latin%2Clatin-ext%2Ccyrillic%2Ccyrillic-ext%2Cgreek%2Cgreek-ext%2Cvietnamese&amp;ver=1.3' media='all' />
	    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=auto&amp;ver=5.9.3' media='all' />
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
	     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	    <style type="text/css">
	    	.jl_grid_w .jl_img_box a {
				    display: block;
				    background: #e2b22b;
			}
			.loadMoreData{
				height: 50px;
			    position: relative;
			    display: inline-block;
			    background: #000;
			    -webkit-transition: all 0.4s ease 0s;
			    -moz-transition: all 0.4s ease 0s;
			    -ms-transition: all 0.4s ease 0s;
			    -o-transition: all 0.4s ease 0s;
			    transition: all 0.4s ease 0s;
			    border-radius: 100px; 
			}
			.load-more{
				font-family: var(--jl-menu-font);
			    font-size: var(--jl-loadmore-font-size);
			    font-weight: var(--jl-loadmore-font-weight);
			    text-transform: var(--jl-loadmore-transform);
			    letter-spacing: var(--jl-loadmore-space);
			    height: 50px;
			    line-height: 50px;
			    display: block;
			    color: #fff;
			    padding: 0px 40px;
			    min-width: 280px;
			}
	    </style>

	<?php }

	public function loadJsFiles()
	{ 
		?>
		<!-- Script -->
	   
	    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	    <script src='js/jquery.minaf6c.js?ver=3.6.0' id='jquery-core-js'></script>
	    <script src='js/imagesloaded.mineda1.js?ver=4.1.4' id='imagesloaded-js'></script>
	  	<script src='js/slick4e44.js?ver=1.3' id='slick-js'></script>
	  	<script src='js/jquery.waypoints.min4e44.js?ver=1.3' id='waypoints-js'></script>
	  	<script src='js/jquery.appear4e44.js?ver=1.3' id='appear-js'></script>
	  	<script src='js/jquery.isotope.min4e44.js?ver=1.3' id='jquery-isotope-js'></script>
	  	<script src='js/lazysizes.min4e44.js?ver=1.3' id='lazysizes-js'></script>
	  	<script src='js/jquery.magnific-popup.min4e44.js?ver=1.3' id='magnific-popup-js'></script>
	  	<script src='js/custom4e44.js?ver=1.3' id='shareblock-custom-js'></script>
	  	<script src='js/webpack.runtime.mina25a.js?ver=3.5.5' id='elementor-webpack-runtime-js'></script>
	  	<script src='js/frontend-modules.mina25a.js?ver=3.5.5' id='elementor-frontend-modules-js'></script>
	  	<script src='js/waypoints.min05da.js?ver=4.0.2' id='elementor-waypoints-js'></script>
	  	<script src='js/core.min0028.js?ver=1.13.1' id='jquery-ui-core-js'></script>
		
		<?php
		
	}

	public function homeBanner(){

		$allRows=$this->selectAll("SELECT * FROM history_news_feed WHERE category='' AND DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC limit 1");
        //print_r($allRows);
		foreach ($allRows as $key ) {
			$post_title = $key['post_title'];
			$post_img = $key['post_img'];
			$post_contents = $key['post_content'];
			$post_content = substr($post_contents,0,160).'...';
			$event_date = $key['event_date'];
            $newDate = date("d M ", strtotime($event_date));
            $pathinfo = pathinfo($post_img);	
			$pathname = $pathinfo['dirname'];
			$filename = $pathinfo['basename']; ?>
		 	<div class="jl_m_center jl_spacing blog-style-one blog-small-grid">
                <div class="jl_m_center_w jl_radus_e">
 
                    <div class="jl_img_box jl_radus_e">
                        <span class="jl_post_type_icon jl_vid_link">
                        	<a href="#" class="jl_pop_vid">
                        		<i class="jli-play"></i>
                        	</a>
                        </span> 
                        <a href="#" class="w_img_link"> </a>
                        <img loading="lazy" width="800" height="1200" src="https://day2dayhistory.com/images/upload/<?php echo $filename; ?>" class="attachment-shareblock_justify size-shareblock_justifyjl-lazyload lazyload wp-post-image" alt=" <?php echo $post_title; ?>" />
                    </div>
                   
                    <div class="text-box">
                        <span class="jl_f_cat jl_lb2">
                        	<a class="post-category-color-text" href="#">
                        		<span style="background:#00c1ae"></span>
                        		<u class="jl_cat_t" style="color:#ffffff !important;"><?php echo $newDate; ?></u>
                        	</a>
                        </span> 
                        <h3> <a href="#"><?php echo $post_title;?></a> </h3>
                        <span class="jl_post_meta_s">
                            <span class="jl_author_img">
                              	<img data-del="avatar" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyload" class='avatar pp-user-avatar avatar-50 photo ' height='50' width='50' />
                            </span>
                            <p><?php echo $post_content;?></p>
                                <!-- <span class="jl_meta_t">
                                	<span class="jl_author_img_w">
                                		<a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a>
                                	</span>
                                	<span class="post-date">July 23, 2016</span>
                                	<span class="post-read-time">1 Mins read</span>
                                </span> -->
                        </span>
                    </div>
                </div>
            </div>
		<?php }
	}
	public function homeBanner_1(){

	    $allRows=$this->selectAll("SELECT * FROM history_news_feed WHERE category='historicalevents' AND DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC limit 0, 4");
        
		foreach ($allRows as $key ) {  
			$post_title = $key['post_title'];
			$post_img = $key['post_img'];
			$post_content = $key['post_content'];
			$event_date = $key['event_date'];
            $newDate = date("d M ", strtotime($event_date));
            $pathinfo = pathinfo($post_img);	
			$pathname = $pathinfo['dirname'];
			$filename = $pathinfo['basename']; 

	    ?>

	      
		        <div class="jl_m_right jl_spacing">
		            <div class="jl_m_right_w">
		            	<?php 
		            	if($post_img){?>
		            		 <div class="jl_m_right_img jl_radus_e">
		                	<a href="#">
		                		<img width="120" height="120" src="wp-content/uploads/sites/10/2021/05/ha-nguy-n-X4TRBKhsVPA-unsplash-20x20.jpg" class="attachment-shareblock_small size-shareblock_smalljl-lazyload lazyload wp-post-image" alt="" loading="lazy" />
		                	</a>
		                </div>

		            	<?php }?>
		               
		                <div class="jl_m_right_content">
		                    <span class="jl_f_cat jl_lb2">
		                    	<a class="post-category-color-text" href="#">
		                    		<span style="background:#e8391e"> </span>
		                    		<u class="jl_cat_t" style="color:#ffffff !important;"><?php echo $post_title; ?></u>
		                    	</a>
		                    </span>
		                    <h3 class="entry-title">
		                    	<a href="#"><b></b> <?php echo $post_content; ?></a>
		                    </h3>
		                   <!--  <span class="jl_post_meta">
		                    	<span class="jl_author_img_w">
		                    		<a href="#" title="Posts by Anna Nikova" rel="author">Anna Nikova</a>
		                    	</span>
		                        <span class="post-date">July 23, 2016</span>
		                    </span> -->
		                </div>
		            </div>
		        </div>

	    <?php }
	}

	public function homeBlog(){

		 $rowperpage = 15;
		 // $allcounts=$this->selectAll("SELECT count(*) as allcount FROM history_news_feed WHERE DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC");
		   $allcounts=$this->selectAll("SELECT count(*) as allcount FROM history_news_feed WHERE category='' AND DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC");

		   $allcount = $allcounts[0]['allcount'];
      //SELECT * FROM history_news_feed WHERE category='' AND DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC limit 1
		// $allRows=$this->selectAll("SELECT * FROM history_news_feed WHERE DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC limit 5,$rowperpage");
		$allRows=$this->selectAll("SELECT * FROM history_news_feed WHERE category='' AND DAY(event_date) = DAY(now()) AND MONTH(event_date) = MONTH(now()) ORDER by event_date ASC limit 1,$rowperpage");

		foreach ($allRows as $key ) {  
			$post_title = $key['post_title'];
			$post_img = $key['post_img'];
			$post_contents = $key['post_content'];
			$post_content = substr($post_contents, 0, 160 ).'...';
			$event_date = $key['event_date'];
            $newDate = date("d M ", strtotime($event_date));
            $pathinfo = pathinfo($post_img);	
			$pathname = $pathinfo['dirname'];
			$filename = $pathinfo['basename']; 
            //if($post_img){
	    ?>
	    	<div class="jl-grid-cols">
              <div class="jl_grid_w">
                <div class="jl_img_box jl_img jl_radus_e">
                 <a href="#">
                 	<?php if($post_img){?> 
                    <img width="500" height="350" src="https://day2dayhistory.com/images/upload/<?php echo $filename; ?>" class="attachment-shareblock_slidergrid size-shareblock_slidergridjl-lazyload lazyload wp-post-image" alt="" loading="lazy" style="width: 500px!important;height: 350px !important;" /> <?php }  else{?>
                     <img width="500" height="150" src="image/bg-part3.png" class="attachment-shareblock_slidergrid size-shareblock_slidergridjl-lazyload lazyload wp-post-image" alt="" loading="lazy" style="width: 500px!important;height: 150px !important;" />
                 <?php } ?>
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
	 
	 
	  <div class="jl_lmore_wrap">
	  	   <div class="loadMoreData"> 
	  	        <span class="load-more">Load More </span>
                <input type="hidden" id="row" value="1">
                <input type="hidden" id="all" value="<?php echo $allcount; ?>">
           </div>

        <!-- <div class="jl_lmore_c">
            <a href="#" class="jl-load-link"><span>load more</span></a>
           
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="all" value="<?php echo $allcount; ?>">
        </div> -->
    </div> 

	<?php }


} ?>