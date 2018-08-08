<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="form-group form-actions">   
                            <router-link :to="{ name: 'Spare Type List'}">
                                <button type="button" class="btn btn-sm btn-warning pull-right">Cancel</button>
                            </router-link>
                            <button type="submit" style="margin-right: 10px" class="btn btn-sm btn-primary pull-right">Submit</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <b-form-fieldset label="Spare Name">
                                        <b-form-input type="text" v-model="spareType.type" placeholder="Please enter Spare Type"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <b-form-textarea id="textarea1" v-model="spareType.comment" placeholder="Comments" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                            </div>
                            {{spareType}} {{edit}}
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
                spareType: {
                    id: '',
                    account_id: '',
                    type: '',
                    comment: ''
                },
                id: '',
                account_id: '',
                type: '',
                comment: '',
                edit: false
            }
        },
        created() {
            // window.localStorage.setItem("authUser",JSON.stringify(response.data))
            // let authUser = JSON.parse(window.localStorage.getItem('authUser'))

            // console.log('authUser', (authUser.user.account_id))
            // this.spareType.account_id = authUser.user.account_id

            // if (this.$route.params.id) {
            //     axios.get(`/api/spareType/${this.$route.params.id}`, { headers: this.$headers })
            //         .then(response => {
            //             this.spareType = response.data.data
            //             console.log("spareType", this.spareType)
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
                //             axios.put("/api/spareType", this.spareType, { headers: this.$headers })
                //                 .then(response => {
                //                     this.$router.push('/spareTypes/')
                //                 })
                //                 .catch(error => {
                //                     this.$setErrorsFromResponse(err.response.data);
                //                     this.$emit('error', err.response.data);
                //                 });

                //         } else {
                //             axios.post("/api/spareType", this.spareType, { headers: this.$headers })
                //                 .then(response => {
                //                     this.$router.push('/spareTypes/')
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