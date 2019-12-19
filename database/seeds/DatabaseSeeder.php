<?php
use Illuminate\Database\Seeder;
use App\Admin;
use App\Models\Menu;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('admins')->delete();        
        //3) Create Admin User
        $user = ['name' => 'Admin User', 'email' => 'manojvijayanaluva@gmail.com', 'password' => Hash::make('9847483390')];
        $user = Admin::create($user);

        //2
        DB::table('menus')->delete();    
        $data = [
            ['title'=>'Category', 'admin_url'=>'category','priority'=>'1'],
            ['title'=>'Brand', 'admin_url'=>'brand','priority'=>'1'],
            ['title'=>'Products', 'admin_url'=>'product','priority'=>'2'],
            ['title'=>'Banner Products', 'admin_url'=>'offer','priority'=>'2'],
            ['title'=>'Featured Products', 'admin_url'=>'featured','priority'=>'2'],
        	
        ];
        foreach ($data as $key => $value) {
        	Menu::create($value);
        }
        
    }
}