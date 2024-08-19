<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Afghanistan',
                'iso_alpha3' => 'AFG',
                'region_id' => '034',
                'iso_alpha2' => 'AF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'Albania',
                'iso_alpha3' => 'ALB',
                'region_id' => '039',
                'iso_alpha2' => 'AL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            2 => 
            array (
                'id' => 10,
                'name' => 'Antarctica',
                'iso_alpha3' => 'ATA',
                'region_id' => '000',
                'iso_alpha2' => 'AQ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            3 => 
            array (
                'id' => 12,
                'name' => 'Algeria',
                'iso_alpha3' => 'DZA',
                'region_id' => '015',
                'iso_alpha2' => 'DZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            4 => 
            array (
                'id' => 16,
                'name' => 'American Samoa',
                'iso_alpha3' => 'ASM',
                'region_id' => '061',
                'iso_alpha2' => 'as',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            5 => 
            array (
                'id' => 20,
                'name' => 'Andorra',
                'iso_alpha3' => ' and ',
                'region_id' => '039',
                'iso_alpha2' => 'AD',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            6 => 
            array (
                'id' => 24,
                'name' => 'Angola',
                'iso_alpha3' => 'AGO',
                'region_id' => '017',
                'iso_alpha2' => 'AO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            7 => 
            array (
                'id' => 28,
                'name' => 'Antigua and Barbuda',
                'iso_alpha3' => 'ATG',
                'region_id' => '029',
                'iso_alpha2' => 'AG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            8 => 
            array (
                'id' => 31,
                'name' => 'Azerbaijan',
                'iso_alpha3' => 'AZE',
                'region_id' => '145',
                'iso_alpha2' => 'AZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            9 => 
            array (
                'id' => 32,
                'name' => 'Argentina',
                'iso_alpha3' => 'ARG',
                'region_id' => '005',
                'iso_alpha2' => 'AR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            10 => 
            array (
                'id' => 36,
                'name' => 'Australia',
                'iso_alpha3' => 'AUS',
                'region_id' => '053',
                'iso_alpha2' => 'AU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            11 => 
            array (
                'id' => 40,
                'name' => 'Austria',
                'iso_alpha3' => 'AUT',
                'region_id' => '155',
                'iso_alpha2' => 'AT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            12 => 
            array (
                'id' => 44,
                'name' => 'Bahamas',
                'iso_alpha3' => 'BHS',
                'region_id' => '029',
                'iso_alpha2' => 'BS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            13 => 
            array (
                'id' => 48,
                'name' => 'Bahrain',
                'iso_alpha3' => 'BHR',
                'region_id' => '145',
                'iso_alpha2' => 'BH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            14 => 
            array (
                'id' => 50,
                'name' => 'Bangladesh',
                'iso_alpha3' => 'BGD',
                'region_id' => '034',
                'iso_alpha2' => 'BD',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            15 => 
            array (
                'id' => 51,
                'name' => 'Armenia',
                'iso_alpha3' => 'ARM',
                'region_id' => '145',
                'iso_alpha2' => 'AM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            16 => 
            array (
                'id' => 52,
                'name' => 'Barbados',
                'iso_alpha3' => 'BRB',
                'region_id' => '029',
                'iso_alpha2' => 'BB',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            17 => 
            array (
                'id' => 56,
                'name' => 'Belgium',
                'iso_alpha3' => 'BEL',
                'region_id' => '155',
                'iso_alpha2' => 'BE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            18 => 
            array (
                'id' => 60,
                'name' => 'Bermuda',
                'iso_alpha3' => 'BMU',
                'region_id' => '021',
                'iso_alpha2' => 'BM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            19 => 
            array (
                'id' => 64,
                'name' => 'Bhutan',
                'iso_alpha3' => 'BTN',
                'region_id' => '034',
                'iso_alpha2' => 'BT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            20 => 
            array (
                'id' => 68,
            'name' => 'Bolivia(Plurinational State of)',
                'iso_alpha3' => 'BOL',
                'region_id' => '005',
                'iso_alpha2' => 'BO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            21 => 
            array (
                'id' => 70,
                'name' => 'Bosnia and Herzegovina',
                'iso_alpha3' => 'BIH',
                'region_id' => '039',
                'iso_alpha2' => 'BA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            22 => 
            array (
                'id' => 72,
                'name' => 'Botswana',
                'iso_alpha3' => 'BWA',
                'region_id' => '018',
                'iso_alpha2' => 'BW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            23 => 
            array (
                'id' => 74,
                'name' => 'Bouvet Island',
                'iso_alpha3' => 'BVT',
                'region_id' => '005',
                'iso_alpha2' => 'BV',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            24 => 
            array (
                'id' => 76,
                'name' => 'Brazil',
                'iso_alpha3' => 'BRA',
                'region_id' => '005',
                'iso_alpha2' => 'BR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            25 => 
            array (
                'id' => 84,
                'name' => 'Belize',
                'iso_alpha3' => 'BLZ',
                'region_id' => '013',
                'iso_alpha2' => 'BZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            26 => 
            array (
                'id' => 86,
                'name' => 'British Indian Ocean Territory',
                'iso_alpha3' => 'IOT',
                'region_id' => '014',
                'iso_alpha2' => 'IO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            27 => 
            array (
                'id' => 90,
                'name' => 'Solomon Islands',
                'iso_alpha3' => 'SLB',
                'region_id' => '054',
                'iso_alpha2' => 'SB',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            28 => 
            array (
                'id' => 92,
                'name' => 'British Virgin Islands',
                'iso_alpha3' => 'VGB',
                'region_id' => '029',
                'iso_alpha2' => 'VG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            29 => 
            array (
                'id' => 96,
                'name' => 'Brunei Darussalam',
                'iso_alpha3' => 'BRN',
                'region_id' => '035',
                'iso_alpha2' => 'BN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            30 => 
            array (
                'id' => 100,
                'name' => 'Bulgaria',
                'iso_alpha3' => 'BGR',
                'region_id' => '151',
                'iso_alpha2' => 'BG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            31 => 
            array (
                'id' => 104,
                'name' => 'Myanmar',
                'iso_alpha3' => 'MMR',
                'region_id' => '035',
                'iso_alpha2' => 'MM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            32 => 
            array (
                'id' => 108,
                'name' => 'Burundi',
                'iso_alpha3' => 'BDI',
                'region_id' => '014',
                'iso_alpha2' => 'BI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            33 => 
            array (
                'id' => 112,
                'name' => 'Belarus',
                'iso_alpha3' => 'BLR',
                'region_id' => '151',
                'iso_alpha2' => 'BY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            34 => 
            array (
                'id' => 116,
                'name' => 'Cambodia',
                'iso_alpha3' => 'KHM',
                'region_id' => '035',
                'iso_alpha2' => 'KH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            35 => 
            array (
                'id' => 120,
                'name' => 'Cameroon',
                'iso_alpha3' => 'CMR',
                'region_id' => '017',
                'iso_alpha2' => 'CM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            36 => 
            array (
                'id' => 124,
                'name' => 'Canada',
                'iso_alpha3' => 'CAN',
                'region_id' => '021',
                'iso_alpha2' => 'CA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            37 => 
            array (
                'id' => 132,
                'name' => 'Cabo Verde',
                'iso_alpha3' => 'CPV',
                'region_id' => '011',
                'iso_alpha2' => 'CV',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            38 => 
            array (
                'id' => 136,
                'name' => 'Cayman Islands',
                'iso_alpha3' => 'CYM',
                'region_id' => '029',
                'iso_alpha2' => 'KY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            39 => 
            array (
                'id' => 140,
                'name' => 'Central African Republic',
                'iso_alpha3' => 'CAF',
                'region_id' => '017',
                'iso_alpha2' => 'CF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            40 => 
            array (
                'id' => 144,
                'name' => 'Sri Lanka',
                'iso_alpha3' => 'LKA',
                'region_id' => '034',
                'iso_alpha2' => 'LK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            41 => 
            array (
                'id' => 148,
                'name' => 'Chad',
                'iso_alpha3' => 'TCD',
                'region_id' => '017',
                'iso_alpha2' => 'TD',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            42 => 
            array (
                'id' => 152,
                'name' => 'Chile',
                'iso_alpha3' => 'CHL',
                'region_id' => '005',
                'iso_alpha2' => 'CL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            43 => 
            array (
                'id' => 156,
                'name' => 'China',
                'iso_alpha3' => 'CHN',
                'region_id' => '030',
                'iso_alpha2' => 'CN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            44 => 
            array (
                'id' => 162,
                'name' => 'Christmas Island',
                'iso_alpha3' => 'CXR',
                'region_id' => '053',
                'iso_alpha2' => 'CX',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            45 => 
            array (
                'id' => 166,
            'name' => 'Cocos(Keeling) Islands',
                'iso_alpha3' => 'CCK',
                'region_id' => '053',
                'iso_alpha2' => 'CC',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            46 => 
            array (
                'id' => 170,
                'name' => 'Colombia',
                'iso_alpha3' => 'COL',
                'region_id' => '005',
                'iso_alpha2' => 'CO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            47 => 
            array (
                'id' => 174,
                'name' => 'Comoros',
                'iso_alpha3' => 'COM',
                'region_id' => '014',
                'iso_alpha2' => 'KM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            48 => 
            array (
                'id' => 175,
                'name' => 'Mayotte',
                'iso_alpha3' => 'MYT',
                'region_id' => '014',
                'iso_alpha2' => 'YT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            49 => 
            array (
                'id' => 178,
                'name' => 'Congo',
                'iso_alpha3' => 'COG',
                'region_id' => '017',
                'iso_alpha2' => 'CG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            50 => 
            array (
                'id' => 180,
                'name' => 'Democratic Republic of the Congo',
                'iso_alpha3' => 'COD',
                'region_id' => '017',
                'iso_alpha2' => 'CD',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            51 => 
            array (
                'id' => 184,
                'name' => 'Cook Islands',
                'iso_alpha3' => 'COK',
                'region_id' => '061',
                'iso_alpha2' => 'CK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            52 => 
            array (
                'id' => 188,
                'name' => 'Costa Rica',
                'iso_alpha3' => 'CRI',
                'region_id' => '013',
                'iso_alpha2' => 'CR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            53 => 
            array (
                'id' => 191,
                'name' => 'Croatia',
                'iso_alpha3' => 'HRV',
                'region_id' => '039',
                'iso_alpha2' => 'HR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            54 => 
            array (
                'id' => 192,
                'name' => 'Cuba',
                'iso_alpha3' => 'CUB',
                'region_id' => '029',
                'iso_alpha2' => 'CU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            55 => 
            array (
                'id' => 196,
                'name' => 'Cyprus',
                'iso_alpha3' => 'CYP',
                'region_id' => '145',
                'iso_alpha2' => 'CY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            56 => 
            array (
                'id' => 203,
                'name' => 'Czechia',
                'iso_alpha3' => 'CZE',
                'region_id' => '151',
                'iso_alpha2' => 'CZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            57 => 
            array (
                'id' => 204,
                'name' => 'Benin',
                'iso_alpha3' => 'BEN',
                'region_id' => '011',
                'iso_alpha2' => 'BJ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            58 => 
            array (
                'id' => 208,
                'name' => 'Denmark',
                'iso_alpha3' => 'DNK',
                'region_id' => '154',
                'iso_alpha2' => 'DK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            59 => 
            array (
                'id' => 212,
                'name' => 'Dominica',
                'iso_alpha3' => 'DMA',
                'region_id' => '029',
                'iso_alpha2' => 'DM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            60 => 
            array (
                'id' => 214,
                'name' => 'Dominican Republic',
                'iso_alpha3' => 'DOM',
                'region_id' => '029',
                'iso_alpha2' => 'do    ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            61 => 
            array (
                'id' => 218,
                'name' => 'Ecuador',
                'iso_alpha3' => 'ECU',
                'region_id' => '005',
                'iso_alpha2' => 'EC',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            62 => 
            array (
                'id' => 222,
                'name' => 'El Salvador',
                'iso_alpha3' => 'SLV',
                'region_id' => '013',
                'iso_alpha2' => 'SV',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            63 => 
            array (
                'id' => 226,
                'name' => 'Equatorial Guinea',
                'iso_alpha3' => 'GNQ',
                'region_id' => '017',
                'iso_alpha2' => 'GQ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            64 => 
            array (
                'id' => 231,
                'name' => 'Ethiopia',
                'iso_alpha3' => 'ETH',
                'region_id' => '014',
                'iso_alpha2' => 'ET',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            65 => 
            array (
                'id' => 232,
                'name' => 'Eritrea',
                'iso_alpha3' => 'ERI',
                'region_id' => '014',
                'iso_alpha2' => 'ER',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            66 => 
            array (
                'id' => 233,
                'name' => 'Estonia',
                'iso_alpha3' => 'EST',
                'region_id' => '154',
                'iso_alpha2' => 'EE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            67 => 
            array (
                'id' => 234,
                'name' => 'Faroe Islands',
                'iso_alpha3' => 'FRO',
                'region_id' => '154',
                'iso_alpha2' => 'FO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            68 => 
            array (
                'id' => 238,
            'name' => 'Falkland Islands(Malvinas)',
                'iso_alpha3' => 'FLK',
                'region_id' => '005',
                'iso_alpha2' => 'FK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            69 => 
            array (
                'id' => 239,
                'name' => 'South Georgia and the South Sandwich Islands',
                'iso_alpha3' => 'SGS',
                'region_id' => '005',
                'iso_alpha2' => 'GS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            70 => 
            array (
                'id' => 242,
                'name' => 'Fiji',
                'iso_alpha3' => 'FJI',
                'region_id' => '054',
                'iso_alpha2' => 'FJ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            71 => 
            array (
                'id' => 246,
                'name' => 'Finland',
                'iso_alpha3' => 'FIN',
                'region_id' => '154',
                'iso_alpha2' => 'FI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            72 => 
            array (
                'id' => 248,
                'name' => 'Åland Islands',
                'iso_alpha3' => 'ALA',
                'region_id' => '154',
                'iso_alpha2' => 'AX',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            73 => 
            array (
                'id' => 250,
                'name' => 'France',
                'iso_alpha3' => 'FRA',
                'region_id' => '155',
                'iso_alpha2' => 'FR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            74 => 
            array (
                'id' => 254,
                'name' => 'French Guiana',
                'iso_alpha3' => 'GUF',
                'region_id' => '005',
                'iso_alpha2' => 'GF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            75 => 
            array (
                'id' => 258,
                'name' => 'French Polynesia',
                'iso_alpha3' => 'PYF',
                'region_id' => '061',
                'iso_alpha2' => 'PF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            76 => 
            array (
                'id' => 260,
                'name' => 'French Southern Territories',
                'iso_alpha3' => 'ATF',
                'region_id' => '014',
                'iso_alpha2' => 'TF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            77 => 
            array (
                'id' => 262,
                'name' => 'Djibouti',
                'iso_alpha3' => 'DJI',
                'region_id' => '014',
                'iso_alpha2' => 'DJ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            78 => 
            array (
                'id' => 266,
                'name' => 'Gabon',
                'iso_alpha3' => 'GAB',
                'region_id' => '017',
                'iso_alpha2' => 'GA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            79 => 
            array (
                'id' => 268,
                'name' => 'Georgia',
                'iso_alpha3' => 'GEO',
                'region_id' => '145',
                'iso_alpha2' => 'GE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            80 => 
            array (
                'id' => 270,
                'name' => 'Gambia',
                'iso_alpha3' => 'GMB',
                'region_id' => '011',
                'iso_alpha2' => 'GM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            81 => 
            array (
                'id' => 275,
                'name' => 'State of Palestine',
                'iso_alpha3' => 'PSE',
                'region_id' => '145',
                'iso_alpha2' => 'PS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            82 => 
            array (
                'id' => 276,
                'name' => 'Germany',
                'iso_alpha3' => 'DEU',
                'region_id' => '155',
                'iso_alpha2' => 'DE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            83 => 
            array (
                'id' => 288,
                'name' => 'Ghana',
                'iso_alpha3' => 'GHA',
                'region_id' => '011',
                'iso_alpha2' => 'GH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            84 => 
            array (
                'id' => 292,
                'name' => 'Gibraltar',
                'iso_alpha3' => 'GIB',
                'region_id' => '039',
                'iso_alpha2' => 'GI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            85 => 
            array (
                'id' => 296,
                'name' => 'Kiribati',
                'iso_alpha3' => 'KIR',
                'region_id' => '057',
                'iso_alpha2' => 'KI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            86 => 
            array (
                'id' => 300,
                'name' => 'Greece',
                'iso_alpha3' => 'GRC',
                'region_id' => '039',
                'iso_alpha2' => 'GR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            87 => 
            array (
                'id' => 304,
                'name' => 'Greenland',
                'iso_alpha3' => 'GRL',
                'region_id' => '021',
                'iso_alpha2' => 'GL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            88 => 
            array (
                'id' => 308,
                'name' => 'Grenada',
                'iso_alpha3' => 'GRD',
                'region_id' => '029',
                'iso_alpha2' => 'GD',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            89 => 
            array (
                'id' => 312,
                'name' => 'Guadeloupe',
                'iso_alpha3' => 'GLP',
                'region_id' => '029',
                'iso_alpha2' => 'GP',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            90 => 
            array (
                'id' => 316,
                'name' => 'Guam',
                'iso_alpha3' => 'GUM',
                'region_id' => '057',
                'iso_alpha2' => 'GU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            91 => 
            array (
                'id' => 320,
                'name' => 'Guatemala',
                'iso_alpha3' => 'GTM',
                'region_id' => '013',
                'iso_alpha2' => 'GT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            92 => 
            array (
                'id' => 324,
                'name' => 'Guinea',
                'iso_alpha3' => 'GIN',
                'region_id' => '011',
                'iso_alpha2' => 'GN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            93 => 
            array (
                'id' => 328,
                'name' => 'Guyana',
                'iso_alpha3' => 'GUY',
                'region_id' => '005',
                'iso_alpha2' => 'GY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            94 => 
            array (
                'id' => 332,
                'name' => 'Haiti',
                'iso_alpha3' => 'HTI',
                'region_id' => '029',
                'iso_alpha2' => 'HT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            95 => 
            array (
                'id' => 334,
                'name' => 'Heard Island and McDonald Islands',
                'iso_alpha3' => 'HMD',
                'region_id' => '053',
                'iso_alpha2' => 'HM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            96 => 
            array (
                'id' => 336,
                'name' => 'Holy See',
                'iso_alpha3' => 'VAT',
                'region_id' => '039',
                'iso_alpha2' => 'VA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            97 => 
            array (
                'id' => 340,
                'name' => 'Honduras',
                'iso_alpha3' => 'HND',
                'region_id' => '013',
                'iso_alpha2' => 'HN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            98 => 
            array (
                'id' => 344,
                'name' => 'China, Hong Kong Special Administrative Region',
                'iso_alpha3' => 'HKG',
                'region_id' => '030',
                'iso_alpha2' => 'HK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            99 => 
            array (
                'id' => 348,
                'name' => 'Hungary',
                'iso_alpha3' => 'HUN',
                'region_id' => '151',
                'iso_alpha2' => 'HU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            100 => 
            array (
                'id' => 352,
                'name' => 'Iceland',
                'iso_alpha3' => 'ISL',
                'region_id' => '154',
                'iso_alpha2' => 'IS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            101 => 
            array (
                'id' => 356,
                'name' => 'India',
                'iso_alpha3' => 'IND',
                'region_id' => '034',
                'iso_alpha2' => 'IN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            102 => 
            array (
                'id' => 360,
                'name' => 'Indonesia',
                'iso_alpha3' => 'IDN',
                'region_id' => '035',
                'iso_alpha2' => 'ID',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            103 => 
            array (
                'id' => 364,
            'name' => 'Iran(Islamic Republic of)',
                'iso_alpha3' => 'IRN',
                'region_id' => '034',
                'iso_alpha2' => 'IR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            104 => 
            array (
                'id' => 368,
                'name' => 'Iraq',
                'iso_alpha3' => 'IRQ',
                'region_id' => '145',
                'iso_alpha2' => 'IQ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            105 => 
            array (
                'id' => 372,
                'name' => 'Ireland',
                'iso_alpha3' => 'IRL',
                'region_id' => '154',
                'iso_alpha2' => 'IE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            106 => 
            array (
                'id' => 376,
                'name' => 'Israel',
                'iso_alpha3' => 'ISR',
                'region_id' => '145',
                'iso_alpha2' => 'IL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            107 => 
            array (
                'id' => 380,
                'name' => 'Italy',
                'iso_alpha3' => 'ITA',
                'region_id' => '039',
                'iso_alpha2' => 'IT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            108 => 
            array (
                'id' => 384,
                'name' => 'Côte d’Ivoire',
                'iso_alpha3' => 'CIV',
                'region_id' => '011',
                'iso_alpha2' => 'CI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            109 => 
            array (
                'id' => 388,
                'name' => 'Jamaica',
                'iso_alpha3' => 'JAM',
                'region_id' => '029',
                'iso_alpha2' => 'JM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            110 => 
            array (
                'id' => 392,
                'name' => 'Japan',
                'iso_alpha3' => 'JPN',
                'region_id' => '030',
                'iso_alpha2' => 'JP',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            111 => 
            array (
                'id' => 398,
                'name' => 'Kazakhstan',
                'iso_alpha3' => 'KAZ',
                'region_id' => '143',
                'iso_alpha2' => 'KZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            112 => 
            array (
                'id' => 400,
                'name' => 'Jordan',
                'iso_alpha3' => 'JOR',
                'region_id' => '145',
                'iso_alpha2' => 'JO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            113 => 
            array (
                'id' => 404,
                'name' => 'Kenya',
                'iso_alpha3' => 'KEN',
                'region_id' => '014',
                'iso_alpha2' => 'KE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            114 => 
            array (
                'id' => 408,
                'name' => 'Democratic People\'s Republic of Korea',
                'iso_alpha3' => 'PRK',
                'region_id' => '030',
                'iso_alpha2' => 'KP',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            115 => 
            array (
                'id' => 410,
                'name' => 'Republic of Korea',
                'iso_alpha3' => 'KOR',
                'region_id' => '030',
                'iso_alpha2' => 'KR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            116 => 
            array (
                'id' => 414,
                'name' => 'Kuwait',
                'iso_alpha3' => 'KWT',
                'region_id' => '145',
                'iso_alpha2' => 'KW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            117 => 
            array (
                'id' => 417,
                'name' => 'Kyrgyzstan',
                'iso_alpha3' => 'KGZ',
                'region_id' => '143',
                'iso_alpha2' => 'KG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            118 => 
            array (
                'id' => 418,
                'name' => 'Lao People\'s Democratic Republic',
                'iso_alpha3' => 'LAO',
                'region_id' => '035',
                'iso_alpha2' => 'LA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            119 => 
            array (
                'id' => 422,
                'name' => 'Lebanon',
                'iso_alpha3' => 'LBN',
                'region_id' => '145',
                'iso_alpha2' => 'LB',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            120 => 
            array (
                'id' => 426,
                'name' => 'Lesotho',
                'iso_alpha3' => 'LSO',
                'region_id' => '018',
                'iso_alpha2' => 'LS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            121 => 
            array (
                'id' => 428,
                'name' => 'Latvia',
                'iso_alpha3' => 'LVA',
                'region_id' => '154',
                'iso_alpha2' => 'LV',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            122 => 
            array (
                'id' => 430,
                'name' => 'Liberia',
                'iso_alpha3' => 'LBR',
                'region_id' => '011',
                'iso_alpha2' => 'LR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            123 => 
            array (
                'id' => 434,
                'name' => 'Libya',
                'iso_alpha3' => 'LBY',
                'region_id' => '015',
                'iso_alpha2' => 'LY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            124 => 
            array (
                'id' => 438,
                'name' => 'Liechtenstein',
                'iso_alpha3' => 'LIE',
                'region_id' => '155',
                'iso_alpha2' => 'LI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            125 => 
            array (
                'id' => 440,
                'name' => 'Lithuania',
                'iso_alpha3' => 'LTU',
                'region_id' => '154',
                'iso_alpha2' => 'LT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            126 => 
            array (
                'id' => 442,
                'name' => 'Luxembourg',
                'iso_alpha3' => 'LUX',
                'region_id' => '155',
                'iso_alpha2' => 'LU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            127 => 
            array (
                'id' => 446,
                'name' => 'China, Macao Special Administrative Region',
                'iso_alpha3' => 'MAC',
                'region_id' => '030',
                'iso_alpha2' => 'MO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            128 => 
            array (
                'id' => 450,
                'name' => 'Madagascar',
                'iso_alpha3' => 'MDG',
                'region_id' => '014',
                'iso_alpha2' => 'MG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            129 => 
            array (
                'id' => 454,
                'name' => 'Malawi',
                'iso_alpha3' => 'MWI',
                'region_id' => '014',
                'iso_alpha2' => 'MW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            130 => 
            array (
                'id' => 458,
                'name' => 'Malaysia',
                'iso_alpha3' => 'MYS',
                'region_id' => '035',
                'iso_alpha2' => 'MY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            131 => 
            array (
                'id' => 462,
                'name' => 'Maldives',
                'iso_alpha3' => 'MDV',
                'region_id' => '034',
                'iso_alpha2' => 'MV',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            132 => 
            array (
                'id' => 466,
                'name' => 'Mali',
                'iso_alpha3' => 'MLI',
                'region_id' => '011',
                'iso_alpha2' => 'ML',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            133 => 
            array (
                'id' => 470,
                'name' => 'Malta',
                'iso_alpha3' => 'MLT',
                'region_id' => '039',
                'iso_alpha2' => 'MT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            134 => 
            array (
                'id' => 474,
                'name' => 'Martinique',
                'iso_alpha3' => 'MTQ',
                'region_id' => '029',
                'iso_alpha2' => 'MQ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            135 => 
            array (
                'id' => 478,
                'name' => 'Mauritania',
                'iso_alpha3' => 'MRT',
                'region_id' => '011',
                'iso_alpha2' => 'MR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            136 => 
            array (
                'id' => 480,
                'name' => 'Mauritius',
                'iso_alpha3' => 'MUS',
                'region_id' => '014',
                'iso_alpha2' => 'MU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            137 => 
            array (
                'id' => 484,
                'name' => 'Mexico',
                'iso_alpha3' => 'MEX',
                'region_id' => '013',
                'iso_alpha2' => 'MX',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            138 => 
            array (
                'id' => 492,
                'name' => 'Monaco',
                'iso_alpha3' => 'MCO',
                'region_id' => '155',
                'iso_alpha2' => 'MC',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            139 => 
            array (
                'id' => 496,
                'name' => 'Mongolia',
                'iso_alpha3' => 'MNG',
                'region_id' => '030',
                'iso_alpha2' => 'MN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            140 => 
            array (
                'id' => 498,
                'name' => 'Republic of Moldova',
                'iso_alpha3' => 'MDA',
                'region_id' => '151',
                'iso_alpha2' => 'MD',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            141 => 
            array (
                'id' => 499,
                'name' => 'Montenegro',
                'iso_alpha3' => 'MNE',
                'region_id' => '039',
                'iso_alpha2' => 'ME',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            142 => 
            array (
                'id' => 500,
                'name' => 'Montserrat',
                'iso_alpha3' => 'MSR',
                'region_id' => '029',
                'iso_alpha2' => 'MS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            143 => 
            array (
                'id' => 504,
                'name' => 'Morocco',
                'iso_alpha3' => 'MAR',
                'region_id' => '015',
                'iso_alpha2' => 'MA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            144 => 
            array (
                'id' => 508,
                'name' => 'Mozambique',
                'iso_alpha3' => 'MOZ',
                'region_id' => '014',
                'iso_alpha2' => 'MZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            145 => 
            array (
                'id' => 512,
                'name' => 'Oman',
                'iso_alpha3' => 'OMN',
                'region_id' => '145',
                'iso_alpha2' => 'OM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            146 => 
            array (
                'id' => 516,
                'name' => 'Namibia',
                'iso_alpha3' => 'NAM',
                'region_id' => '018',
                'iso_alpha2' => 'NA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            147 => 
            array (
                'id' => 520,
                'name' => 'Nauru',
                'iso_alpha3' => 'NRU',
                'region_id' => '057',
                'iso_alpha2' => 'NR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            148 => 
            array (
                'id' => 524,
                'name' => 'Nepal',
                'iso_alpha3' => 'NPL',
                'region_id' => '034',
                'iso_alpha2' => 'NP',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            149 => 
            array (
                'id' => 528,
                'name' => 'Netherlands',
                'iso_alpha3' => 'NLD',
                'region_id' => '155',
                'iso_alpha2' => 'NL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            150 => 
            array (
                'id' => 531,
                'name' => 'Curaçao',
                'iso_alpha3' => 'CUW',
                'region_id' => '029',
                'iso_alpha2' => 'CW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            151 => 
            array (
                'id' => 533,
                'name' => 'Aruba',
                'iso_alpha3' => 'ABW',
                'region_id' => '029',
                'iso_alpha2' => 'AW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            152 => 
            array (
                'id' => 534,
            'name' => 'Sint Maarten(Dutch part)',
                'iso_alpha3' => 'SXM',
                'region_id' => '029',
                'iso_alpha2' => 'SX',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            153 => 
            array (
                'id' => 535,
                'name' => 'Bonaire, Sint Eustatius and Saba',
                'iso_alpha3' => 'BES',
                'region_id' => '029',
                'iso_alpha2' => 'BQ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            154 => 
            array (
                'id' => 540,
                'name' => 'new Caledonia',
                'iso_alpha3' => 'NCL',
                'region_id' => '054',
                'iso_alpha2' => 'NC',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            155 => 
            array (
                'id' => 548,
                'name' => 'Vanuatu',
                'iso_alpha3' => 'VUT',
                'region_id' => '054',
                'iso_alpha2' => 'VU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            156 => 
            array (
                'id' => 554,
                'name' => 'new Zealand',
                'iso_alpha3' => 'NZL',
                'region_id' => '053',
                'iso_alpha2' => 'NZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            157 => 
            array (
                'id' => 558,
                'name' => 'Nicaragua',
                'iso_alpha3' => 'NIC',
                'region_id' => '013',
                'iso_alpha2' => 'NI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            158 => 
            array (
                'id' => 562,
                'name' => 'Niger',
                'iso_alpha3' => 'NER',
                'region_id' => '011',
                'iso_alpha2' => 'NE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            159 => 
            array (
                'id' => 566,
                'name' => 'Nigeria',
                'iso_alpha3' => 'NGA',
                'region_id' => '011',
                'iso_alpha2' => 'NG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            160 => 
            array (
                'id' => 570,
                'name' => 'Niue',
                'iso_alpha3' => 'NIU',
                'region_id' => '061',
                'iso_alpha2' => 'NU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            161 => 
            array (
                'id' => 574,
                'name' => 'Norfolk Island',
                'iso_alpha3' => 'NFK',
                'region_id' => '053',
                'iso_alpha2' => 'NF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            162 => 
            array (
                'id' => 578,
                'name' => 'Norway',
                'iso_alpha3' => 'NOR',
                'region_id' => '154',
                'iso_alpha2' => 'NO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            163 => 
            array (
                'id' => 580,
                'name' => 'Northern Mariana Islands',
                'iso_alpha3' => 'MNP',
                'region_id' => '057',
                'iso_alpha2' => 'MP',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            164 => 
            array (
                'id' => 581,
                'name' => 'United States Minor Outlying Islands',
                'iso_alpha3' => 'UMI',
                'region_id' => '057',
                'iso_alpha2' => 'UM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            165 => 
            array (
                'id' => 583,
            'name' => 'Micronesia(Federated States of)',
                'iso_alpha3' => 'FSM',
                'region_id' => '057',
                'iso_alpha2' => 'FM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            166 => 
            array (
                'id' => 584,
                'name' => 'Marshall Islands',
                'iso_alpha3' => 'MHL',
                'region_id' => '057',
                'iso_alpha2' => 'MH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            167 => 
            array (
                'id' => 585,
                'name' => 'Palau',
                'iso_alpha3' => 'PLW',
                'region_id' => '057',
                'iso_alpha2' => 'PW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            168 => 
            array (
                'id' => 586,
                'name' => 'Pakistan',
                'iso_alpha3' => 'PAK',
                'region_id' => '034',
                'iso_alpha2' => 'PK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            169 => 
            array (
                'id' => 591,
                'name' => 'Panama',
                'iso_alpha3' => 'PAN',
                'region_id' => '013',
                'iso_alpha2' => 'PA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            170 => 
            array (
                'id' => 598,
                'name' => 'Papua new Guinea',
                'iso_alpha3' => 'PNG',
                'region_id' => '054',
                'iso_alpha2' => 'PG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            171 => 
            array (
                'id' => 600,
                'name' => 'Paraguay',
                'iso_alpha3' => 'PRY',
                'region_id' => '005',
                'iso_alpha2' => 'PY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            172 => 
            array (
                'id' => 604,
                'name' => 'Peru',
                'iso_alpha3' => 'PER',
                'region_id' => '005',
                'iso_alpha2' => 'PE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            173 => 
            array (
                'id' => 608,
                'name' => 'Philippines',
                'iso_alpha3' => 'PHL',
                'region_id' => '035',
                'iso_alpha2' => 'PH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            174 => 
            array (
                'id' => 612,
                'name' => 'Pitcairn',
                'iso_alpha3' => 'PCN',
                'region_id' => '061',
                'iso_alpha2' => 'PN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            175 => 
            array (
                'id' => 616,
                'name' => 'Poland',
                'iso_alpha3' => 'POL',
                'region_id' => '151',
                'iso_alpha2' => 'PL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            176 => 
            array (
                'id' => 620,
                'name' => 'Portugal',
                'iso_alpha3' => 'PRT',
                'region_id' => '039',
                'iso_alpha2' => 'PT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            177 => 
            array (
                'id' => 624,
                'name' => 'Guinea-Bissau',
                'iso_alpha3' => 'GNB',
                'region_id' => '011',
                'iso_alpha2' => 'GW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            178 => 
            array (
                'id' => 626,
                'name' => 'Timor - Leste',
                'iso_alpha3' => 'TLS',
                'region_id' => '035',
                'iso_alpha2' => 'TL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            179 => 
            array (
                'id' => 630,
                'name' => 'Puerto Rico',
                'iso_alpha3' => 'PRI',
                'region_id' => '029',
                'iso_alpha2' => 'PR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            180 => 
            array (
                'id' => 634,
                'name' => 'Qatar',
                'iso_alpha3' => 'QAT',
                'region_id' => '145',
                'iso_alpha2' => 'QA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            181 => 
            array (
                'id' => 638,
                'name' => 'Réunion',
                'iso_alpha3' => 'REU',
                'region_id' => '014',
                'iso_alpha2' => 'RE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            182 => 
            array (
                'id' => 642,
                'name' => 'Romania',
                'iso_alpha3' => 'ROU',
                'region_id' => '151',
                'iso_alpha2' => 'RO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            183 => 
            array (
                'id' => 643,
                'name' => 'Russian Federation',
                'iso_alpha3' => 'RUS',
                'region_id' => '151',
                'iso_alpha2' => 'RU',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            184 => 
            array (
                'id' => 646,
                'name' => 'Rwanda',
                'iso_alpha3' => 'RWA',
                'region_id' => '014',
                'iso_alpha2' => 'RW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            185 => 
            array (
                'id' => 652,
                'name' => 'Saint Barthélemy',
                'iso_alpha3' => 'BLM',
                'region_id' => '029',
                'iso_alpha2' => 'BL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            186 => 
            array (
                'id' => 654,
                'name' => 'Saint Helena',
                'iso_alpha3' => 'SHN',
                'region_id' => '011',
                'iso_alpha2' => 'SH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            187 => 
            array (
                'id' => 659,
                'name' => 'Saint Kitts and Nevis',
                'iso_alpha3' => 'KNA',
                'region_id' => '029',
                'iso_alpha2' => 'KN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            188 => 
            array (
                'id' => 660,
                'name' => 'Anguilla',
                'iso_alpha3' => 'AIA',
                'region_id' => '029',
                'iso_alpha2' => 'AI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            189 => 
            array (
                'id' => 662,
                'name' => 'Saint Lucia',
                'iso_alpha3' => 'LCA',
                'region_id' => '029',
                'iso_alpha2' => 'LC',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            190 => 
            array (
                'id' => 663,
            'name' => 'Saint Martin(French Part)',
                'iso_alpha3' => 'MAF',
                'region_id' => '029',
                'iso_alpha2' => 'MF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            191 => 
            array (
                'id' => 666,
                'name' => 'Saint Pierre and Miquelon',
                'iso_alpha3' => 'SPM',
                'region_id' => '021',
                'iso_alpha2' => 'PM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            192 => 
            array (
                'id' => 670,
                'name' => 'Saint Vincent and the Grenadines',
                'iso_alpha3' => 'VCT',
                'region_id' => '029',
                'iso_alpha2' => 'VC',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            193 => 
            array (
                'id' => 674,
                'name' => 'San Marino',
                'iso_alpha3' => 'SMR',
                'region_id' => '039',
                'iso_alpha2' => 'SM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            194 => 
            array (
                'id' => 678,
                'name' => 'Sao Tome and Principe',
                'iso_alpha3' => 'STP',
                'region_id' => '017',
                'iso_alpha2' => 'ST',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            195 => 
            array (
                'id' => 680,
                'name' => 'Sark',
                'iso_alpha3' => '',
                'region_id' => '830',
                'iso_alpha2' => '',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            196 => 
            array (
                'id' => 682,
                'name' => 'Saudi Arabia',
                'iso_alpha3' => 'SAU',
                'region_id' => '145',
                'iso_alpha2' => 'SA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            197 => 
            array (
                'id' => 686,
                'name' => 'Senegal',
                'iso_alpha3' => 'SEN',
                'region_id' => '011',
                'iso_alpha2' => 'SN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            198 => 
            array (
                'id' => 688,
                'name' => 'Serbia',
                'iso_alpha3' => 'SRB',
                'region_id' => '039',
                'iso_alpha2' => 'RS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            199 => 
            array (
                'id' => 690,
                'name' => 'Seychelles',
                'iso_alpha3' => 'SYC',
                'region_id' => '014',
                'iso_alpha2' => 'SC',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            200 => 
            array (
                'id' => 694,
                'name' => 'Sierra Leone',
                'iso_alpha3' => 'SLE',
                'region_id' => '011',
                'iso_alpha2' => 'SL',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            201 => 
            array (
                'id' => 702,
                'name' => 'Singapore',
                'iso_alpha3' => 'SGP',
                'region_id' => '035',
                'iso_alpha2' => 'SG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            202 => 
            array (
                'id' => 703,
                'name' => 'Slovakia',
                'iso_alpha3' => 'SVK',
                'region_id' => '151',
                'iso_alpha2' => 'SK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            203 => 
            array (
                'id' => 704,
                'name' => 'Viet Nam',
                'iso_alpha3' => 'VNM',
                'region_id' => '035',
                'iso_alpha2' => 'VN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            204 => 
            array (
                'id' => 705,
                'name' => 'Slovenia',
                'iso_alpha3' => 'SVN',
                'region_id' => '039',
                'iso_alpha2' => 'SI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            205 => 
            array (
                'id' => 706,
                'name' => 'Somalia',
                'iso_alpha3' => 'SOM',
                'region_id' => '014',
                'iso_alpha2' => 'SO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            206 => 
            array (
                'id' => 710,
                'name' => 'South Africa',
                'iso_alpha3' => 'ZAF',
                'region_id' => '018',
                'iso_alpha2' => 'ZA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            207 => 
            array (
                'id' => 716,
                'name' => 'Zimbabwe',
                'iso_alpha3' => 'ZWE',
                'region_id' => '014',
                'iso_alpha2' => 'ZW',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            208 => 
            array (
                'id' => 724,
                'name' => 'Spain',
                'iso_alpha3' => 'ESP',
                'region_id' => '039',
                'iso_alpha2' => 'ES',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            209 => 
            array (
                'id' => 728,
                'name' => 'South Sudan',
                'iso_alpha3' => 'SSD',
                'region_id' => '014',
                'iso_alpha2' => 'SS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            210 => 
            array (
                'id' => 729,
                'name' => 'Sudan',
                'iso_alpha3' => 'SDN',
                'region_id' => '015',
                'iso_alpha2' => 'SD',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            211 => 
            array (
                'id' => 732,
                'name' => 'Western Sahara',
                'iso_alpha3' => 'ESH',
                'region_id' => '015',
                'iso_alpha2' => 'EH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            212 => 
            array (
                'id' => 740,
                'name' => 'Suriname',
                'iso_alpha3' => 'SUR',
                'region_id' => '005',
                'iso_alpha2' => 'SR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            213 => 
            array (
                'id' => 744,
                'name' => 'Svalbard and Jan Mayen Islands',
                'iso_alpha3' => 'SJM',
                'region_id' => '154',
                'iso_alpha2' => 'SJ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            214 => 
            array (
                'id' => 748,
                'name' => 'Eswatini',
                'iso_alpha3' => 'SWZ',
                'region_id' => '018',
                'iso_alpha2' => 'SZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            215 => 
            array (
                'id' => 752,
                'name' => 'Sweden',
                'iso_alpha3' => 'SWE',
                'region_id' => '154',
                'iso_alpha2' => 'SE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            216 => 
            array (
                'id' => 756,
                'name' => 'Switzerland',
                'iso_alpha3' => 'CHE',
                'region_id' => '155',
                'iso_alpha2' => 'CH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            217 => 
            array (
                'id' => 760,
                'name' => 'Syrian Arab Republic',
                'iso_alpha3' => 'SYR',
                'region_id' => '145',
                'iso_alpha2' => 'SY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            218 => 
            array (
                'id' => 762,
                'name' => 'Tajikistan',
                'iso_alpha3' => 'TJK',
                'region_id' => '143',
                'iso_alpha2' => 'TJ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            219 => 
            array (
                'id' => 764,
                'name' => 'Thailand',
                'iso_alpha3' => 'THA',
                'region_id' => '035',
                'iso_alpha2' => 'TH',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            220 => 
            array (
                'id' => 768,
                'name' => 'Togo',
                'iso_alpha3' => 'TGO',
                'region_id' => '011',
                'iso_alpha2' => 'TG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            221 => 
            array (
                'id' => 772,
                'name' => 'Tokelau',
                'iso_alpha3' => 'TKL',
                'region_id' => '061',
                'iso_alpha2' => 'TK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            222 => 
            array (
                'id' => 776,
                'name' => 'Tonga',
                'iso_alpha3' => 'TON',
                'region_id' => '061',
                'iso_alpha2' => 'TO',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            223 => 
            array (
                'id' => 780,
                'name' => 'Trinidad and Tobago',
                'iso_alpha3' => 'TTO',
                'region_id' => '029',
                'iso_alpha2' => 'TT',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            224 => 
            array (
                'id' => 784,
                'name' => 'United Arab Emirates',
                'iso_alpha3' => 'ARE',
                'region_id' => '145',
                'iso_alpha2' => 'AE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            225 => 
            array (
                'id' => 788,
                'name' => 'Tunisia',
                'iso_alpha3' => 'TUN',
                'region_id' => '015',
                'iso_alpha2' => 'TN',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            226 => 
            array (
                'id' => 792,
                'name' => 'Türkiye',
                'iso_alpha3' => 'TUR',
                'region_id' => '145',
                'iso_alpha2' => 'TR',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            227 => 
            array (
                'id' => 795,
                'name' => 'Turkmenistan',
                'iso_alpha3' => 'TKM',
                'region_id' => '143',
                'iso_alpha2' => 'TM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            228 => 
            array (
                'id' => 796,
                'name' => 'Turks and Caicos Islands',
                'iso_alpha3' => 'TCA',
                'region_id' => '029',
                'iso_alpha2' => 'TC',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            229 => 
            array (
                'id' => 798,
                'name' => 'Tuvalu',
                'iso_alpha3' => 'TUV',
                'region_id' => '061',
                'iso_alpha2' => 'TV',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            230 => 
            array (
                'id' => 800,
                'name' => 'Uganda',
                'iso_alpha3' => 'UGA',
                'region_id' => '014',
                'iso_alpha2' => 'UG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            231 => 
            array (
                'id' => 804,
                'name' => 'Ukraine',
                'iso_alpha3' => 'UKR',
                'region_id' => '151',
                'iso_alpha2' => 'UA',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            232 => 
            array (
                'id' => 807,
                'name' => 'North Macedonia',
                'iso_alpha3' => 'MKD',
                'region_id' => '039',
                'iso_alpha2' => 'MK',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            233 => 
            array (
                'id' => 818,
                'name' => 'Egypt',
                'iso_alpha3' => 'EGY',
                'region_id' => '015',
                'iso_alpha2' => 'EG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            234 => 
            array (
                'id' => 826,
                'name' => 'United Kingdom of Great Britain and Northern Ireland',
                'iso_alpha3' => 'GBR',
                'region_id' => '154',
                'iso_alpha2' => 'GB',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            235 => 
            array (
                'id' => 831,
                'name' => 'Guernsey',
                'iso_alpha3' => 'GGY',
                'region_id' => '830',
                'iso_alpha2' => 'GG',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            236 => 
            array (
                'id' => 832,
                'name' => 'Jersey',
                'iso_alpha3' => 'JEY',
                'region_id' => '830',
                'iso_alpha2' => 'JE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            237 => 
            array (
                'id' => 833,
                'name' => 'Isle of Man',
                'iso_alpha3' => 'IMN',
                'region_id' => '154',
                'iso_alpha2' => 'IM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            238 => 
            array (
                'id' => 834,
                'name' => 'United Republic of Tanzania',
                'iso_alpha3' => 'TZA',
                'region_id' => '014',
                'iso_alpha2' => 'TZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            239 => 
            array (
                'id' => 840,
                'name' => 'United States of America',
                'iso_alpha3' => 'USA',
                'region_id' => '021',
                'iso_alpha2' => 'US',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            240 => 
            array (
                'id' => 850,
                'name' => 'United States Virgin Islands',
                'iso_alpha3' => 'VIR',
                'region_id' => '029',
                'iso_alpha2' => 'VI',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            241 => 
            array (
                'id' => 854,
                'name' => 'Burkina Faso',
                'iso_alpha3' => 'BFA',
                'region_id' => '011',
                'iso_alpha2' => 'BF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            242 => 
            array (
                'id' => 858,
                'name' => 'Uruguay',
                'iso_alpha3' => 'URY',
                'region_id' => '005',
                'iso_alpha2' => 'UY',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            243 => 
            array (
                'id' => 860,
                'name' => 'Uzbekistan',
                'iso_alpha3' => 'UZB',
                'region_id' => '143',
                'iso_alpha2' => 'UZ',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            244 => 
            array (
                'id' => 862,
            'name' => 'Venezuela (Bolivarian Republic of)',
                'iso_alpha3' => 'VEN',
                'region_id' => '005',
                'iso_alpha2' => 'VE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            245 => 
            array (
                'id' => 876,
                'name' => 'Wallis and Futuna Islands',
                'iso_alpha3' => 'WLF',
                'region_id' => '061',
                'iso_alpha2' => 'WF',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            246 => 
            array (
                'id' => 882,
                'name' => 'Samoa',
                'iso_alpha3' => 'WSM',
                'region_id' => '061',
                'iso_alpha2' => 'WS',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            247 => 
            array (
                'id' => 887,
                'name' => 'Yemen',
                'iso_alpha3' => 'YEM',
                'region_id' => '145',
                'iso_alpha2' => 'YE',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
            248 => 
            array (
                'id' => 894,
                'name' => 'Zambia',
                'iso_alpha3' => 'ZMB',
                'region_id' => '014',
                'iso_alpha2' => 'ZM',
                'created_at' => '2023-06-15 20:46:08',
                'updated_at' => '2023-06-15 20:46:08',
            ),
        ));
        
        
    }
}