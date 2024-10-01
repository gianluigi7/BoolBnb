<script>
import { store } from "../store";
import axios from "axios";

export default {
  name: "MessageComponent",
  props: {
    apartmentSlug: { type: String },
  },
  data() {
    return {
      store,
      form: {
        name: "",
        email: "",
        content: "",
      },
      messageSuccess: "",
      messageError: "",
      isModalVisible: false,
      elementVisible: true
    };
  },

  methods: {
    sendMessage() {
      const messageData = {
        name: this.form.name,
        email: this.form.email,
        content: this.form.content,
      };

      axios
        .post(
          `${this.store.api.baseUrl}homes/${this.apartmentSlug}/message`,
          messageData
        )
        .then((response) => {
          if (response.status === 201) {
            // Mostra il messaggio di successo:
            this.messageSuccess = response.data.message;
            //? pulisci  messaggi di errore:
            this.messageError = "";
            // resetta il form:
            this.form.name = "";
            this.form.email = "";
            this.form.content = "";
            setTimeout(() => this.elementVisible = false, 3000);
            this.isModalVisible = false;
          }
        })
        .catch((error) => {
          if (error.response.status === 422) {
            // errori di validazione:
            this.messageError =
              "Ci sono errori nei dati inseriti. Verifica e riprova.";
            this.messageSuccess = "";
            this.isModalVisible = false;
            setTimeout(() => this.elementVisible = false, 3000);
          } else {
            // gestione errori:
            this.messageError = "Si è verificato un errore. Riprova più tardi.";
            this.messageSuccess = "";
            this.isModalVisible = false;
            setTimeout(() => this.elementVisible = false, 3000);
          }
        });
    },
    showModal() {
      if (this.isModalVisible === false) {
        this.isModalVisible = true;
        this.messageError = "";
        this.messageSuccess = "";
        this.elementVisible = true;
      } else {
        this.isModalVisible = false;
      }
    },
    closeModal() {
      this.isModalVisible = false;

      this.messageError = "";
      this.messageSuccess = "";
    },
  },
  watch: {
    // whenever active changes, this function will run
    isModalVisible: function () {
      document.body.style.overflow = this.isModalVisible ? "hidden" : "";
    },
  },
};
</script>

<template>
  <button @click="showModal" class="btn-gradient">Invia un messaggio</button>
  <div class="send-message" :class="{ 'no-scroll modal-container': isModalVisible }">
    <div>
      <div v-show="isModalVisible" class="form-modal">
        <form action="#" @submit.prevent="sendMessage">
          <div id="form">
            <!-- <buttosn class="btn-absolute" @click="closeModal">X</buttosn> -->
            <a class="btn-absolute" @click="closeModal">X</a>
            <div class="d-flex justify-content-between align-items-center">
              <h1>Compila il form sottostante per inviarmi un messaggio</h1>
            </div>
            <label for="name">Nome:</label>
            <input type="text" name="name" v-model="form.name" id="name" required />

            <label for="email">Email:</label>
            <input type="text" name="email" v-model="form.email" id="email" required />

            <label for="message">Messaggio</label>
            <textarea name="message" v-model="form.content" id="message" required cols="30" rows="10"></textarea>

            <!-- <input type="submit" id="submit" name="submit" value="Invia" /> -->
            <button class="bottone" type="submit">Invia</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <div class="mt-2 width-50">

      <div v-if="messageSuccess" v-show="elementVisible" class="messageSuccess">
        {{ messageSuccess }}
      </div>
      <div v-if="messageError" v-show="elementVisible" class="messageError">
        {{ messageError }}
      </div>
    </div>
  
</template>

<style lang="scss" scoped>
@use "../assets/scss/partials/extende" as *;
@use "../assets/scss/main.scss" as *;

.no-scroll {
  overflow: hidden;
}

.form-modal {
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 200;
  background-color: white;
  border-radius: 20px;
}

.modal-container {
  position: fixed;
  z-index: 50;
  left: 0;
  top: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);
}

#form {
  font-size: 14px;
  max-width: 500px;
  padding: 24px;
  overflow: hidden;
  -moz-border-radius: 20px;
  -webkit-border-radius: 20px;
  border-radius: 20px;
  border: 1px solid black;
  @extend %shadow;
}

h1 {
  font-size: 16px;
  color: black;
}

.bottone {
  text-align: center;
  padding: 10px 35px;
  background: $gradient;
  color: $secondary;
  border-radius: 10px;
  border: none;
  @extend %shadow;

  &:hover {
    opacity: 0.85;
    @extend %shadow2;
  }
}

label,
input,
textarea {
  /* Stili comuni agli elementi del form */
  color: black;
  /* Colore del testo */
  float: left;
  /* Float a sinistra */
  font-family: Verdana, sans-serif;
  /* Tipo di carattere per il testo */
  margin: 10px 0;
  /* Margini */
}

label {
  /* Stili per la label */
  display: block;
  /* Impostiamo la label come elemento blocco */
  line-height: 30px;
  /* Altezza di riga */
  width: 150px;
  /* Larghezza */
}

input,
textarea {
  /* Stili per il campo di testo e per la textarea */
  //  background: #1C1C1C; /* Colore di sfondo */
  //  border: 1px solid $primary; /* Bordo */
  color: black;
  /* Colore del testo */
  height: 30px;
  /* Altezza */
  line-height: 30px;
  /* Altezza di riga */
  width: 300px;
  /* Larghezza */
  padding: 0 10px;
  /* Padding */
}

input {
  padding-left: 30px;
}

textarea {
  /* Stili specifici per la teaxtarea */
  /* Sfondo con immagine */
  font-size: 12px;
  height: 200px;
  width: 300px;
  overflow: hidden;
  /* disabilitare la scrollbar in IE */
}

button {
  margin-top: 8px;
  margin-left: 20px;
  border: 1px solid black;
  background-color: transparent;
  padding: 4px 8px;
  color: $footer;
}

button:active {
  transform: scale(0.95);
}

.btn-absolute {
  margin-bottom: 20px;
  display: block;
  text-align: end;
  font-weight: 600;
  font-size: 18px;
  color: red;
  border: none;
}

.btn-gradient {
  padding: 10px 15px;
  background: $gradient;
  border-radius: 10px;
  border: none;
  color: $text2;
  @extend %shadow;

  &:hover {
    opacity: 0.85;
    @extend %shadow2;
  }
}
.width-50 {
  width: fit-content;
  margin-left: 20px;
  margin-top: 15px;
  
}
</style>
