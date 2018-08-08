<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <b-form-fieldset label="Job Status">
                                        <b-form-input type="text" v-model="jobStat.name" placeholder="Please enter job status"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <b-form-textarea id="textarea1" v-model="jobStat.comment" placeholder="Comments" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                            </div>

                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <router-link :to="{ name: 'Restaurants'}">
                                    <button type="button" class="btn btn-sm btn-warning">Cancel</button>
                                </router-link>
                            </div>
                            {{jobStat}} {{edit}}
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
                jobStat: {
                    id: '',
                    account_id: '',
                    name: '',
                    comment: ''
                },
                id: '',
                account_id: '',
                name: '',
                comment: '',
                edit: false
            }
        },
        created() {
            // window.localStorage.setItem("authUser",JSON.stringify(response.data))
            // let authUser = JSON.parse(window.localStorage.getItem('authUser'))

            // console.log('authUser', (authUser.user.account_id))
            this.jobStat.account_id = 1

            if (this.$route.params.id) {
                axios.get(`/api/jobStat/${this.$route.params.id}`)
                    .then(response => {
                        this.jobStat = response.data.data
                        console.log("jobStat", this.jobStat)
                    }).catch(error => {
                    });
                this.edit = true
            }
        },
        methods: {
            submitForm() {
                this.$validator.validate().then(result => {
                    if (!result) {
                        return false;
                    }
                    else {
                        if (this.edit) {
                            axios.put("/api/jobStat", this.jobStat)
                                .then(response => {
                                    this.$router.push('/jobStats/')
                                })
                                .catch(error => {
                                    this.$setErrorsFromResponse(err.response.data);
                                    this.$emit('error', err.response.data);
                                });

                        } else {
                            axios.post("/api/jobStat", this.jobStat)
                                .then(response => {
                                    this.$router.push('/jobStats/')
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