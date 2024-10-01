// importo il metodo reactive:
import { reactive } from "vue";

export const store = reactive({
    text: 'Hello World!',

    api: {
        apartments: [],
        apartmentsSponsored : [],
        filteredApartments: [],
        baseUrl: "http://127.0.0.1:8000/api/",
        tomtomUrl: "https://api.tomtom.com/search/2/geocode/",
        endpoints: {
            apartmentsList: "homes",
            filteredApartmentsList: "homes/search"
        }
    },

    search: "",

})