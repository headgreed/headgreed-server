<template lang="html">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">

            <div class="modal-header">
              <slot name="header">
                default header
              </slot>
              <button class="modal-default-button" @click="$emit('close')">
                <i class="fa fa-times fa-2x"></i>
              </button>
            </div>

            <div class="modal-body">
              <slot name="body">

              </slot>
            </div>

            <div class="modal-footer">
              <slot name="footer">

              </slot>
            </div>
          </div>
        </div>
      </div>
    </transition>
</template>

<script>
export default {
}
</script>

<style lang="css">
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 60%;
  height: 100%;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.form-group input {
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
}
.form-group textarea {
    width: 100%;
    height: 60vh;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
}
@media (max-width:991px){
    /* 手機 */
    .modal-container {
      width: 90%;
    }
    .form-group textarea {
        height: 35vh;
    }
}


.modal-header span {
  margin-top: 0;
  color: #42b983;
  font-size: 2em;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
    background: #fff;
    /*border: none;*/
    border: 3px solid transparent;
    border-radius: 50%;
    border-color: rgb(228, 26, 26);
    float: right;
}

.modal-default-button i {
    color: rgb(228, 26, 26);
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>
