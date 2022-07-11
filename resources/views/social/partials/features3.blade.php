<style>
 /*
Template Name: Osahan Eat - Online Food Ordering Website HTML Template
Author: Askbootstrap
Author URI: https://themeforest.net/user/askbootstrap
Version: 1.0
*/
/*
-- Body
-- Nav
-- login/Register
-- Homepage Search Block
-- Homepage
-- Customize Bootstrap
-- Listing
-- Detail
-- Checkout Page
-- My Account
-- Track Order Page
-- Footer
-- Mobile Media
*/
/* Body */
@import url('https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body {
    background: #f3f7f8;
    font-size: 13px;
    font-weight: 500;
    font-family: 'Mulish', sans-serif;
}
button, a {
    outline: none !important;
    color: #dd646e;
    text-decoration: none !important;
}
p {
    font-size: 13px;
    color: #7a7e8a;
}
img{
    image-rendering: auto;
}
.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6 {
    color: #000000;
}
/* Nav */
.dropdown:hover .dropdown-menu {
    display: block;
   visibility: visible;
   opacity:1;
   transform: translateY(0px);
   transition:.5s ease all;
}
.dropdown-menu {
   display: block;
   visibility: hidden;
   opacity:0;
   transform: translateY(50px);
   transition:.5s ease all;
}
.dropdown-menu.show {
   display: block;
   visibility: visible;
   opacity:1;
   transform: translateY(0px);
   transition:.5s ease all;
}
.osahan-nav {
    background: #fff none repeat scroll 0 0 !important;
    padding: 0;
    z-index: 9;
}
.osahan-nav .nav-link {
    font-weight: 600;
    padding: 28px 0px !important;
    margin: 0 0 0 31px;
}
.nav-osahan-pic {
    width: 32px;
    height: 32px;
    border: 3px solid #fff;
    box-shadow: 0px 0px 3px #ccc;
    position: relative;
    margin: -8px 5px -6px 0;
    vertical-align: text-top;
}
.dropdown-cart-top {
    border-top: 2px solid #dd646e;
    min-width: 340px;
}
.dropdown-cart-top-header {
    min-height: 107px;
}
.dropdown-cart-top-header .img-fluid {
    border: 1px solid #dcdcdc;
    border-radius: 3px;
    float: left;
    height: 59px;
    padding: 3px;
    width: 59px;
}
.dropdown-cart-top-header p.text-secondary {
    font-size: 11px;
    line-height: 24px;
    font-weight: 600;
}
.dropdown-cart-top-header h6 {
    font-size: 14px;
}
.food-item {
    border: 1px solid;
    border-radius: 2px;
    display: inline-block;
    font-size: 6px;
    height: 13px;
    line-height: 12px;
    text-align: center;
    width: 13px;
}
.dropdown-cart-top-body .food-item {
    float: left;
    margin: 4px 10px 0 0;
}
/* login/Register */
:root {
    --input-padding-x: 1.5rem;
    --input-padding-y: 0.75rem;
}
.login,
.image {
    min-height: 100vh;
}
.bg-image {
    background-image: url('../img/login-bg.png');
    background-size: cover;
    background-position: center;
}
.login-heading {
    font-weight: 300;
}
.btn-login {
    font-size: 0.9rem;
    letter-spacing: 0.05rem;
    padding: 0.75rem 1rem;
    border-radius: 2rem;
}
.form-label-group {
    position: relative;
    margin-bottom: 1rem;
}
.form-label-group>input,
.form-label-group>label {
    padding: 15px 0;
    border-radius: 0px;
    height: 51px;
    background: transparent !important;
    border: none;
    border-bottom: 1px solid #ced4da;
    box-shadow: none !important;
}
.form-label-group>label {
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    margin-bottom: 0;
    /* Override default `<label>` margin */
    line-height: 1.5;
    color: #495057;
    cursor: text;
    /* Match the input under the label */
    border: 1px solid transparent;
    border-radius: .25rem;
    transition: all .1s ease-in-out;
}
.form-label-group input::-webkit-input-placeholder {
    color: transparent;
}
.form-label-group input:-ms-input-placeholder {
    color: transparent;
}
.form-label-group input::-ms-input-placeholder {
    color: transparent;
}
.form-label-group input::-moz-placeholder {
    color: transparent;
}
.form-label-group input::placeholder {
    color: transparent;
}
.form-label-group input:not(:placeholder-shown) {
    padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
    padding-bottom: calc(var(--input-padding-y) / 3);
}
.form-label-group input:not(:placeholder-shown)~label {
    padding-top: calc(var(--input-padding-y) / 3);
    padding-bottom: calc(var(--input-padding-y) / 3);
    font-size: 12px;
    color: #777;
}
.btn-google {
    color: white;
    background-color: #ea4335;
}
.btn-facebook {
    color: white;
    background-color: #3b5998;
}
/* Homepage Search Block */
.homepage-header{
    background: url(../img/bg.png);
    position: relative;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
.overlay {
    background: #000;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    opacity: 0.6;
    -webkit-backdrop-filter: saturate(180%) blur(5px);
    backdrop-filter: saturate(180%) blur(5px);
}
.homepage-header .osahan-nav {
    background: transparent !important;
}
.homepage-header .osahan-nav .nav-link {
    color: #fff !important;
    padding-bottom: 14px !important;
}
.homepage-search-form .form-control {
    font-size: 15px;
    height: 50px;
    padding-right: 106px;
    border: none;
}
.homepage-search-form .form-group {
    position: relative;
}
.homepage-search-form .locate-me {
    background: #ececec none repeat scroll 0 0;
    color: #666;
    font-size: 12px;
    padding: 7px 10px;
    border-radius: 6px;
    position: absolute;
    right: 14px;
    top: 9px;
}
.homepage-search-form .locate-me:hover {
    background: #666 none repeat scroll 0 0;
    color: #ffffff;
}
.homepage-search-form .btn {
    font-size: 15px;
    font-weight: 600;
    height: 50px;
    padding: 13px 5px;
}
.homepage-search-form .location-dropdown i {
    left: 18px;
    position: absolute;
    top: 20px;
    z-index: 9;
}
.homepage-search-form .select2-selection {
    border-color: #ced4da !important;
    border-radius: 6px !important;
    height: 50px !important;
    outline: none !important;
    border: none !important;
}
.homepage-search-form .select2-selection__rendered {
    font-size: 15px;
    line-height: 50px !important;
    padding: 0 28px 0 31px !important;
}
.homepage-search-form .select2-selection__arrow {
    right: 9px !important;
    top: 13px !important;
}
.select2-dropdown{
    margin: 2px 0 0 0;
    border: none;
    border-radius: 6px !important;
    overflow: hidden;
    padding: 4px;
}
.select2-results__option {
    border-radius: 5px;
    font-size: 12px;
    padding: 6px 11px;
}
.select2-search--dropdown {
    padding: 0px;
}
.select2-search__field {
    border-radius: 6px;
    margin: 0 0 5px 0;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #dd646e;
    color: white;
}
.select2-container--default .select2-search--dropdown .select2-search__field{
   border: 1px solid #ced4da;
}
.select2-search__field{
    outline: none !important;
    border: 1px solid #ced4da;
}
.owl-carousel-category .owl-nav button {
    top: 36px;
}
/* Homepage */
.owl-carousel-four .item {
    padding: 6px 7px;
}
.osahan-category-item {
    background: rgb(255 255 255);
    margin: 5px 3px;
    border-radius: 5px;
    overflow: hidden;
    text-align: center;
    padding: 0px;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    -webkit-backdrop-filter: saturate(180%) blur(5px);
    backdrop-filter: saturate(180%) blur(5px);
    /* border: 1px solid #fff; */
}
.osahan-category-item h6 {
    margin: 0px;
    font-size: 12px;
    font-weight: 600;
    color: #dd646e;
}
.osahan-category-item p {
    margin: 0 0 4px 0;
    font-size: 10px;
}
.osahan-category-item img {
    width: 100%;
    height: 54px;
    object-fit: cover;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    transition: transform .7s ease;
    margin: 0px 0 7px 0;
}
.osahan-category-item img:hover {
	transform: scale(1.1);
}
.line {
    background-color: #5e5e5e;
    border-radius: 12px;
    display: inline-table;
    height: 4px;
    margin: 0 0 51px;
    width: 50px;
}
/* Customize Bootstrap */
.small, small {
    font-size: 85%;
    font-weight: 600;
}
.select2, .select2 span {
    width: 100% !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b {
    left: 96%;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 3px;
}
.modal-footer .btn {
    font-size: 14px;
    padding: 12px 16px;
}
.btn-success,
.badge-success {
    background-color: #3ecf8e !important;
    border-color: #3ecf8e !important;
}
.btn-outline-success {
    color: #3ecf8e !important;
    border-color: #3ecf8e !important;
}
.btn-outline-success:hover {
    color: #ffffff !important;
    border-color: #3ecf8e !important;
    background-color: #3ecf8e !important;
}
.text-success {
    color: #3ecf8e !important;
}
.border-success {
    border-color: #3ecf8e!important;
}
.btn-danger,
.badge-danger {
    background-color: #f32129 !important;
    border-color: #f32129 !important;
}
.btn-outline-danger {
    color: #f32129 !important;
    border-color: #f32129 !important;
}
.btn-outline-danger:hover {
    color: #ffffff !important;
    border-color: #f32129 !important;
    background-color: #f32129 !important;
}
.text-danger {
    color: #f32129 !important;
}
.border-danger {
    border-color: #f32129!important;
}
.btn-primary,
.badge-danger {
    background-color: #dd646e !important;
    border-color: #dd646e !important;
}
.btn-primary:hover, .btn-primary:focus {
    background-color: #db5359 !important;
    border-color: #db5359 !important;
}
.btn-outline-primary {
    color: #dd646e !important;
    border-color: #dd646e !important;
}
.btn-outline-primary:hover,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.btn-outline-primary:not(:disabled):not(.disabled):active,
.show>.btn-outline-primary.dropdown-toggle {
    color: #ffffff !important;
    border-color: #dd646e !important;
    background-color: #dd646e !important;
}
.text-primary {
    color: #dd646e !important;
}
.border-primary {
    border-color: #dd646e!important;
}
.btn-lg {
    font-size: 15px;
    font-weight: bold;
    padding: 14px 35px;
    letter-spacing: 1px;
}
.modal-content {
    border: none;
    border-radius: 6px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.btn {
    font-size: 13px;
    border-radius: 6px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.form-control {
    font-size: 13px;
    border-radius: 6px;
    box-shadow: 0 1px 6px rgba(0,0,0, 0.1)!important;
    min-height: 38px;
}
.card {
    border-radius: 6px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.rounded {
    border-radius: 6px !important;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.input-group-text {
    border-radius: 6px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.custom-checkbox .custom-control-label::before {
    border-radius: 6px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.nav-pills .nav-link {
    border-radius: 6px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.alert,
.badge,
.dropdown-menu {
    border-radius: 6px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.input-group-sm>.custom-select,
.input-group-sm>.form-control,
.input-group-sm>.input-group-append>.btn,
.input-group-sm>.input-group-append>.input-group-text,
.input-group-sm>.input-group-prepend>.btn,
.input-group-sm>.input-group-prepend>.input-group-text {
    box-shadow: 0 1px 6px rgba(0,0,0, 0.1)!important;
}
.bg-dark {
    background-color: #000 !important;
}
.sb-5,
.sy-5 {
    padding-bottom: 4rem !important;
}
.st-5,
.sy-5 {
    padding-top: 4rem !important;
}
.dropdown-menu {
    font-size: 13px;
}
.dropdown-item {
    border-radius: 0 !important;
    padding: 7px 18px;
    color: rgba(0,0,0,.5);
    font-weight: 500;
}
.dropdown-item:focus {
    background-color: #dd646e;
    color: #fff;
}
/* Listing */
.list-cate-page {
    margin: -5px 0px 0px 0px;
}
.filters-card-body {
    padding: 18px 0 0 0;
}
.filters-search {
    position: relative;
}
.filters-search i {
    position: absolute;
    left: 12px;
    top: 13px;
}
.filters-search .form-control {
    padding-left: 34px;
}
.custom-checkbox label.custom-control-label,
.custom-radio label.custom-control-label {
    padding-top: 2px;
    cursor: pointer;
}
.filters-card-header a {
    font-weight: 500;
    width: 100%;
    display: block;
}
.filters-card-header a i {
    margin: 2px -2px 0 0;
}
.list-card .count-number {
    margin: 4px 0 0 0;
    display: inline-block;
    border: 1px solid #6c757d;
    border-radius: 6px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    overflow: hidden;
}
.list-card .star {
    right: 8px;
    bottom: 8px;
}
.list-card .star .badge {
    font-size: 11px;
    padding: 5px 5px;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
}
.list-card .member-plan {
    left: 8px;
    top: 8px;
}
.list-card .member-plan .badge {
    font-size: 11px;
    padding: 5px 5px;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
}
.list-card .list-card-image {
    position: relative;
}
.list-card .favourite-heart {
    right: 8px;
    top: 8px;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
}
.list-card .favourite-heart i {
    background: #fff;
    width: 23px;
    height: 23px;
    display: inline-block;
    text-align: center;
    font-size: 15px;
    line-height: 24px;
    border-radius: 50px;
}
/* detail */
.count-number .btn {
    padding: 4px 5px;
    font-size: 10px;
    border-radius: 0px;
    border: none;
}
.restaurant-detailed-header-left {
    text-shadow: 0px 0px 10px #000;
}
span.count-number.float-right {
    border: 1px solid #6c757d;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.count-number-input {
    width: 24px;
    text-align: center;
    margin: 0 -4px;
    background: #6c757d;
    border: none;
    color: #fff;
    height: 23px;
    border-radius: 0px;
    vertical-align: bottom;
}
.generator-bg {
    /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#dd646e+1,fe792b+100 */
background: #dd646e; /* Old browsers */
background: -moz-linear-gradient(-45deg, #dd646e 1%, #fe792b 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, #dd646e 1%,#fe792b 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, #dd646e 1%,#fe792b 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dd646e', endColorstr='#fe792b',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
}
.restaurant-detailed-banner {
    position: relative;
}
.restaurant-detailed-banner .img-fluid.cover {
    height: 424px;
    object-fit: cover;
}
.restaurant-detailed-header {
    bottom: 0;
    left: 0;
    padding: 65px 0 17px;
    position: absolute;
    right: 0;
    background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.83) 100%);
    background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.83) 100%);
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.83) 100%);
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#d4000000', GradientType=0);
}
.homepage-great-deals-carousel .item img {
    border-radius: 2px;
}
.restaurant-detailed-earn-pts .img-fluid.float-left {
    height: 61px;
}
.card-icon-overlap {
    overflow: hidden;
    position: relative;
}
.red-generator-bg {
    background: #ff3371;
    background: -moz-linear-gradient(-45deg, #ff3371 1%, #fe6753 100%);
    background: -webkit-linear-gradient(-45deg, #ff3371 1%, #fe6753 100%);
    background: linear-gradient(135deg, #ff3371 1%, #fe6753 100%);
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ff3371', endColorstr='#fe6753', GradientType=1);
}
.border-btn {
    border: 1px solid #dee0e6;
    border-radius: 2px;
    display: inline-block;
    font-size: 14px;
    font-weight: 500;
    padding: 8px 15px;
    margin: 0 0 10px 0;
}
.restaurant-detailed-ratings .generator-bg {
    border-radius: 4px;
    display: inline-block;
    font-size: 12px;
    height: 20px;
    margin: 0 4px 0 0;
    padding: 3px 6px;
}
.explore-outlets-search .form-control {
    border-radius: 2px !important;
    font-size: 15px;
    height: 50px;
    padding: 5px 20px;
}
.explore-outlets-search .btn {
    font-size: 15px;
    padding: 13px 17px;
    position: absolute;
    z-index: 9;
    right: 0;
    text-decoration: none;
}
.mall-category-item {
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 6px;
    margin: 0 6px;
    overflow: hidden;
    text-align: center;
    padding: 0 0 7px 0;
}
.mall-category-item img {
    height: 89px;
    object-fit: cover;
    width: 100%;
}
.mall-category-item h6 {
    font-size: 14px;
    font-weight: 500;
    margin: 0;
    padding: 10px 10px 3px 10px;
}
.mall-category-item .btn {
    padding: 2px 8px;
    font-size: 12px;
    right: 7px;
    top: 7px;
}
.mall-category-item small {
    background: #ececec;
    color: #f32129;
    padding: 2px 4px;
    border-radius: 5px;
    font-size: 10px;
}
.mall-category-item:hover small {
    background: #f32129;
    color: #ffffff;
}
.address-map {
    border-radius: 2px;
    overflow: hidden;
}
.new-arrivals-card .card-img .new-arrivals {
    bottom: 11px;
    left: 12px;
    position: absolute;
}
.new-arrivals {
    background: #000 none repeat scroll 0 0;
    border-radius: 2px;
    color: #fff;
    padding: 1px 13px;
    text-transform: uppercase;
}
.new-arrivals-card .card-img {
    position: relative;
}
.total-like-user {
    border: 2px solid #fff;
    height: 34px;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
    width: 34px;
}
.total-like-user-main a {
    display: inline-block;
    margin: 0 -17px 0 0;
}
.total-like {
    border: 1px solid;
    border-radius: 50px;
    display: inline-block;
    font-weight: 500;
    height: 34px;
    line-height: 33px;
    padding: 0 13px;
    vertical-align: top;
}
.restaurant-detailed-ratings-and-reviews hr {
    margin: 0 -24px;
}
.graph-star-rating-header .star-rating {
    font-size: 17px;
}
.progress {
    background: #f2f4f8 none repeat scroll 0 0;
    border-radius: 0;
    height: 30px;
}
.rating-list {
    display: inline-flex;
    margin-bottom: 15px;
    width: 100%;
}
.rating-list-left {
    height: 16px;
    line-height: 29px;
    width: 10%;
}
.rating-list-center {
    width: 80%;
}
.rating-list-right {
    line-height: 29px;
    text-align: right;
    width: 10%;
}
.restaurant-slider-pics {
    bottom: 0;
    font-size: 12px;
    left: 0;
    z-index: 999;
    padding: 0 10px;
}
.restaurant-slider-view-all {
    bottom: 15px;
    right: 15px;
    z-index: 999;
}
.offer-dedicated-nav .nav-link.active,
.offer-dedicated-nav .nav-link:hover,
.offer-dedicated-nav .nav-link:focus {
    border-color: #3868fb;
    color: #3868fb;
}
.offer-dedicated-nav .nav-link {
    border-bottom: 2px solid #fff;
    color: #000000;
    padding: 16px 0;
    font-weight: 600;
}
.offer-dedicated-nav .nav-item {
    margin: 0 37px 0 0;
}
.restaurant-detailed-action-btn {
    margin-top: 12px;
}
.restaurant-detailed-header-right .btn-success {
    height: 45px;
    margin: -18px 0 18px;
    min-width: 130px;
    padding: 7px;
}
.text-black {
    color: #000000;
}
.icon-overlap {
    bottom: -23px;
    font-size: 74px;
    opacity: 0.23;
    position: absolute;
    right: -32px;
}
.menu-list img {
    width: 41px;
    height: 41px;
    object-fit: cover;
}
.restaurant-detailed-header-left img {
    width: 88px;
    height: 88px;
    border-radius: 3px;
    object-fit: cover;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
}
/* Checkout Page */
.addresses-item a.btn.btn-sm {
    min-width: 157px;
}
.osahan-cart-item-profile img {
    width: 40px;
    height: 40px;
    border: 3px solid #fff;
}
.osahan-cart-item-profile p {
    font-size: 10px;
}
.osahan-payment .nav-link {
    padding: 18px 20px;
    border: none;
    font-weight: 600;
    color: #535665;
    box-shadow: none !important;
    border-radius: 6px 0px 0 6px !important
}
.osahan-payment .nav-link i {
    width: 28px;
    height: 28px;
    background: #535665;
    display: inline-block;
    text-align: center;
    line-height: 29px;
    font-size: 15px;
    border-radius: 50px;
    margin: 0 7px 0 0px;
    color: #fff;
}
.osahan-payment .nav-link.active {
    background: #f3f7f8;
    color: #282c3f !important;
}
.osahan-payment .nav-link.active i {
    background: #282c3f !important;
}
.osahan-payment .tab-content {
    background: #f3f7f8;
    padding: 20px;
}
.osahan-card i {
    font-size: 35px;
    vertical-align: middle;
    color: #6c757d;
}
.osahan-card {
    margin: 0 0 0 7px;
}
.osahan-payment label {
    font-size: 12px;
    margin: 0 0 3px 0;
    font-weight: 600;
}
/* My Account */
.payments-item img.mr-3 {
    width: 47px;
}
.order-list .btn {
    border-radius: 2px;
    min-width: 121px;
    font-size: 13px;
    padding: 7px 0 7px 0;
}
.osahan-account-page-left .nav-link {
    padding: 18px 20px;
    border: none;
    font-weight: 600;
    color: #535665;
}
.osahan-account-page-left .nav-link i {
    width: 28px;
    height: 28px;
    background: #535665;
    display: inline-block;
    text-align: center;
    line-height: 29px;
    font-size: 15px;
    border-radius: 50px;
    margin: 0 7px 0 0px;
    color: #fff;
}
.osahan-account-page-left .nav-link.active {
    background: #f3f7f8;
    color: #282c3f !important;
}
.osahan-account-page-left .nav-link.active i {
    background: #282c3f !important;
}
.osahan-user-media img {
    width: 90px;
}
.card offer-card h5.card-title {
    border: 2px dotted #000;
}
.card.offer-card h5 {
    border: 1px dotted #daceb7;
    display: inline-table;
    color: #17a2b8;
    margin: 0 0 19px 0;
    font-size: 15px;
    padding: 6px 10px 6px 6px;
    border-radius: 2px;
    background: #fffae6;
    position: relative;
}
.card.offer-card h5 img {
    height: 22px;
    object-fit: cover;
    width: 22px;
    margin: 0 8px 0 0;
    border-radius: 2px;
}
.card.offer-card h5:after {
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-bottom: 4px solid #daceb7;
    content: "";
    left: 30px;
    position: absolute;
    bottom: 0;
}
.card.offer-card h5:before {
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 4px solid #daceb7;
    content: "";
    left: 30px;
    position: absolute;
    top: 0;
}
.payments-item .media {
    align-items: center;
}
.payments-item .media img {
    margin: 0 40px 0 11px !important;
}
.reviews-members .media .mr-3 {
    width: 56px;
    height: 56px;
    object-fit: cover;
}
.order-list img.mr-4 {
    width: 70px;
    height: 70px;
    object-fit: cover;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
    border-radius: 2px;
}
.osahan-cart-item p.text-gray.float-right {
    margin: 3px 0 0 0;
    font-size: 12px;
}
.osahan-cart-item .food-item {
    vertical-align: bottom;
}
/* Track Order Page */

.osahan-track-order-page {
    min-height: 676px;
}
.osahan-point {
    z-index: 1;
    width: 50%;
    border-radius: 50%;
    padding-bottom: 50%;
    pointer-events: none;
    background-color: rgba(225, 48, 8, .2);
    border: 1px solid #dd646e;
}
/* Footer */
.footer {
    background: #EDF1F4;
}
.footer h6 {
    font-size: 14px;
    text-transform: uppercase;
}
.footer ul {
    margin: 0;
    padding: 0;
}
.footer ul li {
    line-height: 26px;
    list-style: outside none none;
}
.footer ul li a {
    color: #6c8293;
}
.search-links a {
    color: #666;
    font-size: 12px;
    line-height: 23px;
    margin: 0 2px;
}
.search-links {
    font-size: 11px;
}
footer {
    background-color: #f0f4f7;
}
/* Mobile Media */
/* Extra small devices (portrait phones, less than 576px) */
@media (max-width: 575.98px) {
.dropdown-menu {
    display: none;
}
.homepage-header .osahan-nav .nav-link {
    border-color: rgb(255 255 255 / 11%);
}
.m-none{
    display: none;
}
.homepage-search-title {
    text-align: center;
}
.list-cate-page {
    margin: 22px 0 0 0;
}
.d-none-m{
	display:none;
}
.row.pt-2.pb-2 {
    padding-bottom: 0px !important;
    padding-top: 0px !important;
}
.row.pt-2 {
    padding-top: 0px !important;
}
.offer-card-horizontal .col-md-4.col-4.p-4 {
    padding: 0 0 0 15px !important;
}
.row.mt-4.pt-2 {
    margin-top: 0px !important;
    padding-top: 0px !important;
}
.homepage-add-section {
    padding: 0 13px;
}
.breadcrumb-osahan h1 {
    font-size: 34px;
}
.breadcrumb-osahan h6 {
    font-size: 15px;
}
.breadcrumb-osahan {
    padding-left: 15px;
    padding-right: 15px;
}
.reviews-members .media .mr-3 {
    width: 36px;
    height: 36px;
}
.total-like {
    font-size: 12px;
}
.restaurant-detailed-action-btn.float-right .btn {
    margin: 3px 0px;
    font-size: 13px;
}
.login  .col-md-9.col-lg-8.mx-auto.pl-5.pr-5 {
    padding: 0 11px !important;
}
.login.d-flex.align-items-center.py-5 {
    padding: 0 !important;
}
.h5, h5 {
    font-size: 16px;
}
.homepage-add-section .col-md-3.col-6 {
    padding: 2px 2px;
}
.homepage-ad .item {
    padding: 0 2px;
}
.osahan-nav {
    padding: 15px 15px;
}
.navbar-toggler {
    padding: 5px 8px;
    border-radius: 2px;
}
.osahan-nav .nav-link {
    margin: 0px;
    text-align: center;
    padding: 14px 0 !important;
    border-bottom: 1px solid #eef0ef;
}
.osahan-nav .dropdown-item {
    text-align: center;
}
.osahan-slider {
    padding: 18px 0 0 0px !important;
}
.pt-5, .py-5 {
    padding-top: 3rem !important;
}
.pb-5, .py-5 {
    padding-bottom: 3rem !important;
}
.homepage-search-block {
    padding: 3rem 0 !important;
}
.mobile-none{
    display: none;
}
.card {
    margin-bottom: 15px !important;
}
p{
    font-size: 12px;
}
.restaurant-detailed-header-left img {
    float: none !important;
    margin: 0 0 14px 0 !important;
}
.restaurant-detailed-header-left {
    text-align: center;
}
.restaurant-detailed-header-right .btn-success {
    margin-top: 18px;
}
.restaurant-detailed-header-right.text-right {
    text-align: center !important;
}
.restaurant-detailed-action-btn.float-right {
    float: none !important;
    margin: auto;
    text-align: center;
    width: 100% !important;
    display: block;
    padding: 12px 0;
    border-bottom: 1px solid #dedede;
}
.offer-dedicated-nav {
    text-align: center;
}
.offer-dedicated-nav .nav-item {
    flex: auto;
    border-bottom: 1px solid #ccc;
    padding: 0;
    margin: 0 11px !important;
}
.offer-dedicated-nav {
    text-align: center;
}
.address-map.float-right.ml-5 {
    float: none !important;
    margin: 0 0 20px 0 !important;
}
.address-map.float-right.ml-5 iframe {
    width: 100%;
}
.osahan-track-order-detail p.text-gray.mb-5 {
    margin: 1px 0 11px 0 !important;
}
.osahan-account-page-left .nav-tabs {
    padding-left: 0px !important;
}
.osahan-account-page-left {
    height: auto !important;
    margin: 0 0 15px 0;
}
.order-list .float-right {
    float: none !important;
}
.row.mb-4 {
    margin-bottom: 0px !important;
}
.app {
    margin-bottom: 26px;
}
.footer ul li a {
    font-size: 12px;
}
.footer h6 {
    font-size: 13px;
    text-transform: capitalize;
}
.osahan-payment .col-sm-4.pr-0 {
    padding-right: 15px !important;
}
.osahan-payment .col-sm-8.pl-0 {
    padding-left: 15px !important;
    margin: 14px 0 0 0;
}
.p-5.osahan-invoice.bg-white.shadow-sm {
    padding: 15px !important;
}
.h3, h3 {
    font-size: 22px;
}
.p-5 {
    padding: 20px !important;
}
.osahan-account-page-right {
    padding: 0px !important;
    border: none;
    background: transparent !important;
    box-shadow: none !important;
    margin-top: 15px;
}
}
/* Small devices (landscape phones, 576px and up) */
 @media (min-width: 576px) and (max-width: 767.98px) {
.dropdown-menu {
    display: none;
}
.homepage-header .osahan-nav .nav-link {
    border-color: rgb(255 255 255 / 11%);
}
.homepage-add-section .col-md-3.col-6 {
    padding: 2px 2px;
}
.homepage-search-title {
    text-align: center;
}
.row.pt-2.pb-2 {
    padding-bottom: 0px !important;
    padding-top: 0px !important;
}
.row.pt-2 {
    padding-top: 0px !important;
}
.d-none-m{
	display:none;
}
.list-cate-page {
    margin: 22px 0 0 0;
}
.row.mt-4.pt-2 {
    margin-top: 0px !important;
    padding-top: 0px !important;
}
.offer-card-horizontal .col-md-4.col-4.p-4 {
    padding: 0 0 0 15px !important;
}
.homepage-add-section {
    padding: 0 13px;
}
.homepage-ad .item {
    padding: 0 2px;
}
.container {
    max-width: 100%;
}
.osahan-nav {
    padding: 15px 15px;
}
.navbar-toggler {
    padding: 5px 8px;
    border-radius: 2px;
}
.osahan-nav .nav-link {
    margin: 0px;
    text-align: center;
    padding: 14px 0 !important;
    border-bottom: 1px solid #eef0ef;
}
.osahan-nav .dropdown-item {
    text-align: center;
}
.osahan-slider {
    padding: 18px 0 0 0px !important;
}
.pt-5, .py-5 {
    padding-top: 3rem !important;
}
.pb-5, .py-5 {
    padding-bottom: 3rem !important;
}
.homepage-search-block {
    padding: 3rem 0 !important;
}
.mobile-none{
    display: none;
}
.card {
    margin-bottom: 15px !important;
}
p{
    font-size: 12px;
}
.restaurant-detailed-header-left img {
    float: none !important;
    margin: 0 0 14px 0 !important;
}
.restaurant-detailed-header-left {
    text-align: center;
}
.restaurant-detailed-header-right .btn-success {
    margin-top: 18px;
}
.restaurant-detailed-header-right.text-right {
    text-align: center !important;
}
.restaurant-detailed-action-btn.float-right {
    float: none !important;
    margin: auto;
    text-align: center;
    width: 100% !important;
    display: block;
    padding: 12px 0;
    border-bottom: 1px solid #dedede;
}
.offer-dedicated-nav {
    text-align: center;
}
.offer-dedicated-nav .nav-item {
    flex: auto;
    border-bottom: 1px solid #ccc;
    padding: 0;
    margin: 0 11px !important;
}
.offer-dedicated-nav {
    text-align: center;
}
.address-map.float-right.ml-5 {
    float: none !important;
    margin: 0 0 20px 0 !important;
}
.address-map.float-right.ml-5 iframe {
    width: 100%;
}
.osahan-payment .nav-link i {
    display: block;
    margin: 0 auto 10px auto;
}
.osahan-payment .nav-link {
    text-align: center;
}
.osahan-track-order-detail p.text-gray.mb-5 {
    margin: 1px 0 11px 0 !important;
}
.osahan-account-page-left .nav-tabs {
    padding-left: 0px !important;
}
.osahan-account-page-left {height: auto !important;margin: 0 0 15px 0;}
.order-list .float-right {
    float: none !important;
}
.row.mb-4 {
    margin-bottom: 0px !important;
}
.app {
    margin-bottom: 26px;
}
.footer ul li a {
    font-size: 12px;
}
.footer h6 {
    font-size: 13px;
    text-transform: capitalize;
}
}
/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991.98px) {
.dropdown-menu {
    display: none;
}
.homepage-header .osahan-nav .nav-link {
    border-color: rgb(255 255 255 / 11%);
}
.container {
    max-width: 100%;
}
.osahan-nav {
    padding: 15px 15px;
}
.navbar-toggler {
    padding: 5px 8px;
    border-radius: 2px;
}
.osahan-nav .nav-link {
    margin: 0px;
    text-align: center;
    padding: 14px 0 !important;
    border-bottom: 1px solid #eef0ef;
}
.osahan-nav .dropdown-item {
    text-align: center;
}
.osahan-slider {
    padding: 18px 0 0 0px !important;
}
.pt-5, .py-5 {
    padding-top: 3rem !important;
}
.pb-5, .py-5 {
    padding-bottom: 3rem !important;
}
.homepage-search-block {
    padding: 3rem 0 !important;
}
.card {
    margin-bottom: 15px !important;
}
p{
    font-size: 12px;
}
.restaurant-detailed-header-left img {
    float: none !important;
    margin: 0 0 14px 0 !important;
}
.restaurant-detailed-header-left {
    text-align: center;
}
.restaurant-detailed-header-right .btn-success {
    margin-top: 18px;
}
.restaurant-detailed-header-right.text-right {
    text-align: center !important;
}
.restaurant-detailed-action-btn.float-right {
    float: none !important;
    margin: auto;
    text-align: center;
    width: 100% !important;
    display: block;
    padding: 12px 0;
    border-bottom: 1px solid #dedede;
}
.offer-dedicated-nav {
    text-align: center;
}
.offer-dedicated-nav .nav-item {
    margin: 0 8px !important;
}
.offer-dedicated-nav {
    text-align: center;
}
.address-map.float-right.ml-5 {
    float: none !important;
    margin: 0 0 20px 0 !important;
}
.address-map.float-right.ml-5 iframe {
    width: 100%;
}
.osahan-payment .nav-link i {
    display: block;
    margin: 0 auto 10px auto;
}
.osahan-payment .nav-link {
    text-align: center;
}
.osahan-track-order-detail p.text-gray.mb-5 {
    margin: 1px 0 11px 0 !important;
}
.osahan-account-page-left .nav-tabs {
    padding-left: 0px !important;
}
.osahan-account-page-left {
    height: auto !important;
    margin: 0 0 15px 0;
}
.order-list .float-right {
    float: none !important;
}
.row.mb-4 {
    margin-bottom: 0px !important;
}
.app {
    margin-bottom: 26px;
}
.footer ul li a {
    font-size: 12px;
}
.footer h6 {
    font-size: 13px;
    text-transform: capitalize;
}
}
/* Large devices (desktops, 992px and up) */
 @media (min-width: 992px) and (max-width: 1199.98px) {
     .container {
         max-width: 100%;
    }
}
/* Extra large devices (large desktops, 1200px and up) */
 @media (min-width: 1200px) {
}
   
    
    
    
    
</style>
<div id="features">
<div class="services">
<section class="section st-5 sb-5 bg-white homepage-add-section">
         <div class="container">
            <div class="row">
               <div class="col-md-3 col-6">
                  <div class="products-box">
                     <a href="listing.html"><img alt="" src="img/pro1.jpg" class="img-fluid rounded"></a>
                  </div>
               </div>
               <div class="col-md-3 col-6">
                  <div class="products-box">
                     <a href="listing.html"><img alt="" src="img/pro2.jpg" class="img-fluid rounded"></a>
                  </div>
               </div>
               <div class="col-md-3 col-6">
                  <div class="products-box">
                     <a href="listing.html"><img alt="" src="img/pro3.jpg" class="img-fluid rounded"></a>
                  </div>
               </div>
               <div class="col-md-3 col-6">
                  <div class="products-box">
                     <a href="listing.html"><img alt="" src="img/pro4.jpg" class="img-fluid rounded"></a>
                  </div>
               </div>
            </div>
         </div></div></div>
      </section>