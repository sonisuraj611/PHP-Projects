console.log("This is tic tac toe game");

let turn = "X";
let gameover = false;
const changeTurn = ()=> {
    return turn==="X"?"0":"X";
}

const checkWin = ()=>{
    let boxtexts = document.getElementsByClassName('boxtext');
    let wins = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
    ]
    wins.forEach(e=>{
        if((boxtexts[e[0]].innerText === boxtexts[e[1]].innerText) && (boxtexts[e[1]].innerText === boxtexts[e[2]].innerText) && (boxtexts[e[0]].innerText !== "")){
            document.querySelector('.turn').innerText = `${boxtexts[e[0]].innerText} won the game!`;
            document.querySelector('.imgbox').getElementsByTagName('img')[0].style.width = '120px';
            gameover = true;
        }
        
    })
}

let boxtexts = document.getElementsByClassName('boxtext');

let boxes = document.getElementsByClassName('box');
Array.from(boxes).forEach(element => {
    let boxtext = element.querySelector('.boxtext');
    element.addEventListener('click',()=>{
        if(boxtext.innerText === ''){
            boxtext.innerText = turn;
            turn = changeTurn();
            checkWin();
            if(!gameover){
                document.getElementsByClassName('turn')[0].innerText = 'Turn for '+ turn;
            }
        }
    })
    // console.log(element)
});
reset.addEventListener('click',()=>{
    let boxtexts = document.getElementsByClassName('boxtext');
    Array.from(boxtexts).forEach(element => {
        element.innerText = "";
    });
    turn = "X";
    document.querySelector('.imgbox').getElementsByTagName('img')[0].style.width = '0';
    document.getElementsByClassName('turn')[0].innerText = 'Turn for '+ turn;
    gameover = false;
}) 