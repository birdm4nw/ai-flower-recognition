<!DOCTYPE html>
<html lang="es">
<head>
    <title>Flores</title> 
    <!-- Front-end Framework [Bulma] -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="">

<!-- Header -->
<section class="hero is-black">
    <div class="container">
        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title is-size-2 my-3">
                    RecogFlower
                </h1>
            </div>
            <div class="column">
                <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-start">
                            <!-- Este div vacío se utiliza para empujar los elementos a la derecha -->
                        </div>
                        <div class="navbar-end">
                            <a class="navbar-item" href="#inicio">
                                Main
                            </a>
                            <a class="navbar-item" href="#clasificacion">
                                Classification
                            </a>
                            <a class="navbar-item" href="#prueba">
                                Playground
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>



<!-- Main -->
<!-- Inicio -->
<section class="hero is-fullheight" style="background-image: url('/images/back_main.jpg'); background-size: cover; background-position: center;" id="inicio">
    <div class="hero-body">
        <div class="container has-text-centered is-rounded">
            <div class="card">
                <div class="card-content">
                    <h1 class="title is-size-1 pb-4">Flowers Recognition</h1>
                    <p class="subtitle is-size-4">RecogFlower is a web application that allows the user to identify the class or type of a flower based on three previously established classes. This application makes use of an artificial intelligence model already trained to predict the type of flower the user enters through an image.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clasificación -->
<section class="hero is-black" id="clasificacion">
    <div class="my-4">
        <div class="container">
            <h1 class="title is-size-1">Recognition Model</h1>
        </div>
    </div>
</section>
<section class="section has-background-success">
    
    <div class="container">
        <div class="columns is-multiline" id="cardContainer">
            <div class="column is-one-third">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{ asset('images/margarita.jpg') }}" alt="margarita">
                        </figure>
                    </div>
                    <div class="card-content">
                        <p class="title is-4">Daisy</p>
                    </div>
                </div>
            </div>

            <div class="column is-one-third">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{ asset('images/rosa.jpg') }}" alt="rosa">
                        </figure>
                    </div>
                    <div class="card-content">
                        <p class="title is-4">Rose</p>
                    </div>
                </div>
            </div>

            <div class="column is-one-third">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{ asset('images/girasol.jpg') }}" alt="girasol">
                        </figure>
                    </div>
                    <div class="card-content">
                        <p class="title is-4">Sunflower</p>
                    </div>
                </div>
            </div>

            <div class="column is-full has-text-centered mt-4">
                <a href="{{ url('/flowers') }}" class="button is-black has-text-weight-bold is-size-4 is-rounded">Classification</a>
            </div>
        </div>
    </div>
</section>

<!-- File Upload -->
<section class="hero is-black" id="prueba">
    <div class="my-4">
        <div class="container">
            <h1 class="title is-size-1">Recognition Model</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container" id="uploadContainer">
        <div class="columns is-vcentered">
            <div class="column is-two-thirds">
                <form action="#" method="post" enctype="multipart/form-data" id="uploadForm">
                    <div class="file is-boxed has-name">
                        <label class="file-label">
                            <input class="file-input" type="file" name="flowerImage" id="flowerImage" accept=".png, .jpg, .jpeg" onchange="displayImage()">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Select an image
                                </span>
                            </span>
                            <span class="file-name" id="fileName">
                                Not selection yet
                            </span>
                        </label>
                    </div>
                </form>
            </div>

            <div class="column">
                <div class="columns is-vcentered">
                    <div class="column image-container" style="display: none;"></div>
                </div>

                <div class="mt-4 has-text-centered">
                    <button class="button is-black" id="recognizeButton" onclick="recognizeImage()" style="display: none;">Analyze</button>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Output Card Prediction-->
<section class="section" id="userCardContainer">
</section>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Main.js -->
<script src="{{ asset('js/main-script.js') }}"></script>
</body>
</html>

