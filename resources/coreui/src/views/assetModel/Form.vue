<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="form-group form-actions">
                            <router-link :to="{ name: 'Asset Model List'}">
                                <button type="button" class="btn btn-sm btn-warning pull-right">Cancel</button>
                            </router-link>
                            <button type="submit" style="margin-right: 10px" class="btn btn-sm btn-primary pull-right">Submit</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Asset Model Name">
                                        <b-form-input type="text" v-model="assetModel.name" placeholder="Please Enter Asset Model Name"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="">Model Type</label>
                                    <select class="form-control" v-model="assetModel.type">
                                        <option value="">Select Type</option>
                                        <option v-for="modelType in modelTypes" v-bind:key="modelType.id" v-bind:value="modelType.id">{{modelType.type}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Frequency">
                                        <b-form-input type="text" v-model="assetModel.frequency" placeholder="Frequency"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                     <b-form-fieldset label="Rent">
                                        <b-form-input type="text" v-model="assetModel.rent" placeholder="Rent"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Rent">
                                        <b-form-input type="text" v-model="assetModel.minimum_stock" placeholder="Minimum Stock"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Rent">
                                        <b-form-input type="text" v-model="assetModel.current_stock" placeholder="Current Stock"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-textarea id="textarea1" v-model="assetModel.description" placeholder="Description" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-textarea id="textarea1" v-model="assetModel.comment" placeholder="Comments" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                            </div>
                            <!-- <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <router-link :to="{ name: 'assetModels List'}">
                                    <button type="button" class="btn btn-sm btn-warning">Cancel</button>
                                </router-link>
                            </div> -->
                        </div>
                        <!-- {{assetModel}} {{edit}} -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'forms',
        components: {
        },
        data() {
            return {
                modelTypes: [],
                assetModel: {
                    id: '',
                    account_id: '',
                    name: '',
                    rent: '',
                    type: '',
                    frequency: '',
                    minimum_stock: '',
                    current_stock: '',
                    description: '',
                    comment: '',
                    image: ''
                },
                id: '',
                account_id: '',
                name: '',
                rent: '',
                type: '',
                frequency: '',
                minimum_stock: '',
                current_stock: '',
                description: '',
                comment: '',
                image: '',
                edit: false
            }
        },
        created() {
            // window.localStorage.setItem("authUser",JSON.stringify(response.data))
            let authUser = JSON.parse(window.localStorage.getItem('authUser'))

            console.log('authUser', (authUser.user.account_id))
            this.assetModel.account_id = authUser.user.account_id
            this.fetchModelTypes();

            if (this.$route.params.id) {
                axios.get(`/api/assetModel/${this.$route.params.id}`, { headers: this.$headers })
                    .then(response => {
                        this.assetModel = response.data.data
                        console.log("assetModel", this.assetModel)
                    }).catch(error => {
                    });
                this.edit = true
            }
        },
        methods: {
            fetchModelTypes(query) {
                this.isLoading = true
                axios.get("/api/modelTypes", { headers: this.$headers })
                    .then(response => {
                        this.modelTypes = response.data;
                        this.isLoading = false;
                        console.log("modelTypes", this.modelTypes)
                    })
            },
            submitForm() {
                this.$validator.validate().then(result => {
                    if (!result) {
                        return false;
                    }
                    else {
                        if (this.edit) {
                            axios.put("/api/assetModel", this.assetModel, { headers: this.$headers })
                                .then(response => {
                                    this.$router.push('/assetModels/')
                                })
                                .catch(error => {
                                    this.$setErrorsFromResponse(err.response.data);
                                    this.$emit('error', err.response.data);
                                });

                        } else {
                            axios.post("/api/assetModel", this.assetModel, { headers: this.$headers })
                                .then(response => {
                                    this.$router.push('/assetModels/')
                                })
                                .catch(error => {
                                    this.$setErrorsFromResponse(err.response.data);
                                    this.$emit('error', err.response.data);
                                });
                        }

                    }
                });
            }
        }
    }
</script>