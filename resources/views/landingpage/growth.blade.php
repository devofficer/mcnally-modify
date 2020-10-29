@extends('layouts.landing-page')
@section('content')
<div class="main-container">
  <section class="bg-dark text-light height-80">
    <img alt="Image" src="/assets/images/GraficoLight4.jpg" class="bg-image opacity-60" />
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-12 col-md-10 col-lg-7">
          <span class="title-decorative">India growth</span>
          <h1 class="display-4">India's economic progress</h1>
          <span class="lead">Why India will be the second largest economy in the world, surpassing the US, in just two decades</span>
        </div>
        <!--end of col-->
      </div>
      <!--end of row-->
    </div>
    <!--end of container-->
  </section>
  <!--end of section-->
  
  <section class="space-sm">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-auto text-center">
          <span class="h1 mb-0">2050</span>
          <span>India growth 🇮🇳</span>
        </div>
        <!--end of col-->
        <div class="col-auto text-center">
          <span class="h1 mb-0">+300</span>
          <span>Million people</span>
        </div>
        <!--end of col-->
        <div class="col-auto text-center">
          <span class="h1 mb-0">30 + Growing</span>
          <span>Sustained annual growth</span>
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
          <blockquote class="blockquote">
            <p class="h4">
              “The economic and financial analysis suggests that the Indian GDP will grow between 2021 and 2050 at a vertiginous annual average of 4.9%.”
            </p>
            <footer class="blockquote-footer title-decorative">
              Patricio Nally, CEO & Financial Analyst
            </footer>
          </blockquote>
          <p class="lead">
            Much has been said about the Chinese economic miracle and the inevitable hegemony of the East Asian giant.
          </p>
          <p class="lead">
            But in South Asia, India continues to perform perhaps more spectacularly than any other nation in recent years. Which would lead India to go from representing 7% of the world economy today, to 15% in 2050.
But how is it that even earlier, in 2040, India, a nation associated with legendary levels of poverty, is expected to overcome the aggregate economic power of the United States?
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
        </div>
        <!--end of col-->
        <figure class="figure text-center col-12 col-md-10 col-lg-8">
          <img alt="Image" class="img-fluid figure-img rounded" src="/assets/images/MercadoIndiaMin.jpg" />
        </figure>
        <!--end of col-->
        <div class="col-12 col-md-8 col-lg-6">
          <h4>A huge population</h4>
          <p class="lead">
            India has about 1,352 million inhabitants. By 2040, in just over two decades, it will have risen to 1.6 billion (World Economic Forum estimates).
          </p>
          <p class="lead">
            The enormous population growth of India will provide, by itself, a significant increase in the economy, impacting on greater training in sectors such as computing where the export of these services generates one of the main income of the country, in addition to the fact that said population growth and economic, it will impact the development of infrastructure to improve logistics and trade, both domestic and export.
          </p>
          <p class="lead">
            This huge consumer market will inevitably lead to a larger economy (exponential growth in the construction, computer, health, healthcare, and other industries).
          </p>
          <p class="h4" style="text-align:center">
            “Just 0.7% of the 4.9% growth would be attributable to the simple increase in the Indian population.”
          </p>
          <p class="lead">
            Fundamentally, factors such as the increase in productivity due to technological change would play a greater role, generating more sales, higher profit margins, and a high capital reinvestment factor.
          </p>
          <p class="lead">
            The Indian economy is already showing signs of overcoming the Japanese and approaching that of the Eurozone. In 2060, the OECD believes that India will be the second largest economy, behind China, with 18% of total production, compared to 16% in the US. and 9% of the Eurozone.
          </p>
          <p class="lead">
            Taking into account these aspects and the future demographic, economic growth; New and varied opportunities arise to invest in the Indian market through its stock market, allowing to diversify and take advantage of the exponential growth of important Indian industries and companies.
          </p>
          <p class="h4" style="text-align:center">
            Mcnally's team covers more than 4,380 listed companies in India, with robust forecasts and evaluations of past performance and future estimates of all their financial metrics, emphasizing fundamental data. All in real time through the Mcnally financial platform.
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
