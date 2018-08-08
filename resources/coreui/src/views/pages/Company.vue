<template>
    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card mx-4">
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-muted">Company Information</p>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                   <i class="fa fa-building fa-lg mt-2"></i>
                                </span>
                                <input type="text" class="form-control" v-model="company.name" placeholder="Enter Company Name">
                            </div>

                            <div class="input-group mb-3">
                                 <span class="input-group-addon">
                                    <i class="fa fa-desktop fa-lg mt-2"></i>
                                </span>
                               <input type="text" class="form-control" v-model="company.website" placeholder="Website URL">
                            </div>

                             <div class="input-group mb-3">
                                 <span class="input-group-addon">
                                   <i class="fa fa-location-arrow fa-lg mt-2"></i>
                                </span>
                               <input type="text" class="form-control" v-model="company.address" placeholder="Enter Company Address">
                            </div>
                             <div class="input-group mb-3">
                                 <span class="input-group-addon">
                                    <i class="fa fa-location-arrow fa-lg mt-2"></i>
                                </span>
                               <input type="text" class="form-control" v-model="company.post_code" placeholder="Post Code">
                            </div>

                             <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-phone"></i>
                                </span>
                               <input type="text" class="form-control" v-model="company.phone_number" placeholder="Phone Number">
                            </div>

                            <button type="button" @click.prevent="register" class="btn btn-block btn-success">Create Company</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "company",
        data() {
            return {
                company: {
                    name: "",
                    website:"",
                    address:"",
                    phone_number:"",
                    post_code: "",
                    account_id:1,
                    is_parent:1,
                    is_enable:1
                }
               
            }
        },

        created() {
        },
         computed: {
            counter: function() {
                return this.$store.getters.counter
            }
        },

        methods: {
            register() {
                this.$http.post('/api/company', this.company)
                    .then(
                        (response) => {
                            console.log(response)
                            this.$router.push("/register/");
                            
                        }
                    )
                    .catch(
                        (error) => {
                            console.log(error)
                            this.$swal({
                                title: "",
                                text: "IDかパスワードが違います。",
                                type: "warning",
                                confirmButtonText: "OK"
                            });
                        }
                    );
            },
        }
    };
</script>