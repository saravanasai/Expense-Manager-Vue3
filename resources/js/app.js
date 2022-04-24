require('./bootstrap');
import { createApp } from 'vue'
import App from './src/index.vue'
import router from './src/routes/routes';
const app = createApp(App)

let isAuthenticated=true

router.beforeEach(async (to, from) => {

    if (to.meta.requiresAuth && isAuthenticated) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        return {
          name: 'register',
          // save the location we were at to come back later
          query: { redirect: to.fullPath },
        }
      }

    // if (!isAuthenticated && to.name !== 'register') {
    //   return { name: 'register' }
    // }
  })


app.use(router)

// app.component('home-component',require('./components/Test/Test.vue').default)
app.mount('#app')
