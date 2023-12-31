@extends('admin_dashboard.layouts.master')



@section('content')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">

@endsection

<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <h1 style="text-align: center">Welcome To Admin Dashboard</h1>

        </div>

    </div>

    <div class="row mt-5">

        <div class="col-sm-6 col-xl-3 col-lg-6">

            <a href="{{ route('leads') }}" style="color:#fff">

                <div class="card o-hidden">

                    <div class="bg-primary b-r-4 card-body">

                        <div class="media static-top-widget">

                            <div class="align-self-center text-center">







                                <svg version="1.1" id="Layer_1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">

                                    <style type="text/css">

                                        .st0 {

                                            fill: #FFFFFF;

                                        }



                                    </style>

                                    <g>

                                        <path class="st0" d="M10.63,30.23c1.38,0.13,2.66,0.26,4.12,0.4c0.95-1.76,1.15-3.9,1.47-6c0.43-2.74,0.72-5.52,1.3-8.23

  c0.87-4.05,3.24-6.67,7.54-7.25c0.63-0.09,1.23-0.42,1.84-0.64c0.01-0.13,0.01-0.26,0.02-0.38c-0.47-0.17-0.92-0.41-1.41-0.5

  C22.8,7.12,22.04,5,21.81,2.86c-0.03-0.28,0.34-0.78,0.63-0.9c4.21-1.78,8.44-1.73,12.65,0.04c0.28,0.12,0.62,0.65,0.58,0.94

  c-0.39,2.47-1.18,4.3-3.92,4.73c-0.42,0.07-0.82,0.3-1.23,0.45c-0.01,0.12-0.02,0.24-0.03,0.36c0.6,0.23,1.19,0.58,1.81,0.66

  c4.54,0.6,6.9,3.45,7.73,7.68c0.66,3.34,1.03,6.74,1.55,10.11c0.1,0.66,0.28,1.31,0.44,2.03c3.36-0.4,5.73,1.11,7.48,3.76

  c0.83,1.25,0.64,2.39-0.64,3.15c-6.64,3.98-13.3,7.94-19.98,11.86c-3.08,1.81-6.26,1.99-9.55,0.48c-2.42-1.11-4.98-1.51-7.64-1.08

  c-0.59,0.09-1,0.13-1.31,0.86c-0.26,0.59-1.13,1.22-1.77,1.26c-2.22,0.15-4.46,0.09-6.7,0.05c-1.22-0.03-1.89-0.7-1.89-1.91

  c-0.02-5.99-0.02-11.97,0-17.96c0-1.21,0.64-1.92,1.85-1.96c2.27-0.07,4.55-0.06,6.83,0c1.11,0.03,1.78,0.68,1.84,1.85

  C10.55,29.66,10.6,29.98,10.63,30.23z M32.18,33.43c3-1.4,5.88-2.74,8.65-4.03c-0.31-2.22-0.57-4.26-0.9-6.3

  c-0.41-2.49-0.72-5.01-1.37-7.43c-0.81-3.01-2.84-4.88-6.03-5.37c-0.81-0.13-1.64-0.43-2.35-0.84c-1.07-0.63-1.03-1.79,0.02-2.43

  c0.38-0.23,0.85-0.35,1.3-0.45c2.03-0.45,2.89-1.48,2.94-3.69c-3.83-1.53-7.65-1.52-11.48,0.03c0.3,2.47,0.92,3.16,3.16,3.67

  c0.28,0.07,0.64,0.09,0.83,0.27c0.4,0.38,0.97,0.84,1.01,1.3c0.03,0.45-0.41,1.14-0.83,1.37c-0.75,0.42-1.63,0.66-2.49,0.82

  c-2.42,0.44-4.25,1.72-5.2,3.95c-0.65,1.53-1.08,3.19-1.36,4.84c-0.7,4.04-1.26,8.11-1.9,12.34c1.02,0.65,2.45,0.9,4.02,0.56

  c1.89-0.41,3.82-0.66,5.7-1.09C28.51,30.35,30.64,30.94,32.18,33.43z M10.54,46.11c0.68-0.03,1.19,0,1.68-0.09

  c2.19-0.39,4.27-0.04,6.31,0.76c0.86,0.33,1.76,0.58,2.63,0.9c1.87,0.71,3.74,0.7,5.52-0.19c2.82-1.41,5.66-2.81,8.37-4.4

  c4.32-2.54,8.54-5.23,12.81-7.86c0.57-0.35,1.22-0.68,0.92-1.56c-0.74-2.18-4.3-4.31-6.51-3.5c-3.22,1.17-6.29,2.72-9.32,4.07

  c-0.08,0.92,1.25,1.58,0.03,2.28c-3.38,1.92-6.86,3.6-10.68,4.44c-0.32,0.07-0.72-0.18-1.08-0.28c0.27-0.25,0.5-0.63,0.82-0.74

  c1.47-0.52,3-0.86,4.43-1.46c1.95-0.81,3.84-1.8,5.79-2.73c-0.41-0.7-0.67-1.18-0.95-1.65c-1.21-1.97-2.34-2.51-4.64-2.14

  c-1.7,0.28-3.42,0.53-5.09,0.95c-2.41,0.61-4.62,0.3-6.85-0.79c-1-0.49-2.25-0.52-3.41-0.64c-0.23-0.03-0.74,0.45-0.74,0.7

  C10.53,36.77,10.54,41.36,10.54,46.11z M1.09,38.38c0,2.87,0.02,5.73-0.01,8.6c-0.01,0.86,0.31,1.24,1.18,1.23

  c1.98-0.02,3.96-0.03,5.94,0c0.92,0.01,1.26-0.36,1.25-1.28c-0.03-5.69-0.02-11.38,0-17.07c0-0.91-0.3-1.31-1.24-1.29

  c-1.94,0.04-3.88,0.04-5.82,0c-0.99-0.02-1.33,0.36-1.32,1.34C1.12,32.73,1.09,35.56,1.09,38.38z" />

                                        <g>

                                            <path class="st0" d="M29.23,16.55v0.5c0.33,0.03,0.61,0.1,0.85,0.2c0.24,0.1,0.44,0.26,0.62,0.46c0.14,0.16,0.25,0.32,0.32,0.48

   c0.08,0.17,0.11,0.32,0.11,0.46c0,0.15-0.06,0.29-0.17,0.4c-0.11,0.11-0.25,0.17-0.41,0.17c-0.3,0-0.5-0.16-0.59-0.49

   c-0.1-0.38-0.35-0.64-0.73-0.77v1.92c0.38,0.1,0.69,0.2,0.91,0.29c0.23,0.09,0.43,0.21,0.61,0.37c0.19,0.17,0.34,0.37,0.44,0.61

   c0.1,0.24,0.15,0.49,0.15,0.77c0,0.35-0.08,0.68-0.25,0.99c-0.16,0.31-0.41,0.56-0.73,0.75c-0.32,0.19-0.7,0.31-1.14,0.35v1.15

   c0,0.18-0.02,0.31-0.05,0.4c-0.04,0.08-0.11,0.12-0.23,0.12c-0.11,0-0.19-0.03-0.23-0.1c-0.04-0.07-0.07-0.17-0.07-0.31v-1.25

   c-0.36-0.04-0.67-0.12-0.94-0.25c-0.27-0.13-0.49-0.29-0.67-0.48c-0.18-0.19-0.31-0.39-0.4-0.6c-0.09-0.21-0.13-0.41-0.13-0.61

   c0-0.15,0.06-0.28,0.17-0.4c0.12-0.12,0.26-0.18,0.43-0.18c0.14,0,0.26,0.03,0.35,0.1c0.1,0.06,0.16,0.16,0.2,0.27

   c0.08,0.25,0.16,0.45,0.22,0.58c0.06,0.13,0.15,0.26,0.28,0.37c0.12,0.11,0.29,0.2,0.5,0.25v-2.15c-0.41-0.11-0.76-0.24-1.03-0.38

   s-0.5-0.34-0.67-0.6c-0.17-0.26-0.26-0.59-0.26-1c0-0.53,0.17-0.96,0.51-1.3c0.34-0.34,0.82-0.54,1.46-0.59v-0.49

   c0-0.26,0.1-0.39,0.29-0.39C29.13,16.18,29.23,16.3,29.23,16.55z M28.64,19.72v-1.77c-0.26,0.08-0.46,0.18-0.6,0.3

   c-0.14,0.13-0.22,0.32-0.22,0.57c0,0.24,0.07,0.43,0.2,0.55C28.16,19.5,28.36,19.62,28.64,19.72z M29.23,21.09v2.02

   c0.31-0.06,0.55-0.19,0.72-0.37c0.17-0.19,0.25-0.41,0.25-0.66c0-0.27-0.08-0.47-0.25-0.62C29.79,21.32,29.55,21.19,29.23,21.09z" />

                                        </g>

                                    </g>

                                </svg>

                            </div>



                            <div class="media-body"><span class="m-0">Leads</span>

                                <h4 class="mb-0 counter">

                                   {{getearnings()}}

                                </h4>





                                <!-- Generator: Adobe Illustrator 27.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->

                                <svg version="1.1" id="Layer_1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve" class="icon-bg">

                                    <style type="text/css">

                                        .st0 {

                                            fill: #FFFFFF;

                                        }



                                    </style>

                                    <g>

                                        <path class="st0" d="M10.63,30.23c1.38,0.13,2.66,0.26,4.12,0.4c0.95-1.76,1.15-3.9,1.47-6c0.43-2.74,0.72-5.52,1.3-8.23

  c0.87-4.05,3.24-6.67,7.54-7.25c0.63-0.09,1.23-0.42,1.84-0.64c0.01-0.13,0.01-0.26,0.02-0.38c-0.47-0.17-0.92-0.41-1.41-0.5

  C22.8,7.12,22.04,5,21.81,2.86c-0.03-0.28,0.34-0.78,0.63-0.9c4.21-1.78,8.44-1.73,12.65,0.04c0.28,0.12,0.62,0.65,0.58,0.94

  c-0.39,2.47-1.18,4.3-3.92,4.73c-0.42,0.07-0.82,0.3-1.23,0.45c-0.01,0.12-0.02,0.24-0.03,0.36c0.6,0.23,1.19,0.58,1.81,0.66

  c4.54,0.6,6.9,3.45,7.73,7.68c0.66,3.34,1.03,6.74,1.55,10.11c0.1,0.66,0.28,1.31,0.44,2.03c3.36-0.4,5.73,1.11,7.48,3.76

  c0.83,1.25,0.64,2.39-0.64,3.15c-6.64,3.98-13.3,7.94-19.98,11.86c-3.08,1.81-6.26,1.99-9.55,0.48c-2.42-1.11-4.98-1.51-7.64-1.08

  c-0.59,0.09-1,0.13-1.31,0.86c-0.26,0.59-1.13,1.22-1.77,1.26c-2.22,0.15-4.46,0.09-6.7,0.05c-1.22-0.03-1.89-0.7-1.89-1.91

  c-0.02-5.99-0.02-11.97,0-17.96c0-1.21,0.64-1.92,1.85-1.96c2.27-0.07,4.55-0.06,6.83,0c1.11,0.03,1.78,0.68,1.84,1.85

  C10.55,29.66,10.6,29.98,10.63,30.23z M32.18,33.43c3-1.4,5.88-2.74,8.65-4.03c-0.31-2.22-0.57-4.26-0.9-6.3

  c-0.41-2.49-0.72-5.01-1.37-7.43c-0.81-3.01-2.84-4.88-6.03-5.37c-0.81-0.13-1.64-0.43-2.35-0.84c-1.07-0.63-1.03-1.79,0.02-2.43

  c0.38-0.23,0.85-0.35,1.3-0.45c2.03-0.45,2.89-1.48,2.94-3.69c-3.83-1.53-7.65-1.52-11.48,0.03c0.3,2.47,0.92,3.16,3.16,3.67

  c0.28,0.07,0.64,0.09,0.83,0.27c0.4,0.38,0.97,0.84,1.01,1.3c0.03,0.45-0.41,1.14-0.83,1.37c-0.75,0.42-1.63,0.66-2.49,0.82

  c-2.42,0.44-4.25,1.72-5.2,3.95c-0.65,1.53-1.08,3.19-1.36,4.84c-0.7,4.04-1.26,8.11-1.9,12.34c1.02,0.65,2.45,0.9,4.02,0.56

  c1.89-0.41,3.82-0.66,5.7-1.09C28.51,30.35,30.64,30.94,32.18,33.43z M10.54,46.11c0.68-0.03,1.19,0,1.68-0.09

  c2.19-0.39,4.27-0.04,6.31,0.76c0.86,0.33,1.76,0.58,2.63,0.9c1.87,0.71,3.74,0.7,5.52-0.19c2.82-1.41,5.66-2.81,8.37-4.4

  c4.32-2.54,8.54-5.23,12.81-7.86c0.57-0.35,1.22-0.68,0.92-1.56c-0.74-2.18-4.3-4.31-6.51-3.5c-3.22,1.17-6.29,2.72-9.32,4.07

  c-0.08,0.92,1.25,1.58,0.03,2.28c-3.38,1.92-6.86,3.6-10.68,4.44c-0.32,0.07-0.72-0.18-1.08-0.28c0.27-0.25,0.5-0.63,0.82-0.74

  c1.47-0.52,3-0.86,4.43-1.46c1.95-0.81,3.84-1.8,5.79-2.73c-0.41-0.7-0.67-1.18-0.95-1.65c-1.21-1.97-2.34-2.51-4.64-2.14

  c-1.7,0.28-3.42,0.53-5.09,0.95c-2.41,0.61-4.62,0.3-6.85-0.79c-1-0.49-2.25-0.52-3.41-0.64c-0.23-0.03-0.74,0.45-0.74,0.7

  C10.53,36.77,10.54,41.36,10.54,46.11z M1.09,38.38c0,2.87,0.02,5.73-0.01,8.6c-0.01,0.86,0.31,1.24,1.18,1.23

  c1.98-0.02,3.96-0.03,5.94,0c0.92,0.01,1.26-0.36,1.25-1.28c-0.03-5.69-0.02-11.38,0-17.07c0-0.91-0.3-1.31-1.24-1.29

  c-1.94,0.04-3.88,0.04-5.82,0c-0.99-0.02-1.33,0.36-1.32,1.34C1.12,32.73,1.09,35.56,1.09,38.38z" />

                                        <g>

                                            <path class="st0" d="M29.23,16.55v0.5c0.33,0.03,0.61,0.1,0.85,0.2c0.24,0.1,0.44,0.26,0.62,0.46c0.14,0.16,0.25,0.32,0.32,0.48

   c0.08,0.17,0.11,0.32,0.11,0.46c0,0.15-0.06,0.29-0.17,0.4c-0.11,0.11-0.25,0.17-0.41,0.17c-0.3,0-0.5-0.16-0.59-0.49

   c-0.1-0.38-0.35-0.64-0.73-0.77v1.92c0.38,0.1,0.69,0.2,0.91,0.29c0.23,0.09,0.43,0.21,0.61,0.37c0.19,0.17,0.34,0.37,0.44,0.61

   c0.1,0.24,0.15,0.49,0.15,0.77c0,0.35-0.08,0.68-0.25,0.99c-0.16,0.31-0.41,0.56-0.73,0.75c-0.32,0.19-0.7,0.31-1.14,0.35v1.15

   c0,0.18-0.02,0.31-0.05,0.4c-0.04,0.08-0.11,0.12-0.23,0.12c-0.11,0-0.19-0.03-0.23-0.1c-0.04-0.07-0.07-0.17-0.07-0.31v-1.25

   c-0.36-0.04-0.67-0.12-0.94-0.25c-0.27-0.13-0.49-0.29-0.67-0.48c-0.18-0.19-0.31-0.39-0.4-0.6c-0.09-0.21-0.13-0.41-0.13-0.61

   c0-0.15,0.06-0.28,0.17-0.4c0.12-0.12,0.26-0.18,0.43-0.18c0.14,0,0.26,0.03,0.35,0.1c0.1,0.06,0.16,0.16,0.2,0.27

   c0.08,0.25,0.16,0.45,0.22,0.58c0.06,0.13,0.15,0.26,0.28,0.37c0.12,0.11,0.29,0.2,0.5,0.25v-2.15c-0.41-0.11-0.76-0.24-1.03-0.38

   s-0.5-0.34-0.67-0.6c-0.17-0.26-0.26-0.59-0.26-1c0-0.53,0.17-0.96,0.51-1.3c0.34-0.34,0.82-0.54,1.46-0.59v-0.49

   c0-0.26,0.1-0.39,0.29-0.39C29.13,16.18,29.23,16.3,29.23,16.55z M28.64,19.72v-1.77c-0.26,0.08-0.46,0.18-0.6,0.3

   c-0.14,0.13-0.22,0.32-0.22,0.57c0,0.24,0.07,0.43,0.2,0.55C28.16,19.5,28.36,19.62,28.64,19.72z M29.23,21.09v2.02

   c0.31-0.06,0.55-0.19,0.72-0.37c0.17-0.19,0.25-0.41,0.25-0.66c0-0.27-0.08-0.47-0.25-0.62C29.79,21.32,29.55,21.19,29.23,21.09z" />

                                        </g>

                                    </g>

                                </svg>



                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>



        <div class="col-sm-6 col-xl-3 col-lg-6">

            <a href="{{ route('product.index') }}" style="color:#fff">

                <div class="card o-hidden">

                    <div class="bg-secondary b-r-4 card-body">

                        <div class="media static-top-widget">

                            <div class="align-self-center text-center">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">

                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>

                                    <line x1="3" y1="6" x2="21" y2="6"></line>

                                    <path d="M16 10a4 4 0 0 1-8 0"></path>

                                </svg>

                            </div>

                            <div class="media-body"><span class="m-0">Product



                                </span>

                                <h4 class="mb-0 counter">

                                    {{gettotalproducts()}}

                                </h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag icon-bg">

                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>

                                    <line x1="3" y1="6" x2="21" y2="6"></line>

                                    <path d="M16 10a4 4 0 0 1-8 0"></path>

                                </svg>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>





        <div class="col-sm-6 col-xl-3 col-lg-6">

            <a href="{{ route('orderManagement.index') }}" style="color:#fff">

                <div class="card o-hidden">

                    <div class="bg-primary b-r-4 card-body">

                        <div class="media static-top-widget">

                            <div class="align-self-center text-center">





                                <!-- Generator: Adobe Illustrator 27.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->

                                <svg version="1.1" id="Layer_1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">

                                    <style type="text/css">

                                        .st0 {

                                            fill: #FFFFFF;

                                        }



                                    </style>

                                    <g>

                                        <path class="st0" d="M45.71,26.88c0,4.56,0.01,9.12,0,13.69c-0.01,4.66-2.99,7.99-7.6,8.53c-2.32,0.27-4.65,0.12-6.97,0.13

  c-5.26,0.03-10.53,0.02-15.79,0c-1.81-0.01-3.59-0.17-5.23-1.07c-2.96-1.63-4.48-4.17-4.5-7.5c-0.05-9.21-0.07-18.42,0.01-27.64

  c0.05-5.55,4.73-9.42,10.15-8.59c0.63,0.1,1.13,0.37,1.13,1.05c0,0.71-0.53,0.93-1.17,0.96c-0.87,0.05-1.75,0.09-2.62,0.21

  c-3.08,0.43-5.3,2.82-5.31,5.91c-0.04,9.52-0.04,19.04,0,28.56c0.02,3.17,2.66,5.87,5.92,5.91c7.94,0.09,15.88,0.08,23.82,0.01

  c3.25-0.03,6.07-2.7,6.02-6.33c-0.12-9.08-0.04-18.16-0.04-27.24c0-4.3-1.81-6.36-6.06-6.92c-0.56-0.07-1.14-0.09-1.7-0.11

  c-0.69-0.02-1.26-0.21-1.26-1.01c0-0.71,0.53-0.94,1.15-1.01c6.58-0.66,10.3,4.21,10.09,8.78C45.54,17.75,45.71,22.32,45.71,26.88z

  " />

                                        <path class="st0" d="M25.6,0.75c1.23,0,2.45-0.05,3.68,0.01c1.84,0.08,2.98,1.15,3.29,2.97c0.05,0.3,0.1,0.61,0.12,0.91

  c0.31,4.27-0.98,5.67-5.24,5.67c-1.66,0-3.33,0.03-4.99-0.01c-2.64-0.07-3.89-1.4-4-4.01c-0.14-3.53,0.32-5.9,5.44-5.56

  c0.57,0.04,1.14,0.01,1.71,0.01C25.6,0.74,25.6,0.74,25.6,0.75z M25.57,8.11C25.57,8.12,25.57,8.12,25.57,8.11

  c0.52,0.01,1.05,0.01,1.57,0.01c3.45,0,3.51-0.09,3.4-3.52c-0.04-1.14-0.49-1.7-1.66-1.68c-1.62,0.02-3.24,0.01-4.86,0

  c-3.56-0.02-3.44-0.23-3.36,3.75c0.02,0.96,0.53,1.44,1.49,1.44C23.29,8.12,24.43,8.11,25.57,8.11z" />

                                        <path class="st0" d="M28,19.55c-2.67,0-5.35,0-8.02,0c-0.35,0-0.7,0.01-1.05-0.03c-0.62-0.07-1.13-0.35-1.15-1.04

  c-0.02-0.69,0.48-0.99,1.1-1.08c0.3-0.04,0.61-0.04,0.92-0.04c5.48,0,10.96,0,16.43,0c0.04,0,0.09,0,0.13,0

  c0.83,0.04,1.87-0.04,1.85,1.13c-0.02,1.07-1,1.05-1.8,1.05C33.61,19.55,30.8,19.55,28,19.55z" />

                                        <path class="st0" d="M27.93,28.78c-2.71,0-5.43,0.01-8.14-0.01c-0.43,0-0.88-0.03-1.3-0.13c-0.41-0.1-0.68-0.43-0.71-0.85

  c-0.03-0.48,0.21-0.88,0.68-1c0.46-0.12,0.95-0.18,1.42-0.18c5.38-0.01,10.77-0.02,16.15,0c0.87,0,2.14-0.21,2.15,1.08

  c0.02,1.33-1.24,1.08-2.12,1.08C33.36,28.8,30.64,28.78,27.93,28.78z" />

                                        <path class="st0" d="M28.02,38.01c-2.84,0-5.69,0-8.53,0c-0.77,0-1.64-0.01-1.68-1.01c-0.04-1,0.86-1.13,1.61-1.13

  c5.78-0.02,11.55-0.02,17.33,0c0.72,0,1.51,0.18,1.48,1.11c-0.03,0.91-0.79,1.03-1.54,1.03C33.79,38.01,30.91,38.01,28.02,38.01z" />

                                        <circle class="st0" cx="13.31" cy="18.61" r="0.92" />

                                        <circle class="st0" cx="13.31" cy="27.69" r="0.92" />

                                        <circle class="st0" cx="13.31" cy="36.77" r="0.92" />

                                    </g>

                                </svg>





                            </div>

                            <div class="media-body"><span class="m-0">Order

                                    {{-- {{ $orders_count > 1 ? 's' : '' }} --}}

                                </span>

                                <h4 class="mb-0 counter">

                                    {{gettotalorders()}}

                                </h4>



                                <!-- Generator: Adobe Illustrator 27.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->

                                <svg version="1.1" id="Layer_1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle icon-bg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">

                                    <style type="text/css">

                                        .st0 {

                                            fill: #FFFFFF;

                                        }



                                    </style>

                                    <g>

                                        <path class="st0" d="M45.71,26.88c0,4.56,0.01,9.12,0,13.69c-0.01,4.66-2.99,7.99-7.6,8.53c-2.32,0.27-4.65,0.12-6.97,0.13

                                    c-5.26,0.03-10.53,0.02-15.79,0c-1.81-0.01-3.59-0.17-5.23-1.07c-2.96-1.63-4.48-4.17-4.5-7.5c-0.05-9.21-0.07-18.42,0.01-27.64

                                    c0.05-5.55,4.73-9.42,10.15-8.59c0.63,0.1,1.13,0.37,1.13,1.05c0,0.71-0.53,0.93-1.17,0.96c-0.87,0.05-1.75,0.09-2.62,0.21

                                    c-3.08,0.43-5.3,2.82-5.31,5.91c-0.04,9.52-0.04,19.04,0,28.56c0.02,3.17,2.66,5.87,5.92,5.91c7.94,0.09,15.88,0.08,23.82,0.01

                                    c3.25-0.03,6.07-2.7,6.02-6.33c-0.12-9.08-0.04-18.16-0.04-27.24c0-4.3-1.81-6.36-6.06-6.92c-0.56-0.07-1.14-0.09-1.7-0.11

                                    c-0.69-0.02-1.26-0.21-1.26-1.01c0-0.71,0.53-0.94,1.15-1.01c6.58-0.66,10.3,4.21,10.09,8.78C45.54,17.75,45.71,22.32,45.71,26.88z

                                    " />

                                        <path class="st0" d="M25.6,0.75c1.23,0,2.45-0.05,3.68,0.01c1.84,0.08,2.98,1.15,3.29,2.97c0.05,0.3,0.1,0.61,0.12,0.91

                                    c0.31,4.27-0.98,5.67-5.24,5.67c-1.66,0-3.33,0.03-4.99-0.01c-2.64-0.07-3.89-1.4-4-4.01c-0.14-3.53,0.32-5.9,5.44-5.56

                                    c0.57,0.04,1.14,0.01,1.71,0.01C25.6,0.74,25.6,0.74,25.6,0.75z M25.57,8.11C25.57,8.12,25.57,8.12,25.57,8.11

                                    c0.52,0.01,1.05,0.01,1.57,0.01c3.45,0,3.51-0.09,3.4-3.52c-0.04-1.14-0.49-1.7-1.66-1.68c-1.62,0.02-3.24,0.01-4.86,0

                                    c-3.56-0.02-3.44-0.23-3.36,3.75c0.02,0.96,0.53,1.44,1.49,1.44C23.29,8.12,24.43,8.11,25.57,8.11z" />

                                        <path class="st0" d="M28,19.55c-2.67,0-5.35,0-8.02,0c-0.35,0-0.7,0.01-1.05-0.03c-0.62-0.07-1.13-0.35-1.15-1.04

                                    c-0.02-0.69,0.48-0.99,1.1-1.08c0.3-0.04,0.61-0.04,0.92-0.04c5.48,0,10.96,0,16.43,0c0.04,0,0.09,0,0.13,0

                                    c0.83,0.04,1.87-0.04,1.85,1.13c-0.02,1.07-1,1.05-1.8,1.05C33.61,19.55,30.8,19.55,28,19.55z" />

                                        <path class="st0" d="M27.93,28.78c-2.71,0-5.43,0.01-8.14-0.01c-0.43,0-0.88-0.03-1.3-0.13c-0.41-0.1-0.68-0.43-0.71-0.85

                                    c-0.03-0.48,0.21-0.88,0.68-1c0.46-0.12,0.95-0.18,1.42-0.18c5.38-0.01,10.77-0.02,16.15,0c0.87,0,2.14-0.21,2.15,1.08

                                    c0.02,1.33-1.24,1.08-2.12,1.08C33.36,28.8,30.64,28.78,27.93,28.78z" />

                                        <path class="st0" d="M28.02,38.01c-2.84,0-5.69,0-8.53,0c-0.77,0-1.64-0.01-1.68-1.01c-0.04-1,0.86-1.13,1.61-1.13

                                    c5.78-0.02,11.55-0.02,17.33,0c0.72,0,1.51,0.18,1.48,1.11c-0.03,0.91-0.79,1.03-1.54,1.03C33.79,38.01,30.91,38.01,28.02,38.01z" />

                                        <circle class="st0" cx="13.31" cy="18.61" r="0.92" />

                                        <circle class="st0" cx="13.31" cy="27.69" r="0.92" />

                                        <circle class="st0" cx="13.31" cy="36.77" r="0.92" />

                                    </g>

                                </svg>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>





        <div class="col-sm-6 col-xl-3 col-lg-6">

            <a href="{{ route('user-index') }}" style="color:#fff">

                <div class="card o-hidden">

                    <div class="bg-primary b-r-4 card-body">

                        <div class="media static-top-widget">

                            <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">

                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>

                                    <circle cx="8.5" cy="7" r="4"></circle>

                                    <line x1="20" y1="8" x2="20" y2="14"></line>

                                    <line x1="23" y1="11" x2="17" y2="11"></line>

                                </svg></div>

                            <div class="media-body"><span class="m-0">User

                                    {{-- {{ $users > 1 ? 's' : '' }} --}}

                                </span>

                                <h4 class="mb-0 counter">

                                    {{gettotalusers()}}

                                </h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg">

                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>

                                    <circle cx="8.5" cy="7" r="4"></circle>

                                    <line x1="20" y1="8" x2="20" y2="14"></line>

                                    <line x1="23" y1="11" x2="17" y2="11"></line>

                                </svg>

                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>

<br><br>







<div class="container-fluid">



</div>







<script type="text/javascript">

    var session_layout = '{{ session()->get('

    layout ') }}';



</script>

@endsection



@section('script')

<script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>

<script src="{{ asset('assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>

<script src="{{ asset('assets/js/chart/knob/knob.min.js') }}"></script>

<script src="{{ asset('assets/js/chart/knob/knob-chart.js') }}"></script>

<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>

<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>

<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>

<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>

<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>

<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>



<script src="{{ asset('assets/js/dashboard/default.js') }}"></script>

<script src="{{ asset('assets/js/notify/index.js') }}"></script>

@endsection

