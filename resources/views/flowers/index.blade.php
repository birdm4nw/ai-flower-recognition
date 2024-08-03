<!DOCTYPE html>
<html lang="es">
<head>
    <title>Flowers</title>
    <!-- Bulma Framework - Import -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        body {
            background: url('{{ asset('images/background.jpg') }}') no-repeat center center fixed; 
            background-size: cover;
        }

        .flower-image {
            max-width: 100%;
            height: auto;
        }

        .section.is-vcentered {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <section class="hero is-black">
        <div class="container">
            <h1 class="title is-size-2 my-3">
                Classification - Flowers of the model
            </h1>
        </div>
    </section>

    <!-- Main -->
    <section class="section is-vcentered">
        <div class="container">
            <div class="columns is-multiline mx-4 my-4">
                <?php foreach ($flowers as $flower): ?>
                    <div class="column is-one-third">
                        <div class="box">
                            <div class="content">
                                <img src="{{ asset('images/' . $flower->img_path) }}" alt="{{ $flower->name }}" class="flower-image">
                                <h2 class="subtitle mt-3">{{ $flower->name }}</h2>
                                <p>{{ $flower->description }}</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>
</html>
