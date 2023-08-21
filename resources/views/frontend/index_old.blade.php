@extends('frontend.layouts.app')

@section('content')

    <!-- theme settings area start -->
    <div class="theme__settings transition-3">
        <div class="theme__settings-btn">
            <button type="button" class="theme__settings-expand" id="theme-setting-toggle"><i
                    class="fa-solid fa-gear"></i></button>
            <button type="button" class="theme__settings-close" id="theme-setting-close"><i
                    class="fa-regular fa-xmark"></i></button>
        </div>
        <div class="theme__settings-wrapper text-center">

            <div class="theme__switch mb-30">
                <h4 class="theme__settings-title">Select your desired theme</h4>
                <!-- light dark moode switcher start -->
                <div class="my_switcher setting-option">
                    <ul>
                        <li>
                            <a href="javascript: void(0);" data-theme="dark" class="setColor dark theme__switcher-btn">
                                <i class="fa-light fa-moon"></i> Dark
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" data-theme="light"
                               class="setColor light theme__switcher-btn">
                                <i class="fa-light fa-brightness-low"></i> Light
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- light dark moode switcher end -->
            </div>

            <div class="theme__settings-color">
                <h4 class="theme__settings-title">Select your favorite color</h4>

                <div class="theme__settings-color-input">
                    <input type="color" data-color="color" value="#3771FE">
                </div>
            </div>
        </div>
    </div>
    <!-- theme settings area end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="offcanvas__wrapper">
                        <div class="offcanvas__content">
                            <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                                <div class="offcanvas__logo logo">
                                    <a href="index.html">
                                        <img src="assets/img/logo/logo-black.png" alt="logo">
                                    </a>
                                </div>
                                <div class="offcanvas__close">
                                    <button class="offcanvas__close-btn" data-bs-toggle="modal"
                                            data-bs-target="#offcanvasmodal">
                                        <i class="fal fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="offcanvas__search mb-25">
                                <form action="#">
                                    <input type="text" placeholder="What are you searching for?">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <div class="mobile-menu fix mb-40"></div>
                            <div class="offcanvas__wallet mb-25 d-sm-none">
                                <a href="wallet.html" class="offcanvas__wallet-btn">
                                    <svg viewBox="0 0 19 16">
                                        <path
                                            d="M17.5 5.83333V10.1667C17.5 13.5 15.9 14.5 13.5 14.5H5.5C2.5 14.5 1.5 13 1.5 10.1667V5.83333C1.5 3 2.5 2 4.852 1.552C5.06 1.51733 5.276 1.5 5.5 1.5H13.5C13.708 1.5 13.908 1.50866 14.1 1.54332C16.5 2 17.5 3 17.5 5.83333Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                        <path d="M9 5.03314H5" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path
                                            d="M17.2998 5.75061H14.8998C14.0198 5.75061 13.2998 6.65061 13.2998 7.75061C13.2998 8.85061 14.0198 9.75061 14.8998 9.75061H17.2998"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    </svg>
                                    Wallet
                                </a>
                            </div>
                            <div class="offcanvas__notification d-sm-none d-flex align-items-center mb-25">
                                <div class="offcanvas__notification-icon mr-25">
                                    <a href="activity.html">
                                        <i class="fa-light fa-bell"></i>
                                        <span class="notification-count">8</span>
                                    </a>
                                </div>
                                <div class="offcanvas__notification-text">
                                    <p>You have <span class="notification-number">8</span> notifications <a
                                            href="activity.html">view</a></p>
                                </div>
                            </div>
                            <div class="offcanvas__text d-none d-lg-block">
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and
                                    praising pain was born and will give you a complete account of the system and
                                    expound the actual teachings of the great explore</p>
                            </div>
                            <div class="offcanvas__map d-none d-lg-block mb-15">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd"></iframe>
                            </div>
                            <div class="offcanvas__contact mt-30 mb-20">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <div class="offcanvas__contact-icon mr-15">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="offcanvas__contact-text">
                                            <a target="_blank"
                                               href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A,
                                                Mirnada City Tower, NYC</a>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="offcanvas__contact-icon mr-15">
                                            <i class="far fa-phone"></i>
                                        </div>
                                        <div class="offcanvas__contact-text">
                                            <a href="mailto:support@gmail.com">088889797697</a>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="offcanvas__contact-icon mr-15">
                                            <i class="fal fa-envelope"></i>
                                        </div>
                                        <div class="offcanvas__contact-text">
                                            <a href="tel:+012-345-6789">support@mail.com</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="offcanvas__social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas area end -->
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <main>

        <!-- creator area start -->
        <section class="creator__area">
            <div class="creator__banner include-bg" data-background="assets/img/creator/creator-bg.jpg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="creator__user-wrapper text-center">
                            <div class="creator__user-thumb">
                                <img src="assets/img/creator/user-1.jpg" alt="">
                            </div>
                            <h3 class="creator__user-title">Ruüd van</h3>
                            <div class="creator__user-copyright d-inline-block">
                                <div class="creator__user-copyright-inner d-flex align-items-center">
                                    <div class="creator__user-copyright-icon">
                                        <i class="fa-brands fa-ethereum"></i>
                                    </div>
                                    <div class="creator__user-copyright-text">
                                        <span>0xF74d ... 1224</span>
                                        <button type="button">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.6">
                                                    <path
                                                        d="M5.80388 13.2632H3.5941C1.28115 13.2632 0 11.9967 0 9.68638V3.57677C0 1.27497 1.27255 0 3.5941 0H7.52354C9.83649 0 11.1176 1.26642 11.1176 3.57677C11.1176 3.92761 10.8253 4.21854 10.4728 4.21854C10.1202 4.21854 9.8279 3.92761 9.8279 3.57677C9.8279 1.96808 9.14003 1.28353 7.52354 1.28353H3.5941C1.97762 1.28353 1.28975 1.96808 1.28975 3.57677V9.68638C1.28975 11.2951 1.97762 11.9796 3.5941 11.9796H5.80388C6.15641 11.9796 6.44875 12.2706 6.44875 12.6214C6.44875 12.9722 6.15641 13.2632 5.80388 13.2632Z"
                                                        fill="white"/>
                                                    <path
                                                        d="M11.8705 14H9.54195C8.17131 14 7.41211 13.1959 7.41211 11.729V7.84992C7.41211 6.38846 8.16622 5.57895 9.54195 5.57895H11.8705C13.2411 5.57895 14.0003 6.38302 14.0003 7.84992V11.729C14.0003 13.1959 13.2462 14 11.8705 14ZM9.54195 6.39389C8.58403 6.39389 8.17641 6.82852 8.17641 7.84992V11.729C8.17641 12.7504 8.58403 13.1851 9.54195 13.1851H11.8705C12.8284 13.1851 13.236 12.7504 13.236 11.729V7.84992C13.236 6.82852 12.8284 6.39389 11.8705 6.39389H9.54195Z"
                                                        fill="white" stroke="white" stroke-width="0.2"/>
                                                </g>
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="creator__follow">
                                <p><span>604</span> followers</p>
                                <p><span>2</span> following</p>
                            </div>
                            <div class="creator__action">
                                <ul>
                                    <li><a href="#">Follow</a></li>
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#messagemodal">Send
                                            Message</a></li>
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#sharemodal">Share</a></li>
                                    <li>
                                        <a href="#" class="more dropdown-toggle nft-more-btn" data-bs-toggle="dropdown"
                                           aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></a>
                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                            <ul>
                                                <li>
                                                    <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#reportmodal">Report
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="creator__tab">
                                <!-- <nav>
                                <div class="nav nav-tabs justify-content-md-center" id="nav-tab" role="tablist">

                                    <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab" data-bs-target="#nav-sale" type="button" role="tab" aria-controls="nav-sale" aria-selected="true">On sale <span class="number">8</span></button>

                                    <button class="nav-link active" id="nav-created-tab" data-bs-toggle="tab" data-bs-target="#nav-created" type="button" role="tab" aria-controls="nav-created" aria-selected="false">Created <span class="number">24</span></button>

                                    <button class="nav-link" id="nav-collection-tab" data-bs-toggle="tab" data-bs-target="#nav-collection" type="button" role="tab" aria-controls="nav-collection" aria-selected="false">Collections</button>

                                    <button class="nav-link" id="nav-liked-tab" data-bs-toggle="tab" data-bs-target="#nav-liked" type="button" role="tab" aria-controls="nav-liked" aria-selected="false">Liked <span class="number">24</span></button>

                                </div>
                            </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="creator__border"></div>
            <div class="creator__item-wrapper pt-40 pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-sale" role="tabpanel" aria-labelledby="nav-sale-tab">
                                    <div class="create__sale">
                                        <div class="row">
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-4.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 20</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Amazing digital art</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>1.00 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>8 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-5.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 54</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Prime Ape Planet</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>4.01 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>4 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-6.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 35</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Based Mafia</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>1.00 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>11 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-7.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 48</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Beach Moon Escape</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>4.02 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>9 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-7.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 48</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Beach Moon Escape</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>4.02 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>9 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-8.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 25</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">New Year Evangelist</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>2.47 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>14 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-1.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 24</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Terrestrial black
                                                                    hole</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>3.54 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>6 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-2.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 10</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Chickolatev2</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>2.02 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>10 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="nft__more text-center mt-20">
                                                    <a href="shop.html" class="tp-load-more"><i
                                                            class="fa-light fa-arrow-rotate-right"></i>View all
                                                        items</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="nav-created" role="tabpanel"
                                     aria-labelledby="nav-created-tab">
                                    <div class="row">
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                <div
                                                    class="nft__box-top d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-user">
                                                        <ul>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-1.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-2.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-3.jpg" alt="">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nft__box-more">
                                                        <button type="button" class="dropdown-toggle nft-more-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-regular fa-ellipsis"></i>
                                                        </button>
                                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#sharemodal">Share
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#reportmodal">Report
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nft__box-thumb m-img mb-20">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/bid/2/bid-img-1.jpg" alt="">
                                                    </a>
                                                    <div class="nft__box-popularity">
                                                        <a href="product-details.html"><i class="fa-solid fa-heart"></i>
                                                            24</a>
                                                    </div>
                                                </div>
                                                <div class="nft__box-content">
                                                    <div
                                                        class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                        <h3 class="nft__box-title">
                                                            <a href="product-details.html">Terrestrial black hole</a>
                                                        </h3>
                                                        <div class="nft__box-trending-icon">
                                                            <span><i class="fa-brands fa-ethereum"></i></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-info d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-price">
                                                            <p>3.54 ETH</p>
                                                        </div>
                                                        <div class="nft__box-stock">
                                                            <p>6 in stock</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-highest">
                                                        <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                    </div>
                                                    <div class="nft__box-bid">
                                                        <p>0.001 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                <div
                                                    class="nft__box-top d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-user">
                                                        <ul>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-1.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-2.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-3.jpg" alt="">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nft__box-more">
                                                        <button type="button" class="dropdown-toggle nft-more-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-regular fa-ellipsis"></i>
                                                        </button>
                                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#sharemodal">Share
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#reportmodal">Report
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nft__box-thumb m-img mb-20">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/bid/2/bid-img-2.jpg" alt="">
                                                    </a>
                                                    <div class="nft__box-popularity">
                                                        <a href="product-details.html"><i class="fa-solid fa-heart"></i>
                                                            10</a>
                                                    </div>
                                                </div>
                                                <div class="nft__box-content">
                                                    <div
                                                        class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                        <h3 class="nft__box-title">
                                                            <a href="product-details.html">Chickolatev2</a>
                                                        </h3>
                                                        <div class="nft__box-trending-icon">
                                                            <span><i class="fa-brands fa-ethereum"></i></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-info d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-price">
                                                            <p>2.02 ETH</p>
                                                        </div>
                                                        <div class="nft__box-stock">
                                                            <p>10 in stock</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-highest">
                                                        <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                    </div>
                                                    <div class="nft__box-bid">
                                                        <p>0.001 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                <div
                                                    class="nft__box-top d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-user">
                                                        <ul>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-1.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-2.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-3.jpg" alt="">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nft__box-more">
                                                        <button type="button" class="dropdown-toggle nft-more-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-regular fa-ellipsis"></i>
                                                        </button>
                                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#sharemodal">Share
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#reportmodal">Report
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nft__box-thumb m-img mb-20">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/bid/2/bid-img-3.jpg" alt="">
                                                    </a>
                                                    <div class="nft__box-popularity">
                                                        <a href="product-details.html"><i class="fa-solid fa-heart"></i>
                                                            12</a>
                                                    </div>
                                                </div>
                                                <div class="nft__box-content">
                                                    <div
                                                        class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                        <h3 class="nft__box-title">
                                                            <a href="product-details.html">Brave Tigers NFT</a>
                                                        </h3>
                                                        <div class="nft__box-trending-icon">
                                                            <span><i class="fa-brands fa-ethereum"></i></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-info d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-price">
                                                            <p>0.01 ETH</p>
                                                        </div>
                                                        <div class="nft__box-stock">
                                                            <p>7 in stock</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-highest">
                                                        <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                    </div>
                                                    <div class="nft__box-bid">
                                                        <p>0.001 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                <div
                                                    class="nft__box-top d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-user">
                                                        <ul>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-1.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-2.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-3.jpg" alt="">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nft__box-more">
                                                        <button type="button" class="dropdown-toggle nft-more-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-regular fa-ellipsis"></i>
                                                        </button>
                                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#sharemodal">Share
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#reportmodal">Report
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nft__box-thumb m-img mb-20">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/bid/2/bid-img-4.jpg" alt="">
                                                    </a>
                                                    <div class="nft__box-popularity">
                                                        <a href="product-details.html"><i class="fa-solid fa-heart"></i>
                                                            20</a>
                                                    </div>
                                                </div>
                                                <div class="nft__box-content">
                                                    <div
                                                        class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                        <h3 class="nft__box-title">
                                                            <a href="product-details.html">Amazing digital art</a>
                                                        </h3>
                                                        <div class="nft__box-trending-icon">
                                                            <span><i class="fa-brands fa-ethereum"></i></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-info d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-price">
                                                            <p>1.00 ETH</p>
                                                        </div>
                                                        <div class="nft__box-stock">
                                                            <p>8 in stock</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-highest">
                                                        <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                    </div>
                                                    <div class="nft__box-bid">
                                                        <p>0.001 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                <div
                                                    class="nft__box-top d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-user">
                                                        <ul>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-1.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-2.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-3.jpg" alt="">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nft__box-more">
                                                        <button type="button" class="dropdown-toggle nft-more-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-regular fa-ellipsis"></i>
                                                        </button>
                                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#sharemodal">Share
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#reportmodal">Report
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nft__box-thumb m-img mb-20">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/bid/2/bid-img-5.jpg" alt="">
                                                    </a>
                                                    <div class="nft__box-popularity">
                                                        <a href="product-details.html"><i class="fa-solid fa-heart"></i>
                                                            54</a>
                                                    </div>
                                                </div>
                                                <div class="nft__box-content">
                                                    <div
                                                        class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                        <h3 class="nft__box-title">
                                                            <a href="product-details.html">Prime Ape Planet</a>
                                                        </h3>
                                                        <div class="nft__box-trending-icon">
                                                            <span><i class="fa-brands fa-ethereum"></i></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-info d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-price">
                                                            <p>4.01 ETH</p>
                                                        </div>
                                                        <div class="nft__box-stock">
                                                            <p>4 in stock</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-highest">
                                                        <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                    </div>
                                                    <div class="nft__box-bid">
                                                        <p>0.001 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                <div
                                                    class="nft__box-top d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-user">
                                                        <ul>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-1.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-2.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-3.jpg" alt="">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nft__box-more">
                                                        <button type="button" class="dropdown-toggle nft-more-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-regular fa-ellipsis"></i>
                                                        </button>
                                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#sharemodal">Share
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#reportmodal">Report
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nft__box-thumb m-img mb-20">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/bid/2/bid-img-6.jpg" alt="">
                                                    </a>
                                                    <div class="nft__box-popularity">
                                                        <a href="product-details.html"><i class="fa-solid fa-heart"></i>
                                                            35</a>
                                                    </div>
                                                </div>
                                                <div class="nft__box-content">
                                                    <div
                                                        class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                        <h3 class="nft__box-title">
                                                            <a href="product-details.html">Based Mafia</a>
                                                        </h3>
                                                        <div class="nft__box-trending-icon">
                                                            <span><i class="fa-brands fa-ethereum"></i></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-info d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-price">
                                                            <p>1.00 ETH</p>
                                                        </div>
                                                        <div class="nft__box-stock">
                                                            <p>11 in stock</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-highest">
                                                        <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                    </div>
                                                    <div class="nft__box-bid">
                                                        <p>0.001 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                <div
                                                    class="nft__box-top d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-user">
                                                        <ul>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-1.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-2.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-3.jpg" alt="">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nft__box-more">
                                                        <button type="button" class="dropdown-toggle nft-more-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-regular fa-ellipsis"></i>
                                                        </button>
                                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#sharemodal">Share
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#reportmodal">Report
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nft__box-thumb m-img mb-20">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/bid/2/bid-img-7.jpg" alt="">
                                                    </a>
                                                    <div class="nft__box-popularity">
                                                        <a href="product-details.html"><i class="fa-solid fa-heart"></i>
                                                            48</a>
                                                    </div>
                                                </div>
                                                <div class="nft__box-content">
                                                    <div
                                                        class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                        <h3 class="nft__box-title">
                                                            <a href="product-details.html">Beach Moon Escape</a>
                                                        </h3>
                                                        <div class="nft__box-trending-icon">
                                                            <span><i class="fa-brands fa-ethereum"></i></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-info d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-price">
                                                            <p>4.02 ETH</p>
                                                        </div>
                                                        <div class="nft__box-stock">
                                                            <p>9 in stock</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-highest">
                                                        <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                    </div>
                                                    <div class="nft__box-bid">
                                                        <p>0.001 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                <div
                                                    class="nft__box-top d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-user">
                                                        <ul>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-1.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-2.jpg" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="profile.html">
                                                                    <img src="assets/img/bid/2/bid-user-3.jpg" alt="">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nft__box-more">
                                                        <button type="button" class="dropdown-toggle nft-more-btn"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-regular fa-ellipsis"></i>
                                                        </button>
                                                        <div class="nft__more-content dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#sharemodal">Share
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#reportmodal">Report
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nft__box-thumb m-img mb-20">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/bid/2/bid-img-8.jpg" alt="">
                                                    </a>
                                                    <div class="nft__box-popularity">
                                                        <a href="product-details.html"><i class="fa-solid fa-heart"></i>
                                                            25</a>
                                                    </div>
                                                </div>
                                                <div class="nft__box-content">
                                                    <div
                                                        class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                        <h3 class="nft__box-title">
                                                            <a href="product-details.html">New Year Evangelist</a>
                                                        </h3>
                                                        <div class="nft__box-trending-icon">
                                                            <span><i class="fa-brands fa-ethereum"></i></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-info d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-price">
                                                            <p>2.47 ETH</p>
                                                        </div>
                                                        <div class="nft__box-stock">
                                                            <p>14 in stock</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                    <div class="nft__box-highest">
                                                        <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                    </div>
                                                    <div class="nft__box-bid">
                                                        <p>0.001 ETH</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="nft__more text-center mt-20">
                                                <a href="shop.html" class="tp-load-more"><i
                                                        class="fa-light fa-arrow-rotate-right"></i>View all items</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-collection" role="tabpanel"
                                     aria-labelledby="nav-collection-tab">
                                    <div class="creator__collection">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="collection__item text-center mb-30 theme-bg-dark">
                                                    <div class="collection__item-inner">
                                                        <div class="collection__thumb-wrapper">
                                                            <div class="row gx-2">
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-1.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-2.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-3.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-12">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-big-1.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collection__content">
                                                            <div class="collection__profile">
                                                                <a href="profile.html">
                                                                    <img
                                                                        src="assets/img/collection/user/collection-user-1.jpg"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <h3 class="collection__title">
                                                                <a href="collection.html">Modern Art collection</a>
                                                            </h3>
                                                            <p>152 Resources</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="collection__item text-center mb-30 theme-bg-dark">
                                                    <div class="collection__item-inner">
                                                        <div class="collection__thumb-wrapper">
                                                            <div class="row gx-2">
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-4.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-5.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-6.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-12">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-big-2.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collection__content">
                                                            <div class="collection__profile">
                                                                <a href="profile.html">
                                                                    <img
                                                                        src="assets/img/collection/user/collection-user-2.jpg"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <h3 class="collection__title">
                                                                <a href="collection.html">Abstract Figure
                                                                    Collections</a>
                                                            </h3>
                                                            <p>266 Resources</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="collection__item text-center mb-30 theme-bg-dark">
                                                    <div class="collection__item-inner">
                                                        <div class="collection__thumb-wrapper">
                                                            <div class="row gx-2">
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-7.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-8.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-9.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-12">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-big-3.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collection__content">
                                                            <div class="collection__profile">
                                                                <a href="profile.html">
                                                                    <img
                                                                        src="assets/img/collection/user/collection-user-3.jpg"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <h3 class="collection__title">
                                                                <a href="collection.html">Modern Art collection</a>
                                                            </h3>
                                                            <p>152 Resources</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="collection__item text-center mb-30 theme-bg-dark">
                                                    <div class="collection__item-inner">
                                                        <div class="collection__thumb-wrapper">
                                                            <div class="row gx-2">
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-10.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-11.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-12.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-12">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-big-4.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collection__content">
                                                            <div class="collection__profile">
                                                                <a href="profile.html">
                                                                    <img
                                                                        src="assets/img/collection/user/collection-user-4.jpg"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <h3 class="collection__title">
                                                                <a href="collection.html">The Creation by Pak</a>
                                                            </h3>
                                                            <p>102 Resources</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="collection__item text-center mb-30 theme-bg-dark">
                                                    <div class="collection__item-inner">
                                                        <div class="collection__thumb-wrapper">
                                                            <div class="row gx-2">
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-13.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-14.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-15.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-12">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-big-5.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collection__content">
                                                            <div class="collection__profile">
                                                                <a href="profile.html">
                                                                    <img
                                                                        src="assets/img/collection/user/collection-user-5.jpg"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <h3 class="collection__title">
                                                                <a href="collection.html">Dante's Inferno</a>
                                                            </h3>
                                                            <p>166 Resources</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="collection__item text-center mb-30 theme-bg-dark">
                                                    <div class="collection__item-inner">
                                                        <div class="collection__thumb-wrapper">
                                                            <div class="row gx-2">
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-16.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-17.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-4 col-sm-4 col-4">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-18.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-12">
                                                                    <div class="collection__thumb mb-10 m-img">
                                                                        <a href="collection.html">
                                                                            <img
                                                                                src="assets/img/collection/collection-big-6.jpg"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collection__content">
                                                            <div class="collection__profile">
                                                                <a href="profile.html">
                                                                    <img
                                                                        src="assets/img/collection/user/collection-user-6.jpg"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <h3 class="collection__title">
                                                                <a href="collection.html">Shahnewaz's Clash</a>
                                                            </h3>
                                                            <p>102 Resources</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="nft__more text-center mt-20">
                                                    <a href="collection.html" class="tp-load-more"><i
                                                            class="fa-light fa-arrow-rotate-right"></i>View all
                                                        items</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-liked" role="tabpanel"
                                     aria-labelledby="nav-liked-tab">
                                    <div class="creator__like">
                                        <div class="row">
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-5.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 54</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Prime Ape Planet</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>4.01 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>4 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-6.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 35</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Based Mafia</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>1.00 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>11 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-7.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 48</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Beach Moon Escape</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>4.02 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>9 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-8.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 25</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">New Year Evangelist</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>2.47 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>14 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-1.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 24</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Terrestrial black
                                                                    hole</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>3.54 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>6 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-2.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 10</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Chickolatev2</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>2.02 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>10 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-3.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 12</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="#">Brave Tigers NFT</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>0.01 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>7 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                    <div
                                                        class="nft__box-top d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-user">
                                                            <ul>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-1.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-2.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <img src="assets/img/bid/2/bid-user-3.jpg"
                                                                             alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nft__box-more">
                                                            <button type="button" class="dropdown-toggle nft-more-btn"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-regular fa-ellipsis"></i>
                                                            </button>
                                                            <div
                                                                class="nft__more-content dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#sharemodal">Share
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="modal"
                                                                                data-bs-target="#reportmodal">Report
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-thumb m-img mb-20">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/bid/2/bid-img-4.jpg" alt="">
                                                        </a>
                                                        <div class="nft__box-popularity">
                                                            <a href="product-details.html"><i
                                                                    class="fa-solid fa-heart"></i> 20</a>
                                                        </div>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a href="product-details.html">Amazing digital art</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-ethereum"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>1.00 ETH</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>8 in stock</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                        <div class="nft__box-highest">
                                                            <p><i class="fa-light fa-code-fork"></i> Highest bid</p>
                                                        </div>
                                                        <div class="nft__box-bid">
                                                            <p>0.001 ETH</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- creator area end -->

        <!-- marque text area start -->
        <div class="marque__area">
            <div class="container">
                <div class="marque__inner p-relative">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="marque__wrapper">
                                <div class="marque__slider">
                                    <div class="marque__item ">
                                        <p>Discover & Callect Extraordinary Digital Art and Rare NFT’s</p>
                                    </div>
                                    <div class="marque__item">
                                        <p>Discover & Callect Extraordinary Digital Art and Rare NFT’s</p>
                                    </div>
                                    <div class="marque__item">
                                        <p>Discover & Callect Extraordinary Digital Art and Rare NFT’s</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- marque text area end -->

        <!-- share modal start -->
        <div class="share__modal modal fade" id="sharemodal" tabindex="-1" aria-labelledby="sharemodal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="share__modal-content text-center">
                        <div class="share__nft-content">
                            <div class="share__thumb">
                                <img src="assets/img/bid/bid-img-1.jpg" alt="">
                            </div>

                        </div>
                        <div class="share__social">
                            <h3>Share this NFT</h3>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- share modal end -->

        <!-- report modal start -->
        <div class="report__modal modal fade" id="reportmodal" tabindex="-1" aria-labelledby="reportmodal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="report__close">
                        <button type="button" class="report__close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-regular fa-xmark"></i></button>
                    </div>
                    <div class="report__wrapper">
                        <h3 class="report__title">Why are you reporting ?</h3>
                        <p>Describe briefly about your report.</p>
                        <form action="#">
                            <div class="report__input-box">
                                <h4>Message</h4>
                            </div>
                            <div class="report__input">
                                <textarea placeholder="Write your message"></textarea>
                            </div>
                            <div class="report__button">
                                <button type="button" class="tp-btn-square">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- report modal end -->

        <!-- bid popup area start -->
        <div class="bid__modal modal fade" id="bidmodal" tabindex="-1" aria-labelledby="bidmodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="bid__modal-close">
                        <button type="button" class="bid__modal-close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-regular fa-xmark"></i></button>
                    </div>
                    <div class="bid__modal">
                        <h3 class="bid__modal-title">Place your bid</h3>
                        <p>You are about to place bid on this product</p>

                        <div class="bid__modal-form">
                            <form action="#">
                                <div class="bid__modal-input">
                                    <input type="text" placeholder="Enter your bid">
                                    <span class="bid__modal-price">ETH</span>
                                </div>
                                <div class="bid__modal-info">
                                    <p>Your Balance <span>254 ETH</span></p>
                                    <p>Service fee <span>10 ETH</span></p>
                                    <p>Total <span class="color-theme">264 ETH</span></p>
                                </div>
                                <div class="bid__modal-btn">
                                    <button type="submit" class="tp-btn-3">Place bid</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bid popup area end -->

        <!-- send message modal start -->
        <div class="message__modal report__modal modal fade" id="messagemodal" tabindex="-1"
             aria-labelledby="messagemodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="report__close">
                        <button type="button" class="report__close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-regular fa-xmark"></i></button>
                    </div>
                    <div class="report__wrapper">
                        <h3 class="report__title report__title-2">Send your message</h3>
                        <form action="#">
                            <div class="report__input-box">
                                <h4>Message</h4>
                            </div>
                            <div class="report__input">
                                <textarea placeholder="Write your message"></textarea>
                            </div>
                            <div class="report__button">
                                <button type="button" class="tp-btn-square">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- send message modal end -->
    </main>

    <!-- footer area start -->
    <footer>
        <div class="footer__area footer__style-2">
            <div class="footer__top">
                <div class="footer__top-border pt-85 pb-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="footer__widget mb-50 footer-col-4-1">
                                    <div class="footer__info">
                                        <div class="footer__logo">
                                            <a href="#">
                                                <img class="logo-white" src="assets/img/logo/logo.png" alt="">
                                                <img class="logo-black" src="assets/img/logo/logo-black.png" alt="">
                                            </a>
                                        </div>
                                        <p>Raroin is a shared liquidity NFT market smart contract which is used by
                                            multiple websites to provide the users.</p>

                                        <div class="footer__social footer__social-2">
                                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                            <a href="#"><i class="fa-brands fa-dribbble"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6">
                                <div class="footer__widget footer-col-2-2 mb-50" style="margin-left: 50%">
                                    <h3 class="footer__widget-title">Marketplace</h3>

                                    <ul>
                                        <li><a href="#">Start Selling</a></li>
                                        <li><a href="#">Explore NFTs</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Partners</a></li>
                                        <li><a href="#">Marketplace</a></li>
                                        <li><a href="#">List a Item</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6">
                                <div class="footer__widget footer-col-2-3 mb-50" style="margin-left: 50%">
                                    <h3 class="footer__widget-title">Community</h3>

                                    <ul>
                                        <li><a href="#">Games</a></li>
                                        <li><a href="#">Art</a></li>
                                        <li><a href="#">Create A Store</a></li>
                                        <li><a href="#">Photography</a></li>
                                        <li><a href="#">Music</a></li>
                                        <li><a href="#">Collectibles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="footer__widget footer-col-2-4 mb-50">
                                <h3 class="footer__widget-title">Subscribe</h3>

                                <div class="footer__subscribe footer__subscribe-2">
                                    <p>Signup for our newsletter to get the latest news in your inbox.</p>
                                    <form action="#">
                                        <div class="footer__subscribe-form p-relative">
                                            <div class="footer__subscribe-input">
                                                <input type="email" placeholder="E-mail">
                                                <i class="fa-light fa-envelopes"></i>
                                            </div>
                                            <button class="footer__subscribe-input-btn">Subscribe</button>
                                        </div>
                                    </form>
                                    <p class="info">Your email is safe with us. We don't spam.</p>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-6 col-sm-6">
                            <div class="footer__copyright">
                                <p>© 2022 <a href="#">Bitakon</a>. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-sm-6">
                            <div class="footer__menu text-sm-end">
                                <a href="#">Privacy Policy</a>
                                <a href="#">Terms & Conditions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->


    <!-- JS here -->
    <script src="{{asset('frontend-theme/assets/js/vendor/jquery.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/vendor/waypoints.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/bootstrap-bundle.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/cookie.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/style-switcher.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/meanmenu.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/swiper-bundle.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/slick.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/nouislider.min.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/countdown.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/magnific-popup.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/parallax.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/backtotop.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/nice-select.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/counterup.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/wow.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/isotope-pkgd.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/imagesloaded-pkgd.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/main.js')}}"></script>


    <!-- metamask -->
    <script src="{{asset('frontend-theme/assets/js/web3.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/maralis.js')}}"></script>
    <script src="{{asset('frontend-theme/assets/js/connect.js')}}"></script>
    </body>
    </html>




    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-12">--}}
    {{--            <h3 class="page-title">{{ __('frontend/main.home') }}</h3>--}}
    {{--        </div>--}}



    {{--        @if(count($articles))--}}
    {{--            <div class="col-md-12">--}}
    {{--                <div id="newsAccordion" class="accordion-with-icon">--}}
    {{--                    @foreach($articles as $article)--}}
    {{--                    <div class="card mb-15" id="newsHeading-{{ $loop->iteration }}">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h5 class="mb-0">--}}
    {{--                                <button class=" btn-link btn-block text-left text-decoration-none btn-faq" data-toggle="collapse" data-target="#newsCollapse-{{ $loop->iteration }}" aria-expanded="@if($loop->iteration == 1) true @else false @endif" aria-controls="newsCollapse-{{ $loop->iteration }}">--}}
    {{--                                    {{ \App\Classes\LangHelper::translate(app()->getLocale(), 'article', 'title', 'title', $article) }}--}}
    {{--                                </button>--}}
    {{--                            </h5>--}}
    {{--                        </div>--}}

    {{--                        <div id="newsCollapse-{{ $loop->iteration }}" class="collapse @if($loop->iteration == 1) show @endif" aria-labelledby="newsHeading-{{ $loop->iteration }}" data-parent="#newsAccordion">--}}
    {{--                            <div class="card-body">--}}
    {{--                            {!! \App\Classes\LangHelper::translate(app()->getLocale(), 'article', 'content', 'body', $article, true) !!}--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        @if(strlen($article->created_at) > 0)--}}
    {{--                        <div class="card-footer">--}}
    {{--                            @if(App\Models\User::find($article->user_id) != null)--}}
    {{--                                <span class="small-text">--}}
    {{--                                    <ion-icon name="time"></ion-icon>--}}

    {{--                                    {{ __('frontend/main.written_by', [--}}
    {{--                                        'name' => App\Models\User::find($article->user_id)->username,--}}
    {{--                                        'date' => $article->created_at->format('d.m.Y'),--}}
    {{--                                        'time' => $article->created_at->format('H:i')--}}
    {{--                                    ]) }}--}}
    {{--                                </span>--}}
    {{--                            @else--}}
    {{--                            <span class="small-text">--}}
    {{--                                <ion-icon name="time"></ion-icon>--}}

    {{--                                {{ __('frontend/main.written_info', [--}}
    {{--                                    'date' => $article->created_at->format('d.m.Y'),--}}
    {{--                                    'time' => $article->created_at->format('H:i')--}}
    {{--                                ]) }}--}}
    {{--                            </span>--}}
    {{--                            @endif--}}
    {{--                        </div>--}}
    {{--                        @endif--}}
    {{--                    </div>--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @else--}}
    {{--            <div class="col-md-12">--}}
    {{--                <div class="alert alert-warning">--}}
    {{--                    {{ __('frontend/main.no_articles_exists') }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endif--}}
    {{--    </div>--}}

    {{--    @if(count($articles))--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-12">--}}
    {{--            {!! preg_replace('/' . $articles->currentPage() . '\?page=/', '', $articles->links()) !!}--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    @endif--}}
    {{--</div>--}}
    {{--@endsection--}}
