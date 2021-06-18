<?php

/*
Plugin name: Service Widget
Description: Service tag information for Web Designer.
Plugin Author: Jerome Ssenyonga
Plugin URI: https://jarvtechnologies.com
Author URI: https://jarvtechnologies.com
text-domain: on-service-widget
*/

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function wporg_add_dashboard_widgets() {
    // Remove Welcome panel
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    // Remove the rest of the dashboard widgets
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal');
    
    // Add function here
    wp_add_dashboard_widget( 'jerome-on-service-widget', 'Web Developer Service Tag', 'jerome_on_service_widget');
}
add_action( 'wp_dashboard_setup', 'wporg_add_dashboard_widgets' );

function jerome_on_service_widget(){
    ?>
    <div style="display:grid;justify-content:space-between;grid-template-columns:repeat(auto-fit,minmax(48%,1fr));grid-template-rows:1fr;grid-gap:20px;">
        <div>
            <img src="data:image/webp;base64,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" style="border:1px solid #ccc;padding:2px;">
        </div>
        <div>
            <h2>Jerome Ssenyonga</h2>
            Your web Developer, <strong>Jerome Ssenyonga</strong>, is committed to your success! If you need anything at all, drop jerome a line!
            <ul>
                <li>(256) 703-607 297</li>
                <li><a href="#">jeromesenyonga4@gmail.com</a></li>
            </ul>
        </div>
    </div>

    <?php
}