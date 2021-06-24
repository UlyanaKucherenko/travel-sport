<?php

use Illuminate\Database\Seeder;
use App\Models\Plan;
use App\Models\PlanText;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beginner = [
            [
                "locale" => "en",
                'title' => "Beginner",
                'text1' => "2 ebooks per day",
                'text2' => "Personal consultant for a day",
                'trial' => "Trial period of 5 days at 2.95 €",
            ],
            [
                "locale" => "it",
                'title' => "Principiante",
                'text1' => "2 ebook al giorno",
                'text2' => "Consulente personale per un giorno",
                'trial' => "Periodo di prova di 5 giorni a 2.95 €",
            ],
            [
                "locale" => "fr",
                'title' => "Débutant",
                'text1' => "2 ebooks par jour",
                'text2' => "Consultant personnel pour une journée",
                'trial' => "Période d'essai de 5 jours à 2.95 €",
            ],
        ];

        $plan = factory(Plan::class)->create([
            'count_books' => '2',
            'price' => '29.85',
            'img' => "plan-1.svg",
            'slug' => "beginner",
        ]);

        collect($beginner)->each(function ($item) use($plan) {
            $plan->plan_text()->save(factory(PlanText::class)->make($item));
        });

        $basic = [
            [
                "locale" => "en",
                'title' => 'Medium',
                'text1' => '5 ebooks per week',
                'text2' => 'Personal consultant for a week',
                'trial' => "Trial period of 5 days at 2.95 €",
            ],
            [
                "locale" => "it",
                'title' => 'Media',
                'text1' => '5 ebook a settimana',
                'text2' => "Consulente personale per una settimana",
                'trial' => "Periodo di prova di 5 giorni a 2.95 €",
            ],
            [
                "locale" => "fr",
                'title' => 'Moyenne',
                'text1' => '5 ebooks par semaine',
                'text2' => 'Consultant personnel pendant une semaine',
                'trial' => "Période d'essai de 5 jours à 2.95 €",
            ],
        ];

        $plan = factory(Plan::class)->create([
            'count_books' => '5',
            'price' => '49.85',
            'img' => "plan-2.svg",
            'slug' => "basic",
        ]);

        collect($basic)->each(function ($item) use($plan) {
            $plan->plan_text()->save(factory(PlanText::class)->make($item));
        });

        $pro = [
            [
                "locale" => "en",
                'title' => 'Senior',
                'text1' => '10 ebooks per month',
                'text2' => 'Personal consultant for a month',
                'trial' => "Trial period of 5 days at 2.95 €",
            ],
            [
                "locale" => "it",
                'title' => 'Anziano',
                'text1' => '10 ebook al mese',
                'text2' => "Consulente personale per un mese",
                'trial' => "Periodo di prova di 5 giorni a 2.95 €",
            ],
            [
                "locale" => "fr",
                'title' => 'Sénior',
                'text1' => '10 ebooks par mois',
                'text2' => 'Consultant personnel pendant un mois',
                'trial' => "Période d'essai de 5 jours à 2.95 €",
            ],
        ];

        $plan = factory(Plan::class)->create([
            'count_books' => '10',
            'img' => "plan-3.svg",
            'price' => '69.85',
            'slug' => "pro",
        ]);

        collect($pro)->each(function ($item) use($plan) {
            $plan->plan_text()->save(factory(PlanText::class)->make($item));
        });
    }
}
