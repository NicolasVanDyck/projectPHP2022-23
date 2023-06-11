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
    <p>Uit veiligheidsoverwegingen heeft u nog geen paswoord gekregen
        en moet u een paswoord aanmaken via
        <a href="{{route('password.request')}}">deze link</a> alvorens u kan inloggen:
    </p>
    <br/>
    <p>Met vriendelijke groeten,</p>
    <p>De Wezeldrivers</p>

    </body>
    </html>
</DOCTYPE>