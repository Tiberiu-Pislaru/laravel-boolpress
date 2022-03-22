<template>
    <div>
        <h1>
            Errore di sistema
        </h1>
        <h2>
            Prova a una di queste pagine
        </h2>
        <div class="d-flex">
            <router-link class="nav-link" v-for="route in routes" :key="route.path" :to="route.path">{{route.meta.linkText}}</router-link>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return{
            routes:[]
        }
    },
    mounted () {
        this.routes = this.$router.getRoutes().filter((route)=> route.meta.linkText)
    }
}
</script>

<style>

</style>