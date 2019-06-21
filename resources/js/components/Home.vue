<template>
  <div>
    <div class="py-5">
      <div class="container">
        <form class="row mb-5" @submit.prevent="filterProperties">
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select v-model="location" class="form-control d-block rounded-0">
                <option value>Location</option>
                <option
                  v-for="(location, index) in locations"
                  :key="index"
                  :value="location"
                  v-text="location"
                ></option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select v-model="type" class="form-control d-block rounded-0">
                <option value>Type</option>
                <option value="bungalow">Bungalow</option>
                <option value="flat">Flat</option>
                <option value="self_contained">Self Contained</option>
                <option value="storey_building">Storey Building</option>
                <option value="duplex">Duplex</option>
                <option value="office_space">Office Space</option>
                <option value="event_centre">Event Centre</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="mb-4">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                  <input
                    type="number"
                    v-model="minPrice"
                    placeholder="Min. Price"
                    min="1"
                    class="form-control"
                  >
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                  <input
                    type="number"
                    v-model="maxPrice"
                    placeholder="Max. Price"
                    min="1"
                    class="form-control"
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <input
              type="submit"
              class="btn btn-primary btn-block form-control-same-height rounded-0"
              value="Search"
            >
          </div>
        </form>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-house"></span>
              <div class="text">
                <h2 class="mt-0">Wide Range of Properties</h2>
                <p>Choose from our wide range of available properties.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-rent"></span>
              <div class="text">
                <h2 class="mt-0">Rent/Lease</h2>
                <p>Listings are available for rent/lease over a certain period of time. No sale.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-location"></span>
              <div class="text">
                <h2 class="mt-0">Property Location</h2>
                <p>Properties are located in serene environments with good electricity and water supply.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section site-section-sm bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <div class="site-section-title">
              <h2>Browse Listings</h2>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div
            v-if="properties.length"
            v-for="(property, index) in properties"
            :key="property.id"
            class="col-md-6 col-lg-4 mb-4"
          >
            <a href="#" class="prop-entry d-block">
              <figure>
                <img
                  :src="`/images/properties/${property.image1}`"
                  :alt="property.title"
                  class="img-fluid"
                >
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded">&#8358;{{ property.price }}</span>
                  <h3 class="title">{{ property.title }}</h3>
                  <p class="location">{{ property.address }}</p>
                </div>
              </div>
            </a>
          </div>
          <div v-else>No properties yet.</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Home",
    data() {
      return {
        properties: [],
        locations: [],
        location: "",
        type: "",
        minPrice: "",
        maxPrice: ""
      };
    },
    created() {
      this.fetchProperties();
    },
    methods: {
      fetchProperties() {
        axios
          .get("/api/home")
          .then(res => {
            this.properties = res.data.properties;
            this.locations = res.data.locations;
          })
          .catch(err => console.log(err.response));
      },
      filterProperties() {
        axios
          .get("/api/filter", {
            params: {
              showLoading: true,
              location: this.location,
              type: this.type,
              min_price: this.minPrice,
              max_price: this.maxPrice
            }
          })
          .then(res => {
            this.properties = res.data.properties;
          })
          .catch(err => {
            console.log(err.response);
          });
      }
    }
  };
</script>
