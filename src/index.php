<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma superbe interface</title>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- Bootstrap just for design -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Convension avec id app pour instancier vue -->
    <div id="app">
        <div class="container">
        
            <div class="row">
            <p class="jumbotron col-5 m-1">
                    <!--V-model : syncroniser input avec le data-->
                    <input type="text" v-model="user" />
                </p>
                <p class="jumbotron col-5 m-1">
                    <!--Rendu déclaratif de user défini dans data-->
                    Connecté : {{ user }}
                </p>
                <div class="container">
                
                <p class="jumbotron ml-1">
                <span v-if="commands.length>0">Commandes : </span> <br>
                <span v-for="command in commands">{{command}} <br></span>
                </p>
                </div>
                
                <!-- v-for = une boucle (c'est défini par in au lieu du as ) -->
                <!-- on peut récupérer la classe et la modifier par la suite avec v-bind -->
                <div class="container"   v-for="product in products">

                    <p class="jumbotron" v-bind:class="height">
                        {{product}}
                        <!-- v-on agit sensiblement comme .on de JQuery -->
                        <button class="btn btn-secondary float-right" v-on:click="command(product)">Commander !</button>
                    </p>

                </div>

                <!-- Insértion d'un composant -->
                <composant-1>
                
                </composant-1>
            </div>
        </div>

    </div>
    <script>
        // Création du composant
        Vue.component('composant-1', {
            template: '<p class="jumbotron">Composant 1</p>',
            props: ['nom']
        });

        // instancier vue
        var app = new Vue({
            //Paramètres de vue
            // el -­-> élément d'initialisation définie précédemment
            el: "#app",
            // States de vue
            data: {
                user: "Pascal",
                products: [
                    'Pizza',
                    'Hamburger',
                    'Tacos',
                    'Cheeseburger'
                ],
                commands: [

                ],
                height: "p-0"
            },
            // functions
            methods: {
                command: function(product) {
                    // get commands table from data and push the product
                    this.commands.push(product);
                    this.height = 'p-'+this.commands.length;
                }
            }
        });
    </script>
</body>

</html>