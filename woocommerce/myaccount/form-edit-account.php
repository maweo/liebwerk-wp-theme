<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>


<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>

    <?php do_action('woocommerce_edit_account_form_start'); ?>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label class="mb-2" for="account_first_name">
                    <strong>
                        <?php esc_html_e('First name', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                    </strong>
                </label>
                <input type="text" class="form-control" name="account_first_name" id="account_first_name" placeholder=""
                    autocomplete="given-name" value="<?php echo esc_attr($user->first_name); ?>">
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label class="mb-2" for="account_last_name">
                    <strong>
                        <?php esc_html_e('Last name', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                    </strong>
                </label>
                <input type="text" class="form-control" name="account_last_name" id="account_last_name" placeholder=""
                    autocomplete="family-name" value="<?php echo esc_attr($user->last_name); ?>">
            </div>
        </div>


        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label class="mb-2" for="account_display_name">
                    <strong>
                        <?php esc_html_e('Display name', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                    </strong>
                </label>
                <input type="text" class="form-control" name="account_display_name" id="account_display_name"
                    placeholder="" value="<?php echo esc_attr($user->display_name); ?>">
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label class="mb-2" for="account_email">
                    <strong>
                        <?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                    </strong>
                </label>
                <input type="email" class="form-control" name="account_email" id="account_email" placeholder=""
                    autocomplete="email" value="<?php echo esc_attr($user->user_email); ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-2 mb-4">
            <div class="liebwerk-account__password-change">
                <fieldset>
                    <legend>
                        <strong class="liebwerk-account__password-change--title">
                            <?php esc_html_e('Password change', 'woocommerce'); ?>
                        </strong>
                    </legend>

                    <label class="mb-2" for="password_current">
                        <?php esc_html_e('Current password (leave blank to leave unchanged)', 'woocommerce'); ?>
                    </label>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" name="password_current" id="password_current"
                            placeholder="Password" autocomplete="off" value="<?php echo esc_attr($user->last_name); ?>">

                    </div>

                    <label class="mb-2" for="password_1">
                        <?php esc_html_e('New password (leave blank to leave unchanged)', 'woocommerce'); ?>
                    </label>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" name="password_1" id="password_1"
                            placeholder="Password" autocomplete="off" value="<?php echo esc_attr($user->last_name); ?>">
                    </div>


                    <label class="mb-2" for="password_2">
                        <?php esc_html_e('Confirm new password', 'woocommerce'); ?>
                    </label>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control" name="password_2" id="password_2"
                            placeholder="Password" autocomplete="off" value="<?php echo esc_attr($user->last_name); ?>">
                    </div>

                </fieldset>
            </div>
        </div>
    </div>

    <div class="clear"></div>

    <?php do_action('woocommerce_edit_account_form'); ?>

    <?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>

    <div class="liebwerk-account__account-button-wrapper">
        <button type="submit" class="liebwerk-account__account-button" name="save_account_details"
            value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save changes', 'woocommerce'); ?></button>
        <input type="hidden" name="action" value="save_account_details" />
    </div>

    <?php do_action('woocommerce_edit_account_form_end'); ?>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>