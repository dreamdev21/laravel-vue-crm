<template>
	<div class="animated fadeIn">
		<div class="row">
			<!--/.col-->
			<div class="col-lg-12">
				<router-link :to="{ name: 'Add Model Type'}">
					<button class="btn btn-warning">Add</button>
				</router-link>
				<b-card header="<i class='fa fa-align-justify'></i> Striped Table">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Yiorgos Avraamu</td>
								<td>2012/01/01</td>
								<td>Member</td>
								<td>
									<span class="badge badge-success">Active</span>
								</td>
								<td>
									<b-button type="reset" size="sm" variant="success">
									<i class="icon-eye"></i> Details</b-button>
									<b-button type="reset" size="sm" variant="primary">
									<i class="fa fa-edit"></i> Edit</b-button>
									<b-button type="reset" size="sm" variant="danger">
									<i class="icon-trash"></i> Delete</b-button>
								</td>
							</tr>
							<tr>
								<td>Avram Tarasios</td>
								<td>2012/02/01</td>
								<td>Staff</td>
								<td>
									<span class="badge badge-danger">Banned</span>
								</td>
								<td>
									<b-button type="reset" size="sm" variant="success">
									<i class="icon-eye"></i> Details</b-button>
									<b-button type="reset" size="sm" variant="primary">
									<i class="fa fa-edit"></i> Edit</b-button>
									<b-button type="reset" size="sm" variant="danger">
									<i class="icon-trash"></i> Delete</b-button>
								</td>
							</tr>
							<tr>
								<td>Quintin Ed</td>
								<td>2012/02/01</td>
								<td>Admin</td>
								<td>
									<span class="badge badge-secondary">Inactive</span>
								</td>
								<td>
									<b-button type="reset" size="sm" variant="success">
									<i class="icon-eye"></i> Details</b-button>
									<b-button type="reset" size="sm" variant="primary">
									<i class="fa fa-edit"></i> Edit</b-button>
									<b-button type="reset" size="sm" variant="danger">
									<i class="icon-trash"></i> Delete</b-button>
								</td>
							</tr>
							<tr>
								<td>Enéas Kwadwo</td>
								<td>2012/03/01</td>
								<td>Member</td>
								<td>
									<span class="badge badge-warning">Pending</span>
								</td>
								<td>
									<b-button type="reset" size="sm" variant="success">
									<i class="icon-eye"></i> Details</b-button>
									<b-button type="reset" size="sm" variant="primary">
									<i class="fa fa-edit"></i> Edit</b-button>
									<b-button type="reset" size="sm" variant="danger">
									<i class="icon-trash"></i> Delete</b-button>
								</td>
							</tr>
							<tr>
								<td>Agapetus Tadeáš</td>
								<td>2012/01/21</td>
								<td>Staff</td>
								<td>
									<span class="badge badge-success">Active</span>
								</td>
								<td>
									<b-button type="reset" size="sm" variant="success">
									<i class="icon-eye"></i> Details</b-button>
									<b-button type="reset" size="sm" variant="primary">
									<i class="fa fa-edit"></i> Edit</b-button>
									<b-button type="reset" size="sm" variant="danger">
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
		methods: {
			click() {
				// do nothing
			}
		}
	}
</script>