<?php
global $wpdb;
$textdomain = 'custom-registration-form-builder-with-submission-manager';
$crf_submissions =$wpdb->prefix."crf_submissions";
$crf_fields =$wpdb->prefix."crf_fields";
$crf_forms =$wpdb->prefix."crf_forms";
$crf_stats =$wpdb->prefix."crf_stats";
$path =  plugin_dir_url(__FILE__); 
?>
<style>
.media-container {
	min-height: 400px;
	border: none !important;
}
.about-wrap .feature-section.two-col .col {
	float: left;
}
</style>
<div class="wrap about-wrap">
  <h1>What's New</h1>
  <div class="about-text">Hello there! We’re back with a new release of RegistrationMagic. New features include payment system, front-end, notes, attachments and lot of other stuff. We hope you are enjoying the our plugin. Please keep providing us feedback so that we can add most requested features, fixes and improvements with upcoming versions. We already have a list for next release, which is in couple of weeks’ time. Cheers! </div>
  <div class="wp-badge" style="background: none !important;padding-top: 0px;box-shadow: none;"><img src="<?php echo $path; ?>images/whatsnew-icon.png"> </div>
  <hr>
  <div class="clear"></div>
  <div class="feature-section two-col">
    <div class="col">
      <div class="media-container"> <img src="<?php echo $path; ?>images/whatsnew/whatsnew5.jpg"> </div>
      <h3>Price Fields</h3>
      <p>Now you can create prices and add to your forms! Users can accept payments through PayPal and automatically activate user profiles based on payment status. Payment details are logged in individual submission pages.</p>
    </div>
    <div class="col">
      <div class="media-container"> <img src="<?php echo $path; ?>images/whatsnew/whatsnew2.jpg"> </div>
      <h3>Attachments Browser</h3>
      <p>We made it much easier to view and download attachments received with your forms! Now you can head over to Attachments tab and view all attachments in a form in a grid view. You will also be able to see previews for images. Not only that, you can download attachments with a few simple clicks.</p>
    </div>
    <div class="col">
      <div class="media-container"> <img src="<?php echo $path; ?>images/whatsnew/whatsnew4.jpg"> </div>
      <h3>Front End</h3>
      <p>We are introducing the front end (user facing side) of the plugin with this release! Now users can log in and check submissions on the site. This also includes their payment history and any notes added by the admin. More additions to this area are coming soon. </p>
    </div>
    <div class="col">
      <div class="media-container"> <img src="<?php echo $path; ?>images/whatsnew/whatsnew1.jpg"> </div>
      <h3>Add Notes (Silver Edition Only)</h3>
      <p>Now you can add and edit notes to each submission for your reference in the dashboard area. You can also show the notes to the user on front end and send them as emails. For different staff members note creator’s username and creation time is recorded, along with the ability to change note colors.</p>
    </div>
    <div class="col">
      <div class="media-container"> <img src="<?php echo $path; ?>images/whatsnew/whatsnew6.jpg"> </div>
      <h3>Profile Field Mapping</h3>
      <p>Finally you can add profile fields to your form! We have split field types into different categories for easier form creation and profile fields gets its own tab. Now all field values filled by user will get saved in their profiles in Users area of dashboard.</p>
    </div>
    <div class="col">
      <div class="media-container"> <img src="<?php echo $path; ?>images/whatsnew/whatsnew3.jpg"> </div>
      <h3>OTP Sign In</h3>
      <p>An innovative method to allow users who are not registered on your site to be able to log in and check their submissions using One Time Password (OTP). It comes in form of a widget and can be placed in any widget area of the site.</p>
    </div>
  </div>
  <div class="changelog">
    <h3>Other features include:</h3>
    <div class="feature-section under-the-hood three-col">
      <div class="col">
        <h4>Download Submissions as PDF (front end and dashboard).</h4>
      </div>
      <div class="col">
        <h4>Dashboard area widget for latest submissions.</h4>
      </div>
      <div class="col">
        <h4>Submissions are visible under user profiles now (Silver Edition Only).</h4>
      </div>
      <div class="col">
        <h4>Option to make file upload mandatory (Silver Edition Only).</h4>
      </div>
      <div class="col">
        <h4>Repeatable text field type (Silver Edition Only).</h4>
      </div>
      <div class="col">
        <h4>Added option to show submission token number to User (Silver Edition Only).</h4>
      </div>
      <div class="col">
        <h4>increase submissions per page to 20.</h4>
      </div>
    </div>
    <div class="return-to-dashboard"> <a href="admin.php?page=crf_manage_forms">Go to Plugin</a> </div>
  </div>
</div>
