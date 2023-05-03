<div class="repeat">
    <div class="bg-blue">
        <h3 class="text-center">Store</h3>
        <p class="text-center">Welcome to our store</p>
    </div>

    <div class="row">

        <div class="col-md-10">
            <div class="row">

                <!-- fetching products dynamically -->

                <?php
                getproducts();
                get_unique_categories();
                get_unique_brands();

                ?>
            </div>
        </div>
        <div class="col-md-2 bg-secondary p-0">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link">
                        <h4>Brands</h4>
                    </a>
                </li>
                <?php
                getbrands();
                ?>

                <li class="nav-item bg-info">
                    <a href="#" class="nav-link">
                        <h4>Categories</h4>
                    </a>
                </li>

                <?php
                getcategory();
                ?>
            </ul>
        </div>

    </div>
</div>