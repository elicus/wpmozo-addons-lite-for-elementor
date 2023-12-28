<?php 
use \Elementor\Icons_Manager;
if( '' !== $header_graphics ) {
    if( $header_graphics === 'icon' && ! empty( $settings[ 'header_icon' ][ 'value' ] ) ) {
        $header_icon     = '';
    }
    if( $header_graphics === 'image' && ! empty( $settings[ 'header_image' ][ 'url' ] ) ) {
        $size = $settings['header_image_size_size'];
        
        $image_sizing = 'attachment-'. $size . ' size-'.$size;
        $image = $settings[ 'header_image' ];  
        $attach_id = $image[ 'id' ];        
        $img_url = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $attach_id,'header_image_size', $settings );
        
        if( '' !== $settings[ 'header_image_hover_animation' ] ) {
            $this->add_render_attribute( 'image', 'class', 'elementor-animation-' . $settings[ 'header_image_hover_animation'] );
        }
        $this->add_render_attribute('image',
            array(
                'src' => $img_url, 
                'class' => [ 'wpmozo_ae_header_image',$image_sizing ], 
                'title' => \Elementor\Control_Media::get_image_title( $image ), 
                'alt' => \Elementor\Control_Media::get_image_alt( $image ),
            )
        );
        $header_image = '<img ' . $this->get_render_attribute_string( 'image') .'/>';
    }
}

if( isset( $header_icon ) ) {
    ?>
        <div class="wpmozo_ae_pricing_table_header_graphic">
            <div <?php echo  $this->get_render_attribute_string( 'header_graphics_div' ); ?> > 
                <?php echo  $icon ; ?>
            </div>
        </div>
    <?php
} else if( isset( $header_image ) ) {
    ?>
        <div class="wpmozo_ae_pricing_table_header_graphic">
            <div <?php echo $this->get_render_attribute_string( "header_graphics_div" ); ?> > 
               <?php echo $header_image; ?>
            </div>
        </div>
    <?php
}

if( '' !== $table_title ) {
    $this->add_render_attribute( 'wpmozo_ae_pricing_table_heading', 'class', 'wpmozo_ae_pricing_table_heading' );
    ?>
        <div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_pricing_table_heading' ); ?> >
            <<?php echo $title_heading_level; ?> <?php echo $this->get_render_attribute_string( 'table_title_text' );?> >
                <?php echo $table_title; ?>
            </<?php echo $title_heading_level; ?>>
            <?php
                if( '' !== $table_subtitle ) {
                    ?>
                        <span <?php echo $this->get_render_attribute_string( 'table_subtitle_text' ); ?> >
                            <?php echo $table_subtitle ; ?>
                        </span>
                        <span class="wpmozo_ae_bar_container">
                            <hr class="wpmozo_ae_bar" />
                        </span>
                    <?php
                }
            ?>
        </div>
    <?php
}

if( '' !== $symbol ) {
 
    $symbol = '<span class="wpmozo_ae_pricing_table_currency_symbol"> ' .$symbol. ' </span>';
}

if( '' !== $table_price ) {
    
    $table_price = '
        <span ' .  $this->get_render_attribute_string( 'table_price' ) .' >
            ' .  $table_price . '
        </span>
    ';
}

if( '' !== $pricing_period ) { 
   
    $pricing_period  = '
        <span class="wpmozo_ae_period_slash"> 
            /
        </span>
        <span ' . $this->get_render_attribute_string( 'pricing_period' ) . ' >
            ' . $pricing_period . '
        </span>
    ';
 }    
            
if( '' !== $symbol || '' !== $table_price || '' !== $pricing_period ) {
    ?>
        <div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_pricing_table_pricing' ); ?> >
            <?php echo ('before' === $currency_position ? $symbol : $table_price ); ?>
            <?php echo ('before' === $currency_position ? $table_price : $symbol ); ?>
            <?php echo $pricing_period; ?>   
        </div>
    <?php
}

if( '' !== $features_list ) {
    ?>
    <dl class="wpmozo_ae_pricing_table_features">
        <?php
        foreach ( $features_list as $index => $item ) {
            $tab_count = $index + 1;
            if( '' !== $item[ 'list_icon' ][ 'value' ] ) {
                $list_icon = Icons_Manager::try_get_icon_html( $item[ 'list_icon' ], [ 'aria-hidden' => 'true','class'=>'wpmozo_ae_pricing_table_feature_icon' ], 'i' );
            }           
    
            $pricing_table_features_setting_key = $this->get_repeater_setting_key( 'list_feature', 'features_list', $index );
    
            $this->add_render_attribute( $pricing_table_features_setting_key, 'class', 'wpmozo_ae_pricing_table_feature_text' );
            $this->add_inline_editing_attributes( $pricing_table_features_setting_key, 'none' );            
            ?>
            <dt class="wpmozo_ae_pricing_table_features_list elementor-repeater-item-<?php echo $item[ '_id' ]; ?>">
                <?php echo ('' !== $list_icon ? $list_icon : ''); ?>
                <span <?php echo $this->get_render_attribute_string( $pricing_table_features_setting_key); ?>>
                    <?php echo $item[ 'list_feature' ]; ?>
                </span>
            </dt>
                <hr class="wpmozo_ae_divider" />
            <?php
        }
        ?>
    </dl>
    <?php    
}

//Pricing table image button            
if( $button_text && 'after' === $settings[ 'button_icon_position' ] ) {
    ?>
        <div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_button_wrapper' ); ?> >
            <div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_pricing_table_button_wrapper_inner' ); ?> >
                <a <?php echo $this->get_render_attribute_string( 'button_text' ); ?> >
                    <?php echo $button_text; ?>
                </a><?php echo ('' !== $button_icon ? ( '&nbsp;'.$button_icon ) : ''); ?>
            </div>
        </div>
    <?php
} else if( $button_text && 'before' === $settings[ 'button_icon_position' ] ) {
    ?>
        <div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_button_wrapper' ); ?> >
            <div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_pricing_table_button_wrapper_inner' ); ?> >
              <?php echo ('' !== $button_icon ? ( $button_icon.'&nbsp;' ) : ''); ?>
              <a <?php echo $this->get_render_attribute_string( 'button_text' ); ?> >
                   <?php echo $button_text; ?> 
                </a> 
            </div>
        </div>
    <?php
} else if( $button_text ) {
    ?>
        <div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_button_wrapper' ); ?>>
            <div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_pricing_table_button_wrapper_inner' ); ?>>
              <?php echo ('' !== $button_icon ? ( $button_icon.'&nbsp;' ) : ''); ?>
              <a <?php echo $this->get_render_attribute_string( 'button_text' );?> >
                    <?php echo $button_text; ?>
                </a> 
            </div>
        </div>
    <?php
}