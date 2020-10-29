@extends('layouts.landing-page')
@section('content')
        <nav aria-label="breadcrumb" role="navigation" class="bg-primary text-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Faqs</li>
                        </ol>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </nav>

       <section>
            <div class="container">
                <div class="row justify-content-center section-intro">
                    <div class="col-auto">
                        <h2 class="h1">Frequently Asked Questions</h2>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
                <ul class="row feature-list feature-list-sm justify-content-center">

                    <li class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h6>How do I subscribe?</h6>
                                <p>
                                    To subscribe you can enter Mcnally platform. In the Products section, you will find all products and markets that are currently valid. In the description of each of them you can select the “Subscribe” option. Once you have selected the product of your interest, you can click that option and you will access the subscription form. You can fill in the form with your information, select payment options (PayPal –VISA, Mastercard and American Express credit cards). Monthly renewal is automatic, in US currency and it includes taxes. You can cancel anytime; you will be charged at the beginning of each month.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h6>What do I get when I subscribe?</h6>
                                <p>
                                    When you subscribe, you will have access to all analysis and future and past reports (content, alerts and materials), including new analysis and projections to come. On average we publish nine financial reports a month, apart from the different projected portfolios. It is incredible.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h6>How long does it take to activate if I pay with Stripe?</h6>
                                <p>
                                    Sometimes it takes 24 hours, but in most of the cases less than one hour or immediately. Stripe confirms the subscription and we send you an email to notify you of the activation.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h6>Are charges personal or automatic?</h6>
                                <p>
                                    Charges are automatic, so you do not have to worry. If there is a problem, we contact you immediately. We do not store your card data. We use international external suppliers, like Stripe, and they safely store your information.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h6>What happens if I cancel my subscription?</h6>
                                <p>
                                    You do not have to worry. Your account will be changed to the free plan. That means that you will still have access to the free content in our free information center or Free financial research. We hope you come back soon.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h6>What do I need to use Mcnally platform?</h6>
                                <p>
                                    You need just an Internet connection and a computer, laptop, tablet or smartphone with Android or ios. Mcnally is based on the web, the best experience in financial research.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="col-12 col-md-6 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h6>What are Mcnally’s services about?</h6>
                                <p>
                                    Mcnally Finance offers research and market projections of equities (BSE, NSE, NYSE and Nasdaq, among others). The main objective is to detect undervalued companies with growth potential and offer a detailed fundamental analysis and index projections in digital format. No more than three pages, easy and simple to read. We analyze companies that are listed in different indexes such as S&amp;P 500, S&amp;P 600 small cap (for aggressive investors), S&amp;P 400 Medium Cap, Russel 2000, Down Jones index and analysis of global companies with growth potential that commercialize mainly in India and the rest of the world. We offer opportunities to investors with different levels of risk (low, moderate, aggressive) and, according to each profile, we design a three-month portfolio of assets. In each report we explain the impact of these projections and offer an estimated share price for two and five years. In addition, alerts on important market information will be displayed within the Mcnally control panel, exclusive to the research conducted by the Mcnally analyst team.
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--end of row-->
                <div class="row justify-content-center text-center section-outro">
                    <div class="col-lg-4 col-md-5">
                        <h6>Did we miss something?</h6>
                        <p>Feel free to drop us a line with any fruther questions. One of our support team will get back to you ASAP.</p>
                        <a href="mailto:contact@mcnally.in">Get in touch ›</a>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
@endsection
