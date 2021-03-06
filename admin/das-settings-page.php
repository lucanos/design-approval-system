<?php
/*
	This is file is for creating the options page for Wordpress's backend
*/

//Main setting page function
function das_settings_page() {
?>
<div class="das-settings-admin-wrap">
  <h2><?php _e('Design Approval System Settings', 'design-approval-system') ?></h2>
  <a class="buy-extensions-btn" href="http://www.slickremix.com/downloads/category/design-approval-system/" target="_blank"><?php _e('Get Extensions Here!', 'design-approval-system') ?></a>
  <div class="use-of-plugin"><?php _e("Please fill out the settings below. If you don't understand what a field is for click the question mark next to that title.", "design-approval-system") ?></div>
  <h3><?php _e('COMPANY INFO', 'design-approval-system') ?></h3>
  <form method="post" class="das-settings-admin-form" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="das-settings-admin-input-wrap company-info-style">
      <div class="das-settings-admin-input-label"><?php _e('Company Logo (required)', 'design-approval-system') ?>: <a class="question1"><?php _e('?', 'design-approval-system') ?></a></div>
      <input id="das_default_theme_logo_image" name="das_default_theme_logo_image" class="das-settings-admin-input" type="text"  value="<?php echo get_option('das_default_theme_logo_image'); ?>" />
      <input id="das_logo_image_button" class="upload_image_button" type="button" value="Upload Image" />
      
      <div class="das-settings-admin-input-example upload-logo-size"><?php _e('This logo will be displayed at the top of all your design posts. Size for the "default" template is 124px X 20px.', 'design-approval-system') ?></div>
      <div class="clear"></div>
      <div class="das-settings-id-answer answer1">
        <ul>
          <li><?php _e('Your logo will be placed at the left right of the page.', 'design-approval-system') ?></li>
        </ul>
        <img src="<?php print DAS_PLUGIN_PATH ?>/design-approval-system/admin/images/how-to/admin-help-logo.jpg" width="857" height="133" alt="Header Logo Example" /> <a class="im-done"><?php _e('close', 'design-approval-system') ?></a> </div>
      <!--/das-settings-id-answer-->
      
      <div class="clear"></div>
    </div>
    <!--/das-settings-admin-input-wrap-->
    
    <div class="das-settings-admin-input-wrap company-info-style">
      <div class="das-settings-admin-input-label"><?php _e('Company Name (required)', 'design-approval-system') ?></div>
      <input name="das-settings-company-name" class="das-settings-admin-input" type="text" id="das-settings-company-name" value="<?php echo get_option('das-settings-company-name'); ?>" />
      <div class="das-settings-admin-input-example">This is used when sending emails to a client, and will also appear on the approval form too.</div>
    </div>
    <!--/das-settings-admin-input-wrap-->
    
    <div class="das-settings-admin-input-wrap company-info-style">
      <div class="das-settings-admin-input-label"><?php _e('Company Email Address (required)', 'design-approval-system') ?></div>
      <input name="das-settings-company-email" class="das-settings-admin-input" type="text" id="das-settings-company-email" value="<?php echo get_option('das-settings-company-email'); ?>" />
      <div class="das-settings-admin-input-example"><?php _e('This is required to send emails to a client through our system', 'design-approval-system') ?></div>
    </div>
    <!--/das-settings-admin-input-wrap-->
    
    <div class="das-settings-admin-input-wrap company-info-style ">
      <div class="das-settings-admin-input-label das-smtp-custom"<?php _e('Send emails using SMTP', 'design-approval-system') ?>><!--<a class="question7">?</a>--></div>

      <input name="das-settings-smtp" class="das-settings-admin-input" type="checkbox"  id="das-settings-smtp" value="1" <?php checked( '1', get_option( 'das-settings-smtp' ) ); ?>/>
  <?php    
 
     $smtp_checked =  get_option( 'das-settings-smtp' );
		
if ($smtp_checked == '1') {
  _e('Checked, you are now using SMTP to send emails. You must contact your host provider if you are unsure of the settings to enter.', 'design-approval-system');
}
else	{
  _e('Not checked, you are using sendmail. If your experiencing email troubles we suggest you check the box and enter your SMTP info.', 'design-approval-system');
}
   ?>
  
   <div class="smpt-form-wrap">
   <label>SMTP Server</label>
   <input type="text" name="das-smtp-server" id="das-smtp-server" value="<?php echo get_option( 'das-smtp-server' ); ?>" placeholder="<?php  _e('mail.yourdomain.com', 'design-approval-system') ?>">
   
   <label>SMTP Port</label>
   <input type="text" name="das-smtp-port" value="<?php echo get_option( 'das-smtp-port' ); ?>"  placeholder="<?php  _e('26 is usually the default SMPT port', 'design-approval-system') ?>">
   
   <label class="checkbox-label">SMTP Authenticate?</label>
   <input class="checkbox-input" type="checkbox" name="das-smtp-checkbox-authenticate" id="das-smtp-checkbox-authenticate" value="1" <?php echo checked( '1', get_option( 'das-smtp-checkbox-authenticate' ) ); ?>/>
   <div class="clear"></div>
   <label>Authenticate Username</label>
   <input type="text" name="das-smtp-authenticate-username" id="das-smtp-authenticate-username" value="<?php echo get_option( 'das-smtp-authenticate-username' ); ?>" placeholder="<?php  _e('example@yourdomain.com', 'design-approval-system') ?>">
   
   <label>Authenticate Password</label>
   <input type="password" name="das-smtp-authenticate-password" id="das-smtp-authenticate-password" value="<?php echo get_option( 'das-smtp-authenticate-password' ); ?>">
   </div>
   
     <p><?php  _e('<strong>NOTE:</strong> If you check SMTP authenticate and enter your username or password incorrectly the form will not submit and show Thank-You message, letting you know your information is incorrect. You should test this before allowing clients to use your Design Approval System.</p>
     <p>There are many things that can go wrong with sending mail through SMTP and most of the problems come from permission issues.</p>
     <ul>
 <li>1. Does your Host have permission to relay through the SMTP Host?</li>
 <li>2. Does your host require POP before SMTP?</li>
 <li>3. Does your Host require SMTP authentication?</li>
 <li>4. Are your SMTP settings correct for the remote host username / password?</li>
</ul>
', 'design-approval-system') ?>
<div class="clear"></div>
    </div>
    <!--/das-settings-admin-input-wrap-->
    
 
    <h3><?php  _e('Email for Designer Message', 'design-approval-system') ?></h3>
    <div class="subtext-of-title"><?php  _e('These settings are for the email to your client, letting them know their design is ready to be reviewed.<br/>
      It also Includes a confirmation email to you the Designer too.', 'design-approval-system') ?></div>
    <div class="das-settings-admin-input-wrap">
      <div class="das-settings-admin-input-label"><?php _e('Message to Client (optional):', 'design-approval-system') ?> <a class="question4">?</a></div>
      <textarea name="das-settings-email-for-designers-message-to-clients" class="das-settings-admin-input" id="das-settings-email-for-designers-message-to-clients"><?php echo get_option('das-settings-email-for-designers-message-to-clients'); ?></textarea>
      <div class="das-settings-admin-input-example"><?php  _e("*NOTE* If you do not fill this out the <a class='question4'>default text</a> will be used.", "design-approval-system") ?></div>
      <div class="clear"></div>
      <div class="das-settings-id-answer answer4">
        <h4><?php _e('The default text for this field is:', 'design-approval-system') ?></h4>
        <ul>
          <li><?php _e('Please review your design comp for changes and/or errors:', 'design-approval-system') ?></li>
        </ul>
        <span><?php _e('Example of Email', 'design-approval-system') ?></span> <img src="<?php print DAS_PLUGIN_PATH ?>/design-approval-system/admin/images/how-to/help-designers-email.jpg" width="857" height="189" /> <a class="im-done"><?php _e('close', 'design-approval-system') ?></a> </div>
      <!--/das-settings-id-answer-->
      <div class="clear"></div>
    </div>
    <!--/das-settings-admin-input-wrap-->
    
    <h3><?php _e('Approved Digital Signature Email and Popup Message', 'design-approval-system') ?></h3>
    <div class="subtext-of-title"><?php _e('These settings are for the email to you, the designer, letting you know the client has approved the design. <br/>
      It also includes a confirmation email to your Client too.', 'design-approval-system') ?></div>
    <div class="das-settings-admin-input-wrap">
      <div class="das-settings-admin-input-label"><?php _e('Message to Designer (optional):', 'design-approval-system') ?> <a class="question5"><?php _e('?', 'design-approval-system') ?></a></div>
      <textarea name="das-settings-approved-dig-sig-message-to-designer" class="das-settings-admin-input" type="text" id="das-settings-approved-dig-sig-message-to-designer"><?php echo get_option('das-settings-approved-dig-sig-message-to-designer'); ?></textarea>
      <div class="das-settings-admin-input-example"><?php _e("*NOTE* If you do not fill this out the <a class='question5'>default text</a> will be used.", "design-approval-system") ?></div>
      <div class="clear"></div>
      <div class="das-settings-id-answer answer5">
        <h4><?php _e('The default text for this field is:', 'design-approval-system') ?></h4>
        <ul>
          <li><?php _e("This design comp has been approved by the client. Please take the next appropriate step.", "design-approval-system") ?></li>
        </ul>
        <span><?php _e('Example of Email', 'design-approval-system') ?></span> <img src="<?php print DAS_PLUGIN_PATH ?>/design-approval-system/admin/images/how-to/help-approval-designer.jpg" width="857" height="189" /> <a class="im-done"><?php _e('close', 'design-approval-system') ?></a> </div>
      <!--/das-settings-id-answer-->
      <div class="clear"></div>
    </div>
    <!--/das-settings-admin-input-wrap-->
    
    <div class="das-settings-admin-input-wrap">
      <div class="das-settings-admin-input-label"><?php _e('Message to Client (optional):', 'design-approval-system') ?> <a class="question6"><?php _e('?', 'design-approval-system') ?></a></div>
      <textarea name="das-settings-approved-dig-sig-message-to-clients" class="das-settings-admin-input" type="text" id="das-settings-approved-dig-sig-message-to-clients"><?php echo get_option('das-settings-approved-dig-sig-message-to-clients'); ?></textarea>
      <div class="das-settings-admin-input-example"><?php _e("*NOTE* If you do not fill this out the <a class='question6'>default text</a> will be used.", "design-approval-system") ?></div>
      <div class="clear"></div>
      <div class="das-settings-id-answer answer6">
        <h4><?php _e('The default text for this field is:', 'design-approval-system') ?></h4>
        <ul>
          <li><?php _e('Thank you for approving your design comp. We will now take the next steps in finalizing your project. Below is a confirmation of your submission.<br/>
            As the authorized decision maker of my firm I acknowledge that I have reviewed and approved the proposed design comps designed by [Your Company Name].', 'design-approval-system') ?></li>
        </ul>
        <span><?php _e('Example of Email', 'design-approval-system') ?></span> <img src="<?php print DAS_PLUGIN_PATH ?>/design-approval-system/admin/images/how-to/help-approval-email.jpg" width="857" height="301" /> <a class="im-done"><?php _e('close', 'design-approval-system') ?></a> </div>
      <!--/das-settings-id-answer-->
      <div class="clear"></div>
    </div>
    <!--/das-settings-admin-input-wrap-->
    
    <div class="das-settings-admin-input-wrap">
      <div class="das-settings-admin-input-label"><?php _e('Thank You Message to Client after Digital Signature form is submitted (optional):', 'design-approval-system') ?> <a class="question7">?</a></div>
      <textarea name="das-settings-approved-dig-sig-thank-you" class="das-settings-admin-input" type="text" id="das-settings-approved-dig-sig-thank-you"><?php echo get_option('das-settings-approved-dig-sig-thank-you'); ?></textarea>
      <div class="das-settings-admin-input-example"><?php _e("*NOTE* If you do not fill this out the <a class='question7'>default text</a> will be used.", "design-approval-system") ?></div>
      <div class="clear"></div>
      <div class="das-settings-id-answer answer7">
        <h4><?php _e('The default text for this field is:', 'design-approval-system') ?></h4>
        <ul>
          <li><?php _e('Thank you for approving your design comp. <br/>
            [Your Company Name] will now take the next steps in finalizing your project.', 'design-approval-system') ?></li>
        </ul>
        <span><?php _e('Example of Pop Up Meessage that appears when a client approves a design', 'design-approval-system') ?></span> <img src="<?php print DAS_PLUGIN_PATH ?>/design-approval-system/admin/images/how-to/help-approval-popup.jpg" width="857" height="301" /> <a class="im-done"><?php _e('close', 'design-approval-system') ?></a> </div>
      <!--/das-settings-id-answer-->
      <div class="clear"></div>
    </div>
    <!--/das-settings-admin-input-wrap-->
    
    <?php if(is_plugin_active('das-changes-extension/das-changes-extension.php')) {
	include('../wp-content/plugins/das-changes-extension/admin/das-changes-extension-settings-page.php');
}?>
	
    <?php if(is_plugin_active('das-roles-extension/das-roles-extension.php')) {
		include('../wp-content/plugins/das-roles-extension/admin/das-roles-extension-settings-page.php');
}?>

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="das_default_theme_logo_image, das-settings-company-name, das-settings-company-email, das-settings-smtp, das-smtp-server, das-smtp-port, das-smtp-checkbox-authenticate, das-smtp-authenticate-username, das-smtp-authenticate-password, das-settings-email-for-designers-message-to-clients, das-settings-approved-dig-sig-message-to-designer, das-settings-approved-dig-sig-message-to-clients, das-settings-approved-dig-sig-thank-you<?php if(is_plugin_active('das-changes-extension/das-changes-extension.php')) {?>, das-settings-design-requests-message-to-designer, das-settings-design-requests-message-to-clients, das-settings-design-requests-thank-you, das-settings-add-design-requests-message-to-designer, das-settings-add-design-requests-message-to-clients, <?php }?> <?php if(is_plugin_active('das-roles-extension/das-roles-extension.php')) {?> das-settings-designer-role, das-settings-client-role <?php }?>" />
    <input type="submit" class="das-settings-admin-submit-btn" value="<?php _e('Save Changes', 'design-approval-system') ?>" />
  </form>
  
  
  <div class="das-settings-icon-wrap"><a href="https://www.facebook.com/SlickRemix" target="_blank" class="facebook-icon"></a><a class="das-settings-admin-slick-logo" href="http://www.slickremix.com" target="_blank"></a></div>

  
 
 
 
 </div>
<!--/das-settings-admin-wrap--> 

<script type="text/javascript" src="<?php print DAS_PLUGIN_PATH ?>/design-approval-system/admin/js/admin.js"></script>
<?php

	include('walkthrough/walkthrough.php');	

}
?>