function displayImage() {
    var fileInput = document.getElementById('flowerImage');
    var fileNameContainer = document.getElementById('fileName');
    var imageContainer = document.querySelector('.image-container');
    var recognizeButton = document.getElementById('recognizeButton');

    var file = fileInput.files[0];

    if (file) {
        fileNameContainer.textContent = file.name;

        var reader = new FileReader();
        reader.onload = function (e) {
            imageContainer.style.display = 'block';
            recognizeButton.style.display = 'block';
            updateCard(file.name, e.target.result);
        };

        reader.readAsDataURL(file);
    } else {
        fileNameContainer.textContent = 'No se ha seleccionado archivo';
        imageContainer.style.display = 'none';
        recognizeButton.style.display = 'none';
    }
}

function recognizeImage() {
    var formData = new FormData();
    formData.append('imagen', document.getElementById('flowerImage').files[0]);

    $.ajax({
        url: 'http://localhost:5001/prediccion_modelo',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.prediccion === 'SUNFLOWER' || response.prediccion === 'ROSE' || response.prediccion === 'DAISY') {
                updateCard(response.prediccion, document.getElementById('flowerImage').files[0]);
            } else {
                alert('An error has occurred!');
            }
        },
        error: function (error) {
            alert('Error al realizar la predicción.');
        }
    });
}

function updateCard(flowerName, userImage) {
    var cardContainer = document.getElementById('userCardContainer');
    cardContainer.innerHTML = '';

    var card = document.createElement('div');
    card.className = 'card user-card';

    var cardImage = document.createElement('div');
    cardImage.className = 'card-image';

    var figure = document.createElement('figure');
    figure.className = 'image is-4by3';

    var img = document.createElement('img');
    img.src = URL.createObjectURL(userImage);
    img.alt = 'Imagen del usuario';

    var cardContent = document.createElement('div');
    cardContent.className = 'card-content';

    var title = document.createElement('p');
    title.className = 'title is-4';
    title.textContent = flowerName;

    // DOM Elements Organization
    figure.appendChild(img);
    cardImage.appendChild(figure);
    card.appendChild(cardImage);
    cardContent.appendChild(title);
    card.appendChild(cardContent);

    // Card Container Join
    cardContainer.appendChild(card);
}
