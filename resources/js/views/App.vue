<template>
    <div>
        <div>
            <a href="/login">Admin</a>
        </div>
        <h1>Welcome in Vue</h1>
        <div class="container-lg d-flex">

            <div v-for="post in posts" :key="post.id" class="row row-cols-1 row-cols-md-2 g-4">
                <div class="card" >
                    <img class="card-img-top" src="http://www.asdalcione.it/wp-content/uploads/2016/08/jk-placeholder-image-1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>

                        <p class="card-text">{{ post.description }}</p>
                        
                        <p class="card-text">Author: {{ post.user.name }}</p>
                        
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return {
            posts: [],
        }
        
    },
    methods:{
        async fetchPosts(){
            const res = await axios.get('/api/posts');
            this.posts = res.data;
            console.log(res.data);
        }
    },
    mounted(){
        this.fetchPosts();
    }
};
</script>

<style lang="scss" scoped>

</style>