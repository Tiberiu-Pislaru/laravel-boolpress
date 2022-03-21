<template>
    <div>
        <the-navbar></the-navbar>
        <div class="container">
            <router-view></router-view>
        </div>
        
        
    </div>
</template>

<script>
import TheNavbar from '../components/NavBar.vue'
export default {
    components: {
        TheNavbar,
    }
}
</script>

<style>

</style>

