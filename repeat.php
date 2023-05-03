<html>

<head>
    <style>
        .nav-item {
            background-color: #3F69AA;
        }

        h4 {
            background-color: white;
            color: #3F69AA;
            border-radius: 400px;
            width: 80%;
            /*
            align-items: center;
            justify-content: center;
            display: flex; */
        }

        .a123 {
            color: #3F69AA;
        }

        /* li:hover {
            background-color: white;
        } */
    </style>
</head>

<div class="col-md-2 p-0 ">
    <ul class="navbar-nav me-auto text-center ">

        <li class="nav-item a123"> acax</li>
        <li class="nav-item">
            <!-- <a href="#" class="nav-link"> -->
            <center>
                <h4>Brands</h4>
            </center>
        </li>

        <!-- </a> -->
        </li>
        <?php
        getbrands();
        ?>
        <li class="nav-item a123"> acax</li>

        <li class="nav-item">
            <center>
                <h4>Categories</h4>
            </center>
        </li>
        </li>
        <?php
        getcategory();
        ?>
    </ul>


</div>
</div>

</html>