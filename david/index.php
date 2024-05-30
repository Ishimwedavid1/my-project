<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <style>
        .link {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
        }

        .link a {
            position: relative;
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            margin: 0 5px;
            margin-top: 30px;

        }

        .link a:hover {
            background-color: #f2f2f2;
            border-radius: 5px;
            color: black;
        }

        nav {
            background-color: #007bff;
            color: #fff;
            padding: none;
        }


        img {
            position: absolute;
            height: 60px;
            width: 60px;
            font-size: 25px;
            border-radius: 30px;
        }

        .w {
            position: absolute;
            margin-left: 30px;
            margin-top: 40px;
            font-family: italic;
        }

        span {

            color: gold;
            font-size: 25px;

        }

        p {
            position: absolute;
            top: 40%;
            left: 30%;
            font-size: large;
            padding: 50px;
            margin: 20px;
        }


        h2 {

            margin-bottom: 20px;
            margin-top: 62px;
            text-align: center;

        }

        h1 {
            margin-bottom: 20px;
            margin-top: 30px;
            text-align: center;
        }

        footer {
            background: #007bff;
            width: 99%;
            height: 30px;
            padding: 12px;
            text-align: center;

        }

        ul {
            position: relative;
            top: 4%;
        }
    </style>
</head>

<body>
    <img src="./image1.png">
    <div class="w"><span>Xwisdom_</span>TVET</div>
    <nav><br>
        <div class="link">
            <a href="./index.php">Home</a>
            <a href="./trainees.php">Trainees</a>
            <a href="./trade.php">Trades</a>
            <a href="./mark.php">Marks</a>
            <a href="./report.php">Report</a>
            <a href="logout.php">logout</a>
        </div><br><br>
    </nav>
    <h1>Welcome to Xwisdom_Tvet School</h1>

    <h2>Our mission</h2>
    <p>
        At Xwisdom_TVET School, we offer a diverse range of programs designed to meet <br>
        the evolving needs of industry and society. From technical trades to professional<br>
        skills development, our curriculum is carefully crafted to blend theoretical <br>
        knowledge with hands-on experience, ensuring that our graduates are well-prepared <br>
        to succeed in today's competitive job market.
    </p>
    <ul>
        <h3>LOCATION</h3>
        <li>EASTERN PROVINCE</li>
        <li>BUGESERA DISTRICT</li>
        <li>NYAMATA SECTOR</li>
    </ul>
    <ul>
        <h3>TRADES</h3>
        <li>ICT </li>
        <li>FINANCE </li>
    </ul>
    <ul>
        <h3>CONTACT</h3>
        <li>email:Xwisdomtvet@gmail.com </li>
        <li>linkedin: Xwisdom_Tvet</li>
        <li>assistant phone:0798426939</li>
    </ul>
    <footer> &copy;2024 Xwisdom_TVET , all right. reserve</footer>
</body>

</html>