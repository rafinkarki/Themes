 <div id="accordion-first" class="clearfix">
    <?php $id=rand();?>
    <div class="accordion" id="accordion<?php echo $id;?>">
        <?php foreach( $instance['accordions'] as $i => $accordion ) : $random=rand();?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $id;?>" href="#collapse<?php echo $random;?>">
                        <em class="fa fa-<?php if( $accordion['active'] ): echo 'minus'; else: echo 'plus'; endif;?> icon-fixed-width <?php echo ($instance['b_radius']?'border-radius':'');?>"></em><?php echo esc_attr( $accordion['title'] ); ?>
                    </a>                        
                </div>
                <div id="collapse<?php echo $random;?>" class="accordion-body collapse <?php if( $accordion['active'] ) echo 'in';?>">
                    <div class="accordion-inner">
                        <p><?php echo nl2br(wp_kses_post( $accordion['text'] )); ?> </p>
                    </div>
                </div>  
            </div>                    
        <?php endforeach; ?>        
    </div><!-- end accordion -->
</div><!-- end accordion first -->
