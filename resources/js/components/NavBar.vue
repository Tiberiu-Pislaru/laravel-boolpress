<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand">Navbar</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <router-link v-for='route in routes' class="nav-link" :key="route.path" :to="route.path">{{ route.meta.linkText }}</router-link>
                <a class="nav-link" href="/login">Admin</a>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data(){
        return{
            routes:[]
        }
    },
    mounted(){
        this.routes = this.$router.getRoutes().filter((route)=> route.meta.linkText);
    }
}
</script>

<style>

</style>