function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },

  { path: '/contact-us', name: 'ContactUs', component: page('ContactUs.vue') },

  { path: '/about-us', name: 'AboutUs', component: page('AboutUs.vue') },
  { path: '/car-sale', name: 'CarsForSale', component: page('CarsForSale/CarsForSale.vue') },
  { path: '/car-sale/:id', name: 'CarListItem', component: page('CarsForSale/CarListItem'), props: true },
  { path: '/auctions', name: 'Auction', component: page('Auction/Auction.vue') },
  { path: '/auction/:id', name: 'AuctionCarListItem', component: page('Auction/AuctionCarListItem.vue') },
  { path: '/service', name: 'Services', component: page('Services/Services') },
  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/register/private', name: 'registerPrivate', component: page('auth/registerPrivate.vue') },
  { path: '/register/company', name: 'registerCompany', component: page('auth/registerCompany.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  // { path: '/home', name: 'home', component: page('home.vue') },

  { path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ] },
  { path: '*', component: page('errors/404.vue') }
]
