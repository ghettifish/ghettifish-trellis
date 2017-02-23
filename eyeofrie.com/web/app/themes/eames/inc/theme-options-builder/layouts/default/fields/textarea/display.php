<div class="mcqueen-field mcqueen-field-textarea">
    <div class="mcqueen-field-header">
        <label for="<?php $this->field_id($uid); ?>"><?php echo esc_attr( $label ); ?></label>
    </div>
    <div class="mcqueen-field-content">
        <textarea id="<?php $this->field_id($uid); ?>" name="<?php $this->field_name($uid); ?>"><?php echo esc_textarea( $value ); ?></textarea>
    </div>
    <div class="mcqueen-field-note">
        <?php echo $note; ?>
    </div>
    <div class="clear"></div>
</div>