<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Adresse;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\CodePostal;
use App\Models\Commande;
use App\Models\Couleur;
use App\Models\Fleur;
use App\Models\Loterie;
use App\Models\NomProduit;
use App\Models\Produit;
use App\Models\Unite;
use App\Models\Ville;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = new Faker();

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ])
            ->create([
                'name' => 'Guillaume Cholet',
                'email' => 'guillaume.cholet@lafleur.com',
                'password' => 'lafleur'
            ])
            ->create([
                'name' => 'Sabine Cholet',
                'email' => 'sabine.cholet@lafleur.com',
                'password' => 'lafleur'
            ]);

        // Bloc clients
        Ville::factory()
            ->create([
                "nom_ville" => "Lourmarin",
                "est_livrable" => 1
            ])
            ->create([
                "nom_ville" => "Puyvert",
                "est_livrable" => 1
            ])
            ->create([
                "nom_ville" => "Cadenet",
                "est_livrable" => 1
            ])
            ->create([
                "nom_ville" => "Lauris",
                "est_livrable" => 1
            ])
            ->create([
                "nom_ville" => "Vaugines",
                "est_livrable" => 1
            ])
            ->create([
                "nom_ville" => "Curcuron",
                "est_livrable" => 1
            ]);
        CodePostal::factory()
            ->create([
                "cp" => 84160
            ])
            ->create([
                "cp" => 84360
            ]);
        // Adresse::factory(10)->create();
        // Client::factory(10)->create();

        // Bloc articles
        Unite::factory()
            ->create([
                "nom_unite" => "tige"
            ])
            ->create([
                "nom_unite" => "fleuron"
            ])
            ->create([
                "nom_unite" => "gr"
            ]);
        Couleur::factory()
            ->create([
                "nom_couleur" => "jaune"
            ])
            ->create([
                "nom_couleur" => "orange"
            ])
            ->create([
                "nom_couleur" => "rouge"
            ])
            ->create([
                "nom_couleur" => "violet"
            ])
            ->create([
                "nom_couleur" => "bleu"
            ])
            ->create([
                "nom_couleur" => "vert"
            ])
            ->create([
                "nom_couleur" => "blanc"
            ])
            ->create([
                "nom_couleur" => "noir"
            ])
            ->create([
                "nom_couleur" => "gris"
            ])
            ->create([
                "nom_couleur" => "rose"
            ]);
        Categorie::factory()
            ->create([
                "nom_categorie" => "remerciement"
            ])
            ->create([
                "nom_categorie" => "naissance"
            ])
            ->create([
                "nom_categorie" => "mariage"
            ])
            ->create([
                "nom_categorie" => "amour et sentiments"
            ])
            ->create([
                "nom_categorie" => "anniversaire"
            ]);
        Fleur::factory()
            ->create([
                "nom_fleur" => "rose",
                "quantite_stock" => $faker->randomNumber(3, false),
                "unite_id" => 1,
                "couleur_id" => 3,
            ])
            ->create([
                "nom_fleur" => "rose",
                "quantite_stock" => $faker->randomNumber(3, false),
                "unite_id" => 1,
                "couleur_id" => 7,
            ])
            ->create([
                "nom_fleur" => "lys",
                "quantite_stock" => $faker->randomNumber(3, false),
                "unite_id" => 1,
                "couleur_id" => 7,
            ])
            ->create([
                "nom_fleur" => "eucalyptus",
                "quantite_stock" => $faker->randomNumber(3, false),
                "unite_id" => 3,
                "couleur_id" => $faker->numberBetween(1, 9),
            ])
            ->create([
                "nom_fleur" => "orchidée",
                "quantite_stock" => $faker->randomNumber(3, false),
                "unite_id" => 2,
                "couleur_id" => 4,
            ])
            ->create([
                "nom_fleur" => "avoine séchée",
                "quantite_stock" => $faker->randomNumber(3, false),
                "unite_id" => 3,
                "couleur_id" => 2,
            ])
            ->create([
                "nom_fleur" => "rose",
                "quantite_stock" => $faker->randomNumber(3, false),
                "unite_id" => 1,
                "couleur_id" => 10,
            ]);
        Produit::factory()
            ->create([
                "nom_produit" => "Bouquet de roses rouge",
                "prix_vente" => 25.99,
                "categorie_id" => 4
            ])
            ->create([
                "nom_produit" => "Bouquet de roses blanche",
                "prix_vente" => 29.99,
                "categorie_id" => 3
            ])
            ->create([
                "nom_produit" => "Rose rouge",
                "prix_vente" => 2.00,
                "categorie_id" => 4
            ])
            ->create([
                "nom_produit" => "Rose blanche",
                "prix_vente" => 2.00,
                "categorie_id" => 3
            ])
            ->create([
                "nom_produit" => "Lys blanc",
                "prix_vente" => 2.00,
                "categorie_id" => 1
            ])
            ->create([
                "nom_produit" => "Fleurons d'orchidée",
                "prix_vente" => 14.99,
                "categorie_id" => 5
            ])
            ->create([
                "nom_produit" => "Avoine séché",
                "prix_vente" => 14.90,
                "categorie_id" => 1
            ])
            ->create([
                "nom_produit" => "Brassée de fleurs",
                "prix_vente" => 49.99,
                "categorie_id" => 1
            ])
            ->create([
                "nom_produit" => "Composition florale",
                "prix_vente" => 29.99,
                "categorie_id" => 2
            ])
            ->create([
                "nom_produit" => "Bouquet d'automne",
                "prix_vente" => 25.99,
                "categorie_id" => 1
            ])
            ->create([
                "nom_produit" => "Rose rose",
                "prix_vente" => 25.99,
                "categorie_id" => 5
            ])
            ->create([
                "nom_produit" => "Bouquet de roses rose",
                "prix_vente" => 25.99,
                "categorie_id" => 5
            ]);

        // Bloc commandes
        Loterie::factory()
            ->create([
                "nom_lot" => 'stylo "Lafleur"',
                "quantite_lot" => 1000
            ])
            ->create([
                "nom_lot" => 'sac réutilisable en tissu "Lafleur"',
                "quantite_lot" => 700
            ])
            ->create([
                "nom_lot" => 'porte-clé "Lafleur"',
                "quantite_lot" => 200
            ])
            ->create([
                "nom_lot" => 'rose rouge à offrir',
                "quantite_lot" => 50
            ])
            ->create([
                "nom_lot" => 'bouquet de roses',
                "quantite_lot" => 10
            ]);


        // Association des fleurs au produit : Bouquet de rose rouge
        Produit::find(1)->fleurs()->attach([
            1 => [
                "quantite_fleur" => 15
            ]
        ]);
        // Association des fleurs au produit : Bouquet de rose blanche
        Produit::find(2)->fleurs()->attach([
            2 => [
                "quantite_fleur" => 15
            ]
        ]);
        // Association des fleurs au produit : Rose rouge
        Produit::find(3)->fleurs()->attach([
            1 => [
                "quantite_fleur" => 1
            ]
        ]);
        // Association des fleurs au produit : Rose blanche
        Produit::find(4)->fleurs()->attach([
            2 => [
                "quantite_fleur" => 1
            ]
        ]);
        // Association des fleurs au produit : Lys blanc
        Produit::find(5)->fleurs()->attach([
            3 => [
                "quantite_fleur" => 1
            ]
        ]);
        // Association des fleurs au produit : Fleurons d'orchidée
        Produit::find(6)->fleurs()->attach([
            5 => [
                "quantite_fleur" => 10
            ]
        ]);
        // Association des fleurs au produit : Avoine séché
        Produit::find(7)->fleurs()->attach([
            6 => [
                "quantite_fleur" => 100
            ]
        ]);
        // Association des fleurs au produit : Brassée de fleurs
        Produit::find(8)->fleurs()->attach([
            1 => [
                "quantite_fleur" => 10
            ]
        ]);
        Produit::find(8)->fleurs()->attach([
            2 => [
                "quantite_fleur" => 10
            ]
        ]);
        Produit::find(8)->fleurs()->attach([
            3 => [
                "quantite_fleur" => 10
            ]
        ]);
        Produit::find(8)->fleurs()->attach([
            5 => [
                "quantite_fleur" => 10
            ]
        ]);
        // Association des fleurs au produit : Composition florale
        Produit::find(9)->fleurs()->attach([
            3 => [
                "quantite_fleur" => 10
            ]
        ]);
        Produit::find(9)->fleurs()->attach([
            5 => [
                "quantite_fleur" => 10
            ]
        ]);
        // Association des fleurs au produit : Bouquet d'automne
        Produit::find(10)->fleurs()->attach([
            4 => [
                "quantite_fleur" => 100
            ]
        ]);
        Produit::find(10)->fleurs()->attach([
            6 => [
                "quantite_fleur" => 100
            ]
        ]);
        // Association des fleurs au produit : Rose rose
        Produit::find(11)->fleurs()->attach([
            7 => [
                "quantite_fleur" => 1
            ]
        ]);
        // Association des fleurs au produit : Bouquet de roses rose
        Produit::find(12)->fleurs()->attach([
            7 => [
                "quantite_fleur" => 15
            ]
        ]);


        // $produits = Produit::all();
        // foreach ($produits as $produit) {
        //     $produit->fleurs()->attach([
        //         $faker->numberBetween(1, 5) => [
        //             "quantite_fleur" => $faker->randomNumber(2, false)
        //         ]
        //     ]);
        // }

        // Commande::factory(10)->create();

        // Tables pivot
        // $commandes = Commande::all();
        // foreach ($commandes as $commande) {
        //     $commande->produits()->attach([
        //         $faker->numberBetween(1, 10) => [
        //             "quantite_vente" => $faker->randomNumber(2, false)
        //         ]
        //     ]);
        // }
    }
}
