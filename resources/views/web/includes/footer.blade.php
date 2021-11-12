<footer id="footer" class="footer-wrapper">
    <!-- FOOTER 1 -->
    <div class="footer-widgets footer footer-1">
        <div class="row dark large-columns-3 mb-0">
            <div id="block_widget-2" class="col pb-0 widget block_widget">
                <div class="menunz">
                    <div class="rmenunz">
                        <div class="rmenunz1"><img
                                src="{{ asset('assets/wp-content/uploads/2021/05/nz-goi-ngay.svg') }}"
                                alt="Gọi ngay" /></div>
                        <div class="rmenunz2"><a href="tel:0382300533">Gọi ngay <i class="fa fa-phone"></i>
                                {{ \App\Helper\Seo::getSetting('phone') }}</a></div>
                    </div>
                    <div class="rmenunz">
                        <div class="rmenunz1"><img
                                src="{{ asset('assets/wp-content/uploads/2021/05/nz-zalo-48-tron.png') }}" alt=""
                                width="48" height="48" style="border: 1px solid #1da3e2;border-radius: 100%;" /></div>
                        <div class="rmenunz2"><a href="https://zalo.me/0382300533">Liên hệ Zalo <i
                                    class="fa fa-comments"></i> {{ \App\Helper\Seo::getSetting('phone') }}</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER 2 -->
        <div class="absolute-footer dark medium-text-center small-text-center">
            <div class="container clearfix">
                <div class="footer-primary pull-left">
                    <div class="menu-top-bot-menu-container">
                        <ul id="menu-top-bot-menu-1" class="links footer-nav uppercase">
                            <li id="menu-item-169"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-169 menu-item-design-default">
                                <a href="{{ route('pay_info.index') }}" class="nav-top-link">Thanh toán &#8211;
                                    Chuyển khoản</a>
                            </li>
                            <li id="menu-item-8725"
                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-8725 menu-item-design-default">
                                <a href="{{ route('guide.index') }}" class="nav-top-link">Hướng dẫn sử dụng</a>
                            </li>
                            <li id="menu-item-155"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-155 menu-item-design-default">
                                <a href="{{ route('support.index') }}" class="nav-top-link">Thông tin liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright-footer">
                        Copyright 2021 © <strong>Thiết kế bởi dichvuquangcao</strong>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .menunz {
                display: block;
                position: fixed;
                right: -250px;
                width: 325px;
                bottom: 0px;
                z-index: 696969 !important;
                padding: 5px;
            }
            .rmenunz {
                color: white;
                font-size: 18px;
                padding: 5px;
                cursor: pointer;
                width: 325px;
                display: block;
                clear: both;
                z-index: 69696 !important;
            }
            .rmenunz1 {
                float: left;
                width: 60px;
                height: 55px;
                z-index: 6969 !important;
                padding-left: 10px;
            }
            .rmenunz1 img {
                max-width: 48px;
            }
            .rmenunz2 {
                border: 1px solid #00adef;
                right: -20px;
                position: absolute;
                color: white;
                text-align: center;
                float: left;
                width: 275px;
                background: linear-gradient(to right, #0e75bb 35%, #00adef 100%);
                margin-right: -10px;
                border-radius: 5px;
                padding: 10px 15px;
                line-height: 26px;
                z-index: 696 !important;
                transition: right 1s;
            }
            .rmenunz3 {
                color: white;
                display: none;
                float: left;
                width: 0px;
                background: #008446;
                margin-left: 0px;
                margin-right: 10px;
                border-radius: 5px;
                padding: 10px 20px;
                color: green;
            }
            .rmenunz:hover {
                right: 0px;
                transition: right .6s ease 0s;
            }
            .rmenunz:hover .rmenunz1 {
                transition: all .6s ease 0s;
                transform: rotateZ(720deg);
            }
            .rmenunz:hover .rmenunz2 {
                display: inline-block;
                -moz-transition: all .6s ease 0s;
                -webkit-transition: right .6s ease 0s;
                -o-transition: right .6s ease 0s;
                right: 335px;
                width: 280px;
                transition: right .6s ease 0s;
            }
            .rmenunz:hover .rmenunz3 {
                display: block;
                width: 325px;
                transition: all .6s ease 0s;
            }
            .rmenunz2:after {
                position: absolute;
                right: -15px;
                border-width: 0px;
                bottom: 0px;
                border-style: solid;
                border-color: #00adef transparent;
                display: block;
                width: 0;
                eight: 0;
                border-top: 23px solid transparent;
                border-bottom: 22px solid transparent;
                border-left: 15px solid #00adef;
                content: '';
            }
            .menunz a {
                color: #ffea32;
            }
            .phonenz {
                display: block;
                position: fixed;
                right: 10px;
                width: 60px;
                height: 60px;
                top: 100px;
                z-index: 696969 !important;
                padding: 5px;
                cursor: pointer;
            }
            @keyframes xoaytron {
                0% {
                    -webkit-transform: rotateY(0deg);
                    transform: rotateZ(0deg);
                    padding: 0px;
                    filter: brightness(50%);
                }
                85% {
                    -webkit-transform: rotateZ(1080deg);
                    transform: rotateZ(1080deg);
                    padding: 0px;
                    filter: brightness(100%);
                }
                100% {
                    -webkit-transform: rotateZ(1080deg);
                    transform: rotateZ(1080deg);
                    padding: 0px;
                    filter: brightness(20%);
                }
            }
            .phonenz0 img {
                transition: xoaytron 1s cubic-bezier(1, -0.21, 0, 1.21);
                animation-duration: 15s;
                animation-name: xoaytron;
                animation-iteration-count: infinite;
                animation-direction: alternate;
            }
            /***************  MOBILE ***************/
            @media only screen and (max-width: 48em) {
                .phonenz {
                    bottom: 0px;
                }
                .menunz {
                    bottom: 50px;
                }
            }
        </style>
    </div>
</footer>
