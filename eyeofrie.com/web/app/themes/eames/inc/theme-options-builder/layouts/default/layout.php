<div class="wrap">
    <?php screen_icon(); ?>
    <h2><?php _e('Theme Options', 'eames'); ?></h2>
    <?php settings_errors(); ?>
    <form method="post" action="options.php">
        <?php
        $settings = $this->get_theme_options();
        //Theme_Options_Builder::debug($settings);
        settings_fields( $this->get_config('option_group') );
        ?>
        <div class="mcqueen-options-box">
            <div class="header">
                <h3 class="title"><?php echo TEMPLATE_NAME; ?> <?php echo TEMPLATE_VERSION; ?></h3>
            </div>
            <div class="body">
                <div class="sidebar">
                    <ul class="nav" id="mcqueen-nav">
                        <?php foreach($this->groups as $group_key=>$group_name) : ?>
                        <li <?php echo ($group_key=='general') ? 'class="current"' : ''; ?>><a href="#hollis-optgroup-<?php echo $group_key; ?>"><?php echo $group_name; ?></a></li>
                         <?php endforeach; ?>
                    </ul>
                </div>
                <div class="content">
                    <?php foreach($this->groups as $group_key=>$group_name) : ?>
                        <div class="mcqueen-group" id="hollis-optgroup-<?php echo $group_key; ?>-t">
                            <?php $this->loop_fields($group_key); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="footer">
                <?php submit_button(__('Save Options', 'eames'), 'primary', 'submit', false) ?>
                <?php submit_button(__('Restore Defaults', 'eames'), 'secondary', 'reset', false) ?>
                <div class="clear"></div>
            </div>
        </div>
    </form>
</div>
