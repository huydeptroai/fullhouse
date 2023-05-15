@extends('fe.layout.master')
@section('title', 'About us')
@section('content')

<main id="main" class="main-site inner-page about-us">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>About us</span></li>
            </ul>
        </div>
        <div>
            <div class="wrap-main-slide">
                <div class="slide-info slide-2 col-12 col-md-4">
                    <h2 class="f-title">Fullhouse</h2>
                    <h4 class="s-title">Furniture</h4>
                </div>
                <div class="col-md-8">
                    <img src="{{ asset('/frontend/images/about-main-banner-01.jpg') }}" alt="about-main-banner-01" style="width:90%;height:auto;">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- main-content-area"> -->
        <div class="aboutus-info style-center">
            <b class="box-title">Interesting Facts</b>
            <p class="txt-content text-justify">
                Full House Co., Ltd. was established on March 25, 20xx, as a furniture company specializing in producing and retailing furniture with various designs. We specialize in the design, manufacture, and distribution of semi-assembled furniture, equipment, office furniture, and home furniture. During the process of formation, development, and expansion, we are constantly improving, innovating, and improving the quality of products and services, providing thousands of standard furniture products to customers. <br>
                Today, Full House is a collective bonded by many individuals, with a team of experienced, dedicated, and professional construction workers and a design team of young, dynamic, and enthusiastic people in the field of interior design. We want to bring you the best, most innovative, and most quality products.
            </p>
        </div><!-- info top end -->
        <!-- strengths start -->
        <section>
            <div class="aboutus-info style-center">
                <b class="box-title">STRENGTHS</b>
            </div>
            <div class="row equal-container">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-box-score equal-elem ">
                        <div style="text-align:center;">
                            <svg fill="rgba(0, 0, 0, 1)" height="20%" viewBox="0 0 24 24" width="20%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M4,2A2,2 0 0,0 2,4V16A2,2 0 0,0 4,18H8V21A1,1 0 0,0 9,22H9.5V22C9.75,22 10,21.9 10.2,21.71L13.9,18H20A2,2 0 0,0 22,16V4C22,2.89 21.1,2 20,2H4M4,4H20V16H13.08L10,19.08V16H4V4M12.19,5.5C11.3,5.5 10.59,5.68 10.05,6.04C9.5,6.4 9.22,7 9.27,7.69C0.21,7.69 6.57,7.69 11.24,7.69C11.24,7.41 11.34,7.2 11.5,7.06C11.7,6.92 11.92,6.85 12.19,6.85C12.5,6.85 12.77,6.93 12.95,7.11C13.13,7.28 13.22,7.5 13.22,7.8C13.22,8.08 13.14,8.33 13,8.54C12.83,8.76 12.62,8.94 12.36,9.08C11.84,9.4 11.5,9.68 11.29,9.92C11.1,10.16 11,10.5 11,11H13C13,10.72 13.05,10.5 13.14,10.32C13.23,10.15 13.4,10 13.66,9.85C14.12,9.64 14.5,9.36 14.79,9C15.08,8.63 15.23,8.24 15.23,7.8C15.23,7.1 14.96,6.54 14.42,6.12C13.88,5.71 13.13,5.5 12.19,5.5M11,12V14H13V12H11Z"></path>
                            </svg>
                        </div>
                        <b class="box-score-title">Reasonable prices</b>
                        <p class="desc text-justify">In the business plan, the investment cost is always given special attention; the trader always has to calculate every detail because the money spent must be commensurate with the quality. If you are not sure which reputable business to choose in the field of furniture, please contact Full House immediately. A team of professional and dedicated consultants is always ready to serve. When you have chosen the full service at Full House Furniture, you will not have to worry about the price because we have calculated how to best suit you.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-box-score equal-elem ">
                        <div style="text-align:center;">
                            <svg fill="rgba(0, 0, 0, 1)" height="20%" viewBox="0 0 24 24" width="20%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M4,2A2,2 0 0,0 2,4V16A2,2 0 0,0 4,18H8V21A1,1 0 0,0 9,22H9.5V22C9.75,22 10,21.9 10.2,21.71L13.9,18H20A2,2 0 0,0 22,16V4C22,2.89 21.1,2 20,2H4M4,4H20V16H13.08L10,19.08V16H4V4M12.19,5.5C11.3,5.5 10.59,5.68 10.05,6.04C9.5,6.4 9.22,7 9.27,7.69C0.21,7.69 6.57,7.69 11.24,7.69C11.24,7.41 11.34,7.2 11.5,7.06C11.7,6.92 11.92,6.85 12.19,6.85C12.5,6.85 12.77,6.93 12.95,7.11C13.13,7.28 13.22,7.5 13.22,7.8C13.22,8.08 13.14,8.33 13,8.54C12.83,8.76 12.62,8.94 12.36,9.08C11.84,9.4 11.5,9.68 11.29,9.92C11.1,10.16 11,10.5 11,11H13C13,10.72 13.05,10.5 13.14,10.32C13.23,10.15 13.4,10 13.66,9.85C14.12,9.64 14.5,9.36 14.79,9C15.08,8.63 15.23,8.24 15.23,7.8C15.23,7.1 14.96,6.54 14.42,6.12C13.88,5.71 13.13,5.5 12.19,5.5M11,12V14H13V12H11Z"></path>
                            </svg>
                        </div>
                        <b class="box-score-title">Preeminent Products</b>
                        <p class="desc">One of the most outstanding features of Full House furniture products is their smart design, which helps you save space while still having all the necessary functions. Besides, this superior feature also helps you save a lot of money; you will not need to spend money to buy two products because the smart design will integrate 2-in-1 and even 3-in-1 furniture. 1. In addition, the design of Full House furniture products is very suitable for the lifestyle of Vietnamese people. Currently, customers prefer a sophisticated but unobtrusive style, bringing modern and luxurious beauty to interior spaces. In addition to the features, you can also easily feel the beauty of their materials.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-box-score equal-elem ">
                        <div style="text-align:center;">
                            <svg fill="rgba(0, 0, 0, 1)" height="20%" viewBox="0 0 24 24" width="20%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M4,2A2,2 0 0,0 2,4V16A2,2 0 0,0 4,18H8V21A1,1 0 0,0 9,22H9.5V22C9.75,22 10,21.9 10.2,21.71L13.9,18H20A2,2 0 0,0 22,16V4C22,2.89 21.1,2 20,2H4M4,4H20V16H13.08L10,19.08V16H4V4M12.19,5.5C11.3,5.5 10.59,5.68 10.05,6.04C9.5,6.4 9.22,7 9.27,7.69C0.21,7.69 6.57,7.69 11.24,7.69C11.24,7.41 11.34,7.2 11.5,7.06C11.7,6.92 11.92,6.85 12.19,6.85C12.5,6.85 12.77,6.93 12.95,7.11C13.13,7.28 13.22,7.5 13.22,7.8C13.22,8.08 13.14,8.33 13,8.54C12.83,8.76 12.62,8.94 12.36,9.08C11.84,9.4 11.5,9.68 11.29,9.92C11.1,10.16 11,10.5 11,11H13C13,10.72 13.05,10.5 13.14,10.32C13.23,10.15 13.4,10 13.66,9.85C14.12,9.64 14.5,9.36 14.79,9C15.08,8.63 15.23,8.24 15.23,7.8C15.23,7.1 14.96,6.54 14.42,6.12C13.88,5.71 13.13,5.5 12.19,5.5M11,12V14H13V12H11Z"></path>
                            </svg>
                        </div>
                        <b class="box-score-title">Comprehensive, Long-Term Warranty Service</b>
                        <p class="desc">Intent on providing a great experience, Full House always has care policies, bringing comprehensive benefits to its customers. With a warranty ranging from 1 year to a lifetime warranty, along with a team of enthusiastic consultants, it is guaranteed to bring the best and most attractive quality services.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- strengths end -->
        <!-- culture start -->
        <section>
            <div class="aboutus-info style-center">
                <b class="box-title">Mission</b>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-info style-small-left">
                        <b class="box-title">01. INTEGRITY</b>
                        <p class="txt-content">Integrity is seen as a virtue associated with morality. Each individual who has become a part of Full House must always be honest, straightforward, consistent, transparent, consistent, and responsible for the work, the collective, the company, and the community. Acting with integrity will build trust, confidence, and credibility within the company, as well as the trust of partners and customers at Full House.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-info style-small-left">
                        <b class="box-title">02. RESPECT</b>
                        <p class="txt-content">At Full House, respecting yourself, respecting colleagues, respecting the company, respecting partners, and respecting customers are considered factors that must be put on top.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-info style-small-left">
                        <b class="box-title">03. Equitable</b>
                        <p class="txt-content">Being fair to all employees, partners, customers, and stakeholders is one of the six cultures at Full House.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-info style-small-left">
                        <b class="box-title">04. Observe</b>
                        <p class="txt-content">Compliance with discipline is the core foundation for a healthy, disciplined, and orderly collective. At Full House, each individual must commit to being responsible for his or her work, each promise must not conflict with the company's actions and development goals.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-info style-small-left">
                        <b class="box-title">05. CREATIVE</b>
                        <p class="txt-content">Creativity and development are the most important things for Full House to become more and more perfect. We are constantly researching, updating trends, capturing the market to define goals, devising innovative and creative strategies, and bringing the best furniture products to serve our customers.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="aboutus-info style-small-left">
                        <b class="box-title">06. QUALITY</b>
                        <p class="txt-content">Attached to the vision, mission, and core values, Full House is constantly improving and is committed to providing its customers with the highest standard of quality furniture products.</p>
                    </div>
                </div>
            </div>
        </section>
    </div><!--end container-->
    <div class="wrap-function-info">
        <img class="col-sm-4 col-xs-12" style="padding:0;margin:0;" src="{{ asset('/frontend/images/about_intro_01_ban-an-tron-chan-sat.jpg')}}" alt="">
        <img class="col-sm-4 col-xs-12" style="padding:0;margin:0;" src="{{ asset('/frontend/images/about_intro_02_tu-trung-bay-phong-khach.jpg')}}" alt="">
        <img class="col-sm-4 col-xs-12" style="padding:0;margin:0;" src="{{ asset('/frontend/images/about_intro_03_sofa-wilder-chu-l.jpg')}}" alt="">
        <img class="col-sm-4 col-xs-12" style="padding:0;margin:0;" src="{{ asset('/frontend/images/about_intro_04_ba68007-ban-an-5.jpg')}}" alt="">
        <img class="col-sm-4 col-xs-12" style="padding:0;margin:0;" src="{{ asset('/frontend/images/about_intro_05_sofa-goc-chu-l-nho-gon-3.jpg')}}" alt="">
        <img class="col-sm-4 col-xs-12" style="padding:0;margin:0;" src="{{ asset('/frontend/images/about_intro_06_sofa-don-modway-05.jpg')}}" alt="">
    </div>
</main>

@endsection
