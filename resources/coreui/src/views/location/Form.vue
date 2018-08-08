<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="form-group form-actions">
                            <router-link :to="{ name: 'Locations List'}">
                                <button type="button" class="btn btn-sm btn-warning pull-right">Cancel</button>
                            </router-link>
                            <button type="submit" style="margin-right:10px" class="btn btn-sm btn-primary pull-right">Submit</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Address">
                                        <b-form-input type="text" v-model="location.address" placeholder="Enter Address"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Post Code">
                                        <b-form-input type="text" v-model="location.post_code" placeholder="Enter Post Code"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Contact List</label>
                                    <select class="form-control" v-model="location.user_id">
                                        <option value="">Select Contact</option>
                                       <!-- <option v-for="user in users" v-bind:key="user.id" v-bind:value="user.id">{{user.first_name}}</option> -->
                                        <option value="1" selected>Ivy Lui</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Phone Number">
                                        <b-form-input type="text" v-model="location.phone_number" placeholder="Phone Number"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            {{location}} {{edit}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import VueGoogleAutocomplete from 'vue-google-autocomplete'
    export default {
        name: "forms",
        components: {
            VueGoogleAutocomplete
        },
        data() {
            users:[]
            return {
                location: {
                    // company_id: 1
                },
                edit: false
            };
        },
        created() {
            console.log(this.$store.state.user);
            if (!this.$store.state.user) this.$router.push("/login");
            this.location.account_id = this.$store.state.user.account_id;
            this.location.company_id = this.$route.params.id
            console.log('look for company id',this.$route.params.id);
            if (this.$route.path.indexOf('create') > -1) {
                console.log('show result', this.$route.path.indexOf('create'))
                this.edit = false;
            } else {
                this.edit = true;
                this.fetchById(this.$route.params.id);
            }

            if (this.$route.params.id) {
                // this.edit = true;
                // //for edit by id
                // this.fetchById(this.$route.params.id);
            }
        },
        methods: {
            submitForm() {
                if (this.edit) {
                    this.location.updated_by = this.$store.state.user.id;
                    this.$http
                        .put(`/api/location`, this.location)
                        .then(response => {
                            // this.$router.push("/locations/");
                             this.$router.push({ path: `/company/${this.location.company_id}` })
                        })
                        .catch(error => {
                            this.$setErrorsFromResponse(err.response.data);
                            this.$emit("error", err.response.data);
                        });
                } else {
                    this.location.created_by = this.$store.state.user.id;
                    this.$http
                        .post(`/api/location`, this.location)
                        .then(response => {
                            // this.$router.push("/locations/");
                            this.$router.push({ path: `/company/${this.location.company_id}` })
                        })
                        .catch(error => {
                            this.$setErrorsFromResponse(err.response.data);
                            this.$emit("error", err.response.data);
                        });
                }
            },
            fetchById(id) {
                this.$http.get(`/api/location/${id}`).then(response => {
                    this.location = response.data.data;
                    console.log("location", this.location);
                });
            }
        }
    };
</script>