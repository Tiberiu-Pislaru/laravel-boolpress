<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=['gino','vino','pino','nino'];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag -> name= $tag;
            $newTag -> slug= $tag;

            $newTag -> save();
        }
        
    }
}
