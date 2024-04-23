<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt&display=swap');

        * {
            font-family: 'Prompt', sans-serif;
        }

        .footer {
            position: absolute;
            top: 100%;
            left: 0%;
            height: fit-content;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            color: black;
            margin-left: 80px;

        }

        .team {
            z-index: 10;
            gap: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            cursor: default;
            color: black;
            padding: 20px 10px;
        }

        .team span:nth-child(1)::after {
            content: "";
            display: block;
            height: 3px;
            width: 50%;
            background-color: black;
            margin-top: 4px;
        }

        .contact {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: black;
            padding: 30px;
        }

        .contact ul {
            list-style: none;
            display: flex;
            height: 30px;
            /* margin-left: -40px; */
            color: black;
            gap: 10px;
            align-items: center;
        }

        .contact ul li>iconify-icon {
            font-size: 22px;
            transition: .2s transform ease;
        }

        .contact ul li>iconify-icon:hover {
            color: orange;
        }

        @media only screen and (max-width:520px) {
            .footer {
                height: fit-content;
                flex-direction: column;
                justify-content: space-evenly;
                padding: 20px;
                align-items: flex-start;
                color: black\========================================================================================================================================================================================================================zzzzzzzzzzzz   ;
                position: relative;
            }
            .team ,.contact, .contact ul{
                align-items: flex-start;
            }
        }
    </style>

</head>

<body>
    <footer class="footer">
        <div class="team">
            <span>Designed and Developed by</span>
            <h5>P. V. Kole (Lecturer in IT),
                <br>
                Sharvari Chougale (216012),
                <br>
                Shrutika Babhulkar (216003),
                <br>
                Vaishnavi Bongale (216006)
            </h5>

            <span>Information Technology</span>
        </div>
        <div class="rights"><span>All rights reserved to Department of Information Technology</span></div>
        <div class="contact">
            <h4>Contact :</h4>
            <ul>
                <li><iconify-icon icon="ri:whatsapp-fill"></iconify-icon></li>
                <li><iconify-icon icon="ri:phone-fill"></iconify-icon></li>
                <li><iconify-icon icon="ri:mail-fill"></iconify-icon></li>
            </ul>
        </div>

    </footer>

</body>

</html>