<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="background-color: #f7f7f7; padding: 40px;">
            <table cellpadding="0" cellspacing="0" width="100%" style="background-color: #fff; border-radius: 10px;">
                <tr>
                    <td style="padding: 40px;">
                        <h2 style="color: #39827c;">¡Hola {{ $mailData[0]->user_first_name }} {{ $mailData[0]->user_last_name }}!</h2>

                        <p style="color: #555;">Gracias por aplicar a la vacante de trabajo "{{ $mailData[1]->title }}". Tu aplicación ha sido recibida y se revisará en breve.</p>

                        <p style="color: #555;">Te felicitamos por tomar el primer paso hacia esta emocionante oportunidad de carrera. Esperamos conocer más sobre ti en el proceso de selección.</p>

                        <p style="color: #555;">Si tienes alguna pregunta o inquietud sobre tu aplicación, no dudes en ponerte en contacto con nosotros.</p>

                        <p style="color: #555;">Atentamente,</p>
                        <p style="color: #555;">El equipo de Experientya</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>