


// function favoritaHeroi(id, nome) {
//     var nome = nome.toString();
//     var id = id.toString();
//     var xhttp = new XMLHttpRequest();

//     xhttp.onreadystatechange = ()=> {
//         if (this.readyState === 4 && this.status === 200) {
//             alert('Herói favoritado com sucesso!');
//         }
//     };

//     xhttp.open('POST', './heroi.ctrl.php?act=favoritar&id='+id+'&nome='+nome);
//     xhttp.send();
// }


function favoritaHeroi(id, nome) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            nome.innerHTML =  '&#11088 ' + nome.innerHTML;
            console.log('Herói favooooooooooooritado com sucesso!');
            
        }
    };

    xhttp.open('GET', './heroi.ctrl.php?act=favoritar&id=' + id, true);

    xhttp.send();
}

function desfavoritaHeroi(id, nome) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            nome.innerHTML =  nome.innerHTML.replace("⭐ ", '');
            console.log('Herói desfavooooooooooooritado com sucesso!');
        }
    };

    // var id = document.querySelector('#inputId').value;

    xhttp.open('GET', './heroi.ctrl.php?act=desfavoritar&id=' + id, true);
    xhttp.send();
}

// Função para manipular o evento de clique no botão de favoritar
function FavoritarClick(id, nome) {

    if (nome.innerHTML.includes("⭐ ")) {
        desfavoritaHeroi(id, nome);
    } else {
        favoritaHeroi(id, nome);
    }
}


// window.onload = function () {
//     var favElements = document.querySelectorAll('#favoritar'); 
//     var nome = document.querySelector('#nomeHeroi').value;

//     favElements.forEach(function (fav) {
//         if(nome.includes("⭐ ")){
//             fav.addEventListener('click', desfavoritaHeroi);
//         }else{
//             fav.addEventListener('click', favoritaHeroi);
//         }
//     });
// }


// window.onload = function () {
//     var fav = document.querySelector('#favoritar');
//     fav.addEventListener('click', handleFavoritarClick);
// }

// window.onload = function () {
//     var fav = document.querySelector('#favoritar');

//     fav.addEventListener('click', function () {
//         var nome = document.querySelector('#nomeHeroi').value;
//         if (nome.includes("⭐ ")) {
//             desfavoritaHeroi();
//             alert('Herói desfavoritado com sucesso!');
//         } else{
//             favoritaHeroi();
//             alert('Herói favoritado com sucesso!');
//         }
//     });
// }

// window.onload = function () {
//     var favElements = document.querySelectorAll('#favoritar');

//     favElements.forEach(function (fav) {
//         fav.addEventListener('click', function () {
//             var nome = document.querySelector('#nomeHeroi').value;
//             if (nome.includes("⭐ ")) {
//                 desfavoritaHeroi();
//                 alert('Herói desfavoritado com sucesso!');
//             } else {
//                 favoritaHeroi();
//                 alert('Herói favoritado com sucesso!');
//             }
//         });
//     });
// }
