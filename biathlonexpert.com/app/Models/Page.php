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
                        "text" => "Prendi la scarpa giusta. \"L'unico acquisto più importante che un corridore realizzerà sono le scarpe\", ha detto Chris Forti, l'allenatore certificato RRCA della squadra di corse di Dashing Whippets a New York. Mentre una camicia da corsa intrecciata con fibre tecniche che assorbono l'umidità possono renderti più comodo, un buon paio di scarpe può effettivamente aiutare a contrastare le lesioni.",
                        "img" => "/img/face1.png",
                        "name" => "Michael Smith",
                    ],
                    [
                        "text" => "Scegli un percorso corrente (o alcuni percorsi). Certo, puoi sempre correre su un tapis roulant, ma una delle cose grandiose della corsa è che ti permette di esplorare la natura. Se ti piace essere uno con la natura, scegli una tranquilla pista boscosa. Se preferisci un po 'di trambusto, scegli un percorso cittadino. Oppure puoi alternare diversi tipi di percorsi per allontanare la noia. Ma non importa quale percorso scegli, assicurati che sia sicuro e non ti fermi ai semafori su ogni blocco. Aiuta anche se il percorso è facilmente accessibile - se devi guidare 20 minuti per iniziare la corsa, è più facile saltarlo che se devi solo uscire dalla tua porta.",
                        "img" => "/img/face2.png",
                        "name" => "Laura James",
                    ],
                    [
                        "text" => "Obiettivi prefissati. Quando si tratta di motivazione, i vantaggi della definizione degli obiettivi sono indiscussi. Uno dei modi più semplici per farlo con la corsa è mettere una gara sul calendario. Leivers dice ai suoi corridori di scegliere un 5K da 8 a 12 settimane dall'inizio dell'allenamento. \"Avere questo obiettivo concreto, oltre a pagare la quota di iscrizione e spendere soldi per le scarpe, potrebbe essere alcune delle cose che ti rendono parte della formazione\", afferma Leivers.",
                        "img" => "/img/face3.png",
                        "name" => "Emma Watson",
                    ],
                ];
            case "fr":
                return [
                    [
                        "text" => "Obtenez la bonne chaussure. «Les chaussures sont l’achat le plus important qu’un coureur achète», a déclaré Chris Forti, entraîneur certifié par la RRCA de l’équipe de course Dashing Whippets à New York. Alors qu'une chemise de course tissée avec des fibres techniques évacuant l'humidité peut vous rendre plus confortable, une bonne paire de chaussures peut en réalité aider à contrecarrer les blessures.",
                        "img" => "/img/face1.png",
                        "name" => "Michael Smith",
                    ],
                    [
                        "text" => "Choisissez un itinéraire courant (ou quelques itinéraires). Bien sûr, vous pouvez toujours courir sur un tapis roulant, mais l’un des grands avantages de la course est qu’il vous permet d’explorer le plein air. Si vous aimez ne faire qu'un avec la nature, choisissez un sentier tranquille et boisé. Si vous préférez la cohue, choisissez un chemin de ville. Ou, vous pouvez alterner entre différents types de chemins pour conjurer l'ennui. Mais peu importe l’itinéraire que vous choisissez, assurez-vous qu’il est sécurisé et que vous ne vous arrêtez pas aux feux de circulation de chaque pâté de maisons. Il est également utile si la route est facilement accessible - si vous devez conduire 20 minutes pour commencer votre course, il est plus facile de la sauter que si vous devez simplement sortir par la porte.",
                        "img" => "/img/face2.png",
                        "name" => "Laura James",
                    ],
                    [
                        "text" => "Fixer des objectifs. En ce qui concerne la motivation, les avantages de fixer des objectifs sont incontestés. Une des manières les plus faciles de faire cela avec la course à pied est de mettre une course sur le calendrier. Leivers dit à ses coureurs de choisir un 5K qui aura lieu huit à douze semaines après le début de l’entraînement. «Avoir cet objectif concret, en plus de payer les frais d’entrée et de dépenser de l’argent en chaussures, pourrait être une des raisons pour lesquelles vous resterez fidèle à la formation», déclare Leivers.",
                        "img" => "/img/face3.png",
                        "name" => "Emma Watson",
                    ],
                ];
            default:
                return [
                    [
                        "text" => "Get the right shoe. “The single most important purchase a runner will make is their footwear,” said Chris Forti, the RRCA-certified coach of the Dashing Whippets race team in New York City. While a running shirt weaved with technical moisture-wicking fibers can make you more comfortable, a good pair of shoes can actually help thwart injury.",
                        "img" => "/img/face1.png",
                        "name" => "Michael Smith",
                    ],
                    [
                        "text" => "Pick a running route (or a few routes). Sure, you can always run on a treadmill, but one of the great things about running is that it lets you explore the outdoors. If you enjoy being one with nature, pick a quiet, wooded trail. If you prefer some hustle and bustle, choose a city path. Or, you can alternate between different kinds of paths to stave off boredom. But no matter what route you choose, make sure it’s safe and doesn’t have you stopping at traffic lights on every block. It also helps if the route is easily accessible — if you have to drive 20 minutes to start your run, it’s easier to skip it than if you just have to walk out your door.",
                        "img" => "/img/face2.png",
                        "name" => "Laura James",
                    ],
                    [
                        "text" => "Set goals. When it comes to motivation, the benefits of setting goals are undisputed. One of the easiest ways to do this with running is to put a race on the calendar. Leivers tells his runners to pick a 5K that is eight to 12 weeks out from the start of training. “Having that concrete goal, as well as paying the entry fee and spending money on shoes, might be some of the things that make you stick with the training,” Leivers says.",
                        "img" => "/img/face3.png",
                        "name" => "Emma Watson",
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
            ["src" => "/img/book-5.jpg"]
        ];
    }
}
