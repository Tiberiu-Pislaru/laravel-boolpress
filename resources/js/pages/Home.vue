<template>
    <div>
        <h1>Welcome in Vue</h1>
        <div class="container-lg d-flex flex-md-wrap">
            <div class="row">

                <div v-for="post in posts" :key="post.id" class=" col-6 mb-4">
                    <div class="card" >
                        
                        <img class="card-img-top" src="http://www.asdalcione.it/wp-content/uploads/2016/08/jk-placeholder-image-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ post.title }}</h5>

                            <p class="card-text">{{ post.description }}</p>
                            
                            <p class="card-text">Author: {{ post.user.name }}</p>
                            
                            <router-link :to="{ name:'posts.show', params: { post: post.slug } }">Dettagli</router-link>

                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
        <div class="container-lg">
            <span class="btn btn-success mr-3" @click="fetchPosts(data.current_page - 1)">Prev</span>

            <span class="btn btn-success" @click="fetchPosts(data.current_page + 1)">Next</span>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return {
            posts: [],
            data:[]
        }
        
    },
    methods:{
        async fetchPosts(page = 1){
            if (page < 1) {
                page = 1;
            }

            if ( page > this.data.last_page) {
                page = this.data.last_page;
            }
            const res = await axios.get('/api/posts?page=' + page);
            this.posts = res.data.data;
            this.data = res.data;
            // console.log(res.data);
        }
    },
    mounted(){
        this.fetchPosts();
        // console.log(this.$router.getRoutes());
    }
};

</script>

<style>

</style>