<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ab_text = file_get_contents("database/seeds/201907_ab.json");
        $ab_menus = json_decode($ab_text, true);

        foreach($ab_menus as $menu){
            DB::table("menus")->insert($menu['menu']);
            $menu_id = DB::getPdo()->lastInsertId();
            $menu['schedule']['menu_id'] = $menu_id;
            DB::table("schedules")->insert($menu['schedule']);
        }

        $weekly_text = file_get_contents("database/seeds/201907_weekly.json");
        $weekly_menus = json_decode($weekly_text, true);

        foreach($weekly_menus as $menu){
            DB::table("menus")->insert($menu['menu']);
            $menu_id = DB::getPdo()->lastInsertId();

            $schedules = [];
            foreach($menu['dates'] as $date){
                $schedules[] = [
                    'menu_id' => $menu_id,
                    'type' => 'N',
                    'date' => $date
                ];
            }
            DB::table("schedules")->insert($schedules);
        }

    }
}
