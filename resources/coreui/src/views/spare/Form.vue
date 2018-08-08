<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="form-group form-actions">
                            <router-link :to="{ name: 'Spares List'}">
                                <button type="button" class="btn btn-sm btn-warning pull-right">Cancel</button>
                            </router-link>
                            <button type="submit" style="margin-right: 10px" class="btn btn-sm btn-primary pull-right">Submit</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Spare Name">
                                        <b-form-input type="text" v-model="spare.name" placeholder="Please enter Spare Name"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Spare Name">
                                        <b-form-input type="text" v-model="spare.serial" placeholder="Please enter Spare serial"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Asset</label>
                                    <select class="form-control" v-model="spare.asset_id">
                                        <option value="">Select Asset</option>
                                        <option v-for="asset in assets" v-bind:key="asset.id" v-bind:value="asset.asset_type">{{asset.asset_type}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="">Manufacturer List</label>
                                    <select class="form-control" v-model="spare.company_id">
                                        <option value="">Select Manufacturer</option>
                                        <option value="Rhea">Rhea</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Spare Type</label>
                                    <select class="form-control" v-model="spare.spare_type">
                                        <option value="">Select Type</option>
                                        <option v-for="spareType in spareTypes" v-bind:key="spareType.id" v-bind:value="spareType.id">{{spareType.type}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Spare cost">
                                        <b-form-input type="text" v-model="spare.cost" placeholder="Please enter Spare cost"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Minimum Stock">
                                        <b-form-input type="text" v-model="spare.minimum_stock" placeholder="Enter Minimum Stock"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-fieldset label="Current Stock">
                                        <b-form-input type="text" v-model="spare.current_stock" placeholder="Enter Current Stock"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-textarea id="textarea1" v-model="spare.description" placeholder="Descriptions" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-textarea id="textarea1" v-model="spare.comment" placeholder="Comments" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <!-- <img :src="userImage" class="img-fluid img-thumbnail" style="height: 200px" v-show="image!=null">
                                    <img src="/img/company.png" class="img-fluid img-thumbnail" style="height: 200px" v-show="image==null"> -->
                                    <div class="col-md-12 mb-3">
                                        <!-- <label for="">image</label> -->
                                        <!-- <input type="file" ref="files" placeholder="Spare image" :class="{'form-control': true,'is-invalid': errors.first('image')}"
                                            v-on:change="handleFilesUpload" name="image" v-validate="!edit ?'': ''"> -->
                                        <!-- <div class="invalid-feedback" v-show="errors.first('image')">{{ errors.first('image')  }}</div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- {{spare}}{{edit}} -->
                        </div>
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
                companies: [],
                assets: [],
                spareTypes: [],
                spare: {
                    id: '',
                    account_id: '',
                    company_id: '',
                    manufacturer_id: '',
                    asset_id: '',
                    spare_type: '',
                    name: '',
                    serial: '',
                    cost: '',
                    status: '',
                    minimum_stock: '',
                    current_stock: '',
                    image: null,
                    description: '',
                    comment: '',
                    edit: false
                },
                id: '',
                account_id: '',
                company_id: '',
                manufacturer_id: '',
                asset_id: '',
                spare_type: '',
                name: '',
                serial: '',
                cost: '',
                status: '',
                minimum_stock: '',
                current_stock: '',
                image: null,
                description: '',
                comment: '',
                uploadedImage: null,
                isLoading: false,
                edit: false
            }
        },
        created() {
            // window.localStorage.setItem("authUser",JSON.stringify(response.data))
            // let authUser = JSON.parse(window.localStorage.getItem('authUser'))

            // console.log('authUser', (authUser.user.account_id))
            // this.spare.account_id = authUser.user.account_id
            // this.asyncFind();
            // this.fetchAssets();
            // this.fetchSpareTypes();

            // if (this.$route.params.id) {
            //     axios.get(`/api/spare/${this.$route.params.id}`, { headers: this.$headers })
            //         .then(response => {
            //             this.spare = response.data.data
            //             console.log("spare", this.spare)
            //             this.placeChanged()
            //         }).catch(error => {
            //         });
            //     this.edit = true
            // }

        },
        computed: {
            // userImage() {
            //     if (this.uploadedImage) {
            //         return this.uploadedImage;
            //     }
            //     return "/storage/" + this.image;
            // }
        },
        methods: {
            // asyncFind(query) {
            //     this.isLoading = true
            //     axios.get("/api/companies", { headers: this.$headers })
            //         .then(response => {
            //             this.companies = response.data;
            //             this.isLoading = false;
            //             console.log("companies", this.companies)
            //         })
            // },
            // fetchAssets(query) {
            //     this.isLoading = true
            //     axios.get("/api/assets", { headers: this.$headers })
            //         .then(response => {
            //             this.assets = response.data;
            //             this.isLoading = false;
            //             console.log("assets", this.assets)
            //         })
            // },
            // fetchSpareTypes(query) {
            //     this.isLoading = true
            //     axios.get("/api/spareTypes", { headers: this.$headers })
            //         .then(response => {
            //             this.spareTypes = response.data;
            //             this.isLoading = false;
            //             console.log("spareTypes", this.spareTypes)
            //         })
            // },
            submitForm() {
                // this.$validator.validate().then(result => {
                //     if (!result) {
                //         return false;
                //     }
                //     else {
                //         // this.handleFilesUpload()
                //         if (this.edit) {
                //             axios.put("/api/spare", this.spare, { headers: this.$headers })
                //                 .then(response => {
                //                     this.$router.push('/spares')
                //                 })
                //                 .catch(error => {
                //                     this.$setErrorsFromResponse(err.response.data);
                //                     this.$emit('error', err.response.data);
                //                 });

                //         } else {
                //             axios.post("/api/spare", this.spare, { headers: this.$headers })
                //                 .then(response => {
                //                     this.$router.push('/spares')
                //                 })
                //                 .catch(error => {
                //                     this.$setErrorsFromResponse(err.response.data);
                //                     this.$emit('error', err.response.data);
                //                 });
                //         }
                //     }
                // });
            },
            // handleFilesUpload($event) {
            //     let uploadedFiles = this.$refs.files.files;

            //     var files = $event.target.files || $event.dataTransfer.files;

            //     for (var i = 0; i < uploadedFiles.length; i++) {
            //         this.image = uploadedFiles[i];
            //         this.createImage(this.image, uploadedFiles[i]);
            //     }
            // },
            // createImage(item, file) {
            //     var image = new Image();
            //     var reader = new FileReader();

            //     reader.onload = (e) => {
            //         this.uploadedImage = e.target.result;
            //     };

            //     reader.readAsDataURL(file);
            // },
            // removeImage: function (item) {
            //     item.image = false;
            // }
        }
    }
</script>