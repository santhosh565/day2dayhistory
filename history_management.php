<?php 
require_once "user_defined.php";
$obj = new user_defined(); 

/*date history get data */

class history_details {

   function __construct($ht_date=NULL,$ht_month=NULL) {

    $this->ht_date=$ht_date;
    $this->ht_month=$ht_month;

   }
	public function day_history() {
    
    global  $obj;
    $htr_date= $this->ht_date;
    $htr_month= $this->ht_month;
    $dt_val="DAY(now())";
    $mt_val="MONTH(now())";
    if(!empty($htr_date) && !empty($htr_month))
    {
      $dt_val =  "$htr_date";
      $mt_val =  "$htr_month";
    }
    
		$allRows=$obj->selectAll("SELECT * FROM history_news_feed WHERE category='' AND DAY(event_date) = $dt_val AND MONTH(event_date) = $mt_val ORDER by event_date ASC limit 1"); 
    
		foreach ($allRows as $key ) {
			$post_title = $key['post_title'];
			$post_img = $key['post_img'];
			$post_content = $key['post_content'];
			//$post_content = substr($post_contents);
			$event_date = $key['event_date'];
      $newDate = date("d M  Y", strtotime($event_date));
      $newDate1 = date("M  d", strtotime($event_date));
      $pathinfo = pathinfo($post_img);	
			$pathname = $pathinfo['dirname'];
			$filename = $pathinfo['basename']; ?>

		<div class="jl_single_style1">
      <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
        <span class="jl_f_cat jl_lb2">
          <h1 class="single_post_title_main"> 
            <i class="fa fa-history" aria-hidden="true"></i> This Day in History:   
            <b style="color: #e2b22b"><?php echo $newDate1; ?></b>
          </h1>
        </span>

        <!-- <div class="jl_mt_wrap">
          <span class="jl_post_meta_s">
          <span class="jl_meta_t jl_meta_txt">
          <span class="post-read-time">1  Mins read</span>
          <span class="jl_view_options">2.3k Views</span>
          </span>
          </span>
        </div> -->
      </div>
      <div class="single_content_header jl_single_feature_below">
        <div class="image-post-thumb jlsingle-title-above">
         	<?php if($post_img){ ?>
         		 <img width="1000" height="650" src="https://day2dayhistory.com/images/upload/<?php echo $filename; ?>" class="attachment-shareblock_featurelarge size-shareblock_featurelargejl-lazyload wp-post-image lazyloaded" alt="">
         	<?php }
         	else{ } ?>
         </div>
      </div>
    </div>
    <div class="post_content_w jl_sh_link">
           
      <div class="post_contents jl_content">
               <h3><?php echo $post_title; ?></h3>
               <p><?php echo $post_content;?></p>               
      </div>
    </div>
  <?php	}
}


}

?> 