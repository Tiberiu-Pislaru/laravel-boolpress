import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './pages/Home.vue';
import Contacts from './pages/Contacts.vue';
import ShowPost from './pages/ShowPost.vue'
import Error from './pages/Error.vue'


Vue.use(VueRouter);

let router = new VueRouter({
    mode:'history',
    routes: [
        { 
            path: '//', 
            component: Home, 
            name:'home.index' ,
            meta:{ title:'Homepage', linkText:'Home' }
        },

        {
            path: '/contacts',
            component: Contacts,
            name:'contacts.index',
            meta: { title: 'Contacts', linkText: 'Contacts' }
        },
        {
            path: '/posts/:post',
            component: ShowPost,
            name:'posts.show',
            meta:{ title:'Dettagli post' }
        },
        {
            path:"/not-found",
            alias:'*',
            component:Error,
            name:'error',
            meta: {title: 'Error'}

        }
    ]

});

router.beforeEach((to, from, next)=> {  
    document.title = to.meta.title;
    next();
});

export default router;