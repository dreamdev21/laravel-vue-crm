<template>
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-sm-12">
				<b-card>
					<div slot="header">
						<strong>Normal</strong> Form
					</div>
					<b-form-fieldset label="Name" description="Please enter name">
						<b-form-input v-model="restaurant.name" placeholder="Enter name.."></b-form-input>
					</b-form-fieldset>
					<b-form-fieldset label="Address" description="Please enter your address.">
						<b-form-input v-model="restaurant.address" placeholder="Enter address.."></b-form-input>
					</b-form-fieldset>
					<b-form-fieldset label="Phone" description="Please enter your phone.">
						<b-form-input v-model="restaurant.phone" placeholder="Enter phone.."></b-form-input>
					</b-form-fieldset>
					<b-form-fieldset label="Email" description="Please enter your email.">
						<b-form-input v-model="restaurant.email" placeholder="Enter Email.."></b-form-input>
					</b-form-fieldset>
					<label class="switch switch-primary">
						<input type="checkbox"  v-model="restaurant.enabled"  class="switch-input" checked>
						<span class="switch-slider"></span>
					</label>
					<div slot="footer">
						<div class="form-actions">
							<b-button type="submit" @click.prevent="create" variant="primary">Save changes</b-button>
							<b-button type="reset" variant="danger">Reset</b-button>
							<router-link :to="{ path: 'restaurants'}">
								<b-button type="button" variant="secondary">Cancel</b-button>
							</router-link>
						</div>
					</div>
				</b-card>
			</div>
		</div>
		<!--/.row-->
	</div>
</template>

<script>
    export default {
        data() {
            return {
                restaurant: {
                    created_by: "",
                    updated_by: ""
                }
               
            }
        },

        created() {
            console.log(this.$store.getters.getUser)
            // if(this.$store.getters.getUser){
            //     restaurant.created_by = this.$store.getter.getUser.id,
            //     restaurant.updated_by = this.$store.getter.getUser.id
            // }
            // else{
            //      this.$router.push('/login')
            // }
               
        },
         computed: {
            counter: function() {
                return this.$store.getters.counter
            }
        },

        methods: {
            create() {
                this.$http.post('/api/resturant', this.restaurant)
                .then(
                    (response) => {
                        console.log(response)
                        
                    }
                )
                .catch(
                    (error) => {
                        console.log(error)
                        
                    }
                )
            },
        }
    }
</script>