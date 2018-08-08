import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '../containers/Full'

// Views
import Dashboard from '../views/Dashboard'
import Charts from '../views/Charts'
import Widgets from '../views/Widgets'

// Views - Components
import Buttons from '../views/components/Buttons'
import SocialButtons from '../views/components/SocialButtons'
import Cards from '../views/components/Cards'
import Forms from '../views/components/Forms'
import Modals from '../views/components/Modals'
import Switches from '../views/components/Switches'
import Tables from '../views/components/Tables'

// Views - Icons
import FontAwesome from '../views/icons/FontAwesome'
import SimpleLineIcons from '../views/icons/SimpleLineIcons'

// Views - Pages
import Page404 from '../views/pages/Page404'
import Page500 from '../views/pages/Page500'
import Login from '../views/pages/Login'
import Register from '../views/pages/Register'
import Account from '../views/pages/Account'
import Company from '../views/pages/Company'


// Views - Dashboard
import MyDashboard from '../views/myDashboard/index'

// Views - Company
import CompanyForm from '../views/company/Form'
import CompanyList from '../views/company/List'

// Views - User
import UserForm from '../views/user/Form'
import UserList from '../views/user/List'
import NewUserForm from '../views/user/Forms'

// Views - Location
import LocationForm from '../views/location/Form'
import LocationList from '../views/location/List'

// Views - Job Stat
import RoleTypeForm from '../views/roleType/Form'
import RoleTypeList from '../views/roleType/List'

// Views - Job Stat
import jobStatForm from '../views/jobStat/Form'
import JobStatList from '../views/jobStat/List'

// Views - Job Type
import JobTypeForm from '../views/jobType/Form'
import JobTypeList from '../views/jobType/List'

// Views - Job Priority
import JobPriorityForm from '../views/priority/Form'
import JobPriorityList from '../views/priority/List'

// Views - Job Model
import JobForm from '../views/job/Form'
import JobList from '../views/job/List'

// Views - Assets
import AssetForm from '../views/asset/Form'
import AssetList from '../views/asset/List'

// Views - Asset Model
import AssetModelForm from '../views/assetModel/Form'
import AssetModelList from '../views/assetModel/List'

// Views - Spare
import SpareForm from '../views/spare/Form'
import SpareList from '../views/spare/List'

// Views - Spare Type
import SpareTypeForm from '../views/spareType/Form'
import SpareTypeList from '../views/spareType/List'

// Views - Model Type
import ModelTypeForm from '../views/modelType/Form'
import ModelTypeList from '../views/modelType/List'







Vue.use(Router)

const router = new Router({
	mode: 'history', // Demo is living in GitHub.io, so required!
	linkActiveClass: 'active',
	scrollBehavior: () => ({
		y: 0
	}),
	routes: [{
			path: '/',
			redirect: '/dashboard',
			name: 'Home',
			component: Full,
			children: [{
					path: 'dashboard',
					name: 'My-Dashboard',
					component: MyDashboard,
					meta: {
						requireAuth: true
					}
				},
				{
					path: 'charts',
					name: 'Charts',
					component: Charts
				},
				{
					path: 'widgets',
					name: 'Widgets',
					component: Widgets
				},
				{
					path: 'components',
					redirect: '/components/buttons',
					name: 'Components',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
							path: 'buttons',
							name: 'Buttons',
							component: Buttons
						},
						{
							path: 'social-buttons',
							name: 'Social Buttons',
							component: SocialButtons
						},
						{
							path: 'cards',
							name: 'Cards',
							component: Cards
						},
						{
							path: 'forms',
							name: 'Forms',
							component: Forms
						},
						{
							path: 'modals',
							name: 'Modals',
							component: Modals
						},
						{
							path: 'switches',
							name: 'Switches',
							component: Switches
						},
						{
							path: 'tables',
							name: 'Tables',
							component: Tables
						}
					]
				},
				//Company
				{
					path: 'companies',
					redirect: '/companies',
					name: 'Companies',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/companies',
						name: 'Company List',
						component: CompanyList
						},
						
						{	
							path: '/company/create',
							name: 'Add Company',
							component: CompanyForm,
							// meta: {
							// 	requireAuth: true
							// }
						},
						
						{
							path: '/company/:id',
							name: 'Edit company',
							component: CompanyForm,
							// meta: {
							// 	requireAuth: false
							// }
						},	
					]
				},
				//User
				{
					path: 'users',
					redirect: '/users',
					name: 'Contacts',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/users',
						name: 'Contact List',
						component: UserList
						},
						
						{	
							path: '/user/create',
							name: 'Add Contact',
							component: UserForm
						},
						
						{
							path: '/user/:id',
							name: 'Edit User',
							component: UserForm
						},
						//add user from company form
						{
							path: '/user/:id/create',
							name: 'Add-Contact',
							component: NewUserForm,
						  },
						  //edit user from company form
						  {
							path: '/user/:id/edit',
							name: 'Edit-contact',
							component: NewUserForm,
						  },	
					]
				},
				//Location
				{
					path: 'locations',
					redirect: '/locations',
					name: 'Locations',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/locations',
						name: 'Location List',
						component: LocationList
						},	
						{
							path: '/location/:id/create',
							name: 'Add Location',
							component: LocationForm,
						  },
						
						{
							path: '/location/:id',
							name: 'Edit Location',
							component: LocationForm
						},	
					]
				},
				//job status
				{
					path: 'jobStats',
					redirect: '/jobStats',
					name: 'Job Status',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/jobStats',
						name: 'Job Status List',
						component: JobStatList
						},
						
						{	
							path: '/jobStat/create',
							name: 'Add Job Status',
							component: jobStatForm
						},
						
						{
							path: '/jobStat/:id',
							name: 'Edit Job Status',
							component: jobStatForm
						},	
					]
				},
				//Asset
				{
					path: 'assets',
					redirect: '/assets',
					name: 'Assets',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/assets',
						name: 'Asset List',
						component: AssetList
						},
						
						{	
							path: '/asset/create',
							name: 'Add Asset',
							component: AssetForm
						},
						
						{
							path: '/asset/:id',
							name: 'Edit Asset',
							component: AssetForm
						},	
					]
				},
				//Asset Model
				{
					path: 'assetModels',
					redirect: '/assetModels',
					name: 'Asset Models',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/assetModels',
						name: 'Asset Model List',
						component: AssetModelList
						},
						
						{	
							path: '/assetModel/create',
							name: 'Add Asset Model',
							component: AssetModelForm
						},
						
						{
							path: '/assetModel/:id',
							name: 'Edit Asset Model Type',
							component: AssetModelForm
						},	
					]
				},
				//Model Type
				{
					path: 'modelTypes',
					redirect: '/modelTypes',
					name: 'Model Types',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/modelTypes',
						name: 'Model Type list',
						component: ModelTypeList
						},
						
						{	
							path: '/modelType/create',
							name: 'Add Model Type',
							component: ModelTypeForm
						},
						
						{
							path: '/modelType/:id',
							name: 'Edit Model Type',
							component: ModelTypeList
						},	
					]
				},
				//Job
				{
					path: 'jobs',
					redirect: '/jobs',
					name: 'Job List',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/jobs',
						name: 'Job List',
						component: JobList
						},
						
						{	
							path: '/job/create',
							name: 'Add Job',
							component: JobForm
						},
						
						{
							path: '/job/:id',
							name: 'Edit Job',
							component: JobForm
						},	
					]
				},
				//Job Type
				{
					path: 'jobTypes',
					redirect: '/jobTypes',
					name: 'Job Type List',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/jobTypes',
						name: 'Job Type List',
						component: JobTypeList
						},
						
						{	
							path: '/jobType/create',
							name: 'Add Job Type',
							component: JobTypeForm
						},
						
						{
							path: '/jobType/:id',
							name: 'Edit Job Type',
							component: JobTypeForm
						},	
					]
				},
				//Job Priority
				{
					path: 'priorities',
					redirect: '/priorities',
					name: 'Job Priority List',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/priorities',
						name: 'Job Priority List',
						component: JobPriorityList
						},
						
						{	
							path: '/priorities/create',
							name: 'Add Job Priority',
							component: JobPriorityForm
						},
						
						{
							path: '/priorities/:id',
							name: 'Edit Job Priority',
							component: JobPriorityForm
						},	
					]
				},
				//Spare
				{
					path: 'spares',
					redirect: '/spares',
					name: 'Spare List',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/spares',
						name: 'Spare List',
						component: SpareList
						},
						
						{	
							path: '/spares/create',
							name: 'Add Spare',
							component: SpareForm
						},
						
						{
							path: '/spares/:id',
							name: 'Edit Spare',
							component: SpareList
						},	
					]
				},
				//Spare Type
				{
					path: 'spareTypes',
					redirect: '/spareTypes',
					name: 'Spare Type List',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/spareTypes',
						name: 'Spare Type List',
						component: SpareTypeList
						},
						
						{	
							path: '/spareType/create',
							name: 'Add Spare Type',
							component: SpareTypeForm
						},
						
						{
							path: '/spareType/:id',
							name: 'Edit Spare',
							component: SpareTypeForm
						},	
					]
				},
				//Role Type
				{
					path: '/roleTypes/',
			      	redirect: '/roleTypes',
					name: 'Role Type List',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
						path: '/roleTypes',
						name: 'Role Type List',
						component: RoleTypeList
						},
						
						{	
							path: '/roleType/create',
							name: 'Add Role Type',
							component: RoleTypeForm
						},
						
						{
							path: '/roleType/:id',
							name: 'Edit Role Type',
							component: RoleTypeForm
						},	
					]
				},
				{
					path: 'icons',
					redirect: '/icons/font-awesome',
					name: 'Icons',
					component: {
						render(c) {
							return c('router-view')
						}
					},
					children: [{
							path: 'font-awesome',
							name: 'Font Awesome',
							component: FontAwesome
						},
						{
							path: 'simple-line-icons',
							name: 'Simple Line Icons',
							component: SimpleLineIcons
						}
					]
				},
			
			]
		},
		{
			path: '/',
			redirect: '/pages/p404',
			name: 'Pages',
			component: {
				render(c) {
					return c('router-view')
				}
			},
			children: [{
					path: '404',
					name: 'Page404',
					component: Page404
				},
				{
					path: '500',
					name: 'Page500',
					component: Page500
				},
				{
					path: 'login',
					name: 'Login',
					component: Login,
					meta: {
						requireAuth: false
					}
				},
				{
					path: 'register',
					name: 'Register',
					component: Register,
					meta: {
						requireAuth: false
					}
				},
				{
					path: 'account',
					name: 'Account',
					component: Account,
					meta: {
						requireAuth: false
					}
				},
				{
					path: 'company',
					name: 'Company',
					component: Company,
					meta: {
						requireAuth: false
					}
				}
			]
		}
	]
})
router.beforeEach((to, from, next) => {
	setTimeout(function() {
    	setClassForParentMenu();
  	}, 100);
  	setTimeout(function() {
    	headerColorChanger();
  	}, 200);
  	return next();
});
function setClassForParentMenu() {
	// remove class
	var els = document.querySelectorAll('.nav-item.nav-dropdown');
	for (var i = 0; i < els.length; i++) {
	    els[i].classList.remove('open');
	    els[i].classList.remove('active');
  	}
  	var menuActive = document.querySelector(".nav-item .router-link-exact-active");
  	if (menuActive != null) {
  		menuActive.parentElement.parentElement.parentElement.className += " open active";
	}
}
function headerColorChanger() {
  	let menuActive = document.querySelector(".nav-item.nav-dropdown.active.open");
  	if (menuActive != null) {
	  let menuActiveBackground = window.getComputedStyle(menuActive, null).getPropertyValue("background");
	  let breadcrumb = document.querySelector(".main .breadcrumb");
	  breadcrumb.style.background = menuActiveBackground;
	}
}

export default router