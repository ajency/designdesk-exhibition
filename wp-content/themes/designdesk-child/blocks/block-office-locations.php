<div class="office-location">
    <p class="body-semi-600 location-name"><?php block_field('location-name'); ?></p>
    <hr class="separator-horizontal-orange">
    <ul>
        <li>
            <img src="<?php echo site_url() . "/wp-content/themes/designdesk-child/assets/images/location-icon.svg"; ?>" alt="address">
            <div class="body-reg-400 address"><?php block_field('address'); ?></div>
        </li>
        <li>
            <img src="<?php echo site_url() . "/wp-content/themes/designdesk-child/assets/images/call-icon.svg"; ?>" alt="call">
            <div class="body-reg-400 phone"><?php block_field('phone-no'); ?></div>
        </li>
    </ul>
</div>