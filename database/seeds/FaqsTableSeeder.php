<?php

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') == 'local') {
            factory(Msenl\Faq::class, 50)->create();

            $i = 0;

            $faqs = Msenl\Faq::all();

            foreach ($faqs as $faq) {
                $faq->order = $i++;
                $faq->save();
            }

        }
    }
}
