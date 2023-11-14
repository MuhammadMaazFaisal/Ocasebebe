@include('layouts.head')
@include('layouts.navbar')

<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">MODALITÉ DE PAIEMENT</li>
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
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">MODALITÉ DE PAIEMENT
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
                        <h2 class="ls-n-25 m-b-1">MODALITÉ DE PAIEMENT</h2>
                        <p>Vous pouvez régler vos achats Internet directement en ligne sur notre site www.ocasebebe.com
                            par orange money, Wave ou par carte bancaire. Si vous souhaitez régler par chèque bancaire,
                            vous devez informer Ô'CASE BÉBÉ – 2 VOIES LIBERTE 6 EN FACE DE LA MOSQUEE ABASS SALL Dakar,
                            Sénégal. Un délai sera fixé à votre commande et au-delà de ce délai, votre commande sera
                            annulée, et les articles peuvent être attribués à un autre client.</p>
                        <p>Pour tout autre moyen de paiement merci de nous contacter au : +221 77 390 85 83 / +221 77
                            200 08 39. En cas de produit épuisé ou non livrable, seul le remboursement de la somme
                            versée, éventuellement majorée des intérêts légaux, pourra être exigé.</p>
                    </div>
                    <div class="mb-2">
                        <h2 class="ls-n-25 m-b-1"> Sécurité de paiement</h2>
                        <p>Le préfixe https://ssl. en tête de l’URL affichée dans la barre d’adresse du navigateur
                            garantit un réel niveau de sécurité lors de vos transactions. Pour vous garantir un service
                            fiable et sécurisé. Lorsque vous effectuez un règlement par carte bancaire, toutes les
                            données que vous saisissez sont cryptées selon le protocole SSL (Secure Socket Layer), la
                            référence mondiale en termes de sécurisation des transactions électroniques.</p>
                        <p>Aucune donnée de paiement n'est stockée sur notre site. Au moment de votre règlement par
                            carte bancaire sur www.ocasebebe.com, vous êtes connecté en temps réel sur le système de
                            paiement sécurisé. Le service bancaire s'assure que votre carte bancaire est valide (pas
                            d'erreur de saisie, pas d'opposition) et vous confirme directement l'enregistrement de votre
                            règlement en délivrant un ticket récapitulatif de paiement avec le numéro de transaction ou
                            vous informe que la transaction est refusée. IMPORTANT : il est essentiel de ne jamais
                            transmettre vos coordonnées bancaires dans un simple email.</p>
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
