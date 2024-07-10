<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!apply_filters('woocommerce_order_item_visible', true, $item)) {
    return;
}
?>
<tr>
    <td>
        <!-- product image -->
        <div class="liebwerk-account__order-image-name py-3">
            <?php
            $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $product->get_image(), $item, $item_id);
            ?>
            <div class="liebwerk-account__product-image">
                <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

            </div>

            <div>
                <?php
                $is_visible = $product && $product->is_visible();
                $product_permalink = apply_filters('woocommerce_order_item_permalink', $is_visible ? $product->get_permalink($item) : '', $item, $order);

                echo '<div class="mb-2">';
                echo wp_kses_post(apply_filters('woocommerce_order_item_name', $product_permalink ? sprintf('<a href="%s">%s</a>', $product_permalink, $item->get_name()) : $item->get_name(), $item, $is_visible));


                $qty = $item->get_quantity();
                $refunded_qty = $order->get_qty_refunded_for_item($item_id);

                if ($refunded_qty) {
                    $qty_display = '<del>' . esc_html($qty) . '</del> <ins>' . esc_html($qty - ($refunded_qty * -1)) . '</ins>';
                } else {
                    $qty_display = esc_html($qty);
                }


                echo apply_filters('woocommerce_order_item_quantity_html', ' <span class="product-quantity">' . sprintf('&times;&nbsp;%s', $qty_display) . '</span>', $item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                echo '</div>';

                do_action('woocommerce_order_item_meta_start', $item_id, $item, $order, false);

                wc_display_item_meta($item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                
                do_action('woocommerce_order_item_meta_end', $item_id, $item, $order, false);
                ?>
            </div>
        </div>
    </td>

    <td class="liebwerk-account__order-total">
        <div class="py-3">
            <strong>
                <?php echo $order->get_formatted_line_subtotal($item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </strong>
        </div>
    </td>

</tr>

<?php if ($show_purchase_note && $purchase_note): ?>

    <tr class="woocommerce-table__product-purchase-note product-purchase-note">
        <td colspan="2">
            <?php echo wpautop(do_shortcode(wp_kses_post($purchase_note))); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </td>
    </tr>

<?php endif; ?>