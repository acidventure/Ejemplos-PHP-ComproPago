<?php

    /*
    * Agrega la URL donde se encuentre el webhook en:
    *      https://compropago.com/panel/webhooks 
    *
    * Este webhook ayuda a recibir la notificación para el caso en que
    * un pago haya sido generado o confirmado
    * 
    * Para más información visitar: https://compropago.com/documentacion/webhooks
    */

    // Capturando el objeto JSON
    $body = @file_get_contents('php://input'); 

    // Decodificando el objeto JSON
    $event_json = json_decode($body);          

    // Imprimiendo la respuesta, para probarlo (Para probar el webhook ir a: https://compropago.com/panel/webhooks) 
    echo $event_json->data->object->{'id'}.'<br>';
    echo $event_json->{'type'}.'<br>';
    echo $event_json->data->object->payment_details->{'product_id'}.'<br>';
    echo $event_json->data->object->payment_details->{'store'}.'<br>';
    echo $event_json->data->object->payment_details->{'product_price'}.'<br>';
    echo $event_json->data->object->payment_details->{'product_name'}.'<br>';
    echo $event_json->data->object->payment_details->{'customer_name'}.'<br>';
    echo $event_json->data->object->payment_details->{'customer_email'}.'<br>';

    // Almacenando los valores del JSON 
    $status = $event_json->{'type'};
    $product_id = $event_json->data->object->payment_details->{'product_id'};
    $store = $event_json->data->object->payment_details->{'store'};
    $product_price = $event_json->data->object->payment_details->{'product_price'};
    $product_name = $event_json->data->object->payment_details->{'product_name'};
    $customer_name = $event_json->data->object->payment_details->{'customer_name'};
    $customer_email = $event_json->data->object->payment_details->{'customer_email'}; 
    
    /* Objeto JSON que se envia  
    {
        "type": "charge.success",
        "object": "event",
        "data": {
            "object": {
                "id": "ch_00000-000-0000-000000",
                "object": "charge",
                "created": "2013-09-19T05:32:00.427Z",
                "paid": true,
                "amount": "12.00",
                "currency": "mxn",
                "refunded": false,
                "fee": "3.35",
                "fee_details": [{
                    "amount": "3.35",
                    "currency": "mxn",
                    "type": "compropago_fee",
                    "description": "Honorarios de ComproPago",
                    "application": null,
                    "amount_refunded": 0
                }],
                "payment_details": [{
                    "object": "cash",
                    "store": "Oxxo",
                    "country": "MX",
                    "product_id": "test_12",
                    "product_price": "12.00",
                    "product_name": "Chocolate",
                    "image_url": "http://upload.wikimedia.org/wikipedia/commons/5/56/Chocolate_cupcakes.jpg",
                    "success_url": "http://example.com/success",
                    "failded_url": "http://example.com/failed",
                    "customer_name": "Francisco Ortiz",
                    "customer_email": "francisco@example.com",
                    "customer_phone": "5555555555"
                }],
                "captured": true,
                "failure_message": null,
                "failure_code": null,
                "amount_refunded": 0,
                "description": "Estado del pago - ComproPago",
                "dispute": null
            }
        }
    }
    */
?>