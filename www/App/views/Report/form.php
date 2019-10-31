<div class=container>
    <div class="ticket-creation">
        <div id=suggestions class='hidden'>
            <h2>Perguntas frequentes</h2>
            <p>Confira se sua dúvida já não foi respondida anteriormente:</p>
            <p><span id="txtHint"></span></p>
        </div>

        <form action="Report.php?action=create" method="post">
            <div class="fields">
                <label class="field a-field a-field_a2">
                    <input name="title" class="field__input a-field__input" onkeyup="showHint(this.value)" placeholder="Dica: inicie com 'Como...' para testar as sugestões" required>
                    <span class="a-field__label-wrap">
                    <span class="a-field__label">Assunto</span>
                    </span>
                </label>
                <label class="field a-field a-field_a2">
                    <input name="additional_description" class="field__input a-field__input" placeholder="Forneça maiores detalhes ou passos para se repetir o problema" required>
                    <span class="a-field__label-wrap">
                    <span class="a-field__label">Descrição do problema</span>
                    </span>
                </label>
            </div>
            <div class=submit-btn>
                <p><input type="submit" value='Enviar'/></p>
            </div>
        </form>
    </div>

    <script>
        function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            document.getElementById("suggestions").classList.add('hidden');
            document.getElementById("suggestions").classList.remove('visible');
            
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'no suggestion') {
                    document.getElementById("txtHint").innerHTML = "";
                    document.getElementById("suggestions").classList.add('hidden');
                    document.getElementById("suggestions").classList.remove('visible');
                }
                else {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                    document.getElementById("suggestions").classList.remove('hidden');
                    document.getElementById("suggestions").classList.add('visible');
                }
            }
            };
            xmlhttp.open("GET", "../services/GetSuggestions.php?text=" + str, true);
            xmlhttp.send();
        }
        }
        </script>
</div>
