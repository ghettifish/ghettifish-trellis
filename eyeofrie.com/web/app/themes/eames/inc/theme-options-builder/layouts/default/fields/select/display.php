<div class="mcqueen-field mcqueen-field-select">
    <div class="mcqueen-field-header">
        <label for="<?php $this->field_id($uid); ?>"><?php echo esc_attr( $label ); ?></label>
    </div>
    <div class="mcqueen-field-content">
        <select name="<?php $this->field_name($uid); ?>" id="<?php $this->field_id($uid); ?>">
            <?php foreach($options as $option_value=>$option): ?>
            <option <?php echo ($option_value==$value) ? 'selected="selected"' : ''; ?> value="<?php echo esc_attr( $option_value ); ?>"><?php echo esc_attr($option); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mcqueen-field-note">
        <?php echo $note; ?>
    </div>
    <div class="clear"></div>
</div>