from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from tensorflow.keras.models import load_model
from keras.preprocessing import image
import numpy as np
import io

app = Flask(__name__)
CORS(app)

# Loading Trained Model
model = load_model('flowers_recognition_model.h5')

def process_image(file):
    content = file.read()

    # Image Preprocessing
    img = image.img_to_array(image.load_img(io.BytesIO(content), target_size=(180, 180))) 
    print("\n\nIMG -> ", img, "\n\n")
    print("&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&")
    x = np.expand_dims(img, axis=0)
    print("\n\nTest_img: ", x)

    return x

@app.route('/prediccion_modelo', methods=['POST'])
@cross_origin(origin='http://127.0.0.1:8000', headers=['Content-Type', 'Authorization'])
def prediction_model():
    if 'imagen' not in request.files:
        return jsonify({'error': 'No se ha proporcionado ninguna imagen'})

    file = request.files['imagen'].stream
    image = process_image(file)

    # Making Prediction
    resultado = model.predict(image)
    pred = np.argmax(resultado)  

    print("\n\nResultado predicción: ", resultado)
    print("Predicción: ", pred)

    # Mapping Classes
    clases = {0: 'DAISY', 1: 'ROSE', 2: 'SUNFLOWER'}
    prediction = clases.get(pred, 'Desconocido')
    print("Flor: ", prediction, "\n\n")

    return jsonify({'prediccion': prediction})

if __name__ == '__main__':
    app.run(debug=True, port=5001)

