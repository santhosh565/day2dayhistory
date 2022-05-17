<?php //echo date(  'M : d'); ?>
 <?php //$cusobj->loadCssFiles(); ?>
 <?php require_once "user_defined.php"; 
   $cusobj = new user_defined();
?>
<?php include 'header.php';?>    
<div class="jl_home_bw">
  <div data-elementor-type="wp-page" data-elementor-id="4948" class="elementor elementor-4948" data-elementor-settings="[]">
    <div class="elementor-section-wrap">
      <section class="elementor-section elementor-top-section elementor-element elementor-element-7cca49a7 elementor-section-boxed elementor-section-height-default elementor-section-height-default">
        <div class="elementor-container elementor-column-gap-no">
          <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-50a968f">
            <div class="elementor-widget-wrap elementor-element-populated">
              <div class="elementor-element elementor-element-70ecafbe elementor-widget elementor-widget-shareblock-feature-right-list">
                <div class="elementor-widget-container">
                  <div id="blockid_70ecafbe" class="block-section jl-main-block">
                    <div class="jl_mb_wrap_f jl_clear_at">
                      <div class="jl-roww jl_contain jl-col-none jl-col-row">
                        <div class="jl_mright_wrapper jl_clear_at">
                          <div class="jl_mix_post jl_space">
                              <?php $cusobj->homeBanner(); ?>
                              <div class="jl_mgc jl_clear_at">
                                <?php $cusobj->homeBanner_1(); ?>      
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
        </div>
      </section>

      <section class="elementor-section elementor-top-section elementor-element elementor-element-66980a96 elementor-section-boxed elementor-section-height-default elementor-section-height-default" >
        <div class="elementor-container elementor-column-gap-no">
          <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7f648744">
            <div class="elementor-widget-wrap elementor-element-populated">
              <div class="elementor-element elementor-element-1dd45e37 elementor-widget elementor-widget-shareblock-grid-post">
                <div class="elementor-widget-container">

                  <div id="blockid_1dd45e37" class="jl_clear_at block-section jl-main-block">
                    <div class="jl_sec_title sec_style4 font_style2">
                      <h3 class="jl_title_c"><span>More History</span></h3>
                      <p></p>
                    </div>

                    <div class="jl_grid_wrap_f jl_wrap_eb jl_clear_at g_3col jl_mgrid">
                      <div class="jl-roww jl_contain jl-col3 jl-col-row">
                         
                          <?php $cusobj->homeBlog(); ?>     
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!-- end content -->
<script type="text/javascript">
  $(document).ready(function(){

    // Load more data
    $('.load-more').click(function(){
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        row = row + 15;

        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'getData.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){
                 
                // console.log(response);
                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                        $(".jl-grid-cols:last").after(response).show().fadeIn("slow");

                        var rowno = row + 15;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more').text("Hide");
                            $('.load-more').css("background","darkorchid");
                        }
                        else{
                            $(".load-more").text("Load more");
                        }

                    }, 500);


                }
            });
        }else{
            $('.load-more').text("Loading...");

            // Setting little delay while removing contents
            setTimeout(function() {

                // When row is greater than allcount then remove all class='post' element after 3 element
                $('.jl-grid-cols:nth-child(3)').nextAll('.jl-grid-cols').remove().fadeIn("slow");

                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more').text("Load more");
                $('.load-more').css("background","#15a9ce");

            }, 500);


        }

    });
  });

</script>
<?php include 'footer.php';?>    