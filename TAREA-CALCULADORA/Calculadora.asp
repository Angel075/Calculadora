<%@ Language=VBScript %>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora</title>
</head>
<body>
    <div align="center">
        <form name="Calculadora" method="post">
            <input type="number" name="numero1" min="1" max="99" required>
            <select name="operacion">
                <option value="">Seleccionar operación</option>
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicación</option>
                <option value="division">División</option>
            </select>
            <input type="number" name="numero2" min="1" max="99" required>
            <input type="submit" value="Calcular" name="submitCalculadora">

            <% If Request.ServerVariables("REQUEST_METHOD") = "POST" Then
                Dim numero1, numero2, operacion, resultado

                numero1 = CInt(Request.Form("numero1"))
                numero2 = CInt(Request.Form("numero2"))
                operacion = Request.Form("operacion")
                resultado = 0

                If operacion <> "" Then
                    Select Case operacion
                        Case "suma"
                            resultado = numero1 + numero2
                        Case "resta"
                            resultado = numero1 - numero2
                        Case "multiplicacion"
                            resultado = numero1 * numero2
                        Case "division"
                            If numero2 <> 0 Then
                                resultado = numero1 / numero2
                            Else
                                resultado = "Error: División por cero"
                            End If
                    End Select

                    Response.Write "<h2>Resultado:</h2>"
                    Response.Write "<p>El resultado de la " & operacion & " entre " & numero1 & " y " & numero2 & " es: " & resultado & "</p>"
                End If
            End If %>
        </form>
    </div>
</body>
</html>