<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Adresse;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\CodePostal;
use App\Models\Commande;
use App\Models\CommandeClient;
use App\Models\CommandeClientProduit;
use App\Models\CommandeFournisseur;
use App\Models\CommandeFournisseurFleur;
use App\Models\Couleur;
use App\Models\Fleur;
use App\Models\FleurProduit;
use App\Models\Fournisseur;
use App\Models\Loterie;
use App\Models\Personne;
use App\Models\Produit;
use App\Models\TypeProduit;
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

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // Sans clé étrangères
        Personne::factory(10)->create();
        Ville::factory(10)->create();
        CodePostal::factory(10)->create();
        Loterie::factory()
            ->create([
                "nom_lot" => 'stylos "Lafleur"',
                "quantite_lot" => 1000
            ])
            ->create([
                "nom_lot" => 'sacs réutilisables en tissus "Lafleur"',
                "quantite_lot" => 700
            ])
            ->create([
                "nom_lot" => 'portes-clés "Lafleur"',
                "quantite_lot" => 200
            ])
            ->create([
                "nom_lot" => 'roses rouges à offrir',
                "quantite_lot" => 50
            ])
            ->create([
                "nom_lot" => 'bouquets de roses',
                "quantite_lot" => 10
            ]);
        Commande::factory(10)->create();
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
        TypeProduit::factory()
            ->create([
                "nom_type_produit" => "brassée"
            ])
            ->create([
                "nom_type_produit" => "bouquet"
            ])
            ->create([
                "nom_type_produit" => "composition"
            ]);
        Fournisseur::factory(10)->create();
        Client::factory(10)->create();
        Adresse::factory(10)->create();
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
            ]);
        Produit::factory(10)->create();
        CommandeFournisseur::factory(10)->create();
        CommandeClient::factory(10)->create();

        $clients = Client::all();
        foreach ($clients as $client) {
            // Ici tags() est une méthode créé par le framework renvoyant un objet
            $client->adresses()->attach($faker->numberBetween(1, 10)); //attach pour ajouter, detach pour enlever
        }

        $commandeClients = CommandeClient::all();
        foreach ($commandeClients as $commandeClient) {
            $commandeClient->produits()->attach([
                $faker->numberBetween(1, 5) => [
                    "quantite_vente" => $faker->randomNumber(2, false)
                ]
            ]);
        }

        $commandeFournisseurs = CommandeFournisseur::all();
        foreach ($commandeFournisseurs as $commandeFournisseur) {
            $commandeFournisseur->fleurs()->attach([
                $faker->numberBetween(1, 5) => [
                    "quantite_achat" => $faker->randomNumber(2, false),
                    "prix_achat" => $faker->randomFloat(2, 1, 99999999.99)
                ]
            ]);
        }

        $produits = Produit::all();
        foreach ($produits as $produit) {
            $produit->fleurs()->attach([
                $faker->numberBetween(1, 5) => [
                    "quantite_fleur" => $faker->randomNumber(2, false)
                ]
            ]);
        }
    }
}
