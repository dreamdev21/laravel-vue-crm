<template>
    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group mb-0">
                        <div class="card p-4">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-addon">
                                        <i class="icon-user"></i>
                                    </span>
                                    <input type="text" class="form-control" v-model="login.email" placeholder="Username">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-addon">
                                        <i class="icon-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" v-model="login.password" placeholder="Password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" @click.prevent="signin" class="btn btn-primary px-4">Login</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                            <div class="card-body text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p></p>
                                    <router-link :to="{ name: 'Account'}">
                                        <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
                                    </router-link>
                                </div>
                            </div>
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
                login: {
                    email: "",
                    password: ""
                }

            }
        },

        created() {
        },
        computed: {
            counter: function () {
                return this.$store.getters.counter
            }
        },

        methods: {
            signin() {
                this.$http.post('/api/auth/login', this.login)
                    .then(
                        (response) => {
                            console.log(response)
                            this.$store.commit('changeUser', response.data.user)
                            this.$store.commit('changeToken', response.data.access_token)
                            this.$router.push('/dashboard')
                            this.$http.defaults.headers.common["Authorization"] = `Bearer ${response.data.access_token}`
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