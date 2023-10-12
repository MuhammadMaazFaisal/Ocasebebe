@include('layouts.head')
@include('layouts.navbar')


<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">VENEZ NOUS RENDRE VISITE</li>
            </ol>
        </nav>
    </div>
    <div class="category-banner-container bg-gray">

        <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('assets/images/demoes/demo4/slider/slide-3.jpg');">
            <div class="container position-relative">
                <div class="row">
                    <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                        <div class="coupon-sale-content">
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">VENEZ NOUS RENDRE VISITE
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container contact-us-container">
        <div class="contact-info">
            <div class="row mt-5">
                <div class="col-sm-4 col-lg-4">
                    <div class="feature-box text-center">
                        <i class="fa fa-map-marker-alt"></i>
                        <div class="feature-box-content">
                            <h3>Notre magasin</h3>
                            <h5>Notre showroom se trouve à Dakar précisément aux 2 voies camp pénal Liberté 6 en face de la Mosquée ABASSE SALL, côte à côte de CORIS BANK.</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="feature-box text-center">
                        <i class="far fa-calendar-alt"></i>
                        <div class="feature-box-content">
                            <h3>Horaires d'ouvertures</h3>
                            <h5>Lundi - Dimanche: 09h00 à 20h00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="feature-box text-center">
                        <i class="fa fa-mobile-alt"></i>
                        <div class="feature-box-content">
                            <h3>Service Clients</h3>
                            <h5><a href="tel:+221 77 390 85 83">+221 77 390 85 83</a> <br> <a href="tel:+221 77 200 08 39">+221 77 200 08 39</a> <br> Email: <a href="mailto:ocasebebe@gmail.com"> ocasebebe@gmail.com</a></h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mt-6 mb-2">Send Us a Message</h2>

                <form class="mb-0" action="#">
                    <div class="form-group">
                        <label class="mb-1" for="contact-name">Nom
                            <span class="required">*</span></label>
                        <input type="text" class="form-control" id="contact-name" name="contact-name" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="contact-name">Téléphone
                            <span class="required">*</span></label>
                        <input type="text" class="form-control" id="contact-name" name="contact-name" required />
                    </div>

                    <div class="form-group">
                        <label class="mb-1" for="contact-email">Email
                            <span class="required">*</span></label>
                        <input type="email" class="form-control" id="contact-email" name="contact-email" required />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="contact-name">Objet
                            <span class="required">*</span></label>
                        <input type="text" class="form-control" id="contact-name" name="contact-name" />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="contact-message">Message
                            <span class="required">*</span></label>
                        <textarea cols="30" rows="1" id="contact-message" class="form-control" name="contact-message" required></textarea>
                    </div>

                    <div class="form-footer mb-0">
                        <button type="submit" class="btn btn-dark font-weight-normal">
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.5342774439027!2d-17.47009382672566!3d14.738902785764006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec10b6c0ddfbdf7%3A0x72919fddd239262e!2sO&#39;CASE%20BEBE%20DAKAR!5e0!3m2!1sen!2s!4v1696442987128!5m2!1sen!2s" width="100%" height="620" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
