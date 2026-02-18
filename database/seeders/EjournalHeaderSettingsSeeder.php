<?php

namespace Database\Seeders;

use App\Models\Ejournal\Setting;
use Illuminate\Database\Seeder;

class EjournalHeaderSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'contacts' => [
                [
                    'icon' => 'icon-mail',
                    'text' => 'medopenpress@outlook.com',
                    'href' => 'mailto:medopenpress@outlook.com',
                ],
                [
                    'icon' => 'icon-phone-call',
                    'text' => '+62 897 1399 093',
                    'href' => 'tel:+628971399093',
                ],
                [
                    'icon' => 'icon-pin-1',
                    'text' => 'Jakarta, Indonesia',
                    'href' => '',
                ],
            ],
            'follow_title' => 'Follow Us',
            'socials' => [
                ['icon' => 'icon-facebook-app-symbol', 'url' => ''],
                ['icon' => 'icon-pinterest', 'url' => ''],
                ['icon' => 'icon-linkedin-big-logo', 'url' => ''],
                ['icon' => 'icon-instagram', 'url' => ''],
            ],
            'logo_path' => null,
            'logo_alt' => 'Med Open Press',
            'favicon_path' => null,
            'consultation_text' => 'Consultation',
            'consultation_url' => 'https://wa.me/628971399093',
        ];

        $existing = Setting::getValue('header', null);
        if (is_array($existing) && count($existing)) {
            return;
        }

        Setting::putValue('header', $defaults);
    }
}
