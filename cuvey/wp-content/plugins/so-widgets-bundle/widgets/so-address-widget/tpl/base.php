<?php $layout=$instance['layout'];?>
<?php if($layout=='horizontal'):?>
    <?php if(!empty($instance['address']['address'])):?>
    <div class="col-md-4 col-sm-4 col-xs-12 square-service">
        <div class="widget">
        <span class="icon-container border-radius color-gray wow <?php echo esc_attr($instance['animation']);?>" style="background:<?php echo $instance['address']['container_color'];?> !important;">
        <?php $icon_styles = array();
        if(!empty($instance['address']['color'])) $icon_styles[] = 'color: '.$instance['address']['color'];
        echo siteorigin_widget_get_icon($instance['address']['icon'], $icon_styles);?>
        </span>
        <?php if(!empty($instance['address']['title'])):?>
            <h3><?php echo esc_attr($instance['address']['title']);?></h3>
        <?php endif;?>
        <p><?php echo nl2br(esc_attr($instance['address']['address']));?></p>
        </div>
    </div><!-- end col -->
    <?php endif;?><?php if(!empty($instance['phone']['telephone'])):?>
    <div class="col-md-4 col-sm-4 col-xs-12 square-service">
        <div class="widget">
        <span class="icon-container border-radius color-gray wow <?php echo esc_attr($instance['animation']);?>" style="background:<?php echo $instance['phone']['container_color'];?> !important;">
        <?php $icon_styles = array();
        if(!empty($instance['phone']['color'])) $icon_styles[] = 'color: '.$instance['phone']['color'];
        echo siteorigin_widget_get_icon($instance['phone']['icon'], $icon_styles);?>
        </span>
        <?php if(!empty($instance['phone']['title'])):?>
            <h3><?php echo esc_attr($instance['phone']['title']);?></h3>
        <?php endif;?>
        <p><?php echo nl2br(esc_attr($instance['phone']['telephone']));?></p>
        </div>
    </div><!-- end col -->
    <?php endif;?><?php if(!empty($instance['email']['email'])):?>
    <div class="col-md-4 col-sm-4 col-xs-12 square-service">
        <div class="widget">
        <span class="icon-container border-radius color-gray wow <?php echo esc_attr($instance['animation']);?>" style="background:<?php echo $instance['email']['container_color'];?> !important;">
        <?php $icon_styles = array();
        if(!empty($instance['email']['color'])) $icon_styles[] = 'color: '.$instance['email']['color'];
        echo siteorigin_widget_get_icon($instance['email']['icon'], $icon_styles);?>
        </span>
        <?php if(!empty($instance['email']['title'])):?>
            <h3><?php echo esc_attr($instance['email']['title']);?></h3>
        <?php endif;?>
        <p><?php echo nl2br(esc_attr($instance['email']['email']));?></p>
        </div>
    </div><!-- end col -->
    <?php endif;?>

<?php else:?>
    <div class="services_vertical horizontal_contact">
        <?php if(!empty($instance['address']['address'])):?>
            <div class="service_vertical_box">
                <div class="wow <?php echo esc_attr($instance['animation']);?> service-icon color-blue border-radius" style="background:<?php echo $instance['address']['container_color'];?> !important;">
                    <?php $icon_styles = array();
                    if(!empty($instance['address']['color'])) $icon_styles[] = 'color: '.$instance['address']['color'];
                    echo siteorigin_widget_get_icon($instance['address']['icon'], $icon_styles);?>
                </div>
                <?php if(!empty($instance['address']['title'])):?>
                    <h3><?php echo esc_attr($instance['address']['title']);?></h3>
                <?php endif;?>
                <p><?php echo nl2br(esc_attr($instance['address']['address']));?></p>
            </div><!-- end service_vertical_box -->
        <?php endif;?>

        <?php if(!empty($instance['phone']['telephone'])):?>
            <div class="service_vertical_box">
                <div class="wow <?php echo esc_attr($instance['animation']);?> service-icon color-blue border-radius" style="background:<?php echo $instance['phone']['container_color'];?> !important;">
                    <?php $icon_styles = array();
                    if(!empty($instance['phone']['color'])) $icon_styles[] = 'color: '.$instance['phone']['color'];
                    echo siteorigin_widget_get_icon($instance['phone']['icon'], $icon_styles);?>
                </div>
                <?php if(!empty($instance['phone']['title'])):?>
                    <h3><?php echo esc_attr($instance['phone']['title']);?></h3>
                <?php endif;?>
                <p><?php echo nl2br(esc_attr($instance['phone']['telephone']));?></p>
            </div><!-- end service_vertical_box -->
        <?php endif;?>

        <?php if(!empty($instance['email']['email'])):?>
            <div class="service_vertical_box">
                <div class="wow <?php echo esc_attr($instance['animation']);?> service-icon color-blue border-radius" style="background:<?php echo $instance['email']['container_color'];?> !important;">
                    <?php $icon_styles = array();
                    if(!empty($instance['email']['color'])) $icon_styles[] = 'color: '.$instance['email']['color'];
                    echo siteorigin_widget_get_icon($instance['email']['icon'], $icon_styles);?>
                </div>
                <?php if(!empty($instance['email']['title'])):?>
                    <h3><?php echo esc_attr($instance['email']['title']);?></h3>
                <?php endif;?>
                <p><?php echo nl2br(esc_attr($instance['email']['email']));?></p>
            </div><!-- end service_vertical_box -->
        <?php endif;?>
    </div><!-- end services -->
<?php endif;?>