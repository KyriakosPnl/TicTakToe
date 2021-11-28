<template>
	
	<div v-if="!hide" class="wrapper">
		
		<form   class="form-signin">   
			
			<h2 class="form-signin-heading">Please Enter your names:</h2>
			<input type="text" class="form-control" name="player_1" v-model="player1" placeholder="(X)  Player_1" required=""  />
			<br>
			<input type="text" class="form-control" name="player_2" v-model="player2" placeholder="(O)  Player_2" required=""/>
			<br>      
			<button type='button' @click="addCouple()" class="btn btn-lg btn-primary btn-block">Play!</button>  

		</form>
	</div>
	
	<div v-else> 
		<Game :player1="player1" :player2="player2" :couple="couple_id" />
		
	</div>
	
</template>

<script>
import axios from "axios";
import { ref } from "vue";
import Game from "./Game.vue";
export default {
  name: "PlayerForm",
  components: {
    Game
  },

  setup() {
    let hide = ref(false);
    let player1 = ref("");
    let player2 = ref("");
    let couple_id = ref("");

    const addCouple = async () => {
      await axios
        .post("api/couple/add", {
          player_1: player1.value,
          player_2: player2.value
        })
        .then(function(response) {
          couple_id.value = response.data.last_insert_id;
        });
      hide.value = true;
    };

    return {
      addCouple,
      player1,
      player2,
      hide,
      couple_id
    };
  }
};
</script>

<style scoped>
body {
  background: #eee !important;
}

.wrapper {
  margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.1);
}
.form-signin-heading {
  margin-bottom: 30px;
}

.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  @include box-sizing(border-box);

  &:focus {
    z-index: 5;
  }
}

input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
</style>
