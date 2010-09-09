<?php echo sprintf(__('Hi, %s', true), $data['User']['username']); ?></p>

<p><?php echo sprintf(__('Thanks for registering with us at %s.  We look forward to seeing you around the site.', true), $appConfigurations['name']); ?></p>

<p><?php echo __('To complete your registration, you will need to comfirm that you received this email by clicking the link below:', true); ?></p>

<p>
    <a href="<?php echo $data['User']['activate_link']; ?>" title="<?php echo __('Activate', true); ?>" />
        <?php echo $data['User']['activate_link']; ?>
    </a>
</p>

<p><?php echo printf(__('If clicking the link does not work, just copy and paste the entire link into your browser.  If you are still having problems, try logging in at %s with your username and password or simply forward this email to %s and we will do our best to help you.', true), $appConfigurations['url'], $appConfigurations['support']); ?></p>


<p><?php echo sprintf(__('Welcome to %s', true), $appConfigurations['name']); ?></p>

