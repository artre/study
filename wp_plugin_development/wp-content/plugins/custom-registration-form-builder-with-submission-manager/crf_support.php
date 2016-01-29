<?php
/*Controls custom field creation in the dashboard area*/
global $wpdb;
$textdomain = 'custom-registration-form-builder-with-submission-manager';
$crf_forms =$wpdb->prefix."crf_forms";
$path =  plugin_dir_url(__FILE__); 
?>
<div id="support-feature">
<div class="support-top">
    <div class="hedding-boder">
    <h1 class="support-hedding-icon"><?php _e('Support, Feature Requests and Feedback',$textdomain);?></h1>
    </div>
</div>
<div class="support-available">
  <h3><?php _e('Support is available through our forums. Here are the relevant links:',$textdomain);?></h3>
  <div class="link">
  <ul>
  <li><a href="http://registrationmagic.com/forums/forum/general-support/" target="_blank"><?php _e('GENERAL QUESTIONS',$textdomain);?></a></li>
<li><a href="http://registrationmagic.com/forums/forum/installation-issues/" target="_blank"><?php _e('INSTALLATION ISSUES',$textdomain);?></a></li>
<li><a href="http://registrationmagic.com/forums/forum/feature-requests/" target="_blank"><?php _e('FEATURE REQUESTS',$textdomain);?></a></li>
<li><a href="http://registrationmagic.com/forums/forum/bug-reporting/" target="_blank"><?php _e('BUG REPORTS',$textdomain);?></a></li>
  </ul>
  </div>
  
</div>
</div>