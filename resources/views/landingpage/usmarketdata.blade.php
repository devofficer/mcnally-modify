@extends('layouts.landing-page')
@section('content')
<div class="main-container">
  <section class="bg-dark text-light height-80">
    <img alt="Image" src="/assets/images/USStockData1.jpg" class="bg-image opacity-60" />
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-12 col-md-10 col-lg-7">
          <span class="title-decorative">big data applied to investments</span>
          <h1 class="display-4">U.S. Stock Market Data</h1>
          <span class="lead">Complete financial stock market coverage with core fundamental data, analysis, stock quotes, advanced stats and earnings estimates for stocks on the S&P Composite 1500.</span>
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
          <span class="h1 mb-0">1500</span>
          <span>US companies 🇺🇸</span>
        </div>
        <!--end of col-->
        <div class="col-auto text-center">
          <span class="h1 mb-0">+100</span>
          <span>Indicators</span>
        </div>
        <!--end of col-->
        <div class="col-auto text-center">
          <span class="h1 mb-0">Quarterly, Daily</span>
          <span>Data frequency</span>
        </div>
        <!--end of col-->
        <div class="col-auto text-center">
          <span class="h1 mb-0">Last 4 years</span>
          <span>History</span>
        </div>
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
            <span id="premium-data-text">Available in Pro</span>
          </div>
          <blockquote class="blockquote">
            <p class="h4">
              The S&P Composite 1500® combines three leading indices, the S&P 500®, the S&P MidCap 400®, and the S&P SmallCap 600®, to cover approximately 90% of U.S. market capitalization. It is designed for investors seeking to replicate the performance of the U.S. equity market or benchmark against a representative universe of tradable stocks.
            </p>
            <footer class="blockquote-footer title-decorative">
              Machine learning and Business analytics
            </footer>
            <footer class="blockquote-footer title-decorative">
              coverage: S&P Composite 1500
            </footer>
          </blockquote>
          <p class="lead">
            Key features of the data: Includes figures from both standalone and consolidated statements.
          </p>
          <p class="lead">
            Our coverage: balance sheet indicators, income statement, cash flow, pricing and valuation, solvency and fundamentals, profitability and management efficiency. Every indicator is available on a daily and annual basis. <br>Also included are key financial ratios, growth scores, fundamentals forecasts, market signals, advanced stats, upcoming earnings estimate and company news.
            <br>Additional indicators are added every quarter.<br>
            Data is standardized, stringently quality-controlled, and available through Mcnally Terminal.
          </p>
          <p class="lead">
            Data is updated at 2 am ET every business day with a rolling update; any previous value is removed in each update.
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
          <p class="lead">
            Delivey frequency: Daily<br>
            Data frecuency: Daily, Weekly, Monthly, Quarterly, Annual.<br>
            Reporting lag: 1 Business day
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
          <p class="h4">
            You can access this fundamental and forecasts coverage of U.S. data companies through the Mcnally Terminal (Mcnally Professional Services).
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
        </div>
        <!--end of col-->
        <figure class="figure text-center col-12 col-md-10 col-lg-8">
          <img alt="Image" class="img-fluid figure-img rounded" src="/assets/images/USStockData4.jpg" />
        </figure>
        <!--end of col-->
        <div class="col-12 col-md-8 col-lg-6">
          <p class="h4" style="text-align:center">
            Pricing and Valuation
          </p>
          <p class="lead">
            Levered Beta (Bloomberg Adjustment)<br/>Credit/Default Spread)<br/>Dividend Yield<br/>Enterprise Value to EBITDA<br/>Enterprise Value to EBIT<br/>EV to Assets<br/>EV to Earnings<br/>Earnings Yield<br/>Accounting Cost of Debt<br/>Cost of Equity (Capital Asset Pricing Model Method)<br/>Price to Cashflow from Operations<br/> Weighted Average Cost of Capital <br/>Weight of Equity (WACC Calculation)<br/>Price by Earnings to Growt, among others...
          </p>
          <p class="h4" style="text-align:center">
            Mcnally's team covers more than 1,500 listed companies in U.S. markets, with robust forecasts and evaluations of past performance and future estimates of all their financial metrics, emphasizing fundamental and quantitative data. All in real time through the Mcnally financial platform (The Terminal).
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
