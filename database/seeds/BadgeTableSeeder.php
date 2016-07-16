<?php

use Illuminate\Database\Seeder;

class BadgeTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $badges = [
            [
                'name' => 'Abaddon',
                'slug' => 'abaddon',
                'order' => 1,
            ],

            [
                'name' => 'Acolyte',
                'slug' => 'acolyte',
            ],
            [
                'name' => 'Ada',
                'slug' => 'ada',
            ],
            [
                'name' => 'Aegis',
                'slug' => 'aegis',
            ],
            [
                'name' => 'Builder',
                'slug' => 'builder',
                'has_levels' => 1,
            ],
            [
                'name' => 'Connector',
                'slug' => 'connector',
                'has_levels' => 1,
            ],
            [
                'name' => 'Darsana',
                'slug' => 'darsana',
            ],
            [
                'name' => 'Edgar Allen Wright',
                'slug' => 'edgar-allan-wright',
            ],
            [
                'name' => 'Engineer',
                'slug' => 'engineer',
                'has_levels' => 1,
            ],
            [
                'name' => 'Eve',
                'slug' => 'eve',
            ],
            [
                'name' => 'Explorer',
                'slug' => 'explorer',
                'has_levels' => 1,
            ],
            [
                'name' => 'Founder',
                'slug' => 'founder',
            ],
            [
                'name' => 'GoRuck',
                'slug' => 'goruck',
            ],
            [
                'name' => 'GoRuck Stealth',
                'slug' => 'goruckstealth',
            ],
            [
                'name' => 'GoRuck Urban',
                'slug' => 'goruckurban',
            ],
            [
                'name' => 'Guardian',
                'slug' => 'guardian',
                'has_levels' => 1,
            ],
            [
                'name' => 'Hacker',
                'slug' => 'hacker',
                'has_levels' => 1,
            ],
            [
                'name' => 'Hank Johnson',
                'slug' => 'hank-johnson',
            ],
            [
                'name' => 'Helios',
                'slug' => 'helios',
            ],
            [
                'name' => 'Illuminator',
                'slug' => 'illuminator',
                'has_levels' => 1,
            ],
            [
                'name' => 'Initio',
                'slug' => 'initio',
            ],
            [
                'name' => 'Innovator',
                'slug' => 'innovator',
                'has_levels' => 1,
            ],
            [
                'name' => 'Interitus',
                'slug' => 'interitus',
            ],
            [
                'name' => 'Jahan',
                'slug' => 'jahan',
            ],
            [
                'name' => 'Klue',
                'slug' => 'klue',
            ],
            [
                'name' => 'Liberator',
                'slug' => 'liberator',
                'has_levels' => 1,
            ],
            [
                'name' => 'Mind Controller',
                'slug' => 'mindcontroller',
                'has_levels' => 1,
            ],
            [
                'name' => 'Mission Day',
                'slug' => 'missionday',
                'has_levels' => 1,
            ],
            [
                'name' => 'Nl 1331 1',
                'slug' => 'nl-1331-1',
            ],
            [
                'name' => 'Nl 1331 2',
                'slug' => 'nl-1331-2',
            ],
            [
                'name' => 'Obsidian',
                'slug' => 'obsidian',
            ],
            [
                'name' => 'Oliver Lynton Wolfe',
                'slug' => 'oliver-lynton-wolfe',
            ],
            [
                'name' => 'P A Chapeau',
                'slug' => 'P-a-chapeau',
            ],
            [
                'name' => 'Persepolis',
                'slug' => 'persepolis',
            ],
            [
                'name' => 'Pioneer',
                'slug' => 'pioneer',
                'has_levels' => 1,
            ],
            [
                'name' => 'Purifier',
                'slug' => 'purifier',
                'has_levels' => 1,
            ],
            [
                'name' => 'Recharger',
                'slug' => 'recharger',
                'has_levels' => 1,
            ],
            [
                'name' => 'Recruiter',
                'slug' => 'recruiter',
                'has_levels' => 1,
            ],
            [
                'name' => 'Recursion',
                'slug' => 'recursion',
            ],
            [
                'name' => 'Seer',
                'slug' => 'seer',
                'has_levels' => 1,
            ],
            [
                'name' => 'Shonin',
                'slug' => 'shonin',
            ],
            [
                'name' => 'Sojourner',
                'slug' => 'sojourner',
                'has_levels' => 1,
            ],
            [
                'name' => 'SpecOps',
                'slug' => 'specops',
                'has_levels' => 1,
            ],
            [
                'name' => 'Stella Vyctory',
                'slug' => 'stella-vyctory',
            ],
            [
                'name' => 'Susanna Moyer1',
                'slug' => 'susanna-moyer1',
            ],
            [
                'name' => 'Susanna Moyer2',
                'slug' => 'susanna-moyer2',
            ],
            [
                'name' => 'Translator',
                'slug' => 'translator',
                'has_levels' => 1,
            ],
            [
                'name' => 'Trekker',
                'slug' => 'trekker',
                'has_levels' => 1,
            ],
            [
                'name' => 'Vangaurd',
                'slug' => 'vanguard',
                'has_levels' => 1,
            ],
            [
                'name' => 'Verified',
                'slug' => 'verified',
            ],
        ];

        foreach($badges as $badge) {
            \Msenl\Badge::create($badge);
        }
    }
}
