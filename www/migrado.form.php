<div class=container>
    <div class="ticket-creation">
        <div id=suggestions class='hidden'>
            <h2>Perguntas frequentes</h2>
            <p>Confira se sua dúvida já não foi respondida anteriormente:</p>
            <p><span id="txtHint"></span></p>
        </div>

        <form action="action.php" method="post">
            <!-- <p>título: <input type="text" name="title" onkeyup="showHint(this.value)"/></p>
            <p>descrição: <input type="text" name="additional_description" /></p>
            <p><input type="submit" /></p>
    -->
            <div class="fields">
                <label class="field a-field a-field_a2">
                    <input name="title" class="field__input a-field__input" onkeyup="showHint(this.value)" placeholder="Ex. Problemas na entrega" required>
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


            <!-- <p>descrição: <input type="text" name="additional_description" /></p> -->
            
            <div class=submit-btn>
                <p><input type="submit" value='Enviar'/></p>
            </div>



            <!-- <p><b>Start typing a name in the input field below:</b></p>
            <form>
            First name: <input type="text" onkeyup="showHint(this.value)">
            </form> -->
            


    <!-- 

            <label class="field a-field a-field_a3">
                <input onkeyup="showHint(this.value)" class="field__input a-field__input" placeholder="e.g. melnik909@ya.ru" required>
                <span class="a-field__label-wrap">
                <span class="a-field__label">E-mail</span>
                </span>
            </label> -->








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
            xmlhttp.open("GET", "gethint.php?q=" + str, true);
            xmlhttp.send();
        }
        }
        </script>
</div>
