<template>
	<div class="animated fadeIn">
		<div class="row">
			<!--/.col-->
			<div class="col-lg-12">
				<router-link :to="{ name: 'Add Contact'}">
					<button class="btn btn-warning">Add</button>
				</router-link>
				<b-card header="<i class='fa fa-align-justify'></i> Striped Table">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Contact Name</th>
								<th>Company Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Contact Type</th>
								<th>Created by</th>
								<th>Updated By</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="user in users" v-bind:key="user.id">
								<td>{{ user.last_name +' , '+ user.first_name }}</td>
								<td>{{ user.company.name }}</td>
								<td>{{ user.email }}</td>
								<td>{{ user.phone_number }}</td>
								<td>{{ user.contact_type }}</td>
								<td>{{ user.first_name }}</td>
								<td>{{ user.first_name }}</td>
								<td>
									<router-link :to="{ path: `/user/${user.id}`}">
										<b-button type="reset" size="sm" variant="danger">
											<i class="icon-trash"></i> Edit</b-button>
									</router-link>
									<b-button @click.prevent="erase(user.id)" type="reset" size="sm" variant="danger">
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
				users: []
			}
		},
		created() {
			console.log(this.$store.state.user)
			if (!this.$store.state.user)
				this.$router.push('/login')
			this.fetch();
		},
		methods: {
			fetch() {
				this.$http.get(`/api/users`)
					.then(response => {
						this.users = response.data.data
						console.log("users", this.users)
					})
					.catch(err => console.log(err));
			},
			erase(id) {
				if (confirm("Are You Sure?")) {
					this.$http.delete(`api/user/${id}`)
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