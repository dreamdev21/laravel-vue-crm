<template>
    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card mx-4">
                        <div class="card-body p-4">
                            <h1>Create</h1>
                            <p class="text-muted">Account</p>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                                <input type="text"  class="form-control" v-model="account.name" placeholder="Account Name">
                            </div>

                            <button type="button" @click.prevent="submit" class="btn btn-block btn-success">Create Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { required, minLength } from 'vuelidate/lib/validators'
    export default {
        name: "account",
        data() {
            return {
                account: {
                    name: "",
                    enable:1,     
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
            submit() {
                this.$http.post('/api/account', this.account)
                .then(
                    (response) => {
                        console.log(response)
                        this.$router.push("/company/");
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