<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <b-form-fieldset label="Model Type">
                                        <b-form-input type="text" v-model="modelType.type" placeholder="Please enter Model Type"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <b-form-textarea id="textarea1" v-model="modelType.comment" placeholder="Comments" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                            </div>

                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <router-link :to="{ name: 'Role Type List'}">
                                    <button type="button" class="btn btn-sm btn-warning">Cancel</button>
                                </router-link>
                            </div>
                            {{modelType}} {{edit}}
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
                modelType: {
                    id: '',
                    account_id: '',
                    type: '',
                    comment: ''
                },
                id: '',
                account_id: '',
                type:'',
                comment: '',
                edit: false
            }
        },
        created() {
            // // window.localStorage.setItem("authUser",JSON.stringify(response.data))
            // let authUser = JSON.parse(window.localStorage.getItem('authUser'))

            // console.log('authUser', (authUser.user.account_id))
            // this.modelType.account_id = authUser.user.account_id

            // if (this.$route.params.id) {
            //     axios.get(`/api/modelType/${this.$route.params.id}`, { headers: this.$headers })
            //         .then(response => {
            //             this.modelType = response.data.data
            //             console.log("modelType", this.modelType)
            //         }).catch(error => {
            //         });
            //     this.edit = true
            // }
        },
        methods: {
            submitForm() {
                // this.$validator.validate().then(result => {
                //     if (!result) {
                //         return false;
                //     }
                //     else {
                //         if (this.edit) {
                //             axios.put("/api/modelType", this.modelType, { headers: this.$headers })
                //                 .then(response => {
                //                     this.$router.push('/modelTypes/')
                //                 })
                //                 .catch(error => {
                //                     this.$setErrorsFromResponse(err.response.data);
                //                     this.$emit('error', err.response.data);
                //                 });

                //         } else {
                //             axios.post("/api/modelType", this.modelType, { headers: this.$headers })
                //                 .then(response => {
                //                     this.$router.push('/modelTypes/')
                //                 })
                //                 .catch(error => {
                //                     this.$setErrorsFromResponse(err.response.data);
                //                     this.$emit('error', err.response.data);
                //                 });
                //         }
                //     }
                // });
            }
        }
    }
</script>