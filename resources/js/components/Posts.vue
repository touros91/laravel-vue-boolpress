<template>
    <div class="album-container">
        <!-- <h3>All Posts</h3> -->
        <div class="album" v-for="post in posts" :key="post.id">
            {{post.title}}
        </div>
    </div>
</template>

<script>

export default {
    name: 'Posts',
    data () {
        return {
            posts: []
        }
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

.album {
    width: calc(100% / 2 - 30px);
    margin: 5px 15px;
    background-color: #2E3A46;
    text-align: center;
    color: white;
    padding: 30px; 
    border: 2px solid white;
}
</style>