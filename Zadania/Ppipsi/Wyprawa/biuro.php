<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podróże dalekie i bliskie</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <h1>Biuro podróży: WESOŁA WYPRAWA</h1>
    </header>

    
    <section class="ciasteczka">
        <?php
            if(isset($_COOKIE['ciastko'])) {
                echo "<p>Witaj ponownie na naszej stronie</p>";
            } else {
                setcookie("ciastko", "1", time()+3600, "/");
                echo "<p>Witaj! Nasza strona używa ciasteczek</p>";
            }
        ?>
    </section>
    
    <section class="blok-lewy">
        <table>
            <tr>
                <td><img src="polska.jpg" alt="zwiedzanie Wrocławia"></td>
                <td><img src="wlochy.jpg" alt="Wenecja i nie tylko"></td>
            </tr>
            <tr>
                <td><img src="grecja.jpg" alt="gorące Greckie wyspy"></td>
                <td><img src="hiszpania.jpg" alt="Słoneczna Barcelona"></td>
            </tr>
        </table>
    </section>
    
    <section class="blok-prawy">
        <h3>Proponujemy wycieczki</h3>
        <ul>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Consectetur adipiscing elit</li>
            <ol>
                <li>Nullam at risus vel eros</li>
                <li>Sed finibus lectus ut lectus</li>
            </ol>
            <li>Integer nec libero nec ligula consequat pulvinar</li>
        </ul>
        
        <h3>Pobierz dokumenty</h3>
        <p><a href="regulamin.txt">Regulamin korzystania z usług biura podróży</a></p>
        <p><a href="https://www.polska.travel/" target="_blank">Tu znajdziesz zdjęcia z naszych wycieczek</a></p>
    </section>
    
    <footer>
        Stronę przygotował 26
    </footer>
</body>
</html>
