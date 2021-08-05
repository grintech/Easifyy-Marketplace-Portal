<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int|null $merchant_id
 * @property int|null $user_id
 * @property int $product_id
 * @property int|null $coupon_id
 * @property float|null $coupon_discount
 * @property int|null $runner_id
 * @property int|null $order_mode_id
 * @property int|null $payment_method_id
 * @property int|null $order_status_id
 * @property float|null $igst
 * @property float|null $cgst
 * @property float|null $sgst
 * @property float|null $shipping
 * @property string|null $delivery_time
 * @property float|null $total
 * @property float|null $gross_total
 * @property string|null $order_notes
 * @property float|null $refund
 * @property int $delete_status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\DeliveryAddress $delivery_address
 * @property \App\Model\Entity\Coupon $coupon
 * @property \App\Model\Entity\Runner $runner
 * @property \App\Model\Entity\OrderMode $order_mode
 * @property \App\Model\Entity\PaymentMethod $payment_method
 * @property \App\Model\Entity\OrderStatus $order_status
 * @property \App\Model\Entity\CouponRedeem[] $coupon_redeems
 * @property \App\Model\Entity\MerchantPayout[] $merchant_payouts
 * @property \App\Model\Entity\OrderItem[] $order_items
 * @property \App\Model\Entity\OrderNotification[] $order_notifications
 * @property \App\Model\Entity\OrderPayment[] $order_payments
 * @property \App\Model\Entity\RunnerDeliveryRequest[] $runner_delivery_requests
 * @property \App\Model\Entity\Support[] $supports
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'invoice_id' => true,
        'merchant_id' => true,
        'user_id' => true,
        'product_id' => true,
        'coupon_id' => true,
        'coupon_discount' => true,
        'runner_id' => true,
        'order_mode_id' => true,
        'payment_method_id' => true,
        'order_status_id' => true,
        'gst_no'=>true,
        'gst_name'=>true,
        'gst_address'=>true,
        'gst_state'=>true,
        'gst_tax'=>true,
        'taxable_amount'=>true,
        // 'delivery_address' => true,
        // 'igst' => true,
        // 'cgst' => true,
        // 'sgst' => true,
        // 'shipping' => true,
        'delivery_time' => true,
        'is_booking' => true,
        'booking_amount' => true,
        'total' => true,
        'gross_total' => true,
        'order_notes' => true,
        'order_pdf' => true,
        'refund' => true,
        'superadmin_view' => true,
        'psp_view' => true,
        'delete_status' => true,
        'created' => true,
        'modified' => true,
        'merchant' => true,
        'user' => true,
        'address' => true,
        'coupon' => true,
        'runner' => true,
        'order_mode' => true,
        'payment_method' => true,
        'order_status' => true,
        'psp_cancel_msg	' => true,
        'psp_canceled_at' => true,
        'user_cancel_msg' => true,
        'user_canceled_at' => true,
        'coupon_redeems' => true,
        'merchant_payouts' => true,
        'order_items' => true,
        'order_notifications' => true,
        'order_payments' => true,
        'runner_delivery_requests' => true,
        'supports' => true,
    ];
}
