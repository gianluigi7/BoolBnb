<script>
// import:
import { store } from "../store";

export default {
    nome: "RegisterButton",
    data() {
        return {
            store,
            isVisible: false
        };
    },
    methods: {
        toggleVisibility() {
            this.isVisible = !this.isVisible;
        }
    }
};
</script>

<template>
    <div class="accesso col d-flex justify-content-end align-items-start m-2">
      <button class="btn-login" @click="toggleVisibility">
        <font-awesome-icon :icon="['fas', 'bars']" class="me-2" />
        <font-awesome-icon :icon="['fas', 'user']" class="ms-2" />
      </button>
      <div class="visible border border-secondary-subtle bg-light rounded" v-show="isVisible" @mouseleave="isVisible = false">
        <div>
          <a target="_blank" href="http://localhost:8000/register">
            <p class="registrati m-0">Registrati</p>
          </a>
        </div>
        <div>
          <a target="_blank" href="http://localhost:8000/login">
            <p class="accedi m-0">Accedi</p>
          </a>
        </div>
      </div>
    </div>
  </template>

<style lang="scss" scoped>
// import
@use "../assets/scss/partials/variables" as *;

.accesso {

    a {
        color: black
    }

    position: relative;

    .btn-login {
        border: 1px solid $primary;
        color: $primary;
        padding: 10px 20px;
        border-radius: 20px;
        background-color: transparent;

        &:hover {
            background-color: $primary;
            color: white;
        }

        &:active {
            transform: scale(0.95);
        }

    }

    .visible {
        position: absolute;
        top: 60px;
        right: 10px;
        font-size: 13px;

        .registrati {
            padding: 20px 90px 20px 20px;
        }

        .accedi {
            padding: 20px 90px 20px 20px;
        }

        div:hover {
            background-color: rgba(0, 217, 166, 0.5);
            cursor: pointer;
        }
    }
}
</style>

