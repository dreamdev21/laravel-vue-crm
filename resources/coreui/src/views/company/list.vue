<template>
	<div class="animated fadeIn">
		<div class="row">
			<!--/.col-->
			<div class="col-lg-12">
				<router-link :to="{ name: 'Add Company'}">
					<button class="btn btn-warning">Add</button>
				</router-link>
				<b-card header="<i class='fa fa-align-justify'></i> Striped Table">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Account Name</th>
								<th>Company Name</th>
								<th>Website</th>
								<th>Address</th>
								<th>Post Code</th>
								<th>Type</th>
								<th>Phone Number</th>
								<th>Created by</th>
								<th>Updated By</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="company in companies" v-bind:key="company.id">
								<td>{{ company.account.name }}</td>
								<td>{{ company.name }}</td>
								<td>{{ company.website }}</td>
								<td>{{ company.address }}</td>
								<td>{{ company.post_code }}</td>
								<td>{{ company.type }}</td>
								<td>{{ company.phone_number }}</td>
								<td>{{ company.user.first_name }}</td>
								<td>{{ company.user.first_name }}</td>
								<td>
									<router-link :to="{ path: `/company/${company.id}`}">
										<b-button type="reset" size="sm" variant="danger">
											<i class="icon-trash"></i> Edit</b-button>
									</router-link>
									<b-button @click.prevent="erase(company.id)" v-on:click="showAlert" type="reset" size="sm" variant="danger">
										<i class="icon-trash"></i> Delete</b-button>
								</td>
							</tr>
						</tbody>
					</table>

					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#">Prev</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">1</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">4</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</b-card>
			</div>
			<!--/.col-->
		</div>
		<!--/.row-->
	</div>
</template>

<script>
	export default {
		name: 'list',
		data() {
			return {
				companies: []
			}
		},
		created() {
			console.log(this.$store.state.user)
			if (!this.$store.state.user)
				this.$router.push('/login')
			this.fetch();
		},
		methods: {
			showAlert(){
            // Use sweetalret2
            this.$swal('Company Deleted Successfully');
            },
			fetch() {
				this.$http.get(`/api/companies`,
					{
						headers: {
							Authorization: `Bearer ${this.$store.state.token}`
						}
					})
					.then(response => {
						this.companies = response.data.data
						console.log("companies", this.companies)
					})
					.catch(err => console.log(err));
			},
			erase(id) {
				if (confirm("Are You Sure?")) {
					this.$http.delete(`api/company/${id}`)
					.then(response => {
						alert("Removed");
						this.fetch();
					})
					.catch(err => console.log(err));
				}
			}
		}
	}
</script>