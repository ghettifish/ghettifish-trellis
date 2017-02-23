<div class="mcqueen-field mcqueen-field-colorpicker">
    <div class="mcqueen-field-header">
        <label for="<?php $this->field_id($uid); ?>"><?php echo esc_attr( $label ); ?></label>
    </div>
    <div class="mcqueen-field-content">
        <input type="text" id="<?php $this->field_id($uid); ?>" name="<?php $this->field_name($uid); ?>" value="<?php echo esc_attr( $value ); ?>" class="colorpicker">
    </div>
    <div class="mcqueen-field-note">
        <?php echo $note; ?>
    </div>
    <div class="clear"></div>
</div>