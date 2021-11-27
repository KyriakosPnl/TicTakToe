<template>
    <div v-if="!gameOver" id="board">

        <div class="square" v-for="n in 9" v-bind:key="n" @click="clickedSquare(n)">
            {{square[n]}}
        </div>
        </div>

    <div v-else id="result">
     <button @click="playAgain()" class="btn btn-lg btn-primary btn-block">Play again!</button> 
      <div>Reload Page to play with diferrent players!</div>
    </div> 
    
    <button  class="btn btn-lg btn-primary btn-block">Show Last Game</button> 
</template>

<script>
import { ref } from "vue";
//import { computed } from "vue"

export default {
  name: "App",

  setup(props) {
    let currentTurn = "X";
    let square = ref([]);
    let gameOver = ref(false);
    let result = ref("");
    let player1 = ref("");
    let player2 = ref("");
    let moves = [];

    player1.value = `${props.player1}`;
    player2.value = `${props.player2}`;

    for (let i = 0; i <= 9; i++) {
      square.value.push("");
    }

    function clickedSquare(n) {
      if (square.value[n] !== "") {
        return;
      }
      moves.push(n);
      square.value[n] = currentTurn;

      resultCheck();
      console.log("hh" + moves);

      currentTurn === "X" ? (currentTurn = "O") : (currentTurn = "X");
    }

    function resultCheck() {
      const lines = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9],
        [1, 4, 7],
        [2, 5, 8],
        [3, 6, 9],
        [1, 5, 9],
        [3, 5, 7]
      ];

      for (let i = 0; i < lines.length; i++) {
        const [a, b, c] = lines[i];
        if (
          square.value[a] !== "" &&
          square.value[a] === square.value[b] &&
          square.value[a] === square.value[c]
        ) {
          gameOver.value = true;
          if (moves.length % 2 == 0) {
            result.value = player2.value;
          } else {
            result.value = player1.value;
          }
        }
      }
      if (moves.length === 9 && !gameOver.value) {
        gameOver.value = true;
        result.value = "Tie";
      }
      if (gameOver.value) {
        if (
          !window.confirm(
            result.value != "Tie" ? result.value + " wins!!!" : "It's a tie!"
          )
        ) {
          return;
        }
      }
    }
    function playAgain() {
      for (let i = 0; i < square.value.length; i++) {
        square.value[i] = "";
      }
      moves = [];
      gameOver.value = false;
      currentTurn = "X";
      result.value = "";
    }
    return { gameOver, square, clickedSquare, result, playAgain };
  },
  props: ["player1", "player2"]
};
</script>

<style>
#board {
  height: 400px;
  width: 400px;
  margin: 50px auto;
  
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.square {
  box-sizing:border-box;

  display: inline-block;
  font-family: Verdana, Tahoma, sans-serif;
  text-align: center;
  font-size: 30px;
  cursor: pointer;
  color: #fff;
  padding: 10%;
  margin: 2px;
  border-radius: 14px;
  width: 30%;
  background-color: rgb(96, 161, 158);
  
}
     
</style>
