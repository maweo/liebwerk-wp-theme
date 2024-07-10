<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')): ?>

    <div class="container py-5" id="customer_login">
        <div class="row mb-5 liebwerk-account__login-register-container">

            <!-- Login -->
            <div class="col-lg-6">
                <div class="liebwerk-account__login-register-col">
                <?php endif; ?>
                <form method="post">

                    <?php do_action('woocommerce_login_form_start'); ?>

                    <p class="text-muted mb-3">
                        <?php esc_html_e('Returning customer?', 'woocommerce'); ?>
                    </p>
                    <h2 class="mb-0">
                        <?php esc_html_e('Login', 'woocommerce'); ?>
                    </h2>
                    <p class="text-muted">
                        <?php esc_html_e('*Required field', 'woocommerce'); ?>
                    </p>

                    <div class="form-group my-4">
                        <label class="mb-2" for="username">
                            <strong>
                                <?php esc_html_e('E-Mail Address', 'woocommerce'); ?>&nbsp;<span
                                    class="required">*</span>
                            </strong>
                        </label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="E-Mail"
                            autocomplete="username"
                            value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>">
                    </div>

                    <div class="form-group mb-1">
                        <label class="mb-2" for="password">
                            <strong>
                                <?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                            </strong>
                        </label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            autocomplete="current-password"
                            value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>">
                    </div>


                    <?php do_action('woocommerce_login_form'); ?>

                    <p class="woocommerce-LostPassword lost_password">
                        <a
                            href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot my password', 'woocommerce'); ?></a>
                    </p>

                    <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>

                    <div>
                        <button type="submit" class="liebwerk-account__login-register-button my-3" name="login"
                            value="<?php esc_attr_e('Log in', 'woocommerce'); ?>">
                            <?php esc_html_e('Log in', 'woocommerce'); ?>
                        </button>
                    </div>

                    <label
                        class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme"
                            type="checkbox" id="rememberme" value="forever" /> <span>
                            <?php esc_html_e('Keep me logged in', 'woocommerce'); ?>
                        </span>
                    </label>

                    <?php do_action('woocommerce_login_form_end'); ?>

                </form>
            </div>

            <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')): ?>
            </div>

            <!-- Register -->
            <div class="col-lg-6">
                <div class="liebwerk-account__login-register-col">
                    <p class="text-muted mb-3">
                        <?php esc_html_e('First time here?', 'woocommerce'); ?>
                    </p>
                    <h2 class="mb-0">
                        <?php esc_html_e('Create an Account', 'woocommerce'); ?>
                    </h2>
                    <p class="text-muted">
                        <?php esc_html_e('*Required field', 'woocommerce'); ?>
                    </p>

                    <form method="post" class="" <?php do_action('woocommerce_register_form_tag'); ?>>

                        <?php do_action('woocommerce_register_form_start'); ?>

                        <?php if ('no' === get_option('woocommerce_registration_generate_username')): ?>

                            <div class="form-group my-4">
                                <label class="mb-2" for="reg_username">
                                    <strong>
                                        <?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                                    </strong>
                                </label>
                                <input type="text" class="form-control" name="username" id="reg_username" placeholder="E-Mail"
                                    autocomplete="username"
                                    value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>">
                            </div>

                        <?php endif; ?>

                        <div class="form-group my-4">
                            <label class="mb-2" for="reg_email">
                                <strong>
                                    <?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span
                                        class="required">*</span>
                                </strong>
                            </label>
                            <input type="email" class="form-control" name="email" id="reg_email" placeholder="E-Mail"
                                autocomplete="email"
                                value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>">
                        </div>

                        <?php if ('no' === get_option('woocommerce_registration_generate_password')): ?>

                            <div class="form-group my-4">
                                <label class="mb-2" for="reg_password">
                                    <strong>
                                        <?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span>
                                    </strong>
                                </label>
                                <input type="password" class="form-control" name="password" id="reg_password"
                                    placeholder="Password" autocomplete="new-password">
                            </div>

                        <?php else: ?>

                            <p>
                                <?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?>
                            </p>

                        <?php endif; ?>

                        <?php do_action('woocommerce_register_form'); ?>

                        <p class="woocommerce-form-row form-row">
                            <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                            <button type="submit" class="liebwerk-account__login-register-button my-3" name="register"
                                value="<?php esc_attr_e('Register', 'woocommerce'); ?>">
                                <?php esc_html_e('Register', 'woocommerce'); ?>
                            </button>
                        </p>

                        <?php do_action('woocommerce_register_form_end'); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>