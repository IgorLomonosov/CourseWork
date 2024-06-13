<?php
$this->Title = 'Помилка 404'
?>
<style>
    .container {
        text-align: center;
    }

    .tv {
        width: 100px;
        height: 80px;
        border: 2px solid #ccc;
        border-radius: 5px;
        margin: 0 auto 20px;
        position: relative;
    }

    .tv::before {
        content: '';
        width: 15px;
        height: 2px;
        background-color: #ccc;
        position: absolute;
        top: 10px;
        left: 45px;
        transform: rotate(45deg);
    }

    .tv::after {
        content: '';
        width: 15px;
        height: 2px;
        background-color: #ccc;
        position: absolute;
        top: 10px;
        right: 45px;
        transform: rotate(-45deg);
    }

    .screen {
        width: 80px;
        height: 60px;
        border-radius: 5px;
        background-color: #ddd;
        position: absolute;
        top: 10px;
        left: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .screen .sad-face {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #fff;
        border: 2px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .screen .sad-face::before {
        content: '';
        width: 10px;
        height: 2px;
        background-color: #ccc;
        position: absolute;
        top: 50%;
        left: 35%;
        transform: translateY(-50%);
    }

    .screen .sad-face::after {
        content: '';
        width: 10px;
        height: 2px;
        background-color: #ccc;
        position: absolute;
        top: 50%;
        right: 35%;
        transform: translateY(-50%);
    }

    .screen .sad-face .mouth {
        width: 15px;
        height: 5px;
        background-color: #ccc;
        border-radius: 5px;
        position: absolute;
        bottom: 5px;
        left: 50%;
        transform: translateX(-50%);
    }

    h1 {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    p {
        font-size: 1.2rem;
        color: #555;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #0062cc;
    }
</style>

<div class="container">
    <div class="tv">
        <div class="screen">
            <div class="sad-face">
                <div class="mouth"></div>
            </div>
        </div>
    </div>
    <h1>Вибачте, але сторінку не знайдено</h1>
    <p>Скоріш за все, ця сторінка була переміщена або вилучена.</p>
    <p>Можливо, Ви помилилися при вводі адреси. Перевірте її, будь ласка, ще раз.</p>
    <a href="/" class="button">НА ГОЛОВНУ</a>
</div>