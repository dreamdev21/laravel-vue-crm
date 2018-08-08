<template>
	<div class="animated fadeIn">
		<div class="row">
			<!--/.col-->
			<div class="col-lg-12">
				<router-link :to="{ name: 'Add Role Type'}">
					<button class="btn btn-warning">Add</button>
				</router-link>
				<b-card header="<i class='fa fa-align-justify'></i> Striped Table">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Role Type</th>
								<th>Comment</th>
								<th>Created by</th>
								<th>Updated By</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="roleType in roleTypes" v-bind:key="roleType.id">
								<td>{{ roleType.name }}</td>
								<td>{{ roleType.comment }}</td>
								<td>{{ roleType.created_by }}</td>
								<td>{{ roleType.updated_by }}</td>
								<td>
									<router-link :to="{ path: `/roleType/${roleType.id}`}">
										<b-button type="reset" size="sm" variant="danger">
											<i class="icon-trash"></i> Edit</b-button>
									</router-link>
									<b-button @click.prevent="erase(roleType.id)" type="reset" size="sm" variant="danger">
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
				roleTypes: []
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
				this.$http.get(`/api/roleTypes`)
					.then(response => {
						this.roleTypes = response.data.data
						console.log("roleTypes", this.roleTypes)
					})
					.catch(err => console.log(err));
			},
			erase(id) {
				if (confirm("Are You Sure?")) {
					this.$http.delete(`api/roleType/${id}`)
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