<script>
// import:
import { router } from '../router';
import { store } from "../store";
import RegisterButton from "../components/RegisterButton.vue";
import axios from 'axios';

export default {
	nome: "Header",
	components: {
		RegisterButton
	},
	data() {
		return {
			store,
			suggerimenti: [],
			address: "",
			position: null,
			scrollTransform: false
		};
	},
	mounted() {
		window.addEventListener('scroll', this.handleScroll);
	},
	beforeUnmount() {
		window.removeEventListener('scroll', this.handleScroll);
	},
	methods: {

		searchByIcon() {
			this.suggerimenti = [];
			this.address = this.store.search;
			this.getFilteredApartments();
			this.navigateToResults();
		},
		handleScroll() {
			if (window.scrollY > 0) {
				this.scrollTransform = true;
			} else {
				this.scrollTransform = false;
			}
		},

		async selectInput(index) {
			this.store.search = this.suggerimenti[index];
			this.suggerimenti = [];
			this.address = this.store.search;
			this.getFilteredApartments();
			this.navigateToResults();
		},

		searchApartments() {

			const url = this.store.api.tomtomUrl + encodeURIComponent(this.store.search) + ".json";

			const params = {
				key: "hqfK54fHRUrLOi7htWUP65d2wejFf1hU",
				limit: 6
			};

			axios.get(url, { params })
				.then(response => {
					this.suggerimenti = response.data.results.map(result => result.address.freeformAddress);
				})
		},

		getFilteredApartments() {
			const url = this.store.api.baseUrl + this.store.api.endpoints.filteredApartmentsList;

			const params = {
				city: encodeURIComponent(this.store.search),
				distance: 20000
			}

			axios.get(url, { params })
				.then(response => {
					this.store.api.filteredApartments = response.data.results
				})
		},

		clear() {
			this.suggerimenti = [];
			this.store.search = "";
			this.store.api.filteredApartments = [];
		},

		navigateToResults() {
			if (this.$route.name === 'results') {
				router.replace({ name: 'results', query: { search: this.store.search } });
			} else {
				router.push({ name: 'results', query: { search: this.store.search } });
			}
		},

	}
};
</script>

<template>
	<header class="shadow">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-6 col-lg-3 order-1 order-lg-1 ">
					<router-link :to="{ name: 'home' }"
						class="nav-link active navbar-brand d-flex justify-content-start align-items-start"
						aria-current="page">
						<img class="logo" src="../../public/boolbnb.svg" alt="" />
					</router-link>
				</div>
				<div class="col-sm-10 col-lg-6 order-3 order-lg-2">
					<div class="search-box d-flex align-items-center justify-content-between border border-secondary-subtle px-3 py-2 my-3"
						:class="{ 'search-transform': scrollTransform === true }">

						<div class="address d-flex align-items-center p-2">
							<div v-if="$route.name === 'home'" class="clear-icon" @click="clear()">
								<font-awesome-icon :icon="['fas', 'xmark']" />
							</div>
							<input type="text" id="input-box" placeholder="Indirizzo" autocomplete="off"
								@keyup="searchApartments()" v-model="store.search" class="ms-3">
						</div>
						<div class="search d-flex align-items-center justify-content-center" @click="searchByIcon()">
							<font-awesome-icon :icon="['fas', 'search']" />
						</div>
						<div class="result-box rounded" v-if="suggerimenti.length" @mouseleave="suggerimenti=[]">
							<ul>
								<li v-for="(suggerimento, index) in suggerimenti" @click="selectInput(index)">
									<span class="me-3"><font-awesome-icon :icon="['fas', 'map-marker-alt']" /></span>
									{{ suggerimento }}
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 order-2 order-lg-3">
					<RegisterButton />
				</div>
			</div>
		</div>
	</header>
</template>

<style lang="scss" scoped>
@use "../assets/scss/partials/variables" as *;

header {
	min-height: 120px;
	font-size: 20px;
	position: sticky;
	top: 0;
	background-color: whitesmoke;
	z-index: 300;

	.row {
		padding: 10px 20px;

		.logo {
			width: 150px;
		}

		.search-box {
			width: 100%;
			border-radius: 50px;
			position: relative;

			.clear-icon {
				cursor: pointer;
				padding: 10px;
				display: flex;
				align-items: center;
			}

			input {
				flex: 1;
				height: 40px;
				background: transparent;
				border: 0;
				outline: 0;
				font: 18px;
			}

			.search {
				width: 40px;
				height: 40px;
				color: white;
				background-color: $primary;
				border-radius: 50%;
			}

			.result-box {
				position: absolute;
				top: 80px;
				left: 60px;
				background-color: white;

				ul {
					padding: 15px 0;
					margin: 10px;

					li {
						list-style-type: none;
						border-radius: 3px;
						padding: 15px 50px 15px 20px;
						cursor: pointer;

						&:hover {
							background-color: rgba(0, 217, 166, 0.5);
						}
					}
				}
			}
		}
	}
}

.search-transform {
	transform: scale(.8);
	transition: .5s;
}
</style>
