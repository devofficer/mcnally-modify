@extends('layouts.landing-page')
@section('content')
<div class="main-container">
  <section class="bg-dark text-light height-80">
    <img alt="Image" src="/assets/images/Quants.jpg" class="bg-image opacity-60" />
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-12 col-md-10 col-lg-7">
          <span class="title-decorative">big data and machine learning applied to investments</span>
          <h1 class="display-4">Quants</h1>
          <span class="lead">Powerful analytics and accurate data from all global markets, in one comprehensive cloud solution, processing millions of data applying advanced financial engineering.</span>
        </div>
        <!--end of col-->
      </div>
      <!--end of row-->
    </div>
    <!--end of container-->
  </section>
  <!--end of section-->

  <section>
    <article class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
          <div class="text-center">
            <div id="premium-data-button">Premium Data</div>
            <span id="premium-data-text">Available in expert</span>
          </div>
          <blockquote class="blockquote">
            <p class="h4">
              “We use quantitative, mathematical, statistical, and programming techniques to model the value of financial instruments, primarily equity valuation. Designing and implementing predictive mathematical models to value derivative products, measure risks or to predict market movements, incorporating Big Data analysis and Artificial Intelligence applied to finance at the highest level.”
            </p>
            <footer class="blockquote-footer title-decorative">
              Artificial intelligence applied in finance.<br> Mcnally Scores
            </footer>
          </blockquote>
          <p class="lead">
            Applying Business Analytics in the study of data through statistical analysis and operations, the formation of predictive models, the application of optimization techniques and the communication of these results to clients and private investors (Available at the Mcnally terminal) is essential for detect attractive stocks and financial assets in the short and long term that it is only possible to analyze said volume of information using machine learning algorithms.
          </p>
          <p class="h4" class="h4" style="text-align:center">
            Mcnally Scores
          </p>
          <p class="lead">
            It works by taking sixteen criteria (in addition to analyzing large volumes of market data), evaluating them against specific criteria (for example, "Operating income CAGR> 10%") and giving them a score. The sum of the scores is compared with the maximum possible score to give a percentage. Programmed for long-term investment strategies, and with the aim of pre-selecting actions that are difficult for an investor to find, he covers + 7800 global companies with a focus on Asia and Europe, applying traditional and quantitative methods in the analysis of high-value investments. The higher the score, the higher the company's expected performance and growth.
          </p>
        </div>
        <!--end of col-->
        <figure class="figure text-center col-12 col-md-10 col-lg-8">
          <img alt="Image" class="img-fluid figure-img rounded" src="/assets/images/Quants2.jpg" />
        </figure>
        <!--end of col-->
        <div class="col-12 col-md-8 col-lg-6">
          <p class="lead">
            Relating these three components such as quantitative analysis, big data and machine learning, we were able to identify factors that affect the performance of a company, creating more precise strategies that impact a significant increase in the profitability of the company, with the consequent increase in market price.
          </p>
          <p class="lead">
            Machine learning implemented in Mcnally's cloud-based terminal makes it easy to receive a set of data, changing and adjusting algorithms as they process real-time information from more than 100 market indicators, prices, volume, news and alerts, Relevant industry data allowing companies to be detected manually that would take a long time, generating investment opportunities in real time.
          </p>
          <p class="h4" style="text-align:center">
            Mcnally's team covers more than 4,380 companies listed in India and more than 7,800 companies in the rest of the world focused on Asia and Europe, with solid forecasts and evaluations of past performance and future estimates of all their financial metrics, emphasizing fundamental data and quantitative analysis techniques. All in real time through the Mcnally financial platform.
          </p>
          <p style="text-align:center">
            <a href="/products" style="text-align:center !important">View pricing plans ›</a>
          </p>
        </div>
        <!--end of col-->
      </div>
      <!--end of row-->
    </article>
    <!--end of container-->
  </section>
  <!--end of section-->

  <section class="bg-white">
    <div class="container">
      <div class="row section-intro">
        <div class="col text-center">
          <h3 class="h1">Do not wait, register now with a 20% off in the first month.</h3>
        </div>
        <!--end of col-->
      </div>
      <!--end of row-->
      <form>
          <div class="row">
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="form-group">
                <label for="username">Firstname</label>
                <input id="username" type="text" class="form-control form-control-lg" placeholder="Firstname">
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="form-group">
                <label for="email">Lastname</label>
                <input id="email" type="text" class="form-control form-control-lg" placeholder="Lastname">
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="form-group">
                <label for="password">Email Address</label>
                <input id="password" type="email" class="form-control form-control-lg" placeholder="you@domain.com">
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="form-group">
                <label for="button">&nbsp;</label>
                <button id="button" type="submit" class="btn btn-lg btn-block btn-success">Sign up for Mcnally</button>
              </div>
            </div>
          </div>
          <!--end of row-->
        </form>
    </div>
    <!--end of container-->
  </section>
</div>
@endsection
