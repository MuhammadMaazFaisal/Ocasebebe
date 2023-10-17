@include('layouts.head')
@include('layouts.navbar')

<main class="main about">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">QUI SOMMES NOUS</li>
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
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">QUI SOMMES NOUS
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-section">
        <div class="container">
            <h2 class="subtitle">QUI SOMMES NOUS</h2>
            <p>Ô’CASE BÉBÉ DAKAR est un magasin où vous pourrez tout trouver pour votre bébé : lit bébé, poussettes,
                berceaux, siège auto, tire-lait, stérilisateur, biberons, vêtements et tous les produit de puériculture.
                Notre showroom se trouve à Dakar précisément aux 2 voies Camp pénal Liberté 6 en face de la Mosquée
                ABASSE SALL, côte à côte de CORIS BANK.</p>
            <p>Nous sommes la première boutique en ligne pour bébés au Sénégal qui combine l’offre d’un supermarché,
                d’une pharmacie ou parapharmacie et d’une boutique de puériculture. Cela nous permet de vous proposer
                les plus grandes marques à des prix compétitifs : Pampers, Chicco, Momeasy, Mastela, Philps Avent,
                Ingenuity, NUK, Biolane, Bright Starts, Florélle, Bebeblinna, Autumnz, Mustela, etc....</p>
            <p>Les produits que nous vous proposons sont authentiques, originaux, afin que vous puissiez en profiter le
                plus longtemps possible. Ne gardez que le meilleur grâce à notre sélection de produits Haute Qualité!
            </p>
            <p>Utilisez les menus ou la recherche pour trouver le produit qu’il vous faut, choisissez votre mode de
                paiement ( ou payer à la livraison) et on vous livre chez vous en 30 minutes. Vous pouvez également
                profiter des meilleures offres, de coupons, de remises et de cadeaux sur vos produits pour bébé.</p>
            <p>Gagnez du temps et de l’argent avec Ô’CASE BÉBÉ DAKAR, à dépenser sur ce qui vous importe le plus : votre
                bébé.</p>
        </div><!-- End .container -->
    </div><!-- End .about-section -->

    <div class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="feature-box bg-gray">
                        <img src="assets/images/banners/11062b_d2db3b4021294993a859885819db9a5f~mv2.jpg">

                        <div class="feature-box-content p-0">
                            <h3 class="mt-3">Qualité</h3>
                            <p>Tous nos produits ont été sélectionnés avec soin et sont rigoureusement contrôlés. Le
                                site est entièrement sécurisé, les photos nombreuses, les descriptions abrégées vous
                                permettent de choisir votre choix dans les meilleures conditions. Nous sommes à votre
                                écoute par téléphone au +221773908583 pour vous conseiller et pour le suivi de vos
                                commandes. </p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-6">
                    <div class="feature-box bg-gray">
                        <img src="assets/images/banners/11062b_daf45dcf200744ac89f81cf314c19abd~mv2.jpeg">

                        <div class="feature-box-content p-0">
                            <h3 class="mt-3">Livraison</h3>
                            <p>Vous recevrez votre produit Ô’CASE BÉBÉ DAKAR directement chez vous dans un emballage
                                simple et pratique. Veuillez noter que vous pouvez être soumis à un délai de 30 minutes
                                à une heure mais que nous faisons le maximum pour qu'il vous parvienne dans les
                                meilleurs délais.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .features-section -->
</main><!-- End .main -->

@include('layouts.footer')
