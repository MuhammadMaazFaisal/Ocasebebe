@include('layouts.head')
@include('layouts.navbar')

<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">POLITIQUE DE LIVRAISON</li>
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
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">POLITIQUE DE LIVRAISON
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container contact-us-container">
        <div class="contact">
            <div class="row">
                <div class="col-12">
                    <div class="mt-5 mb-2">
                        <h2 class="ls-n-25 m-b-1">POLITIQUE DE LIVRAISON</h2>
                        <p>Les produits commandés sont livrés après le règlement du montant total de la commande à
                            l’adresse de livraison que vous avez indiquée lors de votre commande. Nous vous demandons de
                            bien vouloir indiquer clairement lors de la validation de l’adresse de livraison : votre
                            numéro de téléphone (indispensable), et éventuellement l’adresse de votre domicile. Votre
                            commande peut être livrée en moins de 24h partout à Dakar.</p>
                    </div>
                    <div class="mb-2">
                        <h2 class="ls-n-25 m-b-1">Délai</h2>
                        <p>Le délai moyen de livraison de tout produit commandé est de 5 à 8 jours selon les délais
                            postaux. En cas de non-respect de ce délai, Ô'CASE BÉBÉ s’engage à vous informer dès que
                            possible et par tout moyen. Vous aurez alors le choix entre le maintien ou l’annulation de
                            votre commande. Toutefois, Ô'CASE BÉBÉ ne saurait être tenu pour responsable en cas de
                            survenance d’un cas fortuit, d’une rupture de stock ou d’un cas de force majeure qui en
                            gênerait ou en retarderait l’exécution. Toute commande est sujette à notre acceptation et
                            livrable dans la limite des stocks disponibles. En cas de problème sur un produit ou un
                            délai et seulement dans ce cas vous pouvez contacter notre service clientèle au +221 77 390
                            85 83 / +221 77 200 08 39 (coût d’un appel local, ou par WhatsApp) du lundi au dimanche, de
                            9 h 00 à 20 h 00.</p>
                    </div>
                    <div class="mb-2">
                        <h2 class="ls-n-25 m-b-1"> Frais de traitement</h2>
                        <p>La participation forfaitaire aux frais de port et de traitement est indiquée lors de votre
                            commande. Sauf offres exceptionnelles ou livraison en nombre (nous consulter). Les frais de
                            traitement de la commande, les frais d’emballage et les frais de port ne sont pas inclus
                            sauf la livraison. Certaines destinations peuvent nécessiter et engager des frais
                            supplémentaires, alors Ô'CASE BÉBÉ se réserve le droit d'adapter les frais de livraison
                            selon les spécificités de la commande et surtout son lieu de livraison.</p>
                    </div>
                    <div class="mb-2">
                        <h2 class="ls-n-25 m-b-1"> Absence ou problème</h2>
                        <p>En cas d’absence lors de la livraison, un avis de passage est déposé dans votre boîte aux
                            lettres. Vous devrez alors prendre contact avec le transporteur pour une deuxième
                            présentation (gratuite) du colis. Préparée avec le plus grand soin, votre commande vous
                            parviendra dans un emballage adéquat. En cas de problème sur le colis, vous devrez faire les
                            réserves d'usage, si nécessaire, sur le récépissé de transport, en présence du transporteur,
                            avec le nom précis des produits concernés et contacter le service clients de Ô'CASE BÉBÉ. Si
                            à la réception de votre produit, vous constatez que ce dernier n’est pas conforme à votre
                            commande, n’hésitez pas à nous contacter pour nous en informer.</p>
                    </div>
                    <div class="mb-2">
                        <h2 class="ls-n-25 m-b-1">RETOUR ET D'ÉCHANGE</h2>
                        <p>Vous devrez informer Ô'CASE BÉBÉ de votre décision avant de retourner la marchandise en
                            appelant le service après-vente au +221 77 390 85 83 / +221 77 200 08 39 du Lundi au
                            Dimanche de 9h00 à 20h00. Nous pouvons également vous renseigner en cas de problème de
                            service après-vente sur un produit, un délai.</p>
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
