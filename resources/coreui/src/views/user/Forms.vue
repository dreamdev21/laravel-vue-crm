<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="form-group form-actions">
                            <router-link :to="{ name: 'Contacts List'}">
                                <button type="button" class="btn btn-sm btn-warning pull-right">Cancel</button>
                            </router-link>
                            <button type="submit" style="margin-right:10px" class="btn btn-sm btn-primary pull-right">Submit</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="First Name">
                                        <b-form-input type="text" v-model="user.first_name" placeholder="Enter first name"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Last Name">
                                        <b-form-input type="text" v-model="user.last_name" placeholder="Enter last name"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Email">
                                        <b-form-input type="text" v-model="user.email" placeholder="Enter Email Address"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Phone Number">
                                        <b-form-input type="text" v-model="user.phone_number" placeholder="Enter Phone Number"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Company</label>
                                    <select class="form-control" v-model="user.company_id">
                                        <option value="">Select Company</option>
                                        <option v-for="company in companies" v-bind:key="company.id" v-bind:value="company.id">{{company.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="">Contact Type</label>
                                    <select class="form-control" v-model="user.contact_type">
                                        <option value="">Select Contact Type</option>
                                        <option value="Technician" selected>Technician</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Technical Operation">Technical Operation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label for="">Is User?</label>
                                    <input type="checkbox" placeholder="Is User" class="form-control" v-model="user.is_user" value="1" name="is_user">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="">Key Contact?</label>
                                    <input type="checkbox" placeholder="Key Contact?" class="form-control" v-model="user.key_contact" value="1" name="key_contact">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="User Name" v-if="user.is_user==true">
                                        <b-form-input type="text" v-model="user.username" placeholder="Enter user name"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Password" v-if="user.is_user==true">
                                        <b-form-input type="text" v-model="user.password" placeholder="Enter Password"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "forms",
        components: {},
        data() {
            return {
                companies: [],
                user: {
                    key_contact:0,
                    is_user:0
                },
                edit: false
            };
        },
        created() {
            console.log(this.$store.state.user);
            if (!this.$store.state.user) this.$router.push("/login");
            this.user.account_id = this.$store.state.user.account_id;
            this.user.company_id = this.$route.params.id
            console.log('look for company id', this.$route.params.id);
            this.fetchCompany()

            if (this.$route.path.indexOf('create') > -1) {
                console.log('show result', this.$route.path.indexOf('create'))
                this.edit = false;
            } else {
                this.edit = true;
                this.fetchById(this.$route.params.id);
            }
        },
        methods: {
             fetchCompany(query) {
                this.$http
                    .get(`/api/companies`)
                    .then(response => {
                        this.companies = response.data.data;
                        console.log("companies", this.companies)
                    })
            },
            submitForm() {
                if (this.edit) {
                    this.user.updated_by = this.$store.state.user.id;
                    this.user.account_id = this.$store.state.user.account_id;
                    this.$http
                        .put(`/api/user`, this.user)
                        .then(response => {
                            // this.$router.push("/users/");
                            this.$router.push({ path: `/company/${this.user.company_id}` })
                        })
                        .catch(error => {
                            this.$setErrorsFromResponse(err.response.data);
                            this.$emit("error", err.response.data);
                        });
                } else {
                    this.user.created_by = this.$store.state.user.id;
                    this.$http
                        .post(`/api/user`, this.user)
                        .then(response => {
                            // this.$router.push("/users/");
                            this.$router.push({ path: `/company/${this.user.company_id}` })
                        })
                        .catch(error => {
                            this.$setErrorsFromResponse(err.response.data);
                            this.$emit("error", err.response.data);
                        });
                }
            },
            fetchById(id) {
                this.$http.get(`/api/user/${id}`).then(response => {
                    this.user = response.data.data;
                    this.company = response.data.data.company
                    console.log("user", this.user);
                    console.log("company", this.company);
                    console.log("show company id", response.data.data.company.id)
                    this.$route.params.id = response.data.data.company.id
                     console.log("show me fucking result", this.$route.params.id)
                });
            }
        }
    };
</script>