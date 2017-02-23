<div class="mcqueen-field mcqueen-field-textbox-checkbox">
    <div class="mcqueen-field-header">
        <label for="<?php $this->field_id($uid); ?>_textbox"><?php echo esc_attr( $label ); ?></label>
    </div>
    <div class="mcqueen-field-content">
        <input type="text" id="<?php $this->field_id($uid); ?>_textbox" name="<?php $this->field_name($uid); ?>" value="<?php echo esc_attr( $value ); ?>">
        
        <label for="<?php $this->field_id($uid); ?>_checkbox"><input type="checkbox" id="<?php $this->field_id($uid); ?>_checkbox"> <em>Check to enable Full Version Link</em></label>
    </div>
    <div class="mcqueen-field-note">
        <?php echo $note; ?>
    </div>
    <div class="clear"></div>
</div>