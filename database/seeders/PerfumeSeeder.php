<?php

namespace Database\Seeders;

use App\Models\Perfume;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all()->count();

        $names=[  
        "Fiori di Luna",
        "Cielo di Giada",
        "Rosa Selvaggia",  
        "Notte d'Oro",  
        "Brezza di Mare",  
        "Gelsomino Profumato",  
        "Acqua di Sorgente",  
        "Oceano Blu",  
        "Lillà in Fiore",  
        "Zenzero e Limone",  
        "Ghiaccio di Montagna",  
        "Alba Chiara",  
        "Tramonto Rosso",  
        "Mela Caramellata",  
        "Vaniglia Bourbon",  
        "Cedro Mediterraneo",  
        "Sole di Primavera",  
        "Pera Dorata",  
        "Ambra Orientale",  
        "Melograno Scintillante",  
        "Ginestra in Fiore",  
        "Fragola Dolce",  
        "Iris Blu",  
        "Mimosa Brillante",  
        "Fiori di Campo",  
        "Mughetto Selvatico",  
        "Spezie Orientali",  
        "Gardenia Profumata",  
        "Cocco Esotico",  
        "Mandorla Dolce",  
        "Pepe Nero",  
        "Magnolia Bianca",  
        "Mughetto e Violetta",  
        "Mandarino e Cipresso",  
        "Acero Rosso",  
        "Biancospino Selvatico",  
        "Fava Tonka",  
        "Lavanda Viola",  
        "Menta Fresca",  
        "Zafferano Giallo",  
        "Basilico Verde",  
        "Gelsomino Notturno",  
        "Sandalo Profondo",  
        "Rosa Antica",  
        "Ginepro Selvaggio",  
        "Lampone Rosso",  
        "Mirtillo Nero",  
        "Mandorla Amara",  
        "Mughetto e Muschio",  
        "Tè Verde e Limone",  
        "Peonia Rosa",
        ];

        $brands=[
            "Gucci",
            "Calvin Klein",
            "Versace",
            "Dior",
            "BOSS"
        ];

        $lorem="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tortor purus, varius eu orci quis, ultrices tincidunt mauris.
        Maecenas rhoncus facilisis vehicula. Vestibulum sit amet odio auctor, commodo tellus in, feugiat nisi. Nam commodo mi non ligula fringilla imperdiet.
        Maecenas faucibus at mauris quis pellentesque. Duis auctor quam eget odio maximus, ut mattis mi gravida.
        Mauris mauris nunc, pretium sed neque at, hendrerit vestibulum ligula. Phasellus sit amet mi ac dolor cursus egestas quis ac ligula.
        Nullam nec imperdiet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae";

        foreach ($names as $name){
            $nuovoProfumo=new Perfume();
            $nuovoProfumo->name=$name;
            $nuovoProfumo->description=$lorem;
            $nuovoProfumo->product_img="product_img/profumo_prova.jpg";
            $nuovoProfumo->brand=array_rand($brands, 1);
            $nuovoProfumo->user_id=rand(1, $users);
            $nuovoProfumo->save();
        };

    }
}
