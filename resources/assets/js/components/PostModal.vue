<template lang="html">
<transition name="modal">
    <div class="modal-mask" @click="$emit('close')">
        <div class="modal-container" @click.stop>
            <div class="modal-header">
                <span class="modal-title">
                    <slot name="header">

                    </slot>
                </span>
                <span class="modal-close-button" @click="$emit('close')">
                    &times;
                </span>
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
</transition>
</template>

<script>
export default {
}
</script>

<style lang="scss">
// hide body overflow when open modal
.modal-open {
  overflow: hidden;
}

// 整體
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, .5);
    transition: opacity .3s ease;
}
.modal-container {
    width: 66%;
    margin: auto;
    margin-top: 40px;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .3s ease;
}
@media (max-width:991px){
    .modal-container {
        margin-top: 0;
        width: 100%;
    }
}

// header
.modal-header {
    .modal-title {
      margin-top: 0;
      color: #42b983;
      font-size: 2em;
    }
    .modal-close-button {
        margin-top: -5px;
        float: right;
        font-size: 2em;
        color: #000;
        background: #fff;
    }
    .modal-close-button:hover, .modal-close-button:focus {
        color: #666666;
        cursor: pointer;
    }
}

.modal-body {
    // margin: 20px 0;
    .form-group > input, .form-group > textarea {
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    }
    .form-group textarea {
        height: 50vh;
    }
    @media (max-width:991px) {
        .form-group textarea {
            height: 35vh;
        }
    }
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
