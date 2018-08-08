<template>
	<div class="animated fadeIn">
		<div class="row">
			<!--/.col-->
			<div class="col-lg-12">
				<router-link :to="{ name: 'Add Location'}">
					<button class="btn btn-warning">Add</button>
				</router-link>
				<b-card header="<i class='fa fa-align-justify'></i> Striped Table">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Contact Person</th>
								<th>Address</th>
								<th>Post Code</th>
								<th>Phone Number</th>
								<th>Created by</th>
								<th>Updated By</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="location in locations" v-bind:key="location.id">
								<td>{{ location.user_id }}</td>
								<td>{{ location.address }}</td>
								<td>{{ location.post_code }}</td>
								<td>{{ location.phone_number }}</td>
								<td>{{ location.created_by }}</td>
								<td>{{ location.updated_by }}</td>
								<td>
									<router-link :to="{ path: `/location/${location.id}`}">
										<b-button type="reset" size="sm" variant="danger">
											<i class="icon-trash"></i> Edit</b-button>
									</router-link>
									<b-button @click.prevent="erase(location.id)" type="reset" size="sm" variant="danger">
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
				locations: []
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
				this.$http.get(`/api/locations`)
					.then(response => {
						this.locations = response.data.data
						console.log("locations", this.locations)
					})
					.catch(err => console.log(err));
			},
			erase(id) {
				if (confirm("Are You Sure?")) {
					this.$http.delete(`api/location/${id}`)
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