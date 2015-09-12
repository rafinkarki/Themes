<?php global $cuvey_options;
if(isset($cuvey_options['header_section']) && $cuvey_options['header_section']==1):
        $h_image=get_template_directory_uri().'/assets/images/background/bg-1.jpg';
        if(!empty($cuvey_options['header_image']['url'])){
            $h_image=$cuvey_options['header_image']['url'];
        }
        $style='style= "background:url('.esc_url($h_image).') no-repeat;"';?>
        <div id="sub-banner" <?php echo $style;?>>
          <div class="overlay">
            <div class="container">
                <?php get_template_part('partials/breadcrumb'); ?> 
            <?php if(isset($cuvey_options['search'])&& $cuvey_options['search']==1):
            $pageid=get_the_ID();
            $title_align=get_post_meta($pageid,'cuvey_title_align',true);

            if($title_align=='left'):
                $align='pull-right !important;';
            elseif($title_align=='right'):
                $align='pull-left !important;';
            else:
                $align='';
            endif;?>
                <div class="search <?php echo $align;?>">
                    <form role="form" action="#" method="get">
                      <div class="form-group">
                        <input type="search" class="form-control" name="s" placeholder="Type your keyword">
                      </div>
                    </form>
                </div>    
            <?php endif;?>     
              
            </div>
          </div>
        </div> 
<?php endif;?>