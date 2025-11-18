<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run()
    {
        Booking::truncate();
        Booking::create(['customer_name'=>'Andi','motor'=>'Suzuki Drag 150','status'=>'DI terima','notes'=>'Tune up + ganti oli']);
        Booking::create(['customer_name'=>'Budi','motor'=>'Yamaha RD','status'=>'On proses','notes'=>'Service karburator']);
        Booking::create(['customer_name'=>'Citra','motor'=>'Honda CB','status'=>'Finish','notes'=>'Ganti busi & setel']);
    }
}
