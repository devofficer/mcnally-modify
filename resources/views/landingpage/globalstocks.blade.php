@extends('layouts.landing-page')
@section('content')
<div class="main-container">
  <section class="bg-dark text-light height-80">
    <img alt="Image" src="/assets/images/GlobalStock.jpg" class="bg-image opacity-60" />
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-12 col-md-10 col-lg-7">
          <span class="title-decorative">big data applied to investments</span>
          <h1 class="display-4">Global select stocks </h1>
          <span class="lead">Financial fundamentals, ratios, forecasts for 7,800+ most liquid global stocks. Focus on Asia/Europe.</span>
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
          <span class="h1 mb-0">+7800</span>
          <span>Global companies</span>
        </div>
        <!--end of col-->
        <div class="col-auto text-center">
          <span class="h1 mb-0">+70</span>
          <span>Indicators</span>
        </div>
        <!--end of col-->
        <div class="col-auto text-center">
          <span class="h1 mb-0">Annual, Daily</span>
          <span>Data frequency</span>
        </div>
        <!--end of col-->
        <div class="col-auto text-center">
          <span class="h1 mb-0">Rolling Updates</span>
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
            <div id="premium-data-button">Premium Data</div>
            <span id="premium-data-text">Available in expert</span>
          </div>
          <blockquote class="blockquote">
            <p class="h4">
              The Global Select Stock Fundamentals data contains 70+ essential fundamental indicators, key financial ratios, and growth metrics for 7,800+ global stocks. Coverage emphasizes Asia/Europe, since fundamentals data for those regions is otherwise difficult to obtain.
            </p>
            <footer class="blockquote-footer title-decorative">
              Machine learning and Business analytics
            </footer>
          </blockquote>
          <p class="lead">
            Key features of the data: Includes figures from both standalone and consolidated statements.
          </p>
          <p class="lead">
               Our coverage: balance sheet indicators, income statement, cash flow, pricing and valuation, solvency and fundamentals, profitability and management efficiency. Every indicator is available on a daily and annual basis. <br>Also included are key financial ratios, growth scores, fundamentals forecasts, market signals, and publisher’s proprietary quality scores.
               <br>Additional tickers and indicators are added every quarter.<br>
               Data is standardized, stringently quality-controlled, and available via Mcnally Terminal.
          </p>
          <p class="lead">
            Data is updated at 2 am ET every business day with a rolling update; any previous value is removed in each update.
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
          <p class="lead">
            Reporting Lag: 1 week<br>
            Delivery frecuency: Daily
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
          <p class="h4">
            You can access this fundamental and forecasts coverage of global companies through the Mcnally Terminal (Mcnally Professional Services).
          </p>
        </div>
        <!--end of col-->
        <figure class="figure text-center col-12 col-md-10 col-lg-8">
          <img alt="Image" class="img-fluid figure-img rounded" src="/assets/images/GlobalStock2.jpg" />
        </figure>
        <!--end of col-->
        <div class="col-12 col-md-8 col-lg-6">
          <p class="lead">
            The list of companies available in this data feed, including their names, frequencies, and IDs as listed on the Global markets, can be downloaded <font color="#4582EC">here</font>.
          </p>
          <p class="lead">
            Currently, 70+ indicators (can be downloaded <font color="#4582EC">here</font> .pdf) are covered. Please note that not all indicators are available for all companies.
          </p>
          <p class="h4" style="text-align:center">
            Financial Statements
          </p>
          <p class="lead">
            Standard income statement<br/>Standard cash flow statement + depreciation<br/>Standard balance sheet presentation<br/>Forecast: Curated by the Mcnally team from a series of four statistical forecasts, taking into account what they know about the companies. They are not the result of company interviews, and are fundamentally based on past performance.<br/>Compound annual growth rates are calculated on the past 3 years (or 4 years where 4 years are available). For stocks with shorter records, CAGR is not calculated.<br/>SIGNALS. Key solvency, margin and other indicators.<br/>Value ratios such as PEG, buy backs, goodwill, Graham multiplier.
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
          <p class="h4" style="text-align:center">
            CAGR (Compound Annual Growth Rates)
          </p>
          <p class="lead">
            Revenue CAGR<br/>Operating income CAGR<br/>Net Inc Exc Ext CAGR: Net income, excluding extraordinary items.<br/>Earnings per share CAGR, excluding extraordinary items.<br/>Cashops CAGR<br/>Capex CAGR<br/>Equity CAGR: Shareholders' equity.
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
          <p class="h4" style="text-align:center">
            Signals
          </p>
          <p class="lead">
            Buybacks % - Percentage of cash outflows used in share buybacks.<br/>SOLVENCY: A ratio based on the Altmann Z concept for estimating the probability of insolvency. A number over 2 is considered relatively good; between 1 and 2 is a "warning"; under 1 is a signal to look very carefully at debt, debt servicing, operations cash, and similar number.<br/>Net Inc. Margin:	Net income, excluding extraordinary items as % of revenue.<br/>ROAE:	Return on assets employed = net income, excluding extraordinary items / total assets.<br/>Return on total capital employed (ROTC) = operating income / total assets less current liabilities.
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
          <p class="h4" style="text-align:center">
            Values
          </p>
          <p class="lead">
            Trailing PEG ratio = price/earnings ratio divided by the CAGR of earnings per share, excluding extraordinary items.<br/>Enterprise Ratio:	Complex calculation attempting to show the attraction of a company to takeover interest: how many years would it take to get your money back from cashflow, if you bought the company at today's share price? Below 5 – increasingly attractive for takeover in theory; Above 5: increasingly unattractive. Takes account of debt.<br/>Graham Multiplier:	Calculation originally devised by Benjamin Graham. 22.5 is considered the magic number: below that, value investors see increasing value; above that, value investors see decreasing value. Main basis: price/earnings ratio multiplied by price/book ratio.
            <abbr title="Hyper Text Markup Language"></abbr>
          </p>
          <!--<p class="lead">
            Levered Beta (Bloomberg Adjustment)<br/>Credit/Default Spread)<br/>Dividend Yield<br/>Enterprise Value to EBITDA<br/>Enterprise Value to EBIT<br/>EV to Assets<br/>EV to Earnings<br/>Earnings Yield<br/>Accounting Cost of Debt<br/>Cost of Equity (Capital Asset Pricing Model Method)<br/>Price to Cashflow from Operations<br/> Weighted Average Cost of Capital <br/>Weight of Equity (WACC Calculation)<br/>Price by Earnings to Growt, among others...
          </p>-->
          <p class="h4" style="text-align:center">
            Accounting Variations for Different Industries
          </p>
          <p class="lead">
            The income, cash flow statements and balance sheets are completely standardized, allowing you to compare companies like for like, regardless of their geographical location, reporting conventions or industry.
          </p>
          <p class="lead">
            Companies are selected primarily on the basis of being liquid stocks in liquid markets. McNally also includes selected quoted companies with relatively high R&D expenditure, regardless of size, to highlight potential future growth stocks. Chosen companies have also been included for showing credibly objective accounting and reporting.
          </p>
          <p class="lead">
            Even though all 900 US companies are hedged, we maintain a strong focus on non-US listed securities, where comparable financial data is more difficult to acquire and analytical coverage is less frequent.
          </p>
          <p class="h4" style="text-align:center">
            Mcnally's team covers more than 7,800 listed companies in Global markets, with robust forecasts and evaluations of past performance and future estimates of all their financial metrics, emphasizing fundamental and quantitative data. All in real time through the Mcnally financial platform (The Terminal).
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
