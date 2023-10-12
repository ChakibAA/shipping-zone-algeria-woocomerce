<?php
/*

    Plugin Name: Shipping Zone Algeria Woocommerce
    Description: Add missing shiping zone from Algeria
    Version: 1.0
    Author: Chakib
    Author URI: https://www.linkedin.com/in/chakib-ammar-aouchiche-a25150220/
    License: GPL-2.0+
    License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if (!defined('ABSPATH')) {
    exit;
}



function is_woocommerce_active_algeria_shipping_zone()
{
    return in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')));
}

function woocommerce_inactive_notice_algeria_shipping_zone()
{
    ?>
    <div id="message" class="error">
        <p>

            <?php
            deactivate_plugins(plugin_basename(__FILE__));
            print_r(__('<b>WooCommerce</b> plugin must be active for <b>Shipping zone Algeria Woocomerce</b> to work. '));
            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
            ?>
        </p>
    </div>
    <?php
}

if (!is_woocommerce_active_algeria_shipping_zone()) {
    add_action('admin_notices', 'woocommerce_inactive_notice_algeria_shipping_zone');

    return;
} else {

    require_once plugin_dir_path(__FILE__) . 'wc-city-select/wc-city-select.php';

    add_filter('woocommerce_default_address_fields', 'custom_override_default_locale_fields');
    function custom_override_default_locale_fields($fields)
    {
        $fields['state']['priority'] = 45;
        $fields['city']['priority'] = 46;

        return $fields;
    }

    // Add missing states
    add_filter('woocommerce_states', 'algeria_shipping_zome');

    function algeria_shipping_zome($states)
    {

        $states['DZ'] = array(
            "DZ-01" => "Adrar",
            "DZ-02" => "Chlef",
            "DZ-03" => "Laghouat",
            "DZ-04" => "Oum El Bouaghi",
            "DZ-05" => "Batna",
            "DZ-06" => "Béjaïa",
            "DZ-07" => "Biskra",
            "DZ-08" => "Béchar",
            "DZ-09" => "Blida",
            "DZ-10" => "Bouira",
            "DZ-11" => "Tamanrasset",
            "DZ-12" => "Tébessa",
            "DZ-13" => "Tlemcen",
            "DZ-14" => "Tiaret",
            "DZ-15" => "Tizi Ouzou",
            "DZ-16" => "Alger",
            "DZ-17" => "Djelfa",
            "DZ-18" => "Jijel",
            "DZ-19" => "Sétif",
            "DZ-20" => "Saida",
            "DZ-21" => "Skikda",
            "DZ-22" => "Sidi Bel Abbès",
            "DZ-23" => "Annaba",
            "DZ-24" => "Guelma",
            "DZ-25" => "Constantine",
            "DZ-26" => "Médéa",
            "DZ-27" => "Mostaganem",
            "DZ-28" => "M'Sila",
            "DZ-29" => "Mascara",
            "DZ-30" => "Ouargla",
            "DZ-31" => "Oran",
            "DZ-32" => "El Bayadh",
            "DZ-33" => "Illizi",
            "DZ-34" => "Bordj Bou Arréridj",
            "DZ-35" => "Boumerdès",
            "DZ-36" => "El Tarf",
            "DZ-37" => "Tindouf",
            "DZ-38" => "Tissemsilt",
            "DZ-39" => "El Oued",
            "DZ-40" => "Khenchela",
            "DZ-41" => "Souk Ahras",
            "DZ-42" => "Tipaza",
            "DZ-43" => "Mila",
            "DZ-44" => "Aïn Defla",
            "DZ-45" => "Naâma",
            "DZ-46" => "Aïn Témouchent",
            "DZ-47" => "Ghardaïa",
            "DZ-48" => "Relizane",
            "DZ-49" => "Timimoun",
            "DZ-50" => "Bordj badji Mokhtar",
            "DZ-51" => "Ouled Djellal",
            "DZ-52" => "Béni Abbès",
            "DZ-53" => "In Salah",
            "DZ-54" => "In Guezzam",
            "DZ-55" => "Touggourt",
            "DZ-56" => "Djanet",
            "DZ-57" => "El M'Ghair",
            "DZ-58" => "El Meniaa",
        );

        return $states;

    }

    add_filter('wc_city_select_cities', 'my_cities');

    function my_cities($cities)
    {
        $cities['DZ'] = array(
            'DZ-01' => array(
                "Adrar",
                "Akabli",
                "Fenoughil",
                "In Ghar",
                "Reggane",
                "Tamentit",
                "Tamest"
            ),
            'DZ-02' => array(
                "Ain Merane",
                "Beni Haoua",
                "Boukadir",
                "Chettia",
                "El Karimia",
                "Harchoun",
                "Mazouna",
                "Oued Fodda",
                "Oued Goussine",
                "Ouled Ben Abdelkader",
                "Sidi Akkacha",
                "Sidi Abderrahmane",
                "Taougrite",
                "Tenes",
                "Zeboudja"
            ),
            'DZ-03' => array(
                "Aflou",
                "Brida",
                "El Assafia",
                "Hassi R'Mel",
                "Ksar El Hirane",
                "Laghouat",
                "Moulay Larbi",
                "Oued Morra",
                "Sebgag",
                "Tadjemout",
                "Taouiala",
                "Tamellaht",
                "Gueltat Sidi Saâd"
            ),
            'DZ-04' => array(
                "Aflou",
                "Brida",
                "El Assafia",
                "Hassi R'Mel",
                "Ksar El Hirane",
                "Laghouat",
                "Moulay Larbi",
                "Oued Morra",
                "Sebgag",
                "Tadjemout",
                "Taouiala",
                "Tamellaht",
                "Gueltat Sidi Saâd"
            ),
            'DZ-05' => array(
                "Tébessa",
                "Bir El-Ater",
                "Cheria",
                "El Ogla",
                "Bir El-Mokadem",
                "Morsott",
                "Negrine",
                "Ouenza",
                "El Ma Labiodh",
                "Bekkaria",
                "El-Aouinet",
                "Lahouidjbet",
                "Hammamet",
                "Ferkane",
                "Chougrani",
                "Oum Ali",
            ),
            'DZ-06' => array(
                "Béjaïa",
                "Amizour",
                "Aokas",
                "Barbacha",
                "Kherrata",
                "Seddouk",
                "Tazmalt",
                "Tichy",
                "Adekar",
                "Akbou",
                "Beni Maouche",
                "Chemini",
                "Darguina",
                "Ighil Ali",
                "Taskriout",
                "Timezrit",
            ),
            'DZ-07' => array(
                "Biskra",
                "Oumache",
                "Sidi Khaled",
                "M'Chouneche",
                "El Haouch",
                "Ain Naga",
                "Zeribet El Oued",
                "El Feidh",
                "Sidi Okba",
                "Doucen",
                "Chetma",
                "Ouled Djellal",
                "Foughala",
                "El Kantara",
                "El Outaya",
            ),
            'DZ-08' => array(
                "Béchar",
                "Béni Abbès",
                "Kénadsa",
                "Taghit",
                "Timoudi",
                "Igli",
                "Erg Ferradj",
                "Abadla",
                "Kerzaz",
                "Meridja",
                "Lahmar",
                "Boukaïs",
                "Fenoughil",
                "Mogheul",
            ),

            'DZ-09' => array(
                "Blida",
                "Chréa",
                "El Affroun",
                "Boufarik",
                "Larbaâ",
                "Oued El Alleug",
                "Ouled Yaïch",
                "Soumaâ",
                "Mouzaïa",
                "Ben Khéllil",
                "Meftah",
                "Bougara",
                "Bouinan",
            ),
            'DZ-10' => array(
                "Bouira",
                "Aïn Bessem",
                "Bechloul",
                "Bir Ghbalou",
                "Bordj Okhriss",
                "El Hachimia",
                "Haizer",
                "Kadiria",
                "Lakhdaria",
                "M'Chedallah",
                "Sour El-Ghozlane",
                "Souk El Khemis"
            ),
            'DZ-11' => array(
                "Tamanrasset",
                "In Ghar",
                "Tazrouk",
                "Idlès",
                "Tessalit",
            ),
            'DZ-12' => array(
                "Tébessa",
                "Bir El-Ater",
                "Cheria",
                "El Ogla",
                "Bir El-Mokadem",
                "Morsott",
                "Negrine",
                "Ouenza",
                "El Ma Labiodh",
                "Bekkaria",
                "El-Aouinet",
                "Lahouidjbet",
            ),
            'DZ-13' => array(
                "Tlemcen",
                "Aïn Tallout",
                "Aïn Fezza",
                "Beni Snous",
                "Bab El Assa",
                "Djebala",
                "El Fehoul",
                "Ghazaouet",
                "Hennaya",
                "Maghnia",
                "Marsa Ben M'Hidi",
                "Nedroma",
                "Ouled Mimoun",
                "Sebbaa Chioukh",
                "Sidi Abdelli",
                "Sidi Djillali",
                "Terni",
            ),
            'DZ-14' => array(
                "Tiaret",
                "Aïn Bouchekif",
                "Aïn Deheb",
                "Aïn El Hadid",
                "Aïn Kermes",
                "Aïn Zarit",
                "Bougara",
                "Dahmouni",
                "Frentena",
                "Ksar Chellala",
                "Mellakou",
                "Nador",
                "Oued Lili",
                "Rahouia",
            ),
            'DZ-15' => array(
                "Tizi Ouzou",
                "Azazga",
                "Béni Douala",
                "Béni Yenni",
                "Boghni",
                "Draâ Ben Khedda",
                "Draâ El Mizan",
                "Iferhounène",
                "Illoula Oumalou",
                "Larbaâ Nath Irathen",
                "Maâtkas",
                "Makouda",
                "Mekla",
                "Ouacif",
                "Ouadhias",
                "Ouaguenoun",
                "Tigzirt",
                "Tirmitine",
                "Aïn El Hammam",
                "Aït Yahia Moussa",
                "Akbil",
            ),
            'DZ-16' => array(
                "Alger Centre",
                "Bab El Oued",
                "Bir Mourad Raïs",
                "Birkhadem",
                "Bir Mourad Raïs",
                "Casbah",
                "El Harrach",
                "Hussein Dey",
                "Kouba",
                "Mohammadia",
                "Sidi M'Hamed",
                "Bir Mourad Raïs",
                "El Madania",
            ),
            'DZ-17' => array(
                "Djelfa",
                "Aïn Maabed",
                "Aïn Oussera",
                "Amoura",
                "Birine",
                "Birrou",
                "Deldoul",
                "El Guedid",
                "Faidh El Botma",
                "Hassi Bahbah",
                "M'liliha",
                "Sidi Ladjel",
            ),

            'DZ-18' => array(
                "Jijel",
                "El Aouana",
                "Taher",
                "Emir Abdelkader",
                "Chekfa",
                "El Milia",
                "Sidi Maarouf",
                "Settara",
                "Kaous",
                "Selma Benziada"
            ),
            'DZ-19' => array(
                "Sétif",
                "Aïn El Kébira",
                "Babor",
                "Béni Aziz",
                "Boudouaou",
                "Bougaâ",
                "Bousaada",
                "Bouti Sayah",
                "Djémila",
                "El Eulma",
                "El Ouricia",
                "Guelta Zerka",
                "Harbil",
                "Oued El Abtal",
                "Ouled Sabor",
                "Siga"
            ),
            'DZ-20' => array(
                "Saïda",
                "Aïn El Hadjar",
                "Aïn Sekhouna",
                "Sidi Amar",
                "Sidi Boubekeur",
                "Aïn Lahdjar",
                "Ouled Khaled",
                "Ouled Brahim",
                "Sidi M'Hamed Benaouda"
            ),
            'DZ-21' => array(
                "Skikda",
                "Aïn Kechra",
                "Azzaba",
                "Béni Zid",
                "Collo",
                "El Harrouch",
                "Ouled Attia",
                "Ramdane Djamel",
                "Salamandre",
                "Zitouna"
            ),
            'DZ-22' => array(
                "Sidi Bel Abbès",
                "Aïn Thrid",
                "Marhoum",
                "Ras El Ma",
                "Sidi Ali Benyoub",
                "Sidi Khaled",
                "Sidi Lahcene",
                "Sfisef",
                "Sidi Bel Abbès",
                "Télagh",
                "Tenira"
            ),
            'DZ-23' => array(
                "Annaba",
                "Aïn Berda",
                "Berrahal",
                "Chétaïbi",
                "El Bouni",
                "Oued El Aneb",
                "Seraïdi",
                "Tazoult",
                "Chorfa",
                "El Hadjar"
            ),
            'DZ-24' => array(
                "Guelma",
                "Aïn Ben Beida",
                "Bouchegouf",
                "Hammam N'Bails",
                "Héliopolis",
                "Medjez Amar",
                "Oued Zenati",
                "Roknia",
                "Tamlouka",
                "Hammam Debagh"
            ),
            'DZ-25' => array(
                "Constantine",
                "Aïn Abid",
                "Aïn Smara",
                "Béni Hamiden",
                "El Khroub",
                "Ibn Ziad",
                "Zighoud Youcef"
            ),
            'DZ-26' => array(
                "Médéa",
                "Aïn Boucif",
                "Berrouaghia",
                "Benchicao",
                "Kef Lakhdar",
                "Khams Djouamaa",
                "Ouled Antar",
                "Ouzera",
                "Seghouane"
            ),
            'DZ-27' => array(
                "Mostaganem",
                "Achaacha",
                "Hadjadj",
                "Kheïroun",
                "Mazagran",
                "Mesra",
                "Stidia",
                "Souaflia"
            ),
            'DZ-28' => array(
                "M'Sila",
                "Aïn El Hadjel",
                "Beni Ilmane",
                "Bou Saada",
                "Chellal",
                "El Mechira",
                "Hammam Dhalaa",
                "Khoubana"
            ),
            'DZ-29' => array(
                "Mascara",
                "Aïn Fekan",
                "Aïn Ferah",
                "El Ghomri",
                "Froha",
                "Ghriss",
                "Matemore",
                "Mohammadia",
                "Sidi Kada",
                "Tighennif",
                "Zelameta"
            ),
            'DZ-30' => array(
                "Ouargla",
                "Aïn Beïda",
                "El Hadjira",
                "Guémar",
                "Hassi Ben Abdellah",
                "Hassi Messaoud",
                "Ngoussa",
                "Sidi Slimane",
                "Taibet",
                "Témacine",
                "Touggourt"
            ),
            'DZ-31' => array(
                "Oran",
                "Aïn El Turk",
                "Arzew",
                "Bethioua",
                "Bir El Djir",
                "Boutlélis",
                "Es Sénia",
                "Gdyel",
                "Mers El Kébir",
                "Marsat El Hadjadj",
                "Oued Tlélat",
                "Sidi Ben Yebka",
            ),
            'DZ-32' => array(
                "El Bayadh",
                "Boualem",
                "El Abiodh Sidi Cheikh",
                "El Bnoud",
                "Rogassa",
            ),
            'DZ-33' => array(
                "Illizi",
                "Bordj Omar Driss",
                "Djanet",
            ),
            'DZ-34' => array(
                "Bordj Bou Arréridj",
                "Aïn Taghrout",
                "Belimour",
                "Bir Kasdali",
                "Bordj Ghdir",
                "El Anseur",
                "El Hamadia",
                "Khelil",
                "Kharrouba",
            ),
            'DZ-35' => array(
                "Boumerdès",
                "Baghlia",
                "Bordj Menaiel",
                "Corso",
                "Djinet",
                "Isser",
                "Larbâa",
                "Naciria",
                "Thénia",
                "Zemmouri",
            ),
            'DZ-36' => array(
                "El Tarf",
                "Aïn El Assel",
                "Bouhadjar",
                "Bouteldja",
                "El Aioun",
                "Hammam Beni Salah",
                "Lac des Oiseaux",
                "Oued Zitoun",
            ),
            'DZ-37' => array(
                "Tindouf",
                "Béni Abbes",
                "Maghnia",
                "Touggourt",
            ),
            'DZ-38' => array(
                "Tissemsilt",
                "Bordj Bou Naama",
                "Lazharia",
                "Theniet El Had",
                "Ouled Bessam",
                "Boucaid",
                "Lardjem",
            ),
            'DZ-39' => array(
                "El Oued",
                "Aïn Babouche",
                "Djamaa",
                "El Bayadh",
                "El Ogla",
                "Guemar",
                "Hassani Abdelkrim",
                "Hassani Abdelkrim",
                "Magrane",
                "Reguiba",
                "Sidi Amrane",
            ),
            'DZ-40' => array(
                "Khenchela",
                "Aïn Touila",
                "Babar",
                "Baghai",
                "Bendjedid",
                "Kais",
                "Khenchela",
                "M'sara",
                "Mtoussa",
                "Tamza",
            ),
            'DZ-41' => array(
                "Souk Ahras",
                "Aïn Kercha",
                "Bir Bouhouche",
                "Khedara",
                "M'daourouch",
                "Merahna",
                "Oued Keberit",
                "Ouled Driss",
                "Sedrata",
                "Taoura",
            ),
            'DZ-42' => array(
                "Tipaza",
                "Aïn Tagourait",
                "Bou Ismaïl",
                "Bou Haroun",
                "Cherchell",
                "Damous",
                "Gouraya",
                "Hadjout",
                "Khemisti",
                "Sidi Rached",
                "Sidi Amar",
            ),
            'DZ-43' => array(
                "Mila",
                "Aïn Beïda",
                "Aïn Mellouk",
                "Aïn Tine",
                "Bouhatem",
                "Chelghoum Laïd",
                "Ferdjioua",
                "Guelma",
                "Hamala",
                "Oued Athmenia",

            ),
            'DZ-44' => array(
                "Aïn Defla",
                "Aïn Lechiakh",
                "Aïn Soltane",
                "Aïn Torki",
                "Aïn Bouyahia",
                "Bathenay",
                "Djelida",
                "El Amra",
                "El Attaf",
                "Khemis Miliana",
                "Miliana",

            ),
            'DZ-45' => array(
                "Naâma",
                "Aïn Ben Khelil",
                "Asla",
                "Mecheria",
                "Sfissif",
                "Tiout",
            ),
            'DZ-46' => array(
                "Aïn Témouchent",
                "Aghlal",
                "Beni Saf",
                "El Amria",
                "El Malah",
                "Hadjadj",
                "Hammam Bou Hadjar",
                "Oulhaça El Gheraba",
                "Sidi Ben Adda",
                "Sidi Boumediene",

            ),
            'DZ-47' => array(
                "Ghardaïa",
                "Bérianne",
                "El Atteuf",
                "El Guerrara",
                "M'Zab",
            ),
            'DZ-48' => array(
                "Relizane",
                "Ammi Moussa",
                "Belaas",
                "Bendaoud",
                "Djidiouia",
                "El Guettar",
                "El Hamri",
                "Had Echkala",
                "Mazouna",
                "Oued Rhiou",
            ),

            'DZ-49' => array(
                "Timimoun",
                "Aougrout",
                "Tinerkouk",
                "Charouine"
            ),
            'DZ-50' => array(
                'Bordj Badji Mokhtar',
            ),
            'DZ-51' => array(
                "Ouled Djellal",
                "Sidi Khaled"
            ),
            'DZ-52' => array(
                "Béni Abbès",
                "Kerzaz",
                "El Ouata",
                "Tabelbala",
                "Ouled Khoudir",
                "Igli"
            ),
            'DZ-53' => array(
                "In Salah",
                "In Ghar"
            ),
            'DZ-54' => array(
                "In Guezzam",
                "Tin Zaouatine"

            ),
            'DZ-55' => array(
                "El hadjira",
                "Taibet",
                'Megarine',
                "Touggourt",
                'Tamacine'
            ),
            'DZ-56' => array(
                "Djanet"
            ),
            'DZ-57' => array(
                "El M'Ghair",
                "Djamaa"

            ),
            'DZ-58' => array(
                "El Menia",
                "Hassi Gara",
                "Hassi Fehal"

            ),

        );
        return $cities;
    }
}