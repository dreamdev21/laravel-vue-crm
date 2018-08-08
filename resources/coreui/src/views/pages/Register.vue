<template>
    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card mx-4">
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-muted">User Information</p>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                                <input type="text" class="form-control" v-model="user.first_name" placeholder="First Name">
                            </div>

                            <div class="input-group mb-3">
                                 <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                               <input type="text" class="form-control" v-model="user.last_name" placeholder="Last Name">
                            </div>

                             <div class="input-group mb-3">
                                 <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                               <input type="text" class="form-control" v-model="user.username" placeholder="User Name">
                            </div>

                             <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-phone"></i>
                                </span>
                               <input type="text" class="form-control" v-model="user.phone_number" placeholder="Phone Number">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" v-model="user.email" placeholder="Email">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-lock"></i>
                                </span>
                                <input type="password" class="form-control" v-model="user.password" placeholder="Password">
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-addon">
                                    <i class="icon-lock"></i>
                                </span>
                                <input type="password" class="form-control" v-model="user.repeatPassword" placeholder="Repeat password">
                            </div>

                            <button type="button" @click.prevent="register" class="btn btn-block btn-success">Create Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "user",
        data() {
            return {
                user: {
                    username: "",
                    first_name:"",
                    last_name:"",
                    phone_number:"",
                    email: "",
                    account_id:1,
                    company_id:1,
                    is_user:1,
                    key_contact:1,
                    password: "",
                    repeatPassword: ""
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
                if(this.user.password !== this.user.repeatPassword){
                    console.log('Password is not same')
                    return
                }
                this.$http.post('/api/register', this.user)
                    .then(
                        (response) => {
                            console.log(response)
                            this.$router.push(`/login`)
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
    }
</script>