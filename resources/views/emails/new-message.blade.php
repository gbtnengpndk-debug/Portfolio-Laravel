<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Baru</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">

    <h2>📩 Pesan Baru dari Portfolio</h2>

    <p>
        Kamu menerima pesan baru dari contact form portfolio.
    </p>

    <hr>

    <p>
        <strong>Nama:</strong><br>
        {{ $contactMessage->name }}
    </p>

    <p>
        <strong>Email:</strong><br>
        {{ $contactMessage->email }}
    </p>

    @if ($contactMessage->subject)
        <p>
            <strong>Subject:</strong><br>
            {{ $contactMessage->subject }}
        </p>
    @endif

    <p>
        <strong>Pesan:</strong><br>
        {{ $contactMessage->message }}
    </p>

    <hr>

    <p>
        Pesan dikirim pada:
        {{ $contactMessage->created_at->format('d M Y, H:i') }}
    </p>

</body>
</html>