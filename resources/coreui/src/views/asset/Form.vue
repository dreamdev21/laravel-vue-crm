<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="form-group form-actions">
                            <router-link :to="{ name: 'Assets List'}">
                                <button type="button" class="btn btn-sm btn-warning pull-right">Cancel</button>
                            </router-link>
                            <button type="submit" style="margin-right:10px" class="btn btn-sm btn-primary pull-right">Submit</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Asset Name">
                                        <b-form-input type="text" v-model="asset.name" placeholder="Please enter Asset Name"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="">Asset Type</label>
                                    <select class="form-control" v-model="asset.asset_type">
                                        <option value="">Select Asset Type</option>
                                        <option value="Alegria 8 60" selected>Alegria 8 60</option>
                                        <option value="Alegria 8 60 Tank">Alegria 8 60 Tank</option>
                                        <option value="Alegria 8 60 Espresso">Alegria 8 60 Espresso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                      <b-form-fieldset label="Asset Serial">
                                        <b-form-input type="text" v-model="asset.serial" placeholder="Please enter Asset Serial"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                     <b-form-fieldset label="Asset BMB">
                                        <b-form-input type="text" v-model="asset.bmb" placeholder="Please enter Asset BMB"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Customer List</label>
                                    <select class="form-control" v-model="asset.company_id">
                                        <option value="">Select Customer</option>
                                        <option v-for="company in companies" v-bind:key="company.id" v-bind:value="company.id">{{company.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="">Distributor</label>
                                    <select class="form-control" v-model="asset.agent_id">
                                        <option value="">Select Distributor</option>
                                        <option v-for="distributor in distributors" v-bind:key="distributor.name" v-bind:value="distributor.name">{{distributor.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="">Location List</label>
                                    <select class="form-control" v-model="asset.location">
                                        <option value="">Select Location</option>
                                        <option v-for="location in locations" v-bind:key="location.id" v-bind:value="location.id">{{location.address}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <b-form-fieldset label="Asset Specific Location">
                                        <b-form-input type="text" v-model="asset.specific_location" placeholder="Please enter Location"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Asset Status</label>
                                    <select class="form-control" v-model="asset.status">
                                        <option value="">Select Status</option>
                                        <option value="In Service">In Service</option>
                                        <option value="In Store">In Store</option>
                                        <option value="Commissioned">Commissioned</option>
                                        <option value="Underplacement">Underplacement</option>
                                        <option value="Removed" selected>Removed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-textarea id="textarea1" v-model="asset.description" placeholder="Description" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-textarea id="textarea1" v-model="asset.comment" placeholder="Comments" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                            </div>
                            <!-- {{asset}} {{edit}} -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  name: "forms",
  components: {},
  data() {
    return {
      locations: [],
      companies: [],
      distributors: [],
      asset: {
        id: "",
        account_id: "",
        name: "",
        asset_type: "",
        company_id: "",
        agent_id: "",
        serial: "",
        bmb: "",
        location: "",
        status: "",
        description: "",
        comment: ""
      },
      id: "",
      account_id: "",
      asset_type: "",
      agent_id: "",
      serial: "",
      bmb: "",
      location: "",
      status: "",
      description: "",
      comment: "",
      edit: false
    };
  },
  created() {
    // window.localStorage.setItem("authUser",JSON.stringify(response.data))
    // let authUser = JSON.parse(window.localStorage.getItem("authUser"));
    // console.log("authUser", authUser.user.account_id);
    // this.asset.account_id = authUser.user.account_id;
    // this.asyncFind();
    // this.fetchlocations();
    // this.fetchCompaniesBytype();
    // if (this.$route.params.id) {
    //     axios
    //         .get(`/api/asset/${this.$route.params.id}`, { headers: this.$headers })
    //         .then(response => {
    //             this.asset = response.data.data;
    //             console.log("asset", this.asset);
    //         })
    //         .catch(error => { });
    //     this.edit = true;
    // }
  },
  methods: {
    // asyncFind(query) {
    //     this.isLoading = true;
    //     axios.get("/api/companies", { headers: this.$headers }).then(response => {
    //         this.companies = response.data;
    //         this.isLoading = false;
    //         console.log("companies", this.companies);
    //     });
    // },
    // fetchCompaniesBytype() {
    //     this.isLoading = true
    //     axios.get("/api/distributors", { headers: this.$headers })
    //         .then(response => {
    //             this.distributors = response.data.Companies;
    //             console.log("distributors", this.distributors)
    //         })
    // },
    // fetchlocations(query) {
    //     this.isLoading = true;
    //     axios.get("/api/locations", { headers: this.$headers }).then(response => {
    //         this.locations = response.data;
    //         this.isLoading = false;
    //         console.log("locations", this.locations);
    //     });
    // },
    submitForm() {
      // this.$validator.validate().then(result => {
      //     if (!result) {
      //         return false;
      //     } else {
      //         if (this.edit) {
      //             axios
      //                 .put("/api/asset", this.asset, { headers: this.$headers })
      //                 .then(response => {
      //                     this.$router.push("/assets/");
      //                 })
      //                 .catch(error => {
      //                     this.$setErrorsFromResponse(err.response.data);
      //                     this.$emit("error", err.response.data);
      //                 });
      //         } else {
      //             axios
      //                 .post("/api/asset", this.asset, { headers: this.$headers })
      //                 .then(response => {
      //                     this.$router.push("/assets/");
      //                 })
      //                 .catch(error => {
      //                     this.$setErrorsFromResponse(err.response.data);
      //                     this.$emit("error", err.response.data);
      //                 });
      //         }
      //     }
      // });
    }
  }
};
</script>