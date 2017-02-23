<div class="mcqueen-field mcqueen-field-checkbox">
    <div class="mcqueen-field-header">
        <label for="<?php $this->field_id($uid); ?>"><?php echo esc_attr( $label ); ?></label>
    </div>
    <div class="mcqueen-field-content">
        <input type="hidden" name="<?php $this->field_name($uid); ?>" value="0">
        <input type="checkbox" id="<?php $this->field_id($uid); ?>" name="<?php $this->field_name($uid); ?>" <?php echo ($value==1) ? 'checked="checked"' : ''; ?> value="1">
    </div>
    <div class="mcqueen-field-note">
        <label for="<?php $this->field_id($uid); ?>"><?php echo $note; ?></label>
    </div>
    <div class="clear"></div>
</div>