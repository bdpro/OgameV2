   
//            Tries et menu tableau avec datatables.net
     $(document).ready(function () {
         $('#univ').DataTable({
              order: [[ 2, 'asc' ], [ 1, 'desc' ]],
             "lengthMenu": [[ 10, 50, 100, 200, -1], [ 50, 100, 200, "Tous"]],
             "language": {
                 "lengthMenu": "Afficher par _MENU_ ",
                 "search": "Rechercher ",
                 "paginate": {
                     "first": "Première",
                     "last": "Dernière",
                     "next": "Suivante",
                     "previous": "Précédente",
                 }
             }

         });
     });


var cssRule =
    "color: rgb(249, 162, 34);" +
    "font-size: 60px;" +
    "font-weight: bold;" +
    "text-shadow: 1px 1px 5px rgb(249, 162, 34);" +
    "filter: dropshadow(color=rgb(249, 162, 34), offx=1, offy=1);";
console.log("%cATTENTION", cssRule);
console.log("%cLa curiosité est souvent une qualité, mais peut être un défaut. Parfois, ce que l on découvre ne nous apporte que des maux.","color: blue; font-size:30px;");




     

    