<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Selection</title>
    <script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }
        .buttons {
            margin-top: 15px;
        }
        button {
            padding: 10px;
            margin: 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .male-btn { background-color: #3498db; color: white; }
        .female-btn { background-color: #e74c3c; color: white; }
        .confirm-btn { background-color: #2ecc71; color: white; display: none; }

        .whatsapp-icon {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 60px;
            height: 60px;
            z-index: 10;
            background-color: #25D366;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        .whatsapp-icon img { width: 40px; height: 40px; }

        .chatbot-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            z-index: 10;
            background: linear-gradient(135deg, #ff9800, #ff5722);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 22px;
            font-weight: bold;
            cursor: pointer;
        }

        #chatbotModal {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 320px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .chatbot-header {
            background: #ff9800;
            color: white;
            padding: 10px;
            font-size: 16px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            position: relative;
        }
        .chatbot-close {
            position: absolute;
            right: 10px;
            top: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .chatbot-body {
            padding: 10px;
            height: 250px;
            overflow-y: auto;
        }
        .faq-list p {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div id="genderModal" class="modal">
        <div class="modal-content">
            <h2>Select Your Gender</h2>
            <div class="buttons">
                <button class="male-btn" onclick="selectGender('Male')">Male</button>
                <button class="female-btn" onclick="selectGender('Female')">Female</button>
            </div>
            <p id="selectedGender"></p>
            <button id="confirmBtn" class="confirm-btn" onclick="confirmSelection()">Confirm</button>
        </div>
    </div>
    
    <a href="https://wa.me/+918320302612" target="_blank" class="whatsapp-icon">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>

    <div class="chatbot-btn" onclick="toggleChatbot()">💬</div>

    <div id="chatbotModal">
        <div class="chatbot-header"> Chatbot / FAQ <span class="chatbot-close" onclick="toggleChatbot()">✖</span></div>
        <div class="chatbot-body" id="chatMessages">
            <p><strong>Chatbot:</strong> Hi! How can I help you?</p>
            <div class="faq-list">
                <p onclick="sendFAQ('What are your store hours?')">📌 What are your store hours?</p>
                <p onclick="sendFAQ('Do you offer free shipping?')">📌 Do you offer free shipping?</p>
                <p onclick="sendFAQ('What is your return policy?')">📌 What is your return policy?</p>
                <p onclick="sendFAQ('How can I return a product?')">📌 How can I return a product?</p>
                <p onclick="sendFAQ('What payment methods do you accept?')">📌 What payment methods do you accept?</p>
                <p onclick="sendFAQ('Do you have a size guide?')">📌 Do you have a size guide?</p>
                <p onclick="sendFAQ('How long does delivery take?')">📌 How long does delivery take?</p>
                <p onclick="sendFAQ('Can I track my order?')">📌 Can I track my order?</p>
            </div>
        </div>
    </div>

    <script>
        function toggleChatbot() {
            let chatbot = document.getElementById("chatbotModal");
            chatbot.style.display = chatbot.style.display === "block" ? "none" : "block";
        }

        function sendFAQ(question) {
            let answers = {
                "What are your store hours?": "Our store is open from 9 AM to 9 PM.",
                "Do you offer free shipping?": "Yes, we offer free shipping on orders over $50.",
                "What is your return policy?": "You can return items within 30 days of purchase.",
                "How can I return a product?": "You can initiate a return by contacting customer support.",
                "What payment methods do you accept?": "We accept credit cards, PayPal, and bank transfers.",
                "Do you have a size guide?": "Yes, you can find our size guide on the product page.",
                "How long does delivery take?": "Delivery takes 3-7 business days depending on location.",
                "Can I track my order?": "Yes, we provide tracking details once your order is shipped."
            };
            document.getElementById("chatMessages").innerHTML += `<p><strong>You:</strong> ${question}</p><p><strong>Bot:</strong> ${answers[question]}</p>`;
        }
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Check if gender is already selected in sessionStorage
        let selectedGender = sessionStorage.getItem("selectedGender");
        if (!selectedGender) {
            document.getElementById("genderModal").style.display = "flex";
        }
    });

    function selectGender(gender) {
        document.getElementById("selectedGender").innerText = `Selected: ${gender}`;
        document.getElementById("confirmBtn").style.display = "inline-block";
        sessionStorage.setItem("selectedGender", gender); // Store gender in sessionStorage
    }

    function confirmSelection() {
        document.getElementById("genderModal").style.display = "none";
    }
</script>


</body>
</html>
