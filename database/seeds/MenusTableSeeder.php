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
                $list[] = [
                    "name" => $line[0],
                    "price" => $line[1],
                    "energy" => $line[2],
                    "protein" => $line[3],
                    "lipid" => $line[4],
                    "salt" => $line[5],
                ];
            }

            DB::table("menus")->insert($list);
        }
        
    }
}
