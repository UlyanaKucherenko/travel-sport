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
                        "text" => "Decidi perché vuoi fare yoga. Potremmo decidere di fare yoga per molte ragioni diverse. Puoi entrare in essa per estendere la tua pratica religiosa, per la crescita spirituale o semplicemente per mantenere una buona salute. Ogni ragione implica pratiche e conoscenze diverse, quindi è importante sapere quali sono esattamente le tue ragioni.",
                        "img" => "/img/face1.png",
                        "name" => "Lana",
                    ],
                    [
                        "text" => "Rispetta la saggezza e i limiti interiori del tuo corpo. Non spingere te stesso a fare qualcosa che ti sembra pericoloso o sbagliato. Questo è 'Ahimsa', la pratica del non-danno, che è essenziale per la pratica abile e benefica dello yoga. Parlate con il vostro insegnante e un operatore sanitario in caso di gravidanza o lesioni particolari come ginocchia o colonna vertebrale o qualsiasi condizione medica seria. Scopri quali posizioni evitare in determinati momenti e quali saranno vantaggiose per te. Siate consapevoli delle controindicazioni rilevanti per le vostre circostanze specifiche: per esempio alcune pose non devono essere praticate durante l'inizio della gravidanza, con alcune ferite o durante le mestruazioni, mentre altre pose possono essere molto utili.",
                        "img" => "/img/face2.png",
                        "name" => "Elley",
                    ],
                    [
                        "text" => "Respirare. Lo yoga consiste nel trovare un'armonia più sana e profonda tra il nostro corpo e la mente, e il nostro respiro è centrale in questo. Inspirate tutto il corpo nelle pose e rilassatevi. C'è molto da imparare sulla respirazione sana nello yoga.",
                        "img" => "/img/face3.png",
                        "name" => "Nikky",
                    ],
                    [
                        "text" => "Siate consapevoli dello spazio intorno a voi. Le lezioni di yoga possono essere completate; sii consapevole della necessità di lasciare abbastanza spazio tra te e gli altri in modo che, se cadi dalla tua Tree Pose, non batti troppo il tuo vicino. C'è una certa etichetta di rispettosa consapevolezza di condividere lo spazio con gli altri che è una parte adorabile della pratica dello yoga.",
                        "img" => "/img/face4.png",
                        "name" => "Erica",
                    ],
                ];
            case "fr":
                return [
                    [
                        "text" => "Décidez pourquoi vous voulez faire du yoga. Nous pouvons décider de faire du yoga pour différentes raisons. Vous pouvez y entrer pour étendre votre pratique religieuse, pour votre croissance spirituelle ou simplement pour rester en bonne santé. Chaque raison implique des pratiques et des connaissances différentes, il est donc important de savoir quelles sont exactement vos raisons.",
                        "img" => "/img/face1.png",
                        "name" => "Lana",
                    ],
                    [
                        "text" => "Respectez la sagesse intérieure de votre corps et ses limites. Ne vous forcez pas à faire quoi que ce soit qui vous semble dangereux ou mauvais. Il s’agit de «Ahimsa», la pratique du non-mal, essentielle à une pratique habile et bénéfique du yoga. Parlez à votre professeur et à un professionnel de la santé si vous êtes enceinte ou si vous avez des blessures particulières telles que les genoux ou la colonne vertébrale, ou tout autre problème médical grave. Découvrez les poses à éviter à certains moments et celles qui vous seront bénéfiques. Tenez compte des contre-indications adaptées à votre situation particulière: par exemple, certaines poses ne doivent pas être pratiquées en début de grossesse, avec certaines blessures ou pendant la menstruation, tandis que d'autres peuvent être très utiles.",
                        "img" => "/img/face2.png",
                        "name" => "Elley",
                    ],
                    [
                        "text" => "Respirer. Le yoga consiste à trouver une harmonie plus saine et plus profonde entre notre corps et notre esprit, et notre respiration est au centre de nos préoccupations. Respirez dans tout votre corps dans les poses et détendez-vous. En yoga, il y a beaucoup à apprendre sur la respiration saine.",
                        "img" => "/img/face3.png",
                        "name" => "Nikky",
                    ],
                    [
                        "text" => "Soyez conscient de l'espace autour de vous. Les cours de yoga peuvent être emballés; Soyez conscient de la nécessité de laisser assez d’espace entre vous et les autres pour que, si vous tombez de votre Tree Pose, vous ne renversiez pas votre voisin. Il existe une certaine étiquette de conscience respectueuse du partage de l'espace avec les autres qui fait partie intégrante de la pratique du yoga.",
                        "img" => "/img/face4.png",
                        "name" => "Erica",
                    ],
                ];
            default:
                return [
                    [
                        "text" => "Decide why you want to do yoga. We may decide to do yoga for many different reasons. You may get into it to extend your religious practice, for spiritual growth, or simply to maintain good health. Each reason implies different practices and knowledge, so it is important to know what exactly your reasons are.",
                        "img" => "/img/face1.png",
                        "name" => "Lana",
                    ],
                    [
                        "text" => "Respect Your Body’s Inner Wisdom And Limitations. Don’t push yourself to do anything that feels dangerous or wrong for you. This is ‘Ahimsa’, the practice of non-harm, which is essential to skilful and beneficial practice of yoga. Talk to your teacher and a health professional if you are pregnant or have particular injuries such as to the knees or spine, or any serious medical condition. Find out which poses to avoid at certain times, and which will be beneficial for you. Be aware of contraindications relevant to your specific circumstances: for example some poses are not to be practiced during early pregnancy, with certain injuries, or during menstruation, whereas other poses may be very helpful.",
                        "img" => "/img/face2.png",
                        "name" => "Elley",
                    ],
                    [
                        "text" => "Breathe. Yoga is all about finding a healthier, deeper harmony between our body and mind, and our breathing is central to this. Breathe into your whole body in the poses, and relax. There is a lot to learn about healthy breathing in yoga.",
                        "img" => "/img/face3.png",
                        "name" => "Nikky",
                    ],
                    [
                        "text" => "Be Aware Of The Space Around You. Yoga classes can be packed out; be aware of the need to leave enough space between yourself and others so that if you topple from your Tree Pose, you don’t knock over your neighbor too. There is a certain etiquette of respectful awareness of sharing space with others that is a lovely part of yoga practice.",
                        "img" => "/img/face4.png",
                        "name" => "Erica",
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
            ["src" => "/img/book-1.jpg"],
            ["src" => "/img/book-1.jpg"],
        ];
    }
}
