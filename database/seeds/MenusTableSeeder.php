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
        if (App::environment('local')){

            $file = new SplFileObject('database/csv/menus.csv');
            $file->setFlags(
                \SplFileObject::READ_CSV |
                \SplFileObject::READ_AHEAD |
                \SplFileObject::SKIP_EMPTY |
                \SplFileObject::DROP_NEW_LINE
            );
            $list = [];
            foreach($file as $line) {
                $menu_list[] = [
                    "name" => $line[0],
                    "price" => $line[1],
                    "energy" => $line[2],
                    "protein" => $line[3],
                    "lipid" => $line[4],
                    "salt" => $line[5],
                ];

                DB::table("menus")->insert($menu_list);
                $last_menu_id = DB::getPdo()->lastInsertId();

                $schedule_list[] = [
                    "menu_id" => $last_menu_id,
                    "date" => $line[6],
                    "type" => $line[7],
                ];
                
                DB::table("schedules")->insert($schedule_list);
            }
        }
        
    }
}
