<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Cookies and Cacarons.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet"> <!-- Thêm Lightbox CSS -->
    <style>
         body {
    margin: 0;
    padding: 0; 
    font-family: Arial, sans-serif;
    background: #EBE1CB;
         }
        #pageBanner {
            text-align: center;
            position: relative;
        }

        .pageBannerImage {
            width: 100%;
            height: auto;
        }
        #pageBanner h1, #pageBanner h2 {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); /* Thêm bóng đổ để văn bản nổi bật */
            z-index: 2; /* Đảm bảo văn bản nằm trên ảnh */
        }

        #pageBanner h1 {
            top: 5%; /* Vị trí từ trên xuống */
            font-size: 4rem; /* Kích thước chữ lớn hơn */
            font-weight: bold;
            background: rgba(0, 0, 0, 0); /* Nền mờ hơn */
            border-radius: 5px;
            padding: 10px;
        }

        #pageBanner h2 {
            top: 40%; /* Vị trí từ trên xuống */
            font-size: 2.5rem; /* Kích thước chữ nhỏ hơn h1 */
            background: rgba(0, 0, 0, 0); /* Nền mờ hơn */
            border-radius: 5px;
            padding: 5px;
        }

        .White {
            color: white;
        }

        #content {
            padding: 20px;
        }

        .slider {
            width: 94.5%;
            margin: 0 auto;
        }

        .slider img {
            width: 100%; /* Đặt width để ảnh chiếm toàn bộ khung của slider */
            height: auto;
            border-radius: 10px; /* Thêm bo góc cho ảnh (tùy chọn) */
        }

        .slick-prev, .slick-next {
            font-size: 24px;
            color: black;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
        }

        .slick-prev {
            left: 10px;
        }

        .slick-next {
            right: 10px;
        }

        .slick-prev:hover, .slick-next:hover {
            background: rgba(255, 255, 255, 0.8);
        }

        .slick-dots {
            bottom: -30px; /* Đặt vị trí của các điểm điều hướng */
        }

        .slick-dots li button:before {
            color: black; /* Màu điểm điều hướng */
        }

        .oneColContent, .twoColContent {
            margin: 0px 40px;
        }

        .oneColContent p, .twoColContent p {
            line-height: 1.6;
            padding:0 40px;
            color: rgb(100, 86, 86);
        }

        .twoColContent {
            display: flex;
            justify-content: space-between;
        }

        .col50 {
            width: 48%; /* Căn chỉnh hai cột với một khoảng cách nhỏ */
        }
        .divider {
            height: 1px;
            background: #ccc;
            margin: 20px 0;
        }

        .clear {
            clear: both;
        }

        /* Gallery Styles */
        .gallery-item {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }

        .gallery-item img {
            border: 2px solid #cfcfcf;
        }

        /* Ensure container spans the full width */
        #contactInfo {
            width: 100%;
            text-align: center; /* Center align text and inline elements */
        }

        /* Centering the backToTop */
        #backToTop {
            display: inline-block;
            margin: 10px 0; /* Adjust margin as needed */
        }

        /* Optional: Style the backToTop link */
        #backToTop img {
            width: 40px; /* Adjust size as needed */
            vertical-align: middle; /* Align image vertically within its container */
        }
        h4 {
    font-weight: bold; /* Chữ in đậm */
    color: rgb(72, 65, 65);
    text-transform: uppercase; /* Chữ in hoa */
    font-size: 1.5rem; /* Kích thước chữ lớn hơn */
    margin: 0; /* Tùy chọn, để loại bỏ khoảng cách mặc định nếu cần */
    padding: 0 40px; /* Tùy chọn, để loại bỏ padding nếu có */
}
h5{
    font-weight: bold; /* Chữ in đậm */
    color: rgb(96, 81, 81);
    text-transform: uppercase; /* Chữ in hoa */
    font-size: 1rem; /* Kích thước chữ lớn hơn */
    margin: 0; /* Tùy chọn, để loại bỏ khoảng cách mặc định nếu cần */
    padding: 0 40px;
}
    </style>
</head>
<body>
    @include('layouts.header')
    <section id="main">
        <main>
            <section id="pageBanner">
                <div id="pageBannerWrapperBorder"></div>
                <img class="pageBannerImage" src="https://bakerynouveau.com/wp-content/uploads/2019/12/cookies-and-chocolate.jpg" alt="A plate of various tea cookies and a plate of various chocolate bon bons" class="White" />
                <h1 class="White">Chocolates</h1>
                <h2 class="White">Macarons & Cookies</h2>
            </section>
            <section id="content">
                <div class="oneColContent">
                    <h4><strong>Macarons, Chocolates &amp; Cookies</strong></h4>
                    <p>From classic cookies and colorful macarons, to rich chocolate, Bakery Nouveau has the perfect small indulgence, whether as a treat for yourself, or to share a gift with a friend. Availability can change, so please call for our current selection.</p>
                    <p><span style="color: #993366;"><a style="color: #993366;" href="http://127.0.0.1:8000/confections">View All Confections &gt;&gt;</a> | </span><a href="http://127.0.0.1:8000/the-peacock-series-chocolate-bars"><span style="color: #993366;">View All Chocolate Bars&gt;&gt;</span></a></p>

                    <!-- Gallery Slider -->
                    <div class="slider">
                        <div><a href="images/cookies1.jpg" data-lightbox="gallery" data-title="Macarons in a clear box with ribbon"><img src="images/cookies1.jpg" alt="Macarons in a clear box with ribbon" /></a></div>
                        <div><a href="images/cookies2.jpg" data-lightbox="gallery" data-title="Overhead view of a variety of colorful molded chocolates"><img src="images/cookies2.jpg" alt="Overhead view of a variety of colorful molded chocolates" /></a></div>
                        <div><a href="images/cookies3.jpg" data-lightbox="gallery" data-title="Chocolate macarons"><img src="images/cookies3.jpg" alt="Chocolate macarons" /></a></div>
                        <div><a href="images/cookies4.jpg" data-lightbox="gallery" data-title="Variety of color chocolate candy pieces"><img src="images/cookies4.jpg" alt="Variety of color chocolate candy pieces" /></a></div>
                        <div><a href="images/cookies5.jpg" data-lightbox="gallery" data-title="Tight grouping of packaged chocolate bars"><img src="images/cookies5.jpg" alt="Tight grouping of packaged chocolate bars" /></a></div>
                        <div><a href="images/cookies6.jpg" data-lightbox="gallery" data-title="Stack of a variety of chocolate bars"><img src="images/cookies6.jpg" alt="Stack of a variety of chocolate bars" /></a></div>
                        <div><a href="images/cookies7.jpg" data-lightbox="gallery" data-title="Variety cookies with cups of coffee"><img src="images/cookies7.jpg" alt="Variety cookies with cups of coffee" /></a></div>
                        <div><a href="images/cookies8.jpg" data-lightbox="gallery" data-title="Stacked vanilla and chocolate swirl shortbread cookies"><img src="images/cookies8.jpg" alt="Stacked vanilla and chocolate swirl shortbread cookies" /></a></div>
                    </div>
                    <p>&nbsp;</p>
                </div>

                <div class="divider"></div>

                <div class="twoColContent">
                    <div class="col50">
                        <h5>Macarons &amp; Cookies</h5>
                        <p><strong>Parisian style macarons</strong><br />
                        Almond flour and meringue cookies baked to perfection and filled with creamy ganache, rich buttercream or decadent caramel. Perhaps the perfect two bite treat, they are available individually, or in 6 and 12 count gift boxes. Flavors range from traditional favorites like dark chocolate ganache, and salted caramel, to the more adventurous lavender ganache or tart yuzu.</p>
                        <p><strong>Traditional cookies</strong><br />
                        Choose from old school favorites such as chocolate chip, peanut butter or snicker-doodles.</p>
                        <p><strong>Packaged cookies</strong><br />
                        Take a treat to share with a friend! Our packaged cookies feature chocolate or vanilla shortbread and Russian tea cookies.</p>
                        <p><strong>Brownies</strong><br />
                        Dense, rich and delicious, just like a brownie should be.</p>
                        <p><strong>Madeleines</strong><br />
                        These almond flour cookies are moist, tender and have just the right amount of sweetness.</p>
                    </div>
                    <div class="col50">
                        <h5>Delicious Chocolates</h5>
                        <p><strong>Hand Crafted Chocolates- <span style="color: #993366;"><a style="color: #993366;" href="http://127.0.0.1:8000/confections">VIEW ALL</a></span></strong><br />
                        From glossy, colorful molded pieces like our rich 70% ganache or our customer favorite Salted Caramel, to our rustic enrobed pieces like our hazelnut praline or coconut ganache, our chocolates are as beautiful as they are delicious.</p>
                        <p>We start with fine dark, milk or white chocolate, and use fresh cream, butter, and fruit purees to craft fine candy including luscious, creamy ganache, decadent caramels, and rich pralines. Available by the piece, our chocolates are sure to bring a little pleasure to your day.</p>
                        <p><strong>Bars- <span style="color: #993366;"><a style="color: #993366;" href="http://127.0.0.1:8000/the-peacock-series-chocolate-bars">VIEW ALL</a></span></strong><br />
                        We have a rotating selection of bars made in-house, using chocolate made by Chef Leaman at our shop in Burien! Varieties range from dark chocolate blends with that perfect touch of sea salt to milk chocolate bars infused with spices.</p>
                        <p><strong>Gift Boxes- <span style="color: #993366;"><a style="color: #993366;" href="https://bakerynouveau.wpengine.com/gift-boxes/">VIEW ALL</a></span></strong><br />
                        A selection of our most popular confections are available in gift boxes. Whether a small box of macarons, or a larger box filled with a variety of chocolates, you are sure to find something to delight and surprise.</p>
                    </div>
                </div>

                <div class="clear"></div>
            </section>
        </main>
    </section>

    <!-- jQuery và Slick Slider JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                infinite: true,
                slidesToShow: 6, // Điều chỉnh số lượng ảnh hiển thị trên mỗi slide
                slidesToScroll: 1, // Số lượng ảnh cuộn mỗi lần
                arrows: true, // Hiển thị mũi tên điều hướng
                dots: true, // Hiển thị điểm điều hướng dưới slider
                autoplay: true, // Tự động chuyển ảnh
                autoplaySpeed: 3000, // Thời gian chuyển ảnh tự động (3 giây)
                pauseOnHover: true // Tạm dừng khi di chuột qua slider
            });
        });
    </script>
    <div class="clear"></div>
    <div id="contactInfoBorder"></div>
    <div id="contactInfo">
        <div id="backToTop"><a href="#top"><img src="https://bakerynouveau.com/wp-content/themes/bones/library/images/top.png" alt="top" /></a></div>
        <div id="contactSpacer">
            <section id="leftFooter">

    @extends('layouts.footer2')
</body>
</html>
