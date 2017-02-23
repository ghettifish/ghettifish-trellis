<div class="mcqueen-field mcqueen-field-upload">
    <div class="mcqueen-field-header">
        <label for="<?php $this->field_id($uid); ?>"><?php echo esc_attr( $label ); ?></label>
    </div>
    <div class="mcqueen-field-content">
        <input type="text" id="<?php $this->field_id($uid); ?>" name="<?php $this->field_name($uid); ?>" value="<?php echo esc_attr( $value ); ?>">
        <input class="button tob-media-manager-show" type="button" value="Upload" />
        
        <?php if($value) : ?>
        <div class="thumb-preview">
            <img src="<?php echo esc_url($value); ?>" alt="thumb">
            <span class="thumb-delete"></span>
        </div>
        <?php endif; ?>
    </div>
    <div class="mcqueen-field-note">
        <?php echo $note; ?>
    </div>
    <div class="clear"></div>
</div>