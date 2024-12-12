<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->truncate();

        $data = [
            [
                'title' => 'inside Dhaka',
                'value' => 50,
            ],
            [
                'title' => 'outside Dhaka',
                'value' => 90,
            ],
            [
                'title' => 'emergency contact',
                'value' => '01954335310',
            ],
            [
                'title' => 'sales conact 1',
                'value' => '01954335310',
            ],
            [
                'title' => 'sales conact 2',
                'value' => '01954335310',
            ],
            [
                'title' => 'address',
                'value' => 'Mirpur 1',
            ],
            [
                'title' => 'email',
                'value' => 'akash@gmail.com',
            ],
            [
                'title' => 'google map',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.841664799973!2d90.40095357607973!3d23.788651987305247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70024ae89f5%3A0xf16f71464f51e199!2sETEK%20Computer%20And%20Software%20Development!5e0!3m2!1sen!2sbd!4v1733836018069!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],
            [
                'title' => 'whatsapp',
                'value' => '01954335310',
            ],
            [
                'title' => 'facebook page',
                'value' => 'www.facebook.com',
            ],
            [
                'title' => 'header css',
                'value' => '
                        <style>
                            .custom_class{
                                background-color: #f5f5f5;
                            }
                        </style>
                ',
            ],
            [
                'title' => 'header js',
                'value' => '
                    <script>
                        console.log(\'Custom Function\');
                    </script>
                ',
            ],
            [
                'title' => 'logo',
                'value' => 'logo.png',
            ],
            [
                'title' => 'copyright',
                'value' => 'copyright 2024',
            ],
            [
                'title' => 'Telegram Bot Api',
                'value' => 'bot:dghfkjdhkitj=',
            ]
        ];

        DB::table('settings')->insert($data);
    }
}
