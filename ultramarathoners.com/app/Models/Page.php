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
                        "text" => "Esercizio giornaliero. Esercizio quotidiano per almeno un'ora. Non devi ucciderti per correre, fare jogging, ecc., Ma dovresti avere una sorta di attività fisica moderata nella tua vita di tutti i giorni. Se stai cercando di perdere qualche chilo in fretta, fai un allenamento di intensità più alta. Ad esempio, fai una passeggiata a passo sostenuto per un'ora. Oppure, puoi fare jogging e impostare determinati intervalli per sprint durante quell'ora. Assicurati di non avere forti dolori durante l'allenamento. Solo un avvertimento, i tuoi muscoli faranno male dopo un allenamento ad alta intensità. Potrebbe essere irritante, ma ciò significa che il tuo corpo sta cambiando in meglio. Assicurati di rimanere idratato, allungare e mangiare cibi con una discreta quantità di proteine dopo ogni allenamento. La proteina aiuterà a mantenere i muscoli, non grassi, ricostruendo.",
                        "img" => "/img/face1.png",
                        "name" => "Johanna Rey",
                    ],
                    [
                        "text" => "Mangia gli alimenti giusti e la porzione ogni pasto. Non importa quanto male il tuo stomaco ti stia dicendo di andare a prendere caramelle sul cibo sano, cerca di stare lontano dai dolci. Lo zucchero delle caramelle non ti aiuterà a metterti in forma. Anche se si tratta di una sola barretta di cioccolato, uno alla fine ne porterà un'altra. Frutta e verdura sono la cosa migliore da mangiare quando si forma. Le mele, ad esempio, fanno un buon lavoro a far sentire lo stomaco pieno per 3 o 4 ore. Verdure verdi come fagiolini e broccoli mantengono il sistema digestivo pulito e funzionante.",
                        "img" => "/img/face2.png",
                        "name" => "Grace Cooper",
                    ],
                    [
                        "text" => "Tenere traccia delle calorie e assunzione di cibo al giorno. Tenere traccia di quante calorie si mangia in un giorno sarà utile per pianificare il tuo esercizio fisico. Vi siete mai chiesti perché le masse del corpo dei bodybuilder sono così grandi? Questo perché pianificano i pasti e assumono più calorie (salutari) rispetto alla persona media. D'altra parte, perdere peso e sforzarsi per un fisico più magro richiederà più esercizio fisico delle calorie che ingerite.",
                        "img" => "/img/face3.png",
                        "name" => "Rose Hunter",
                    ],
                    [
                        "text" => "Assicurati di dormire. Anche se molti di noi hanno un lavoro di otto ore durante il giorno o la notte, è fondamentale dormire abbastanza per ricaricare le batterie del corpo. Da sei a otto ore di sonno manterranno il corpo durante tutto il giorno, ma se ti senti stanco in qualsiasi momento dopo essere tornato a casa dal lavoro, fai un sonnellino prima di allenarti. Dovresti fare un sonnellino solo per circa mezz'ora. Ciò ti impedirà di rimanere sveglio più tardi nella notte.",
                        "img" => "/img/face4.png",
                        "name" => "Belinda Edwardson",
                    ],
                ];
            case "fr":
                return [
                    [
                        "text" => "Exercice quotidien. Faites de l'exercice quotidiennement pendant au moins une heure. Vous n'avez pas à vous tuer en courant, en faisant du jogging, etc., mais vous devriez avoir une activité physique modérée dans votre vie quotidienne. Si vous souhaitez perdre quelques kilos rapidement, faites un entraînement d'intensité supérieure. Par exemple, allez marcher à une allure rapide pendant une heure. Ou, vous pouvez faire du jogging et définir certains intervalles pour sprinter pendant cette heure. Assurez-vous que vous ne ressentez pas de douleur intense pendant votre entraînement. Juste un avertissement, vos muscles vont mal après un entraînement de haute intensité. Cela peut être irritant, mais cela signifie que votre corps change pour le mieux. Assurez-vous de rester hydraté, de vous étirer et de manger des aliments riches en protéines après chaque séance d’entraînement. La protéine aidera à garder vos muscles, pas de graisse, à reconstruire.",
                        "img" => "/img/face1.png",
                        "name" => "Johanna Rey",
                    ],
                    [
                        "text" => "Mangez les bons aliments et portion chaque repas. Peu importe à quel point votre estomac vous dit de choisir des friandises pour des aliments sains, évitez les sucreries. Le sucre des bonbons ne vous aidera pas à vous mettre en forme. Même s'il ne s'agit que d'une barre chocolatée, l'une finira par en mener une autre. Les fruits et les légumes sont la meilleure chose à manger pour se mettre en forme. Les pommes, par exemple, réussissent très bien à remplir l'estomac jusqu'à 3 à 4 heures. Les légumes verts tels que les haricots verts et le brocoli gardent le système digestif propre et fonctionnel.",
                        "img" => "/img/face2.png",
                        "name" => "Grace Cooper",
                    ],
                    [
                        "text" => "Gardez une trace des calories et de l'apport alimentaire par jour. Garder une trace de combien de calories que vous mangez dans une journée sera utile dans la planification de votre exercice physique. Vous êtes-vous déjà demandé pourquoi les masses corporelles des bodybuilders sont si grandes? C'est parce qu'ils planifient leurs repas et absorbent plus de calories (en bonne santé) que la moyenne. Par contre, perdre du poids et rechercher un physique plus maigre impliqueront plus d'exercice physique que les calories ingérées.",
                        "img" => "/img/face3.png",
                        "name" => "Rose Hunter",
                    ],
                    [
                        "text" => "Assurez-vous de dormir. Même si la plupart d'entre nous travaillons pendant huit heures le jour ou la nuit, il est essentiel de dormir suffisamment pour recharger les batteries. De six à huit heures de sommeil permettront au corps de rester actif toute la journée, mais si vous vous sentez fatigué à tout moment après votre retour à la maison, faites une petite sieste avant de faire de l'exercice. Vous ne devriez faire la sieste que pendant environ une demi-heure. Cela vous évitera de rester debout plus tard dans la nuit.",
                        "img" => "/img/face4.png",
                        "name" => "Belinda Edwardson",
                    ],
                ];
            default:
                return [
                    [
                        "text" => "Exercise Daily. Exercise daily for at least an hour. You do not have to kill yourself from running, jogging, etc., but you should have some sort of moderate physical activity in your everyday life. If you're looking to shed a few pounds fast, do a higher-level intensity workout. For example, go on a walk at a brisk pace for an hour. Or, you can jog and set certain intervals to sprint during that hour. Make sure you're not in severe pain during your workout. Just a warning, your muscles will ache after a high intensity workout. It may be irritating, but that means your body is changing for the better. Be sure to stay hydrated, stretch, and eat foods with a decent amount of protein after each workout. The protein will help keep your muscles, not fat, rebuilding.",
                        "img" => "/img/face1.png",
                        "name" => "Johanna Rey",
                    ],
                    [
                        "text" => "Eat the Right Foods and Portion Each Meal. No matter how bad your stomach is telling you to go for candy over healthy food, try to stay away from sweets. Sugar from candy will not help you get in shape. Even if it's just a single candy bar, one will eventually lead to another. Fruits and vegetables are the best thing to eat when getting into shape. Apples, for example, do a good job at making the stomach feel full for up to 3 to 4 hours. Green vegetables such as green beans and broccoli keep the digestive system clean and running.",
                        "img" => "/img/face2.png",
                        "name" => "Grace Cooper",
                    ],
                    [
                        "text" => "Keep Track of Calories and Food Intake Per Day. Keeping track of how many calories you eat in a day will be helpful in planning out your physical exercising. Ever wonder why body builders' body masses are so big? That's because they plan out their meals and take in more (healthy) calories than the average person. On the other hand, losing weight and striving for a skinnier physique will involve more physical exercise than calories you ingest.",
                        "img" => "/img/face3.png",
                        "name" => "Rose Hunter",
                    ],
                    [
                        "text" => "Be Sure to Get Sleep. Even though most of us have eight-hour jobs during the day or night, it is crucial to get enough sleep to recharge the body's batteries. Six to eight hours of sleep will keep the body going throughout the day, but if you happen to feel tired at any point after coming home from work, by all means take a small nap before exercising. You should only nap for about a half hour. This will prevent you from staying up later in the night.",
                        "img" => "/img/face4.png",
                        "name" => "Belinda Edwardson",
                    ],
                ];
        }
    }

    public function getSliderBooks():array
    {
        return [
            ["src" => "/img/book-1.gif"],
            ["src" => "/img/book-2.jpg"],
            ["src" => "/img/book-3.jpg"],
            ["src" => "/img/book-4.jpg"],
            ["src" => "/img/book-5.jpg"]
        ];
    }
}
