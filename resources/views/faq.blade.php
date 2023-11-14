@include('layouts.head')
@include('layouts.navbar')

<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Questions fréquemment posées</li>
            </ol>
        </nav>
    </div>
    <div class="category-banner-container bg-gray">

        <div class="category-banner banner text-uppercase"
            style="background: no-repeat 60%/cover url('assets/images/demoes/demo4/slider/slide-3.jpg');">
            <div class="container position-relative">
                <div class="row">
                    <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                        <div class="coupon-sale-content">
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Questions fréquemment posées
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="container contact-us-container">


            <div class="row">

                <div class="col-lg-8 mx-auto">
                    <h2 class="mt-6 mb-1 text-center">Questions fréquemment posées</h2>
                    <div class="tabs mb-5 mt-5">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-popular" data-toggle="tab" href="#popular-content"
                                    role="tab" aria-controls="popular-content" aria-selected="true">Paiement</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="recent-tab" data-toggle="tab" href="#recent-content"
                                    role="tab" aria-controls="recent-content" aria-selected="true">Livraison</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Réclamation-tab" data-toggle="tab" href="#Réclamation-content"
                                    role="tab" aria-controls="Réclamation-content"
                                    aria-selected="true">Réclamation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Adresse-tab" data-toggle="tab" href="#Adresse-content"
                                    role="tab" aria-controls="Adresse-content" aria-selected="true">Adresse et
                                    horaire</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="popular-content" role="tabpanel"
                                aria-labelledby="tab-popular">
                                <div id="accordion">
                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Quels sont les différents modes de paiement dont vous disposez ?
                                        </a>

                                        <div id="collapseOne" class="collapse mb-3" data-parent="#accordion">
                                            <p><strong>Paiement en ligne</strong></p>
                                            <p>Aujourd'hui, vous pouvez payer vos achats par Orange Money & Wave.</p>
                                            <p><strong>Paiement à la livraison </strong></p>
                                            <p>A Ô’CASE BÉBÉ nous vous proposons de payer votre commande à la livraison.
                                                La facture sera envoyée à votre adresse indiquée dès que le livreur aura
                                                quitté notre boutique.</p>
                                            <p><strong>Paiement direct Wave avec le code marchand ou TPE</strong></p>
                                            <p>Les clients possédant l'application Wave ou la carte bancaire peuvent
                                                utiliser ce mode de paiement à la fois simple, sécurisé et qui répond à
                                                la principale norme de sécurité du marché.</p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                            Où est ma facture ?
                                        </a>

                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <p>Une fois que nous aurons validé votre commande depuis notre boutique. L'
                                                article et la facture vous sera envoyé par un de nos livreur.</p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="true"
                                            aria-controls="collapseThree">
                                            J'ai un problème avec le paiement à la caisse.
                                        </a>

                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <p>Si vous rencontrez des problèmes lors de la commande, cela peut être dû
                                                au fait que vous essayez de payer avec une carte ou un mode de paiement
                                                que nous ne prenons pas en charge actuellement. Si aucune de ces
                                                conditions n'est applicable, veuillez vérifier auprès de votre banque
                                                pour vous assurer que votre carte est toujours en validité et qu'il
                                                prend en charge les achats internationaux.</p>
                                            <p>Si vous rencontrez d'autres problèmes, veuillez contacter notre service
                                                clientèle.</p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="recent-content" role="tabpanel"
                                aria-labelledby="recent-tab">
                                <div id="accordion">
                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="true"
                                            aria-controls="collapseFour">
                                            Quels sont vos délais et frais de livraison ?
                                        </a>

                                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                                            <p>Nous offrons une livraison rapide en moins de 24h partout à Dakar. Ô'CASE
                                                BÉBÉ se réserve le droit d'adapter les frais de livraison selon les
                                                spécificités de la commande et surtout son lieu de livraison (par zone).
                                                Vous pouvez toujours contacter notre service client si vous avez
                                                d'autres questions.</p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseFive" aria-expanded="true"
                                            aria-controls="collapseFive">
                                            Puis-je changer mon adresse de livraison ?
                                        </a>

                                        <div id="collapseFive" class="collapse" data-parent="#accordion">
                                            <p>Si vous souhaitez modifier votre adresse de livraison, veuillez contacter
                                                notre service client dès que possible. Afin de maintenir nos délais de
                                                livraison rapides, car votre commande est traitée dès qu'elle est entrée
                                                dans nos différents plateforme digitales. </p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseSix" aria-expanded="true"
                                            aria-controls="collapseSix">
                                            Que se passe-t-il si ma commande est retardée ?
                                        </a>

                                        <div id="collapseSix" class="collapse" data-parent="#accordion">
                                            <p>En cas de retard de transport, veuillez contacter notre service client
                                                pour qu'il vous met directement en rapport avec le livreur pour avoir sa
                                                position.</p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseSeven" aria-expanded="true"
                                            aria-controls="collapseTSeven">
                                            Quand ma commande sera-t-elle envoyée ?
                                        </a>

                                        <div id="collapseSeven" class="collapse" data-parent="#accordion">
                                            <p>Nous nous efforçons d'expédier toutes les commandes de notre boutique
                                                dans un délai de 24h. Veuillez consulter notre page de paiement pour les
                                                options d'expédition et les délais de livraison.</p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="Réclamation-content" role="tabpanel"
                                aria-labelledby="Réclamation-tab">
                                <div id="accordion">
                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseEight" aria-expanded="true"
                                            aria-controls="collapseEight">
                                            Comment faire une réclamation sur un article ?
                                        </a>

                                        <div id="collapseEight" class="collapse" data-parent="#accordion">
                                            <p>Si vous avez reçu un article incorrect ou si l'article n'est pas dans
                                                l'état prévu, veuillez contacter notre service client via ces deux
                                                numéros.</p>
                                            <ul>
                                                <li>+221 77 390 85 83</li>
                                                <li>+221 77 200 08 39</li>
                                            </ul>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseNine" aria-expanded="true"
                                            aria-controls="collapseNine">
                                            Que dois-je faire si j'ai reçu un article endommagé ?
                                        </a>

                                        <div id="collapseNine" class="collapse" data-parent="#accordion">
                                            <p>Si le colis a été endommagé lors de la livraison, vous devez signaler les
                                                dommages. Veuillez également soumettre votre réclamation dans les 3
                                                jours au service client de Ô’CASE BÉBÉ DAKAR et nous vous aiderons
                                                davantage.</p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="Adresse-content" role="tabpanel"
                                aria-labelledby="Adresse-tab">
                                <div id="accordion">
                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseTEN" aria-expanded="true"
                                            aria-controls="collapseTEN">
                                            Où êtes-vous situé ?
                                        </a>

                                        <div id="collapseTEN" class="collapse" data-parent="#accordion">
                                            <p>Sur les 2 voies Liberté 6 en face de la Mosquée ABASS SALL, côte à côte
                                                de CORIS BANK. </p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-accordion">
                                        <a class="card-header collapsed" href="#" data-toggle="collapse"
                                            data-target="#collapseEleven" aria-expanded="true"
                                            aria-controls="collapseEleven">
                                            Quels sont les horaires d'ouverture ?
                                        </a>

                                        <div id="collapseEleven" class="collapse" data-parent="#accordion">
                                            <p>Nous sommes ouvert du Lundi au Dimanche de 09H à 20H.</p>
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


















                </div>
            </div>
        </div>

        <div class="mb-8"></div>
    </div>
    <!-- End .container -->

    <div class="mb-4"></div>
    <!-- margin -->
</main>
<!-- End .main -->
@include('layouts.footer')
