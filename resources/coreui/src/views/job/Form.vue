<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form action="/api/companies" enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="">Asset</label>
                                    <select class="form-control" v-model="job.asset_id">
                                        <option value="">Select Asset</option>
                                        <option v-for="asset in assets" v-bind:key="asset.id" v-bind:value="asset.name">{{asset.id}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Job Type</label>
                                    <select class="form-control" v-model="job.type">
                                        <option value="">Select</option>
                                        <option v-for="jobType in jobTypes" v-bind:key="jobType.id" v-bind:value="jobType.id">{{jobType.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Job Status</label>
                                    <select class="form-control" v-model="job.status_id">
                                        <option value="">Select</option>
                                        <option v-for="jobStat in jobStats" v-bind:key="jobStat.id" v-bind:value="jobStat.id">{{jobStat.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="">Job Priority</label>
                                    <select class="form-control" v-model="job.priority_id">
                                        <option value="">Select</option>
                                        <option v-for="priority in priorities" v-bind:key="priority.id" v-bind:value="priority.id">{{priority.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Allocated Company</label>
                                    <select class="form-control" v-model="job.company_id">
                                        <option value="">Select</option>
                                        <option v-for="company in companies" v-bind:key="company.id" v-bind:value="company.name">{{company.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="">Allocated Technician</label>
                                    <select class="form-control" v-model="job.contact_id">
                                        <option value="Wong, Raymond">Wong, Raymond</option>
                                        <option value="Solanki, Ketan">Solanki, Ketan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <b-form-fieldset label="Labour Cost">
                                        <b-form-input type="text" v-model="job.cost_labour" placeholder="Please enter Labour Cost"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-4">
                                    <b-form-fieldset label="Labour Hours">
                                        <b-form-input type="text" v-model="job.hours" placeholder="Please enter Labour Hours"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                                <div class="form-group col-sm-4">
                                     <b-form-fieldset label="Material Costs">
                                        <b-form-input type="text" v-model="job.material_labour" placeholder="Please enter Material Cost"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <b-form-textarea id="textarea1" v-model="job.description" placeholder="Description" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <b-form-textarea id="textarea1" v-model="job.comment" placeholder="Comments" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <router-link :to="{ name: 'Jobs List'}">
                                    <button type="button" class="btn btn-sm btn-warning">Cancel</button>
                                </router-link>
                            </div>
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
                priorities: [],
                jobStats: [],
                jobTypes: [],
                job: {
                },
                job: {
                    id: '',
                    account_id: '',
                    contact_id: '',
                    company_id: '',
                    asset_id: '',
                    type: '',
                    cost_labour: '',
                    material_labour: '',
                    hours: '',
                    status_id: '',
                    comment: '',
                    description: '',
                    priority_id: '',
                    inspection_id: '',
                },
                id: '',
                account_id: '',
                contact_id: '',
                company_id: '',
                asset_id: '',
                type: '',
                cost_labour: '',
                material_labour: '',
                hours: '',
                comment: '',
                description: '',
                priority_id: '',
                inspection_id: '',
            }
        },
        created() {
            // // window.localStorage.setItem("authUser",JSON.stringify(response.data))
            // let authUser = JSON.parse(window.localStorage.getItem('authUser'))
            // console.log('authUser', (authUser.user.account_id))
            // this.job.account_id = authUser.user.account_id

            // this.fetchCompanies();
            // this.findAssets();
            // this.fetchPriorities();
            // this.fetchJobStats();
            // this.fetchJobTypes();

            // if (this.$route.params.id) {
            //     axios.get(`/api/job/${this.$route.params.id}`, { headers: this.$headers })
            //         .then(response => {
            //             this.job = response.data.data
            //             console.log("job", this.job)
            //             this.placeChanged()
            //         }).catch(error => {
            //         });
            //     this.edit = true
            // }
        },
        methods: {
            // fetchCompanies(query) {
            //     this.isLoading = true
            //     axios.get("/api/companies", { headers: this.$headers })
            //         .then(response => {
            //             this.companies = response.data;
            //             this.isLoading = false;
            //             console.log("companies", this.companies)
            //         })
            // },
            // findAssets(query) {
            //     axios.get("/api/assets", { headers: this.$headers })
            //         .then(response => {
            //             this.assets = response.data;
            //             console.log("assets", this.assets)
            //         })
            // },
            // fetchPriorities(query) {
            //     axios.get("/api/priorities", { headers: this.$headers })
            //         .then(response => {
            //             this.priorities = response.data;
            //             console.log("priorities", this.priorities)
            //         })
            // },
            // fetchJobStats(query) {
            //     axios.get("/api/jobStats", { headers: this.$headers })
            //         .then(response => {
            //             this.jobStats = response.data;
            //             console.log("jobStats", this.jobStats)
            //         })
            // },
            // fetchJobTypes(query) {
            //     axios.get("/api/jobTypes", { headers: this.$headers })
            //         .then(response => {
            //             this.jobTypes = response.data;
            //             console.log("jobTypes", this.jobTypes)
            //         })
            // },
            submitForm() {
                // this.$validator.validate().then(result => {
                //     if (!result) {
                //         return false;
                //     }
                //     else {
                //         if (this.edit) {
                //             axios.put("/api/job", this.job, { headers: this.$headers })
                //                 .then(response => {
                //                     this.$router.push('/jobs')
                //                 })
                //                 .catch(error => {
                //                     this.$setErrorsFromResponse(err.response.data);
                //                     this.$emit('error', err.response.data);
                //                 });

                //         } else {
                //             axios.post("/api/job", this.job, { headers: this.$headers })
                //                 .then(response => {
                //                     this.$router.push('/jobs')
                //                 })
                //                 .catch(error => {
                //                     this.$setErrorsFromResponse(err.response.data);
                //                     this.$emit('error', err.response.data);
                //                 });
                //         }

                //     }
                // });
            },
        }
    }
</script>