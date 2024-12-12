<?php

namespace App\Http\Service\actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\About as AboutModel;

class about
{
    public function execute($id)
    {
        $description_1 = '
        <p>
            <strong>
                Premium Puffer Jackets by Calvin Klein, designed for both style and functionality. The jackets are available in a variety of colors, including black, yellow, red, light green, blue, and grey, giving customers multiple options to suit their personal style.
            </strong>
            </p>
            <h3><strong>Design &amp; Features:</strong></h3>
            <p>
            These puffer jackets are crafted with a <strong>quilted design</strong> for enhanced warmth and a contemporary look. Each jacket features a <strong>full-length zipper</strong>, side pockets for convenience, and the <strong>Calvin Klein logo</strong> subtly embroidered on the chest, adding a touch of sophistication. The jackets are lightweight yet warm, making them ideal for cold-weather wear without compromising on comfort.
            </p>
            <h3><strong>Size Measurements:</strong></h3>
            <p>
            To help customers select the right size, a <strong>detailed size chart</strong> is provided. The chart includes measurements for <strong>chest, body length, and sleeve length</strong> in inches:
            </p>
            <figure class="table">
            <table>
                <thead>
                <tr>
                    <th><strong>Size</strong></th>
                    <th><strong>Chest (inches)</strong></th>
                    <th><strong>Length (inches)</strong></th>
                    <th><strong>Sleeve Length (inches)</strong></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>S</td>
                    <td>38</td>
                    <td>26.5</td>
                    <td>23.5</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>40</td>
                    <td>27.5</td>
                    <td>24.5</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>42</td>
                    <td>28.5</td>
                    <td>25.5</td>
                </tr>
                <tr>
                    <td>XL</td>
                    <td>44</td>
                    <td>29.5</td>
                    <td>26.5</td>
                </tr>
                <tr>
                    <td>2XL</td>
                    <td>46</td>
                    <td>30.5</td>
                    <td>27.5</td>
                </tr>
                </tbody>
            </table>
            </figure>
            <p>
            The <strong>size guide</strong> advises measuring under the arms around the fullest part of the chest while keeping the tape level across the back. A <strong>special note</strong> reminds customers that all measurements are in inches, ensuring accurate sizing.
            </p>
            <h3><strong>Call to Action:</strong></h3>
            <p>
            At the bottom left, a <strong>QR code</strong> is provided for quick online shopping access, alongside a prompt to visit <strong>superb.com.bd</strong> for a seamless shopping experience. The bottom right corner features social media icons encouraging customers to follow <strong>Superb Lifestyle</strong> for the latest updates and promotions.
            </p>
            <p>
            This presentation highlights the combination of <strong>luxury, warmth, and contemporary design</strong>, making these Calvin Klein puffer jackets a must-have for the colder seasons.
            </p>
        ';

        $description_2 = '
        <p>Experience zone &amp; outlet:</p>
        <p>
        <img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t2d/1/16/1f4cd.png" alt="?">
            Suite 305, 2nd Floor, House 10, Road 8, Gulshan-1, Dhaka-1212, Bangladesh</p>
            <p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/tbe/1/16/1f4e7.png" alt="?"> Email: superb2u@hotmail.com</p>
            <p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t4d/1/16/1f4de.png" alt="?"> call Center: +8809606990177</p>
            <p>WhatsApp: +8801820000964</p><p>Everyday open</p><p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t2f/1/16/1f557.png" alt="?"> Open: 7:00 AM to 11:59 PM</p>
            <p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png" alt="?"> Please do like and share our Facebook page to stay connected!</p>
            <p>We will be introducing more luxury and premium products just for you.</p><p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t80/1/16/1f64f.png" alt="?"> Thank you for your support!</p>
        ';

        AboutModel::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'Your Title Here',
            'button_title' => 'Button Title',
            'button_url' => url('/'),
            'description_first' => $description_1,
            'description_second' => $description_2,
        ]);
        return;
    }
}
