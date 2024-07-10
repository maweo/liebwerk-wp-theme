<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_account_navigation');
?>

<!-- desktop -->
<ul class="liebwerk-account__navigation-desktop">
    <?php foreach (wc_get_account_menu_items() as $endpoint => $label): ?>
        <?php if ($label === 'Downloads') {
            continue;
        } ?>
        <li>
            <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">

                <?php if ($endpoint === WC()->query->get_current_endpoint()) {
                    echo "<strong>" . esc_html($label) . "</strong>";
                } else {
                    // strong
                    echo esc_html($label);
                } ?>

                <div class="liebwerk-account__navigation-desktop--icon-wrapper">
                    <?php echo $icon; ?>
                </div>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<!-- mobile dropdown -->
<div class="liebwerk-account__navigation-mobile mt-4">
    <?php
    $currentEndpoint = WC()->query->get_current_endpoint();
    ?>
    <h1 class="liebwerk-account__current-page-heading d-block d-lg-none">
        <?php
        // format endpoint to match the label
        $currentEndpoint = str_replace('-', ' ', $currentEndpoint);
        $currentEndpoint = ucwords($currentEndpoint);

        echo $currentEndpoint ? $currentEndpoint : esc_html__('Dashboard', 'woocommerce');
        ?>
    </h1>

    <button class="dropdown-toggle px-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        <?php echo esc_html__('Dashboard', 'woocommerce'); ?>
    </button>
    <div class="liebwerk-account__navigation-mobile-menu-list collapse" id="collapseExample">
        <?php foreach (wc_get_account_menu_items() as $endpoint => $label): ?>
            <?php if ($label === 'Downloads') {
                continue;
            } ?>
            <div>
                <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                    <?php echo esc_html($label); ?>
                    <?php if ($icon): ?>
                        <?php echo $icon; ?>
                    <?php endif; ?>
                </a>
                <hr>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php do_action('woocommerce_after_account_navigation'); ?>