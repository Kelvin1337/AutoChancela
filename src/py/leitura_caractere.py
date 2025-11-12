import cv2
import pytesseract
import numpy as np

# Caminho para o executável do Tesseract
pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'

# Inicializa webcam
cap = cv2.VideoCapture(0, cv2.CAP_DSHOW)

while True:
    ret, frame = cap.read()
    if not ret:
        break

    frame = cv2.resize(frame, (640, 480))
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

    # Pré-processamento com CLAHE
    clahe = cv2.createCLAHE(clipLimit=2.0, tileGridSize=(8,8))
    gray = clahe.apply(gray)

    # Threshold adaptativo para destacar caracteres
    _, thresh = cv2.threshold(gray, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)

    # Detecta possíveis regiões de placas (retângulos grandes)
    contours, _ = cv2.findContours(thresh, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)
    for cnt in contours:
        x, y, w, h = cv2.boundingRect(cnt)
        ratio = w / h
        if 2 < ratio < 6 and cv2.contourArea(cnt) > 2000:  # proporção e área típicas de placa
            placa = gray[y:y+h, x:x+w]
            # Aumenta a resolução para melhorar OCR
            placa = cv2.resize(placa, None, fx=2, fy=2, interpolation=cv2.INTER_CUBIC)
            _, placa = cv2.threshold(placa, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)

            # OCR otimizado
            config = r'--oem 3 --psm 7 -c tessedit_char_whitelist=ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'
            texto = pytesseract.image_to_string(placa, config=config).strip()

            if len(texto) >= 5:  # filtra resultados curtos
                print("Placa detectada:", texto)
                cv2.putText(frame, texto, (x, y-10), cv2.FONT_HERSHEY_SIMPLEX, 0.9, (0,255,0), 2)

            # Mostra a placa isolada
            cv2.imshow("Placa isolada", placa)
            cv2.rectangle(frame, (x, y), (x+w, y+h), (0,255,0), 2)

    # Exibe frame principal
    cv2.imshow("Leitura de Placas", frame)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()
