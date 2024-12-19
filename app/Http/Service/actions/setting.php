<?php

namespace App\Http\Service\actions;

use Illuminate\Http\Request;
use App\Models\Order\Setting as setting_title;
use Illuminate\Support\Facades\Auth;

class setting
{
    public function execute($id)
    {
        $data = [
            [
                'title' => 'inside Dhaka',
                'value' => 50,
                'type' => 'number',
            ],
            [
                'title' => 'outside Dhaka',
                'value' => 90,
                'type' => 'number',
            ],
            [
                'title' => 'emergency contact',
                'value' => '01954335310',
                'type' => 'string',
            ],
            [
                'title' => 'sales conact 1',
                'value' => '01954335310',
                'type' => 'string',
            ],
            [
                'title' => 'sales conact 2',
                'value' => '01954335310',
                'type' => 'string',
            ],
            [
                'title' => 'address',
                'value' => 'Mirpur 1',
                'type' => 'text',
            ],
            [
                'title' => 'email',
                'value' => 'akash@gmail.com',
                'type' => 'string',
            ],
            [
                'title' => 'google map',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.841664799973!2d90.40095357607973!3d23.788651987305247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70024ae89f5%3A0xf16f71464f51e199!2sETEK%20Computer%20And%20Software%20Development!5e0!3m2!1sen!2sbd!4v1733836018069!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'type' => 'text',
            ],
            [
                'title' => 'whatsapp',
                'value' => '01954335310',
                'type' => 'string',
            ],
            [
                'title' => 'facebook page',
                'value' => 'www.facebook.com',
                'type' => 'string',
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
                'type' => 'text',
            ],
            [
                'title' => 'header js',
                'value' => '
                    <script>
                        console.log(\'Custom Function\');
                    </script>
                ',
                'type' => 'text',
            ],
            [
                'title' => 'logo',
                'value' => 'logo.png',
                'type' => 'file',
            ],
            [
                'title' => 'copyright',
                'value' => 'copyright 2024',
                'type' => 'string',
            ],
            [
                'title' => 'Telegram Bot Api',
                'value' => 'bot:dghfkjdhkitj=',
                'type' => 'string',
            ]
        ];
        foreach ($data as $d) {
            setting_title::create([
                'user_id' => Auth::user()->id,
                'website_id' => $id,
                'title' => $d['title'],
                'value' => $d['value'],
            ]);
        }

        return;
    }
}
