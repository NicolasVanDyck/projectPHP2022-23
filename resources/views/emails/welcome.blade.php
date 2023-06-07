<DOCTYPE html>
    <html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <p>Hallo {{ $naam }}! </p>
    <p>Welkom bij de Wezeldrivers!</p>
    <p>U werd zonet succesvol geregistreerd als nieuw lid van onze club!</p>
    <br/>
    <p>Uit veiligheidsoverwegingen vragen wij u om uw paswoord te wijzigen.</p>
    <p>Huidig paswoord: {{ $paswoord }}</p>
    <p>Vul je e-mailadres in via <a href="{{route('password.request')}}"> deze link</a> om uw paswoord te wijzigen.</p>
    <p>Of log in op de website en verander je paswoord via <a href="{{ route('profile.show') }}"> profiel </a>.</p>
    <br/>
    <p>Met vriendelijke groeten,</p>
    <p>De Wezeldrivers</p>

    </body>
    </html>
</DOCTYPE>