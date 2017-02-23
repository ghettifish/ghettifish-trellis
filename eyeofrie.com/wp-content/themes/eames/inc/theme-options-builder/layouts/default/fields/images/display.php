<div class="mcqueen-field mcqueen-field-images">
    <div class="mcqueen-field-header">
        <label for="<?php $this->field_id($uid); ?>"><?php echo esc_attr( $label ); ?></label>
    </div>
    <div class="mcqueen-field-content">
        <input type="text" name="<?php $this->field_name($uid); ?>" value="<?php echo esc_attr( $value ); ?>">
        <input class="button tob-media-manager-show" type="button" value="Select" />
        
        <div class="mcqueen-images">
            <?php
                $value = explode(',',$value);
                foreach($value as $v):
                $img = wp_get_attachment_image_src($v, 'thumbnail')
            ?>
                <div class="thumb">
                    <img src="<?php echo $img[0]; ?>" alt="thumbnail">
                    <span data-id="<?php echo $v; ?>" class="thumb-delete"></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="mcqueen-field-note">
        <?php echo $note; ?>
    </div>
    <div class="clear"></div>
</div>