<div class="welcome-container">
    <div class="welcome-content">
        <h1>✨ Welcome to <span>Trend-Aura</span> Shopping Portal! ✨</h1>
        <p>Discover the latest trends, styles, and exclusive collections.</p>
        <button class="explore-btn" onclick="window.location.href='index.php'">Explore Now</button>
    </div>
</div>

<style>
    .welcome-container {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 50vh;
        background: linear-gradient(135deg, #ff9800, #ff5722);
        color: white;
        padding: 50px 20px;
        border-radius: 15px;
        box-shadow: 0 10px 20px hsla(0, 0.00%, 0.00%, 0.20);
        animation: fadeIn 1.2s ease-in-out;
    }

    .welcome-content h1 {
        font-size: 2.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
    }

    .welcome-content h1 span {
        color: #ffeb3b;
        font-style: italic;
    }

    .welcome-content p {
        font-size: 1.2rem;
        margin-top: 10px;
        font-weight: 500;
    }

    .explore-btn {
        margin-top: 20px;
        padding: 12px 24px;
        font-size: 1rem;
        font-weight: bold;
        color: #ff5722;
        background-color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .explore-btn:hover {
        background-color: #ffeb3b;
        color: #222;
        transform: scale(1.05);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
