<template>
    <div class="size">
        <h1>{{post.title}}</h1>
        <h3>Cateogria: {{post.category.name}}</h3>
        <p>{{post.content}}</p>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: null
        }
    },
    mounted() {
        axios.get(`/api/posts/${this.$route.params.slug}`)
        .then((response) => {
            this.post = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss">

.size {
    min-height: 80vh;
}

h3 {
    padding-left: 50px;
}
   
</style>