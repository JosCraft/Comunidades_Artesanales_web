<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingChargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shipping = [
            
            ['country' => 'Afghanistan', '0_500g' => 100.00, '501g_1000g' => 200.00, '1001_2000g' => 300.00, '2001g_5000g' => 400.00, 'above_5000g' => 500.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Albania', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Algeria', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'American Samoa', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Andorra', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Angola', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Anguilla', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Antarctica', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Antigua and Barbuda', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Argentina', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Armenia', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Aruba', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Australia', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Austria', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Azerbaijan', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Bahamas', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Bahrain', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Bangladesh', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Barbados', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Belarus', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Belgium', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Belize', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Benin', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Bhutan', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Bolivia', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Bosnia and Herzegovina', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Botswana', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Brazil', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Brunei Darussalam', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Bulgaria', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Burkina Faso', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Burundi', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Cabo Verde', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Cambodia', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Cameroon', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Canada', '0_500g' => 100.00, '501g_1000g' => 200.00, '1001_2000g' => 300.00, '2001g_5000g' => 400.00, 'above_5000g' => 500.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Central African Republic', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Chad', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Chile', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'China', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Colombia', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Comoros', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Congo', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Congo, Democratic Republic of the', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Costa Rica', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Croatia', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Cuba', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Cyprus', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Czech Republic', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Denmark', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Djibouti', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Dominica', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Dominican Republic', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['country' => 'Ecuador', '0_500g' => 0.00, '501g_1000g' => 0.00, '1001_2000g' => 0.00, '2001g_5000g' => 0.00, 'above_5000g' => 0.00, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            
        ];
        \App\Models\ShippingCharge::insert($shipping);
    }
}
