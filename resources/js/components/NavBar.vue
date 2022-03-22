<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand">Navbar</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <router-link v-for='route in routes' class="nav-link" :key="route.path" :to="route.path">{{ route.meta.linkText }}</router-link>
                <a class="nav-link" href="/login" v-if="!user" >Admin</a>
                <a class="nav-link" href="/login" v-else>{{ user.name }}</a>
            </div>
        </div>
    </nav>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            routes:[],
            user:null
        }
    },
    methods:{
        fetchUser(){
            axios.get('/api/user').then((res)=>{
                this.user = res.data;
                localStorage.setItem('user',JSON.stringify(res.data))
            }).catch((er)=>{
                console.error('Utente non connesso');
            });
        }
    },
    mounted(){
        this.routes = this.$router.getRoutes().filter((route)=> route.meta.linkText);
        this.fetchUser();
    }
}
</script>

<style>

</style>