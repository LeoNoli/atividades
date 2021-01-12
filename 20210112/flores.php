<DOCTYPE html>

<html lang="pt-BR">

    <head>
        <title>Acessibilidade</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css.css" />
        <script>
            window.onload = function() {
                var elementBody = document.querySelector('body');
                var elementBtnIncreaseFont = document.getElementById('increase-font');
                var elementBtnDecreaseFont = document.getElementById('decrease-font');
                
                var fontSize = 100;
               
                var increaseDecrease = 10;

               
                elementBtnIncreaseFont.addEventListener('click', function(event) {
                    fontSize = fontSize + increaseDecrease;
                    elementBody.style.fontSize = fontSize + '%';
                });

                
                elementBtnDecreaseFont.addEventListener('click', function(event) {
                    fontSize = fontSize - increaseDecrease;
                    elementBody.style.fontSize = fontSize + '%';
                });
            }
        </script>
    </head>

    <body>
        <div class="container">

            <div class="btn-container">
                <button name="increase-font" id="increase-font" title="Aumentar fonte">A +</button>
                <button name="decrease-font" id="decrease-font" title="Diminuir fonte">A -</button>
            </div>

            <header>
                <h1>FLORES</h1>
            </header>

            <div class="flex-container">

            <nav>
                <ul class="list">
                    <li class="menuitem"><a href="#">ESPECIES</a></li>
                    <li class="menuitem"><a href="#">CORES</a></li>
                    <li class="menuitem"><a href="#">ESTAÇÕES</a></li>
                </ul>
            </nav>

            <main>
                <h2> SOBRE AS FLORES </h2>
                <p class="aling">
                A flor nada mais é do que o órgão reprodutivo das plantas do tipo angiospérmicas. Digamos que ela contém as estruturas reprodutivas das plantas cuja função é produzir sementes. A menor flor do mundo é a da Galinsoga parviflora – uma espécie de erva daninha –, com 1 milímetro de comprimento e 0,3 milímetros de largura
                </p>
                <p class="aling">
                A planta que leva mais tempo para florir é a Corypha umbraculifera, uma espécie de palmeira hermafrodita do Sri Lanka, cuja florada ocorre a cada 80 anos.

                Existem mais de 50.000 espécies de orquídeas, só no Brasil são mais de 3.500 espécies.

                Você sabia que a baunilha é extraída de uma orquídea do gênero Vanilla? E que é por isso que baunilha é chamada de vanila em alguns países?

                Sabia que foram encontrados fósseis de rosas de mais de 25 milhões de anos? As rosas, portanto, podem ser mais antigas do que a espécie humana.
                </p>
                <p class="aling">
                Os romanos gostavam tanto de rosas que utilizavam esse tipo de flor em quase todas as suas cerimônias, diz-se que plantavam mais rosas do que alimentos.
                </p>
                <img src="flores.jpg" alt="Imagem ilustrativa flores" />
            </main>


        </div>
    </body>

</html>