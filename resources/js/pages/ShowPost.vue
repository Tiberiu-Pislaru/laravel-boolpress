<template>
    <div>
        <h1>
            {{ post.title }}
        </h1>
        <p>
            {{ post.description}}
        </p>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return{
            post:{}
        }
    },
    methods: {
        async fetchData() {
            let result = await axios.get('/api/posts/'+ this.$route.params.post);
            this.post = result.data;
            // console.log(this.post);
        }
    },
    mounted(){
        console.log(this.$route.params);
        this.fetchData();
    }
}
</script>

<style>

</style>