<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $reviews = json_decode(file_get_contents("database/seeds/reviews.json"), true);

        $created_at = now();
        $updated_at = now();

        // foreach($reviews as $review){
        //     $review['created_at'] = $created_at;
        //     $review['updated_at'] = $updated_at;
        //     DB::table("reviews")->insert($review);
        // }

        $menu_ids = DB::table("menus")->pluck('id');
        $reviews = [];

        foreach($menu_ids as $menu_id){
            $reviews[] = [
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'menu_id' => $menu_id,
                'message' => "test_message menu_id: " . (string)$menu_id,
                'reputation' => random_int(1, 5),
                'author_name' => "test"
            ];
        }
        DB::table("reviews")->insert($reviews);
    }
}
