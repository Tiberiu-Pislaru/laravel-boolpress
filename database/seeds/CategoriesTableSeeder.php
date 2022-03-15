<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            [
                'name'=>'biografia e autobiografia',
                'description' => 'Si tratta di generi in cui il nucleo del romanzo è rappresentato dalla vita del protagonista, nel primo caso raccontata da una terza persona, nel secondo dal protagonista stesso. In questo genere non c’è spazio per la fantasia, e l’estro creativo dello scrittore si deve limitare allo stile di scrittura.'
            ],
            [
                'name'=> 'romanzo storico',
                'description' => 'Nel romanzo storico, invece, le vicende sono inserite in un contesto storico ben preciso e dettagliato, a cui ci si deve attenere rigorosamente, ma i personaggi e la trama che li muove possono essere liberamente creati dallo scrittore (stando però attento che risultino verosimili rispetto al contesto).'
            ],
            [
                'name'=> 'giallo',
                'description' => 'Il termine “giallo” usato per definire questo genere è diffuso solo in Italia e deriva dal colore giallo delle copertine della fortunata collana di polizieschi lanciata da Mondadori nel 1929. La trama ruota intorno a un crimine e alle indagini che portano alla soluzione del caso.'
            ],
            [
                'name'=> 'horror',
                'description' => 'I romanzi horror sfruttano le paure innate dei lettori per creare una trama terrifica, macabra e coinvolgente. L’ambientazione è necessariamente tenebrosa, buia e claustrofobica.'
            ],
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->description = $category['description'];
            $newCategory->save();

        }
    }
}
