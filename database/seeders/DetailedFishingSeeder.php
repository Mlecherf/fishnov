<?php

namespace Database\Seeders;

use App\Models\DetailedFishing;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DetailedFishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $fish_list = 
        [
            "Able de Heckel",
            "Ablette",
            "Achigan de mer",
            "Aiglefin",
            "Aiguillat commun",
            "Aiguillat noir",
            "Alose",
            "Anguille",
            "Apogon",
            "Anchois",
            "Amour blanc",
            "Apron du Rhône",
            "Aspe",
            "Baliste",
            "Bar ou loup de mer",
            "Bar blanc",
            "Barbeau",
            "Barracuda",
            "Bardot (appelé aussi « colin » ou « merlu »)",
            "Baudroie",
            "Baudroie abyssale de Johnson",
            "Baudroie commune",
            "Baudroie d’Amérique",
            "Baudroie des abysses",
            "Blanchet",
            "Blageon",
            "Bogue",
            "Bonite",
            "Bouvière",
            "Brème",
            "Brochet",
            "Blade",
            "Beaux yeux ou dorade rose",
            "Billard ou maquereau espagnol",
            "Black-Bass",
            "Blennie ou bavarelle",
            "Brosme",
            "Cabillaud",
            "Capelan",
            "Capret",
            "Carassin",
            "Carassin doré dit « poisson rouge »",
            "Cardine franche",
            "Carpe",
            "Carrelet",
            "Castagnole",
            "Cernier (poissons du genre Polyprion)",
            "Chabot",
            "Chapon",
            "Chat",
            "Chevesne",
            "Claresse",
            "Colin (nom générique de plusieurs poissons d'eau de mer)",
            "Congre",
            "Corb",
            "Corégone",
            "Coryphène",
            "Courbine (appelé aussi « maigre » et « grogneur »)",
            "Crénilabre",
            "Cyprinodonte",
            "Daubenet",
            "Denti",
            "Dorade",
            "Doré jaune",
            "Dormelle",
            "Dragonnet",
            "Églefin (famille de la morue )",
            "Elbot (nom commercial du flétan séché et salé)",
            "Éperlan",
            "Épinoche",
            "Épinochette",
            "Équille",
            "Escolier",
            "Espadon",
            "Esturgeon (Acipenser sturio)",
            "Fanfre",
            "Flétan",
            "Gallinette",
            "Gardon",
            "Girelle",
            "Gobie",
            "Gobio",
            "Goret",
            "Gorette",
            "Goujon",
            "Grand-gueule",
            "Grémille",
            "Grenadier",
            "Grenadier de roche",
            "Grondin",
            "Guppy",
            "Hotu",
            "Hareng",
            "Hippocampe",
            "Huchon",
            "Ide mélanote",
            "Ibaïa (Sénégal)",
            "Julienne ou linue ou lingue",
            "Labre",
            "Lamproie",
            "Lançon",
            "Liche",
            "Lieu appelé aussi « merlu » ou « colin » ou « bardot »",
            "Lieu jaune",
            "Lieu noir",
            "Limande",
            "Lingue ou julienne ou linue",
            "Loche (nom générique commun à de nombreux poissons de fond)",
            "Lompe",
            "Loquette d'Europe",
            "Lorette",
            "Lotte",
            "Loubine",
            "Loup de mer",
            "Mâchoiron",
            "Maigre",
            "Makaire",
            "Mako",
            "Malachigan",
            "Mandoule (en)",
            "Maquereau",
            "Maraîche ou requin-taupe",
            "Marbré",
            "Marigane noire",
            "Marlin",
            "Maskinongé",
            "Ménomini rond",
            "Merlan",
            "Merlu ou merluche",
            "Mérou",
            "Merval",
            "Meunier",
            "Mirandelle",
            "Môle",
            "Mora",
            "Morue",
            "Motelle",
            "Muge",
            "Mulet",
            "Murène",
            "mehdia",
            "Napoléon",
            "Oblade",
            "Omble chevalier",
            "Omble de fontaine1",
            "Ombre",
            "Opah",
            "Ouananiche",
            "Pageot",
            "Pagre",
            "Panga",
            "Pataclet",
            "Perche",
            "Perche du Nil",
            "Phrynorhombe",
            "Piranha",
            "Plie",
            "Poisson-chat",
            "Poisson-chien",
            "Poisson clown",
            "Poisson-coffre",
            "Poisson lanterne",
            "Poisson-lune Ce lien renvoie vers une page d'homonymie",
            "Poisson-pilote",
            "Poisson rouge",
            "Poisson zèbre",
            "Raie",
            "Rascasse",
            "Rason",
            "Rémora commun",
            "Requin",
            "Requin pèlerin",
            "Requin marteau",
            "Requin blanc",
            "Requin-taureau",
            "Requin-baleine",
            "Requin-tigre",
            "Requin-nourrice",
            "Requin gris",
            "Requin à pointes noires",
            "Rondin",
            "Rotengle",
            "Roucaou",
            "Rouget",
            "Roussette",
            "Rouvet",
            "Saint-pierre",
            "Sandre",
            "Sar",
            "Sardine",
            "Sériole",
            "Sarran ou Serran commun",
            "Saumon",
            "Saupe",
            "Sébaste",
            "Séverau",
            "Silure",
            "Sigan Corail",
            "Sole",
            "Sprat",
            "Tacaud",
            "Tanche",
            "Tanche-tautogue",
            "Tanude",
            "Targeur",
            "Tassergal",
            "Tautogue noir",
            "Tétraodon",
            "Thazard (poissons de la famille des maquereaux)",
            "Thon",
            "Thon albacore",
            "Thon blanc",
            "Thon listao ou bonite à ventre rayé",
            "Thon rouge",
            "Tilapia du Nil",
            "Truite",
            "Truite arc-en-ciel",
            "Truite de mer",
            "Truite fario ou truite de rivière",
            "Turbot",
            "Turbot de sable",
            "Turbot (des Français)",
            "Turbot de Terre-Neuve (flétan du Groenland)",
        ];
        for ($i = 0; $i < 100; $i++) {
            DetailedFishing::create([
                'id_fishing' => $faker->randomDigit,
                'type_fish' => $fish_list[$faker->numberBetween(0, count($fish_list)-1)],
                'quantity' =>$faker->randomDigit
            ]);
        }
    }
}
