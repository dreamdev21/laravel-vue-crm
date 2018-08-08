export default {
	items: [{
        name: 'Home',
        url: '/home',
        icon: 'icon-home',
        children: [
            {
                name: 'My dashboard',
                url: '/dashboard/', 
            }
        ]
    },
    {
        name: 'Foundation',
        url: '/',
        icon: 'fa fa-wrench',
        children: [
            {
                name: 'Companies',
                url: '/companies/', 
                icon: 'far fa-building'
            },
            {
                name: 'Contacts', 
                url: '/users',
                icon: '' 
            },
            // {
            //     name: 'Locations', 
            //     url: '/locations',
            //     icon: 'fa fa-address-card' 
            // },
            // {
            //     name: 'Role Types', 
            //     url: '/roleTypes',
            //     icon: 'fas fa-user-shield' 
            // }
        ]
    },
    {
        name: 'Assets',
        url: '/assets',
        icon: 'fa fa-cogs',
        children: [
            {name: 'Asset List',url: '/assets/'},
            {name: 'Asset Model',url: '/assetModels/'},
            {name: 'Model Type',url: '/modelTypes/'},
            {name: 'Search Asset',url: '/search/'},
            {name: 'Jobs',url: '/jobs/'},
            {name: 'Spares',url: '/spares/'},
            {name: 'Spare Types',url: '/SpareTypes/'},
            {name: 'Priority',url: '/priorities/'},
            {name: 'Job Status',url: '/JobStats/'},
            {name: 'Job Types',url: '/jobTypes/'},
            {name: 'Asset Settings',url: '/Asset Settings'},
        ]
    },
    {
        name: 'CRM',
        url: '/crm',
        icon: 'fas fa-hands-helping',
        children: [
            {name: 'Companies', url: '/Companies'},
            {name: 'Opportunities',url: '/Opportunities'},
        ]
    },
	]
}