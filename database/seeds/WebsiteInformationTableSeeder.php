<?php

use App\Website_Information;
use Illuminate\Database\Seeder;

class WebsiteInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website_Information::create([
           'name' => 'WebsiteName',
           'phone' => '00249917854712',
           'email' => 'admin@websitename.com',
           'address' => 'Tyler Hamilton, 123 Scenic Drive Houston, TX 77007',
            'facebook_url' => 'https://facebook.com/',
            'twitter_url' => 'https://twitter.com/',
            'snapchat_url' => 'https://snapchat.com/',
            'instgram_url' => 'https://instgram.com/',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy
                              text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
                               the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                               containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'vision' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                         text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                         centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'mission' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                          text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                          centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
        ]);
    }
}
