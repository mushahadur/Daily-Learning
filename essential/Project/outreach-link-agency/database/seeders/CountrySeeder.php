<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ExploreCountry;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [

            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Afghanistan',
                'code' => 'AF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Ã…land Islands',
                'code' => 'AX',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Albania',
                'code' => 'AL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Algeria',
                'code' => 'DZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'American Samoa',
                'code' => 'AS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Andorra',
                'code' => 'AD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Angola',
                'code' => 'AO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Anguilla',
                'code' => 'AI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Antarctica',
                'code' => 'AQ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Antigua and Barbuda',
                'code' => 'AG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Argentina',
                'code' => 'AR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Armenia',
                'code' => 'AM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Aruba',
                'code' => 'AW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Australia',
                'code' => 'AU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Austria',
                'code' => 'AT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Azerbaijan',
                'code' => 'AZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bahamas',
                'code' => 'BS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bahrain',
                'code' => 'BH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bangladesh',
                'code' => 'BD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Barbados',
                'code' => 'BB',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Belarus',
                'code' => 'BY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Belgium',
                'code' => 'BE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Belize',
                'code' => 'BZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Benin',
                'code' => 'BJ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bermuda',
                'code' => 'BM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bhutan',
                'code' => 'BT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bolivia, Plurinational State of',
                'code' => 'BO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bonaire, Sint Eustatius and Saba',
                'code' => 'BQ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bosnia and Herzegovina',
                'code' => 'BA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Botswana',
                'code' => 'BW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bouvet Island',
                'code' => 'BV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Brazil',
                'code' => 'BR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'British Indian Ocean Territory',
                'code' => 'IO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Brunei Darussalam',
                'code' => 'BN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Bulgaria',
                'code' => 'BG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Burkina Faso',
                'code' => 'BF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Burundi',
                'code' => 'BI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Cambodia',
                'code' => 'KH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Cameroon',
                'code' => 'CM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Canada',
                'code' => 'CA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Cape Verde',
                'code' => 'CV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Cayman Islands',
                'code' => 'KY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Central African Republic',
                'code' => 'CF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Chad',
                'code' => 'TD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Chile',
                'code' => 'CL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'China',
                'code' => 'CN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Christmas Island',
                'code' => 'CX',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Cocos (Keeling) Islands',
                'code' => 'CC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Colombia',
                'code' => 'CO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Comoros',
                'code' => 'KM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Congo',
                'code' => 'CG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Congo',
                'code' => 'CD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Cook Islands',
                'code' => 'CK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Costa Rica',
                'code' => 'CR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'CÃ´te d"Ivoire',
                'code' => 'CI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Croatia',
                'code' => 'HR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Cuba',
                'code' => 'CU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'CuraÃ§ao',
                'code' => 'CW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Cyprus',
                'code' => 'CY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Czech Republic',
                'code' => 'CZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Denmark',
                'code' => 'DK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Djibouti',
                'code' => 'DJ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Dominica',
                'code' => 'DM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Dominican Republic',
                'code' => 'DO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Ecuador',
                'code' => 'EC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Egypt',
                'code' => 'EG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'El Salvador',
                'code' => 'SV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Equatorial Guinea',
                'code' => 'GQ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Eritrea',
                'code' => 'ER',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Estonia',
                'code' => 'EE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Ethiopia',
                'code' => 'ET',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Falkland Islands (Malvinas)',
                'code' => 'FK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Faroe Islands',
                'code' => 'FO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Fiji',
                'code' => 'FJ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Finland',
                'code' => 'FI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'France',
                'code' => 'FR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'French Guiana',
                'code' => 'GF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'French Polynesia',
                'code' => 'PF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'French Southern Territories',
                'code' => 'TF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Gabon',
                'code' => 'GA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Gambia',
                'code' => 'GM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Georgia',
                'code' => 'GE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Germany',
                'code' => 'DE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Ghana',
                'code' => 'GH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Gibraltar',
                'code' => 'GI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Greece',
                'code' => 'GR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Greenland',
                'code' => 'GL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Grenada',
                'code' => 'GD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Guadeloupe',
                'code' => 'GP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Guam',
                'code' => 'GU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Guatemala',
                'code' => 'GT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Guernsey',
                'code' => 'GG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Guinea',
                'code' => 'GN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Guinea-Bissau',
                'code' => 'GW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Guyana',
                'code' => 'GY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Haiti',
                'code' => 'HT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Heard Island and McDonald Islands',
                'code' => 'HM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Holy See (Vatican City State)',
                'code' => 'VA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Honduras',
                'code' => 'HN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Hong Kong',
                'code' => 'HK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Hungary',
                'code' => 'HU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Iceland',
                'code' => 'IS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'India',
                'code' => 'IN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Indonesia',
                'code' => 'ID',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Iran',
                'code' => 'IR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Iraq',
                'code' => 'IQ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Ireland',
                'code' => 'IE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Isle of Man',
                'code' => 'IM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Israel',
                'code' => 'IL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Italy',
                'code' => 'IT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Jamaica',
                'code' => 'JM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Japan',
                'code' => 'JP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Jersey',
                'code' => 'JE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Jordan',
                'code' => 'JO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Kazakhstan',
                'code' => 'KZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Kenya',
                'code' => 'KE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Kiribati',
                'code' => 'KI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => "Korea, Democratic People's Republic of",
                'code' => 'KP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Korea, Republic of',
                'code' => 'KR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Kuwait',
                'code' => 'KW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Kyrgyzstan',
                'code' => 'KG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => "Lao People's Democratic Republic",
                'code' => 'LA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Latvia',
                'code' => 'LV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Lebanon',
                'code' => 'LB',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Lesotho',
                'code' => 'LS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Liberia',
                'code' => 'LR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Libya',
                'code' => 'LY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Liechtenstein',
                'code' => 'LI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Lithuania',
                'code' => 'LT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Luxembourg',
                'code' => 'LU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Macao',
                'code' => 'MO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Macedonia, the Former Yugoslav Republic of',
                'code' => 'MK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Madagascar',
                'code' => 'MG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Malawi',
                'code' => 'MW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Malaysia',
                'code' => 'MY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Maldives',
                'code' => 'MV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Mali',
                'code' => 'ML',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Malta',
                'code' => 'MT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Marshall Islands',
                'code' => 'MH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Martinique',
                'code' => 'MQ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Mauritania',
                'code' => 'MR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Mauritius',
                'code' => 'MU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Mayotte',
                'code' => 'YT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Mexico',
                'code' => 'MX',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Micronesia, Federated States of',
                'code' => 'FM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Moldova, Republic of',
                'code' => 'MD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Monaco',
                'code' => 'MC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Mongolia',
                'code' => 'MN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Montenegro',
                'code' => 'ME',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Montserrat',
                'code' => 'MS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Morocco',
                'code' => 'MA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Mozambique',
                'code' => 'MZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Myanmar',
                'code' => 'MM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Namibia',
                'code' => 'NA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Nauru',
                'code' => 'NR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Nepal',
                'code' => 'NP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Netherlands',
                'code' => 'NL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'New Caledonia',
                'code' => 'NC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'New Zealand',
                'code' => 'NZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Nicaragua',
                'code' => 'NI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Niger',
                'code' => 'NE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Nigeria',
                'code' => 'NG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Niue',
                'code' => 'NU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Norfolk Island',
                'code' => 'NF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Northern Mariana Islands',
                'code' => 'MP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Norway',
                'code' => 'NO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Oman',
                'code' => 'OM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Pakistan',
                'code' => 'PK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Palau',
                'code' => 'PW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Palestine, State of',
                'code' => 'PS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Panama',
                'code' => 'PA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Papua New Guinea',
                'code' => 'PG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Paraguay',
                'code' => 'PY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Peru',
                'code' => 'PE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Philippines',
                'code' => 'PH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Pitcairn',
                'code' => 'PN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Poland',
                'code' => 'PL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Portugal',
                'code' => 'PT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Puerto Rico',
                'code' => 'PR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Qatar',
                'code' => 'QA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'RÃ©union',
                'code' => 'RE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Romania',
                'code' => 'RO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Russian Federation',
                'code' => 'RU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Rwanda',
                'code' => 'RW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Saint BarthÃ©lemy',
                'code' => 'BL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Saint Helena, Ascension and Tristan da Cunha',
                'code' => 'SH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Saint Kitts and Nevis',
                'code' => 'KN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Saint Lucia',
                'code' => 'LC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Saint Martin (French part)',
                'code' => 'MF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Saint Pierre and Miquelon',
                'code' => 'PM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Saint Vincent and the Grenadines',
                'code' => 'VC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Samoa',
                'code' => 'WS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'San Marino',
                'code' => 'SM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Sao Tome and Principe',
                'code' => 'ST',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Saudi Arabia',
                'code' => 'SA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Senegal',
                'code' => 'SN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Serbia',
                'code' => 'RS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Seychelles',
                'code' => 'SC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Sierra Leone',
                'code' => 'SL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Singapore',
                'code' => 'SG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Sint Maarten (Dutch part)',
                'code' => 'SX',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Slovakia',
                'code' => 'SK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Slovenia',
                'code' => 'SI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Solomon Islands',
                'code' => 'SB',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Somalia',
                'code' => 'SO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'South Africa',
                'code' => 'ZA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'South Georgia and the South Sandwich Islands',
                'code' => 'GS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'South Sudan',
                'code' => 'SS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Spain',
                'code' => 'ES',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Sri Lanka',
                'code' => 'LK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Sudan',
                'code' => 'SD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Suriname',
                'code' => 'SR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Svalbard and Jan Mayen',
                'code' => 'SJ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Swaziland',
                'code' => 'SZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Sweden',
                'code' => 'SE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Switzerland',
                'code' => 'CH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Syrian Arab Republic',
                'code' => 'SY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Taiwan, Province of China',
                'code' => 'TW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Tajikistan',
                'code' => 'TJ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Tanzania, United Republic of',
                'code' => 'TZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Thailand',
                'code' => 'TH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Timor-Leste',
                'code' => 'TL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Togo',
                'code' => 'TG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Tokelau',
                'code' => 'TK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Tonga',
                'code' => 'TO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Trinidad and Tobago',
                'code' => 'TT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Tunisia',
                'code' => 'TN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Turkey',
                'code' => 'TR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Turkmenistan',
                'code' => 'TM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Turks and Caicos Islands',
                'code' => 'TC',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Tuvalu',
                'code' => 'TV',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Uganda',
                'code' => 'UG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Ukraine',
                'code' => 'UA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'United Arab Emirates',
                'code' => 'AE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'United Kingdom',
                'code' => 'GB',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'United States',
                'code' => 'US',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'United States Minor Outlying Islands',
                'code' => 'UM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Uruguay',
                'code' => 'UY',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Uzbekistan',
                'code' => 'UZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Vanuatu',
                'code' => 'VU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Venezuela, Bolivarian Republic of',
                'code' => 'VE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Viet Nam',
                'code' => 'VN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Virgin Islands, British',
                'code' => 'VG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Virgin Islands, U.S.',
                'code' => 'VI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Wallis and Futuna',
                'code' => 'WF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Western Sahara',
                'code' => 'EH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Yemen',
                'code' => 'YE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Zambia',
                'code' => 'ZM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Zimbabwe',
                'code' => 'ZW',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        ExploreCountry::insert($countries);
    }
}
