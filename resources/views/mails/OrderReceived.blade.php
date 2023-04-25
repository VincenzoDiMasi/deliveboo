<!DOCTYPE html>
<html>

<head>
    <title>Nuova richiesta in arrivo</title>
</head>

<body>


    <div style="background-color: #F0F4F8; padding: 20px;">
        <h1 class="text-center"
            style="color: #2E3A48; text-align: center; font-size: 28px; font-family: Arial, sans-serif;">Ciao
            {{ $restaurant->user->name }} hai appena ricevuto un nuovo ordine!</h1>
        <hr style="border: none; border-top: 2px solid #C9D5E2; margin: 20px 0;">
        <p
            style="color: #2E3A48; font-size: 16px; font-weight: bolder; text-align: center; font-family: Arial, sans-serif;">
            DATI DELL'ORDINE:
        </p>
        <ul
            style="color: #2E3A48; font-size: 16px; font-family: Arial, sans-serif; list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 10px; text-transform: capitalize;">
                <strong style="text-transform: capitalize;">Nome:</strong> {{ $order->first_name }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Cognome:</strong> {{ $order->last_name }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Email:</strong> {{ $order->email }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Indirizzo:</strong> {{ $order->address }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Telefono:</strong> {{ $order->phone }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Orario di consegna:</strong> {{ $order->delivery_time }}
            </li>
        </ul>
        <a href="{{ $order_link }}">Visualizza dettagli</a>
    </div>
</body>

</html>
