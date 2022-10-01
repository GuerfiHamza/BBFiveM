@extends('layouts.app')

@section('title', 'Règles')


@section('content')
<section id="rules" class="justify-center w-full min-h-screen text-white">
    <section class="flex flex-col items-center justify-center py-2 bg-cover md:py-2 lg:py-2 min-w-screen tails-bg">
        <div class="flex flex-col items-center justify-center p-10 mx-auto lg:flex-row lg:max-w-6xl lg:p-0">
            <div
                class="container z-20 flex flex-col w-full px-5 pr-12 mb-16 text-2xl text-white lg:w-1/2 sm:px-0 md:px-10 sm:items-center lg:items-start lg:mb-0">
                <h1
                    class="z-20 font-sans text-4xl font-extrabold leading-none text-white sm:text-5xl xl:text-6xl sm:text-center lg:text-left">
                    <span class="relative">
                        <span
                            class="absolute bottom-0 left-0 inline-block w-full h-4 mb-1 -ml-1 transform -skew-x-3 bg-red-light"></span>
                        <span class="relative">PearlFive,</span>
                    </span>
                    <span class="relative block text-red-light">Nouvelle vie.</span>
                </h1>
                <p class="z-20 block mt-6 text-base text-white xl:text-lg sm:text-center lg:text-left">Rejoins notre
                    serveur, ta ville, PearlFive !
                    <br>Un serveur a l'image de ses joueurs.
                    <br> Tu veux découvrir ces promesses et commencer ton histoire avec nous ? Alors rejoins nous !

                </p>
                <div class="flex items-center mt-10 ">
                        <div class="grid gap-8 items-start justify-center">
                          <div class="relative group">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-red-light to-red-dark rounded-lg blur-lg "> </div>
                            <a class="relative px-7 py-4 hover:shadow-3xl  bg-black rounded-lg leading-none flex items-center divide-x divide-gray-600 duration-500 transition-shadow" href="https://discord.gg/kTPFjXD36Q">
                             Discord
                            </a>
                          </div>
                        </div>
                </div>
            </div>
            <div
                class="invisible w-full px-8 mb-12 rounded-lg cursor-pointer md:visible md:px-0 lg:mb-0 lg:pl-10 md:w-2/3 lg:w-1/2 group">
                <div class="rounded-md ">
                    <img src="{{ asset('img/Logo.png') }}" class="object-cover w-full h-full ">
                </div>
            </div>
        </div>
    </section>

    <div class="text-center font-opensans">
        🟢 Avertissement oral | 🟠 Avertissement écrit & kick | 🔴 Ban temporaire ou permanent | 🔵 Information utile
   </div>
        <div class="flex mx-4 mt-8 mb-32 text-sm md:w-4/5 md:mx-auto font-lato">


            <div class="my-2 mr-4 shadow w-52">
                <ul class="text-2xl text-right list-reset font-bebas leading-wide ">
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:bg-red-light hover:border-red-dark"  onclick="event.preventDefault(); enable(event, 'select-discord');">Règlement Discord</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-termes-rp');">Termes Roleplay</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-basics')">Règles basique</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-rp')">Règles RolePlay (RP)</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-lspd')">Règles Police Sheriff</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-ems')">Règles EMS</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-hrp')">Règles Coma</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-mortrp')">Règles Mort RP</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-illegal')">Règles Illégal</a>
                  </li>
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-legal')">Règles Légal</a>
                  </li>
                  @auth
                  @if (\Auth::user()->players)
                  @if (\Auth::user()->players->group == "admin" || \Auth::user()->players->group == "superadmin" || \Auth::user()->canSeeDashboard())
                  <li >
                    <a href="#" class="block p-4 font-bold text-white border-r-4 rounded-l-full selector-link hover:border-red-dark hover:bg-red-light" onclick="event.preventDefault(); enable(event, 'select-staff')">Règles staff</a>
                  </li>
                  @endif
                  @endif
                  @endauth
                </ul>
              </div>

            <div id="select-discord" class="flex-1 block text-lg select">
                <h3 class="my-8 mt-16 text-xl text-center text-bold">Bienvenue sur le règlement Discord de PearlFive Avant tout sachez que ce liste est non exhausve et qu'elle peut changer.
                </h3>
                <p class="my-4">🟠 1.  Vous devez avoir OBLIGATOIREMENT votre NOM et PRENOM RP et UNIQUEMENT ça, vous ne devez rien ajouter avec ce dernier sous peine d’avoir un warn et un changement de pseudo par le Staff
                </p>
                    <p class="my-4">🟠 2. Les pseudonymes à caractère violents, insultants, sexistes, homphobes, pédophiles, ect... sont interdits. </p>
                <p class="my-4">🟠 3. Toute tentative d'usurpation de l'identité d'autrui est sanctionnable.</p>
                <p class="my-4">🔴 4. La divulgation d'informations privées est interdite.</p>
                <p class="my-4">🟠 5. Le spam, flood est interdit.</p>
                <p class="my-4">🔴 6. La plublicité d'un autre discord, d'un autre serveur, d'une chaine youtube, est formellement interdite.</p>
                <p class="my-4">🟠 7. Tout caractère offensant, discriminatoire, etc… sont strictements interdits ! Exemples : N-Word, P-word (mots ban twitch).</p>
                <p class="my-4"> 🟠 8. Si vous rencontrez un quelconque problème, veuillez vous rendre sur notre Discord afin de contacter un Staff via un ticket. Il est interdit de parler ouvertement de votre problème dans le channel hors-sujet aux yeux d'autres joueurs.</p>
                <p class="my-4">🔴 9. Il est strictement interdit de divulguer des fausses information/mentir aux staffs, cela peut être passible d'un ban définitif.</p>
                <p class="my-4"> 🔵 10. Le staff ne vous demandera jamais vos informations privées.</p>
                <p class="my-4"> 🟢 11. Le grade Admin et Manager ne doivent être, en aucun cas, déranger pour un rien.</p>
                <p class="my-4"> 🟠 12. Femme comme Homme le forcing du genre "passe moi ton snap, je veux avoir une photo de toi ou autres" n'est pas autorisé. Cela s'appelle du FORCE RP est cela peut être punissable !</p>




            </div>

            <div id="select-termes-rp" class="flex-1 hidden text-lg select">

                <p class="my-4"><span class="font-bold">🟠 FREEKILL</span> : Le faite de tuer quelqu’un sans aucune raison. </p>

                <p class="my-4"><span class="font-bold">🟠 CARKILL</span> : Le faite d’écraser quelqu’un avec un véhicule, excepté si cela est justifié par l’action de la scène. </p>

                <p class="my-4"><span class="font-bold">🟢 FREE PUNCH</span> : Le faite de frapper quelqu’un sans aucune raison. </p>

                <p class="my-4"><span class="font-bold">🟠 METAGAMING</span> : Toute utilisation d’informations obtenues de façon Hors-RP (Stream, Discord, Teamspeak, etc…) est passible d’une lourde sanction.  </p>

                <p class="my-4"><span class="font-bold">🟠 POWER GAMING</span> : Les actions irréalisables dans la vraie vie sont interdites. </p>

                <p class="my-4"><span class="font-bold">🟠 NO FEAR RP</span> : Il est impératif que vous agissiez comme vous le feriez IRL. Votre personnage a peur de la mort. Ne faites pas d’actions héroïques, sauf éventuellement si votre background vous le permet.  </p>
                <p class="my-4"><span class="font-bold">🟠 RP DE MASSE</span> : Le RP de Masse signifie que les endroits publics (comme les safes-zones, gouvernement, planque d'organisation) sont remplis de personnage (RP parlant). Donc faites comme si on était plus de 1M en ville sinon vous risquez une SANCTION ! Le RP de Masse à ces limites aussi. </p>
                <p class="my-4"><span class="font-bold">🟠 WIN RP</span> : Le Win RP est le fait que chaque Groupe (Gang / Police) ou personne acteur veuille sortir gagnant d’une scène au détriment du règlement et de la qualité du RP. Il faut parfois accepter de perdre !  </p>
                <p class="my-4"><span class="font-bold">🟠 PAIN RP</span> : Le Pain RP consiste de faire ressentir la douleur lors de vos actions, il est OBLIGATOIRE de faire comprendre au autres joueurs votre situation  </p>
                <p class="my-4"><span class="font-bold">🟠 FORCE RP</span> : Le fait de provoquer quiconque afin de créer des scènes qui n'auraient dû exister.  </p>
                <p class="my-4"><span class="font-bold">🟢 BUNNY</span> : Il est interdit sur le serveur de sauter à plusieurs reprises afin d’esquiver des balles, ou bien d’en profiter pour éviter l’épuisement de votre personnage. </p>
                <p class="my-4"><span class="font-bold">🟠 GRIEF</span> : Le fait de détruire ou d’endommager des biens ou des lieux sans raison valable. Par cette règle sont interdits ce genre de choses : tirer dans un mur sans raison ( GTA ONLINE ). </p>
                <p class="my-4"><span class="font-bold">🟠 COHERENCE RP</span> : Une fois votre personnage créé celui-ci a des origines, un âge, peut-être une appartenance et aussi un background, il vous ai donc obligatoire de le respecter et de vous y tenir en prenant compte de son évolution. Ex: Ne passer passer de gangster a policier et inversement.
                    <p class="text-sm italic">Durant votre RP, il vous arrivera d'être blessé, il est donc obligatoire de suivre les directives des médecins qui vous sont donné.
                    </p>
                </p>
                <p class="my-4">
                    <span class="font-bold">🔴 STREAMSTALK</span> : Le Streamstalk est le fait de récolter des informations sur un stream afin de forcer le RP avec le joueur. <br>
                    <span class="underline">Par exemple</span>, remarquer que le joueur est à un endroit X dans le jeu, alors vous allez à cet endroit afin de rencontrer le streamer.
                </p>
                <br>
                <p class="my-4">
                    Afin qu'un fait avéré de streamhack  ou suspicion de streamhack soit recevable, merci de communiquer les infos suivantes afin de les transmettre au support :
                    <br>

                    - Présence avérée d'un joueur sur le stream alors qu'il est IG et/ou sur la scène<br>
                    - Prise d'informations<br>

                    <span class="underline">Conditions à respecter </span> pour qu'une preuve soit recevable :<br>
                    - Titre du stream<br>
                    - heure + date visibles sur le screen de l'écran<br>
                    - liste des joueurs complète, pas de ""recherche""<br>
                    - aucun montage/assemblage accepté<br>

                </p>
                <p class="mt-8 mb-32 text-center">
                    Les termes, (Freekill, Carkill, Free Punch, Metagaming, Power Gaming, No Fear, Win RP et le Streamstalk) sont interdit sur notre serveur.  <br>
                    Nous tenons à vous souligner que le non respect de ces termes sont sanctionnable
                </p>
            </div>

            <div id="select-basics" class="flex-1 hidden text-lg select">

                <p class="my-4">🟠 - Pour tous les reports inutiles vous serez kick puis ban si récidive. </p>
                <p class="my-4">🟢 - Il est important de respecter les autres joueurs/euses. </p>
                <p class="my-4">🟠 - Il est interdit de jouer un personnage fille en étant un garçon et inversement, sauf raison valable.</p>
                <p class="my-4">🔴 - L’utilisation de bugs ou de logiciels de triche (viseur externe : point rond etc..)est strictement interdite.</p>
                <p class="my-4">🔴 - Moddeur si quelqu’un vous donne de l'argent ou encore une arme sans raison prévenez nous sinon vous risquez d'avoir une sanction ! </p>
                <p class="my-4">🟠 - Il est strictement interdit de se déconnecter ou de quitter le jeu dans le but d’éviter une interaction RP. En cas de crash, prévenez immédiatement sur le Discord dans #chat-général. </p>
                <p class="my-4">🟠 - En RP les insultes on une certaine limites, que ça soit un homme ou une femme.</p>
                <p class="my-4">🔴 - Le RP pédophilie, viol, terroriste est strictement interdit !</p>
                <p class="my-4">🟢 - Facture &amp; Amendes doivent être réglés avant 1 semaine sous peine de sanction ! </p>
                <p class="my-4">🟠 - Si vous êtes tombé dans le coma pendant une scène RP, référez-vous à la catégorie "Règles COMA". Les demandes de revive avec un /report seront supprimés immédiatement. Si récidive > Sanction !
                </p>
                <p class="my-4">🟠 - Le OFF-ROAD n'est autorisé uniquement que pour certains types de motos/véhicules avec des roues tout-terrain obligatoirement, monter les flancs de montagnes avec modération.
                    <p class="my-4">🟢 - Le Code de la route des USA est appliqué sur le serveur. Cependant il est possible de marquer un simple arrêt à un feu rouge. A un feu rouge, il est possible de tourner à droite sans s'arrêter.
                    </p>
                    <p class="my-4">🔴 - Le <span class="font-bold">StreamStalk / StreamHack</span> est formellement <span class="font-bold">interdit</span>, vous ne pouvez à aucun moment être sur le Stream de quelqu’un tout en étant connecté. </p>
                    <p class="my-4">🟢 - Le <span class="font-bold">Fairplay est essentiel</span> pour que tout le monde puisse s’amuser, il faut avoir en tête que vous ne pouvez pas tout le temps gagner et que toutes scènes amènent du RP.</p>
                    <p class="my-4">🔴 - Tous propos à caractère insultant, racial, homophobe, misogyne sont interdits sauf cohérence RP.</p>
                    <p class="my-4">🟠 - Il est interdit d'utiliser le  /porter (/p en jeu) si vous êtes sur un véhicule deux roues, ou si votre véhicule ne peut accueillir d'autres personnes que son nombre de sièges disponibles.</p>
                    <p class="my-4">🔵 - AUCUN REMBOURSEMENT ne se fera sans preuves à l'appui ! Screens (d’une facture, de votre inventaire, avec moyen de voir date et heure de votre bureau) Vidéos acceptées et conseillées !
                    </p>
                    <p class="my-4">🔵 - Sur PearlFive. Le seul P2 que vous pourrez jouer sera un animal sur demande !
                    </p>
                </p>
                <p class="my-4">🟢 - Dans le respect de la cohérence RP, il est attendu des joueurs de ne pas employer un vocabulaire irréaliste ou faisant clairement référence au HRP ; ainsi, on ne dit pas :

                    Chewing-gum sous la chaussure -
                    Continent -
                    Citoyens basiques -
                    Dieux -
                    Etre dans sa tête -
                    Faire des runs -
                    Hautes instances -
                    Mal de tête -
                    Moldu -
                    Muscle touche clavier -
                    Perdu(e) dans mes pensées -
                    Problème cerveau -
                    Rocade -
                    Saute un coup -
                    Unité X -
                    Tu l'entends ? / vous l'entendez ?
                    </p>
            </div>

            <div id="select-hrp" class="flex-1 hidden text-lg select">

                <p class="font-bold">Lors d'une perte de connaissance : </p>
                <p class="my-4">🟠 - Vous ne pouvez plus communiquer (radio, téléphone , vocal ig etc...), vous pouvez néanmoins frémir, suffoquer, etc. </p>
                <p class="my-4">🟠 - Si un policier est proche de votre corps, vous devez obligatoirement attendre l'arrivée des médecins.</p>
                <p class="my-4">🟢 - Pendant une interaction avec les policiers si aucun médecin n'est présent en ville, vous devez obligatoirement attendre les autorités à la sortie de l'hôpital. Rappelezvous que vous êtes dans un hopital, il y a des internes. Donc vous n'etes pas seul ! </p>
                <p class="my-4">🔴 - Il est interdit d’utiliser quelconque alternative pour échapper à la perte de connaissance.
                </p>
                <p class="my-4">🔴 - Il est strictement interdit de faire perdre connaissance à autrui sans motif réel.
                </p>
                <p class="my-4">🔵 - Lors d'une perte de connaissance, vous ne pouvez pas vous souvenir de ce qui se passe durant votre inconscience. Cependant, vous vous souvenez de ce qu'il s'est passé avant cette perte de connaissance, ayez cependant une attitude logique, si par exemple vous avez reçu un coup de crosse, vous vous rappellerez progressivement avoir reçu un coup sur la tête, mais vous ne vous rappellerez pas directement de l'intégralités des détails, celà doit se faire de façon progressive et logique.
                </p>
                <p class="my-4">🔴 - Si vous êtes touché par balle, vous ne pouvez pas repartir "au combat" durant la même soirée.
                </p>

                {{-- <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Discord </h4> --}}
                </div>

            <div id="select-rp" class="flex-1 hidden text-lg select">

                <p class="my-4">🔵 - Si un agent de police oublie de vous retirer votre téléphone, sont usage doit se faire intelligement. Cependant, n'oubliez pas qu'au sein d'un PDP, il y a des caméras de partout !  </p>
                <p class="my-4">🔵 - Les seules radios qui sont considérées comme RP sont achetée en ville. </p>
                <p class="my-4">🟠 - Il est <span class="font-bold">interdit d’être AFK dans les lieux public</span> à la vue de tout le monde. </p>
                <p class="my-4">🟠 - <span class="font-bold">N’interrompez jamais votre scène</span>, même si la personne en face de vous commet une erreur (volontaire ou pas). Essayer de contacter au plus vite un membre du staff grâce au /report afin qu’il puisse vous regarder. </p>
                <p class="my-4">🟠 - Il est interdit de voler et d’utiliser des hélicoptères, avion. Enlever armes appartenant PNJ. </p>
                <p class="my-4">🟠 - Il n’y a pas de zone safe, cependant au <span class="font-bold underline ">commissariat</span> et à <span class="font-bold underline ">l’hôpital</span> il est fortement conseillé de respecter  le mass RP. Il est donc interdit de tuer dedans sauf cas particulier.</p>
                <p class="my-4">🟢 - Les métiers représentant l’état sous toutes ses formes (EMS, LSPD, Avocat ainsi que le Gouverneur et ses employés) ne peuvent pratiquer des activités illégales sauf cas particulier. </p>
                <p class="my-4">🔵 - Les plats préférés de dimax sont Rambo et Chibs. </p>
                <p class="my-4">🔵 - Toute personne entrant dans un quartier, base organisation/gang, sans y être invité s'expose à une MORTRP, ( sous réserve d'annulation si abus )Souvenez vous : MASSRP .</p>
                <p class="my-4">🔵 - Il est bien évidemment interdit de demander l’identité d’une personne dans le coma, car celle-ci ne peut pas communiquer. Référez-vous à la catégorie : Règles COMA </p>
                <p class="my-4">🔵 - Toute photo/vidéo prise doit se faire avec le téléphone sortit, sinon la photo ne sera pas prise en compte.</p>
                <p class="my-4">🔵 - Lors d’une agression, vous devez attendre les ordres de votre/vos agresseur(s) pour appeler un ambulancier ou respawn s’il n’y a aucun ambulancier en service. Se référer à la catégorie : Règles EMS </p>
                <p class="my-4">🔵 - Si un agent de police oublie de vous retirer votre téléphone, l’usage de SMS est uniquement autorisé. Cependant, n’oubliez pas qu’au sein d’un PDP, il y a des caméras de partout !
                </p>
                <p class="my-4">🟠 - L’agresseur ne peut pas forcer quelqu’un à respawn (prendre les internes) si il y a aucun ambulancier (joueur) de connecté </p>
                <p class="my-4">🟠 - Le retour dans votre quartier pendant une scène est interdit pendant une course poursuite ! </p>
            </div>

            <div id="select-lspd" class="flex-1 hidden text-lg select">
                <p class="text-center font-bold underline"> Lorsque vous êtes au commissariat, vous êtes soumis à l’autorité des agents du LSPD.
                </p>

                <p class="my-4">🟠 - Un minimum d'interaction (dialogue, tir de sommation) est nécessaire avant de neutraliser une cible hostile. A savoir que vous ne pouvez tirer qu’après 3 sommations.</p>
                <p class="my-4">🟠 - Interdiction d'acheter des véhicules de fonction, un véhicule vous sera attribuer directement par un Etat Major</p>
                <p class="my-4">🟠 - Interdiction de faire une quelque modification sur les véhicules de fonction</p>
                <p class="my-4">🟢 - Interdiction de fouiller d’un(e) citoyen(ne) sans son accord au préalable. Si la fouille se fait, elle doit se faire de dos  </p>
                <p class="my-4">🔵 - Le port d’une arme d’assault est interdit sauf sous autorisation d’un plus haut gradé (Lieutenant minimum)</p>
                <p class="my-4">🔵 - le LSPD s’expose à une altercation s’il approche de trop près un point chaud (point de drogue, etc…), d'un quartier. CohérenceRP et MassRP. </p>
                <p class="my-4">🔴 - Aucun policier corrompu est toléré. Il s'agit d'un RP 100% légal ! </p>
                <p class="my-4">🔵 - Si vous êtes un ancien agent du LSPD qui a démissionné ou qui a été licencié, vous perdez l’accès aux fichiers confidentiels tels que les casiers judiciaires, etc… </p>
                <p class="my-4">🟢 - Les négociations d’une prise d’otages avec la police doivent se faire avec un «négociateur» en aucun cas cela doit se dérouler via Mail si ce n’est, pour envoyer une photo prouvant le bon état de santé de la victime.</p>
                <p class="my-4">🔴 - Il est interdit de percuter les fugitifs pour les arrêter, sauf dans le cas de grosses interventions. Cependant il est autorisé de couper la route, de tirer dans les roues, de tazer et de tirer sur les fugitifs seulement après que les fugitifs aient ouvert le feu. De plus, la possibilité de bloquer le/les fugitif/s est autorisé au  bout de 15mins de course poursuite </p>
                <p class="my-4">🔵 - Il est néanmoins autorisé que le LSPD ouvre le feu si danger imminent. (braquer un homme du LSPD.)</p>
                <p class="my-4">🟠 - Pour effectuer une intervention en tenue ou véhicule civil, une «opération spéciale» doit être mise en place.</p>
                <p class="my-4">🟠 - Un policier en civil ne peut pas porter d'armes ni arreter ou controler des personnes. Dans le cas d'investigations, le policier doit avoir un badge sur lui.</p>
                <p class="my-4">🔵 - Lors d'une arrestation LSPD ou BCSO ont 15mn a partir du moment où l'individu interpelé monte dans le véhicule pour citer les droits Miranda</p>
            </div>

            <div id="select-ems" class="flex-1 hidden text-lg select">
                <p class="text-center font-bold underline"> Lorsque vous êtes à l’hôpital vous êtes soumis à l’autorité des médecins.
                </p>
                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Médecin</h4>
                <p class="my-4">🔵 - Soyez imaginatifs et profitez un maximum de ce que vous avez à disposition dans l'hôpital. Faites votre propre histoire, vos propres scène. Ne vous laissez pas guider par le patient pour les soins.</p>
                <p class="my-4">🟠 - Pour intervenir sur une scène Rp où vous devez soigner une personne vos êtes oblige à avoir votre tenu sous penne de sanction.</p>
                <p class="my-4">🔵 - Un médecin est tenu au <span class="font-bold">secret professionnel</span> et au <span class="font-bold">serment d’Hippocrate</span> et doit soigner toutes personnes peu importe son identité.</p>

                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Soin</h4>
                <p>
                    🔵 - Lorsque vous êtes EMS vous devez respecter <span class="font-bold">un quota de temps</span> pour soigner une victime. <br>
                    <span class="underline">Exemple</span> : Si la personne fait un accident de voiture vous ne lui mettez pas juste un pansements et il repart. Prodiguez lui des soins, amenez le à l’hôpital, faites des opérations si nécessaire et mettez lui une attelle voir un plâtre avec béquille.  Toujours faire en fonction de ce que vous voyez et de l'état du patients.
                </p>
                <p>🔵 - Une <span class="font-bold">opération</span> ne se doit d’être pris <span class="font-bold">à la légère</span>, si vous déterminez qu’il lui faut une opération faites un bilan médical, avec dedans écrit la cause de l’accident, les dégâts et effet sur le patient, détaillez bien son cas et ne faite pas une opération juste parce que vous en avez envie.</p>

                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Rapport</h4>
                <p class="my-4">🔵 - Il est <span class="font-bold">important</span> de noter vos <span class="font-bold">interventions, nature de la blessure, identité de la personne soignée, date et heure, et facturation</span> sur l'intranet.</p>
                <p class="my-4">🔵 - Certaines blessures graves peuvent amener à un <span class="font-bold">suivi médical</span> du patient et donc lui programmer des rendez-vous et des arrêts de travail qu’il se doit de respecter. Si vous voyez la personne courir après que vous lui ayez mis un plâtre et mis en chaise roulante n’hésitez pas à venir en “Attente Aide”</p>
                <p class="my-4">🔵 - Le <span class="font-bold">PDG</span> de l’hôpital pourra être amené à <span class="font-bold">partager</span> ses dossiers avec le <span class="font-bold">LSPD</span> si il doit mener une enquête.</p>

                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Civil</h4>
                <p class="my-4">🟠 - Le respawn est <span class="font-bold">interdit</span> lorsqu’un ambulancier est en ville. </p>
                <p class="my-4">🟠 - Lorsqu’un ambulancier intervient dans une scène RP et que vous nécessitez un soin particulier vous devez absolument respecter leurs décisions et jouer suivant ce qu’il vous dit.</p>
                <p class="my-4">🟠 - Interdiction d'appeler un EMS pour le braquer, ou le faire sur une scène d'intervention de leur part.
                </p>
                <p class="my-4">🟠 - Si pas d’EMS en service, INTERDICTION de sortir “ Je vais appeler l’Unité X” ! Vous allez à l'hôpital tout de même et vous faites une scène avec les internes. Selon votre blessure, respectez un temps de repos en fonction bien évidemment de la blessure. Une blessure par balle vous n’allez pas repartir au bout de 2 minutes comme si c’était une blessure pour un ongle cassé.
                        <br>
                        <br>
                    Temps à respecter si pas d’EMS Joueur en service :<br>
                    Blessures légères : 10 minutes<br>
                    Blessures graves : 15 minutes<br>
                    Blessures lourdes : 25 minutes.<br>
                </p>
                <p class="my-4">🟠 - Rappelez vous du PainRP, vous n'êtes que des Hommes. Si vous passez souvent à la case Hôpital. Les EMS sont en droit de demander une mort RP sur votre personnage. Vous n'êtes pas immortel, rappelez-vous en !</p>
                {{-- <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Coma</h4>
                --}}

                {{-- <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">MORT RP</h4> --}}


            </div>

            <div id="select-mortrp" class="flex-1 hidden text-lg select">

                🔵 - Vous n'êtes pas immortel, dans des cas particuliers une personne peut subir une mort dite RP (concrètement son personnage et ses biens seront remis à zéro..).

                <p class="my-4">🔵 - Un délai de 3 jours est nécessaire pour mettre en place un wipe de personnage (mort rp ou demande de wipe).  Concrètement, une fois mort, n’attendez-vous pas à pouvoir rejouer dès le lendemain. Il faudra attendre 3 jours !
                </p>
                <p class="my-4">🔵 - Un wipe ne sera pas accepté si votre dernier wipe date d'il y a moins de 31 jours.
                </p>
                🔵 - 3 différents cas peuvent automatiquement amenés à une Mort RP (avec preuves à l’appui évidemment et sur validation du staff) :
                <p class="my-4">🔵 - 1. Les preneurs d'otages peuvent être soumis à une Mort RP si ces derniers ont exécuté des otages pendant la prise d'otage.
                </p>
                <p class="my-4">🔵 - 2. Toutes personnes ayant une carte de fidélité à l'hôpital pour X ou Y raisons.( C-a-d les nombreuses fois où vous passez à l'hôpital ainsi que les nombreux coma que vous pouvez faire. Vous etes un Humain, pas un super héros)
                </p>
                <p class="my-4">🔵 - 3. Les civils qui décident de donner des informations au service du LSPD, avec preuves avérées.</p>
                🔵 - Une mort RP ne peut pas être appliquée de façon improvisée, mais après une validation par le staff , même si cette dernière est amenée par l’une des 3 conditions citées ci-dessus.

                <p class="my-4">🔵 - Si vous voulez faire une demande de mort RP, vous devez contacter un membre du staff et soumettre un dossier détaillé des actions RP vous amenant à commettre cet acte. </p>
                <p class="my-4">🟠 - Bien entendu, la personne n’est pas au courant qu’elle subit une Mort RP, c'est a vous de lui faire comprendre qu’elle va mourir et pas seulement être mise dans le coma. Si l’information fuite, les principaux concernés seront sanctionnés !

                </p>
                <p class="my-4">🔴 - Après une mort RP, il est interdit de jouer un nouveau personnage RP qui a un lien familial avec les anciennes fréquentations. Il s’agit la d”un nouveau personnage, d’une nouvelle vie. Vous souhaitez retrouver votre super meilleur pote de votre vie précédente ? C est non ! Ou du moins pas tout de suite ! </p>
                <p class="my-4">🔴 - Si la personne concernée par la mort RP l'apprend d'une façon ou d'une autre et fait tout pour l'éviter (change son RP, ne se connecte pas... etc), Elle écopera d'un ban temporaire suivi d'un wipe.
                </p>

            </div>
            <div id="select-illegal" class="flex-1 hidden text-lg select">

                <p class="my-4">🔵 - Un masque intégral est obligatoire pour pouvoir utiliser un modificateur de voix.</p>
                <p class="my-4">🔵 - Interdiction de vendre de la drogue en moto.</p>
                <p class="my-4">🔵 - Il est interdit de reconnaître la couleur de la peau ou la voix d’une personne lorsqu’elle possède un masque intégrale. </p>
                <p class="my-4">🔵 - L’utilisation d’un modificateur de voix est autorisée, mais pas obligatoire et à condition que la voix soit audible. [Rappelez-vous que vous ne pouvez reconnaître personne à la voix].
                </p>
                <p class="my-4">🟠 - Il est interdit de faire partie d’un travail gouvernemental en étant membre d’un gang ou d’une organisation. [Sauf exception sous dossier].
                </p>

                <p class="my-4">🟠 - Tout changement d’apparence est strictement interdit sauf la coupe de cheveux et les tatouages.
                </p>

                <p class="my-4">🟠 - Le raccourci RP est strictement interdit [ “ oh, elle est habillée en bleu, donc elle fait partie des marabuntas”].

                </p>

                <p class="my-4">🟠 - Il est toléré de drive by [action consistant à être passager d’un véhicule et de rafale en passant] une personne sous condition de véritable raison rp et une vitesse inférieure à 40km/h.
                </p>
                <p class="my-4">🟠 - Il est strictement interdit de tuer ou de mettre en coma quelqu’un que vous avez braqué et qui a été coopératif avec vous. [Tout de même possible de l'assommer avec un /mec pour qu’elle perde les 15 dernières minutes de souvenir].
                </p>
                <p class="my-4">🟠 - Il est strictement interdit de braquer quelqu’un  dans une zone Safe ou proche d'une zone Safe dans le but de le racketter.
                </p>
                <p class="my-4">🔵 - Pour les gangs merci de respecter le lors de GTA V pour plus de cohérence avec vos personnages.
                </p>
                <p class="my-4">🔵 - LSPD/BCSO/Civil qui souhaitent faire des promenades dans des points chauds (point de drogue) et/ou quartiers sont susceptibles d'être attaqués ou par un joueur illégal ou par le MassRP !
                </p>
                <p class="my-4">🔴 - Toute personne a le droit de voler un véhicule LSPD à l’abandon sur la route et/ou à l’abri minimum des regards. Il ne peut cependant servir que pour une scène et non pour faire l’imbécile en rue et conduire comme un saoul. Le RP de masse doit être de mise lors du vol et de la conduite en rue pour la scène.

                </p>

                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Braquage</h4>
                <p class="my-4">🔵 - Si vous braquez quelqu’un, vous vous exposez à une mort RP s’il vous retrouve de manière RP. </p>
                <p class="my-4">🟠 - Il est interdit de racketter la même personne plusieurs fois dans la journée. </p>
                <p class="my-4">🔴 - Il est interdit de forcer quelqu'un à retirer de l'argent de son compte personnel ou entreprise. </p>
                <p class="my-4">🔵 - Voler des armes à un agent du LSPD doit donner lieu à une scène RP (braquage, enlèvement, prises d’otages,...) et être soumis à une approbation préalable du Staff. </p>
                <p class="my-4">🟠 - Il est interdit de prendre la totalité de ce que la personne a sur elle, juste la moitié [argent, nourriture, farm].
                </p>
                <p class="my-4">🔵 - La limite de braquage est de 2 supérettes, 1 banque et 1 bijouterie tous les 2 jours </p>

                <p class="my-4">🔵 - Pour braquer le Pacifique Bank où toutes autres entreprises vous devez faire un dossier à faire valider par le Staff.
                </p>

                <p class="my-4">🔵 - Tout doit être confisqué physiquement à un otage/victime (Armes, téléphone et radio). Pas qu’une simple parole” Oui tiens je te donne ça”, il doit réellement vous donner l’item !
                </p>

                <p class="my-4">🟠 - Il est interdit de faire un braquage de supérette sans attendre la police pour partir, pour une banque supérieure à 2 otages et pour la Pacifique Bank minimum 4 otages.
                </p>
                <p class="my-4">🔴 - Il est strictement interdit de faire des braquages de manière répétée, sans organisation et sans équipements [masques, armes…]

                </p>
                <p class="my-4">🔵 - Ne pas oublier lors d’un braquage d’avoir du FairPlay ! C’est à dire la partie illégale (Braqueur) ainsi que légale (LSPD) doivent chacune etre fairplay.<br>
                    Pour un braquage :<br>
                    Si LSPD présent, ceux ci dans toujours l optique du Fairplay attendront que le braqueur monte dans le véhicule et LA commence la course<br>
                    Si LSPD non présent au bout de 10 minutes, le braqueur pourra partir<br>


                </p>
                <p class="my-4">🔴 - Il est strictement interdit d’utiliser de “faux otages” pour les braquages [Apu, etc](les connaissances /amis sont autorisées à jouer de faux otages en contrepartie d’une rémunération).

                </p>
                <p class="my-4">🔵 - Lors d’un braquage, il est interdit d’ouvrir le feu pendant la négociation, cependant si aucun accord ne peut être trouvé, vous avez le droit d’intervenir uniquement après les sommations.

                </p>
                <p class="my-4">🔵 - Pendant le braquage, les négociateurs sont comptés comme intouchable. Si le LSPD veut faire un assaut, la partie adverse sera avertie, et vice-versa

                </p>
                <p class="my-4">🔴 - Il est interdit de se rendre dans une banque ou une supérette dans le but de déposer/retirer de l’argent ou d’acheter des provisions lorsque celle-ci est déjà attaquée, il est également interdit de se joindre aux assaillants si vous ne faites pas parti du groupe qui attaque la banque ou la supérette.

                </p>
                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Points de drogues</h4>
                <p class="my-4">🔵 - Pour utiliser les points de drogues, il faut simplement les trouver en interaction RP et faire attention à la police ! </p>
                <p class="my-4">🔴 - Il est interdit de se déconnecter sur un point de drogue ! </p>
                <p class="my-4">🔴 - Il est obligatoire d'utiliser un gros véhicule style van ou hors route pour faire de la drogue. Que ce soit pour récolter, transformer ou vendre. </p>
                <p class="my-4">🟠 - Il est interdit de tirer à vue sur le point de drogue. Nous priorisons les scènes RP aussi minimalistes soient-elles.
                </p>
                <p class="my-4">🔴 - Interdiction de braquer pour obtenir un point !</p>

                <p class="my-4">🔵 - Si vous décidez de donner des informations sur les points illégaux aux services du LSPD, vous vous exposez à une mort RP si des preuves sont décelées.</p>


                <p class="my-4">
                    🔴 - Il est INTERDIT d’aller sur les points illégaux en hélicoptère/avions, ou dans un véhicule de service [Taxi, Camion, etc.].
                <p>
                    <p class="my-4">
                        🔵 Prix d'achat des points de drogues pour un trajets complet les prix minimums sont les suivants : <br>
                        Weed : 150 k $<br>
                        Coke : 250 k $<br>
                        Fantanil : 450 k $<br>
                        Meth : 500 k $<br>
                        Optium : 600k $
                    <p>


                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Armes</h4>
                <p class="my-4">🔵 - Un minimum d’interaction (dialogue, tir de sommation) est nécessaire avant de neutraliser une personne. [Sauf dans le cas où elle est hostile : coup de feu déjà tiré...etc].</p>
                <p class="my-4">🔴 - Il est strictement interdit de voler les armes gouvernementales.</p>
                <p class="my-4">🔵 - Il est toléré pour un gang de sortir une arme à feu avec de vrais raisons RP tout en privilégiant les armes blanches . [Vous êtes un gang de rue, favorisé les armes blanches ou contondantes].
                </p>
                <p class="my-4">🔴 - Il est strictement interdit pour un gang d’avoir au-dessus d’une catégorie de pistolet mitrailleur. Il faut que ça soit cohérent avec votre RP.
                </p>
                <p class="my-4">🔵 - Les armes à deux mains [qu'il s'agisse d'armes de mêlée ou bien des fusils] doivent désormais être sorties d'un sac ou d'un coffre de véhicule.
                </p>
                <p class="my-4">🔴 - Les Gunfights sans raison apparente seront sanctionnés par le Staff, il faut une réelle raison d’agresser quelqu’un.
                </p>
                <p class="my-4">🔵 - Le pistolet est le seul considéré légal. Il est considéré comme une arme de défense personnelle. Toute autre arme est totalement interdite et peut entraîner une accusation criminelle de possession d’arme illégale [SMG, Micro-SMG, AK-47, etc;]
                </p>

                <p> 🔴 - Toutes duplications d’armes se verront sanctionnées d’un bannissement permanent.</p>

                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Gang/Organisations</h4>
                <p class="my-4">🔵 - Le prérequis pour avoir un gang/organisation est de 3-5 personnes minimums.</p>
                <p class="my-4">🔵 - Il est interdit de s’associer entre organisations/gang [Toute collaboration/alliance est strictement interdite] Une collaboration sur le court terme peut être tout de même autorisée si un accord financier a été trouvé au préalable de la scène [respect de la logique RP est de mise pour cette règle].
                </p>

                <p class="my-4">🔵 - Le maximum de personnes dans un gang/organisation est de 20 personnes.
                </p>
                <p class="my-4">🔴 - Interdiction de retourner dans son quartier/base ou dans une zone safe pour éviter la scène. Elle doit tout de même se poursuivre si la règle n’est pas respecté.
                </p>
                <p class="my-4">🔴 - Le mass RP est à prendre en compte dans les quartiers ainsi que les bases. Même si les joueurs ne sont pas là, les PNJ’s le sont bel et bien et sont à prendre en compte !
                </p>
                <p class="my-4">🔵 - Gardez une cohérenceRP et une LogiqueRP (couleurs, origines, signes distinctifs, véhicules, types d'armes, façon de parler)
                </p>
                <p class="my-4">🔵 - Si une guerre éclate, elle doit être validée par le staff.</p>
                </div>

            <div id="select-legal" class="flex-1 hidden text-lg select">

                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Entreprise</h4>
                <p class="my-4">🔴 - Il est interdit de se servir dans le coffre de son entreprise comme si c'était le sien, un fonctionnement administratif et financier est obligatoire (Ex: Frais, bénéfice, chiffre d'affaire... etc) a déclarer aux services financiers IRS. Un maximum de 30% du bénéfice est percevable pour les primes et salaires des employés y compris le patron.</p>
                <p class="my-4">🔵 - Pour toutes demandes de création d’entreprise : veuillez faire un dossier propre avec toutes les catégories essentielles au bon lancement d’une entreprise. Une fois le dossier propre fait, dirigez vous au support et faites un ticket.
                </p>
                <p class="my-4">🔵 - Interdiction de poser des questions qui peuvent se répondre en RP, via les tickets ! Par exemple : Est ce que le Unicorn est disponible à l’achat.
                </p>
                <p class="my-4">🔵 - Pour toutes demandes de création d’entreprise, en plus du dossier un montant de 100 000$ vous sera demandé. Ce n’est pas rien un patronat ! Il y a des responsabilités et voilà votre responsabilité première !
                </p>
                <p class="my-4">🔵 - Pour chaque reprise/échange de propriétaire, la présence d’un agent du gouvernement (Agent du Gouvernement, LSPD, BCSO) est OBLIGATOIRE ! Sans ça la passation d’entreprise ne peut se faire. Une fois la présence validée, toute la trésorerie se fera prendre ! Un fond sera laissé pour les salaires mais comme chaque nouveau patron, vous recommencez de 0 !
                </p>
                <p class="my-4">🔵 - Une comptabilité est demandée pour chaque entreprise ! Si cela n’est pas fait, l’entreprise peut être fermée pour 3 jours le temps que la comptabilité soit à jour/faite ! </p>
                <p class="my-4">🔵 - Si inactivité de l’entreprise sous 2 semaines, elle se verra mise en vente sans retour possible !
                </p>

                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Civil</h4>

                <p class="my-4">🟠 - Vous devez utiliser uniquement le véhicule d’entreprise qui vous est donné par l’entreprise pour les métiers de récolte. INTERDICTION d’utiliser le véhicule d’entreprises pour des fins personnels !
                    .</p>
                <p class="my-4">🔴 -  Il est interdit de rester AFK sur le serveur pour récolter le salaire (AFK Farm)
                </p>
                <p class="my-4">🔵 - Les annonces entreprises IG peuvent se mettre à intervalle de 30 minutes entre elles ! </p>
                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Civil</h4>
                <p class="my-4">🔵 -  L’argent Propre ou sale n’est pas identifiable IG. Les billets ne peuvent pas à l'œil nu d’un humain être identifiable comme sale.
                </p>
                <p class="my-4">🔵 -  Si le LSPD arrête un civil et que celui-ci a plus de 3 000$ d’argent propre+sale. Le LSPD est dans son droit de demander la provenance de cet argent. Si le civil n’est pas capable d’y répondre, la police peut saisir l’argent en question (propre+sale)</p>
                <p class="my-4">🔵 - La notion d’argent “sale” signifie que l’argent a été acquis illégalement et qu’il est donc nécessaire de le blanchir pour lui donner une provenance légale.</p>



            </div>

            <div id="select-staff" class="flex-1 hidden text-lg select">

                <h4 class="my-8 text-3xl font-bold font-bebas leading-wider">Règlement Staff </h4>
              <p class="my-4"> 1.0 - Interdiction d’abuser de ces permissions pour faciliter le RP d’une quelconque mesure.</p>

              <p class="my-4"> 1.1 - Pour tout événement nécessitant d’utiliser ces permissions veuillez en parler aux autres membres du staff.</p>

              <p class="my-4"> 1.3 - La permission pour voir les noms des joueurs doit se faire uniquement lorsque vous êtes en mode Modération.</p>

              <p class="my-4"> 1.5 - Aucune insulte / manque de respect envers autrui n’est tolérée au sein du staff. ( Sauf si c'est du second degré).</p>

              <p class="my-4"> 1.6 - Si un dossier de mort RP est fait envers un membre du staff, il est absolument interdit de lui en parler ou de lui en faire sous-entendre. Exemple : Un joueur crée un dossier de mort RP envers mon personnage Anthony Xavier je ne dois sous aucun prétexte être au courant de ce dossier ni de participer à l’acceptation de ce dossier.</p>

              <p class="my-4"> 1.7 - Aucune fuite d’informations privés / spoil n’est tolérée tant que le Staff n’a pas donné son approbation, en cas de non respect de cette règle un ban définitif du serveur est encouru.</p>

              <p class="my-4"> 1.8 - Chaque absence longue d’une période supérieure à 3 jours doit être signalée dans le channel #absences sous peine de rétrogradation.</p>

              <p class="my-4"> 1.9 - Chaque personne du staff doit valider ces règles et les respecter, tout manquement à ces règles sera sanctionnée !</p>

              <p class="my-4"> 2.0 - Une fois qu'un modérateur s'occupe d'un ticket aucun autre membre du staff doit s'en occuper !</p>
              <p class="my-4"> 2.1 - Les tickets sont obligatoirement refermables 24h après la création du ticket.</p>

              <p class="my-4"> 2.2 - Les Staff ont interdiction de "squatter" le channel besoin d'aide si aucun de joueur n'est avec vous.</p>

              <p class="my-4"> 2.3 - Si un joueur à un problème avec un membre du staff c'est uniquement les administrateurs ainsi que le manager qui s'occupe de régler le problème.</p>

              <p class="my-4"> 2.4 - Les tickets que vous résolvez vous devez les fermer, plus aucun autre membre du staff fermera les tickets.</p>

              <p class="my-4"> 2.5 - Un ticket ou y'a rien dedans doit être fermé ! </p>

              <p class="my-4"> 2.6 - Toujours dire un petit " Bonjour je peux vous aidez ? " et la mention du joueur. </p>

              <p class="my-4"> 2.7 - Une fois le ticket réglé demander lui " Avez-vous d'autres questions ? ".</p>

              <p class="my-4"> 2.8 - Tout ticket sans réponse de leur part sera une fermeture du ticket.</p>

              <p class="my-4"> 2.9 - Une vérification de tous les tickets doit se faire assez souvent de votre part.</p>

              <p class="my-4"> 3.0 - Tout ticket comportent " ** dossier , Org ou encore Gang " ne doit pas être fermé.</p>

              <p class="my-4"> 3.1 - La mention everyone ou here ne sert uniquement pour des trucs HRP du genre redémarrage du serveur ! ou autres et la mention whitelist sert uniquement à un événement ou un sondage ou autres. </p>

              <p class="my-4"> 3.2 - Avant le wype de quelqu'un, veuillez prévenir la banque afin qu'elle agisse sur les comptes etc…</p>

              <p class="my-4"> 3.3 - Je le rappelle pendant une réunion staff interdit d'être sur un jeu vidéo une distraction !</p>

              <p class="my-4"> 3.4 - Vous avez interdiction de modérer votre propre scène si jamais il y'a un souci à appeler un autre modérateur ou une personne neutre pour tout jugement.</p>

              <p class="my-4"> 3.5 - Interdiction de se give des armes pour uniquement s'amuser ! vu que l'anti cheat fait qu'à sa tête et des joueurs sont bannis pour ça.</p>

              <p class="my-4"> 3.6 - Ne jamais interrompre une scène que ça soit un staff ou encore un joueur ! </p>

              <p class="my-4"> 3.7 - En tant que staff essayez de favoriser le rp légal. </p>

              <p class="my-4"> 3.8 - Les scènes en tant que modérateur exemple: Je décide de faire une scène illégale parce que les flics s'ennuient, ne sont plus autorisés. Par contre si vous décidez de faire une scène légal tel que un évènement ou autres c’est possible ! </p>

              <p class="my-4"> 3.9 - La nuit ou non vous n'avez pas le droit de vous amuser sauf si les joueurs qui sont autour de vous sont d’accord exemple: si je décide de faire peur aux joueurs je leur demande en HRP sur discord.</p>
              <p class="my-4">
                Message du responsable : Vous êtes des staffs donc les représentants du serveur vous devez avoir une image très pro et propre même si ce n’est pas évident je vous souhaite bonne chance à tous et bon courage.

              </p>

             </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    function disableAll() {
        var selects = document.getElementsByClassName("select");
        for (var i = 0; i < selects.length; i++) {
            item = selects.item(i);

            if (item.classList.contains('block')) {
                item.classList.remove('block');
            }

            if (!item.classList.contains('hidden')) {
                item.classList.add('hidden');
            }
        }
    }

    function disableAllLink() {
        var selects = document.getElementsByClassName("selector-link");
        for (var i = 0; i < selects.length; i++) {
            item = selects.item(i);

            if (item.classList.contains('bg-red-600','border-red-600')) {
                item.classList.remove('bg-red-600','border-red-600');
            }
        }
    }

    function enable(event, id) {
        disableAllLink();
        disableAll();

        document.getElementById(id).classList.remove('hidden');
        document.getElementById(id).classList.add('block');

        event.target.classList.add('bg-red-600','border-red-600');
    }
</script>
@endpush
