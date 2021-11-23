<template>
    <div class="album">
        <h3>{{data.title}}</h3>
        <router-link :to="{ name: 'single-post', params: {slug: data.slug} }">Scopri di più</router-link>
    </div>
</template>

<script>

export default {
    name: 'PostCard',
    props: {
        data: Object
    }
}

</script>

<style lang="scss">
    .album {
        width: calc(100% / 2 - 30px);
        margin: 5px 15px;
        background-color: #2E3A46;
        text-align: center; 
        padding: 30px; 
        border: 2px solid white;
    }
    p {
        color: white;
        padding: 50px; 
    }
    h3 {
        color: white;
        padding: 10px; 
    }

</style>

