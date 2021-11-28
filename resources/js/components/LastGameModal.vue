<template >
<a href="api/game/last/8" >Get last played game.. front-end unfinished/ backend working fine</a>
</template>
<script>//not finished
import { ref } from "vue";
import axios from "axios";

export default {

  props: ["couple"],
  setup(props) {
     
     let couple = ref("");
     let modalActive = ref(false);
     let getLastGame=ref();
    couple.value = `${props.couple}`;

    
    function toggleModal(){
         
      modalActive.value=!modalActive.value;
     
    }
    
    return {couple ,modalActive, getLastGame,toggleModal };
  },
};
</script>

<style  scoped>

.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100vw;
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(255, 255, 255, 0.7);
  .modal-inner {
    position: relative;
    max-width: 640px;
    width: 80%;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    background-color: #fff;
    padding: 64px 16px;
    i {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 20px;
      cursor: pointer;
      &:hover {
        color: crimson;
      }
    }
    button {
      padding: 20px 30px;
      border: none;
      font-size: 16px;
      background-color: crimson;
      color: #fff;
      cursor: pointer;
    }
  }
}
</style>