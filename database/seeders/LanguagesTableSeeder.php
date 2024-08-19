<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Afrikaans',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Akan',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Albanian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Amharic',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Arabic',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Armenian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Azerbaijani',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Basque',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Belarusian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Bemba',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Bengali',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Bihari',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Bork',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Bosnian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Breton',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Bulgarian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Cambodian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Catalan',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Cherokee',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Chichewa',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            20 => 
            array (
                'id' => 21,
            'name' => 'Chinese (Simplified)',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            21 => 
            array (
                'id' => 22,
            'name' => 'Chinese (Traditional)',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Corsican',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Croatian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Czech',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Danish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Dutch',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Elmer Fudd',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'English',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Esperanto',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Estonian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Ewe',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Faroese',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Filipino',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Finnish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'French',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Frisian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Ga',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Galician',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Georgian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'German',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Greek',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Guarani',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Gujarati',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Hacker',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Haitian Creole',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Hausa',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Hawaiian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Hebrew',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Hindi',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Hungarian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Icelandic',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Igbo',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Indonesian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Interlingua',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Irish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Italian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Japanese',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Javanese',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Kannada',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Kazakh',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Kinyarwanda',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Kirundi',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Klingon',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Kongo',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Korean',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            66 => 
            array (
                'id' => 67,
            'name' => 'Krio (Sierra Leone)',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Kurdish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            68 => 
            array (
                'id' => 69,
            'name' => 'Kurdish (Soranî)',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Kyrgyz',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Laothian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Latin',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Latvian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Lingala',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Lithuanian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Lozi',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Luganda',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Luo',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Macedonian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Malagasy',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Malay',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Malayalam',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Maltese',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Maori',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Marathi',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Mauritian Creole',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Moldavian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Mongolian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Montenegrin',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Nepali',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Nigerian Pidgin',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Northern Sotho',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Norwegian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            93 => 
            array (
                'id' => 94,
            'name' => 'Norwegian (Nynorsk)',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Occitan',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Oriya',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Oromo',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Pashto',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Persian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Pirate',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Polish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            101 => 
            array (
                'id' => 102,
            'name' => 'Portuguese (Brazil)',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            102 => 
            array (
                'id' => 103,
            'name' => 'Portuguese (Portugal)',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Punjabi',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Quechua',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Romanian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Romansh',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Runyakitara',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Russian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Scots Gaelic',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Serbian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Serbo-Croatian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Sesotho',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Setswana',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Seychellois Creole',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Shona',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Sindhi',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Sinhalese',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Slovak',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Slovenian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Somali',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Spanish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            122 => 
            array (
                'id' => 123,
            'name' => 'Spanish (Latin American)',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Sundanese',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Swahili',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Swedish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Tajik',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Tamil',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Tatar',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Telugu',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Thai',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Tigrinya',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Tonga',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Tshiluba',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Tumbuka',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Turkish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Turkmen',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Twi',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Uighur',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Ukrainian',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Urdu',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Uzbek',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Vietnamese',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Welsh',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Wolof',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Xhosa',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Yiddish',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Yoruba',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Zulu',
                'created_at' => '2024-08-19 11:50:51',
                'updated_at' => '2024-08-19 11:50:51',
            ),
        ));
        
        
    }
}