<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    /**
     * @return array
     */
    public function getSliderReviews():array
    {
        switch (App::getLocale()){
            case "it":
                return [
                    [
                        "text" => "Utilizzare le cinghie correttamente. Quando si usano le cinghie, è sufficiente un solo anello attorno alla barra. Supponendo che tu stia afferrando la barra, questo sarà un grande supporto anche per il lavoro più pesante. E, sullo stacco, se passi un sacco di tempo piegato a cercare di far girare le cinghie, perderai alcuni dei benefici del riflesso di allungamento e potresti avere un tempo molto più difficile per la tua prima attrazione.",
                        "img" => "/img/people1.png",
                        "name" => "Harry Blue",
                    ],
                    [
                        "text" => "Baby Powder è utile. Trasporta il talco (baby) in polvere nella tua borsa da palestra. Sono onestamente sconvolto da quante persone non si rendono conto dei benefici del talco sullo stacco. Quando stai tirando forte, anche una piccola quantità di attrito tra le gambe e la barra può fare una grande differenza. Il talco ridurrà notevolmente l'attrito e potrebbe benissimo fare la differenza tra un nuovo PR e un sollevamento mancato.",
                        "img" => "/img/people2.png",
                        "name" => "Tom Brady",
                    ],
                    [
                        "text" => "Alleviare il dolore alla spalla nello squat. Se hai dolore alla spalla quando sei accovacciato, prova ad iniziare il riscaldamento con una presa molto ampia. Anche se gli squat sono un movimento inferiore del corpo, aumenteranno rapidamente la temperatura interna, così anche la parte superiore del corpo si riscalderà leggermente dal movimento. Inoltre, il leggero allungamento del bilanciere vuoto aiuta a sciogliere il torace e il delta.",
                        "img" => "/img/people3.png",
                        "name" => "Joe Luis",
                    ],
                    [
                        "text" => "Problemi di massa? Mangi più verdure. Hai difficoltà a terminare tutti i tuoi pasti durante la maggior parte? Prova a mangiare di più - le verdure. Spesso, è difficile mangiare perché non sei abituato al volume del cibo, non perché l'afflusso di calorie sta causando sazietà. In tal caso, mangiare più verdure aiuterà ad allenare il tuo corpo a mangiare di più. Sono in genere a basso contenuto calorico, quindi sicuramente non ti riempiranno in quel senso e la fibra aggiunta potrebbe aiutarti a migliorare la digestione.",
                        "img" => "/img/people4.png",
                        "name" => "Andrea Reed",
                    ],
                ];
            case "fr":
                return [
                    [
                        "text" => "Utilisez les sangles correctement. Lorsque vous utilisez des sangles, vous n’avez besoin que d’une boucle autour de la barre. En supposant que vous teniez aussi la barre, ce sera un soutien précieux, même pour les travaux les plus lourds. Et, au soulevé de terre, si vous passez beaucoup de temps à essayer d’enfiler vos sangles, vous perdrez certains des avantages du réflexe d’étirement et vous aurez peut-être beaucoup plus de mal à vous préparer pour votre première traction.",
                        "img" => "/img/people1.png",
                        "name" => "Harry Blue",
                    ],
                    [
                        "text" => "La poudre pour bébé est utile. Carry talc (bébé) en poudre dans votre sac de sport. Honnêtement, je suis choqué de voir combien de personnes ne réalisent pas les avantages du talc sur le soulevé de terre. Lorsque vous tirez fort, même une légère friction entre vos jambes et la barre peut faire toute la différence. Le talc réduira considérablement ces frictions et pourrait très bien faire la différence entre un nouveau PR et une levée manquée.",
                        "img" => "/img/people2.png",
                        "name" => "Tom Brady",
                    ],
                    [
                        "text" => "Soulager la douleur à l'épaule dans le squat. Si vous avez mal à l’épaule lorsque vous êtes accroupi, essayez de commencer votre échauffement avec une très grande prise en main. Bien que les squats soient un mouvement du bas du corps, ils augmenteront rapidement la température de votre corps, de sorte que le haut de votre corps se réchauffera un peu. De plus, le léger étirement de la barre vide aidera à relâcher la poitrine et les delt.",
                        "img" => "/img/people3.png",
                        "name" => "Joe Luis",
                    ],
                    [
                        "text" => "Bulking Trouble? Mangez plus de légumes. Avez-vous de la difficulté à finir tous vos repas en vrac? Essayez de manger plus - les légumes. Souvent, il est difficile de manger parce que vous n’êtes pas habitué au volume des aliments et non pas parce que l’afflux de calories provoque la satiété. Dans ce cas, manger plus de légumes aidera votre corps à manger plus. Ils sont généralement faibles en calories, ils ne vous rempliront certainement pas dans ce sens, et la fibre ajoutée peut aider à améliorer votre digestion.",
                        "img" => "/img/people4.png",
                        "name" => "Andrea Reed",
                    ],
                ];
            default:
                return [
                    [
                        "text" => "Use Straps Correctly. When using straps, you only need one loop around the bar. Assuming you’re also gripping the bar, this will be plenty of support for even the heaviest work. And, on the deadlift, if you spend a lot of time bent over trying to crank the straps on, you’ll lose some of the benefits of the stretch reflex and may have a much harder time setting up for your first pull.",
                        "img" => "/img/people1.png",
                        "name" => "Harry Blue",
                    ],
                    [
                        "text" => "Baby Powder Is Useful. Carry talcum (baby) powder in your gym bag. I’m honestly shocked by how many people don’t realize the benefits of talcum powder on the deadlift. When you’re pulling heavy, even a small amount of friction between your legs and the bar can make a big difference. Talc will greatly reduce that friction and may very well make the difference between a new PR and a missed lift.",
                        "img" => "/img/people2.png",
                        "name" => "Tom Brady",
                    ],
                    [
                        "text" => "Alleviate Shoulder Pain In the Squat. If you have shoulder pain when you’re squatting, try starting your warmup with a very wide grip. Even though squats are a lower-body movement, they’ll quickly increase your core temperature, so your upper body will get a little warm from the movement too. Plus, the gentle stretching of the empty barbell will help to loosen up the chest and delts.",
                        "img" => "/img/people3.png",
                        "name" => "Joe Luis",
                    ],
                    [
                        "text" => "Bulking Trouble? Eat More Veggies. Having trouble finishing all your meals during a bulk? Try eating more — veggies. Oftentimes, it’s difficult to eat because you’re not used to the food volume, not because the influx of calories is causing satiation. In that case, eating more veggies will help to train your body to eat more. They’re typically low-calorie, so they definitely won’t fill you up in that sense, and the added fiber may help to improve your digestion.",
                        "img" => "/img/people4.png",
                        "name" => "Andrea Reed",
                    ],
                ];
        }
    }

    public function getSliderBooks():array
    {
        return [
            ["src" => "/img/book-1.jpg"],
            ["src" => "/img/book-2.jpg"],
            ["src" => "/img/book-3.jpg"],
            ["src" => "/img/book-4.jpg"],
            ["src" => "/img/book-5.jpg"],
        ];
    }
}
