<?php

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directPayment = new Payment();
        $directPayment->name = 'Direct Bank Transfer';
        $directPayment->description = 'Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.';
        $directPayment->save();

        $chequePayment = new Payment();
        $chequePayment->name = 'Cheque Payment';
        $chequePayment->description = 'Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.';
        $chequePayment->save();

        $paypalPayment = new Payment();
        $paypalPayment->name = 'PayPal';
        $paypalPayment->description = 'Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.';
        $paypalPayment->save();
    }
}
