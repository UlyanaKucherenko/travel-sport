<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    /**
     * @return array
     */
    public function getSliderReviews(): array
    {
        switch (App::getLocale()) {
            case "it":
                return [
                    [
                        "text" => "Preparati a lavorare. CrossFit è progettato per essere un lavoro ad alta intensità, ma gli allenatori e anche altri membri non possono farti lavorare duro. Devi essere disposto a spingere te stesso e lavorare sodo. Se non lo fai, allora non vedrai i risultati che stai cercando. Sarai incoraggiato a spingere te stesso, ma nessuno può fare il lavoro per te. E solo perché sei nuovo non significa che non ti aspetteresti di ricevere lo stesso stimolo di chi lo sta facendo da molto più tempo.",
                        "img" => "/img/face1.png",
                        "name" => "Danny Lewis",
                    ],
                    [
                        "text" => "Non aver paura di fare domande. Qualsiasi programma di allenamento può essere fonte di confusione all'inizio per le persone. Non c'è niente di sbagliato nel fare domande. Gran parte del lavoro svolto in CrossFit può essere molto tecnico. È sempre meglio prevenire che curare. Sono un trainer CrossFit e sto ancora facendo domande ai miei allenatori. Stai imparando sempre nuove tecniche e nuove abilità e ci sarà sempre qualcuno che sa più cose di te. Gli allenatori vogliono che tu faccia domande. Come imparerai o migliorerai se non lo chiedi?",
                        "img" => "/img/face2.png",
                        "name" => "Jarred Bennett",
                    ],
                    [
                        "text" => "Il ridimensionamento è ok !! Non posso sottolineare abbastanza !! Ho fatto CrossFit per anni e anche un allenatore e ci sono ancora molte mosse che non posso fare come prescritto. O peso che non posso sollevare. Tutti iniziano a ridimensionare e poi si alzano. E quando alla fine RX il tuo primo allenamento sarai così eccitato e lo stesso sarà per tutti gli altri! Le opzioni di ridimensionamento sono disponibili per le persone che non possono eseguire l'RX ma ottengono comunque uno stimolo simile e lo stesso tipo di allenamento di tutti quelli della classe. E ognuno scala in modo diverso in base al loro livello di abilità. Non si tratta solo di pull-up o ring file. Ci sono passi in mezzo per arrivare dove devi essere per migliorare.",
                        "img" => "/img/face3.png",
                        "name" => "Tony Gonzalez",
                    ],
                    [
                        "text" => "Divertiti!! Questo è così importante. Il tuo viaggio di fitness non dovrebbe essere qualcosa che temi di fare ogni giorno. Dovresti divertirti ad andare al box e vedere i tuoi allenatori e compagni di crossfitters. Dovresti divertirti con un PR o battere un tempo su un allenamento. Scherzo che alla fine della lezione ringraziamo i nostri allenatori per il round di torture che ci hanno appena fatto passare. Mi piace e voglio tornare di più anche se mi sento morto durante l'allenamento.",
                        "img" => "/img/face4.png",
                        "name" => "Erney Mitchell",
                    ],
                ];
            case "fr":
                return [
                    [
                        "text" => "Soyez prêt à travailler. CrossFit est conçu pour être un travail de haute intensité, mais les entraîneurs et même les autres membres ne peuvent pas vous faire travailler dur. Vous devez être celui qui est prêt à se dépasser et à travailler dur. Si vous ne le faites pas, vous ne verrez pas les résultats que vous recherchez. Vous serez encouragé à vous pousser, mais personne ne peut faire le travail pour vous. Et ce n’est pas parce que vous êtes nouveau que vous obtiendrez le même stimulant que celui qui le fait depuis bien plus longtemps.",
                        "img" => "/img/face1.png",
                        "name" => "Danny Lewis",
                    ],
                    [
                        "text" => "N'ayez pas peur de poser des questions. Tout programme d’entraînement peut être déroutant au début. Il n'y a rien de mal à poser des questions. Une grande partie du travail effectué dans CrossFit peut être très technique. Il vaut toujours mieux prévenir que guérir. Je suis un entraîneur CrossFit et je pose toujours des questions à mes entraîneurs. Vous apprenez toujours de nouvelles techniques et de nouvelles compétences et il y aura toujours quelqu'un qui en sait plus que quelque chose sur vous. Les entraîneurs veulent que vous posiez des questions. Comment allez-vous apprendre ou vous améliorer si vous ne le demandez pas?",
                        "img" => "/img/face2.png",
                        "name" => "Jarred Bennett",
                    ],
                    [
                        "text" => "La mise à l'échelle est ok !! Je ne peux insister assez sur ce point!! Je fais du CrossFit depuis des années et même un entraîneur et il y a encore beaucoup de mouvements que je ne peux pas faire comme prescrit. Ou un poids que je ne peux pas soulever. Tout le monde commence à mettre à l'échelle, puis progresse. Et quand vous aurez enfin votre première séance d’entraînement RX, vous serez enthousiasmé par tous les autres. Les options de mise à l’échelle sont là pour les personnes qui ne peuvent pas faire la RX mais qui reçoivent tout de même un stimulus similaire et le même type d’entraînement que tous les membres de la classe. Et tout le monde évolue différemment selon son niveau de compétence. Ce n'est pas juste que vous fassiez des tractions ou des rangées d'anneaux. Il existe des étapes intermédiaires pour vous amener là où vous devez vous améliorer.",
                        "img" => "/img/face3.png",
                        "name" => "Tony Gonzalez",
                    ],
                    [
                        "text" => "S'amuser!! C'est tellement important. Votre parcours de remise en forme ne devrait pas être quelque chose que vous craignez de faire tous les jours. Vous devriez avoir plaisir à aller à la boîte et à voir vos entraîneurs et collègues crossfitters. Vous devriez avoir plaisir à obtenir un PR ou à gagner du temps lors d’une séance d’entraînement. Je plaisante qu'en fin de cours, nous remercions nos entraîneurs pour les tortures qu'ils viennent de nous infliger. J'apprécie et je veux revenir pour plus, même si je me sens mort pendant l'entraînement.",
                        "img" => "/img/face4.png",
                        "name" => "Erney Mitchell",
                    ],
                ];
            default:
                return [
                    [
                        "text" => "Be prepared to work. CrossFit is designed to be high intensity work, but the coaches and even other members can’t make you work hard. You must be the one willing to push yourself and work hard. If you don’t, then you won’t see the results that you are looking for. You will be encouraged to push yourself, but no one can do the work for you. And just because you are new doesn’t mean that you won’t be expected to get the same stimulus as some one who has been doing it for a lot longer.",
                        "img" => "/img/face1.png",
                        "name" => "Danny Lewis",
                    ],
                    [
                        "text" => "Don’t be afraid to ask questions. Any workout program can be confusing at first to people. There is nothing wrong with asking questions. A lot of the work done in CrossFit can be very technical. It is always better to be safe than sorry. I am a CrossFit trainer and am still asking questions of my coaches. You are always learning new techniques and new skills and there will always be someone who knows more about something than you do. The coaches want you to ask questions. How will you learn or get better if you don’t ask?",
                        "img" => "/img/face2.png",
                        "name" => "Jarred Bennett",
                    ],
                    [
                        "text" => "Scaling is ok!! I can not stress this enough!! I have been doing CrossFit for years and even a trainer and there are still plenty of moves that I cannot do as prescribed. Or weight that I can’t lift. Everyone starts off scaling and then works their way up. And when you finally RX your first workout you will be so excited and so will everyone else for you! Scaling options are there for people who can’t do the RX but still get a similar stimulus and the same type of workout as everyone in the class. And everyone scales differently based on their skill level. Its not just you either do pull-ups or ring rows. There are steps in between to get you to where you need to be to improve.",
                        "img" => "/img/face3.png",
                        "name" => "Tony Gonzalez",
                    ],
                    [
                        "text" => "Have fun!! This is so important. Your fitness journey should not be something you dread doing everyday. You should enjoy going to the box and seeing your coaches and fellow crossfitters. You should enjoy getting a PR or beating a time on a workout. I joke that at the end off class we are thanking our coaches for the round of torture they just put us through. I enjoy and want to come back for more even if I feel like I died during the workout.",
                        "img" => "/img/face4.png",
                        "name" => "Erney Mitchell",
                    ],
                ];
        }
    }

    public function getSliderBooks(): array
    {
        return [
            ["src" => "/img/book-1.jpg"],
            ["src" => "/img/book-2.jpg"],
            ["src" => "/img/book-3.jpg"],
            ["src" => "/img/book-1.jpg"],
            ["src" => "/img/book-2.jpg"],
        ];
    }
}
