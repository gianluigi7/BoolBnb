<script>
  import axios from 'axios';
  
  export default {
    name: 'DetailPage',
    data() {
      return {
        apartment: {}, // Oggetto singolo per l'appartamento
      };
    },
    mounted() {
      this.getApartmentDetails();
    },
    methods: {
      async getApartmentDetails() {
        try {
          const response = await axios.get(`http://localhost:8000/api/homes/${this.$route.params.slug}`);
          if (response.data.status === 'success') {
            this.apartment = response.data.results;
  
            // Inizializza la mappa solo dopo aver ricevuto i dettagli dell'appartamento
            this.initMap();
          }
        } catch (error) {
          console.error('Errore durante il caricamento dei dettagli dell\'appartamento:', error);
        }
      },
      initMap() {
        const apiKey = 'hqfK54fHRUrLOi7htWUP65d2wejFf1hU';
  
        // Inizializza la mappa con TomTom SDK
        const map = tt.map({
          key: apiKey,
          container: 'map',
          center: [this.apartment.long, this.apartment.lat], // Centro sulla posizione dell'appartamento
          zoom: 14
        });
  
        map.addControl(new tt.NavigationControl());
  
        // Aggiungi il marker per l'appartamento
        const marker = new tt.Marker()
          .setLngLat([this.apartment.long, this.apartment.lat]) // Posiziona il marker
          .addTo(map);
  
        // Aggiungi un popup al marker con le informazioni dell'appartamento
        const popup = new tt.Popup({ offset: 35 })
          .setHTML(`<strong>${this.apartment.title}</strong><br/>${this.apartment.address}`);
  
        marker.setPopup(popup);
      }
    }
  };
  </script>

<template>
    <div>
      <div id="map" class="map-container"></div>
    </div>
  </template>
  
  <style scoped>
  .map-container {
    margin: 0 auto;
    width: 80%;
    height: 400px; /* Imposta l'altezza della mappa */
  }
  </style>