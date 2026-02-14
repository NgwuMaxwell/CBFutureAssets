@extends('layouts.')

@section('title', 'Terms')



@section('content')


 
       
       

  



    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(temp/front/assets/img/banner/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>PRIVACY POLICY</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        
                        <li class="active">Privacy policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area single full-blog full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-10 col-md-offset-1">
                        <div class="item">

                            <!-- Start Post Thumb -->
                            <div class="thumb">
                                <img src="temp/front/assets/img/blog/v1.jpg" alt="Thumb">
                                <span class="post-formats"><i class="fas fa-image"></i></span>
                            </div>
                            <!-- Start Post Thumb -->

                            <div class="info content-box">
                                <div class="meta">
                                    <div class="cats">
                                       <a href="risk">Risk warning</a> 
                                        <a href="terms">Terms and Conditions</a>
                                    </div>
                                   
                                </div>
                                
                                 
                                    <h3>PRIVACY POLICY</h3>
                                    
									         <p>{{$settings->site_name}} is fully committed to the protection of the privacy of personal and financial information of its clients.  We carefully explain how we handle the data of our clients and ensure its protection. By opening an account, the client hereby gives {{$settings->site_name}} its consent to such collection, processing, storage, and use of personal information by {{$settings->site_name}} as explained below.<br>
                            
                            <h5 class="font-weight-600">Collection of Personal Information</h5> <br>
                            {{$settings->site_name}} collects the necessary information required to open, transact, and safeguard your assets and your privacy, and provides you with the services you need. {{$settings->site_name}} gathers information from you and may, in certain circumstances, gather information from relevant banks and/or credit agencies, and/or other sources which help us better profile your requirements and preferences and provide improved services to you. <br><br>

                            <h5 class="font-weight-600">The information {{$settings->site_name}} collects may include:</h5> <br>
                            <h5 class="font-weight-600">Application information</h5> <br>
                            Personal information you provide us with in your application form, such as your name, address, date of birth, email address, etc., in order to facilitate the evaluation of your application. The information you provide us with is also used for purposes of communicating with you.<br><br>

                            <h5 class="font-weight-600">Transaction information</h5> <br>
                            Information about the anticipated volume and value of your transactions with us, and income information provided in order to enable the construction of your economic profile.<br><br>

                            <h5 class="font-weight-600">Verification information</h5> <br>
                            Information necessary to verify your identity, such as an identification card, passport, or driver's license. This also includes background information we receive about you from public records, or from other entities not affiliated with {{$settings->site_name}}.<br><br>

                            <h5 class="font-weight-600">Usage of Personal Information/Opt Out</h5> <br>
                            No personal information will be shared with any third parties without the customer’s permission.<br>
                            {{$settings->site_name}} uses personal information only as required, in order to provide quality service and security to you. This information helps improve services, customize the browsing experience, and enables us to inform you of additional products, services, or promotions relevant to you and the products and services you need, as well as your consent for use of such data.<br>
                            If you do not want to receive information of this nature for any reason, please contact us at the following address: {{$settings->contact_email}}<br>
                            Although you are not required to provide {{$settings->site_name}}  with any of the personal information that we may request of you, please note that failure to do so, could result in {{$settings->site_name}} being unable to open your account, or provide you with the service you need.<br>
                            Whilst we attempt to ensure that all the information we hold about you is current, accurate, and complete, we urge you to immediately contact us if any of your personal details have changed.<br><br>

                            <h5 class="font-weight-600">Protection of personal information</h5> <br>
                            Any personal information you provide us will be treated as confidential, shared only within {{$settings->site_name}} and its affiliates, and will not be disclosed to any third party, except under any regulatory or legal proceedings.<br>
                            The personal information that you provide while registering yourself as a user of the site is protected. You can access your registration information through a password selected by you. This password is encrypted, known only to you, and will not be revealed to anyone else.<br>
                            Registration information is safely stored on secure servers that only authorized personnel have access to via a secure password. The company encrypts all personal information, as it is transferred to the company, thus making all of the necessary effort to prevent unauthorized parties from viewing any of this  information.<br><br>

                            <h5 class="font-weight-600">Affiliates and Partners</h5> <br><br>
                            <h5 class="font-weight-600">Partnership</h5> <br>
                            {{$settings->site_name}}’ Partnership program is open to anyone. Our competitive partnership offers make us a valued partner for institutions, business introducers, white labels, affiliates, and regional representatives worldwide.<br><br>

                            <h5 class="font-weight-600">Who can benefit from {{$settings->site_name}}’ Partnership Program?</h5> <br>
                            * Large institutions who want to outsource their entire Forex department and operations 
                            * Small companies with state-of-the-art marketing, technology, and liquidity solutions for the Forex industry 
                            * Fund Managers who want to make additional profit based on their existing client base. 
                            * Business introducers who want to introduce their client base to {{$settings->site_name}}. 
                            * An individual  who refers their friends to {{$settings->site_name}} as potential clients.<br><br>

                            <h5 class="font-weight-600">What Advantages does the {{$settings->site_name}} Partnership Program offer?</h5> <br>
                            * Multilingual platforms, customer support, sales, and retention strategies
                            * Sound risk-management policies from {{$settings->site_name}}
                            * Innovative marketing strategies to help generate and convert traffic into actual clients
                            * High paying, flexible, and competitive commission structures.
                            * A personal, dedicated, account manager to help you with all your needs.
                            * Customized solutions for business introducers, and more! <br><br>

                            <h5 class="font-weight-600">Affiliate Program</h5> <br>
                            {{$settings->site_name}} offers rewarding commission packages to our affiliates around the world. Become a part of the {{$settings->site_name}} Affiliate team, and see how we can all benefit from this relationship.<br>
                            If you’re interested, simply contact us at {{$settings->contact_email}}  <br><br>

                            <h5 class="font-weight-600">Non-affiliated third parties</h5> <br>
                            {{$settings->site_name}}  does not sell, license, lease, or otherwise disclose personal information to third parties, except as described in this privacy statement.<br>
                            {{$settings->site_name}} reserves the right to disclose information as necessary to credit reporting or collection agencies as reasonably required in order to provide services to you.<br>
                            In order to  help us improve our services, {{$settings->site_name}}  may involve third parties to help carry out certain internal functions, such as account processing, fulfillment, client service, client satisfaction surveys, or other data collection activities relevant to our business. Use of the shared information may also be used to provide professional, legal, or accounting advice to {{$settings->site_name}}. Use of shared information is strictly limited to the performance of the above, and is not permitted for any other use. All third parties with which {{$settings->site_name}} shares personal information are required to protect this information in accordance with all relevant legislation, and in a manner similar to the way {{$settings->site_name}}  protects the same. {{$settings->site_name}}  will not share personal information with third parties.<br>
                            A business introducer may have access to your information. You hereby unambiguously and unequivocally consent to the sharing of information with a business introducer.<br>
                            You acknowledge that in order to provide services to you, it may be necessary for information to be transferred outside of the European Economic area, and you consent to such a transfer. <br><br>

                            <h5 class="font-weight-600">Regulatory Disclosure</h5> <br>
                            {{$settings->site_name}}  reserves the right to disclose personal information to third parties where required by law, regulatory, law enforcement, or other government authority of a competent jurisdiction in order to protect our rights, and/or to comply with such legal proceedings. Such disclosure shall occur on a ‘need-to-know’ basis, unless otherwise instructed by a regulatory, or other government authority. Under such circumstances, {{$settings->site_name}} shall expressly inform the third party regarding the confidential nature of the information. <br><br>

                            <h5 class="font-weight-600">Restriction of responsibility</h5> <br>
                            {{$settings->site_name}} is not responsible for the privacy policies, or the content of sites forex-boss.com links to, and has no control of the use or protection of information provided by clients or collected by those sites. Whenever a client chooses to link to a co-branded website, or to a linked web site, this client may be asked to provide proof of registration or other information. Please note that such information is recorded by a third party, and will be governed by the privacy policy of that third party. <br><br>

                            <h5 class="font-weight-600"> Use of "COOKIES"</h5> <br>
                            {{$settings->site_name}} uses cookies in order to secure your trading activities, and to enhance the performance of the {{$settings->site_name}} website. Cookies used by {{$settings->site_name}} do not contain personal information or other sensitive information.<br>
                            {{$settings->site_name}} may share website usage statistics with reputable advertising companies, and with its affiliated marketing companies. The information collected by the advertising company is not personally identifiable.<br>
                            To administer and improve the {{$settings->site_name}} website, we may use third parties to track and analyze usage and statistical volume information. The third party may use cookies to track behavior, and may set cookies on {{$settings->site_name}}’ behalf. These cookies do not contain any personally identifiable information. <br><br>

                            <h5 class="font-weight-600">Privacy Statement Updates</h5> <br>
                            From time to time, {{$settings->site_name}} may update this Privacy Statement. In the event that {{$settings->site_name}} materially changes this Privacy Statement, including how we collect, process or use your personal information, the revised Privacy Statement will be posted to the website. The clients agrees to accept posting of a revised Privacy Statement electronically on the web site as actual notice to him or her. Any dispute over our Privacy Statement is subject to this notice, and our Customer Agreement. {{$settings->site_name}}  encourages client to periodically check back and review this policy, so that he or she  always will know what information {{$settings->site_name}} collects, how {{$settings->site_name}}  uses it, and to whom {{$settings->site_name}} may disclose it. <br><br>

                            <h5 class="font-weight-600">Agreement</h5> <br>
                            I have read, understood, and agreed to the above Privacy Policy Agreement, and I confirm that I have full power and authority to enter into this Agreement.
                         
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

 
  
    
 
@endsection