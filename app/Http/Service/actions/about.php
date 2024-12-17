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
                    ক্যালভিন ক্লেইনের প্রিমিয়াম পাফার জ্যাকেট, যা স্টাইল এবং কার্যকারিতার সমন্বয়ে ডিজাইন করা হয়েছে। এই জ্যাকেটগুলো বিভিন্ন রঙে পাওয়া যায়, যেমন কালো, হলুদ, লাল, হালকা সবুজ, নীল এবং ধূসর। গ্রাহকদের ব্যক্তিগত স্টাইল অনুযায়ী রঙ বেছে নেওয়ার অনেক অপশন রয়েছে।
                </strong>
            </p>
            <h3><strong>ডিজাইন এবং বৈশিষ্ট্য:</strong></h3>
            <p>
                এই পাফার জ্যাকেটগুলো <strong>কুইল্টেড ডিজাইন</strong>-এ তৈরি করা হয়েছে যা উষ্ণতা এবং আধুনিক লুক যোগ করে। প্রতিটি জ্যাকেটে রয়েছে <strong>ফুল-লেংথ চেইন</strong>, সুবিধাজনক সাইড পকেট এবং বুকের ওপর সূক্ষ্মভাবে <strong>ক্যালভিন ক্লেইন লোগো</strong> এমব্রয়ডারি করা আছে, যা জ্যাকেটটিকে আরও আকর্ষণীয় করে তোলে। জ্যাকেটগুলো হালকা কিন্তু উষ্ণ, যা ঠান্ডা আবহাওয়ার জন্য আদর্শ এবং আরামের সাথে কোনো আপোষ করে না।
            </p>
            <h3><strong>সাইজ মাপ:</strong></h3>
            <p>
                গ্রাহকদের সঠিক সাইজ বাছাই করতে একটি <strong>বিস্তারিত সাইজ চার্ট</strong> দেওয়া হয়েছে। চার্টে <strong>বুক, বডি লেংথ এবং হাতার দৈর্ঘ্য</strong> ইনচে উল্লেখ করা হয়েছে:
            </p>
            <figure class="table">
            <table>
                <thead>
                <tr>
                    <th><strong>সাইজ</strong></th>
                    <th><strong>বুক (ইঞ্চি)</strong></th>
                    <th><strong>লম্বা (ইঞ্চি)</strong></th>
                    <th><strong>হাতার দৈর্ঘ্য (ইঞ্চি)</strong></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>S</td>
                    <td>৩৮</td>
                    <td>২৬.৫</td>
                    <td>২৩.৫</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>৪০</td>
                    <td>২৭.৫</td>
                    <td>২৪.৫</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>৪২</td>
                    <td>২৮.৫</td>
                    <td>২৫.৫</td>
                </tr>
                <tr>
                    <td>XL</td>
                    <td>৪৪</td>
                    <td>২৯.৫</td>
                    <td>২৬.৫</td>
                </tr>
                <tr>
                    <td>2XL</td>
                    <td>৪৬</td>
                    <td>৩০.৫</td>
                    <td>২৭.৫</td>
                </tr>
                </tbody>
            </table>
            </figure>
            <p>
                <strong>সাইজ গাইড</strong>-এ পরামর্শ দেওয়া হয়েছে যে বুকের সবচেয়ে বড় অংশের নিচে টেপ রেখে সঠিকভাবে পরিমাপ করুন এবং টেপটি পিছনে সমানভাবে রাখুন। একটি <strong>বিশেষ নোট</strong> গ্রাহকদের মনে করিয়ে দেয় যে সমস্ত মাপ ইনচে দেওয়া হয়েছে, যাতে সঠিক সাইজ নিশ্চিত করা যায়।
            </p>
            <h3><strong>কেনার নির্দেশনা:</strong></h3>
            <p>
                নিচের বাম দিকে একটি <strong>QR কোড</strong> দেওয়া হয়েছে দ্রুত অনলাইন শপিংয়ের জন্য, পাশাপাশি <strong>superb.com.bd</strong> ওয়েবসাইটে ভিজিট করার পরামর্শ দেওয়া হয়েছে যাতে সহজে কেনাকাটা করা যায়। ডানদিকে সোশ্যাল মিডিয়া আইকন রয়েছে, যেখানে গ্রাহকদের <strong>Superb Lifestyle</strong> পেজটি ফলো করার অনুরোধ করা হয়েছে, যাতে সর্বশেষ আপডেট এবং অফার সম্পর্কে জানা যায়।
            </p>
            <p>
                এই উপস্থাপনায় <strong>বিলাসিতা, উষ্ণতা এবং আধুনিক ডিজাইন</strong>-এর সমন্বয় তুলে ধরা হয়েছে, যা ক্যালভিন ক্লেইনের পাফার জ্যাকেটকে শীত মৌসুমের জন্য অবশ্যই কেনার একটি পণ্য হিসেবে উপস্থাপন করে।
            </p>
        ';

        $description_2 = '
            <p>অভিজ্ঞতা জোন এবং আউটলেট:</p>
            <p>
            <img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t2d/1/16/1f4cd.png" alt="?">
                স্যুট ৩০৫, দ্বিতীয় তলা, বাড়ি ১০, রোড ৮, গুলশান-১, ঢাকা-১২১২, বাংলাদেশ</p>
            <p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/tbe/1/16/1f4e7.png" alt="?"> ইমেইল: superb2u@hotmail.com</p>
            <p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t4d/1/16/1f4de.png" alt="?"> কল সেন্টার: +৮৮০৯৬০৬৯৯০১৭৭</p>
            <p>হোয়াটসঅ্যাপ: +৮৮০১৮২০০০০৯৬৪</p>
            <p>প্রতিদিন খোলা</p>
            <p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t2f/1/16/1f557.png" alt="?"> সময়: সকাল ৭:০০ টা থেকে রাত ১১:৫৯ টা পর্যন্ত</p>
            <p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png" alt="?"> আমাদের সাথে সংযুক্ত থাকতে আমাদের ফেসবুক পেজে লাইক এবং শেয়ার করুন!</p>
            <p>আমরা খুব শীঘ্রই আরও বিলাসবহুল এবং প্রিমিয়াম পণ্য আপনাদের জন্য নিয়ে আসব।</p>
            <p><img src="https://static.xx.fbcdn.net/images/emoji.php/v9/t80/1/16/1f64f.png" alt="?"> আপনাদের সহযোগিতার জন্য ধন্যবাদ!</p>
        ';


        AboutModel::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'আমাদের বিশিষ্ট সমূহ',
            'button_title' => 'এখানে ক্লিক করুন',
            'button_url' => url('/#order'),
            'description_first' => $description_1,
            'description_second' => $description_2,
        ]);

        return;
    }
}