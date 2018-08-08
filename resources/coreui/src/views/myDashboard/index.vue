<template>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Nestle Asset Management Home</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-2">
                <h4>Tasks</h4>
                <div class="card text-white bg-info">
                    <router-link :to="{ name: 'Add Job'}">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-0">
                                <i class="fas fa-briefcase" style="color:white;">
                                </i>
                            </div>
                            <div class="h4 mb-0">
                                <font color="white">Create A Job</font>
                            </div>
                            <!-- <small class="text-muted text-uppercase font-weight-bold">Create A Job</small> -->
                            <div class="progress-white progress-xs mt-3 progress">
                                <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                    <!---->
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="card text-white bg-danger">
                    <router-link :to="{ name: 'Jobs List'}">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-0">
                                <i class="fab fa-searchengin"></i>
                            </div>
                            <div class="h4 mb-0"> <font color="white">Find A Job</font></div>
                            <!-- <small class="text-muted text-uppercase font-weight-bold">Find A Job</small> -->
                            <div class="progress-white progress-xs mt-3 progress">
                                <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                    <!---->
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="card text-white bg-success">
                    <router-link :to="{ name: 'Add Asset'}">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-0">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="h4 mb-0"><font color="white">Add Asset</font></div>
                        <!-- <small class="text-muted text-uppercase font-weight-bold">Create Asset</small> -->
                        <div class="progress-white progress-xs mt-3 progress">
                            <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                <!---->
                            </div>
                        </div>
                    </div>
                </router-link>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>
                    <font color="white">Tasks</font>
                </h4>
                <div class="card text-white bg-warning">
                    <router-link :to="{ name: 'Add Company'}">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-0">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="h4 mb-0"><font color="white">New Customer</font></div>
                        <!-- <small class="text-muted text-uppercase font-weight-bold">Create A Job</small> -->
                        <div class="progress-white progress-xs mt-3 progress">
                            <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                <!---->
                            </div>
                        </div>
                    </div>
                </router-link>
                </div>
                <div class="card text-white bg-danger">
                    <router-link :to="{ name: 'Add Job'}">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-0">
                            <i class="fas fa-people-carry"></i>
                        </div>
                        <div class="h4 mb-0"><font color="white">New Placement</font></div>
                        <!-- <small class="text-muted text-uppercase font-weight-bold">Find A Job</small> -->
                        <div class="progress-white progress-xs mt-3 progress">
                            <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                <!---->
                            </div>
                        </div>
                    </div>
                </router-link>
                </div>
                <div class="card text-white bg-success">
                    <router-link :to="{ name: 'Search Form'}">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-0">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="h4 mb-0"><font color="white">Find Asset</font></div>
                        <!-- <small class="text-muted text-uppercase font-weight-bold">Create Asset</small> -->
                        <div class="progress-white progress-xs mt-3 progress">
                            <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                <!---->
                            </div>
                        </div>
                    </div>
                </router-link>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>KPI's</h4>
                <div class="card text-black">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-1">
                            <!-- <i class="icon-people"></i> -->
                            678
                        </div>
                        <div class="progress-blue progress-xs mt-3 progress">
                            <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                <!---->
                            </div>
                        </div>
                        <!-- <small class="text-muted text-uppercase font-weight-bold">Create A Job</small> -->
                        <div class="h4 mb-0">Asset Under Control</div>
                    </div>
                </div>
                <div class="card text-black">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-1">
                            <!-- <i class="icon-people"></i> -->
                            126
                        </div>
                        <div class="progress-danger progress-xs mt-3 progress">
                            <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                <!---->
                            </div>
                        </div>
                        <!-- <small class="text-muted text-uppercase font-weight-bold">Create A Job</small> -->
                        <div class="h4 mb-0">Open Jobs</div>
                    </div>
                </div>
                <div class="card text-black">
                    <div class="card-body">
                        <div class="h1 text-muted text-right mb-1">
                            <!-- <i class="icon-people"></i> -->
                            34
                        </div>
                        <div class="progress-danger progress-xs mt-3 progress">
                            <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" class="progress-bar" style="width: 25%;">
                                <!---->
                            </div>
                        </div>
                        <!-- <small class="text-muted text-uppercase font-weight-bold">Create A Job</small> -->
                        <div class="h4 mb-0">Inspection Due</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <h4>Diagnostics</h4>
                <b-card header="<i class='fa fa-align-justify'></i>">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>List</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Job 3456 Over Due.</td>
                            </tr>
                            <tr>
                                <td>Asset 234 Cup Count Excceded</td>
                            </tr>
                            <tr>
                                <td>Job 897 Not Allocated To Technician</td>
                            </tr>
                            <tr>
                                <td>Job 3456 Over Due.</td>
                            </tr>
                            <tr>
                                <td>Asset 234 Cup Count Excceded</td>
                            </tr>
                            <tr>
                                <td>Asset 234 Cup Count Excceded</td>
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
    </div>
</template>

<script>
    export default {
        name: "forms",
        components: {},
        data() {
            return {};
        },
        created() {
            console.log(`Heeeeeee`, this.$store.state.user)
            if(!this.$store.state.user)
                this.$router.push('/login')
        },
    };
</script>