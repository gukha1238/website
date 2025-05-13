<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row text-center">
        <div class="col-sm-12">
            <h1>Welcome to My Restaurant</h1>
            <p class="lead">We serve fresh and delicious food</p>
            <img src="<?= base_url() ?>/public/images/kitchen.jpg" alt="kitchen" class="img-fluid mt-4">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4 d-flex align-items-stretch">
            <div class="card h-100">
                <img src="<?= base_url() ?>/public/images/dish.jpg" class="card-img-top" alt="Delicious Dish">
                <div class="card-body">
                    <h5 class="card-title">Exquisite Dishes</h5>
                    <p class="card-text">Our dishes are made with the freshest ingredients to ensure an unforgettable taste experience.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 d-flex align-items-stretch">
            <div class="card h-100">
                <img src="<?= base_url() ?>/public/images/chef.jpg" class="card-img-top" alt="Chef">
                <div class="card-body">
                    <h5 class="card-title">Expert Chefs</h5>
                    <p class="card-text">Our chefs are highly skilled and passionate about creating culinary masterpieces.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 d-flex align-items-stretch">
            <div class="card h-100">
                <img src="<?= base_url() ?>/public/images/dining.jpg" class="card-img-top" alt="Dining Area">
                <div class="card-body">
                    <h5 class="card-title">Cozy Ambiance</h5>
                    <p class="card-text">Enjoy your meal in a warm and inviting atmosphere perfect for any occasion.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h2>About Us</h2>
            <p>Founded in 2005, My Restaurant has been a cornerstone of the local dining scene for nearly two decades. Our journey began with a simple vision: to create a place where people can come together to enjoy great food, excellent service, and a welcoming atmosphere. Over the years, we have stayed true to our mission by continually innovating and refining our menu to reflect the best of contemporary and classic cuisine.</p>
            <p>Our commitment to quality is unwavering. We believe in using only the freshest, locally-sourced ingredients to create dishes that are both flavorful and nutritious. Our chefs are not only experts in their craft but also passionate about food, bringing creativity and dedication to every plate served.</p>
            <p>At My Restaurant, our values are centered around community, sustainability, and excellence. We strive to support local farmers and suppliers, minimize our environmental footprint, and provide an exceptional dining experience for our guests. Whether you’re here for a casual lunch, a family dinner, or a special celebration, we aim to make every visit memorable.</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h2>Special Offers</h2>
            <p>We love rewarding our customers with special deals and events that enhance their dining experience. Here are some of the exciting offers you can enjoy at My Restaurant:</p>
            <h5>Happy Hour</h5>
            <p>Join us every weekday from 4 PM to 6 PM for Happy Hour. Enjoy a selection of discounted appetizers and drinks, including our signature cocktails, craft beers, and fine wines. It's the perfect way to unwind after a long day or catch up with friends.</p>
            <h5>Weekend Brunch</h5>
            <p>Our weekend brunch is a favorite among our patrons. Available every Saturday and Sunday from 10 AM to 2 PM, our brunch menu features a variety of delectable dishes, from classic eggs Benedict and fluffy pancakes to innovative brunch specials. Don't forget to try our bottomless mimosas and Bloody Marys!</p>
            <h5>Seasonal Specials</h5>
            <p>We take pride in offering seasonal specials that highlight the freshest ingredients and culinary trends. Be sure to ask your server about our current seasonal menu items, which are available for a limited time.</p>
            <h5>Customer Loyalty Program</h5>
            <p>We appreciate our regular customers and offer a loyalty program that rewards you with points for every purchase. Accumulate points to receive discounts, free items, and exclusive offers. Sign up today to start earning rewards!</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h2>Customer Reviews</h2>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <p class="card-text">"A wonderful dining experience! The food was exquisite, and the ambiance was perfect for our anniversary dinner. Highly recommended!"</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">"The best restaurant in town! The staff are friendly, and the dishes are always fresh and delicious. We love coming here for family gatherings."</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Michael Johnson</h5>
                    <p class="card-text">"Fantastic food and great service. The atmosphere is cozy and welcoming. This is our go-to place for a nice dinner out."</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>



