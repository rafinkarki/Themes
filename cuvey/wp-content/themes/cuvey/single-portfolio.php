<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php 
global $cuvey_options,$flag;
$s_color='section-white';
$color=$cuvey_options['template_color'];
if($color=='gray'):$s_color='section-gray';endif;
global $post;
$sidebar='';$content='';$h=$w='';$div_s='';$div_e='</div></div>';
$layout=$cuvey_options['single_portfolio'];
switch ($layout) {
    case 'left':
        $sidebar='pull-left';
        $content='pull-right';
        $flag=1;
        $w='750';
        $h='579';
        $div_s='<div class="pull-right col-md-8 col-sm-8 col-xs-12"><div id="content">';        
        break;
    case 'right':
        $sidebar='pull-right';
        $content='pull-left';
        $flag=1;
        $w='750';
        $h='579';
        $div_s='<div class="pull-left col-md-8 col-sm-8 col-xs-12"><div id="content">';
        break;
    case 'alternate':
        $w='653';
        $h='504';
        $div_s='<div class="col-md-12 col-sm-12 col-xs-12"><div id="content" class="row">';
        $flag=2;        
        break; 
    case 'fullwidth':
        $w='653';
        $h='504';
        $div_s='<div class="col-md-12 col-sm-12 col-xs-12"><div id="content" class="row">';
        $flag=3;        
        break;   
    default:       
        break;
    }

?>

<section class="<?php echo $s_color;?> clearfix">
    <div class="container">
        <div class="row">
          <?php if($flag==1):?>
             <div class="<?php echo esc_attr($sidebar);?> col-md-4 col-sm-4 col-xs-12">  
                 <div id="sidebar" class="clearfix">
                     <?php if ( is_active_sidebar( 'cuvey-widgets-sidebar' ) ) { ?>
                         <?php dynamic_sidebar( 'cuvey-widgets-sidebar' );  ?>
                     <?php } ?> 
                 </div>
             </div>
          <?php endif;?>
          <?php echo $div_s;?>

            <?php if($flag==2) echo'<div class="col-md-7 col-sm-7 col-xs-12">';
              if($flag==3) echo'<div class="col-md-12 col-sm-12 col-xs-12">';?>
              <?php cuvey_related_media($h,$w);?>
            <?php if($flag==2 || $flag==3) echo'</div>';?>

            <?php if($flag==2) echo'<div class="col-md-5 col-sm-5 col-xs-12">';
              if($flag==3) echo'<div class="col-md-12 col-sm-12 col-xs-12">';?>
              <?php cuvey_related_meta();?>
            <?php if($flag==2 || $flag==3) echo'</div>';?>

            <?php if($flag==2 || $flag==3) echo'<div class="col-md-12 col-sm-12 col-xs-12">';?>
              <div class="next-prev text-center clearfix">
                <nav>
                    <ul class="pager">
                       <li class="pull-left"><?php previous_post_link('%link','<i class="fa fa-angle-left"></i>');?></li>              

                       <li class="pull-right"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>');?></li>

                    </ul>
                </nav>
              </div><!-- end next prev -->
            <?php if($flag==2 || $flag==3) echo'</div>';?> 

          <?php echo $div_e;?>
        </div>
    </div>
</section>
<?php if(isset($cuvey_options['portfolio_related']) && $cuvey_options['portfolio_related']==1):?>
   <?php get_template_part('partials/portfolio-related');?>
<?php endif;?>
<?php get_footer(); ?>