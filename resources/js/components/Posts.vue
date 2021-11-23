<template>
    <div class="album-container">
        <PostCard v-for="post in posts" :key="post.id" :data="post"/>
    </div>
</template>

<script>
import PostCard from './PostCard';

export default {
    name: 'Posts',
    data () {
        return {
            posts: []
        }
    },
    components: {
        PostCard
    },
    mounted() {
        axios.get("/api/posts")
        .then((response) => {
            this.posts = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss">
.album-container{
    width: 80%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    padding: 20px; 
}
</style>