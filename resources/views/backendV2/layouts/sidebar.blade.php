<style>

   [data-theme=dark] div#kt_aside {
    background-color: transparent;
    border-right: 1px  solid #303030;
  
    border-radius: 0rem 0rem 0rem 0rem;
}
div#kt_aside_logo {
    border: 1px  solid #303030;
    border-left: none;
    border-top: none !important;
    border-radius: 0rem 0rem 2rem 0rem;
}
div#kt_aside_menu{
    border: 1px  solid #303030;
    border-left: none;
  
    border-radius: 0rem 2rem 2rem 0rem; 
}
div#kt_aside_footer{
       border: 1px  solid #303030;
    border-left: none;
    border-radius: 0rem 2rem 0rem 0rem;
}
a span.white-menu-title, span.text-title.white-menu-title {
    color: #BBBBBB !important;
    font-weight: 300 !important;
    font-family: inter;
    font-size: 15px;
}
div#kt_aside_menu svg {
    margin-right: 4px !important;
    width: 26px !important;
    height: 20px !important;
}
div#kt_aside_menu span.menu-link {
    margin-left: 1.3rem;
}
.menu-item:hover:nth-child(1) svg path, .menu-link:hover:nth-child(1) svg path {
    stroke: #D3F56A;
    
}
span.menu-link:hover a span.white-menu-title, a span.white-menu-title:hover{
color: white !important;
}
span.menu-link.flex_use {
    justify-content: space-between;
}

</style>
<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto px-9 " id="kt_aside_logo">
        <!--begin::Logo-->
         <a href="../../demo3/dist/index.html" class="py-5">
             <svg width="168" height="39" viewBox="0 0 168 39" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M21.8702 24.0219L14.7072 22.8281L16.0855 14.5582L23.2486 15.752L21.8702 24.0219ZM14.081 31.9314C10.3546 31.6353 7.36925 30.6953 5.223 29.5363C0.0780395 26.7579 -3.35193 19.2464 5.223 15.8166C5.83377 15.5723 6.38833 15.3518 6.89119 15.1538C7.07835 10.9246 8.08429 7.57143 9.35249 5.223C12.1309 0.0780395 19.6424 -3.35193 23.0722 5.223C23.312 5.82265 23.529 6.36812 23.7241 6.86368C28.3937 6.93447 32.0667 7.99273 34.5847 9.35251C39.7297 12.1309 43.1596 19.6424 34.5847 23.0722C33.0419 23.6893 31.8577 24.1547 30.9595 24.4884C30.7038 28.4159 29.7366 31.5487 28.5333 33.777C25.7549 38.922 18.2434 42.3519 14.8136 33.777C14.5402 33.0935 14.2966 32.4804 14.081 31.9314Z" fill="white"/>
<circle cx="19.2199" cy="20.2197" r="7.5" fill="white"/>
<path d="M70.2509 15.456L67.5563 15.9332C67.4436 15.5885 67.2647 15.2604 67.0194 14.9489C66.7808 14.6373 66.4559 14.3821 66.045 14.1832C65.634 13.9844 65.1202 13.8849 64.5038 13.8849C63.6619 13.8849 62.9593 14.0739 62.3958 14.4517C61.8324 14.8229 61.5506 15.3035 61.5506 15.8935C61.5506 16.4039 61.7396 16.8149 62.1174 17.1264C62.4952 17.438 63.1051 17.6932 63.9469 17.892L66.3731 18.4489C67.7784 18.7737 68.8257 19.2741 69.5151 19.9503C70.2045 20.6264 70.5492 21.5047 70.5492 22.5852C70.5492 23.5 70.2841 24.3153 69.7538 25.0312C69.2301 25.7405 68.4976 26.2973 67.5563 26.7017C66.6217 27.1061 65.5379 27.3082 64.3049 27.3082C62.5947 27.3082 61.1993 26.9437 60.1188 26.2145C59.0383 25.4787 58.3754 24.4347 58.1302 23.0824L61.0038 22.6449C61.1827 23.3939 61.5506 23.9607 62.1075 24.3452C62.6643 24.723 63.3901 24.9119 64.285 24.9119C65.2594 24.9119 66.0383 24.7098 66.6217 24.3054C67.205 23.8944 67.4967 23.3939 67.4967 22.804C67.4967 22.3267 67.3177 21.9257 66.9597 21.6009C66.6084 21.276 66.0682 21.0308 65.339 20.8651L62.7538 20.2983C61.3286 19.9735 60.2746 19.4564 59.5918 18.7472C58.9157 18.0379 58.5776 17.1397 58.5776 16.0526C58.5776 15.151 58.8295 14.3622 59.3333 13.6861C59.8371 13.0099 60.5331 12.483 61.4214 12.1051C62.3096 11.7206 63.3272 11.5284 64.4739 11.5284C66.1245 11.5284 67.4237 11.8864 68.3717 12.6023C69.3196 13.3116 69.946 14.2628 70.2509 15.456ZM79.3826 27.3381C78.4148 27.3381 77.5398 27.1591 76.7576 26.8011C75.9754 26.4366 75.3557 25.9096 74.8983 25.2202C74.4475 24.5308 74.2221 23.6856 74.2221 22.6847C74.2221 21.8229 74.3878 21.1136 74.7193 20.5568C75.0507 20 75.4982 19.5592 76.0616 19.2344C76.6251 18.9096 77.2548 18.6643 77.9508 18.4986C78.6468 18.3329 79.3561 18.2069 80.0787 18.1207C80.9934 18.0147 81.7359 17.9285 82.3059 17.8622C82.876 17.7893 83.2903 17.6733 83.5488 17.5142C83.8074 17.3551 83.9366 17.0966 83.9366 16.7386V16.669C83.9366 15.8007 83.6914 15.1278 83.2008 14.6506C82.7169 14.1733 81.9944 13.9347 81.0332 13.9347C80.0323 13.9347 79.2434 14.1567 78.6667 14.6009C78.0967 15.0384 77.7022 15.5256 77.4835 16.0625L74.6895 15.4261C75.0209 14.4981 75.5048 13.7491 76.1412 13.179C76.7842 12.6023 77.5233 12.1847 78.3585 11.9261C79.1937 11.661 80.072 11.5284 80.9934 11.5284C81.6033 11.5284 82.2496 11.6013 82.9324 11.7472C83.6218 11.8864 84.2647 12.1449 84.8613 12.5227C85.4646 12.9006 85.9584 13.4408 86.3429 14.1435C86.7273 14.8395 86.9196 15.7443 86.9196 16.858V27H84.0162V24.9119H83.8968C83.7046 25.2964 83.4163 25.6742 83.0318 26.0455C82.6473 26.4167 82.1535 26.7249 81.5503 26.9702C80.947 27.2154 80.2245 27.3381 79.3826 27.3381ZM80.0289 24.9517C80.8509 24.9517 81.5536 24.7893 82.1369 24.4645C82.7269 24.1397 83.1743 23.7154 83.4792 23.1918C83.7908 22.6615 83.9466 22.0947 83.9466 21.4915V19.5227C83.8405 19.6288 83.635 19.7282 83.3301 19.821C83.0318 19.9072 82.6904 19.9834 82.3059 20.0497C81.9215 20.1094 81.5469 20.1657 81.1824 20.2188C80.8178 20.2652 80.5128 20.3049 80.2676 20.3381C79.6909 20.411 79.1639 20.5336 78.6866 20.706C78.216 20.8783 77.8381 21.1269 77.5531 21.4517C77.2747 21.7699 77.1355 22.1941 77.1355 22.7244C77.1355 23.4602 77.4073 24.017 77.9508 24.3949C78.4944 24.7661 79.1871 24.9517 80.0289 24.9517ZM94.9725 6.63636V27H91.9994V6.63636H94.9725ZM106.674 27.3082C105.17 27.3082 103.874 26.9867 102.787 26.3438C101.706 25.6941 100.871 24.7827 100.281 23.6094C99.6977 22.4295 99.406 21.0473 99.406 19.4631C99.406 17.8987 99.6977 16.5199 100.281 15.3267C100.871 14.1335 101.693 13.2022 102.747 12.5327C103.808 11.8632 105.047 11.5284 106.466 11.5284C107.327 11.5284 108.163 11.6709 108.971 11.956C109.78 12.241 110.506 12.6884 111.149 13.2983C111.792 13.9081 112.299 14.7003 112.67 15.6747C113.041 16.6425 113.227 17.8191 113.227 19.2045V20.2585H101.086V18.0312H110.314C110.314 17.2491 110.155 16.5563 109.836 15.9531C109.518 15.3433 109.071 14.8627 108.494 14.5114C107.924 14.16 107.255 13.9844 106.486 13.9844C105.65 13.9844 104.921 14.1899 104.298 14.6009C103.682 15.0052 103.204 15.5355 102.866 16.1918C102.535 16.8414 102.369 17.5473 102.369 18.3097V20.0497C102.369 21.0705 102.548 21.9389 102.906 22.6548C103.271 23.3707 103.778 23.9176 104.427 24.2955C105.077 24.6667 105.836 24.8523 106.704 24.8523C107.268 24.8523 107.781 24.7727 108.246 24.6136C108.71 24.4479 109.111 24.2027 109.449 23.8778C109.787 23.553 110.045 23.152 110.224 22.6747L113.038 23.1818C112.813 24.0104 112.408 24.7363 111.825 25.3594C111.248 25.9759 110.522 26.4564 109.647 26.8011C108.779 27.1392 107.788 27.3082 106.674 27.3082ZM120.619 17.9318V27H117.646V11.7273H120.499V14.2131H120.688C121.04 13.4044 121.59 12.7547 122.339 12.2642C123.095 11.7737 124.046 11.5284 125.193 11.5284C126.233 11.5284 127.145 11.7472 127.927 12.1847C128.709 12.6155 129.316 13.2585 129.747 14.1136C130.177 14.9687 130.393 16.026 130.393 17.2855V27H127.42V17.6435C127.42 16.5365 127.131 15.6714 126.555 15.0483C125.978 14.4186 125.186 14.1037 124.178 14.1037C123.489 14.1037 122.876 14.2528 122.339 14.5511C121.809 14.8494 121.388 15.2869 121.076 15.8636C120.771 16.4337 120.619 17.1231 120.619 17.9318ZM141.933 27.3082C140.455 27.3082 139.182 26.9735 138.115 26.304C137.055 25.6278 136.239 24.6965 135.669 23.5099C135.099 22.3234 134.814 20.9645 134.814 19.4332C134.814 17.8821 135.106 16.5133 135.689 15.3267C136.272 14.1335 137.094 13.2022 138.155 12.5327C139.216 11.8632 140.465 11.5284 141.903 11.5284C143.064 11.5284 144.098 11.7438 145.006 12.1747C145.914 12.599 146.646 13.1955 147.203 13.9645C147.767 14.7334 148.101 15.6316 148.207 16.6591H145.314C145.155 15.9432 144.79 15.3267 144.22 14.8097C143.657 14.2926 142.901 14.0341 141.953 14.0341C141.125 14.0341 140.399 14.2528 139.776 14.6903C139.159 15.1212 138.679 15.7377 138.334 16.5398C137.989 17.3352 137.817 18.2765 137.817 19.3636C137.817 20.4773 137.986 21.4384 138.324 22.2472C138.662 23.0559 139.139 23.6823 139.756 24.1264C140.379 24.5705 141.111 24.7926 141.953 24.7926C142.517 24.7926 143.027 24.6899 143.484 24.4844C143.948 24.2723 144.336 23.9706 144.648 23.5795C144.966 23.1884 145.188 22.7178 145.314 22.1676H148.207C148.101 23.1553 147.78 24.0369 147.243 24.8125C146.706 25.5881 145.987 26.1979 145.085 26.642C144.19 27.0862 143.14 27.3082 141.933 27.3082ZM159.089 27.3082C157.584 27.3082 156.289 26.9867 155.201 26.3438C154.121 25.6941 153.286 24.7827 152.696 23.6094C152.112 22.4295 151.821 21.0473 151.821 19.4631C151.821 17.8987 152.112 16.5199 152.696 15.3267C153.286 14.1335 154.108 13.2022 155.162 12.5327C156.222 11.8632 157.462 11.5284 158.88 11.5284C159.742 11.5284 160.577 11.6709 161.386 11.956C162.195 12.241 162.921 12.6884 163.564 13.2983C164.207 13.9081 164.714 14.7003 165.085 15.6747C165.456 16.6425 165.642 17.8191 165.642 19.2045V20.2585H153.501V18.0312H162.728C162.728 17.2491 162.569 16.5563 162.251 15.9531C161.933 15.3433 161.485 14.8627 160.909 14.5114C160.339 14.16 159.669 13.9844 158.9 13.9844C158.065 13.9844 157.336 14.1899 156.713 14.6009C156.096 15.0052 155.619 15.5355 155.281 16.1918C154.949 16.8414 154.784 17.5473 154.784 18.3097V20.0497C154.784 21.0705 154.963 21.9389 155.321 22.6548C155.685 23.3707 156.192 23.9176 156.842 24.2955C157.492 24.6667 158.251 24.8523 159.119 24.8523C159.682 24.8523 160.196 24.7727 160.66 24.6136C161.124 24.4479 161.525 24.2027 161.863 23.8778C162.201 23.553 162.46 23.152 162.639 22.6747L165.453 23.1818C165.227 24.0104 164.823 24.7363 164.24 25.3594C163.663 25.9759 162.937 26.4564 162.062 26.8011C161.194 27.1392 160.203 27.3082 159.089 27.3082Z" fill="white"/>
</svg>

             <!--<img alt="Logo" src="adminV2/assets/media/logos/demo3-dark.svg" class="h-20px logo theme-dark-show" />-->
             {{-- <img alt="Logo" src="assets/media/logos/demo3-dark.svg" class="h-20px logo theme-dark-show" />--}}
         </a> 
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid ps-5 pe-3  py-4 px-5" id="kt_aside_menu">
        <!--begin::Aside Menu-->
        <div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
            <!--begin::Menu-->

            <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto"
                id="#kt_aside_menu" data-kt-menu="true">
                <!--begin:Menu item-->
                <!--<div class="aside-logo flex-column-auto px-9 " id="kt_aside_logo">-->
                    <!--begin::Logo-->
                    <!--<a href="/admin">-->
                    <!--    <img alt="Logo" src="{{asset_dir('newdesign/assets/img/logo/logo.png')}}" class="h-80px logo" />-->
                    <!--    {{-- <img alt="Logo" src="assets/media/logos/demo3-dark.svg" class="h-20px logo theme-dark-show" />--}}-->
                    <!--</a>-->
                    <!--end::Logo-->
                <!--</div>-->
                <div class="menu-item menu-accordion ">
                    <!--begin:Menu link-->
                    <div class="menu-sub show menu-sub-accordion">
                        <span class="menu-item main_ad">
                            <a class="menu-link" href="{{ route('backendV2-dashboard') }}">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.5 18.8327V9.66602" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11 18.8327V4.16602" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M5.5 18.834V13.334" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

                                <span class="menu-title white-menu-title">Overview</span>
                            </a>
                        </span>
                    </div>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->


                <div class="menu-item menu-accordion">
                    <div class="menu-sub show menu-sub-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-item">
                            <a class="menu-link" href="{{ url('/') }}">
                                <span class="menu-title white-menu-title">Shop </span>
                            </a>
                        </span>
                        <!--end:Menu link-->
                    </div>
                </div>



                <!--begin:Menu item-->
                <!-- <div  class="menu-item here show menu-accordion"> -->
                <!--begin:Menu link-->
                <!-- <span class="menu-link">
                         {{-- <a class="menu-link" href="{{ route('backendV2-jabber') }}"> --}}
                             {{-- <span class="text-muted">{{ __('backend/jabber.title') }}</span> --}}
                         </a>
                     </span> -->
                <!--end:Menu link-->
                <!-- </div> -->
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <div class="menu-sub show menu-sub-accordion">
                        <span class="menu-item">
                            <a class="menu-link" href="{{ route('backend-management-shop-logo') }}">
                                <span class="text-title white-menu-title">Appearance</span>
                            </a>
                        </span>
                    </div>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <div class="menu-sub show menu-sub-accordion">
                        <span class="menu-item">
                            <a class="menu-link" href="{{ route('backend-system-payments') }}">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.9999 20.6663C16.0625 20.6663 20.1666 16.5623 20.1666 11.4997C20.1666 6.43706 16.0625 2.33301 10.9999 2.33301C5.93731 2.33301 1.83325 6.43706 1.83325 11.4997C1.83325 16.5623 5.93731 20.6663 10.9999 20.6663Z" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.6666 7.83301H9.16659C8.68035 7.83301 8.21404 8.02616 7.87022 8.36998C7.52641 8.7138 7.33325 9.18011 7.33325 9.66634C7.33325 10.1526 7.52641 10.6189 7.87022 10.9627C8.21404 11.3065 8.68035 11.4997 9.16659 11.4997H12.8333C13.3195 11.4997 13.7858 11.6928 14.1296 12.0366C14.4734 12.3805 14.6666 12.8468 14.6666 13.333C14.6666 13.8192 14.4734 14.2856 14.1296 14.6294C13.7858 14.9732 13.3195 15.1663 12.8333 15.1663H7.33325" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11 17V6" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>


                                <span class="text-title white-menu-title">Payments</span>
                            </a>
                        </span>
                    </div>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <div class="menu-sub show menu-sub-accordion">
                        <span class="menu-item">
                            <a class="menu-link" href="{{ route('backendV2-orders') }}">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.75 6.91634V8.74967C3.47935 8.74967 4.17882 9.03941 4.69454 9.55513C5.21027 10.0709 5.5 10.7703 5.5 11.4997C5.5 12.229 5.21027 12.9285 4.69454 13.4442C4.17882 13.9599 3.47935 14.2497 2.75 14.2497V16.083C2.75 17.0913 3.575 17.9163 4.58333 17.9163H17.4167C17.9029 17.9163 18.3692 17.7232 18.713 17.3794C19.0568 17.0356 19.25 16.5692 19.25 16.083V14.2497C18.5207 14.2497 17.8212 13.9599 17.3055 13.4442C16.7897 12.9285 16.5 12.229 16.5 11.4997C16.5 10.7703 16.7897 10.0709 17.3055 9.55513C17.8212 9.03941 18.5207 8.74967 19.25 8.74967V6.91634C19.25 6.43011 19.0568 5.9638 18.713 5.61998C18.3692 5.27616 17.9029 5.08301 17.4167 5.08301H4.58333C4.0971 5.08301 3.63079 5.27616 3.28697 5.61998C2.94315 5.9638 2.75 6.43011 2.75 6.91634Z" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.9167 5.08301V6.91634" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.9167 16.083V17.9163" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.9167 10.583V12.4163" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                <span class="text-title white-menu-title">{{ __('backend/orders.title') }}</span>
                            </a>
                        </span>
                    </div>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                {{-- <div   class="menu-item here show menu-accordion">--}}
                <!--begin:Menu link-->
                <!--<span class="menu-link">-->
                <!--    <a class="menu-link" href="{{ route('backendV2-design') }}">-->
                <!--        <span class="text-muted">{{ __('backend/design.title') }}</span>-->
                <!--    </a>-->
                {{-- </span>--}}
                <!--end:Menu link-->
                {{-- </div>--}}
                <!--end:Menu item-->

                <!-- <div class="menu-item">-->
                <!--begin:Menu link-->
                <!--    <span class="menu-link">-->
                <!--        <a class="menu-link" href="{{ route('backend-management-marque') }}">-->
                <!--            <span class="text-muted">Marque</span>-->
                <!--        </a>-->
                <!--     </span>-->
                <!--end:Menu link-->
                <!--</div>-->

                <!--begin:Menu item-->
                <!-- <div  class="menu-item here show menu-accordion"> -->
                <!--begin:Menu link-->
                <!-- <span class="menu-link">
                         <a class="menu-link" href="{{ route('backendV2-media') }}">
                             <span class="text-muted">{{ __('backend/media.title') }}</span>
                         </a>
                     </span> -->
                <!--end:Menu link-->
                <!-- </div> -->
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link flex_use">
                        <!--<span class="menu-icon">-->
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                        <!--    <span class="svg-icon svg-icon-5">-->
                        <!--        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"-->
                        <!--            xmlns="http://www.w3.org/2000/svg">-->
                        <!--            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"-->
                        <!--                fill="currentColor" />-->
                        <!--            <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"-->
                        <!--                fill="currentColor" />-->
                        <!--        </svg>-->
                        <!--    </span>-->
                            <!--end::Svg Icon-->
                        <!--</span>-->
                        <span class="text-title white-menu-title">{{ __('backend/management.title') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <!--<span class="menu-bullet">-->
                                <!--    <span class="bullet bullet-dot"></span>-->
                                <!--</span>-->
                                <span
                                    class="text-title white-menu-title"><svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.75 6.91634V8.74967C3.47935 8.74967 4.17882 9.03941 4.69454 9.55513C5.21027 10.0709 5.5 10.7703 5.5 11.4997C5.5 12.229 5.21027 12.9285 4.69454 13.4442C4.17882 13.9599 3.47935 14.2497 2.75 14.2497V16.083C2.75 17.0913 3.575 17.9163 4.58333 17.9163H17.4167C17.9029 17.9163 18.3692 17.7232 18.713 17.3794C19.0568 17.0356 19.25 16.5692 19.25 16.083V14.2497C18.5207 14.2497 17.8212 13.9599 17.3055 13.4442C16.7897 12.9285 16.5 12.229 16.5 11.4997C16.5 10.7703 16.7897 10.0709 17.3055 9.55513C17.8212 9.03941 18.5207 8.74967 19.25 8.74967V6.91634C19.25 6.43011 19.0568 5.9638 18.713 5.61998C18.3692 5.27616 17.9029 5.08301 17.4167 5.08301H4.58333C4.0971 5.08301 3.63079 5.27616 3.28697 5.61998C2.94315 5.9638 2.75 6.43011 2.75 6.91634Z" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11.9167 5.08301V6.91634" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11.9167 16.083V17.9163" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11.9167 10.583V12.4163" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg> {{ __('backend/management.tickets.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link"
                                            href="{{ route('backend-management-tickets-with-pageNumber') }}">
                                            <!--<span class="menu-bullet">-->
                                            <!--    <span class="bullet bullet-dot"></span>-->
                                            <!--</span>-->
                                            <span
                                                                                                class="text-title white-menu-title"> <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 2.33398L2.75 6.00065V18.834C2.75 19.3202 2.94315 19.7865 3.28697 20.1303C3.63079 20.4742 4.0971 20.6673 4.58333 20.6673H17.4167C17.9029 20.6673 18.3692 20.4742 18.713 20.1303C19.0568 19.7865 19.25 19.3202 19.25 18.834V6.00065L16.5 2.33398H5.5Z" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M2.75 6H19.25" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14.6668 9.66602C14.6668 10.6385 14.2805 11.5711 13.5929 12.2587C12.9053 12.9464 11.9726 13.3327 11.0002 13.3327C10.0277 13.3327 9.09507 12.9464 8.40744 12.2587C7.7198 11.5711 7.3335 10.6385 7.3335 9.66602" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
{{ __('backend/management.tickets.title') }}</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu link-->
                                    <a class="menu-link"
                                        href="{{ route('backend-management-tickets-categories-with-pageNumber') }}">
                                        <!--<span class="menu-bullet">-->
                                        <!--    <span class="bullet bullet-dot"></span>-->
                                        <!--</span>-->
                                        <span
                                            class="text-title white-menu-title">{{ __('backend/management.tickets.categories.title') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <!--<span class="menu-bullet">-->
                                <!--    <span class="bullet bullet-dot"></span>-->
                                <!--</span>-->
                                <span
                                    class="text-title white-menu-title"><svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.5 2.33398L2.75 6.00065V18.834C2.75 19.3202 2.94315 19.7865 3.28697 20.1303C3.63079 20.4742 4.0971 20.6673 4.58333 20.6673H17.4167C17.9029 20.6673 18.3692 20.4742 18.713 20.1303C19.0568 19.7865 19.25 19.3202 19.25 18.834V6.00065L16.5 2.33398H5.5Z" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M2.75 6H19.25" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M14.6668 9.66602C14.6668 10.6385 14.2805 11.5711 13.5929 12.2587C12.9053 12.9464 11.9726 13.3327 11.0002 13.3327C10.0277 13.3327 9.09507 12.9464 8.40744 12.2587C7.7198 11.5711 7.3335 10.6385 7.3335 9.66602" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
{{ __('backend/management.products.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link"
                                            href="{{ route('backend-management-products-with-pageNumber') }}">
                                            <!--<span class="menu-bullet">-->
                                            <!--    <span class="bullet bullet-dot"></span>-->
                                            <!--</span>-->
                                            <span
                                                class="text-title white-menu-title">{{ __('backend/management.products.title') }}</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu link-->
                                    <a class="menu-link"
                                        href="{{ route('backend-management-products-categories-with-pageNumber') }}">
                                        <!--<span class="menu-bullet">-->
                                        <!--    <span class="bullet bullet-dot"></span>-->
                                        <!--</span>-->
                                        <span
                                            class="text-title white-menu-title">{{ __('backend/management.products.categories.title') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <!--<span class="menu-bullet">-->
                                <!--    <span class="bullet bullet-dot"></span>-->
                                <!--</span>-->
                                <span
                                    class="text-title white-menu-title"><svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.0002 20.6673C16.0628 20.6673 20.1668 16.5633 20.1668 11.5007C20.1668 6.43804 16.0628 2.33398 11.0002 2.33398C5.93755 2.33398 1.8335 6.43804 1.8335 11.5007C1.8335 16.5633 5.93755 20.6673 11.0002 20.6673Z" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8.33252 8.74955C8.54803 8.13691 8.97341 7.62031 9.53331 7.29125C10.0932 6.96219 10.7515 6.84191 11.3916 6.9517C12.0317 7.06149 12.6123 7.39428 13.0305 7.89111C13.4487 8.38795 13.6777 9.01677 13.6767 9.66621C13.6767 11.4995 10.9267 12.4162 10.9267 12.4162" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11 16.084H11.01" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
{{ __('backend/management.faqs.title') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link"
                                            href="{{ route('backend-management-faqs-with-pageNumber') }}">
                                            <!--<span class="menu-bullet">-->
                                            <!--    <span class="bullet bullet-dot"></span>-->
                                            <!--</span>-->
                                            <span
                                                class="text-title white-menu-title">{{ __('backend/management.faqs.title') }}</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu link-->
                                    <a class="menu-link"
                                        href="{{ route('backend-management-faqs-categories-with-pageNumber') }}">
                                        <!--<span class="menu-bullet">-->
                                        <!--    <span class="bullet bullet-dot"></span>-->
                                        <!--</span>-->
                                        <span
                                            class="text-title white-menu-title">{{ __('backend/management.faqs.categories.title') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                        <!-- <div class="menu-item"> -->
                        <!--begin:Menu link-->
                        <!-- <a class="menu-link" href=""> -->
                        <!-- <span class="menu-bullet"> -->
                        <!-- <span class="bullet bullet-dot"></span> -->
                        <!-- </span> -->
                        <!-- <span class="text-muted">{{ __('backend/management.articles.title') }}</span> -->
                        <!-- </a> -->
                        <!--end:Menu link-->
                        <!-- </div> -->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('backend-management-users-with-pageNumber') }}">
                                <!--<span class="menu-bullet">-->
                                <!--    <span class="bullet bullet-dot"></span>-->
                                <!--</span>-->
                                <span
                                    class="text-title white-menu-title"><svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.9998 12.4167C13.5311 12.4167 15.5832 10.3646 15.5832 7.83333C15.5832 5.30203 13.5311 3.25 10.9998 3.25C8.46853 3.25 6.4165 5.30203 6.4165 7.83333C6.4165 10.3646 8.46853 12.4167 10.9998 12.4167Z" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M18.3332 19.7493C18.3332 17.8044 17.5606 15.9392 16.1853 14.5639C14.81 13.1886 12.9448 12.416 10.9998 12.416C9.05492 12.416 7.18965 13.1886 5.81439 14.5639C4.43912 15.9392 3.6665 17.8044 3.6665 19.7493" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
{{ __('backend/management.users.title') }}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('backend-management-coupons-with-pageNumber') }}">
                                <!--<span class="menu-bullet">-->
                                <!--    <span class="bullet bullet-dot"></span>-->
                                <!--</span>-->
                                <span
                                    class="text-title white-menu-title">{{ __('backend/management.coupons.title') }}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <!-- <div class="menu-item"> -->
                        <!--begin:Menu link-->
                        <!-- <a class="menu-link" href="{{ route('backend-management-delivery-methods-with-pageNumber') }}">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                 <span class="text-muted">{{ __('backend/management.delivery_methods.title') }}</span>
                             </a> -->
                        <!--end:Menu link-->
                        <!-- </div> -->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <!-- <span class="menu-link">&nbsp;&nbsp;
                                <span class="svg-icon svg-icon-5">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
                                        <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
                                    </svg>
                                </span>&nbsp;&nbsp;&nbsp;
                                 <span class="text-muted">Shop</span>
                                 <span class="menu-arrow"></span>
                             </span> -->
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ route('backend-management-shop-logo') }}">
                                    <!--<span class="menu-bullet">-->
                                    <!--    <span class="bullet bullet-dot"></span>-->
                                    <!--</span>-->
                                    <span class="text-title white-menu-title">Shop logo</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu link-->
                            <a class="menu-link"
                                href="{{ route('backend-management-tickets-categories-with-pageNumber') }}">
                                <!--<span class="menu-bullet">-->
                                <!--    <span class="bullet bullet-dot"></span>-->
                                <!--</span>-->
                                <span class="text-title white-menu-title">Shop name</span>
                            </a>

                            <a class="menu-link"
                                href="{{ route('backend-management-tickets-categories-with-pageNumber') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="text-title white-menu-title">Shop Description</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>

                <!-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion"> -->
                <!--begin:Menu link-->
                <!-- <span class="menu-link">
                         <span class="menu-icon"> -->
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                <!-- <span class="svg-icon svg-icon-5">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor" />
                                     <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor" />
                                 </svg>
                             </span> -->
                <!--end::Svg Icon-->
                <!-- </span>
                         <span class="text-muted">System</span>
                         <span class="menu-arrow"></span>
                     </span> -->
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <!-- <div class="menu-sub menu-sub-accordion"> -->
                <!--begin:Menu item-->
                <!-- <div class="menu-item"> -->
                <!--begin:Menu link-->
                <!-- <a class="menu-link" href="{{ route('backend-system-settings') }}">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                 <span class="text-muted">{{ __('backend/system.settings.title') }}</span>
                             </a> -->
                <!--end:Menu link-->
                <!-- </div> -->
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <!-- <div class="menu-item"> -->
                <!--begin:Menu link-->
                <!-- <a class="menu-link" href="{{ route('backend-system-bonus') }}">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                 <span class="text-muted">{{ __('backend/system.bonus.title') }}</span>
                             </a> -->
                <!--end:Menu link-->
                <!-- </div> -->
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <!-- <div class="menu-item"> -->
                <!--begin:Menu link-->
                <!-- <a class="menu-link" href="{{ route('backend-system-payments') }}">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                 <span class="text-muted">{{ __('backend/system.payment_methods.title') }}</span>
                             </a> -->
                <!--end:Menu link-->
                <!-- </div> -->
                <!--end:Menu item-->
                <!-- </div> -->
                <!--end:Menu sub-->
                <!-- </div> -->

                <!--end:Menu item-->

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto px-9 py-4" id="kt_aside_footer">
        <!--begin::User panel-->
        <div class="d-flex flex-stack">
            <!--begin::Wrapper-->
            <div class="d-flex align-items-center">
                <!--begin::Avatar-->
                <div class="symbol symbol-circle symbol-40px">
                    <!-- <img src="adminV2/assets/media/avatars/300-1.jpg" alt="photo" /> -->
                </div>
                <!--end::Avatar-->
                <!--begin::User info-->
                @if(Auth::check())
                <div class="ms-2">
                    <!--begin::Name-->
                    <a href="#" class="text-white text-hover-primary fs-6 fw-bold lh-1">{{ Auth::user()->name }}</a>
                    <!--end::Name-->
                    <!--begin::Major-->
                    <!--<span class="text-muted fw-semibold d-block fs-7 lh-1">Python Dev</span>-->
                    <!--end::Major-->
                </div>
                @endif
                <!--end::User info-->
            </div>




            <!--end::Wrapper-->
            <!--begin::User menu-->
            <div class="ms-1">
                <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true"
                    data-kt-menu-placement="top-end">
                    <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                fill="currentColor" />
                            <path
                                d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--begin::User account menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                    data-kt-menu="true" style="text-align: left;">
                    <!--begin::Menu item-->
                    <!-- <div class="menu-item px-3"> -->
                    <!-- <div class="menu-content d-flex align-items-center px-3"> -->
                    <!--begin::Avatar-->
                    <!-- <div class="symbol symbol-50px me-5">
                                 <img alt="Logo" src="adminV2/assets/media/avatars/300-1.jpg" />
                             </div> -->
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <!-- <div class="d-flex flex-column">
                                 <div class="fw-bold d-flex align-items-center fs-5">Max Smith
                                     <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                 </div>
                                 <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
                             </div> -->
                    <!--end::Username-->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <!-- <div class="separator my-2"></div> -->
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <!-- <div class="menu-item px-5">
                         <a href="../../demo3/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                     </div> -->
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <!-- <div class="menu-item px-5">
                         <a href="../../demo3/dist/apps/projects/list.html" class="menu-link px-5">
                             <span class="menu-text">My Projects</span>
                             <span class="menu-badge">
                                 <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                             </span>
                         </a>
                     </div> -->
                    <!--end::Menu item-->

                    <!--begin::Menu item-->

                    <div class="menu-item px-5 my-1">
                        <!-- <a href="{{url('admin/language')}}" class="menu-link px-5">language</a> -->
                        <div class="ms-1">
                            <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2"
                                style="width: 100%;" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                data-kt-menu-overflow="true" data-kt-menu-placement="top-end">
                                <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                <span class="menu-link px-5" style="font-size: 15px;">
                                    Language
                                    @php
                                    if( \Lang::locale() == "de"){
                                    $localeImage = "/assets/svg/flags/017-germany.svg";
                                    }else{
                                    $localeImage = "/assets/svg/flags/020-flag.svg";
                                    }
                                    @endphp
                                    <span
                                        class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ \Lang::get('locale.name', [], \Lang::locale()) }}
                                        <img class="w-15px h-15px rounded-1 ms-2" src="{{ $localeImage }}" alt="" />
                                    </span>
                                </span>

                                <!--end::Svg Icon-->
                            </div>
                            <!--begin::User account menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <!-- <div class="menu-item px-3"> -->
                                <!-- <div class="menu-content d-flex align-items-center px-3"> -->
                                <!--begin::Avatar-->
                                <!-- <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="adminV2/assets/media/avatars/300-1.jpg" />
                                            </div> -->
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <!-- <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">Max Smith
                                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
                                            </div> -->
                                <!--end::Username-->
                                <!-- </div> -->
                                <!-- </div> -->
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <!-- <div class="separator my-2"></div> -->
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <!-- <div class="menu-item px-5">
                                        <a href="../../demo3/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                                    </div> -->
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <!-- <div class="menu-item px-5">
                                        <a href="../../demo3/dist/apps/projects/list.html" class="menu-link px-5">
                                            <span class="menu-text">My Projects</span>
                                            <span class="menu-badge">
                                                <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                            </span>
                                        </a>
                                    </div> -->
                                <!--end::Menu item-->

                                <!--begin::Menu item-->

                                <div class="menu-item px-5 my-1">
                                    @if(count(App\Models\Setting::getAvailableLocales()))
                                    @foreach(App\Models\Setting::getAvailableLocales() as $locale)
                                    @php
                                    if( \Lang::get('locale.name', [], $locale) == "Deutsch"){
                                    $val = "/assets/svg/flags/017-germany.svg";
                                    }else{
                                    $val = "/assets/svg/flags/020-flag.svg";
                                    }
                                    @endphp
                                    <a href="{{ route('language', $locale) }}"
                                        style="display: flex; justify-content: space-between; align-items: center;"
                                        class="menu-link px-5">{{ \Lang::get('locale.name', [], $locale) }}<img
                                            width="20px" height="20px" src="@php echo  $val; @endphp"></a>
                                    @endforeach
                                    @endif
                                </div>

                                <!--end::Menu item-->
                                <!--begin::Menu item-->

                                <!--end::Menu item-->
                            </div>
                            <!--end::User account menu-->
                        </div>
                    </div>

                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5 my-1">
                        <a href="{{url('settings')}}" class="menu-link px-5">Account Settings</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5">
                        <a href="{{url('/admin/session/logout')}}" class="menu-link px-5">Sign Out</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::User account menu-->
            </div>
            <!--end::User menu-->
        </div>
        <!--end::User panel-->
    </div>
    <!--end::Footer-->
</div>