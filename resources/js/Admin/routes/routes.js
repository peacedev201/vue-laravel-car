import Login from '../Login'
import Dashboard from '../layout/Dashboard.vue'
import DashboardHome from '../layout/DashboardHome'
import Auction from '../layout/Auction.vue'
import AuctionRemove from '../layout/AuctionRemove.vue'
import AuctionBids from '../layout/AuctionBids'
import Users from '../layout/Users'


const routes = [
  {
    path: '/login',
    component: Login,
    name: '',
    hidden: true
  },
  {
    path: '/',
    component: Dashboard,
    name: 'Dashboard',

    children: [
      {
        path: '/dashboard',
        component: DashboardHome,
        name: ''
      },
      {
        path: '/auction',
        component: Auction,
        name: ''
      },
      {
        path: '/auction/remove',
        component: AuctionRemove,
        name: ''
      },
      {
        path: '/bids',
        component: AuctionBids,
        name: ''
      },
      {
        path: '/customers',
        component: Users,
        name: ''
      }
    ]
  }
]
// eslint-disable-next-line eol-last
export default routes