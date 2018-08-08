<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" autocomplete='off' @submit.prevent="submitForm">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <b-form-fieldset label="Role Type">
                                        <b-form-input type="text" v-model="roleType.name" placeholder="Please enter role type"></b-form-input>
                                    </b-form-fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <b-form-textarea id="textarea1" v-model="roleType.comment" placeholder="Comments" :rows="3" :max-rows="6">
                                    </b-form-textarea>
                                </div>
                            </div>

                            <div class="form-group form-actions">
                                <button type="submit" @click.prevent="submitForm" class="btn btn-sm btn-primary">Submit</button>
                                <router-link :to="{ name: 'Role Type List'}">
                                    <button type="button" class="btn btn-sm btn-warning">Cancel</button>
                                </router-link>
                            </div>
                            {{roleType}} {{edit}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'forms',
        components: {
        },
        data() {
            return {
                roleType: {},
                edit: false
            }
        },
        created() {
            console.log(this.$store.state.user)
            if (!this.$store.state.user)
                this.$router.push('/login')
            this.roleType.account_id = this.$store.state.user.account_id

            if (this.$route.params.id) {
                this.edit = true
                this.fetchById(this.$route.params.id)
            }
        },
        methods: {
            submitForm() {
                if (this.edit) {
                    this.roleType.updated_by = this.$store.state.user.id
                    this.$http.put("/api/roleType", this.roleType)
                        .then(response => {
                            this.$router.push('/roleTypes/')
                        })
                        .catch(error => {
                            this.$setErrorsFromResponse(err.response.data);
                            this.$emit('error', err.response.data);
                        });

                } else {
                    this.roleType.created_by = this.$store.state.user.id
                    this.$http.post("/api/roleType", this.roleType)
                        .then(response => {
                            this.$router.push('/roleTypes/')
                        })
                        .catch(error => {
                            this.$setErrorsFromResponse(err.response.data);
                            this.$emit('error', err.response.data);
                        });
                }
            },
            fetchById(id) {
                this.$http.get(`/api/roleType/${id}`)
                    .then(response => {
                        this.roleType = response.data.data
                        console.log("roleType", this.roleType)
                    })
            }
        }
    }
</script>