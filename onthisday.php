<?php require_once "history_management.php";


$key=""; if(isset($_REQUEST['key'])){ $key = $_REQUEST['key']; }
 
  
   $history = new history_details($htr_date, $htr_month);
if($key=='dateMonth')
{
//echo"test"; 
  $dated=""; if(isset($_REQUEST['dated'])){ $dated = $_REQUEST['dated']; }
  $historyValue= explode(' ',$dated);
  // echo $historyValue[1];
   $htr_date= $historyValue[0]; 
   $htr_month=$historyValue[1];
 //echo $htr_month;
    $history1 = new history_details($htr_date, $htr_month);
   echo $history1->day_history();
// echo "data";

   exit;
}
?>


<?php include 'header.php';?>    
<!-- end header -->
 
<section id="content_main" class="clearfix jl_spost">

   <div class="container">
      <div class="row main_content single_pl">
         <div class="col-md-8  loop-large-post" id="content">
            <div class="widget_container content_page">
               <!-- start post -->
               <div class="post-2959 post type-post status-publish format-standard has-post-thumbnail hentry category-sports tag-gaming tag-morning tag-tip tag-tutorial" id="post-2959">
                  <div class="single_section_content box blog_large_post_style" >
                    <div class="calendr_date" style="position: absolute;top:0; float: right;right: 0; ">
                        <input type="hidden" name='datepicker' class="form-control" id="datepicker" >
                        <button class="cal-btn" id="cal_btn" style="background: #00ffff00;">  <input type="hidden" name='datepicker' class="form-control" id="datepicker" >  <i class="fa-solid fa-calendar" style="color: #e2b22b; font-size: 34px;"></i></button>
                    </div>
                    

                     <span id="response_id">
                         <?php $history->day_history(); ?>
                     </span>
                    
                     
                     <div class="clearfix"></div>
                    
                     
             
                     <div class="jl_relsec">
                        <div class="related-posts">
                           <h4>More Events On This Day</h4>
                           <div class="single_related_post">
                              <div
                                 class="box jl_grid_layout1 blog_grid_post_style post-2961 post type-post status-publish format-gallery has-post-thumbnail hentry category-sports tag-morning tag-relaxing tag-shooting tag-tip tag-tutorial post_format-post-format-gallery">
                                 <div class="jl_grid_w jl_has_img">
                                    <div class="jl_img_box jl_radus_e">
                                       <a
                                          href="../5-holiday-outfit-ideas-for-thanksgiving-or-christmas/index.html">
                                       <img width="500" height="350"
                                          src="../wp-content/uploads/sites/10/2021/05/pexels-jill-burrow-6773220-20x14.jpg"
                                          class="attachment-shareblock_slidergrid size-shareblock_slidergridjl-lazyload lazyload wp-post-image"
                                          alt="" loading="lazy"
                                          data-src="https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/pexels-jill-burrow-6773220-500x350.jpg"
                                          data-srcset="https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/pexels-jill-burrow-6773220-500x350.jpg 500w, https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/pexels-jill-burrow-6773220-20x15.jpg 20w" />
                                       </a>
                                    </div>
                                    <div class="text-box">
                                       <h3><a
                                          href="../5-holiday-outfit-ideas-for-thanksgiving-or-christmas/index.html">5
                                          Holiday Outfit Ideas for Thanksgiving or Christmas</a>
                                       </h3>
                                       <span class="jl_post_meta"><span class="jl_author_img_w"><a
                                          href="../author/dsite/index.html"
                                          title="Posts by Anna Nikova" rel="author">Anna
                                       Nikova</a></span><span class="post-date">July 24,
                                       2019</span></span>
                                    </div>
                                 </div>
                              </div>
                              <div
                                 class="box jl_grid_layout1 blog_grid_post_style post-2943 post type-post status-publish format-video has-post-thumbnail hentry category-sports tag-gaming tag-morning post_format-post-format-video">
                                 <div class="jl_grid_w jl_has_img">
                                    <div class="jl_img_box jl_radus_e">
                                       <span class="jl_post_type_icon jl_vid_link"><a
                                          href="https://www.youtube.com/watch?v=FAHlCzP-prU"
                                          class="jl_pop_vid"><i class="jli-play"></i></a></span> <a
                                          href="../it-really-great-holiday-and-enjoy-with-the-fashion-style/index.html">
                                       <img width="500" height="350"
                                          src="../wp-content/uploads/sites/10/2021/05/alex-conradt-bG3eNPbMiP4-unsplash-20x14.jpg"
                                          class="attachment-shareblock_slidergrid size-shareblock_slidergridjl-lazyload lazyload wp-post-image"
                                          alt="" loading="lazy"
                                          data-src="https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/alex-conradt-bG3eNPbMiP4-unsplash-500x350.jpg"
                                          data-srcset="https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/alex-conradt-bG3eNPbMiP4-unsplash-500x350.jpg 500w, https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/alex-conradt-bG3eNPbMiP4-unsplash-20x15.jpg 20w" />
                                       </a>
                                    </div>
                                    <div class="text-box">
                                       <h3><a
                                          href="../it-really-great-holiday-and-enjoy-with-the-fashion-style/index.html">It
                                          Really Great Holiday and Enjoy with the Fashion Style</a>
                                       </h3>
                                       <span class="jl_post_meta"><span class="jl_author_img_w"><a
                                          href="../author/dsite/index.html"
                                          title="Posts by Anna Nikova" rel="author">Anna
                                       Nikova</a></span><span class="post-date">July 24,
                                       2019</span></span>
                                    </div>
                                 </div>
                              </div>
                              <div
                                 class="box jl_grid_layout1 blog_grid_post_style post-2851 post type-post status-publish format-standard has-post-thumbnail hentry category-sports tag-gaming tag-morning tag-tip tag-tutorial">
                                 <div class="jl_grid_w jl_has_img">
                                    <div class="jl_img_box jl_radus_e">
                                       <a
                                          href="../sometime-hiding-face-is-great-way-make-you-unique/index.html">
                                       <img width="500" height="350"
                                          src="../wp-content/uploads/sites/10/2021/05/pexels-dimitry-zub-6829524-20x14.jpg"
                                          class="attachment-shareblock_slidergrid size-shareblock_slidergridjl-lazyload lazyload wp-post-image"
                                          alt="" loading="lazy"
                                          data-src="https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/pexels-dimitry-zub-6829524-500x350.jpg"
                                          data-srcset="https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/pexels-dimitry-zub-6829524-500x350.jpg 500w, https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/pexels-dimitry-zub-6829524-20x15.jpg 20w" />
                                       </a>
                                    </div>
                                    <div class="text-box">
                                       <h3><a
                                          href="../sometime-hiding-face-is-great-way-make-you-unique/index.html">Hiding
                                          face is great way make you unique</a>
                                       </h3>
                                       <span class="jl_post_meta"><span class="jl_author_img_w"><a
                                          href="../author/dsite/index.html"
                                          title="Posts by Anna Nikova" rel="author">Anna
                                       Nikova</a></span><span class="post-date">July 24,
                                       2019</span></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
               <!-- end post -->
               <div class="brack_space"></div>
            </div>
         </div>
         <div class="col-md-4" id="sidebar">
            <div class="jl_sidebar_w">
          
               <div id="shareblock_category_image_widget_register-1" class="widget jellywp_cat_image">
                  <div class="widget-title">
                     <h2 class="jl_title_c" style="font-size: 25px;"><i class="fa fa-birthday-cake" aria-hidden="true"></i> Birthday</h2>
                  </div>
                  <div class="wrapper_category_image jl_clear_at column1 style1">
                     <div class="category_image_wrapper_main">
                        <div class="jl_cat_img_w" >
                           <div class="jl_cat_img_c" id="lmcircle_1">
                            
                             
                              <span class="jl_cm_overlay">
                                  <span class="jl_cm_name">New Year Inspo – What I’m loving so far in 2019!</span>
                                  <span class="jl_cm_count" style="background-color: #92d822;"><?php echo date(  'Y'); ?></span>
                             </span>
                           </div>
                        </div>
                         <div class="jl_cat_img_w">
                           <div class="jl_cat_img_c" id="lmcircle_2">
                            
                              <span class="jl_cm_overlay">
                                  <span class="jl_cm_name">New Year Inspo – What I’m loving so far in 2019!</span>
                                  <span class="jl_cm_count" style="background-color: #92d822;"><?php echo date(  'Y'); ?></span>
                             </span>
                           </div>
                        </div>
                         <div class="jl_cat_img_w">
                           <div class="jl_cat_img_c" id="lmcircle_7">
                             
                              <span class="jl_cm_overlay">
                                  <span class="jl_cm_name">New Year Inspo – What I’m loving so far in 2019!</span>
                                  <span class="jl_cm_count" style="background-color: #92d822;"><?php echo date(  'Y'); ?></span>
                             </span>
                           </div>
                        </div>
                     
                      
                     </div>
                  </div>
               </div>
               <div id="shareblock_recent_post_text_widget-1" class="widget post_list_widget">
                  <div class="widget_jl_wrapper">
                     <div class="ettitle">
                        <div class="widget-title">
                           <h2 class="jl_title_c" style="font-size: 25px;" ><i class="fa fa-spinner" aria-hidden="true"></i> Today Stories</h2>
                        </div>
                     </div>
                     <div class="bt_post_widget">
                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                           <div class="jl_m_right_w">
                              <div class="jl_m_right_img jl_radus_e">
                                <a href="#">
                                   <img width="120" height="120" src="https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/noah-buscher-8A7fD6Y5VF8-unsplash-500x350.jpg"
                                 class="attachment-shareblock_small size-shareblock_smalljl-lazyload lazyload wp-post-image" alt="" loading="lazy"
                                 /></a>
                              </div>
                              <div class="jl_m_right_content">
                                 <h2 class="entry-title"> 
                                    <a href="#" tabindex="-1">New Year Inspo – What I’m loving so far in 2019!</a>
                                 </h2>
                                 <span class="jl_post_meta">
                                    <span class="jl_author_img_w">
                                        <a href="#" rel="author">Anna Nikova</a>
                                    </span>
                                    <span class="post-date">July 26, 2014</span>
                                </span>
                              </div>
                           </div>
                        </div>
                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                           <div class="jl_m_right_w">
                              <div class="jl_m_right_img jl_radus_e">
                                  <a href="#">
                                    <img width="120"
                                   height="120" src="https://jellywp.com/wp/shareblock02/wp-content/uploads/sites/10/2021/05/noah-buscher-8A7fD6Y5VF8-unsplash-500x350.jpg"
                                   class="attachment-shareblock_small size-shareblock_smalljl-lazyload lazyload wp-post-image" alt="" loading="lazy" />
                                 </a>
                              </div>
                              <div class="jl_m_right_content">
                                 <h2 class="entry-title"> <a
                                    href="#"
                                    tabindex="-1">Good Day To Take A Photo With Your Favorite Style</a>
                                 </h2>
                                 <span class="jl_post_meta"><span class="jl_author_img_w"><a
                                    href="#"
                                    rel="author">Anna Nikova</a></span><span class="post-date">July
                                 26, 2014</span></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end content -->
<?php include 'footer.php';?>
<script type="text/javascript">

  $( document ).ready(function() {
  //  console.log( "ready!" );

      //$("#datepicker").datepicker({dateFormat: "d M"});
      
      $('.fa-calendar').click(function() {
            $("#datepicker").focus();
      });

      $("#datepicker").datepicker({
          dateFormat: "d mm",
          onSelect: function(dateText) {
             // console.log("Selected date: " + dateText + "; input's current value: " + this.value);
              $(this).change();
          }
      })
      .on("change", function() {
            var dated = this.value;
            //console.log(dated);
            $.ajax({
                url: 'onthisday.php',
                type: 'post',
                data: {key:'dateMonth',dated:dated},
                success: function(response){
                 
                   
                  $('#response_id').html(response);
                    //alert(response);
                     $("#datepicker").datepicker();
                }
                //console.log("Got change event from field");
            });
      });

     /* $('#cal_btn').click(function(){
       
       var dateValue = document.getElementById("datepicker").value;
         alert(dateValue);

      });*/
  });
  


    var myArray = [
      "#36c0b3",
      "#c4d955",
      "#FFEB3B",
      "#FF5722",
      "#FF9800",
      "#cc0000",
      "#00cc00",
      "#0000cc"
    ];

    for(var i=1;i<=7;i++)
    {
        var randomItem = myArray[Math.floor(Math.random()*myArray.length)];
      //  document.getElementById("lmcircle_"+i).style.background = randomItem;    
    }

</script>    

