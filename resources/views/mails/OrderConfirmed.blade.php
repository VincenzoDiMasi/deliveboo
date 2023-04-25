<!DOCTYPE html>
<html>

<head>
    <title>Nuova richiesta in arrivo</title>
</head>

<body>
    <div style="background-color: #F0F4F8; padding: 20px;">
        <h1 class="text-center" style="color: #2E3A48; text-align: center; font-size: 28px; font-family: Arial, sans-serif;">Grazie {{$order->first_name}} per aver effettuato l'ordine!</h1>
        <hr style="border: none; border-top: 2px solid #C9D5E2; margin: 20px 0;">
        <p  style="color: #2E3A48; font-size: 16px; font-weight: bolder; text-align: center; font-family: Arial, sans-serif;">
            I TUOI DATI:
        </p>
        <ul
            style="color: #2E3A48; font-size: 16px; font-family: Arial, sans-serif; list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 10px; text-transform: capitalize;">
                <strong style="text-transform: capitalize;">Nome:</strong> {{$order->first_name}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Cognome:</strong> {{$order->last_name}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Email:</strong> {{$order->email}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Indirizzo:</strong> {{$order->address}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Telefono:</strong> {{$order->phone}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Orario di consegna:</strong> {{$order->delivery_time}}
            </li>
        </ul>
        <p style="color: #2E3A48;  text-align: center; font-weight: bolder; font-size: 16px; font-family: Arial, sans-serif;">
            DI SEGUITO IL TUO RIEPILOGO:
        </p>
        <ul
            style="color: #2E3A48; font-size: 16px; font-family: Arial, sans-serif; list-style: none; padding: 0; margin: 0;">
            @foreach ($dishes as $dish )
            <li style="margin-bottom: 10px; text-transform: capitalize;">     
                <p>
                    <strong>Nome:</strong> {{$dish['name']}}
                </p>  
                <p>
                    <strong>Prezzo:</strong> € {{$dish['price']}}
                </p> 
                <p>
                    <strong>Quantità:</strong> x{{$dish['quantity']}}
                </p>         
            </li>
            <hr>
            @endforeach
            <li style="margin-bottom: 10px;">
                <strong style="text-transform: capitalize;">Prezzo Totale:</strong> € {{$order->total_price}};
            </li>
        </ul>

    </div>
</body>

</html>